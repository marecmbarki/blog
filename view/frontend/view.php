<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
} ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <h1>MON BLOG</h1>
                </li> 
                <li class="nav-item">
                    <img src="public/images/blog.png" alt="Mon blog" class="nav-link" class="figure-img img-fluid rounded" />
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=logView">CONNEXION</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php?action=logView"><img src="public/images/login.png" class="figure-img img-fluid rounded" alt="Connexion" class="nav-link"/></a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=registerView">INSCRITPTION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=registerView"><img src="public/images/register.png" class="figure-img img-fluid rounded" alt="Formulaire d'inscription" class="nav-link"/></a>    
                </li>   
        </ul>
    </div>
</nav>
<div>
    <?php while($post = $posts->fetch()) { ?>
        <p>
            <strong><?= htmlspecialchars($post['name']) ?></strong> : <?= nl2br(htmlspecialchars($post['message'])) ?>
        </p>
        <button class="btn btn-primary">
            <a href="index.php?id=<?= $post['id'] ?>&amp;action=displayPost">voir</a>
        </button>
    <?php }
    $posts->closeCursor();
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>