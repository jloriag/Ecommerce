<?php

require_once('BaseModel.php');

class Sale extends BaseModel {

    public function create($paid_method, $state) {
        return $this->postRequest(array(
                    'paid_method' => $paid_method,
                    'state' => $state));
    }

    #[\Override]
    public function path($param="") {
        return "/public/api/sells";
    }
}
