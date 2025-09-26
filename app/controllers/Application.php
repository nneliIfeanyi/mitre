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
        flash('msg', 'Data Saved Successfully, proceed to next step.');
        redirect('application/step1');
      } else {
        die("Something went wrong...");
      }
    } else {
      //Pull from database
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
      if (!$this->regModel->findRegId($_SESSION['reg_id'])) {
        redirect('application/step1');
        exit();
      }
      $data = [
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
      if ($this->regModel->step2($_SESSION['reg_id'], $data)) {
        flash('msg', 'Data Saved Successfully, proceed to next step.');
        redirect('application/step2');
      } else {
        die("Something went wrong...");
      }
    } else {
      //Pull from database
      $step2 = $this->regModel->findRegId($_SESSION['reg_id']);
      $data  = [
        'step2' => $step2
      ];
      $this->view('application/step2', $data);
    }
  }
  // Step 3 | Referee Section
  public function step3()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Check if step1 is jumped! ie No DB record for current reg_id.
      if (!$this->regModel->findRegId($_SESSION['reg_id'])) {
        redirect('application/step1');
        exit();
      }
      $data = [
        'ref_name' => $_POST['ref_name'],
        'ref_phone' => $_POST['ref_phone'],
        'ref_address' => $_POST['ref_address'],
        'ref_email' => $_POST['ref_email'],
        'ref_duration' => $_POST['ref_duration'],
        'ref_info' => $_POST['ref_info']
      ];
      // check if passport empty and prevent continuation
      if (empty($this->regModel->findRegId($_SESSION['reg_id'])->photo)) {
        $this->regModel->step3($_SESSION['reg_id'], $data);
        flash('msg', 'An error occurred! Passport photograph is required before final submission.', 'alert alert-danger');
        redirect('application/step3');
        exit();
      }
      // Update DB
      if ($this->regModel->step3($_SESSION['reg_id'], $data)) {
        // Final Submission
        flash('msg', 'Referee Data Saved Successfully. You can now submit your application.');
        redirect('application/step3');
      } else {
        die("Something went wrong...");
      } // End Update DB
    } else { // Not Post Request
      //Pull from database
      $step3 = $this->regModel->findRegId($_SESSION['reg_id']);
      $data  = [
        'step3' => $step3
      ];
      $this->view('application/step3', $data);
    }
  } // End Step 3 | Referee Section


  public function passport()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (is_array($_FILES)) {
        $file = $_FILES['photo']['tmp_name'];
        $source_properties = getimagesize($file);
        $image_type = $source_properties[2];
        if ($image_type == IMAGETYPE_JPEG) {
          $image_resource_id = imagecreatefromjpeg($file);
          $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
          imagejpeg($target_layer, "photos/" . $_FILES['photo']['name']);
          $db_image_file =  "photos/" . $_FILES['photo']['name'];
          $data = [
            'id' => $_SESSION['reg_id'],
            'photo' => $db_image_file
          ];
          $upload = $this->regModel->addPassport($data);
          if ($upload) {
            flash('msg', 'Photo is Uploaded Successfully..');
            redirect('application/step3');
          } else {
            die('Something went wrong..');
          }
        } elseif ($image_type == IMAGETYPE_PNG) {
          $image_resource_id = imagecreatefrompng($file);
          $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
          imagepng($target_layer, "photos/" . $_FILES['photo']['name']);
          $db_image_file =  "photos/" . $_FILES['photo']['name'];
          $data = [
            'id' => $_SESSION['reg_id'],
            'photo' => $db_image_file
          ];
          $upload = $this->regModel->addPassport($data);
          if ($upload) {
            flash('msg', 'Your Photo is Uploaded Successfully');
            redirect('application/step3');
          } else {
            die('Something went wrong..');
          }
        }
      }
    }
  }

  public function submit()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Check if Session reg_id is not set
      if (!isset($_SESSION['reg_id']) || empty($_SESSION['reg_id'])) {
        redirect('application/step1');
      }
      $user_data = $this->regModel->findRegId($_SESSION['reg_id']);
      // Check if step1 is jumped! ie No DB record for current reg_id.
      if (!$user_data) {
        redirect('application/step1');
        exit();
      }
      // check if step 2 empty and prevent continuation
      if (empty($user_data->church)) {
        redirect('application/step2');
        exit();
      }
      // check if passport empty and prevent continuation
      if (empty($user_data->photo)) {
        flash('msg', 'An error occurred! Passport photograph is required before final submission.', 'alert alert-danger');
        redirect('application/step3');
        exit();
      }
      foreach ($_COOKIE as $name => $value) {
        // Expire each cookie
        setcookie($name, "", time() - 3600, "/");
        unset($_COOKIE[$name]);
      }
      unset($_SESSION['reg_id']);
      session_destroy();
      $this->view('application/success');
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
      if ($this->regModel->updateStep1($_SESSION['reg_id'], $data)) {
        flash('msg', 'Changes Saved Successfully, proceed to next step.');
        redirect('application/step1');
      } else {
        die("Something went wrong...");
      }
    } else {
      die('Something went wrong!');
    }
  }
}
