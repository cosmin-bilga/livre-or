<?php
session_start();

include "model.php";

$res = get_commentaires();

$data = $res["data"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre D'or</title>
</head>

<body>
    <?php include "templates/livre-or-main.php"; ?>
</body>

</html>