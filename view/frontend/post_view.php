<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['login'])) { ?>
    <button class="btn btn-success" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <a href="index.php?action=admin">Retour à l'espace admin</a>
    </button>
<?php } else { ?>
    <button class="btn btn-success" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <a href="index.php">Retour aux billets</a>
    </button>
<?php } ?>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h2>Posté par <?= $post['name'] ?></h2>
            </li>
        </ul>
    </div>
<?php $navbar = ob_get_clean(); ?>
<?php ob_start(); ?>
    <div class="jumbotron" style="background-color: #535453;">
        <p><?= nl2br($post['message']) ?></p>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
<?php if (isset($_SESSION['login'])) { ?>
            <label class="btn btn-secondary">
                <a href="index.php?action=editArticle&amp;id=<?= $_GET['id'] ?>">Modifier le Post</a>
            </label>
            <label class="btn btn-primary">
                <a href="index.php?action=deleteArticle&amp;id=<?= $_GET['id'] ?>">Supprimer le Post</a>
            </label>
<?php } ?>
        </div>
    </div>
    <div>
        <form action="index.php?id=<?= $_GET['id'] ?>&amp;action=addComment" method="post">
            <label>Laisser un commentaire</label>
            <div class="form-group">
                <input type="text" name="author" class="form-control" placeholder="Auteur" />
            </div>
            <div class="form-group">
                <textarea name="comment" id="comment" placeholder="Commentaire..." class="form-control" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">envoyer</button>
        </form>
    </div>
    <h2 class="lead">Commentaires</h2>
<?php while ($comment = $comments->fetch()) { ?>
    <div class="jumbotron" style="background-color: #535453;">
        <h3 class="lead"><?= htmlspecialchars($comment['author']) ?></h2>
        <hr class="my-4">
        <p><?= htmlspecialchars(nl2br($comment['comment'])) ?></p>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
<?php if (isset($_SESSION['login'])) { ?>
            <label class="btn btn-secondary">
                <a href="index.php?action=deleteComment&amp;postId=<?= $_GET['id'] ?>&amp;id=<?= $comment['id'] ?>">Supprimer le commentaire</a>
            </label>
<?php }?>
            <label class="btn btn-primary">
                <a href="index.php?action=reportComment&amp;postId=<?= $_GET['id'] ?>&amp;id=<?= $comment['id'] ?>">Signaler le commentaire</a>
            </label>
        </div>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>