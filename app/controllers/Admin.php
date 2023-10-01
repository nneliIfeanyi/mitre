<?php
  class Admin extends Controller{
    private $userModel;

    public function __construct(){
      $this->userModel = $this->model('User');
    }

    // Load Homepage
    public function index(){
      //Set Data
      $data = [
        'title' => '',
        'description' => 'Administrative Portal'
      ];

      // Load homepage/index view
      $this->view('admin/index', $data);
    }

    public function progress(){
   
      //Set Data
      $data = [
      
      ];

      // Load homepage/index view
      $this->view('admin/progress', $data);
    }

    public function all_registered(){
        $total = $this->userModel->totals();
        $students = $this->userModel->allStudents();
        //Set Data
        $data = [
          'total' => $total,  
          'students' => $students
        ];
  
        // Load homepage/index view
        $this->view('admin/all_registered', $data);
      }

      public function more_details($id){
        $student = $this->userModel->getUserById($id);
        //Set Data
        $data = [  
          'student' => $student
        ];
  
        // Load homepage/index view
        $this->view('admin/more_details', $data);
      }

    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('admin/about', $data);
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
            $data['email_err'] = 'This user is not registered.';
          }
  
          // Make sure errors are empty
          if(empty($data['email_err']) && empty($data['password_err'])){
  
            // Check and set logged in user
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
  
            if($loggedInUser){
              // User Authenticated!
              $this->createUserSession($loggedInUser);
              flash('login','Login Successfull...');
            } else {
              $data['password_err'] = 'Password incorrect.';
              // Load View
              $this->view('admin/login', $data);
            }
             
          } else {
            // Load View
            $this->view('admin/login', $data);
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
          $this->view('admin/login', $data);
        }
      }
  
      // Create Session With User Info
      public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email; 
        $_SESSION['user_name'] = $user->name;
        redirect('admin');
      }
  
      // Logout & Destroy Session
      public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('admin/login');
      }
  
      // Check Logged In
      public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
          return true;
        } else {
          return false;
        }
      }

      // Delete Post
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->userModel->delete_reg($id)){
          // Redirect to login
          flash('del_msg', 'Candidate Removed','alert alert-danger');
          redirect('admin/all_registered');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('admin/all_registered');
      }
    }

  }