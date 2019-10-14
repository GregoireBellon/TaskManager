<?php
session_start();
include('DatabaseManipulation.php');
$password = $_POST['signing_password'];
$password_conf=$_POST['signing_password_confirm'];


if (isset($_POST['sign_button'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: ../Pages/pageSignin.php');
}
if (isset($_POST['connec_button'])) {
    header('Location: DbConnection.php');
}
if ((isset($_POST['signing_submit']))){

    if (strcmp($password, $password_conf)!=0){
        $_SESSION['password_not_same']="The passwords are not the same!";
        echo "nonononononon";
        header('Location: ../Pages/pageSignin.php');
        return;
    }

    else{
        $db = new DatabaseManipulation();
        if ($db->addUser($_POST['signin_username'], $_POST['signing_password'])==false){
            $_SESSION['username_error']="This username is already used!";
            header('Location: ../Pages/pageSignin.php');

        }
    }


}

