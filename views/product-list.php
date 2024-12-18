<?php
require 'baseProductsVariables.php';

$css_url = $protocol . "://" . $host . $directory . "/../boostrap/css/bootstrap.min.css";

$icon = $productModel::APP_URL . $ecommerceData['webpage_icon'];

$isProducts = count($products) > 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Listado de Productos</title>
        <link rel="stylesheet" href="<?= $css_url ?>">
        <link rel="icon" href="<?= $icon ?>" type="image/png">
    </head>
    <body>
        <?php 
        include 'navbar.php'; 
        include 'header.php';
        ?>
        <div class="container">
            <h1 class="my-4">Listado de Productos</h1>
            <div class="row">
                <?php if ($isProducts): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <img src="<?= $productModel::APP_URL . $product['images'][0]['path'] ?>" class="img-thumbnail" alt="Imagen en miniatura">
                                    <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                                    <p class="card-text"> ₡ <?= htmlspecialchars($product['price']) ?></p>
                                    <a href="index.php?action=showProduct&id=<?= $product['id'] ?>" class="btn btn-primary">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay productos</p>
                <?php endif; ?>
            </div>
        </div>
        <script src="<?= $js_url ?>"></script>

        <?php include "footer.php" ?>
    </body>
</html>
