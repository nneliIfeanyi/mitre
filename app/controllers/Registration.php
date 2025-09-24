<?php
class Registration extends Controller
{

    private $regModel;

    public function __construct()
    {
        $this->regModel = $this->model('RegModel');
        if (!isset($_COOKIE['reg_id'])) {
            $_SESSION['reg_id'] = '';
            $token = bin2hex(random_bytes(7));
            setcookie("reg_id", $token, time() + (86400 * 7), "/");
            $_SESSION['reg_id'] = $_COOKIE['reg_id'];
        } else {
            $_SESSION['reg_id'] = $_COOKIE['reg_id'];
        }
    }

    public function index()
    {
        $data = [];
        $this->view('registration/index', $data);
    }

    public function step1()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'reg_id' => $_POST['reg_id'],
                'surname' => $_POST['surname'],
                'other_name' => $_POST['other_name'],
                'age' => $_POST['age'],
                'gender' => $_POST['gender'],
                'marital_status' => $_POST['marital_status'],
                'state' => $_POST['state'],
                'zone' => $_POST['zone'],
                'address' => $_POST['address'],
                'mobile' => $_POST['mobile'],
                'alt_no' => $_POST['alt_no'],
                'email' => $_POST['email'],
                'occupation' => $_POST['occupation'],
                'lang_speak' => $_POST['lang_speak'],
                'lang_write' => $_POST['lang_write'],
                'litracy' => $_POST['litracy']
            ];
            if ($this->regModel->step1($data)) {
                flash('msg', 'Data Saved Successfully');
                redirect('registration/step1');
            } else {
                die("Something went wrong...");
            }
        } else {
            //Pull from database
            $step1 = $this->regModel->findRegId($_SESSION['reg_id']);
            $data  = [
                'reg_id' => $_SESSION['reg_id'],
                'step1' => $step1
            ];
            $this->view('registration/step1', $data);
        }
    }

    public function step2()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'church' => $_POST['church'],
                'post' => $_POST['post'],
                'born_again' => $_POST['born_again'],
                'baptism' => $_POST['baptism'],
                'calling' => $_POST['calling'],
                'in_calling' => $_POST['in_calling'],
                'entered_calling' => $_POST['entered_calling'],
                'attended_mitre' => $_POST['attended_mitre'],
                'why_mitre' => $_POST['why_mitre'],
                'oversight' => $_POST['oversight'],
                'certificate' => $_POST['certificate'],
                'cert_year' => $_POST['cert_year'],
                'institution' => $_POST['institution']
            ];
            if ($this->regModel->step2($_SESSION['reg_id'], $data)) {
                flash('msg', 'Data Saved Successfully');
                redirect('registration/step2');
            } else {
                die("Something went wrong...");
            }
        } else {
            if (!isset($_SESSION['reg_id'])) {
                redirect('registration/step1');
            }
            //Pull from database
            $step2 = $this->regModel->findRegId($_SESSION['reg_id']);
            $data  = [
                'step2' => $step2
            ];
            $this->view('registration/step2', $data);
        }
    }
    // Step 3 | Referee Section
    public function step3()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ref_name' => $_POST['ref_name'],
                'ref_phone' => $_POST['ref_phone'],
                'ref_address' => $_POST['ref_address'],
                'ref_email' => $_POST['ref_email'],
                'ref_duration' => $_POST['ref_duration'],
                'ref_info' => $_POST['ref_info']
            ];
            // Update DB
            if ($this->regModel->step3($_SESSION['reg_id'], $data)) {
                foreach ($_COOKIE as $name => $value) {
                    // Expire each cookie
                    setcookie($name, "", time() - 3600, "/");
                    unset($_COOKIE[$name]);
                }
                unset($_SESSION['reg_id']);
                session_destroy();
                $this->view('registration/success');
            } else {
                die("Something went wrong...");
            } // End Update DB
        } else { // Not Post Request
            if (!isset($_SESSION['reg_id'])) {
                redirect('registration/step1');
            }
            //Pull from database
            $step3 = $this->regModel->findRegId($_SESSION['reg_id']);
            $data  = [
                'step3' => $step3
            ];
            $this->view('registration/step3', $data);
        }
    } // End Step 3 | Referee Section
}
