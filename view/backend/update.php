<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>  
    <button class="btn btn-success" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <a href="index.php?action=displayPost&amp;id=<?= $_GET['id'] ?>">ANNULER</a>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ml-3">
                <h1><img src="public/images/update.png" alt="modifier un post" class="figure-img img-fluid rounded" />Modifier</h1>
            </li>
        </ul>
    </div>
<?php $navbar = ob_get_clean(); ?>
<?php ob_start(); ?>
<div>
    <form action="index.php?action=displayPost&amp;id=<?= $_GET['id'] ?>" method="post">
        <div class="form-group mt-3">
              <input type="text" name="nameUpdated" value="<?= $post['name'] ?>" class="form-control"/>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Message : <textarea name="messageUpdated" id="messageUpdated" class="form-control"><?= $post['message'] ?></textarea></label>
                </div>
            </div>
        </div>
            <input type="submit" class="btn btn-success" value="Apporter les modifications" />
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>