<?php
  class Databaze {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }


// Get All Per set Students
    public function allStudents($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set ORDER BY fullname");
        $this->db->bind(':mitre_set', $set);
        $results = $this->db->resultset();

        return $results;
    }

    public function no_reg($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND admsn_no = '' ORDER BY fullname");
        $this->db->bind(':mitre_set', $set);
        $results = $this->db->resultset();

        return $results;
    }

    public function yes_reg($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND admsn_no != '' ORDER BY fullname");
        $this->db->bind(':mitre_set', $set);
        $results = $this->db->resultset();

        return $results;
    }

    public function yes_reg_count($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND admsn_no != '' ORDER BY fullname");
        $this->db->bind(':mitre_set', $set);
        $this->db->resultset();

        return $this->db->rowCount();
    }

    public function no_reg_count($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND admsn_no = '' ORDER BY fullname");
        $this->db->bind(':mitre_set', $set);
        $this->db->resultset();

        return $this->db->rowCount();
    }


//
// Get All Kaduna Students
//
    public function allKaduna($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND zone = :zone ORDER BY fullname");
        $this->db->bind(':mitre_set', $set);
        $this->db->bind(':zone', 'Kaduna');
        $results = $this->db->resultset();

        return $results;
    }

    //
    // Get All Ufuma Students
    //
    public function allUfuma($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND zone = :zone ORDER BY fullname");
        $this->db->bind(':mitre_set', $set);
        $this->db->bind(':zone', 'Ufuma');
        $results = $this->db->resultset();

        return $results;
    }

    //
    // Get All Minna Students
    //
    public function allMinna($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND zone = :zone ORDER BY fullname");
        $this->db->bind(':mitre_set', $set);
        $this->db->bind(':zone', 'Minna');
        $results = $this->db->resultset();

        return $results;
    }


    //Get All Students rowCount
    public function totals($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set");
        $this->db->bind(':mitre_set', $set);
        $this->db->resultset();
        $total = $this->db->rowCount();

        return $total;
    }   

    //Get All Ufuma Students rowCount
    public function totalUfuma($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND zone = :zone");
        $this->db->bind(':mitre_set', $set);
        $this->db->bind(':zone', 'Ufuma');
        $this->db->resultset();
        $total = $this->db->rowCount();

        return $total;
    }

    //Get All Kaduna Students rowCount
    public function totalKaduna($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND zone = :zone");
        $this->db->bind(':mitre_set', $set);
        $this->db->bind(':zone', 'Kaduna');
        $this->db->resultset();
        $total = $this->db->rowCount();

        return $total;
    }

    //Get All Minna Students rowCount
    public function totalMinna($set){
        $this->db->query("SELECT * FROM mitre_students WHERE mitre_set = :mitre_set AND zone = :zone");
        $this->db->bind(':mitre_set', $set);
        $this->db->bind(':zone', 'Minna');
        $this->db->resultset();
        $total = $this->db->rowCount();
        return $total;
    }

     // Update settings
    public function updateSettings($data){
      // Prepare Query
      $this->db->query('UPDATE settings SET senior = :senior, junior = :junior, s_conclave = :s_conclave, j_conclave = :j_conclave');

      // Bind Values
      $this->db->bind(':senior', $data['senior']);
      $this->db->bind(':junior', $data['junior']);
      $this->db->bind(':s_conclave', $data['s_conclave']);
      $this->db->bind(':j_conclave', $data['j_conclave']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Update settings
    public function update_password($data){
      // Prepare Query
      $this->db->query('UPDATE admin SET password = :password');

      // Bind Values
      $this->db->bind(':password', $data['password']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }




}