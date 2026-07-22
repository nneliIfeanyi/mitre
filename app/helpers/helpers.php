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
    $email = "stanvicbest@gmail.com";
    $password = "824NXJ46mYhmSY$";
    $message = "Your MITRE application was recieved successfully. You will be contacted for further information. More of God's blessings.";
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

function send_admit_sms($phone_number)
{
    $phone_number = ltrim($phone_number, '\0');
    $email = "stanvicbest@gmail.com";
    $password = "824NXJ46mYhmSY$";
    $message = "Greetings You have been admitted to Mitre";
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



// Simple page redirect
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}


function generate_reg_no($zone, $id, $prefix = '18')
{
    $zone_map = [
        'Kaduna' => 'K',
        'Minna' => 'N',
        'Ufuma' => 'U'
    ];

    $zone_code = isset($zone_map[$zone]) ? $zone_map[$zone] : '';
    $formatted_id = str_pad((string)$id, 3, '0', STR_PAD_LEFT);

    return $prefix . '-' . $zone_code . $formatted_id;
}



function fn_resize($image_resource_id, $width, $height)
{

    $target_width = 320;
    $target_height = 300;
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    // preserve PNG transparency
    imagealphablending($target_layer, false);
    imagesavealpha($target_layer, true);
    imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $width, $height);
    return $target_layer;
}



function upload_image($file)
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($file["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            //echo "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.";
            $sourceProperties = getimagesize($target_file);
            $resizeFileName = time();
            $uploadImageType = $sourceProperties[2];
            $sourceImageWidth = $sourceProperties[0];
            $sourceImageHeight = $sourceProperties[1];
            switch ($uploadImageType) {
                case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($target_file);
                    $imageLayer = fn_resize($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagejpeg($imageLayer, $target_dir . "thump_" . $resizeFileName . "." . $imageFileType);
                    break;
                case IMAGETYPE_GIF:
                    $resourceType = imagecreatefromgif($target_file);
                    $imageLayer = fn_resize($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagegif($imageLayer, $target_dir . "thump_" . $resizeFileName . "." . $imageFileType);
                    break;
                case IMAGETYPE_PNG:
                    $resourceType = imagecreatefrompng($target_file);
                    $imageLayer = fn_resize($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagepng($imageLayer, $target_dir . "thump_" . $resizeFileName . "." . $imageFileType);
                    break;
                default:
                    $imageProcess = 0;
                    break;
            }
            unlink($target_file);
            return "thump_" . $resizeFileName . "." . $imageFileType;
            //return $target_dir . "thump_" . $resizeFileName . "." . $imageFileType;
            //return $resizeFileName . "." . $imageFileType;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
