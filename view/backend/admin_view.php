
<?php $title = 'ESPACE ADMIN'; ?>
    <?php ob_start(); ?>
        <a href="index.php">Quitter espace admin</a>
        <h1>BIENVENUE dans l'espace admin <?= $_SESSION['login'] ?> ! </h1>
        <h2>Nouveau Billet</h2>
        <form action="index.php?action=createPost" method="POST">
            <p><label>Pseudo : <input type="text" name="name" /></label></p>
            <p><label>Message : <textarea name="message" id="message"></textarea></label></p>
            <p><input type="submit" /></p>
        </form>
        <div>
            <h3>Liste de vos Billets</h3>
    <?php while($post = $posts->fetch()) { ?>
            <p>
                <strong><?= $post['name'] ?></strong> : <?= nl2br($post['message']) ?>
            </p>
            <a href="index.php?id=<?= $post['id'] ?>&amp;action=displayPost">voir</a>
    <?php } 
    $posts->closeCursor();
    ?>
        </div>
        <div>
            <p>Liste des commentaires signalés : </p>
            <?php while($reportedComment = $reportedComments->fetch()) { ?>
                <p>
                <strong><?= $reportedComment['author'] ?></strong> : <?= nl2br($reportedComment['comment']) ?>
            </p>
            <a href="index.php?id=<?= $reportedComment['postId'] ?>&amp;action=displayPost">Voir le post</a>
            <?php } ?>

        </div>
        <?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>