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
      redirect('attendance/kaduna/'.$set);
    }
      
  }

 /***
    Attendance kaduna veiw
 ***/
    public function kaduna($set){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['morning'] == 'morning') {

        $data = [
          'std_id' => $_POST['std_id'],
          'name' => $_POST['fullname'],
          'day' => $_POST['day'],
          'mitre_set' => $_POST['mitre_set'],
          'conclave' => $_POST['conclave'],
          'zone' => $_POST['zone']
        ];

        $mark = $this->attendanceModel->recordAttendance1($data);
        if ($mark) {
          // flash('msg', $data['name'].' Attendance marked Successfully..');
          // redirect('attendance/'.$data['zone'].'/'.$set);
          echo "
                  <div class='flash-msg alert alert-success'>
                    Attendance marked Successfully.. </span>
                </div>
                
            ";
        }else{

          // flash('msg', 'Something went wrong');
          // redirect('attendance/'.$data['zone'].'/'.$set);
          echo "
                  <div class='flash-msg alert alert-danger'>
                    Something went wrong.. </span>
                </div>

            ";
        }
        
      }elseif($_POST['morning'] !== 'morning') {

        $data = [
          'std_id' => $_POST['std_id'],
          'name' => $_POST['fullname'], 
          'day' => $_POST['day'],
          'mitre_set' => $_POST['mitre_set'],
          'conclave' => $_POST['conclave'],
          'zone' => $_POST['zone']
        ];

        $mark = $this->attendanceModel->recordAttendance2($data);
        if ($mark) {
           echo "
                  <div class='flash-msg alert alert-success'>
                    Attendance marked Successfully.. </span>
                </div>
                
            ";
        }else{

          echo "
                  <div class='flash-msg alert alert-danger'>
                    Something went wrong.. </span>
                </div>

            ";
        }
        
      }
      } else{ // NOT A POST REQUEST

      $all = $this->databaseModel->allKaduna($set);
      $total = $this->databaseModel->totalKaduna($set);
      
      //Set Data
      $data = [
        'set' => $set,
        'all' => $all,
        'total' => $total
    
      ];
      $this->view('attendance/kaduna', $data);
      }
    }

    public function record($set){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['morning'] == 'morning') {

        $data = [
          'std_id' => $_POST['std_id'],
          'name' => $_POST['fullname'],
          'day' => $_POST['day'],
          'mitre_set' => $_POST['mitre_set'],
          'conclave' => $_POST['conclave'],
          'zone' => $_POST['zone']
        ];

        $mark = $this->attendanceModel->recordAttendance1($data);
        if ($mark) {
          flash('msg', $data['name'].' Attendance marked Successfully..');
          redirect('attendance/'.$data['zone'].'/'.$set);
          
        }else{

          flash('msg', 'Something went wrong');
          redirect('attendance/'.$data['zone'].'/'.$set);
          
        }
        
      }elseif($_POST['morning'] !== 'morning') {

        $data = [
          'std_id' => $_POST['std_id'],
          'name' => $_POST['fullname'], 
          'day' => $_POST['day'],
          'mitre_set' => $_POST['mitre_set'],
          'conclave' => $_POST['conclave'],
          'zone' => $_POST['zone']
        ];

        $mark = $this->attendanceModel->recordAttendance2($data);
        if ($mark) {
          flash('msg', $data['name'].' Attendance marked Successfully..');
          redirect('attendance/'.$data['zone'].'/'.$set);
          
        }else{

          flash('msg', 'Something went wrong');
          redirect('attendance/'.$data['zone'].'/'.$set);
          
        }
        
      }
      }

    }


/***
    Attendance ufuma veiw
 ***/
public function ufuma($set){
  

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

/***
    Attendance minna veiw
 ***/
public function minna($set){

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
 public function reverse($set){
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
      redirect('attendance/reverse/'.$data['mitre_set']);
    } else {
    flash('msg', 'Something went wrong..','alert alert-danger');
    redirect('attendance/reverse/'.$data['mitre_set']);
    }
  } else{
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



}
