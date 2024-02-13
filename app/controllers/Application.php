<?php
  class Application extends Controller{
    private $userModel;
    private $databaseModel;

   public function __construct(){
    $this->userModel = $this->model('User');
    $this->databaseModel = $this->model('Databaze');

    }



    public function index(){
     redirect('portal');
    }


































  }




  