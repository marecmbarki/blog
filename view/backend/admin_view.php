
<?php $title = 'ESPACE ADMIN'; ?>
    <?php ob_start(); ?> 
    <button class="btn btn-danger" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <a href="index.php">Déconnexion</a>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h1>Bonjour <?= $_SESSION['login'] ?> !</h1>
            </li>
        </ul>
    </div>
    <button class="btn btn-warning">
        <a href="#reported_comments">Accéder à la liste des commentaires signalés</a>
    </button>
    <?php $navbar = ob_get_clean(); ?>
    <?php ob_start(); ?>
<div>
    <form action="index.php?action=createPost" method="post">
        <label>Nouveau billet</label>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Pseudo" />
        </div>
        <div class="form-group">
            <label>Message <textarea name="message" id="message" class="form-control" ></textarea></label>
        </div>
        <input type="submit" value="POSTER" class="btn btn-primary" />
    </form>
</div>
    <h2>Derniers billets</h2>
    <?php while($post = $posts->fetch()) { ?>
        <div class="jumbotron" style="background-color: #535453;">
                <h2 class="lead"><?= htmlspecialchars($post['name']) ?></h2>
                <hr class="my-4">
                <?php if (strlen($post['message']) <= 50) { ?>
                <p><?= nl2br($post['message']) ?></p>
                <?php } else { ?>
                <?php  $extract = substr($post['message'], 0, -50); ?>
                <p><?= nl2br($extract) ?></p>
                <?php } ?>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="index.php?id=<?= $post['id'] ?>&amp;action=displayPost">voir plus</a>
                </p>
        </div>
    <?php } ?>
<h3>Commentaires signalés</h3>
<?php while($reportedComment = $reportedComments->fetch()) { ?>
    <div class="jumbotron" id="reported_comments" style="background-color: #cc8800">
        <h4 class="lead"><?= $reportedComment['author'] ?></h4>
        <hr class="my-4">
        <p><?= nl2br($reportedComment['comment']) ?></p>
        <button class="btn btn-primary">
            <a href="index.php?id=<?= $reportedComment['postId'] ?>&amp;action=displayPost">Voir le post</a>
        </button>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>