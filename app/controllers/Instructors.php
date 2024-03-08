<?php
  class Instructors extends Controller{
    private $userModel;
    private $databaseModel;
    public $alumniModel;

     public function __construct(){
      $this->userModel = $this->model('User');
      $this->alumniModel = $this->model('Alumnus');
      $this->databaseModel = $this->model('Databaze');

      }



    public function index(){
     redirect('portal/instructors');
    }




     public function edit($id){
      $student = $this->alumniModel->getUserById($id);
      //Set Data
      $data = [  
        'student' => $student
      ];

      $this->view('instructors/edit', $data);
    }

  }