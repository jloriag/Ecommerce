<?php
require 'baseProductsVariables.php';

$css_url = $protocol . "://" . $host . $directory . "/../boostrap/css/bootstrap.min.css";

$icon = $ecommerceData['webpage_icon'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ingresar al sistema</title>
        <link rel="stylesheet" href="<?= $css_url ?>">
        <link rel="icon" href="<?= $icon ?>" type="image/png">
    </head>
    <body>
        <?php 
        include 'navbar.php'; 
        include 'header.php';
        ?>
        <div class="container">
            <h1 class="my-4">Ingreso al sistema</h1>
            <div class="card p-4 shadow">
                <form action="index.php?action=login">
                    <!-- Campo de correo electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingrese su correo" required>
                    </div>

                    <!-- Campo de contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña" required>
                    </div>

                    <!-- Recordarme -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Recordarme</label>
                    </div>

                    <!-- Botón de login -->
                    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                </form>
            </div>
        </div>
        <script src="<?= $js_url ?>"></script>

<?php include "footer.php" ?>
    </body>
</html>
