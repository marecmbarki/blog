<?php $password = sha1($_POST['password']); ?>
<?php if($password != $admin['password']) { ?>
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
        header('Location: index.php?action=admin');
    ?>
    <?php $session = ob_get_clean(); 
}
    require('view/template.php');
    ?>
