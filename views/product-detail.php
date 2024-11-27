<?php
// Obtener el protocolo (http o https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? "https" : "http";

// Obtener el host (ejemplo.com)
$host = $_SERVER['HTTP_HOST'];

// Obtener el directorio de la URL donde se encuentra el archivo actual
$directory = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

$css_url = $protocol . "://" . $host . $directory . "/../boostrap/css/bootstrap.min.css";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Detalle del producto: <?= htmlspecialchars($product['name']) ?></title>
        <link rel="stylesheet" href="<?= $css_url ?>">
        <link rel="icon" href="<?= $productModel::APP_URL . $ecommerceData['webpage_icon'] ?>" type="image/png">
    </head>
    <body>
        <?php include 'navbar.php'; ?>
        <!-- Encabezado de la tienda -->
        <header class="bg-primary text-white text-center py-5">
            <h1>Bienvenido a Mi Tienda</h1>
            <p>Los mejores productos al mejor precio</p>
        </header>

        <div class="container">
            <h1 class="my-4"><?= htmlspecialchars($product['name']) ?></h1>
            <div class="row">
                <div class="col-md-6 bg-primary text-white p-3"> 
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <?php if (count($product['images']) > 1): ?>
                        <!-- Indicadores -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <?php endif; ?>
                        <!-- Contenedor de Imágenes -->
                        <div class="carousel-inner">
                            <?php foreach ($product['images'] as $productimage): ?>  
                                <div class="carousel-item active">
                                    <img src="<?= $productModel::APP_URL . $productimage['path'] ?>" class="d-block w-100" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <?php if (count($product['images']) > 1): ?>
                            <!-- Controles de Navegación -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6 bg-secondary text-white p-3">
                    <p><strong>Descripción:</strong> <?= htmlspecialchars($product['description']) ?></p>
                    <p><strong>Precio:</strong> $<?= htmlspecialchars($product['price']) ?></p>
                    <a href="index.php" class="btn btn-secondary">Regresar al listado de productos</a>
                </div>
            </div></div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Pie de página -->
        <footer class="bg-dark text-white text-center py-4">
            <p>&copy; 2024 Mi Tienda. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
