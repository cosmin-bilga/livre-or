<?php
session_start();

include "model.php";

if (!isset($_SESSION["logged_user"])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['delete-comment'])) {
    if (isset($_POST['comment-id']))
        delete_comment($_POST['comment-id']);
    $_SESSION["message"] = "Comment deleted";
}

if (isset($_POST['modif'])) {
    $res = check_modification($_POST, $_SESSION["logged_user"]);
    $_SESSION["message"] = $res["message"];

    if ($res["ok"])
        $_SESSION["logged_user"] = secure_string($_POST["login"]);
}

$comments = get_commentaires(0, 0, $_SESSION["logged_user"]);
if (isset($comments['data']))
    $comments = $comments['data'];
else
    $comments = [];
//print_r($comments);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <?php include "templates/header.php"; ?>
    <main>
        <?php
        include "templates/profile-form.php"; ?>
        <div>
            <?php include "templates/comments-list.php" ?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
</body>

</html>