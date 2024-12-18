<?php
require 'baseProductsVariables.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Contacto</title>
        <link rel="stylesheet" href="<?= $css_url ?>">
    </head>
    <body>
        <?php 
        include 'navbar.php'; 
        include 'header.php';
        ?>
        <div class="container my-5">
            <div class="card mx-auto" style="max-width: 600px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="row g-0">
                    <!-- Imagen de la persona -->
                    <div class="col-md-4">
                        <img src="http://127.0.0.1/Ecommerce/imagenes/Josue.jpg" alt="Foto de Persona" class="img-fluid rounded-start" style="height: 100%; object-fit: cover;">
                    </div>
                    <!-- Información de contacto -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Josué Loría</h5>
                            <p class="card-text">
                                <strong>Teléfono:</strong> <a href="tel:+85872117" class="text-decoration-none">85972117</a><br>
                                <strong>Ubicación:</strong> Coronado<br>
                            </p>
                            <p class="card-text">
                                <button class="btn btn-outline-success btn-sm" onclick="location.href = 'https://wa.me/50685972117?text=Hola%20Josué,%20me%20gustaría%20contactarte';">
                                    <i class="bi bi-whatsapp"></i> WhatsApp
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= $js_url ?>"></script>

        <?php include "footer.php" ?>
    </body>
</html>
