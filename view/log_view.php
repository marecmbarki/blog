
<?php $title = 'LOG'; ?>
<?php ob_start(); ?>
<h1>Connexion</h1>
<form action="index.php?action=adminChecking" method ='post'>
    <label> Login : <input type="text" name="login" /></label>
    <label> Password : <input type="password" name="password" /></label>
    <input type="submit" />
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>