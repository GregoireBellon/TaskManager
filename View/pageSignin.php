<?php
    // Page de création d'un compte
    session_start();
?>
<!DOCTYPE html>
<link href="pageLogin.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
</head>
<body>
<div id="brand"><h1 id="title">Sign up</h1></div>
<div id="formConnection">
    <form id="formConnection" method="post" action="../Scripts/verifSignIn.php">
        <span class="description">Username <input class="input" name="username" value="<?php echo $_SESSION['username']; ?>" required></span>
        <span class="error"><?php echo $_SESSION['username_error']?></span>
        <span class="description">Password<input class="input" type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required></span>
        <span class="description">Confirm password<input class="input" type="password" name="password_confirm" required></span>
        <span class="error"><?php echo $_SESSION['password_not_same']?></span>
        <input class="submit" id="signButton" value="Sign up" name="signing_submit" type="submit">
    </form>
</div>
</body>
</html>

<?php
$_SESSION['password_not_same']="";
$_SESSION['username_error']="";
 ?>