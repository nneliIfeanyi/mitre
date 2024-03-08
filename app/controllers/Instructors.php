<?php
  class Instructors extends Controller{
    private $userModel;
    private $databaseModel;
    public $attendanceModel;

     public function __construct(){
      $this->userModel = $this->model('User');
      $this->attendanceModel = $this->model('Attendanze');
      $this->databaseModel = $this->model('Databaze');

      }



    public function index(){
     redirect('portal/instructors');
    }



  }