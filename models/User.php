<?php

require_once('BaseModel.php');

class User extends BaseModel {

    public function login($user, $password) {

    }

    #[\Override]
    public function path($param="") {
        return "/public/api/sells";
    }
}
