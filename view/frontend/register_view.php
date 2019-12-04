<?php $title = 'INSCRIPTION'; ?>
<?php ob_start(); ?>
<img src="public/images/register.png" alt="Formulaire d'inscription" class="figure-img img-fluid rounded" />
<h1>INSCRIPTION</h1>
<form action="index.php?action=addUser" method ='post'>
    <div class="form-group">
        <input type="text" name="login" class="form-control" placeholder="Identifiant" />
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Mot de passe" />
    </div>
    <div class="form-group">    
        <input type="password" name="verifyPassword" class="form-control" placeholder="Confirmer le mot de passe" />
    </div>
    <input type="submit" value="S'inscrire" class="btn btn-success" />
</form>
<a href="index.php">RETOUR</a>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>