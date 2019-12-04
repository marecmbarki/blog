<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
<div>
    <img src="public/images/update.png" alt="modifier un post" class="figure-img img-fluid rounded" />
    <h1>MODIFIER</h1>
    <form action="index.php?action=displayPost&amp;id=<?= $_GET['id'] ?>" method="post">
        <div class="form-group">    
            <input type="text" name="nameUpdated" value="<?= $post['name'] ?>" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Message : <textarea name="messageUpdated" id="messageUpdated" class="form-control"><?= $post['message'] ?></textarea></label>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Apporter les modifications" />
        </div>
    </form>
    <button class="btn btn-dark">
        <a href="index.php?action=displayPost&amp;id=<?= $_GET['id'] ?>">ANNULER</a>
    </button>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>