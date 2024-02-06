<?php
  class Alumni extends Controller{
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
        'description' => ''
      ];

      // Load homepage/index view
      $this->view('alumni/index', $data);
    }

//Load About View
    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('alumni/about', $data);
    }

//ALUMNI REGISTRATION
    public function register(){
  
        // Check if POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $year = date('Y');
          $fullname = trim($_POST['surname'])." ".trim($_POST['other_names']);
          $data = [
            'name' => $fullname,
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone']),
            'gender' => trim($_POST['gender']),
            'zone' => trim($_POST['zone']),
            'address' => trim($_POST['address']),
            'state' => trim($_POST['state']),
            'telegram' => trim($_POST['telegram']),
            'whatsapp' => trim($_POST['whatsapp']),
            'ministry' => trim($_POST['ministry']),
            'occupation' => trim($_POST['occupation']),
            'assembly' => trim($_POST['assembly']),
            'year' => $year
          ];
          //validate Username..
          if ($this->alumniModel->findUserByPhone($data['phone'])) {
          
           echo '
                  <div class="alert alert-danger">
                    Someone already registered with same phone number..
                  </div>
                ';
          }else{
            //All validation passed...
            $success = $this->alumniModel->register($data);
            if ($success) {
              $redirect = URLROOT.'/alumni';
              echo '
                    <div class="alert alert-success">
                      Registration Successfull, Redirecting...  <span class="spinner-border spinner-border-sm"> </span>
                    </div>
                    <meta http-equiv="refresh" content="4; <?=$redirect?>">
                  ';
            
          }else{
            echo '
                  <div class="alert alert-danger">
                    Something went wrong... Try again later
                  </div>
                  
                ';
          }

        }
  
      } else {
          // If NOT a POST
      $states = $this->alumniModel->getStates();
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
          $this->view('alumni/register', $data);
        }
      }
  



















  }