<?php

?>

<!DOCTYPE html>
<link href="pageLogin.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connection page</title>
</head>
<body>

<div id="brand"> <h1 id="title">TaskManager</h1> </div>
<img src="../Ressources/user.png" id="connection_img">

<form id="form_connection" method="post" action="../Scripts_PHP/ConnexionRedirect.php">
    <div id="username_input" >
        <input name="username" class="input" placeholder="Username"/>
    </div>
    <div id="password_input" >
        <input name="password" class="input" type="password"  placeholder="password"/>
    </div>
    <div id="submit_buttons">
        <input name="connec_button" value="Connection" class="submit" id="connec_button" type="submit">
        <input name="sign_button" value="Sign_in" class="submit" id="sign_button" type="submit">
    </div>
</form>
</body>
</html>
