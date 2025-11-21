<?php
class Application extends Controller
{

  private $regModel;

  public function __construct()
  {
    $this->regModel = $this->model('RegModel');
    if (!isset($_COOKIE['reg_id'])) {
      $_SESSION['reg_id'] = '';
      $token = bin2hex(random_bytes(7));
      setcookie("reg_id", $token, time() + (86400 * 7), "/");
      $_SESSION['reg_id'] = $_COOKIE['reg_id'];
    } else {
      $_SESSION['reg_id'] = $_COOKIE['reg_id'];
    }
  }

  public function index()
  {
    // Check if Session reg_id is not set
    if (!isset($_SESSION['reg_id']) || empty($_SESSION['reg_id'])) {
      redirect('application/index');
    }
    $data = [];
    $this->view('application/index', $data);
  }

  public function referee($reg_id)
  {
    $details = $this->regModel->findRegId($reg_id);
    if (!$details) {
      flash('msg', 'Invalid Referee Link', 'alert alert-danger');
      redirect('application/error_page');
      exit();
    }
    $data = [
      'reg_id' => $reg_id,
      'details' => $details
    ];
    $this->view('application/referee', $data);
  }
  public function error_page()
  {
    $data = [
      'msg' => 'Invalid Referee Link - Please check the link or contact support.'
    ];
    $this->view('application/error_page', $data);
  }


