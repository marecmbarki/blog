<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
<div>
    <h1>Message</h1>
    <h2>Posté par <?= $post['name'] ?>, </h2>
    <p>Message :<p>
    <?= nl2br(htmlspecialchars($post['message'])); ?>
    <p>Laisser un commentaire :</p>

    <form action="index.php?id=<?= $_GET['id'] ?>&amp;action=addComment" method="post">
        <div>
            <label>Auteur</label><br />
            <input type="text" name="author" />
        </div>
        <div>
            <label>Commentaire</label><br />
            <textarea name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>    
<div>    
    <h3>Commentaires du Post</h3>
    <?php while ($comment = $comments->fetch()) { ?>
        <p>
            <strong><?= htmlspecialchars($comment['author']) ?></strong> : <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        </p>
    <?php } ?>
</div>
<?php $content = ob_get_clean() ?>
<?php require('template.php'); ?>