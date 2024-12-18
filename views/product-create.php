<?php
require 'baseProductsVariables.php';

$css_url = $protocol . "://" . $host . $directory . "/../boostrap/css/bootstrap.min.css";

$icon = $productModel::APP_URL . $ecommerceData['webpage_icon'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Crear un nuevo Producto</title>
        <link rel="stylesheet" href="<?= $css_url ?>">
        <link rel="icon" href="<?= $icon ?>" type="image/png">
    </head>
    <body>
        <?php 
        include 'navbar.php'; 
        include 'header.php';
        ?>
        <div class="container">
            <h1 class="my-4">Crear un nuevo Producto</h1>
            <div class="row">
                <form method="post" action="index.php?action=saveProduct" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del Producto:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Descripción del Producto:</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>


                    <div class="mb-3">
                        <label for="name" class="form-label">Precio del Producto:</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="brand" class="form-label">Marca:</label>
                        <input type="text" class="form-control" id="brand" name="brand" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Cantidad:</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>

                    <div class="mb-3">
                        <label for="sku" class="form-label">Sku:</label>
                        <input type="text" class="form-control" id="sku" name="sku" required>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Ruta de la Imagen:</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
        <script src="<?= $js_url ?>"></script>

        <?php include "footer.php" ?>
    </body>
</html>
