<?php $title = 'INSCRIPTION'; ?>
<?php ob_start(); ?>
<h1>Inscription</h1>
<form action="index.php?action=addUser" method ='post'>
    <label> identifiant : <input type="text" name="login" /></label>
    <label> Mot de passe : <input type="password" name="password" /></label>
    <label> Confirmer le mot de Passe : <input type="password" name="verifyPassword" />
    <input type="submit" />
</form>
<a href="index.php">RETOUR</a>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>