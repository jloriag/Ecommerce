<?php

require_once('BaseModel.php');

class Sale extends BaseModel {


    public function create($paid_method,$state) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://jloriag.com/laravel-api/public/api/sells',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('paid_method' => $paid_method, 'state' => $state),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    #[\Override]
    public function path() {
        
    }
}