<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      // Prepare Query
      $this->db->query('INSERT INTO mitre_students (mitre_set,passport,fullname,info,s_o_r,address,zone,email,mobile_num,whatsapp_num,church,spiritual,calling,into_call,prior_attended,occupation,lang_speak,lang_write,litracy,academics,discipler,refered_by,address_2,phone,relationship) 
      VALUES (:mitre_set,:passport,:fullname, :info, :s_o_r, :address, :zone, :email, :mobile_num, :whatsapp_num, :church, :spiritual, :calling, :into_call, :prior_attended, :occupation, :lang_speak, :lang_write, :litracy, :academics, :discipler, :refered_by, :address_2, :phone, :relationship)');

      // Bind Values
      $this->db->bind(':mitre_set', $data['set']);
      $this->db->bind(':passport', $data['passport']);
      $this->db->bind(':fullname', $data['fullname']);
      $this->db->bind(':info', $data['info']);
      $this->db->bind(':s_o_r', $data['s_o_r']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':zone', $data['zone']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':mobile_num', $data['mobile_num']);
      $this->db->bind(':whatsapp_num', $data['whatsapp_num']);
      $this->db->bind(':church', $data['assembly']);
      $this->db->bind(':spiritual', $data['spiritual']);
      $this->db->bind(':calling', $data['call_sensed']);
      $this->db->bind(':into_call', $data['into_call']);
      $this->db->bind(':prior_attended', $data['prior_attended']);
      $this->db->bind(':occupation', $data['occupation']);
      $this->db->bind(':lang_speak', $data['lang_speak']);
      $this->db->bind(':lang_write', $data['lang_write']);
      $this->db->bind(':litracy', $data['litracy']);
      $this->db->bind(':academics', $data['academics']);
      $this->db->bind(':discipler', $data['discipler']);
      $this->db->bind(':refered_by', $data['ref_name']);
      $this->db->bind(':address_2', $data['ref_address']);
      $this->db->bind(':phone', $data['ref_phone']);
      $this->db->bind(':relationship', $data['ref_dura_info']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find USer BY Phone
    public function findUserByPhone($phone){
      $this->db->query("SELECT * FROM mitre_students WHERE mobile_num = :mobile_num");
      $this->db->bind(':mobile_num', $phone);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

     // Find USer BY Email
     public function findUserByEmail($email){
      $this->db->query("SELECT * FROM users WHERE name = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Login / Authenticate User
    public function login($email, $password){
      $this->db->query("SELECT * FROM users WHERE name = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();
      
    
      if($row->password == $password){
        return $row;
      } else {
        return false;
      }
    }

       // Get All Posts
       public function allStudents(){
        $this->db->query("SELECT * FROM mitre_students");
  
        $results = $this->db->resultset();

        return $results;
      }

      public function totals(){
        $this->db->query("SELECT * FROM mitre_students");
        $this->db->resultset();
        $total = $this->db->rowCount();

        return $total;
      }

    // Find User By ID
    public function getUserById($id){
      $this->db->query("SELECT * FROM mitre_students WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

     // Delete Post
     public function delete_reg($id){
      // Prepare Query 
      $this->db->query('DELETE FROM mitre_students WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }