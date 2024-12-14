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
        $productModel=$this->productModel;
        include __DIR__ . '/../views/product-create.php';
    }
    
    public function save(){
        $ecommerceData=$this->productModel->getEcommerceData();
        $productModel=$this->productModel;
        
        if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
        $base64Images = []; // Arreglo para guardar imágenes en Base64

        // Itera sobre cada archivo cargado
        for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
            if ($_FILES['images']['error'][$i] === UPLOAD_ERR_OK) {
                // Información del archivo
                $fileTmpPath = $_FILES['images']['tmp_name'][$i];
                $fileName = $_FILES['images']['name'][$i];
                $fileType = mime_content_type($fileTmpPath);

                // Lee el contenido del archivo y conviértelo a Base64
                $imageData = file_get_contents($fileTmpPath);
                $base64Image = base64_encode($imageData);

                // Formato final con MIME
                $base64ImageWithMime = "data:$fileType;base64,$base64Image";

                // Guarda el resultado en el arreglo
                $base64Images[] = [
                    'file_name' => $fileName,
                    'base64' => $base64ImageWithMime
                ];
            } else {
                //echo "Error al cargar el archivo: " . $_FILES['images']['name'][$i];
            }
        }

        // Muestra las imágenes convertidas
       // echo "<h3>Imágenes convertidas a Base64:</h3>";
        foreach ($base64Images as $image) {
          /*  echo "<h4>{$image['file_name']}</h4>";
            echo "<textarea rows='5' cols='100'>{$image['base64']}</textarea>";*
            echo "<br><img src='{$image['base64']}' alt='Imagen Base64' style='max-width:300px;'><br><br>";*/
            $imagebase64=$image['base64'];
        }
    } 
        echo $productModel->saveProduct($_POST['name'],
                $_POST['description'],
                $_POST['price'],
                $_POST['amount'],
                $_POST['sku'],
                $_POST['brand'],
                $imagebase64);
    }
}
