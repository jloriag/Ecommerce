<?php

abstract class BaseModel {

    public const APP_URL = "https://jloriag.com/laravel-api";

    private $curl;

    public function getEcommerceData() {
        $response = file_get_contents("https://jloriag.com/laravel-api/public/api/ecommercedata/1");
        return json_decode($response, true)['data'];
    }

    abstract function path();

    protected function postRequest($postfields) {
        $this->curl = curl_init();
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => self::APP_URL . $this->path(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postfields));
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        return json_decode($response, true);
    }
}
