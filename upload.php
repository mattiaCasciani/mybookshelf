<?php
session_start();
require_once "dbconnect.php";
$email=$_SESSION['e-mail'];
$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload'){
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
      $uploadFileDir = "cartelle/".$email."/";
      $dest_path = $uploadFileDir . $fileName;
      if(move_uploaded_file($fileTmpPath, $dest_path)) {
        $message ='File is successfully uploaded.';
        $query=mysqli_query($conn, "INSERT INTO file(nome, estensione,idUtente) VALUES('" . $fileName  . "', '" . $fileExtension . "',(SELECT id FROM utente WHERE email='".$email."'))");
      }else {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
  }else{
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: dashboard.php");
