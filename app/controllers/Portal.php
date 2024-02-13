<?php
  class Portal extends Controller{
    private $userModel;
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    // Load Homepage
    public function index(){

      //Set Data
      $data = [
        'title' => '',
        'description' => ''
      ];

      // Load homepage/index view
      $this->view('portal/index', $data);
    }

    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('portal/about', $data);
    }

    public function login(){
        // Check if logged in
        if($this->isLoggedIn()){
          redirect('admin');
        }
  
        // Check if POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST
          $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          $data = [       
            'user_name' => trim($_POST['user_name']),
            'password' => trim($_POST['password']),        
            'name_err' => '',
            'password_err' => '',       
          ];
  
          // Check for user_name
          if(empty($data['user_name'])){
            $data['name_err'] = 'Please enter user_name.';
          }
  
  
          // Check for user
          if($this->userModel->findAdmin($data['user_name'])){
            // User Found
          } else {
            // No User
            $data['name_err'] = 'This user is not registered.';
          }
  
          // Make sure errors are empty
          if(empty($data['name_err']) && empty($data['password_err'])){
  
            // Check and set logged in user
            $loggedInUser = $this->userModel->adminLogin($data['user_name'], $data['password']);
  
            if($loggedInUser){
              // User Authenticated!
              $this->createUserSession($loggedInUser);
              flash('login','Login Successfull...');
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
      public function createUserSession($user){
        $_SESSION['admin_id'] = $user->id; 
        $_SESSION['user_name'] = $user->name;
        redirect('admin');
      }
  
      // Logout & Destroy Session
      public function logout(){
        unset($_SESSION['admin_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('portal/login');
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