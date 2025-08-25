<form action="connexion.php" method="post" class="connexion-form">
    <p>Connexion</p>
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" <?php if (isset($_POST["login"])) echo "value=\"" . $_POST["login"] . "\"" ?>>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <?php if (isset($_SESSION["error"])) echo "<p class=\"input-error\">" . $_SESSION["error"] . "</p>"; ?>
    <?php if (isset($_SESSION["message"])) echo "<p class=\"input-message\">" . $_SESSION["message"] . "</p>"; ?>
    <input type="submit" value="Connexion" class="main-form">
</form>