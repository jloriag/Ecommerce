<?php
class ContactController
{

    public function __construct()
    {
    }

    // Método para el form principal
    public function index()
    {
        /*$products = $this->productModel->getAllProducts();
        $ecommerceData=$this->productModel->getEcommerceData();
        $productModel=$this->productModel;*/
        include __DIR__ . '/../views/contacto.php';
    }
}
?>
