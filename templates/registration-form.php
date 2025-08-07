<form action="inscription.php" method="post">
    <p>Inscription</p>
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" <?php if (isset($_POST["login"])) echo "value=\"" . $_POST["login"] . "\"" ?>>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <label for="password-repeat">Répetez le password:</label>
    <input type="password" name="password-repeat" id="password-repeat">
    <?php if (isset($_SESSION["message"])) echo "<p class=\"input-message\">" . $_SESSION["message"] . "</p>";
    $_SESSION["message"] = NULL; ?>
    <input type="submit" value="Inscription" class="main-form">
</form>