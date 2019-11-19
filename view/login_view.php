<?php $title = 'LOG IN'; ?>
<?php ob_start(); ?>

<form action="index.php?action=login" method="post">
        <div>
            <label>Nom d'utilisteur : </label><br />
            <input type="text" name="user_id" />
        </div>
        <div>
            <label>Mot de passe</label><br />
            <textarea name="password"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>