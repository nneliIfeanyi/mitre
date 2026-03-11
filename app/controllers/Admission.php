<?php
class Admission extends Controller
{
  private $regModel;
  private $smsModel;
  private $userModel;

  public function __construct()
  {
    $this->regModel = $this->model('RegModel');
    $this->smsModel = $this->model('Ebulk');
    $this->userModel = $this->model('User');

    $_SESSION['admin'] = true;
  }

  // Admin dashboard view
  public function index($zone = null)
  {
    $kaduna_zone = $this->regModel->getRegistrationsByZone('Kaduna');
    $minna_zone = $this->regModel->getRegistrationsByZone('Minna');
    $ufuma_zone = $this->regModel->getRegistrationsByZone('Ufuma');
    $data = [
      'registrations' => $this->regModel->getAllRegistrations(),
      'kaduna_zone' => $kaduna_zone,
      'minna_zone' => $minna_zone,
      'ufuma_zone' => $ufuma_zone,
      'zone' => $zone
    ];

    $this->view('admission/index', $data);
  }

  public function profile($id)
  {
    $student = $this->regModel->getRegistrationById($id);

    if (!$student) {
      flash('msg', 'User not found');
      redirect('admission');
    }

    $data = [
      'user' => $student
    ];

    $this->view('admission/profile', $data);
  }

  public function edit($id)
  {
    $student = $this->regModel->getRegistrationById($id);
    $fullname = $student->surname . ' ' . $student->other_name;
    $data = [
      'reg_id' => $student->reg_id,
      'user' => $student,
      'name' => $fullname
    ];

    $this->view('admission/edit', $data);
  }

  public function admit($id)
  {
    $student = $this->regModel->getRegistrationById($id);
    $data = [
      'surname' => $student->surname,
      'other_name' => $student->other_name,
      'age' => $student->age,
      'gender' => $student->gender,
      'marital_status' => $student->marital_status,
      'state' => $student->state,
      'zone' => $student->zone,
      'address' => $student->address,
      'mobile' => $student->mobile,
      'alt_no' => $student->alt_no,
      'email' => $student->email,
      'occupation' => $student->occupation,
      'lang_speak' => $student->lang_speak,
      'lang_write' => $student->lang_write,
      'litracy' => $student->litracy,
      'church' => $student->church,
      'post' => $student->post,
      'born_again' => $student->born_again,
      'baptism' => $student->baptism,
      'calling' => $student->calling,
      'in_calling' => $student->in_calling,
      'entered_calling' => $student->entered_calling,
      'attended_mitre' => $student->attended_mitre,
      'why_mitre' => $student->why_mitre,
      'oversight' => $student->oversight,
      'certificate' => $student->certificate,
      'cert_year' => $student->cert_year,
      'institution' => $student->institution,
      'ref_name' => $student->ref_name,
      'ref_phone' => $student->ref_phone,
      'ref_address' => $student->ref_address,
      'ref_email' => $student->ref_email,
      'ref_duration' => $student->ref_duration,
      'ref_info' => $student->ref_info
    ];
    $admitted = $this->regModel->register($data);
    $this->regModel->updateStatus($id);
    if ($admitted) {
      $data = [
        'ministry' => $student->calling,
        'name' => $student->surname . ' ' . $student->other_name,
        'set' => '18',
        'phone' => $student->mobile,
        'whatsapp' => $student->mobile,
        'email' => $student->email,
        'assembly' => $student->church,
        'occupation' => $student->occupation,
        'zone' => $student->zone,
        'gender' => $student->gender,
        'address' => $student->address

      ];
      $this->userModel->register_by_admin($data);
    } else {
      die('Something went wrong');
    }
    flash('msg', 'Applicant admitted, and Database updated.');
    redirect('admission/profile/' . $id);
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Execute
      if ($this->regModel->delete($id)) {
        // Redirect
        flash('msg', 'Delete Successfull..');
        redirect('admission');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('admission');
    }
  }

  // Export view
  public function export($zone = null)
  {
    $kaduna_zone = $this->regModel->getRegistrationsByZone('Kaduna');
    $minna_zone = $this->regModel->getRegistrationsByZone('Minna');
    $ufuma_zone = $this->regModel->getRegistrationsByZone('Ufuma');
    $data = [
      'registrations' => $this->regModel->getAllRegistrations(),
      'kaduna_zone' => $kaduna_zone,
      'minna_zone' => $minna_zone,
      'ufuma_zone' => $ufuma_zone,
      'zone' => $zone
    ];
    $this->view('admission/export', $data);
  }
}
