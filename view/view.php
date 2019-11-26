<?php $title = 'BLOG'; ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
} ?>
<div>    
    <h1>Mon Blog</h1> 
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