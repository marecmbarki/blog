<?php

require('model/model.php');
require('model/comments/comment_manager.php');
require('model/blog/blog_manager.php');
require('model/admin/admin_manager.php');
require('controller/backend/admin_control.php');
require('controller/frontend/user_control.php');
$adminControl = new AdminControl();
$userControl = new UserControl();

























function displayError() {
    require('view/error_view.php');
}