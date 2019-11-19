
<?php $title = 'LOGIN'; ?>

<?php ob_start(); ?>
<form action="index.php?action=admin" method="post">
        <div>
            <label>Mot de passe</label><br />
            <input type="text" name="password" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>