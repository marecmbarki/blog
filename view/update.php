<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
<div>
    <h1>Modifier</h1>
<form action="index.php?action=displayPost&amp;id=<?= $_GET['id'] ?>" method="post">
    <label>Pseudo : <input type="text" name="nameUpdated" value="<?= $post['name'] ?>"/></label>
    <label>Message : <textarea name="messageUpdated"><?= $post['message'] ?></textarea></label>
    <input type="submit" />
</form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>