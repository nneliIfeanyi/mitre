<?php
  class Attendanze {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }


     public function recordAttendance($data){
       $this->db->query('INSERT INTO attendance (std_id, name, day, mitre_set, conclave, zone ) VALUES (:std_id, :name, :day, :mitre_set, :conclave,:zone)');

      // Bind Values
      $this->db->bind(':std_id', $data['std_id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':day', $data['day']);
      $this->db->bind(':mitre_set', $data['mitre_set']);
      $this->db->bind(':conclave', $data['conclave']);
      $this->db->bind(':zone', $data['zone']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


     // 
     /////////
     //
     public function recordAttendance1($data){
       $this->db->query('INSERT INTO attendance (std_id, name, day, mitre_set, conclave, zone, count ) VALUES (:std_id, :name, :day, :mitre_set, :conclave,:zone, :count)');

      // Bind Values
      $this->db->bind(':std_id', $data['std_id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':day', $data['day']);
      $this->db->bind(':mitre_set', $data['mitre_set']);
      $this->db->bind(':conclave', $data['conclave']);
      $this->db->bind(':zone', $data['zone']);
      $this->db->bind(':count', 'morning');
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function recordAttendance2($data){
       $this->db->query('INSERT INTO attendance (std_id, name, day, mitre_set, conclave, zone, count ) VALUES (:std_id, :name, :day, :mitre_set, :conclave,:zone, :count)');

      // Bind Values
      $this->db->bind(':std_id', $data['std_id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':day', $data['day']);
      $this->db->bind(':mitre_set', $data['mitre_set']);
      $this->db->bind(':conclave', $data['conclave']);
      $this->db->bind(':zone', $data['zone']);
      $this->db->bind(':count', 'evening');
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

     //
     //////
     //
    public function check_attendance1($id, $day, $set, $conclave){
      $this->db->query("SELECT * FROM attendance WHERE std_id = :id AND day = :day AND conclave = :conclave AND mitre_set = :mitre_set AND count = :count");

      $this->db->bind(':id', $id);
      $this->db->bind(':day', $day);
      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $this->db->bind(':count', 'morning');
      $row = $this->db->single();

      return $row;
    }
    public function check_attendance2($id, $day, $set, $conclave){
      $this->db->query("SELECT * FROM attendance WHERE std_id = :id AND day = :day AND conclave = :conclave AND mitre_set = :mitre_set AND count = :count");

      $this->db->bind(':id', $id);
      $this->db->bind(':day', $day);
      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $this->db->bind(':count', 'evening');
      $row = $this->db->single();

      return $row;
    }

    public function check_attendance($id, $day, $set, $conclave){
      $this->db->query("SELECT * FROM attendance WHERE std_id = :id AND day = :day AND conclave = :conclave AND mitre_set = :mitre_set");

      $this->db->bind(':id', $id);
      $this->db->bind(':day', $day);
      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $row = $this->db->single();

      return $row;
    }


     //
     //////
     //
     public function reverse_attendance($data){
      // Prepare Query 
      $this->db->query('DELETE FROM attendance WHERE std_id = :std_id AND day = :day AND conclave = :conclave AND mitre_set = :mitre_set');

       // Bind Values
      $this->db->bind(':std_id', $data['std_id']);
      $this->db->bind(':day', $data['day']);
      $this->db->bind(':mitre_set', $data['mitre_set']);
      $this->db->bind(':conclave', $data['conclave']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


     // 
     /////////
     //
     public function recordPaper($data){
       $this->db->query('INSERT INTO marks (std_id, name, mitre_set, conclave, paper, score, zone ) VALUES (:std_id, :name, :mitre_set, :conclave, :paper, :score, :zone)');

      // Bind Values
      $this->db->bind(':std_id', $data['std_id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':mitre_set', $data['mitre_set']);
      $this->db->bind(':conclave', $data['conclave']);
      $this->db->bind(':paper', $data['paper']);
      $this->db->bind(':score', $data['score']);
      $this->db->bind(':zone', $data['zone']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function check_scores($set,$conclave,$zone){
      $this->db->query("SELECT DISTINCT std_id FROM marks WHERE conclave = :conclave AND mitre_set = :mitre_set AND zone = :zone ");

      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $this->db->bind(':zone', $zone);
      
      $results = $this->db->resultset();
       //Check Rows
      return $results;
     
      
    }

    public function check_mark($set,$conclave,$paper,$id){
      $this->db->query("SELECT * FROM marks WHERE conclave = :conclave AND mitre_set = :mitre_set AND paper = :paper AND std_id = :id ");

      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $this->db->bind(':paper', $paper);
      $this->db->bind(':id', $id);
      $row = $this->db->single();
       //Check Rows
      return $row;
     
      
    }

    public function count_added($set,$conclave,$paper,$zone){
      $this->db->query("SELECT * FROM marks WHERE conclave = :conclave AND mitre_set = :mitre_set AND paper = :paper AND zone = :zone AND score != '' ");

      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $this->db->bind(':paper', $paper);
      $this->db->bind(':zone', $zone);
      $this->db->resultset();
       //Check Rows
      return $this->db->rowCount(); 
    }


    public function select_mark($id){
      $this->db->query("SELECT * FROM marks WHERE id = :id ");

      $this->db->bind(':id', $id);
      $row = $this->db->single();
       //Check Rows
      return $row;
    }



    // Update score
    public function updatePaper($data){
      // Prepare Query
      $this->db->query('UPDATE marks SET score = :score WHERE std_id = :id AND zone = :zone AND paper = :paper AND mitre_set = :mitre_set AND conclave = :conclave');

      // Bind Values
      $this->db->bind(':id', $data['std_id']);
      $this->db->bind(':score', $data['score']);
      $this->db->bind(':zone', $data['zone']);
      $this->db->bind(':mitre_set', $data['mitre_set']);
      $this->db->bind(':conclave', $data['conclave']);
      $this->db->bind(':paper', $data['paper']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Update score
    public function updatePaper2($data){
      // Prepare Query
      $this->db->query('UPDATE marks SET score = :score WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':score', $data['score']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


     public function getIndividualScore($id,$paper,$set,$conclave){
      $this->db->query("SELECT score FROM marks WHERE std_id = :id AND paper = :paper AND mitre_set = :mitre_set AND conclave = :conclave");
      $this->db->bind(':id', $id);
      $this->db->bind(':paper', $paper);
      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }
 
     public function getNames($id){
      $this->db->query("SELECT name FROM marks WHERE std_id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }

    public function getAttendance($id, $set,$conclave){
      $this->db->query("SELECT * FROM attendance WHERE std_id = :std_id AND mitre_set = :mitre_set AND conclave = :conclave AND day != :arrival");
      $this->db->bind(':std_id', $id);
      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $this->db->bind(':arrival', 'Arrival');
      $this->db->resultset();
      $row = $this->db->rowCount();

      return $row;
    }

     
     public function get_attendance($set,$conclave,$zone){
      $this->db->query("SELECT DISTINCT name FROM attendance WHERE conclave = :conclave AND mitre_set = :mitre_set AND zone = :zone");
      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $this->db->bind(':zone', $zone);
      
      $results = $this->db->resultset();
       //Check Rows
      return $results;
    }

    public function get_count($set,$conclave,$zone){
      $this->db->query("SELECT DISTINCT name FROM attendance WHERE conclave = :conclave AND mitre_set = :mitre_set AND zone = :zone");
      $this->db->bind(':mitre_set', $set);
      $this->db->bind(':conclave', $conclave);
      $this->db->bind(':zone', $zone);
      
      $this->db->resultset();
       //Check Rows
      return $this->db->rowCount();
    }



}