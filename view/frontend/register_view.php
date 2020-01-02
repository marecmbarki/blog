<?php $title = 'INSCRIPTION'; ?>
<?php ob_start(); ?>
<button class="btn btn-success" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <a href="index.php">RETOUR</a>
</button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ml-3">
                <h1><img src="public/images/register.png" alt="Formulaire d'inscription" class="figure-img img-fluid rounded" />Inscription</h1>
            </li>
        </ul>
    </div>
<?php $navbar = ob_get_clean(); ?>
<?php ob_start(); ?>
<div>
    <form action="index.php?action=addUser" method="post">
        <label>Mes informations</label>
        <div class="form-group">
            <input type="text" name="login" class="form-control" placeholder="Identifiant" />
        </div>
        <div class="form-inline mb-2">
            <div class="form-group mr-2">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" />
            </div>
            <div class="form-group">
                <input type="password" name="verifyPassword" class="form-control" placeholder="Confirmer le mot de passe" />
            </div>
        </div>
        <input type="submit" value="Confirmer" class="btn btn-success" />
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>