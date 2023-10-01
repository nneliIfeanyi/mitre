<?php
  class Students extends Controller{
    private $userModel;

    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      redirect('portal');
    }


    public function registration(){

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(empty($_POST['call_sensed'])){
          $_POST['call_sensed'] = 'Nill';
  
        }elseif(empty($_POST['into_calling'])){
          $_POST['into_calling'] = 'Nill';
  
        }elseif(empty($_POST['c_r_t'])){
          $_POST['c_r_t'] = 'Nill';
  
        } if(empty($_POST['why_mitre'])){
          $_POST['why_mitre'] = 'Nill';
  
        }elseif(empty($_POST['ref_info'])){
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
        $allowTypes = array('jpg','png','jpeg','PNG'); 
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
       // echo $data['into_calling'];
       //echo $data['c_r_t'];
      if(empty($data['surname'])){
        $data['name_err'] = 'Please enter your surname';
        $this->view('students/registration', $data);

      }elseif(empty($data['other_names'])){
          $data['name_err2'] = 'Please enter your other names';
          $this->view('students/registration', $data);
      }elseif(empty($data['age'])){
          $data['age_err'] = 'Age is required..';     
          $this->view('students/registration', $data);

      }elseif(empty($data['gender'])){
        $data['gen_err'] = 'Kindly select an option..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['m_status'])){
        $data['mar_err'] = 'Kindly select an option..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['s_o_r'])){
        $data['s_o_r_err'] = 'This field is required..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['zone'])){
        $data['zone_err'] = 'This field is required..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['address'])){
        $data['add_err'] = 'This field is required..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['mobile_num'])){
        $data['num_err'] = 'This field is required..';     
        $this->view('students/registration', $data);

      }elseif(strlen($data['mobile_num']) > 11){
        $data['num_err'] = 'Phone number must be at least 11 digits..';     
        $this->view('students/registration', $data);

      }elseif(strlen($data['mobile_num']) < 11){
        $data['num_err'] = 'Phone number must be at least 11 digits..';     
        $this->view('students/registration', $data);

      }elseif($this->userModel->findUserByPhone($data['mobile_num'])){
        $data['num_err'] = "Phone number is already taken.. you cannot register twice";
        $this->view('students/registration', $data);

      }elseif(empty($data['church'])){
        $data['ass_err'] = 'Let us know the church you attend..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['church_role'])){
        $data['role_err'] = 'Pls. fill out this field..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['new_birth'])){
        $data['BA_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['H_baptism'])){
        $data['HG_err'] = 'Kindly select an option..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['prior_mitre'])){
        $data['prior_err'] = 'Kindly select an option..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['occupation'])){
        $data['occ_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['lang_speak'])){
        $data['lang_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['lang_write'])){
        $data['lang1_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['litracy'])){
        $data['lit_err'] = 'Kindly select an option..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['edu_qual'])){
        $data['cert_err'] = 'Kindly select an option..';     
        $this->view('students/registration', $data);

      }elseif(empty($data['grad_year'])){
        $data['grad_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['institution'])){
        $data['inst_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['discipler'])){
        $data['discipler_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($passport)){
        $data['pass_err'] = 'Pls. upload your passport photograph..';     
        $this->view('students/registration', $data);
        
      } elseif(!in_array($fileType, $allowTypes)) { 
        $data['pass_err'] = 'Image format not supported.. allowed formats are jpg, png or jpeg';     
        $this->view('students/registration', $data);
          
      }elseif(empty($data['ref_name'])){
        $data['ref1_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['ref_phone'])){
        $data['ref2_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['ref_address'])){
        $data['ref3_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }elseif(empty($data['ref_duration'])){
        $data['ref4_err'] = 'This field is required';     
        $this->view('students/registration', $data);

      }else{      
          // Compress size and upload image 
        compressImage($imageTemp, $imageUploadPath, 9);
        if ($this->userModel->register($data)) {
          flash('success', 'Registration Successfull');
          redirect('portal');
        }else{
          die('something went wrong');
        }
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