<?php
include('config.php');
$target_path = FOLDERUPLOAD;
$file = basename( $_FILES['uploadedfile']['name']);
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
  $file=$target_path;
  shell_exec('calibredb add '.$file.' --library-path=/'.CALIBREDB.' && rm '. $file);} else{
  echo "There was an error uploading the file, please try again!";
}
header("Location: {$_SERVER['HTTP_REFERER']}");;
?>
