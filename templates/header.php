<?php

$current_page = explode("/", $_SERVER["REQUEST_URI"]);
$current_page = end($current_page);
?>

<header id="header">
    <img src="assets\media\book-svgrepo-com.svg">
    <nav>
        <?php
        //echo "CURRENT PAGE " . $current_page;
        if ($current_page !== "index.php")
            echo "<a href=\"index.php\"><img src=\"assets/media/home-svgrepo-com.svg\">Accueil</a>";
        if ($current_page !== "livre-or.php")
            echo "<a href=\"livre-or.php\"><img src=\"assets/media/book-open-svgrepo-com.svg\">Livre d'or</a>";
        if (isset($_SESSION["logged_user"])) {
            if ($current_page !== "profil.php")
                echo "<a href=\"profil.php\"><img src=\"assets/media/profile.svg\">Modifier Profil</a>";
            if ($current_page !== "commentaire.php")
                echo "<a href=\"commentaire.php\"><img src=\"assets/media/comment-2-svgrepo-com.svg\">Laisser un commentaire</a>";
            echo "<form action=\"index.php\" method=\"post\"><img src=\"assets/media/disconnect.svg\">
                    <input type=\"submit\" name=\"Deconnexion\" value=\"Deconnexion\" id=\"deconnexion\">
                    </form>";
        }
        if (!isset($_SESSION["logged_user"])) {
            if ($current_page !== "connexion.php")
                echo "<a href=\"connexion.php\"><img src=\"assets/media/login.svg\">Connexion</a>";
            if ($current_page !== "inscription.php")
                echo "<a href=\"inscription.php\"><img src=\"assets/media/register.svg\">Inscription</a>";
        } ?>
    </nav>
</header>
<?php if (isset($_SESSION['message'])) echo "<p class=\"index-message\">" . $_SESSION['message'] . "</p>";
$_SESSION['message'] = null; ?>