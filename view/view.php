<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
<div>    
    <h1>Mon Blog</h1>
    <form action="index.php?action=createPost" method="POST">
        <p><label>Pseudo : <input type="text" name="name" /></label></p>
        <p><label>Message : <input type="text" name="message" /></label></p>
        <p><input type="submit" /></p>
    </form> 
    <a href="index.php?action=logView">Login</a>
</div>
<div>
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