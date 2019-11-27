<?php $title = 'ERREUR' ?>
<?php ob_start(); ?>
<h1>ERREUR</h1>
<?php if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] == 'createPost') { ?>
        <h2>Veuillez saisir un NOM et un MESSAGE.</h2>
        <a href="index.php?action=admin">RETOUR</a>
        <?php unset($_SESSION['error']) ?>
    <?php } elseif ($_SESSION['error'] == 'addComment') { ?>
        <h2>Veuillez saisir un NOM et un MESSAGE.</h2>
        <a href="index.php?action=displayPost&amp;id=<?= $_GET['id'] ?>">RETOUR</a>
        <?php unset($_SESSION['error']) ?>
    <?php } elseif ($_SESSION['error'] == 'addUserVerify') { ?>
        <h2>Les mots de passe ne correspondent pas.</h2>
        <a href="index.php?action=registerView">RETOUR</a>
        <?php unset($_SESSION['error']) ?>
    <?php } elseif ($_SESSION['error'] == 'addUser') { ?>
        <h2>Veuillez remplir un identifiant, un mot de passe ainsi que la confirmation du mot de passe.</h2>
        <a href="index.php?action=registerView">RETOUR</a>
        <?php unset($_SESSION['error']) ?>
    <?php } elseif ($_SESSION['error'] == 'adminChecking') { ?>
        <h2>Veuillez saisir votre identifiant ainsi que votre mot de passe.</h2>
        <a href="index.php?action=logView">RETOUR</a>
        <?php unset($_SESSION['error']) ?>
    <?php }
}?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>