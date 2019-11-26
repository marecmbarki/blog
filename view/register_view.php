<?php $title = 'INSCRIPTION'; ?>
<?php ob_start(); ?>
<h1>Inscription</h1>
<form action="index.php?action=addUser" method ='post'>
    <label> identifiant : <input type="text" name="login" /></label>
    <label> Mot de passe : <input type="text" name="password" /></label>
    <input type="submit" />
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>