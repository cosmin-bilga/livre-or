<?php
session_start();
include "model.php";

// Don't have to see page is already logged in
if (isset($_SESSION["logged_user"])) {
    header('Location: index.php');
    exit();
}

$current_page = get_current_page();
$res = check_registration($_POST);


$_SESSION["message"] = $res["message"];
if ($res["ok"]) {
    header('Location: connexion.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <main>
        <?php
        include "templates/header.php";
        include "templates/registration-form.php"; ?>
    </main>
    <?php include "templates/footer.php"; ?>
</body>

</html>