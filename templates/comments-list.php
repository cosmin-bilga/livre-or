<?php

foreach ($comments as $comment) {
    //print_r($comment);
?>
    <div class="comment-card-profile comment-card">
        <div class="comment-info">
            <p>Posté par: <span class="comment-info-user"><?php echo $comment['login']; ?></span></p>
            <p>Date création: <?php echo $comment['date']; ?></p>
            <form method="post" action="profil.php">
                <input type="hidden" name="comment-id" value="<?php echo $comment['id']; ?>">
                <input type="submit" name="delete-comment" value="Supprimer commentaire">
            </form>
        </div>
        <div class="comment-content">
            <p>
                <?php echo $comment['commentaire']; ?>
            </p>
        </div>
    </div>
<?php } ?>