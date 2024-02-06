<?php
  class Alumnus {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }


    // REGISTRATION 
    public function register($data){
      // Prepare Query
      $this->db->query('INSERT INTO alumni (name, gender, zone, address, state, phone, whatsapp, telegram, email, ministry, occupation, assembly, year ) 
      VALUES (:name, :gender, :zone, :address, :state, :phone, :whatsapp, :telegram, :email, :ministry, :occupation, :assembly, :year)');

      // Bind Values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':zone', $data['zone']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':state', $data['state']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':whatsapp', $data['whatsapp']);
      $this->db->bind(':telegram', $data['telegram']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':ministry', $data['ministry']);
      $this->db->bind(':occupation', $data['occupation']);
      $this->db->bind(':assembly', $data['assembly']);
      $this->db->bind(':year', $data['year']);
      
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find USer BY Phone
    public function findUserByPhone($phone){
      $this->db->query("SELECT * FROM alumni WHERE phone = :phone");
      $this->db->bind(':phone', $phone);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get states
    public function getStates(){
      $this->db->query("SELECT * FROM states");
      
      $results = $this->db->resultset();

      return $results;
    }



       //Get All rowCount
      public function total_alumni(){
        $this->db->query("SELECT * FROM alumni");
   
        $this->db->resultset();
        $total = $this->db->rowCount();

        return $total;
      }


       //Get All 
      public function alumni_total(){
        $this->db->query("SELECT * FROM alumni");
        
        $results = $this->db->resultset();

        return $results;
      }


  }