<?php
  class Attendanze {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }


     // 
     /////////
     //
     public function recordAttendance($data){
       $this->db->query('INSERT INTO attendance (std_id, name, day, mitre_set, conclave ) VALUES (:std_id, :name, :day, :mitre_set, :conclave)');

      // Bind Values
      $this->db->bind(':std_id', $data['std_id']);
      $this->db->bind(':name', $data['name']);
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
     //////
     //
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

}