<?php

require('model/model.php');
require('model/comment_manager.php');
require('model/blog_manager.php');
require('model/admin_manager.php');
require('controller/backend/admin_control.php');
require('controller/frontend/user_control.php');
$adminControl = new AdminControl();
$userControl = new UserControl();

























function displayError() {
    require('view/error_view.php');
}