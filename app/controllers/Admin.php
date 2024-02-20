<?php
  class Admin extends Controller{
    private $userModel;
    private $alumniModel;
    public $databaseModel;
    public $attendanceModel;
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->alumniModel = $this->model('Alumnus');
      $this->databaseModel = $this->model('Databaze');
      $this->attendanceModel = $this->model('Attendanze');

      if (!isset($_COOKIE['id']) AND !isset($_COOKIE['name']) ) {
        redirect('portal/login');
      }else{
        $_SESSION['admin_id'] = $_COOKIE['id'];
        $_SESSION['user_name'] = $_COOKIE['name'];
      }

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
    // $students = $this->databaseModel->allStudents();
    // $total = $this->databaseModel->totals();
    
    //Set Data
    $data = [
     // 'total' => $total,  
     // 'students' => $students
    ];

    // Load homepage/dashboard view
    $this->view('admin/dashboard', $data);
  }

  //Load All Students
    public function students($set){
    $total = $this->databaseModel->totals($set);
    $all = $this->databaseModel->allStudents($set);
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all,
        'rowCount' => $total
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/students', $data);
    }

    public function minna($set){
    $total = $this->databaseModel->totalMinna($set);
    $all = $this->databaseModel->allMinna($set);
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all,
        'rowCount' => $total
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/minna', $data);
    }

    public function kaduna($set){
    $total = $this->databaseModel->totalKaduna($set);
    $all = $this->databaseModel->allKaduna($set);
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all,
        'rowCount' => $total
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/kaduna', $data);
    }

    public function ufuma($set){
    $total = $this->databaseModel->totalUfuma($set);
    $all = $this->databaseModel->allUfuma($set);
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all,
        'rowCount' => $total
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/ufuma', $data);
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



      public function more_details($id){
        $student = $this->userModel->getUserById($id);
        //Set Data
        $data = [  
          'student' => $student
        ];
  
        // Load homepage/index view
        $this->view('admin/more_details', $data);
      }

      public function add($set){
  
        // Check if POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
          $fullname = trim($_POST['surname'])." ".trim($_POST['other_names']);
          $data = [
            'name' => $fullname,
            'set' => $_POST['set'],
            'surname' => trim($_POST['surname']),
            'other_names' => trim($_POST['other_names']),
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone']),
            'gender' => trim($_POST['gender']),
            'zone' => trim($_POST['zone']),
            'address' => trim($_POST['address']).' '.trim($_POST['state']),
            //'telegram' => trim($_POST['telegram']),
            'whatsapp' => trim($_POST['whatsapp']),
            'ministry' => trim($_POST['ministry']),
            'occupation' => trim($_POST['occupation']),
            'assembly' => trim($_POST['assembly']),
            'error' => ''
          ];
          //validate Username..
          if ($this->userModel->findUserByPhone($data['phone'])) {
            $data['error'] = 'Phone number already exist you cannot register twice..';
            $this->view('admin/add', $data);
          }else{
            //All validation passed...
            $success = $this->userModel->register_by_admin($data);
            if ($success) {
              flash('msg', 'Registration Successfull..');
              redirect('admin/add/'.$set);
            
            }else{
              die('Something went wrong..');
            }
          }
  
      } else {
          // If NOT a POST
      $states = $this->userModel->getStates();
          // Init data
          $data = [
            'set' => $set,
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
            'error' => ''
          ];
  
          // Load View
          $this->view('admin/add', $data);
        }
      }

    
    public function culmulative(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mitre_set = trim($_POST['set']);
        $conclave = trim($_POST['conclave']);       
        $zone = $_POST['zone'];

        $added = $this->attendanceModel->check_scores($mitre_set,$conclave,$zone);
        $data = [
          'scores' => $added,
          'set' => $mitre_set,
          'conclave' => $conclave,
          'zone' => $zone,
          'paper1' => 'short_paper',
          'paper2' => 'long_paper',
          'paper3' => 'term_paper',
          'paper4' => 'Summary'
        ];
        $this->view('admin/view_scores', $data);
      }else{

        //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('admin/culmulative', $data);

      }
    }


    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('admin/about', $data);
    }

    public function progress(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('admin/progress', $data);
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