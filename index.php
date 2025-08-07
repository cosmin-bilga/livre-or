<?php

//Login Cosmin 1Aazerty##

session_start();

if (isset($_POST["Deconnexion"])) {
    session_unset();
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre D'or</title>
</head>

<body>
    <?php
    include "templates/header.php";
    include "templates/index-main.php"; ?>

</body>

</html>