  public function step1()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (!isset($_SESSION['reg_id']) || empty($_SESSION['reg_id'])) {
        redirect('application/step1');
        exit();
      }
      $data = [
        'reg_id' => $_POST['reg_id'],
        'surname' => $_POST['surname'],
        'other_name' => $_POST['other_name'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'marital_status' => $_POST['marital_status'],
        'state' => $_POST['state'],
        'zone' => $_POST['zone'],
        'address' => $_POST['address'],
        'mobile' => $_POST['mobile'],
        'alt_no' => $_POST['alt_no'],
        'email' => $_POST['email'],
        'occupation' => $_POST['occupation'],
        'lang_speak' => $_POST['lang_speak'],
        'lang_write' => $_POST['lang_write'],
        'litracy' => $_POST['litracy']
      ];
      if ($this->regModel->step1($data)) {
        flash('msg', 'Data Saved Successfully, continue with next step.');
        redirect('application/step2');
      } else {
        die("Something went wrong...");
      }
    } else {
      //Pull from database
      if ($_GET['reg_id'] && isset($_SESSION['admin'])) {
        $_SESSION['reg_id'] = $_GET['reg_id'];
      }
      $step1 = $this->regModel->findRegId($_SESSION['reg_id']);
      $data  = [
        'reg_id' => $_SESSION['reg_id'],
        'step1' => $step1
      ];
      $this->view('application/step1', $data);
    }
  }

  public function step2()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Check if step1 is jumped! ie No DB record for current reg_id.
      // if (!$this->regModel->findRegId($_SESSION['reg_id'])) {
      //   redirect('application/step1');
      //   exit();
      // }
      $data = [
        'reg_id' => $_POST['reg_id'],
        'church' => $_POST['church'],
        'post' => $_POST['post'],
        'born_again' => $_POST['born_again'],
        'baptism' => $_POST['baptism'],
        'calling' => $_POST['calling'],
        'in_calling' => $_POST['in_calling'],
        'entered_calling' => $_POST['entered_calling'],
        'attended_mitre' => $_POST['attended_mitre'],
        'why_mitre' => $_POST['why_mitre'],
        'oversight' => $_POST['oversight'],
        'certificate' => $_POST['certificate'],
        'cert_year' => $_POST['cert_year'],
        'institution' => $_POST['institution']
      ];
      if ($this->regModel->step2($data['reg_id'], $data)) {
        flash('msg', 'Data Saved Successfully, proceed with next step.');
        if (isset($_SESSION['admin'])) {
          redirect('application/step2?reg_id=' . $_POST['reg_id']);
        } else {
          redirect('application/step3');
        }
      } else {
        die("Something went wrong...");
      }
    } else {
      //Pull from database
      if ($_GET['reg_id'] && isset($_SESSION['admin'])) {
        $_SESSION['reg_id'] = $_GET['reg_id'];
      }
      $step2 = $this->regModel->findRegId($_SESSION['reg_id']);
      $data  = [
        'step2' => $step2,
        'reg_id' => $_SESSION['reg_id'],
      ];
      $this->view('application/step2', $data);
    }
  }
  // Step 3 | Referee Section
  public function step3()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Check if step1 is jumped! ie No DB record for current reg_id.
      // if (!$this->regModel->findRegId($_SESSION['reg_id'])) {
      //   redirect('application/step1');
      //   exit();
      // }
      $data = [
        'reg_id' => $_POST['reg_id'],
        'ref_name' => $_POST['ref_name'],
        'ref_phone' => $_POST['ref_phone'],
        'ref_address' => $_POST['ref_address'],
        'ref_email' => $_POST['ref_email'],
        'ref_duration' => $_POST['ref_duration'],
        'ref_info' => $_POST['ref_info']
      ];
      $check = $this->regModel->findRegId($data['reg_id']);
      // Update DB
      if ($this->regModel->step3($data['reg_id'], $data)) {
        // Final Submission
        // Generate Reg No
        if ($check->zone == 'Kaduna') {
          $z = 'K';
        } elseif ($check->zone == 'Minna') {
          $z = 'N';
        } elseif ($check->zone == 'Ufuma') {
          $z = 'U';
        }
        if (strlen($check->id) == 1) {
          $id = '00' . $check->id;
        } elseif (strlen($check->id) == 2) {
          $id = '0' . $check->id;
        } elseif (strlen($check->id) == 3) {
          $id = $check->id;
        } else {
          $id = $check->id;
        }
        $reg_no = '18-' . $z . $id;
        $data['id'] = $_SESSION['reg_id'];
        $data['reg_no'] = $reg_no;
        $this->regModel->regNo($data);
        flash('msg', 'Referee Data Saved Successfully. You can now submit your application.');
        if (isset($_SESSION['admin'])) {
          redirect('application/step3?reg_id=' . $_POST['reg_id']);
        } else {
          redirect('application/step3');
        }
      } else {
        die("Something went wrong...");
      } // End Update DB
    } else { // Not Post Request
      //Pull from database
      if ($_GET['reg_id'] && isset($_SESSION['admin'])) {
        $_SESSION['reg_id'] = $_GET['reg_id'];
      }
      $step3 = $this->regModel->findRegId($_SESSION['reg_id']);
      $data  = [
        'reg_id' => $_SESSION['reg_id'],
        'step3' => $step3
      ];
      $this->view('application/step3', $data);
    }
  } // End Step 3 | Referee Section


  public function passport()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Check if step1 is jumped! ie No DB record for current reg_id.
      // if (!$this->regModel->findRegId($_SESSION['reg_id'])) {
      //   redirect('application/step1');
      //   exit();
      // }
      if (is_array($_FILES)) {
        $file = $_FILES['photo']['tmp_name'];
        $source_properties = getimagesize($file);
        // echo "Width : " . $source_properties[0] . "<br>Height : " . $source_properties[1] . "<br>";
        // i like to get image size and limit the size to 5mb
        if ($_FILES['photo']['size'] > 5000000) {
          flash('msg', 'File size exceeds 5MB limit', 'alert alert-danger');
          if (isset($_SESSION['admin'])) {
            redirect('application/step3?reg_id=' . $_POST['reg_id']);
          } else {
            redirect('application/step3');
          }
          exit();
        }
        $image_type = $source_properties[2];
        if ($image_type == IMAGETYPE_JPEG) {
          $image_resource_id = imagecreatefromjpeg($file);
          $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
          imagejpeg($target_layer, "photos/" . $_FILES['photo']['name']);
          $db_image_file =  "photos/" . $_FILES['photo']['name'];
          $data = [
            'id' => isset($_SESSION['admin']) ? $_POST['reg_id'] : $_SESSION['reg_id'],
            'photo' => $db_image_file
          ];
          $upload = $this->regModel->addPassport($data);
          if ($upload) {
            flash('msg', 'Photo is Uploaded Successfully..');
            if (isset($_SESSION['admin'])) {
              redirect('application/step3?reg_id=' . $_POST['reg_id']);
            } else {
              redirect('application/step3');
            }
          } else {
            die('Something went wrong..');
          }
        } elseif ($image_type == IMAGETYPE_PNG) {
          $image_resource_id = imagecreatefrompng($file);
          $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
          imagepng($target_layer, "photos/" . $_FILES['photo']['name']);
          $db_image_file =  "photos/" . $_FILES['photo']['name'];
          $data = [
            'id' => isset($_SESSION['admin']) ? $_POST['reg_id'] : $_SESSION['reg_id'],
            'photo' => $db_image_file
          ];
          $upload = $this->regModel->addPassport($data);
          if ($upload) {
            flash('msg', 'Your Photo is Uploaded Successfully');
            if (isset($_SESSION['admin'])) {
              redirect('application/step3?reg_id=' . $_POST['reg_id']);
            } else {
              redirect('application/step3');
            }
          } else {
            die('Something went wrong..');
          }
        }
      }
    }
  }

  public function success($id)
  {
    $check = $this->regModel->findRegId($_SESSION['reg_id']);
    // Expire each cookie
    foreach ($_COOKIE as $name => $value) {
      // Expire each cookie
      setcookie($name, "", time() - 3600, "/");
      unset($_COOKIE[$name]);
    }
    unset($_SESSION['reg_id']);
    session_destroy();
    //Send SMS feedback to candidate here
    send_sms($check->mobile);
    if ($id === 1) {
      $this->view('application/success');
    } else {
      $this->view('application/success2');
    }
  }

  public function update_step1()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'reg_id' => $_POST['reg_id'],
        'surname' => $_POST['surname'],
        'other_name' => $_POST['other_name'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'marital_status' => $_POST['marital_status'],
        'state' => $_POST['state'],
        'zone' => $_POST['zone'],
        'address' => $_POST['address'],
        'mobile' => $_POST['mobile'],
        'alt_no' => $_POST['alt_no'],
        'email' => $_POST['email'],
        'occupation' => $_POST['occupation'],
        'lang_speak' => $_POST['lang_speak'],
        'lang_write' => $_POST['lang_write'],
        'litracy' => $_POST['litracy']
      ];
      if ($this->regModel->updateStep1($data['reg_id'], $data)) {
        flash('msg', 'Changes Saved Successfully, proceed to next step.');
        if (isset($_SESSION['admin'])) {
          redirect('application/step1?reg_id=' . $_POST['reg_id']);
        } else {
          redirect('application/step1');
        }
      } else {
        die("Something went wrong...");
      }
    } else {
      die('Something went wrong!');
    }
  }

  public function ref_link_submit()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'ref_name' => $_POST['ref_name'],
        'ref_phone' => $_POST['ref_phone'],
        'ref_address' => $_POST['ref_address'],
        'ref_email' => $_POST['ref_email'],
        'ref_duration' => $_POST['ref_duration'],
        'ref_info' => $_POST['ref_info']
      ];
      // Update DB
      if ($this->regModel->step3($_POST['reg_id'], $data)) {
        $check = $this->regModel->findRegId($_POST['reg_id']);
        // Final Submission
        // Generate Reg No
        if ($check->zone == 'Kaduna') {
          $z = 'K';
        } elseif ($check->zone == 'Minna') {
          $z = 'N';
        } elseif ($check->zone == 'Ufuma') {
          $z = 'U';
        }
        if (strlen($check->id) == 1) {
          $id = '00' . $check->id;
        } elseif (strlen($check->id) == 2) {
          $id = '0' . $check->id;
        } elseif (strlen($check->id) == 3) {
          $id = $check->id;
        } else {
          $id = $check->id;
        }
        $reg_no = '18-' . $z . $id;
        $data['id'] = $_POST['reg_id'];
        $data['reg_no'] = $reg_no;
        $this->regModel->regNo($data);
        // Expire each cookie
        foreach ($_COOKIE as $name => $value) {
          setcookie($name, "", time() - 3600, "/");
          unset($_COOKIE[$name]);
        }
        unset($_SESSION['reg_id']);
        session_destroy();
        // Send Sms feedback to candidate here
        send_sms($check->mobile);
        redirect('application/success/2');
      } else {
        die("Something went wrong...");
      } // End Update DB
    } else { // Not Post Request

      die("Something went wrong...");
    }
  } // End Referee link Section
}
