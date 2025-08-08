<?php
session_start();

include "model.php";

print_r($_SESSION);

if (!isset($_SESSION["logged_user"])) {
    $_SESSION["message"] = "Need to be logged in to leave a comment.";
    header('Location: index.php');
    exit();
}

if (isset($_POST["Deconnexion"])) {
    session_unset();
    header("Location: index.php");
}

if (isset($_POST["comment"])) {
    $res = submit_comment($_POST["comment"], $_SESSION["logged_user_id"]);
    $_SESSION["message"] = $res["message"];
    header('Location: livre-or.php');
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
</head>

<body>
    <main>
        <?php include "templates/comment-form.php"; ?>
    </main>
</body>

</html>