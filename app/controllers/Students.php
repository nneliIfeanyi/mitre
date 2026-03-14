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
      //$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $mitre_set = trim($_POST['set']);
      $conclave = trim($_POST['conclave']);

      $added = $this->userModel->getScores($conclave);
      $punctual = $this->userModel->getPunctual($conclave);
      if ($punctual >= 6) {
        $mark = 45;
      } elseif ($punctual == 5) {
        $mark = 45;
      } elseif ($punctual == 4) {
        $mark = 36;
      } elseif ($punctual == 3) {
        $mark = 27;
      } elseif ($punctual == 2) {
        $mark = 18;
      } elseif ($punctual == 1) {
        $mark = 9;
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
      //$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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
