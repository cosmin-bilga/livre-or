<form action="profil.php" method="post" class="form-profil">
    <p>Modifications Profil:</p>
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" <?php echo "value=\"" . $_SESSION["logged_user"] . "\"" ?>>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <label for="password-repeat">Répetez le password:</label>
    <input type="password" name="password-repeat" id="password-repeat">
    <?php
    if ($res["ok"])
        echo "<p class=\"input-message\">" . $_SESSION["message"] . "</p>";
    elseif (isset($_SESSION["message"]))
        echo "<p class=\"input-error\">" . $_SESSION["message"] . "</p>";
    $_SESSION["message"] = NULL; ?>
    <input type="submit" value="Mettre à jour" name="modif" class="main-form">
</form>