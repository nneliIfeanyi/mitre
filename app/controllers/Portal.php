<?php
  class Portal extends Controller{
    private $userModel;
    private $databaseModel;
    private $attendanceModel;
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->databaseModel = $this->model('Databaze');
      $this->attendanceModel = $this->model('Attendanze');
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
              flash('msg','Login Successfull...');
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
        setcookie('admin-id', $user->id, time()+(86400), '/');
        setcookie('admin-name', $user->name, time()+(86400), '/');
        redirect('admin');   
      }
  
      // Logout & Destroy Session
      public function logout(){
        $user_name = $_SESSION['user_name'];
        $user_id = $_SESSION['admin_id'];
        setcookie('admin-id', $user_id, time()-(86400), '/');
        setcookie('admin-name', $user_name, time()-(86400), '/');
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


      public function add_mark(){
        
        if(isset($_POST['submit_result'])){
          $name = $_POST['fullname'];
          $score = $_POST['score'];
          $set = $_POST['mitre_set'];
          $std_id = $_POST['std_id'];
          $conclave = $_POST['conclave'];
          $paper = $_POST['paper'];
          $zone = $_POST['zone'];
          
           foreach($name as $index=>$details ){
            $data = [
              'name' => $name[$index],
              'score' => $score[$index],
              'std_id' => $std_id[$index],
              'conclave' => $conclave[$index],
              'paper' => $paper[$index],
              'mitre_set' => $set[$index],
              'zone' => $zone[$index]
            ];
             
            
             $this->attendanceModel->recordPaper($data);
             flash('msg', 'Added scores is successfull..');
             redirect('portal/add_mark');
         
           }//end foreach loop
        
      }elseif(isset($_POST['submit_update'])){ 
        // echo "Tis an update string";
          $name = $_POST['fullname'];
          $score = $_POST['score'];
          $set = $_POST['mitre_set'];
          $std_id = $_POST['std_id'];
          $conclave = $_POST['conclave'];
          $paper = $_POST['paper'];
          $zone = $_POST['zone'];
          
           foreach($name as $index=>$details ){
            $data = [
              'name' => $name[$index],
              'score' => $score[$index],
              'std_id' => $std_id[$index],
              'conclave' => $conclave[$index],
              'paper' => $paper[$index],
              'mitre_set' => $set[$index],
              'zone' => $zone[$index]
            ];
             
            
             $this->attendanceModel->updatePaper($data);
             flash('msg', 'Updated scores is successfull..');
             redirect('portal/add_mark');
         
           }//end foreach loop
      }elseif(isset($_POST['method2'])){ 
          $data = [ 
          'name' => $_POST['fullname'],
          'score' => $_POST['score'],
          'mitre_set' => $_POST['mitre_set'],
          'std_id' => $_POST['std_id'],
          'conclave'=> $_POST['conclave'],
          'paper' => $_POST['paper'],
          'zone' => $_POST['zone']
        ];
          $input = $this->attendanceModel->recordPaper($data);
          if ($input) {
            flash('msg', 'Added scores is successfull..');
            //$redirect = URLROOT.'/admin/add_scores';
              echo "
                    <div class='alert alert-success'>
                      Registration Successfull...  <span class='spinner-border spinner-border-sm'> </span>
                    </div>
                    <meta http-equiv='refresh' content='3; URLROOT/mitre/admin/add_scores?mitre_set=16&conclave=2&zone=Kaduna&paper=term_paper'>
                  ";
          }
           
      }//post submit ends
        else{
           $data = '';
          // Load about view
          $this->view('portal/add_mark', $data);

        }
    }

    public function settings(){
      // Check if POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          $data = [
            'senior' => $_POST['senior_set'],
            'junior' => $_POST['junior_set'],
            's_conclave' => $_POST['s_conclave'],
            'j_conclave' => $_POST['j_conclave']
            
          ];
          $success = $this->databaseModel->updateSettings($data);
          if ($success) {
              //flash('msg', 'Success..');
              $redirect = URLROOT.'/portal/settings';
              echo "
                    <div class='alert alert-success'>
                      Successfull...  <span class='spinner-border spinner-border-sm'> </span>
                    </div>
                    <meta http-equiv='refresh' content='1; $redirect'>
                  ";
            
          }else{
            echo "
                  <div class='alert alert-danger'>
                    Something went wrong... Try again later
                  </div>
                  
                ";
          }
  
      }else{ 
      //Set Data
      $conclaves = $this->userModel->getConclaves();
      $data = [
        'conclaves' => $conclaves
      ];

      // Load about view
      $this->view('admin/settings', $data);
    }
  }

  }