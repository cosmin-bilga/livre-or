<?php

foreach ($comments as $comment) {
    //print_r($comment);
?>
    <div class="comment-card-profile comment-card">
        <div class="comment-info">
            <p>Posté par: <span class="comment-info-user"><?php echo $comment['login']; ?></span></p>
            <p>Date création: <?php $str = explode(' ', $comment['date'])[0];
                                $str = explode('-', $str);
                                $str = array_reverse($str);
                                $str = implode('/', $str);
                                echo $str; ?></p>
            <form method="post" action="profil.php" class="delete-form">
                <input type="hidden" name="comment-id" value="<?php echo $comment['id']; ?>">
                <input type="submit" name="delete-comment" value="Supprimer" class="delete-button">
            </form>
        </div>
        <div class=" comment-content">
            <p>
                <?php echo $comment['commentaire']; ?>
            </p>
        </div>
    </div>
<?php } ?>