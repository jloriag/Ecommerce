<?php
require_once __DIR__ . '/../controllers/ProductController.php';

$controller = new ProductController();

if (isset($_GET['action']) && $_GET['action'] === 'show' && isset($_GET['id'])) {
    $controller->show($_GET['id']);
} else {
    $controller->index();
}
?>
