<?php
session_start();
require_once "dbconnect.php";
$email=$_SESSION['e-mail'];
$id=$_SESSION['id'];
if(!isset($_SESSION['e-mail'])|| $_SESSION['e-mail'] =="") {
    header("Location: index.php");
}

if(isset($_GET['path'])){
    //Read the filename
    $filename = 'cartelle/'.$email.'/'.$_GET['path'];
    $name=$_GET['path'];
    //Check the file exists or not
    if(file_exists($filename)) {
    //Define header information
        unlink($filename);
        $result=mysqli_query($conn, "DELETE FROM file WHERE nome='$name'");

        //Terminate from the script
        header("Location: dashboard.php");
    }else{
        echo "File does not exist.";
    }
}else
    echo "Filename is not defined."
?>
