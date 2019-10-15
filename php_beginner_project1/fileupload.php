<?php

$file=$GLOBALS["filewe"];
$target_dir = '../uploads/';
$path = pathinfo($file);
$filename = $path['filename'];
$ext = $path['extension'];
$extensions_arr = array("jpg","jpeg","png","gif");
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$file_ext_tmp = explode('.', $file);
$file_ext = strtolower(end($file_ext_tmp));
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$path_filename_ext = $target_dir.$filename.".".$ext;
// Check if file already exists
if (file_exists($path_filename_ext)) {
    $message = "please ! choose an other image as it is already uploaded ";
    header("Location: Views/add_edit.php?Message=" . urlencode($message));
}
else if( !in_array($imageFileType,$extensions_arr) )
{
    $message = "UnSuccessfully Added due to Invalid Extension ,Should be In (jpg,jpeg,png,gif) ";
    header("Location: Views/add_edit.php?Message=" . urlencode($message));
}
else if( in_array($imageFileType,$extensions_arr) ) {
    // Upload file
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    //image upload to folder
}

?>