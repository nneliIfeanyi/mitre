<?php
class Students extends Controller
{
  public $userModel;

  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('portal');
    }

    redirect('portal');
  }

  public function update_photo()
  {



    $this->view('students/update_photo');
  }

  // Load Homepage
  public function scores()
  {
    if (!$this->isLoggedIn()) {
      redirect('students');
    }
    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $mitre_set = trim($_POST['set']);
      $conclave = trim($_POST['conclave']);

      $added = $this->userModel->getScores($conclave);
      $punctual = $this->userModel->getPunctual($conclave);
      if ($punctual >= 6) {
        $mark = 45;
      } elseif ($punctual == 5) {
        $mark = 37.5;
      } elseif ($punctual == 4) {
        $mark = 30;
      } elseif ($punctual == 3) {
        $mark = 22.5;
      } elseif ($punctual == 2) {
        $mark = 15;
      } elseif ($punctual == 1) {
        $mark = 7.5;
      } else {
        $mark = '--';
      }
      $data = [
        'scores' => $added,
        'attendance' => $mark,
        'set' => $mitre_set,
        'conclave' => $conclave,
        'paper1' => 'short_paper',
        'paper2' => 'long_paper',
        'paper3' => 'term_paper',
        'paper4' => 'Summary'
      ];
      $this->view('students/view_scores', $data);
    } else {
      $conclaves = $this->userModel->getConclaves();
      $user_data = $this->userModel->getUserById($_COOKIE['student-id']);
      //Set Data
      $data = [
        'details' => $user_data,
        'conclaves' => $conclaves
      ];
      $this->view('students/scores', $data);
    }
  }



  public function registration()
  {
    redirect('portal');

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      if (empty($_POST['call_sensed'])) {
        $_POST['call_sensed'] = 'Nill';
      } elseif (empty($_POST['into_calling'])) {
        $_POST['into_calling'] = 'Nill';
      } elseif (empty($_POST['c_r_t'])) {
        $_POST['c_r_t'] = 'Nill';
      }
      if (empty($_POST['why_mitre'])) {
        $_POST['why_mitre'] = 'Nill';
      } elseif (empty($_POST['ref_info'])) {
        $_POST['ref_info'] = 'Nill';
      }

      $fullname = trim($_POST['surname']) . ' ' . trim($_POST['other_names']);

      $info = trim($_POST['age']) . ':' . $_POST['gender'] . ':' . $_POST['m_status'];

      $assembly = trim($_POST['church']) . ':' . trim($_POST['church_role']);

      $spiritual = trim($_POST['new_birth']) . ':' . trim($_POST['H_baptism']);

      $into_call = $_POST['into_calling'] . ':' . $_POST['c_r_t'];

      $prior_attended = trim($_POST['prior_mitre']) . ':' . trim($_POST['why_mitre']);

      $academics = $_POST['edu_qual'] . ':' . trim($_POST['grad_year']) . ':' . trim($_POST['institution']);

      $passport = basename($_FILES["passport"]["name"]);
      $uploadPath = "uploaded/";
      $db_img =  $uploadPath . $passport;
      $ref_dura_info = trim($_POST['ref_duration']) . ':' . trim($_POST['ref_info']);
      $whatsapp_num2 = ltrim($_POST['whatsapp_num'], '\0');
      $whatsapp_num = '234' . $whatsapp_num2;
      $imageUploadPath = $uploadPath . $passport;
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
      $allowTypes = array('jpg', 'png', 'jpeg', 'PNG');
      $imageTemp = $_FILES["passport"]["tmp_name"];

      $data = [
        'set' => '17',
        'fullname' => $fullname,
        'info' => $info,
        'surname' => trim($_POST['surname']),
        'other_names' => trim($_POST['other_names']),
        'age' => trim($_POST['age']),
        'gender' => $_POST['gender'],
        'zone' => $_POST['zone'],
        'm_status' => $_POST['m_status'],
        's_o_r' => trim($_POST['s_o_r']),
        'address' => trim($_POST['address']),
        'mobile_num' => trim($_POST['mobile_num']),
        'whatsapp_num' => $whatsapp_num,
        'whatsapp_num1' => trim($_POST['whatsapp_num']),
        'assembly' => $assembly,
        'church' => trim($_POST['church']),
        'church_role' => trim($_POST['church_role']),
        'spiritual' => $spiritual,
        'new_birth' => trim($_POST['new_birth']),
        'email' => trim($_POST['email']),
        'H_baptism' => $_POST['H_baptism'],
        'call_sensed' => $_POST['call_sensed'],
        'into_call' => $into_call,
        'prior_attended' => $prior_attended,
        'into_calling' => $_POST['into_calling'],
        'c_r_t' => $_POST['c_r_t'],
        'prior_mitre' => $_POST['prior_mitre'],
        'why_mitre' => $_POST['why_mitre'],
        'occupation' => trim($_POST['occupation']),
        'lang_speak' => trim($_POST['lang_speak']),
        'lang_write' => trim($_POST['lang_write']),
        'litracy' => $_POST['litracy'],
        'edu_qual' => trim($_POST['edu_qual']),
        'grad_year' => trim($_POST['grad_year']),
        'institution' => trim($_POST['institution']),
        'academics' => $academics,
        'discipler' => $_POST['discipler'],
        'ref_name' => trim($_POST['ref_name']),
        'ref_phone' => trim($_POST['ref_phone']),
        'ref_address' => trim($_POST['ref_address']),
        'ref_duration' => trim($_POST['ref_duration']),
        'ref_dura_info' => $ref_dura_info,
        'ref_info' => trim($_POST['ref_info']),
        'passport' => $db_img,

        //error handling
        'name_err' => '',
        'name_err2' => '',
        'num_err' => '',
        'age_err' => '',
        'gen_err' => '',
        'mar_err' => '',
        'add_err' => '',
        'ass_err' => '',
        'role_err' => '',
        'BA_err' => '',
        'HG_err' => '',
        'prior_err' => '',
        'occ_err' => '',
        'lang_err' => '',
        'lang1_err' => '',
        'lit_err' => '',
        'discipler_err' => '',
        'grad_err' => '',
        'cert_err' => '',
        'inst_err' => '',
        'pass_err' => '',
        'ref1_err' => '',
        'ref2_err' => '',
        'ref3_err' => '',
        'ref4_err' => '',
        'zone_err' => '',
        's_o_r_err' => ''
      ];

      if (empty($data['surname']) || empty($data['other_names'])) {
        flash('err', 'All feilds marked asterisk (*) are required..', 'alert alert-danger');
        redirect('students/registration');
      } elseif (empty($data['age'])) {
        $data['age_err'] = 'Age is required..';
        $this->view('students/registration', $data);
      } elseif (empty($data['gender'])) {
        $data['gen_err'] = 'Kindly select an option..';
        $this->view('students/registration', $data);
      } elseif (empty($data['m_status'])) {
        $data['mar_err'] = 'Kindly select an option..';
        $this->view('students/registration', $data);
      } elseif (empty($data['s_o_r'])) {
        $data['s_o_r_err'] = 'This field is required..';
        $this->view('students/registration', $data);
      } elseif (empty($data['zone'])) {
        $data['zone_err'] = 'This field is required..';
        $this->view('students/registration', $data);
      } elseif (empty($data['address'])) {
        $data['add_err'] = 'This field is required..';
        $this->view('students/registration', $data);
      } elseif (empty($data['mobile_num'])) {
        $data['num_err'] = 'This field is required..';
        $this->view('students/registration', $data);
      } elseif (strlen($data['mobile_num']) > 11) {
        $data['num_err'] = 'Phone number must be at least 11 digits..';
        $this->view('students/registration', $data);
      } elseif (strlen($data['mobile_num']) < 11) {
        $data['num_err'] = 'Phone number must be at least 11 digits..';
        $this->view('students/registration', $data);
      } elseif ($this->userModel->findUserByPhone($data['mobile_num'])) {
        $data['num_err'] = "Phone number is already taken.. you cannot register twice";
        $this->view('students/registration', $data);
      } elseif (empty($data['church'])) {
        $data['ass_err'] = 'Let us know the church you attend..';
        $this->view('students/registration', $data);
      } elseif (empty($data['church_role'])) {
        $data['role_err'] = 'Pls. fill out this field..';
        $this->view('students/registration', $data);
      } elseif (empty($data['new_birth'])) {
        $data['BA_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['H_baptism'])) {
        $data['HG_err'] = 'Kindly select an option..';
        $this->view('students/registration', $data);
      } elseif (empty($data['prior_mitre'])) {
        $data['prior_err'] = 'Kindly select an option..';
        $this->view('students/registration', $data);
      } elseif (empty($data['occupation'])) {
        $data['occ_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['lang_speak'])) {
        $data['lang_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['lang_write'])) {
        $data['lang1_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['litracy'])) {
        $data['lit_err'] = 'Kindly select an option..';
        $this->view('students/registration', $data);
      } elseif (empty($data['edu_qual'])) {
        $data['cert_err'] = 'Kindly select an option..';
        $this->view('students/registration', $data);
      } elseif (empty($data['grad_year'])) {
        $data['grad_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['institution'])) {
        $data['inst_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['discipler'])) {
        $data['discipler_err'] = 'This field is required';
        $this->view('students/registration', $data);

        // } elseif(!in_array($fileType, $allowTypes)) { 
        //   $data['pass_err'] = 'Image format not supported.. allowed formats are jpg, png or jpeg';     
        //   $this->view('students/registration', $data);

      } elseif (empty($data['ref_name'])) {
        $data['ref1_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['ref_phone'])) {
        $data['ref2_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['ref_address'])) {
        $data['ref3_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } elseif (empty($data['ref_duration'])) {
        $data['ref4_err'] = 'This field is required';
        $this->view('students/registration', $data);
      } else {
        // Compress size and upload image 
        if (empty($passport)) {
          if ($this->userModel->register($data)) {
            flash('success', 'Registration Successfull');
            redirect('portal');
          } else {
            die('something went wrong');
          }
        } else {
          compressImage($imageTemp, $imageUploadPath, 9);
          if ($this->userModel->register($data)) {
            flash('success', 'Registration Successfull');
            redirect('portal');
          } else {
            die('something went wrong');
          }
        }
      }
    } else {
      // IF NOT A POST REQUEST

      // Init data
      $data = [
        'surname' => '',
        'other_names' => '',
        'age' => '',
        'gender' => '',
        'm_status' => '',
        'mobile_num' => '',
        's_o_r' => '',
        'zone' => '',
        'email' => '',
        'address' => '',
        'whatsapp_num1' => '',
        'occupation' => '',
        'lang_write' => '',
        'lang_speak' => '',
        'church' => '',
        'church_role' => '',
        'edu_qual' => '',
        'grad_year' => '',
        'institution' => '',
        'discipler' => '',
        'c_r_t' => '',
        'call_sensed' => '',
        'why_mitre' => '',
        'ref_info' => '',
        'ref_name' => '',
        'ref_address' => '',
        'ref_duration' => '',
        'ref_phone' => '',
        'new_birth' => ''
      ];

      // Load View
      $this->view('students/registration', $data);
    }
  }


  public function register()
  {

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $fullname = trim($_POST['surname']) . " " . trim($_POST['other_names']);
      $data = [
        'name' => $fullname,
        'set' => $_POST['set'],
        'email' => trim($_POST['email']),
        'phone' => trim($_POST['phone']),
        'gender' => trim($_POST['gender']),
        'zone' => trim($_POST['zone']),
        'address' => trim($_POST['address']) . ' ' . trim($_POST['state']),
        //'telegram' => trim($_POST['telegram']),
        'whatsapp' => trim($_POST['whatsapp']),
        'ministry' => trim($_POST['ministry']),
        'occupation' => trim($_POST['occupation']),
        'assembly' => trim($_POST['assembly']),
      ];
      //validate Username..
      if ($this->userModel->findUserByPhone($data['phone'])) {

        echo "
                  <div class='alert alert-danger'>
                    Phone number already exist you cannot register twice..
                  </div>
                ";
      } else {
        //All validation passed...
        $success = $this->userModel->register_by_admin($data);
        if ($success) {
          flash('msg', 'Registration Successfull..');
          $redirect = URLROOT . '/students/register';
          echo "
                    <div class='alert fw-bold alert-success'>
                      REGISTRATION SUCCESSFULL, THANKS..  <span class='spinner-border spinner-border-sm'> </span>
                    </div>
                    <meta http-equiv='refresh' content='3; $redirect'>
                  ";
        } else {
          echo "
                  <div class='alert alert-danger'>
                    Something went wrong... Try again later
                  </div>
                  
                ";
        }
      }
    } else {
      // If NOT a POST
      $states = $this->userModel->getStates();
      // Init data
      $data = [
        'states' => $states,
        'email' => '',
        'surname' => '',
        'other_names' => '',
        'gender' => '',
        'zone' => '',
        'address' => '',
        'state' => '',
        'phone' => '',
        'whatsapp' => '',
        'telegram' => '',
        'ministry' => '',
        'occupation' => '',
        'assembly' => '',
      ];

      // Load View
      $this->view('students/register', $data);
    }
  }





  public function login()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('students');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        //'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        //'email_err' => '',
        'password_err' => '',
      ];

      // Make sure errors are empty
      if (empty($data['password'])) {

        $data['password_err'] = 'Please enter your phone number.';
        $this->view('students/login', $data);
      } else {

        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['password']);

        if ($loggedInUser) {
          // echo $_COOKIE['student-id'];
          // echo $_COOKIE['student-name'];
          // echo $_COOKIE['student-reg_no'];
          $this->createUserSession($loggedInUser);
          flash('msg', 'Login Successfull..');
          redirect('students');
        } else {
          $data['password_err'] = 'Password incorrect.';
          // Load View
          $this->view('students/login', $data);
        }
      }
    } else {
      // If NOT a POST

      // Init data
      $data = [
        // 'email' => '',
        'password' => '',
        // 'email_err' => '',
        'password_err' => '',
      ];

      // Load View
      $this->view('students/login', $data);
    }
  }

  // Image Update
  public function edit_profile_pic()
  {
    if (isset($_POST['upload'])) {
      // $uploadPath = "pics/";
      // $fileName = basename($_FILES["photo"]["name"]);
      // $db_image_file =  $uploadPath . $fileName;
      // $imageUploadPath = $uploadPath . $fileName;
      // $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

      // // Allow certain file formats 
      // $allowTypes = array('jpg', 'png', 'jpeg');

      // if (!in_array($fileType, $allowTypes)) {
      //   //echo $fileName;
      //   flash('msg', 'Invalid image format.. Supported formats are JPEG and PNG', 'alert alert-danger');
      //   redirect('students/update_photo');
      // } else {
      //   $imageTemp = $_FILES["photo"]["tmp_name"];
      //   $data = [
      //     'id' => $_COOKIE['student-id'],
      //     'image' => $db_image_file,
      //     move_uploaded_file($imageTemp, $imageUploadPath)
      //   ];
      //   $upload = $this->userModel->edit_pic($data);
      //   if ($upload) {
      //     setcookie('photo-now', $db_image_file, time() + (400), '/');
      //     flash('msg', 'Your Photo is Uploaded Remain Blessed..');
      //     redirect('students/update_photo');
      //   } else {
      //     die('Something went wrong..');
      //   }
      // }
      if (is_array($_FILES)) {
        $file = $_FILES['photo']['tmp_name'];
        $source_properties = getimagesize($file);
        $image_type = $source_properties[2];
        if ($image_type == IMAGETYPE_JPEG) {
          $image_resource_id = imagecreatefromjpeg($file);
          $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
          imagejpeg($target_layer, "pics/" . $_FILES['photo']['name']);
          $db_image_file =  "pics/" . $_FILES['photo']['name'];
          $data = [
            'id' => $_COOKIE['student-id'],
            'image' => $db_image_file
          ];
          $upload = $this->userModel->edit_pic($data);
          if ($upload) {
            setcookie('photo-now', $db_image_file, time() + (40), '/');
            flash('msg', 'Your Photo is Uploaded Remain Blessed..');
            redirect('students/update_photo');
          } else {
            die('Something went wrong..');
          }
        } elseif ($image_type == IMAGETYPE_PNG) {
          $image_resource_id = imagecreatefrompng($file);
          $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
          imagepng($target_layer, "pics/" . $_FILES['photo']['name']);
          $db_image_file =  "pics/" . $_FILES['photo']['name'];
          $data = [
            'id' => $_COOKIE['student-id'],
            'image' => $db_image_file
          ];
          $upload = $this->userModel->edit_pic($data);
          if ($upload) {
            setcookie('photo-now', $db_image_file, time() + (40), '/');
            flash('msg', 'Your Photo is Uploaded Remain Blessed..');
            redirect('students/update_photo');
          } else {
            die('Something went wrong..');
          }
        }
      }
    }
  }




  // Create Session With User Info
  public function createUserSession($user)
  {
    setcookie('student-id', $user->id, time() + (86400), '/');
    setcookie('student-name', $user->fullname, time() + (86400), '/');
    setcookie('student-set', $user->mitre_set, time() + (86400), '/');
    setcookie('student-passport', $user->passport, time() + (86400), '/');
    setcookie('student-zone', $user->zone, time() + (86400), '/');
    setcookie('student-reg_no', $user->admsn_no, time() + (86400), '/');
  }

  // Logout & Destroy Session
  public function logout()
  {
    $user_id = $_COOKIE['student-id'];
    $user_fullname = $_COOKIE['student-name'];
    $user_mitre_set = $_COOKIE['student-set'];
    $user_admsn_no = $_COOKIE['student-reg_no'];
    $user_passport = $_COOKIE['student-passport'];
    $user_zone = $_COOKIE['student-zone'];
    setcookie('student-id', $user_id, time() - (86400), '/');
    setcookie('student-name', $user_fullname, time() - (86400), '/');
    setcookie('student-set', $user_mitre_set, time() - (86400), '/');
    setcookie('student-passport', $user_passport, time() - (86400), '/');
    setcookie('student-zone', $user_zone, time() - (86400), '/');
    setcookie('student-reg_no', $user_admsn_no, time() - (86400), '/');
    redirect('students/login');
  }

  // Check Logged In
  public function isLoggedIn()
  {
    if (isset($_COOKIE['student-id'])) {
      return true;
    } else {
      return false;
    }
  }
}
