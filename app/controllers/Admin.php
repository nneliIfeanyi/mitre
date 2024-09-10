  <?php
  class Admin extends Controller
  {
    private $userModel;
    private $alumniModel;
    public $databaseModel;
    public $attendanceModel;
    public function __construct()
    {
      $this->userModel = $this->model('User');
      $this->alumniModel = $this->model('Alumnus');
      $this->databaseModel = $this->model('Databaze');
      $this->attendanceModel = $this->model('Attendanze');

      if (!isset($_COOKIE['admin-id']) and !isset($_COOKIE['admin-name'])) {
        redirect('portal/login');
      } else {
        $_SESSION['admin_id'] = $_COOKIE['admin-id'];
        $_SESSION['user_name'] = $_COOKIE['admin-name'];
      }
    }

    // Load Homepage
    public function index()
    {
      //Set Data
      $data = [
        'title' => '',
        'description' => 'Administrative Portal'
      ];

      // Load homepage/index view
      $this->view('admin/index', $data);
    }

    // Load Homepage
    public function media()
    {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uploadPath = "uploaded/";
        $trac = basename($_FILES["media"]["name"]);
        $db_media =  $uploadPath . $trac;
        $media_path = $uploadPath . $trac;
        $file_ext = pathinfo($media_path, PATHINFO_EXTENSION);
        $data = [
          'mitre_set' => $_POST['mitre_set'],
          'conclave' => $_POST['conclave'],
          'slot' => $_POST['slot'],
          'media' => $db_media
        ];
        // Allow certain file formats 
        $allowed_ext = array('mp3', 'WAV');
        if (!in_array($file_ext, $allowed_ext)) {
          flash('msg', 'File format not supported, MP3 files allowed..', 'alert alert-danger');
          redirect('admin/media');
        } elseif ($this->userModel->check_media($data)) {
          flash('msg', 'File already exist..', 'alert alert-danger');
          redirect('admin/media');
        } else {
          $tracTemp = $_FILES["media"]["tmp_name"];
          $data = [
            'mitre_set' => $_POST['mitre_set'],
            'conclave' => $_POST['conclave'],
            'slot' => $_POST['slot'],
            'media' => $db_media,
            move_uploaded_file($tracTemp, $media_path)
          ];

          //Execute
          if ($this->userModel->trac_upload($data)) {

            flash('msg', $data['slot'] . ' Slot Uploaded Successfully For Set ' . $data['mitre_set'] . ' Conclave ' . $data['conclave']);
            redirect('admin/media');
          } else {
            die('Something went wrong');
          }
        }
      } else {
        $conclaves = $this->userModel->getConclaves();
        $media = $this->userModel->all_media();
        //Set Data
        $data = [
          'conclaves' => $conclaves,
          'media' => $media
        ];

        // Load media view
        $this->view('admin/media', $data);
      }
    }

    public function password()
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'password' => $_POST['new-password'],
          'answer' => $_POST['answer']
        ];
        //Execute
        if ($data['answer'] !== 'Principal') {
          flash('msg', 'Access Denied.. incorrect answer.', 'alert alert-danger');
          redirect('portal/settings');
        } elseif ($this->databaseModel->update_password($data)) {
          flash('msg', 'Password Changed Successfully..');
          redirect('portal/settings');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('portal/settings');
      }
    }

    // Load Homepage
    public function del_media($id)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Execute
        if ($this->userModel->delete_media($id)) {
          flash('msg', 'Media Deleted', 'alert alert-danger');
          redirect('admin/media');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admin/media');
      }
      $data = '';
      // Load homepage/index view
      $this->view('admin/del_media', $data);
    }




    // Load Dashoard
    public function dashboard()
    {
      // $students = $this->databaseModel->allStudents();
      // $total = $this->databaseModel->totals();

      //Set Data
      $data = [
        // 'total' => $total,  
        // 'students' => $students
      ];

      // Load homepage/dashboard view
      $this->view('admin/dashboard', $data);
    }

    //Load All Students
    public function students($set)
    {
      $total = $this->databaseModel->totals($set);
      $all = $this->databaseModel->allStudents($set);
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all,
        'rowCount' => $total
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/students', $data);
    }

    public function minna($set)
    {
      $total = $this->databaseModel->totalMinna($set);
      $all = $this->databaseModel->allMinna($set);
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all,
        'rowCount' => $total
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/minna', $data);
    }

    public function kaduna($set)
    {
      $total = $this->databaseModel->totalKaduna($set);
      $all = $this->databaseModel->allKaduna($set);
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all,
        'rowCount' => $total
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/kaduna', $data);
    }

    public function ufuma($set)
    {
      $total = $this->databaseModel->totalUfuma($set);
      $all = $this->databaseModel->allUfuma($set);
      //Set Data
      $data = [
        'set' => $set,
        'students' => $all,
        'rowCount' => $total
      ];

      // Load homepage/all_kaduna view
      $this->view('admin/ufuma', $data);
    }

    //Load All Alumni
    public function alumni_2024()
    {
      $total_alumni = $this->alumniModel->total_alumni();
      $alumni_total = $this->alumniModel->alumni_total();
      //Set Data
      $data = [
        'students' => $alumni_total,
        'rowCount' => $total_alumni
      ];

      // Load homepage/all_ufuma view
      $this->view('admin/alumni_2024', $data);
    }

    //Load All Alumni
    public function instructors()
    {
      $total_alumni = $this->alumniModel->total_instructors();
      $alumni_total = $this->alumniModel->instructors_total2();
      //Set Data
      $data = [
        'students' => $alumni_total,
        'rowCount' => $total_alumni
      ];

      // Load homepage/all_ufuma view
      $this->view('admin/instructors', $data);
    }

    public function add_passport($id)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $set = $_POST['set'];
        $zone = $_POST['zone'];
        if (is_array($_FILES)) {
          $file = $_FILES['photo']['tmp_name'];
          $source_properties = getimagesize($file);
          $image_type = $source_properties[2];
          if ($image_type == IMAGETYPE_JPEG) {
            $image_resource_id = imagecreatefromjpeg($file);
            $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
            imagejpeg($target_layer, "pics/" . $_FILES['photo']['name']);
            $db_image_file =  "pics/" . $_FILES['photo']['name'];
            $data = [
              'id' => $id,
              'image' => $db_image_file
            ];
            $upload = $this->userModel->edit_pic($data);
            if ($upload) {
              setcookie('photo-now', $db_image_file, time() + (40), '/');
              flash('msg', 'Your Photo is Uploaded Successfully.. Remain Blessed');
              redirect('admin/' . $zone . '/' . $set);
            } else {
              die('Something went wrong..');
            }
          } elseif ($image_type == IMAGETYPE_PNG) {
            $image_resource_id = imagecreatefrompng($file);
            $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
            imagepng($target_layer, "pics/" . $_FILES['photo']['name']);
            $db_image_file =  "pics/" . $_FILES['photo']['name'];
            $data = [
              'id' => $id,
              'image' => $db_image_file
            ];
            $upload = $this->userModel->edit_pic($data);
            if ($upload) {
              setcookie('photo-now', $db_image_file, time() + (40), '/');
              flash('msg', 'Your Photo is Uploaded Successfully.. Remain Blessed');
              redirect('admin/' . $zone . '/' . $set);
            } else {
              die('Something went wrong..');
            }
          }
        }
      } else {
        // Load homepage/all_ufuma view
        $student = $this->userModel->getUserById($id);
        //Set Data
        $data = [
          'id' => $id,
          'student' => $student
        ];
        $this->view('admin/add_passport', $data);
      }
    }


    public function more_details($id)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'fullname' => trim($_POST['fullname']),
          'id' => $id,
          'phone' => trim($_POST['mobile_num']),
          'address' => trim($_POST['address']),
          'whatsapp' => trim($_POST['whatsapp_num']),
          'occupation' => trim($_POST['occupation']),
          'error' => ''
        ];
        $edit = $this->userModel->edit_profile($data);
        if ($edit) {
          flash('msg', 'Changes Saved Successfully..');
          redirect('admin/more_details/' . $id);
        } else {
          die('Something went wrong..');
        }
      } else {

        $student = $this->userModel->getUserById($id);
        //Set Data
        $data = [
          'student' => $student
        ];

        // Load homepage/index view
        $this->view('admin/more_details', $data);
      }
    }

    public function sorting()
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mitre_set = trim($_POST['set']);
        $conclave = trim($_POST['conclave']);
        $zone = $_POST['zone'];
        //$day = $_POST['day'];
        $conclaves = $this->userModel->getConclaves();
        $get_count = $this->attendanceModel->get_count($mitre_set, $conclave, $zone);
        $added = $this->attendanceModel->get_attendance($mitre_set, $conclave, $zone);

        $data = [
          'scores' => $added,
          'set' => $mitre_set,
          'conclave' => $conclave,
          'count' => $get_count,
          'zone' => $zone,
          'conclaves' => $conclaves
        ];
        $this->view('admin/view_attendance', $data);
      } else {
        $conclaves = $this->userModel->getConclaves();
        //Set Data
        $data = [
          'conclaves' => $conclaves
        ];

        // Load about view
        $this->view('admin/sorting', $data);
      }
    }

    public function add($set)
    {

      // Check if POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $fullname = trim($_POST['surname']) . " " . trim($_POST['other_names']);
        $data = [
          'name' => $fullname,
          'set' => $_POST['set'],
          'surname' => trim($_POST['surname']),
          'other_names' => trim($_POST['other_names']),
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'gender' => trim($_POST['gender']),
          'zone' => trim($_POST['zone']),
          'address' => trim($_POST['address']) . ' ' . trim($_POST['state']),
          //'telegram' => trim($_POST['telegram']),
          'whatsapp' => trim($_POST['whatsapp']),
          'ministry' => trim($_POST['ministry']),
          'occupation' => trim($_POST['occupation']),
          'assembly' => trim($_POST['assembly']),
          'error' => ''
        ];
        //validate Username..
        if ($this->userModel->findUserByPhone($data['phone'])) {
          //$data['error'] = 'Phone number already exist you cannot register twice..';
          //$this->view('admin/add', $data);
          $success = $this->userModel->register_by_admin($data);
          flash('msg', 'Registration Successfull..');
          redirect('admin/add/' . $set);
        } else {
          //All validation passed...
          $success = $this->userModel->register_by_admin($data);
          if ($success) {
            flash('msg', 'Registration Successfull..');
            redirect('admin/add/' . $set);
          } else {
            die('Something went wrong..');
          }
        }
      } else {
        // If NOT a POST
        $states = $this->userModel->getStates();
        // Init data
        $data = [
          'set' => $set,
          'states' => $states,
          'email' => '',
          'surname' => '',
          'other_names' => '',
          'gender' => '',
          'zone' => '',
          'address' => '',
          'state' => '',
          'phone' => '',
          'whatsapp' => '',
          'telegram' => '',
          'ministry' => '',
          'occupation' => '',
          'assembly' => '',
          'error' => ''
        ];

        // Load View
        $this->view('admin/add', $data);
      }
    }


    public function culmulative()
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mitre_set = trim($_POST['set']);
        $conclave = trim($_POST['conclave']);
        $zone = $_POST['zone'];
        $conclaves = $this->userModel->getConclaves();

        $added = $this->attendanceModel->check_scores($mitre_set, $conclave, $zone);
        $data = [
          'scores' => $added,
          'set' => $mitre_set,
          'conclave' => $conclave,
          'conclaves' => $conclaves,
          'zone' => $zone,
          'paper1' => 'short_paper',
          'paper2' => 'long_paper',
          'paper3' => 'term_paper',
          'paper4' => 'Summary'
        ];
        $this->view('admin/view_scores', $data);
      } else {
        $conclaves = $this->userModel->getConclaves();
        //Set Data
        $data = [
          'conclaves' => $conclaves
        ];

        // Load about view
        $this->view('admin/culmulative', $data);
      }
    }

    public function reg_no($set)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // if (strlen($_POST['std_id']) == 1) {

        //   if ($_POST['zone'] == 'Kaduna') {
        //     $reg = $set.'00'.$_POST['std_id'].'K';
        //   }elseif ($_POST['zone'] == 'Ufuma') {
        //     $reg = $set.'00'.$_POST['std_id'].'E';
        //   }else{
        //     $reg = $set.'00'.$_POST['std_id'].'N';
        //   }


        // }elseif (strlen($_POST['std_id']) == 2) {
        //   if ($_POST['zone'] == 'Kaduna') {
        //     $reg = $set.'0'.$_POST['std_id'].'K';
        //   }elseif ($_POST['zone'] == 'Ufuma') {
        //     $reg = $set.'0'.$_POST['std_id'].'E';
        //   }else{
        //     $reg = $set.'0'.$_POST['std_id'].'N';
        //   }
        // }else{
        //    if ($_POST['zone'] == 'Kaduna') {
        //     $reg = $set.$_POST['std_id'].'K';
        //   }elseif ($_POST['zone'] == 'Ufuma') {
        //     $reg = $set.$_POST['std_id'].'E';
        //   }else{
        //     $reg = $set.$_POST['std_id'].'N';
        //   }
        // }

        $data = [
          'std_id' => $_POST['std_id'],
          'reg_no' => $_POST['reg_no'],
          'name' => $_POST['fullname']
        ];

        if ($this->userModel->check_reg_no($data['reg_no'])) {
          flash('msg', 'Failed... reg_no already in use by another student..', 'alert alert-danger');
          redirect('admin/reg_no/' . $set);
        } else {

          $output = $this->userModel->regNo($data['reg_no'], $data['std_id']);
          if ($output) {
            flash('msg', 'You have successfully generated for ' . $data['name']);
            redirect('admin/reg_no/' . $set);
          } else {
            die('Something went wrong');
          }
        }
      } else {
        $yes_reg = $this->databaseModel->yes_reg($set);
        $no_reg = $this->databaseModel->no_reg($set);
        $yes_reg_count = $this->databaseModel->yes_reg_count($set);
        $no_reg_count = $this->databaseModel->no_reg_count($set);
        //Set Data
        $data = [
          'students' => $no_reg,
          'yes_reg' => $yes_reg,
          'yes_reg_count' => $yes_reg_count,
          'no_reg_count' => $no_reg_count
        ];

        // Load about view
        $this->view('admin/reg_no', $data);
      }
    }

    public function add_mark()
    {

      $conclaves = $this->userModel->getConclaves();
      //Set Data
      $data = [
        'conclaves' => $conclaves
      ];
      $this->view('admin/add_mark', $data);
    }

    public function add_scores()
    {

      if ($_GET['mitre_set'] and $_GET['conclave'] and $_GET['zone'] and $_GET['paper']) {

        $mitre_set = $_GET['mitre_set'];
        $conclave = $_GET['conclave'];
        $zone = $_GET['zone'];
        $paper = $_GET['paper'];

        $all = $this->databaseModel->allKaduna($mitre_set);
        $added = $this->attendanceModel->check_mark($mitre_set, $conclave, $paper, $zone);
        $data = [
          'students' => $all,
          'added' => $added,
          'zone' => $zone,
          'paper' => $paper,
          'conclave' => $conclave,
          'mitre_set' => $mitre_set
        ];

        $this->view('admin/add_scores', $data);
      } else {
        $conclaves = $this->userModel->getConclaves();
        //Set Data
        $data = [
          'conclaves' => $conclaves
        ];
        $this->view('admin/add_mark', $data);
      }
    }

    public function about()
    {
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('admin/about', $data);
    }

    public function progress()
    {
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('admin/progress', $data);
    }



    // Delete 
    public function delete($id)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $set = $_POST['mitre_set'];
        $zone = $_POST['zone'];
        //Execute
        if ($this->userModel->delete_reg($id)) {
          // Redirect to login
          flash('msg', 'Candidate Removed..', 'alert alert-danger');
          redirect('admin/' . $zone . '/' . $set);
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admin/all_registered');
      }
    }
  }
