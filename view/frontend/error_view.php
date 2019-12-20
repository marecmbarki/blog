<?php $title = 'ERREUR' ?>
<?php ob_start(); ?>
<div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h1 class="text-center">ERREUR</h1>
            </li>
        </ul>
    </div>
<?php $navbar = ob_get_clean(); ?>
<?php ob_start(); ?>
<?php if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] == 'createPost') { ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close"><a href="index.php?action=admin">RETOUR</a></button>
            <h2 class="text-center">Veuillez saisir un NOM et un MESSAGE.</h2>
        </div>
        <?php unset($_SESSION['error']) ?>
    <?php } elseif ($_SESSION['error'] == 'addComment') { ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" ><a href="index.php?action=displayPost&amp;id=<?= $_GET['id'] ?>">RETOUR</a></button>
            <h2 class="text-center">Veuillez saisir un NOM et un MESSAGE.</h2>
        </div>
        <?php unset($_SESSION['error']) ?>
    <?php } elseif ($_SESSION['error'] == 'addUserVerify') { ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" ><a href="index.php?action=registerView">RETOUR</a></button>
            <h2 class="text-center">Les mots de passe ne correspondent pas.</h2>
        </div>
        <?php unset($_SESSION['error']) ?>
    <?php } elseif ($_SESSION['error'] == 'addUser') { ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close"><a href="index.php?action=registerView">RETOUR</a></button>
            <h2 class="text-center">Veuillez remplir un identifiant, un mot de passe ainsi que la confirmation du mot de passe.</h2>
        </div>
        <?php unset($_SESSION['error']) ?>
    <?php } elseif ($_SESSION['error'] == 'adminChecking') { ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close"><a href="index.php?action=logView">RETOUR</a></button>
            <h2 class="text-center">Veuillez saisir votre identifiant ainsi que votre mot de passe.</h2>
        </div>
        <?php unset($_SESSION['error']) ?>
    <?php }
}?>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>