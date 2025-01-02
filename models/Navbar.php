<?php
require_once('BaseModel.php');
class Navbar extends BaseModel
{
    private $apiUrl = "https://jloriag.com/laravel-api/public/api/products";

    // Obtener lista de productos desde la API
    public function getAllProducts()
    {
        $response = file_get_contents($this->apiUrl);
        return json_decode($response, true)['data'];
    }

    // Obtener un producto por ID desde la API
    public function getProductById($id)
    {
        $response = file_get_contents($this->apiUrl . "/" . $id);
        return json_decode($response, true)['data'];
    }

    #[\Override]
    public function path($param = "") {
        
    }
}
?>
