
<?php $title = 'LOG'; ?>
<?php ob_start(); ?>
<img src="public/images/login.png" alt="Connexion" class="figure-img img-fluid rounded" />
<h1>CONNEXION</h1>
<form action="index.php?action=adminChecking" method ='post'>
    <div class="form-group">
        <input type="text" name="login" placeholder="Login" class="form-control"/>
    </div>
    <div class="form-group">    
        <input type="password" placeholder="Password" name="password" class="form-control"/>
    </div>
    <input type="submit" class="btn btn-success" />
</form>
<a href="index.php">RETOUR</a>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php') ?>