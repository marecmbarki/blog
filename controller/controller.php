<?php

require('model/model.php');

class Controllers {
    public function loadControllers() {
        require('controller/frontend/user_control.php');
        require('controller/backend/admin_control.php');
    }
}