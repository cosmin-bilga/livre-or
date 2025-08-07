<?php

$current_page = explode("/", $_SERVER["REQUEST_URI"]);
$current_page = end($current_page);
?>

<header>
    <img src="assets/media/squirrel.webp">
    <nav>
        <?php
        if (isset($_SESSION["logged_user"]))
            echo " <a href=\"profil.php\"><img src=\"assets/media/profile.svg\">Modifier Profil</a> <form action=\"index.php\" method=\"post\"><img src=\"assets/media/disconnect.svg\"><input type=\"submit\" name=\"Deconnexion\" value=\"Deconnexion\" id=\"deconnexion\"></form>";
        if (!isset($_SESSION["logged_user"])) echo "<a href=\"connexion.php\"><img src=\"assets/media/login.svg\">Connexion</a> <a href=\"inscription.php\"><img src=\"assets/media/register.svg\">Inscription</a>"; ?>
    </nav>
    <?php if (isset($_SESSION['message'])) echo "<p class=\"index-message\">" . $_SESSION['message'] . "</p>";
    $_SESSION['message'] = null; ?>
</header>