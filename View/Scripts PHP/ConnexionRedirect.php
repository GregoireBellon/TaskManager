<?php
session_start();
include('DatabaseManipulation.php');
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

//echo 'username = '.$_SESSION[username];

if (isset($_POST['sign_button'])) {
    header('Location: ../Pages/pageSignin.php');
}
if (isset($_POST['connec_button'])) {
    header('Location: DbConnection.php');
}
if ((isset($_POST['signing_submit']))) {
$db = new DatabaseManipulation();
if ($db->addUser($_POST['signin_username'], $_POST['signing_password'])==false){
  echo 'Ce nom est déja utilisé';
}
else {echo 'C CREE';}
}
echo ok;

