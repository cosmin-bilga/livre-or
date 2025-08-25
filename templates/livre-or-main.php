<main>
    <?php foreach ($data as $comment) {
        //print_r($comment);
    ?>
        <div class="comment-card">
            <div class="comment-info">
                <p>Posté par: <?php echo $comment['login']; ?></p>
                <p>Date création: <?php echo $comment['date']; ?></p>
            </div>
            <div class="comment-content">
                <p><?php echo $comment['commentaire']; ?></p>
            </div>
        </div>
    <?php } ?>
    <div class="page-menu">
        <?php
        if ((int) $_GET["page"] !== 1)
            echo "<a href=\"?page=" . (int) $_GET["page"] - 1 . "\">Page precedente</a>";
        echo "<p>Page " . $_GET["page"] . "</p>";
        if ((int) $_GET["page"] !== $page_number)
            echo "<a href=\"?page=" . (int) $_GET["page"] + 1 . "\">Page suivante</a>";
        ?>
    </div>
    <?php
    if (isset($_SESSION["logged_user"]))
        include "comment-form.php"; ?>
</main>