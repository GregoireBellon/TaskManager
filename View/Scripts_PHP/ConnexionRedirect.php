<?php
session_start();
include('DatabaseManipulation.php');
$password = $_POST['signing_password'];
$password_conf=$_POST['signing_password_confirm'];

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

if (isset($_POST['sign_button'])) {
    header('Location: ../Pages/pageSignin.php');
}
else {
     $db = new DatabaseManipulation();
     $valid_combination=$db->connect($_POST['username'], $_POST['password']);

     if ($valid_combination==true) {
         header('Location: ../Pages/taskList.php');
     } else {
         $_SESSION['connection_error']="Bad password/username :-(";
         header('Location: ../Pages/pageLogin.php');
         echo "Login ou mot de passe incorrect :-(";
     }

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

