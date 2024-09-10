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
  imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $width, $height);
  return $target_layer;
}





/* 
 * Custom function to compress image size and 
 * upload to the server using PHP 
 */
function compressImage($source, $destination, $quality)
{
  // Get image info 
  $imgInfo = getimagesize($source);
  $mime = $imgInfo['mime'];

  // Create a new image from file 
  switch ($mime) {
    case 'image/jpeg':
      $image = imagecreatefromjpeg($source);
      imagejpeg($image, $destination, $quality);
      break;
    case 'image/png':
      $image = imagecreatefrompng($source);
      imagepng($image, $destination, $quality);
      break;
    case 'image/gif':
      $image = imagecreatefromgif($source);
      imagegif($image, $destination, $quality);
      break;
    default:
      $image = imagecreatefromjpeg($source);
      imagejpeg($image, $destination, $quality);
  }


  // Return compressed image 
  return $destination;
}
