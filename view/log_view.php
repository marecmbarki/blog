
<?php $title = 'LOG'; ?>
<?php ob_start(); ?>
<form action="index.php?action=admin" method ='post'>
    <label> Login : <input type="text" name="login" /></label>
    <label> Password : <input type="text" name="password" /></label>
    <input type="submit" />
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>