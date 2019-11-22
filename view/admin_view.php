
<?php if($_POST['login'] != $admin['login'] && $_POST['password'] != $admin['password']) { ?>
    <?php $title = 'ERREUR'; ?>
    <?php ob_start(); ?>
        <h1>Erreur, login ou password incorrect.</h1>
        <a href="index.php">Retour à la liste des billets</a>
    <?php $content = ob_get_clean(); ?>
<?php } else { ?>
    <?php ob_start(); ?>
    <?php 
        session_start();
        $_SESSION['login'] = $admin['login'];
    ?>
    <?php $session = ob_get_clean(); ?>
    <?php $title = 'ESPACE ADMIN'; ?>
    <?php ob_start(); ?>
        <h1>BIENVENUE dans l'espace admin <?= $_SESSION['login'] ?> ! </h1>
    <?php $content = ob_get_clean(); ?>
<?php } ?>

<?php require('template.php'); ?>