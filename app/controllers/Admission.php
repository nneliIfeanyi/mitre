<?php
class Admission extends Controller {
    private $regModel;

    public function __construct() {
        $this->regModel = $this->model('RegModel');
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

}
