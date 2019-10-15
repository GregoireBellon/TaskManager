<?php
    session_start();
?>


<body>
    <h1> Ajoutez une nouvelle liste</h1>
    <form method="POST" action="../Scripts_PHP/ajoutListe.php">
        <input type="text" name="nomListe" placeholder="Nom de la liste">
        <input type="submit" value="Ajouter la liste">
    </form>
</body>

