<?php
class BaseModel{
    
    public const APP_URL="https://jloriag.com/laravel-api";
    
    public function getEcommerceData(){
        $response = file_get_contents("https://jloriag.com/laravel-api/public/api/ecommercedata/1");
        return json_decode($response, true)['data'];
    }
}