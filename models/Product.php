<?php

require_once('BaseModel.php');
class Product extends BaseModel {

    private $apiUrl = "https://jloriag.com/laravel-api/public/api/products";

    // Obtener lista de productos desde la API
    public function getAllProducts() {
        $response = file_get_contents($this->apiUrl);
        return json_decode($response, true)['data'];
    }

    // Obtener un producto por ID desde la API
    public function getProductById($id) {
        $response = file_get_contents($this->apiUrl . "/" . $id);
        return json_decode($response, true)['data'];
    }

    public function saveProduct($name,$description,$price,$amount,$sku,$brand,$images) {
        
        return $this->postRequest(array(
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'amount' => $amount,
                'sku'=>$sku,
                'state_id' => '1',
                'brand' => $brand,
                'images[]' => $images));
    }

    #[\Override]
    public function path() {
        return "/public/api/products";
    }
}