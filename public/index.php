<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Captura la URL después del dominio
$request = trim($_SERVER['REQUEST_URI'], '/');

// Divide la URL en segmentos
$segments = explode('/', $request);

// Ejemplo: manejar la URL basada en segmentos
if ($segments[1] === 'producto' && isset($segments[2])) {
    $productId = intval($segments[2]);
    // Lógica para mostrar el producto
    echo "Producto ID: " . $productId;
} elseif ($segments[0] === 'category' && isset($segments[1])) {
    $category = $segments[1];
    // Lógica para mostrar la categoría
    echo "Categoría: " . htmlspecialchars($category);
} else if (isset($_GET['action'])) {
    if ($_GET['action'] === 'showProduct' && isset($_GET['id'])) {
        require_once __DIR__ . '/../controllers/ProductController.php';
        $controller = new ProductController();
        $controller->show($_GET['id']);
    } else if ($_GET['action'] == 'createProduct') {
        require_once __DIR__ . '/../controllers/ProductController.php';
        $controller = new ProductController();
        $controller->create();
    } else if ($_GET['action'] == 'saveProduct') {
        require_once __DIR__ . '/../controllers/ProductController.php';
        $controller = new ProductController();
        $controller->save();
    } else if ($_GET['action'] === 'sale') {
        require_once __DIR__ . '/../controllers/SaleController.php';
        $controller = new SaleController();
        echo $controller->save();
    } else if ($_GET['action'] === 'contacto') {
        require_once __DIR__ . '/../controllers/ContactController.php';
        $controller = new ContactController();
        $controller->index();
    }else if ($_GET['action'] === 'login'){
        require_once __DIR__ . '/../controllers/UserController.php';
        $controller = new UserController();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }else{
            $controller->login();
        }
    }
} else {
    require_once __DIR__ . '/../controllers/ProductController.php';
    $controller = new ProductController();
    $controller->index();
    echo "Hola";
}