<?php $password = sha1($_POST['password']); ?>
<?php if($password != $admin['password']) { ?>
    <?php $title = 'ERREUR'; ?>
    <?php $navbar = 'ERREUR'; ?>
    <?php ob_start(); ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close"><a href="index.php?action=logView">RETOUR</a></button>
        <h1 class="text-center">Erreur, login ou password incorrect.</h1>
    </div>
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
