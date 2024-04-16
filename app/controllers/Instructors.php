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


     // Load Homepage
     public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->userModel->delete_instructor($id)){
          flash('msg', 'Instructor Deleted','alert alert-danger');
          redirect('admin/instructors');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('admin/instructors');
      }

      // Load homepage/index view
      //$this->view('admin/del_media', $data);
    }

  }