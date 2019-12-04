
<?php $title = 'ESPACE ADMIN'; ?>
    <?php ob_start(); ?>
        <div class="container">
            <div class="row justify-content-between">
                <div id="logout" class="col-2">
                    <button class="btn btn-danger">
                        <a href="index.php">Déconnexion</a>
                    </button>
                </div>
                <div class="col-9">
                    <h1>BIENVENUE dans l'espace admin <?= $_SESSION['login'] ?> !</h1>
                </div>
            </div>
        </div>
        <h2>Nouveau Billet</h2>
        <form action="index.php?action=createPost" method="POST">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" name="name" class="form-control" placeholder="Pseudo" />  
            </div>
            <div class="form-group mx-sm-3 mb-2">    
                <label>Message <textarea name="message" id="message" class="form-control" ></textarea></label>
            </div>
            <input type="submit" value="POSTER" class="btn btn-success" />
        </form>
        <button class="btn btn-warning btn-sm">
            <a href="#reported_comments">Accéder à la liste des commentaires signalés</a>
        </button>
        <div id="posts" class="col-md-10 col-md-offset-2">
            <h3>Liste de vos Billets</h3>
    <?php while($post = $posts->fetch()) { ?>
            <div class="listPosts">
                <p>
                    <strong><?= $post['name'] ?></strong> : <?= nl2br($post['message']) ?>
                </p>
            </div>
            <button class="btn btn-primary">
                <a href="index.php?id=<?= $post['id'] ?>&amp;action=displayPost">voir</a>
            </button>
    <?php } 
    $posts->closeCursor();
    ?>
        </div>
        <div id="reported_comments">
            <h3>Liste des commentaires signalés : </h3>
            <?php while($reportedComment = $reportedComments->fetch()) { ?>
                <p>
                <strong><?= $reportedComment['author'] ?></strong> : <?= nl2br($reportedComment['comment']) ?>
            </p>
            <button class="btn btn-warning">
                <a href="index.php?id=<?= $reportedComment['postId'] ?>&amp;action=displayPost">Voir le post</a>
            </button>
            <?php } ?>

        </div>
        <?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>