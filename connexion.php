<?php
session_start();
include "model.php";


// Don't have to see page is already logged in
if (isset($_SESSION["logged_user"])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST["Deconnexion"])) {
    session_unset();
    header("Location: index.php");
}

$current_page = get_current_page();
$res = check_connection($_POST);

$_SESSION["message"] = $res["message"];
if ($res["ok"]) {
    $_SESSION["logged_user"] = secure_string($_POST["login"]);
    $_SESSION["logged_user_id"] = $res["id_user"];
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <main>
        <?php
        include "templates/header.php";
        include "templates/connection-form.php"; ?>
    </main>
</body>

</html>