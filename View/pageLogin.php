<?php
    // Page de connexion à un compte déjà existant
    session_start();
?>

<!DOCTYPE html>
<link href="pageLogin.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TaskyManagery</title>
</head>
<body>

<!-- Logo de Connexion -->
<div id="brand"> <h1 id="title">TaskyManagery</h1> </div>
<img src="../Ressources/user.png" id="connection_img">


<!-- Formulaire de connexion -->
<form id="formConnection" method="post" action="../Scripts/redirectPageLogin.php">

    <form id="formConnection" method="post" action="../Scripts/redirectPageLogin.php">

        <div id="username_input" >
            <input name="username" class="input" placeholder="Nom d'Utilisateur"/>
        </div>
        <div id="password_input" >
            <input name="password" class="input" type="password"  placeholder="Mot de Passe"/>
        </div>
        <p class="error"> <?php echo $_SESSION["error_login"]?></p>
        <div id="submit_buttons">
            <input name="connecButton" value="Connexion" class="submit" id="connecButton" type="submit"> <br>
            <input name="signButton" value="S'inscrire" class="submit" id="signButton" type="submit"> <br>
        </div>
    </form>
</form>
</body>
</html>
<?php
$_SESSION["error_login"] = "";
?>
