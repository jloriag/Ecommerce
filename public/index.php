<?php

require_once __DIR__ . '/../vendor/autoload.php';
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'showProduct' && isset($_GET['id'])) {
        require_once __DIR__ . '/../controllers/ProductController.php';
        $controller = new ProductController();
        $controller->show($_GET['id']);
    } else if ($_GET['action'] == 'createProduct') {
        require_once __DIR__ . '/../controllers/ProductController.php';
        $controller = new ProductController();
        $controller->create();
    } else if ($_GET['action'] === 'sale') {
        require_once __DIR__ . '/../controllers/SaleController.php';
        $controller = new SaleController();
        echo $controller->save();
    } else if ($_GET['action'] === 'contacto') {
        require_once __DIR__ . '/../controllers/ContactController.php';
        $controller = new ContactController();
        $controller->index();
    }
} else {
    require_once __DIR__ . '/../controllers/ProductController.php';
    $controller = new ProductController();
    $controller->index();
    echo "Hola";
}