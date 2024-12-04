<?php
class BaseModel{
    
    public const APP_URL="http://localhost/laravel11-app";
    
    public function getEcommerceData(){
        $response = file_get_contents("http://localhost/laravel11-app/public/api/ecommercedata/1");
        return json_decode($response, true)['data'];
    }
}