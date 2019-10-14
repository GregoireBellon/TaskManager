<?php
session_start(); ?>
<!DOCTYPE html>
<link href="pageLogin.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
</head>
<body>
<div id="brand"><h1 id="title">Sign up</h1></div>
<div id="form_connection">


    <form id="form_connection" method="post" action="../Scripts_PHP/ConnexionRedirect.php">

        <span class="description">Username <input class="input" name="signin_username" value="<?php echo $_SESSION['username']; ?>" required></span>
        <span class="error"><?php echo $_SESSION['username_error']?></span>
        <span class="description">Password<input class="input" type="password" name="signing_password" value="<?php echo $_SESSION['password']; ?>" required></span>
        <span class="description">Confirm password<input class="input" type="password" name="signing_password_confirm" required></span>
        <span class="error"><?php echo $_SESSION['password_not_same']?></span>
        <input class="submit" id="sign_button" value="Sign up" name="signing_submit" type="submit">

    </form>

</div>
</body>
</html>

<?php
$_SESSION['password_not_same']="";
$_SESSION['username_error']="";
 ?>