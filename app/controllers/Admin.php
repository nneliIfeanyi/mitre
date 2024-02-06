<?php
  class Admin extends Controller{
    private $userModel;
    private $alumniModel;
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->alumniModel = $this->model('Alumnus');
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

     // Load Dashoard
    public function dashboard(){
      //resultSets
      $students = $this->userModel->allStudents();
      //rowCounts
      $total = $this->userModel->totals();
      
      //Set Data
      $data = [
       'total' => $total,  
       'students' => $students
      ];

      // Load homepage/dashboard view
      $this->view('admin/dashboard', $data);
    }

    //Load All Kaduna Students
    public function all_kaduna(){
    $all_kaduna = $this->userModel->totalKaduna();
    $kaduna_students = $this->userModel->allKaduna();
      //Set Data
      $data = [
        'students' => $kaduna_students,
        'rowCount' => $all_kaduna
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/all_kaduna', $data);
    }

    public function all_minna(){
    $all_minna = $this->userModel->totalMinna();
    $minna_students = $this->userModel->allMinna();
      //Set Data
      $data = [
        'students' => $minna_students,
        'rowCount' => $all_minna
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/all_minna', $data);
    }

    //Load All Ufuma Students
    public function all_ufuma(){
    $all_ufuma = $this->userModel->totalufuma();
    $ufuma_students = $this->userModel->allufuma();
      //Set Data
      $data = [
        'students' => $ufuma_students,
        'rowCount' => $all_ufuma
      ];

      // Load homepage/all_ufuma view
      $this->view('admin/all_ufuma', $data);
    }

    //Load All Alumni
    public function alumni_2024(){
    $total_alumni = $this->alumniModel->total_alumni();
    $alumni_total = $this->alumniModel->alumni_total();
      //Set Data
      $data = [
        'students' => $alumni_total,
        'rowCount' => $total_alumni
      ];

      // Load homepage/all_ufuma view
      $this->view('admin/alumni_2024', $data);
    }

   

    public function all_registered(){
      $all_ufuma = $this->userModel->totalUfuma();
      $all_kaduna = $this->userModel->totalKaduna();
      $all_minna = $this->userModel->totalMinna();
      $total = $this->userModel->totals();
      $students = $this->userModel->allStudents();
        //Set Data
        $data = [
          'rowCount' => $total,  
          'students' => $students,
          'all_minna' => $all_minna,
          'all_kaduna' => $all_kaduna,
          'all_ufuma' => $all_ufuma,
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