<?php
class Admission extends Controller {
    private $regModel;

    public function __construct() {
    $this->regModel = $this->model('RegModel');
    $_SESSION['admin'] = true;
    }

    // Admin dashboard view
    public function index() {
        $data = [
            'registrations' => $this->regModel->getAllRegistrations()
        ];

        $this->view('admission/index', $data);
    }

    public function profile($id) {
    $user = $this->regModel->getRegistrationById($id);

    if (!$user) {
        flash('msg', 'User not found');
        redirect('admission');
    }

    $data = [
        'user' => $user
    ];

    $this->view('admission/profile', $data);
}

public function edit($id) {
  $user = $this->regModel->getRegistrationById($id);
    $fullname = $user->surname.' '.$user->other_name;
    $data = [
      'reg_id' => $user->reg_id,
        'user' => $user,
        'name' => $fullname
    ];

    $this->view('admission/edit', $data);
}

public function admit($id) {
  $user = $this->regModel->getRegistrationById($id);
  send_admit_sms($user->mobile);
  flash('msg', 'SMS Sent Successfully!');
  redirect('admission/profile/'.$id);
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

}
