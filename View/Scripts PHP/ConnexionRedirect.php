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

    if($_POST['signing_password']=!$_POST['signing_password_confirm']){
        $_SESSION['password_not_same']="The passwords are not the same!";
        header('location : ../Pages/pageSignin.php');
        return;
    }



$db = new DatabaseManipulation();
if ($db->addUser($_POST['signin_username'], $_POST['signing_password'])==false){
    $_SESSION['username_error']="This username is already used!";
}
else {echo 'C CREE';}
}

