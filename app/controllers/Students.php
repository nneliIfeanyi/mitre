<?php
  class Students extends Controller{
    private $userModel;

    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      redirect('welcome');
    }


    public function registration(){

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $fullname = trim($_POST['surname']) . ' ' . trim($_POST['other_names']);

        $info = trim($_POST['age']) . ':' . $_POST['gender'] . ':' . $_POST['m_status'];

        $assembly = trim($_POST['church']) . ':' . trim($_POST['church_role']);

        $spiritual = trim($_POST['new_birth']) . ':' . trim($_POST['H_baptism']);

        $into_call = trim($_POST['into_calling']) . ':' . trim($_POST['c_r_t']);

        $prior_attended = trim($_POST['prior_mitre']) . ':' . trim($_POST['why_mitre']);

        $academics = $_POST['edu_qual'] . ':' . trim($_POST['grad_year']) . ':' . trim($_POST['institution']);

        $passport = basename($_FILES["passport"]["name"]);
        $uploadPath = "uploaded/";
        $db_img =  $uploadPath . $passport;
        $ref_dura_info = trim($_POST['ref_duration']) . ':' . trim($_POST['ref_info']);

          $data = [
          'set' => '17',
          'fullname' => $fullname,
          'info' => $info,
          'surname' => trim($_POST['surname']),
          'other_names' => trim($_POST['other_names']),
          'age' => trim($_POST['age']),
          'gender' => $_POST['gender'],
          'm_status' => $_POST['m_status'],
          's_o_r' => trim($_POST['s_o_r']),
          'address' => trim($_POST['address']),
          'mobile_num' => trim($_POST['mobile_num']),
          'whatsapp_num' => trim($_POST['whatsapp_num']),
          'assembly' => $assembly,
          'church' => trim($_POST['church']),
          'church_role' => trim($_POST['church_role']),
          'spiritual' => $spiritual,
          'new_birth' => trim($_POST['new_birth']),
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
          'num_err' => '',
          's_o_r_err' => ''
        ];
echo $db_img;
        $imageUploadPath = $uploadPath . $passport;
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','PNG'); 
        if(!in_array($fileType, $allowTypes)) { 
          
          flash('image_invalid', 'INVALID IMAGE TYPE', 'alert alert-danger');
          //redirect('users/register');
        }else{ 
          $imageTemp = $_FILES["passport"]["tmp_name"]; 
            
          // Compress size and upload image 
        compressImage($imageTemp, $imageUploadPath, 9);
        }

        if ($this->userModel->register($data)) {
          flash('success', 'Registration Successfull');
          redirect('students/registration');
        }else{
          die('something went wrong');
        }
        
      }else {
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
          'address' => '',
          'whatsapp_num' => '',
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

    public function register(){

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
 
        /*$data = [
          'surname' => trim($_POST['surname']),
          'other_names' => trim($_POST['other_names']),
          'age' => trim($_POST['age']),
          'gender' => trim($_POST['gender']),
          'marital_status' => trim($_POST['marital_status']),
          's_o_residence' => trim($_POST['s_o_residence']),
          'address' => trim($_POST['address']),
          'mobile_num' => trim($_POST['mobile_num']),
          'whatsapp_num' => trim($_POST['whatsapp_num']),
          'occupation' => trim($_POST['occupation']),
          'lang_speak' => trim($_POST['lang_speak']),
          'lang_write' => trim($_POST['lang_write']),
          'name_err' => '',
          'num_err' => '',
        ];*/

        // Validate Names
        if(empty($_POST['surname'])){
            $data['name_err'] = 'Please enter a name';
            // Validate name
            //if(empty($data['other_names'])){
             // $data['name_err'] = 'Please enter a name';
            //}
        } /*else{
          // Check Email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken.';
          }
        }*/

        // Validate phone number
        if(empty($data['mobile_num'])){
          $num_err = 'Please enter your phone number.';     
        } elseif(strlen($data['mobile_num']) < 11){
          $data['num_err'] = 'Phone number must have at least 11 characters.';
        }

        // Validate confirm password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password.';     
        } else{
            if($data['password'] != $data['confirm_password']){
                $data['confirm_password_err'] = 'Password do not match.';
            }
        }
         
        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['num_err']) ) {
          // SUCCESS - Proceed to insert

          //Execute
          if($this->userModel->register($data)){
            // Redirect to login
            flash('register_success', 'You are now registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
           
        } else {
          // Load View
          $this->view('students/register', $data);
        }
      } else {
        // IF NOT A POST REQUEST

        // Init data
        $data = [
          'surname' => '',
          'other_names' => '',
          'age' => '',
          'mobile_num' => '',
          's_o_residence' => '',
          'address' => '',
          'whatsapp_num' => '',
          'occupation' => '',
          'lang_write' => '',
          'lang_speak' => ''
        ];

        // Load View
        $this->view('students/register', $data);
      }
    }

    public function login(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('posts');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),        
          'email_err' => '',
          'password_err' => '',       
        ];

        // Check for email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email.';
        }

        // Check for name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name.';
        }

        // Check for user
        if($this->userModel->findUserByEmail($data['email'])){
          // User Found
        } else {
          // No User
          $data['email_err'] = 'This email is not registered.';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // User Authenticated!
            $this->createUserSession($loggedInUser);
           
          } else {
            $data['password_err'] = 'Password incorrect.';
            // Load View
            $this->view('students/login', $data);
          }
           
        } else {
          // Load View
          $this->view('students/login', $data);
        }

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('students/login', $data);
      }
    }

    // Create Session With User Info
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email; 
      $_SESSION['user_name'] = $user->name;
      redirect('posts');
    }

    // Logout & Destroy Session
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
  }