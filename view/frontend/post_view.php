<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
<div>
    <h1>Message</h1>
    <h2>Posté par <?= $post['name'] ?>, </h2>
    <?= nl2br($post['message']) ?>
    <?php if (isset($_SESSION['login'])) { ?>
    <button class="btn btn-dark">
        <a href="index.php?action=editArticle&amp;id=<?= $_GET['id'] ?>">Modifier le Post</a>
    </button>
    <button class="btn btn-danger">
        <a href="index.php?action=deleteArticle&amp;id=<?= $_GET['id'] ?>">Supprimer le Post</a>
    </button>
    <button class="btn btn-secondary">    
        <a href="index.php?action=admin">Retour à l'espace admin</a>
    </button>
    <?php } else { ?>
        <a href="index.php">Retour aux billets</a>
    <?php } ?>
    <p>Laisser un commentaire :</p>

    <form action="index.php?id=<?= $_GET['id'] ?>&amp;action=addComment" method="post">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" name="author" class="form-control" placeholder="Auteur" />
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label>Commentaire <textarea name="comment" id="comment" class="form-control" ></textarea></label>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="submit" class="btn btn-success" />
        </div>
    </form>
</div>    
<div>    
    <h3>Commentaires du Post</h3>
    <?php while ($comment = $comments->fetch()) { ?>
        <p>
            <strong><?= htmlspecialchars($comment['author']) ?></strong> : <?= htmlspecialchars(nl2br($comment['comment'])) ?>
        </p>
        <?php if(isset($_SESSION['login'])) { ?>
        <button class="btn btn-danger btn-sm">
            <a href="index.php?action=deleteComment&amp;postId=<?= $_GET['id'] ?>&amp;id=<?= $comment['id'] ?>">Supprimer le commentaire</a>
        </button>
        <?php } ?>
        <button class="btn btn-warning btn-sm">
            <a href="index.php?action=reportComment&amp;postId=<?= $_GET['id'] ?>&amp;id=<?= $comment['id'] ?>">Signaler le commentaire</a>
        </button>        
        <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>