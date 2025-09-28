<?php
session_start();

// Flash message helper
function flash($name = '', $message = '', $class = 'alert alert-success')
{
  if (!empty($name)) {
    if (!empty($message) && empty($_SESSION[$name])) {
      if (!empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }
      $_SESSION[$name] = $message;
      $_SESSION[$name . '_class'] = $class;
    } elseif (empty($message) && !empty($_SESSION[$name])) {
      $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : 'alert alert-info';

      echo '
            <div class="modal fade" id="flashModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header ' . $class . '">
                    <h5 class="modal-title m-0">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body lead  fs-5 fst-italic fw-bold">
                    ' . $_SESSION[$name] . '
                  </div>
                </div>
              </div>
            </div>';

      unset($_SESSION[$name]);
      unset($_SESSION[$name . '_class']);
    }
  }
}



// Send sms to Admin to notify of new registration 
function send_sms($phone_number)
{
  $phone_number = ltrim($phone_number, '\0');
  $email = "";
  $password = "";
  $message = "New Student Registration on MITRE Portal. Please check the admin dashboard for details.";
  $sender_name = "MITRE";
  $recipients = '234' . $phone_number;

  $forcednd = "1";
  $data = array("email" => $email, "password" => $password, "message" => $message, "sender_name" => $sender_name, "recipients" => $recipients, "forcednd" => $forcednd);
  $data_string = json_encode($data);
  $ch = curl_init('https://app.multitexter.com/v2/app/sms');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
  $result = curl_exec($ch);
  $res_array = json_decode($result);
  //print_r($res_array);

}
