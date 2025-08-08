<?php
session_start();

include "model.php";

if (!isset($_SESSION["logged_user"])) {
    header('Location: index.php');
    exit();
}


$res = check_modification($_POST, $_SESSION["logged_user"]);
$_SESSION["message"] = $res["message"];

if ($res["ok"])
    $_SESSION["logged_user"] = secure_string($_POST["login"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <main>
        <?php
        include "templates/header.php";
        include "templates/profile-form.php"; ?>
    </main>
</body>

</html>