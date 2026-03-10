<?php
class Admission extends Controller
{
  private $regModel;
  private $smsModel;

  public function __construct()
  {
    $this->regModel = $this->model('RegModel');
    $this->smsModel = $this->model('Ebulk');

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
    // Update status first
    $this->regModel->updateStatus($id);

    $student = $this->regModel->getRegistrationById($id);
    // SMS SENDING...//
    $this->smsModel->sendSMS(
      "MITRE",
      "",
      $student->mobile
    );
    flash('msg', 'Applicant admitted and SMS sent.');
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
