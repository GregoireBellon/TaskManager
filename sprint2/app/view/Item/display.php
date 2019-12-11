<?php
include_once('View.php');
include('app/view/Basics/header.php');
echo "(<a href = \".\">retour à la liste</a>)";
echo "<h2>Todo</h2>";
echo "<blockquote>";
if ($item = $stmt->fetch ()) {
    echo "<p><b>" . $item["description"] . "</b> <a href='index.php?action=edit&slug=" . $item["slug"] . "'>(edit)</a></p>";
    echo "<p><em>A faire avant le " . $item["expiration"] . "</em></p>";
} else {
    echo "<p>Fiche introuvable</p>";
}
echo "</blockquote>";

include('app/view/Basics/footer.php');