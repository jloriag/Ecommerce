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
        <?php include 'navbar.php'; ?>
        <!-- Encabezado de la tienda -->
        <header class="bg-primary text-white text-center py-5">
            <h1>Bienvenido a Mi Tienda</h1>
            <p>Los mejores productos al mejor precio</p>
        </header>

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
                                    <a href="index.php?action=show&id=<?= $product['id'] ?>" class="btn btn-primary">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay productos</p>
                <?php endif; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Pie de página -->
        <footer class="bg-dark text-white text-center py-4">
            <p>&copy; 2024 Mi Tienda. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
