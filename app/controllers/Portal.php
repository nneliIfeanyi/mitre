<?php
class Portal extends Controller
{
  private $userModel;
  private $databaseModel;
  private $attendanceModel;
  private $alumniModel;
  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->databaseModel = $this->model('Databaze');
    $this->attendanceModel = $this->model('Attendanze');
    $this->alumniModel = $this->model('Alumnus');
  }

  // Load Homepage
  public function index()
  {

    redirect('portal/welcome');
  }

  // Load Homepage
  public function welcome()
  {

    //Set Data
    $data = [
      'title' => '',
      'description' => ''
    ];

    // Load homepage/index view
    $this->view('portal/welcome', $data);
  }


  // Load Homepage
  public function pdf()
  {
    $instructors_db = $this->alumniModel->instructors_total2();
    //Set Data
    $data = [
      'all' => $instructors_db,
      'description' => ''
    ];

    // Load homepage/index view
    $this->view('portal/pdf', $data);
  }





  public function instructors()
  {

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //$year = date('Y');
      $data = [
        'name' => trim($_POST['fullname']),
        'email' => trim($_POST['email']),
        'phone' => trim($_POST['phone']),
        'gender' => trim($_POST['gender']),
        'zone' => trim($_POST['zone']),
        'address' => trim($_POST['address']),
        'telegram' => trim($_POST['telegram']),
        'whatsapp' => trim($_POST['whatsapp']),
        'ministry' => trim($_POST['ministry']),
        'occupation' => trim($_POST['occupation']),
        'assembly' => trim($_POST['assembly'])
      ];

      // if ($this->alumniModel->findUserByPhone3($data['phone'])) {
      //   setcookie('instructor-phone', $data['phone'], time() + (900), '/');
      //   flash('msg', 'You previously registered without a photo, kindly upload your photo..');
      //   redirect('portal/instructors');
      // } elseif ($this->alumniModel->findUserByPhone2($data['phone'])) {
      //   flash('msg', 'The phone number provided already exist, it means you have registered earlier before now and cannot register twice.', 'alert alert-danger');
      //   redirect('portal/instructors');
      // } else {
        $success = $this->alumniModel->reg_instructor($data);
        if ($success) {
          setcookie('instructor-phone', $data['phone'], time() + (1800), '/');
          flash('msg', 'Registration is Successfull.. Pls kindly upload your photo');
          redirect('portal/instructors');
        } else {
          die('Something went wrong..');
        }
      
    } else {
      // If NOT a POST
      // Init data
      $data = [
        'email' => '',
        'fullname' => '',
        'gender' => '',
        'zone' => '',
        'address' => '',
        'phone' => '',
        'whatsapp' => '',
        'telegram' => '',
        'ministry' => '',
        'occupation' => '',
        'assembly' => '',
        'error' => ''
      ];

      // Load View
      $this->view('portal/instructors', $data);
    }
  }




  public function profile_pic()
  {

    if (isset($_POST['upload'])) {
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
            'id' => $_COOKIE['instructor-phone'],
            'image' => $db_image_file
          ];
          $upload = $this->userModel->edit_pic3($data);
          if ($upload) {
             setcookie('instructor-phone', $data['phone'], time() - (900), '/');
            flash('msg', 'Registration Completed Successfully.. ');
            redirect('portal/instructors');
          } else {
            die('Something went wrong..');
          }
        } elseif ($image_type == IMAGETYPE_PNG) {
          $image_resource_id = imagecreatefrompng($file);
          $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
          imagepng($target_layer, "pics/" . $_FILES['photo']['name']);
          $db_image_file =  "pics/" . $_FILES['photo']['name'];
          $data = [
            'id' => $_COOKIE['instructor-phone'],
            'image' => $db_image_file
          ];
          $upload = $this->userModel->edit_pic3($data);
          if ($upload) {
           setcookie('instructor-phone', $data['phone'], time() - (900), '/');
            flash('msg', 'Registration Completed Successfully.. ');
            redirect('portal/instructors');
          } else {
            die('Something went wrong..');
          }
        }
      }
    }
   elseif (isset($_POST['later'])) {
      flash('msg', 'Pls.. spare some time, its compulsory you upload your photo..', 'alert alert-warning');
      redirect('portal/instructors');
    } else {
      redirect('portal/instructors'); 
    }
  }


















  public function about()
  {
    //Set Data
    $data = [
      'version' => '1.0.0'
    ];

    // Load about view
    $this->view('portal/about', $data);
  }

  public function login()
  {
    // Check if logged in
    if (isset($_COOKIE['admin-id'])) {
      redirect('admin/dashboard');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'user_name' => trim($_POST['user_name']),
        'password' => trim($_POST['password']),
        'name_err' => '',
        'password_err' => '',
      ];

      // Check for user_name
      if (empty($data['user_name'])) {
        $data['name_err'] = 'Please enter user_name.';
      }


      // Check for user
      if ($this->userModel->findAdmin($data['user_name'])) {
        // User Found
      } else {
        // No User
        $data['name_err'] = 'This user is not registered.';
      }

      // Make sure errors are empty
      if (empty($data['name_err']) && empty($data['password_err'])) {

        // Check and set logged in user
        $loggedInUser = $this->userModel->adminLogin($data['user_name'], $data['password']);

        if ($loggedInUser) {
          // User Authenticated!
          $this->createUserSession($loggedInUser);
          flash('msg', 'Login Successfull...');
        } else {
          $data['password_err'] = 'Password incorrect.';
          // Load View
          $this->view('portal/login', $data);
        }
      } else {
        // Load View
        $this->view('portal/login', $data);
      }
    } else {
      // If NOT a POST

      // Init data
      $data = [
        'user_name' => '',
        'password' => '',
        'name_err' => '',
        'password_err' => '',
      ];

      // Load View
      $this->view('portal/login', $data);
    }
  }

  // Create Session With User Info
  public function createUserSession($user)
  {
    setcookie('admin-id', $user->id, time() + (86400), '/');
    setcookie('admin-name', $user->name, time() + (86400), '/');
    redirect('admin');
  }

  // Logout & Destroy Session
  public function logout()
  {
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['admin_id'];
    setcookie('admin-id', $user_id, time() - (86400), '/');
    setcookie('admin-name', $user_name, time() - (86400), '/');
    unset($_SESSION['admin_id']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('portal/login');
  }

  // Check Logged In
  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }


  public function add_mark()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'name' => $_POST['fullname'],
        'score' => $_POST['score'],
        'mitre_set' => $_POST['mitre_set'],
        'std_id' => $_POST['std_id'],
        'conclave' => $_POST['conclave'],
        'paper' => $_POST['paper'],
        'zone' => $_POST['zone']
      ];
      $input = $this->attendanceModel->recordPaper($data);
      if ($input) {
        echo "
                  <div class='flash-msg alert alert-success'>
                    Score recorded Successfully.. </span>
                </div>
                
            ";
      } else {
        echo "
                  <div class='flash-msg alert alert-danger'>
                    Something went wrong.. </span>
                </div>

            ";
      }
    } //post submit ends

    else {
      die('Something went wrong..');
    }
  }

  public function settings()
  {
    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $data = [
        'senior' => $_POST['senior_set'],
        'junior' => $_POST['junior_set'],
        's_conclave' => $_POST['s_conclave'],
        'j_conclave' => $_POST['j_conclave']

      ];
      $success = $this->databaseModel->updateSettings($data);
      if ($success) {
        //flash('msg', 'Success..');
        $redirect = URLROOT . '/portal/settings';
        echo "
                    <div class='alert alert-success'>
                      Successfull...  <span class='spinner-border spinner-border-sm'> </span>
                    </div>
                    <meta http-equiv='refresh' content='1; $redirect'>
                  ";
      } else {
        echo "
                  <div class='alert alert-danger'>
                    Something went wrong... Try again later
                  </div>
                  
                ";
      }
    } else {
      //Set Data
      $conclaves = $this->userModel->getConclaves();
      $data = [
        'conclaves' => $conclaves
      ];

      // Load about view
      $this->view('portal/settings', $data);
    }
  }
}
