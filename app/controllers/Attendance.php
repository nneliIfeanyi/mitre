<?php
  class Attendance extends Controller{
    public $attendanceModel;
    public $databaseModel;
    public function __construct(){
      $this->attendanceModel = $this->model('Attendanze');
      $this->databaseModel = $this->model('Databaze');
      if (!isset($_COOKIE['admin-id']) AND !isset($_COOKIE['admin-name']) ) {
        redirect('portal/login');
      }else{
        $_SESSION['admin_id'] = $_COOKIE['admin-id'];
        $_SESSION['user_name'] = $_COOKIE['admin-name'];
      }
    }

 /***
    Attendance index veiw
 ***/
    public function index($set){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = [
          'std_id' => $_POST['std_id'],
          'name' => $_POST['fullname'],
          'day' => $_POST['day'],
          'mitre_set' => $_POST['mitre_set'],
          'conclave' => $_POST['conclave'],
          'zone' => $_POST['zone']
        ];

        $mark = $this->attendanceModel->recordAttendance($data);
        if ($mark) {
          flash('msg', $data['name'].' Attendance marked Successfully..');
          redirect('attendance/'.$set);
        }else{

          flash('msg', 'Something went wrong');
          redirect('attendance/'.$set);
        }
        
      }
      else{
      //Set Data
      $all_students = $this->databaseModel->allStudents($set);
      $total_students = $this->databaseModel->totals($set);
      
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all_students,
        'total' => $total_students
    
      ];

      // Load index view
      $this->view('attendance/index', $data);
    }
  }

 /***
    Attendance kaduna veiw
 ***/
    public function kaduna($set){
      if(isset($_POST['morning'])) {

        $data = [
          'std_id' => $_POST['std_id'],
          'name' => $_POST['fullname'],
          'day' => $_POST['day'],
          'mitre_set' => $_POST['mitre_set'],
          'conclave' => $_POST['conclave'],
          'zone' => 'Kaduna'
        ];

        $mark = $this->attendanceModel->recordAttendance1($data);
        if ($mark) {
          flash('msg', $data['name'].' Attendance marked Successfully..');
          redirect('attendance/kaduna/'.$set);
        }else{

          flash('msg', 'Something went wrong');
          redirect('attendance/kaduna/'.$set);
        }
        
      }elseif(isset($_POST['evening'])) {

        $data = [
          'std_id' => $_POST['std_id'],
          'name' => $_POST['fullname'],
          'day' => $_POST['day'],
          'mitre_set' => $_POST['mitre_set'],
          'conclave' => $_POST['conclave'],
          'zone' => 'Kaduna'
        ];

        $mark = $this->attendanceModel->recordAttendance2($data);
        if ($mark) {
          flash('msg', $data['name'].' Attendance marked Successfully..');
          redirect('attendance/kaduna/'.$set);
        }else{

          flash('msg', 'Something went wrong');
          redirect('attendance/kaduna/'.$set);
        }
        
      }else{

      $all = $this->databaseModel->allKaduna($set);
      $total = $this->databaseModel->totalKaduna($set);
      
      //Set Data
      $data = [
        'set' => $set,
        'all' => $all,
        'total' => $total
    
      ];

      // Load homepage/index view
      $this->view('attendance/kaduna', $data);
      }
    }


/***
    Attendance ufuma veiw
 ***/
public function ufuma($set){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = [
      'std_id' => $_POST['std_id'],
      'name' => $_POST['fullname'],
      'day' => $_POST['day'],
      'mitre_set' => $_POST['mitre_set'],
      'conclave' => $_POST['conclave'],
      'zone' => 'Ufuma'
    ];

    $mark = $this->attendanceModel->recordAttendance($data);
    if ($mark) {
      flash('msg', $data['name'].' Attendance marked Successfully..');
      redirect('attendance/ufuma/'.$set);
    }else{

      flash('msg', 'Something went wrong');
      redirect('attendance/ufuma/'.$set);
    }
    
  }else{

  $all = $this->databaseModel->allUfuma($set);
  $total = $this->databaseModel->totalUfuma($set);
  
  //Set Data
  $data = [
    'set' => $set,
    'all' => $all,
    'total' => $total

  ];

  // Load homepage/index view
  $this->view('attendance/ufuma', $data);
  }
}

