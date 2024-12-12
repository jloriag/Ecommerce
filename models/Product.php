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

    public function saveProduct() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://jloriag.com/laravel-api/public/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'amount' => $_POST['amount'],
                'state_id' => '1',
                'brand' => $_POST['brand'],
                'images[]' => $_POST['images[]']),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

?>
