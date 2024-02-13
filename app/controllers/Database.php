<?php
  class Database extends Controller{
    public $dataModel;
    
    public function __construct(){
      $this->dataModel = $this->model('Databaze');
    }

    // Load Homepage
    public function index($set){
      //Set Data
      $data = [
        'set' => $set,
        
      ];

      // Load homepage/index view
      $this->view('database/index', $data);
    }


}