<?php
session_start(); ?>
<!DOCTYPE html>
<link href="connexion.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
</head>
<body>
<div id="brand"><h1 id="title">Sign up</h1></div>
<div id="form_connection">

    <form id="form_connection" method="post" action="../DbConnection.php">

        <span class="description">Username <input class="input" name="signin_username" value="<?php echo $_SESSION['username']; ?>"></span>
        <span class="description">Password<input class="input" name="signing_password" value="<?php echo $_SESSION['password']; ?>"></span>
        <span class="description">Confirm <input class="input" name="signing_password_confirm"></span>

        <input class="submit" id="sign_button" value="Sign up" name="signing_submit" type="submit">

    </form>

</div>
</body>
</html>