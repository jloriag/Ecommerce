<?php

require_once('BaseModel.php');
class Product extends BaseModel {
    
    public function __construct() {
        parent::__construct();
    }

        // Obtener lista de productos desde la API
    public function getAllProducts() {
        return $this->getRequest()['data'];
    }

    // Obtener un producto por ID desde la API
    public function getProductById($id) {
        return $this->getRequest($id)['data'];
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
    public function path($param="") {
        if(empty($param)){
           return "/public/api/products"; 
        }else{
            return "/public/api/products"."/".$param; 
        }
    }
}