/***
    Attendance minna veiw
 ***/
public function minna($set){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = [
      'std_id' => $_POST['std_id'],
      'name' => $_POST['fullname'],
      'day' => $_POST['day'],
      'mitre_set' => $_POST['mitre_set'],
      'conclave' => $_POST['conclave'],
      'zone' => 'Minna'
    ];

    $mark = $this->attendanceModel->recordAttendance($data);
    if ($mark) {
     flash('msg', $data['name'].' Attendance marked Successfully..');
      redirect('attendance/minna/'.$set);
    }else{

      flash('msg', 'Something went wrong');
      redirect('attendance/minna/'.$set);
    }
    
  }else{

  $all = $this->databaseModel->allMinna($set);
  $total = $this->databaseModel->totalMinna($set);
  
  //Set Data
  $data = [
    'set' => $set,
    'all' => $all,
    'total' => $total

  ];

  // Load homepage/index view
  $this->view('attendance/minna', $data);
  }
}



//Reverse Attendance
public function reverse_kaduna(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = [
    'std_id' => $_POST['std_id'],
    'name' => $_POST['fullname'],
    'day' => $_POST['day'],
    'mitre_set' => $_POST['mitre_set'],
    'conclave' => $_POST['conclave']
  ];
    //Execute
    if($this->attendanceModel->reverse_attendance($data)){
      flash('msg', $data['name'].' Attendance Unmarked Successfully..','alert alert-danger');
      redirect('attendance/kaduna/'.$data['mitre_set']);
      } else {
      flash('msg', 'Something went wrong..','alert alert-danger');
      redirect('attendance/kaduna/'.$data['mitre_set']);
      }
  } else {
    redirect('attendance_kaduna');
  }
}

//Reverse Attendance
 public function reverse_minna(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = [
    'std_id' => $_POST['std_id'],
    'name' => $_POST['fullname'],
    'day' => $_POST['day'],
    'mitre_set' => $_POST['mitre_set'],
    'conclave' => $_POST['conclave']
  ];
    //Execute
    if($this->attendanceModel->reverse_attendance($data)){
      flash('msg', $data['name'].' Attendance Unmarked Successfully..','alert alert-danger');
      redirect('attendance/minna/'.$data['mitre_set']);
      } else {
      flash('msg', 'Something went wrong..','alert alert-danger');
      redirect('attendance/minna/'.$data['mitre_set']);
      }
  } else {
    redirect('attendance_minna');
  }
}

//Reverse Attendance
 public function reverse_ufuma(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = [
    'std_id' => $_POST['std_id'],
    'name' => $_POST['fullname'],
    'day' => $_POST['day'],
    'mitre_set' => $_POST['mitre_set'],
    'conclave' => $_POST['conclave']
  ];
    //Execute
    if($this->attendanceModel->reverse_attendance($data)){
      flash('msg', $data['name'].' Attendance Unmarked Successfully..','alert alert-danger');
      redirect('attendance/ufuma/'.$data['mitre_set']);
      } else {
      flash('msg', 'Something went wrong..','alert alert-danger');
      redirect('attendance/ufuma/'.$data['mitre_set']);
      }
  } else {
    redirect('attendance');
  }
}

//Reverse Attendance
 public function reverse(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $data = [
    'std_id' => $_POST['std_id'],
    'name' => $_POST['fullname'],
    'day' => $_POST['day'],
    'mitre_set' => $_POST['mitre_set'],
    'conclave' => $_POST['conclave']
  ];
    //Execute
    if($this->attendanceModel->reverse_attendance($data)){
      flash('msg', $data['name'].' Attendance Unmarked Successfully..','alert alert-danger');
      redirect('attendance/'.$data['mitre_set']);
    } else {
    flash('msg', 'Something went wrong..','alert alert-danger');
    redirect('attendance/'.$data['mitre_set']);
    }
  } else {
    redirect('attendance');
  }
}



}
