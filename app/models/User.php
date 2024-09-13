<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Get states
  public function getStates()
  {
    $this->db->query("SELECT * FROM states");

    $results = $this->db->resultset();

    return $results;
  }

  // Get Conclaves
  public function getConclaves()
  {
    $this->db->query("SELECT * FROM conclaves");

    $results = $this->db->resultset();

    return $results;
  }

  public function getScores($conclave)
  {
    $this->db->query("SELECT * FROM marks WHERE std_id = :id AND conclave = :conclave");
    $this->db->bind(':id', $_COOKIE['student-id']);
    $this->db->bind(':conclave', $conclave);
    $results = $this->db->resultset();
    //Check Rows
    return $results;
  }

  public function getPunctual($conclave)
  {
    $this->db->query("SELECT * FROM attendance WHERE std_id = :id AND conclave = :conclave AND day != :arrival");
    $this->db->bind(':id', $_COOKIE['student-id']);
    $this->db->bind(':conclave', $conclave);
    $this->db->bind(':arrival', 'Arrival');
    $this->db->resultset();
    $row = $this->db->rowCount();

    return $row;
  }


  // Add User / Register
  public function register($data)
  {
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
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  // REGISTRATION 
  public function register_by_admin($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO mitre_students (mitre_set, fullname, info, zone, address, mobile_num, whatsapp_num, email, calling, occupation, church) 
      VALUES (:mitre_set, :name, :gender, :zone, :address, :phone, :whatsapp, :email, :ministry, :occupation, :assembly)');

    // Bind Values
    $this->db->bind(':mitre_set', $data['set']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':gender', $data['gender']);
    $this->db->bind(':zone', $data['zone']);
    $this->db->bind(':address', $data['address']);
    //$this->db->bind(':state', $data['state']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':whatsapp', $data['whatsapp']);
    //$this->db->bind(':telegram', $data['telegram']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':ministry', $data['ministry']);
    $this->db->bind(':occupation', $data['occupation']);
    $this->db->bind(':assembly', $data['assembly']);
    //$this->db->bind(':year', $data['year']);


    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  // Find USer BY Phone
  public function findUserByPhone($phone)
  {
    $this->db->query("SELECT * FROM mitre_students WHERE mobile_num = :mobile_num");
    $this->db->bind(':mobile_num', $phone);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function regNo($reg, $id)
  {
    $this->db->query("UPDATE mitre_students SET admsn_no = :reg_no WHERE id = :id");
    $this->db->bind(':reg_no', $reg);
    $this->db->bind(':id', $id);
    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  public function check_reg_no($reg)
  {
    $this->db->query("SELECT * FROM mitre_students WHERE admsn_no = :reg");
    $this->db->bind(':reg', $reg);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Find USer BY Email
  public function findUserByEmail($email)
  {
    $this->db->query("SELECT * FROM mitre_students WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Find USer BY Email
  public function findUserByFullname($name)
  {
    $this->db->query("SELECT * FROM mitre_students WHERE fullname = :name");
    $this->db->bind(':name', $name);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Find USer BY Email
  public function findAdmin($user_name)
  {
    $this->db->query("SELECT * FROM admin WHERE name = :user_name");
    $this->db->bind(':user_name', $user_name);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Login / Authenticate User
  public function adminLogin($user_name, $password)
  {
    $this->db->query("SELECT * FROM admin WHERE name = :user_name");
    $this->db->bind(':user_name', $user_name);

    $row = $this->db->single();


    if ($row->password == $password) {
      return $row;
    } else {
      return false;
    }
  }


  // Login / Authenticate User
  public function login($password)
  {
    $this->db->query("SELECT * FROM mitre_students WHERE mobile_num = :phone");
    $this->db->bind(':phone', $password);

    $row = $this->db->single();


    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }

  // Find User By ID
  public function getUserById($id)
  {
    $this->db->query("SELECT * FROM mitre_students WHERE id = :id");
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }

  public function getUserByName($name)
  {
    $this->db->query("SELECT * FROM mitre_students WHERE fullname = :name");
    $this->db->bind(':name', $name);
    $row = $this->db->single();
    return $row;
  }

  //Edit Student
  public function edit_profile($data)
  {
    // Prepare Query
    $this->db->query('UPDATE mitre_students SET fullname = :fullname, mobile_num = :phone, address = :address, whatsApp_num = :whatsapp, occupation = :occupation WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':fullname', $data['fullname']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':whatsapp', $data['whatsapp']);
    $this->db->bind(':occupation', $data['occupation']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function trac_upload($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO media (mitre_set, conclave, slot, file_name) 
      VALUES (:mitre_set, :conclave, :slot, :trac_path)');

    // Bind Values
    $this->db->bind(':mitre_set', $data['mitre_set']);
    $this->db->bind(':conclave', $data['conclave']);
    $this->db->bind(':slot', $data['slot']);
    //$this->db->bind(':img', $data['image']);
    $this->db->bind(':trac_path', $data['media']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Login / Authenticate User
  public function check_media($data)
  {
    $this->db->query("SELECT * FROM media WHERE mitre_set = :mitre_set AND conclave = :conclave AND slot = :slot");
    $this->db->bind(':mitre_set', $data['mitre_set']);
    $this->db->bind(':conclave', $data['conclave']);
    $this->db->bind(':slot', $data['slot']);

    $this->db->resultset();


    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function all_media()
  {
    $this->db->query("SELECT * FROM media");
    $row = $this->db->resultset();
    return $row;
  }


  // Delete Post
  public function delete_reg($id)
  {
    // Prepare Query 
    $this->db->query('DELETE FROM mitre_students WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $id);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Delete 2
  public function delete_media($id)
  {
    // Prepare Query 
    $this->db->query('DELETE FROM media WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $id);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  // Student Update Image
  public function edit_pic($data)
  {
    // Prepare Query
    $this->db->query('UPDATE mitre_students SET passport = :img WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':img', $data['image']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Instructors Update Image
  public function edit_pic2($data)
  {
    // Prepare Query
    $this->db->query('UPDATE instructors SET photo = :img WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':img', $data['image']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Instructors Update Image by Instructor during resgistration
  public function edit_pic3($data)
  {
    // Prepare Query
    $this->db->query('UPDATE instructors SET photo = :img WHERE phone = :id');

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':img', $data['image']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_instructor($id)
  {
    // Prepare Query 
    $this->db->query('DELETE FROM instructors WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $id);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
