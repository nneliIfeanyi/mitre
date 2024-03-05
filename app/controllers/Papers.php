<?php
  class Papers extends Controller{
    public $userModel;
    public $databaseModel;
    public $attendanceModel;
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->databaseModel = $this->model('Databaze');
      $this->attendanceModel = $this->model('Attendanze');
    }

    // Load Homepage
    public function edit($id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $added = $this->attendanceModel->select_mark($id);
        $data = [
          'score' => $_POST['new_mark'],
          'id' => $id,
           'mark' => $added
        ];
        $updated = $this->attendanceModel->updatePaper2($data);
        if ($updated) {
          flash('msg', 'Updated Successfully');
          redirect('papers/'.$data['mark']->paper.'_'.$data['mark']->zone.'/'.$data['mark']->mitre_set);
        }else{
          die('Something went wrong..');
        }
      }else{
        $added = $this->attendanceModel->select_mark($id);
        //Set Data
        $data = [
          'mark' => $added,
        ];

        // Load homepage/index view
        $this->view('papers/edit', $data);
      }
    }

    ////////////
    //////////
    ////////

    public function long_paper_kaduna($set){
    
        $all = $this->databaseModel->allKaduna($set);
        
        //Set Data
        $data = [
          'set' => $set,
          'students' => $all
      
        ];
        $this->view('papers/long_paper_kaduna', $data);
    
    }

    public function long_paper_minna($set){
    
        $all = $this->databaseModel->allMinna($set);
        
        //Set Data
        $data = [
          'set' => $set,
          'students' => $all
      
        ];
        $this->view('papers/long_paper_minna', $data);
    
    }

    public function long_paper_ufuma($set){
    
        $all = $this->databaseModel->allUfuma($set);
        
        //Set Data
        $data = [
          'set' => $set,
          'students' => $all
      
        ];
        $this->view('papers/long_paper_ufuma', $data);
    
    }


    // End Long Paper // 

   public function short_paper_ufuma($set){
    
        $all = $this->databaseModel->allUfuma($set);
        
        //Set Data
        $data = [
          'set' => $set,
          'students' => $all
      
        ];
        $this->view('papers/short_paper_ufuma', $data);
    
    } 

    public function short_paper_minna($set){
    
        $all = $this->databaseModel->allMinna($set);
        
        //Set Data
        $data = [
          'set' => $set,
          'students' => $all
      
        ];
        $this->view('papers/short_paper_minna', $data);
    
    }


    public function short_paper_kaduna($set){
    
        $all = $this->databaseModel->allKaduna($set);
        
        //Set Data
        $data = [
          'set' => $set,
          'students' => $all
      
        ];
        $this->view('papers/short_paper_kaduna', $data);
    
    }










  }