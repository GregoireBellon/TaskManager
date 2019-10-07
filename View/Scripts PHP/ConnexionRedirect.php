<?php
session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

//echo 'username = '.$_SESSION[username];

if (isset($_POST['sign_button'])) {
    header('Location: ../Pages/pageSignin.php');
}
elseif (isset($_POST['connec_button'])) {
    header('Location: DbConnection.php');
}
