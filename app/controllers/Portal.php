<?php
  class Portal extends Controller{
    public function __construct(){
     
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
  }