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
    <?php if (isset($_SESSION['login'])) { ?>
    <a href="index.php?action=editArticle&amp;id=<?= $_GET['id'] ?>">Modifier le Post</a>
    <a href="index.php?action=deleteArticle&amp;id=<?= $_GET['id'] ?>">Supprimer le Post</a>
    <a href="index.php?action=admin">Retour à l'espace admin</a>
    <?php } else { ?>
        <a href="index.php">Retour aux billets</a>
    <?php } ?>
    
</div>    
<div>    
    <h3>Commentaires du Post</h3>
    <?php while ($comment = $comments->fetch()) { ?>
        <p>
            <strong><?= htmlspecialchars($comment['author']) ?></strong> : <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        </p>
        <?php if(isset($_SESSION['login'])) { ?>
        <a href="index.php?action=deleteComment&amp;postId=<?= $_GET['id'] ?>&amp;id=<?= $comment['id'] ?>">Supprimer le commentaire</a>
        <?php } ?>
        <a href="index.php?action=reportComment&amp;postId=<?= $_GET['id'] ?>&amp;id=<?= $comment['id'] ?>">Signaler le commentaire</a>
    <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>