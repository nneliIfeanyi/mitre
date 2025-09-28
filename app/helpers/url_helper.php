<?php
// Simple page redirect
function redirect($page)
{
  header('location: ' . URLROOT . '/' . $page);
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
