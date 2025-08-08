<?php
session_start();

include "model.php";
const NB_PER_PAGE = 10; // Number of comments per page

$res = get_comment_number();
$page_number = (int) ($res["data"] / NB_PER_PAGE);
if ($res["data"] % NB_PER_PAGE !== 0)
    $page_number++;

//echo "PAGE NB" . $page_number;

if (!isset($_GET["page"]))
    $_GET["page"] = 1;

$offset = ((int)$_GET["page"] - 1) * NB_PER_PAGE;
$res = get_commentaires($offset, NB_PER_PAGE);

$data = $res["data"];

//print_r($data);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre D'or</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <?php
    include "templates/header.php";
    include "templates/livre-or-main.php"; ?>
</body>

</html>