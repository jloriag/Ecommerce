<?php
require 'baseProductsVariables.php';

$productName = htmlspecialchars($product['name']);

$icon = $productModel::APP_URL . $ecommerceData['webpage_icon'];

$countImages = count($product['images']);

$isMultipleImages = $countImages > 1;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Detalle del producto: <?= $productName ?></title>
        <link rel="stylesheet" href="<?= $css_url ?>">
        <style>
            .step {
                display: none;
            }
            .step.active {
                display: block;
            }
        </style>
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
            <h1 class="my-4"><?= $productName ?></h1>
            <div class="row">
                <div class="col-md-6 bg-primary text-white p-3"> 
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <?php if ($isMultipleImages): ?>
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

                        <?php if ($isMultipleImages): ?>
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

                <div class="col-md-6  p-3">
                    <p><strong>Descripción:</strong> <?= htmlspecialchars($product['description']) ?></p>
                    <p> ₡<?= htmlspecialchars($product['price']) ?></p>

                    <h2 class="text-center mb-4">Compra este producto facilmente</h2>
                    <div class="progress mb-4">
                        <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">Paso 1 de 3</div>
                    </div>
                    <form action="index.php?action=sale" id="stepForm">
                        <input type="hidden" id="product_id" value="<?= $product['id'] ?>"/>
                        <!-- Step 1 -->
                        <div class="step active">
                            <h3>Paso 1</h3>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="name" placeholder="Ingresa tu nombre completo">
                            </div>
                            <button type="button" class="btn btn-primary next-step" id="showToast">Siguiente</button>
                        </div>

                        <!-- Step 2 -->
                        <div class="step">
                            <h3>Paso 2</h3>
                            <div class="mb-3">
                                <label for="email" class="form-label">Número telefónico</label>
                                <input type="tel" class="form-control" id="tel" placeholder="Ingresa tu numero telefónico">
                            </div>
                            <button type="button" class="btn btn-secondary prev-step">Anterior</button>
                            <button type="button" class="btn btn-primary next-step">Siguiente</button>
                        </div>

                        <!-- Step 3 -->
                        <div class="step">
                            <h3>Paso 3</h3>
                            <div class="mb-3">
                                <label for="address" class="form-label">Dirección Exacta</label>
                                <input type="text" class="form-control" id="address" placeholder="Dirección Exacta">
                            </div>
                            <button type="button" class="btn btn-secondary prev-step">Anterior</button>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- Toast -->
        <div class="toast position-fixed bottom-0 end-0 p-3" id="warningToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <span class="badge bg-warning me-2">Advertencia</span>
                <strong class="me-auto">Sistema</strong>
                <small>Hace un momento</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
            </div>
            <div class="toast-body" id="toast-body">
                Esta es una advertencia importante. Por favor, revisa los datos ingresados.
            </div>
        </div>

        <script>
            // JavaScript to handle step navigation
            const steps = document.querySelectorAll('.step');
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            const progressBar = document.getElementById('progress-bar');
            // Crear un nuevo Map
            const tabs = new Map();
            tabs.set(0, "name");
            tabs.set(1, "tel");
            tabs.set(2, "address");
            let currentStep = 0;

            nextButtons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    currentStepValue = tabs.get(currentStep);
                    actualValue = document.getElementById(currentStepValue).value;
                    if (!validateInput(currentStepValue, actualValue)) {
                        warningToastWarning(tabs.get(currentStep));
                        showWarning();
                        return;
                    }
                    if (currentStep < steps.length - 1) {
                        steps[currentStep].classList.remove('active');
                        currentStep++;
                        steps[currentStep].classList.add('active');
                        updateProgressBar();
                    }
                });
            });

            prevButtons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    if (currentStep > 0) {
                        steps[currentStep].classList.remove('active');
                        currentStep--;
                        steps[currentStep].classList.add('active');
                        updateProgressBar();
                    }
                });
            });

            function updateProgressBar() {
                const progress = ((currentStep + 1) / steps.length) * 100;
                progressBar.style.width = `${progress}%`;
                progressBar.textContent = `Paso ${currentStep + 1} de ${steps.length}`;
            }

            function validateInput(type, data) {
                switch (type) {
                    case "name":
                        return data.length > 10;
                    case "tel":
                        return data.length > 7;
                    case "address":
                        return data.length > 10;
                }
            }

            function warningToastWarning(type) {
                switch (type) {
                    case "name":
                        document.getElementById("toast-body").innerHTML = "¿Haz ingresado tu nombre completo? El contenido debe ser mayor a 10 caracteres";
                        break;
                    case "tel":
                        document.getElementById("toast-body").innerHTML = "¿Haz ingresado un telefono valido? El contenido debe ser mayor a 8 caracteres";
                        break;
                    case "address":
                        document.getElementById("toast-body").innerHTML = "¿Haz ingresado una dirección valida? El contenido debe ser mayor a 10 caracteres";
                        break;
                }
            }

            function showWarning() {
                const toastEl = document.getElementById('warningToast');
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }

            document.getElementById('stepForm').addEventListener('submit', async (e) => {
                e.preventDefault(); // Evita el envío predeterminado del formulario

                const currentStepValue = tabs.get(currentStep); // Obtiene el valor del paso actual
                const actualValue = document.getElementById(currentStepValue).value;

                // Validar entrada antes de enviar el formulario
                if (!validateInput(currentStepValue, actualValue)) {
                    warningToastWarning(tabs.get(currentStep));
                    showWarning();
                    return;
                }

                // Recopila los datos del formulario
                const formData = new FormData(e.target);

                try {
                    // Enviar datos con Fetch API
                    const response = await fetch(e.target.action, {
                        method: 'POST',
                        body: formData,
                    });

                    if (!response.ok) {
                        throw new Error(`Error en el servidor: ${response.status}`);
                    }

                   // const result = await response.json(); // Cambia según el tipo de respuesta
                    console.log('Respuesta del servidor:', response);

                    // Mostrar un mensaje de éxito
                    alert('Formulario enviado exitosamente');
                } catch (error) {
                    console.error('Error al enviar el formulario:', error);
                    alert('Hubo un error al enviar el formulario. Por favor, inténtalo de nuevo.');
                }
            });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Pie de página -->
        <footer class="bg-dark text-white text-center py-4">
            <p>&copy; 2024 Mi Tienda. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
