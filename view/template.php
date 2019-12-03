<?php $session ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/css/style.css"/>
        <script src="js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: '#message'
            });
            tinymce.init({
                selector: '#comment'
            });
            tinymce.init({
                selector: '#messageUpdated'
            });
        </script>
    </head>
    <body>
        <?= $content ?>
    </body>
</html>