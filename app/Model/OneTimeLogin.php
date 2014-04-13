<?php

App::import('model', 'User');

class OneTimeLogin extends AppModel {

    public $useTable = false;

    function __construct() {
        parent::__construct();
        $this->User = new User();
    }

    public function isAdmin($username) {
        return $this->User->isAdmin($username);
    }

    public function changePassword($username, $password) {
        return $this->User->changePasswordForUser($username, $password);
    }
}

?>