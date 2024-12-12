<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    // Método para mostrar la lista de productos
    public function index()
    {
        $products = $this->productModel->getAllProducts();
        $ecommerceData=$this->productModel->getEcommerceData();
        $productModel=$this->productModel;
        include __DIR__ . '/../views/product-list.php';
    }

    // Método para mostrar el detalle de un producto
    public function show($id)
    {
        $ecommerceData=$this->productModel->getEcommerceData();
        $product = $this->productModel->getProductById($id);
        $productModel=$this->productModel;
        include __DIR__ . '/../views/product-detail.php';
    }
    
    public function create(){
        $ecommerceData=$this->productModel->getEcommerceData();
        include __DIR__ . '/../views/product-create.php';
    }
}
?>
