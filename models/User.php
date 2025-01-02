<?php

require_once('BaseModel.php');

class User extends BaseModel {

    public function __construct() {
        parent::__construct();
    }

    public function login($user, $password) {
        
    }

    #[\Override]
    public function path($param = "") {
        return "/public/api/sells";
    }
}
