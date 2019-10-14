<?php
    include_once ("DatabaseManipulation.php");
    include_once ("TaskList.php");
    session_start();
    $nomListe = $_POST["nomListe"];
    if ($nomListe == "" or $nomListe["nomListe"] == null) {
        $nomListe= "Pas de nom";
        return;
    }

        $newList = new TaskList($nomListe, "15/10/2019");
        $db->addList($newList);
        header('Location: ../Pages/listOfLists.php');
    
?>
<body>
    <form action="ajoutListe.php">
        <input type="text" name="nomListe" placeholder="Nom de la liste">
        <input type="submit" value="Ajouter la liste">
    </form>
</body>

