<?php ob_start();
session_start();
$_SESSION['access'] = true;


$session = ob_get_clean(); 
?>

<?php $title = 'ESPACE ADMIN'; ?>
<?php ob_start(); ?>
    <h1>BIENVENUE DANS L'ESPACE ADMIN !</h1>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>