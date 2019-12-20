
<?php $title = 'LOG'; ?>
<?php ob_start(); ?>
<button class="btn btn-success" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <a href="index.php">RETOUR</a>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h1><img src="public/images/login.png" alt="Connexion" class="figure-img img-fluid rounded" />Connexion</h1>
            </li>
        </ul>
    </div>
<?php $navbar = ob_get_clean(); ?>
    <?php ob_start(); ?>
<div>
    <form action="index.php?action=adminChecking" method="post">
        <label>Accéder à mon blog</label>
        <div class="form-group">
            <input type="text" name="login" placeholder="Login" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" name="password" class="form-control"/>
        </div>
            <input type="submit" class="btn btn-success" />
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php') ?>