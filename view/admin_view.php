
<?php $title = 'ESPACE ADMIN'; ?>
    <?php ob_start(); ?>
        <h1>BIENVENUE dans l'espace admin <?= $_SESSION['login'] ?> ! </h1>
        <h2>Nouveau Billet</h2>
        <form action="index.php?action=createPost" method="POST">
            <p><label>Pseudo : <input type="text" name="name" /></label></p>
            <p><label>Message : <input type="text" name="message" /></label></p>
            <p><input type="submit" /></p>
        </form>
        <div>
            <h3>Liste de vos Billets</h3>
    <?php while($post = $posts->fetch()) { ?>
            <p>
                <strong><?= htmlspecialchars($post['name']) ?></strong> : <?= nl2br(htmlspecialchars($post['message'])) ?>
            </p>
            <a href="index.php?id=<?= $post['id'] ?>&amp;action=displayPost">voir</a>
    <?php } 
    $posts->closeCursor();
    ?>
        </div>
    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>