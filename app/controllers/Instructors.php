<?php
class Instructors extends Controller
{
  private $userModel;
  private $databaseModel;
  public $alumniModel;

  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->alumniModel = $this->model('Alumnus');
    $this->databaseModel = $this->model('Databaze');
  }



  public function index()
  {
    redirect('portal/instructors');
  }




  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
          'fullname' => trim($_POST['fullname']),
          'id' => $id,
          'phone' => trim($_POST['phone']),
          'address' => trim($_POST['address']),
          'whatsapp' => trim($_POST['whatsapp']),
          'occupation' => trim($_POST['occupation']),
          'church' => trim($_POST['assembly']),
          'email' => trim($_POST['email']),
          'ministry' => trim($_POST['ministry']),
          'telegram' => trim($_POST['telegram']),
          'zone' => trim($_POST['zone']),
        ];
        $edit = $this->userModel->edit_instructor($data);
        if ($edit) {
          flash('msg', 'Changes Saved Successfully..');
          redirect('instructors/edit/' . $id);
        } else {
          die('Something went wrong..');
        }
    }
    else{
      $student = $this->alumniModel->getUserById($id);
    //Set Data
    $data = [
      'student' => $student
    ];

    $this->view('instructors/edit', $data);
    }
  }

  public function add_passport($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
          $upload = $this->userModel->edit_pic2($data);
          if ($upload) {
            setcookie('photo-now', $db_image_file, time() + (7), '/');
            flash('msg', 'Successfully.. ');
            redirect('admin/instructors');
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
          $upload = $this->userModel->edit_pic2($data);
          if ($upload) {
            setcookie('photo-now', $db_image_file, time() + (7), '/');
            flash('msg', 'Successfully.. ');
            redirect('admin/instructors');
          } else {
            die('Something went wrong..');
          }
        }
      }
    } else {
      redirect('admin/instructors');
    }
  }


  public function update_photo($id)
  {
    $student = $this->alumniModel->getUserById($id);
    //Set Data
    $data = [
      'student' => $student
    ];

    $this->view('instructors/update_photo', $data);
  }


  // Load Homepage
  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Execute
      if ($this->userModel->delete_instructor($id)) {
        flash('msg', 'Instructor Deleted', 'alert alert-danger');
        redirect('admin/instructors');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('admin/instructors');
    }

    // Load homepage/index view
    //$this->view('admin/del_media', $data);
  }
}
