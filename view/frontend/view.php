<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
  <h1 class="font-weight-bolder" id="home-title"><img src="public/images/blog.png" alt="Mon blog"/>MON BLOG</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ml-3">
        <a class="nav-link" href="index.php?action=logView"><img src="public/images/login.png" alt="Connexion"/>CONNEXION</a>
      </li>
      <li class="nav-item ml-3">
      <a class="nav-link" href="index.php?action=registerView"><img src="public/images/register.png" alt="Formulaire d'inscription" />INSCRITPTION</a>
      </li>
    </ul>
  </div>
<?php $navbar = ob_get_clean(); ?>
<?php ob_start(); ?>
<?php if (isset($_SESSION['login'])) {
  unset($_SESSION['login']);
} ?>
<?php while($post = $posts->fetch()) { ?>
    <div class="jumbotron">
      <p><?=  $post['date'] ?></p>
      <h2 class="lead"><?= htmlspecialchars($post['name']) ?></h2>
      <hr class="my-4">
<?php if (strlen($post['message']) <= 40) { ?>
        <p><?= nl2br($post['message']) ?></p>
<?php } else { ?>
        <p><?= nl2br(substr($post['message'], 0, 40)) ?>...</p>
<?php } ?>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="index.php?id=<?= $post['id'] ?>&amp;action=displayPost">voir plus</a>
        </p>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>