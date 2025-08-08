<main>
    <?php foreach ($data as $comment) {
        //print_r($comment);
    ?>
        <div class="comment-card">
            <div class="comment-info">
                <p>Posté par</p>
                <p><?php echo $comment['login']; ?></p>
                <p>le</p>
                <p><?php echo $comment['date']; ?></p>
            </div>
            <div class="comment-content">
                <p><?php echo $comment['commentaire']; ?></p>
            </div>
        </div>
    <?php } ?>
</main>