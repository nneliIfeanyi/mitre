<?php
class Alumnus
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }


  // REGISTRATION 
  public function register($data)
  {
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
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Find USer BY Phone
  public function findUserByPhone($phone)
  {
    $this->db->query("SELECT * FROM alumni WHERE phone = :phone");
    $this->db->bind(':phone', $phone);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Get states
  public function getStates()
  {
    $this->db->query("SELECT * FROM states");

    $results = $this->db->resultset();

    return $results;
  }



  //Get All rowCount
  public function total_alumni()
  {
    $this->db->query("SELECT * FROM alumni");

    $this->db->resultset();
    $total = $this->db->rowCount();

    return $total;
  }


  //Get All 
  public function alumni_total()
  {
    $this->db->query("SELECT * FROM alumni ORDER BY name ASC");

    $results = $this->db->resultset();

    return $results;
  }

  public function reg_instructor($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO instructors (name, gender, zone, address, phone, whatsapp, telegram, email, ministry, occupation, assembly) 
      VALUES (:name, :gender, :zone, :address, :phone, :whatsapp, :telegram, :email, :ministry, :occupation, :assembly)');

    // Bind Values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':gender', $data['gender']);
    $this->db->bind(':zone', $data['zone']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':whatsapp', $data['whatsapp']);
    $this->db->bind(':telegram', $data['telegram']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':ministry', $data['ministry']);
    $this->db->bind(':occupation', $data['occupation']);
    $this->db->bind(':assembly', $data['assembly']);


    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function findUserByPhone2($phone)
  {
    $this->db->query("SELECT * FROM instructors WHERE phone = :phone");
    $this->db->bind(':phone', $phone);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findUserByPhone3($phone)
  {
    $this->db->query("SELECT * FROM instructors WHERE phone = :phone");
    $this->db->bind(':phone', $phone);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0 && $row->photo == '') {
      return true;
    } else {
      return false;
    }
  }

  public function edit_pic($data)
  {
    // Prepare Query
    $this->db->query('UPDATE instructors SET photo = :img WHERE phone = :phone');

    // Bind Values
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':img', $data['image']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  //Get All rowCount
  public function total_instructors()
  {
    $this->db->query("SELECT * FROM instructors");

    $this->db->resultset();
    $total = $this->db->rowCount();

    return $total;
  }


  //Get first 5 
  public function instructors_total()
  {
    $this->db->query("SELECT * FROM instructors ORDER BY name ASC LIMIT 10");

    $results = $this->db->resultset();

    return $results;
  }

  //Get first 5 
  public function instructors_total2()
  {
    $this->db->query("SELECT * FROM instructors ORDER BY name ASC");

    $results = $this->db->resultset();

    return $results;
  }

  //Get first 5 
  public function instructors_total3()
  {
    $this->db->query("SELECT * FROM instructors ORDER BY name ASC LIMIT 10 OFFSET 20");

    $results = $this->db->resultset();

    return $results;
  }

  //Get first 5 
  public function instructors_total4()
  {
    $this->db->query("SELECT * FROM instructors ORDER BY name ASC LIMIT 10 OFFSET 30");

    $results = $this->db->resultset();

    return $results;
  }





























  public function getUserById($id)
  {
    $this->db->query("SELECT * FROM instructors WHERE id = :id");
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}
