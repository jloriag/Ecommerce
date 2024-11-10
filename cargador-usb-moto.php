<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $articulo = $_POST['articulo'];
    $cantidad = $_POST['cantidad'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $metodo_pago = $_POST['metodo_pago'];

    echo "<h2>🎉 ¡Gracias por tu compra, $nombre!</h2>";
    echo "<p>Has comprado $cantidad unidad(es) de $articulo. El pedido será enviado a $direccion. 📦</p>";
    echo "<p>Te contactaremos al ☎️ $telefono para cualquier novedad.</p>";
    echo "<p>Método de pago seleccionado: 💳 $metodo_pago</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Artículo</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .step { display: none; }
        .step.active { display: block; }
        .step label { font-size: 1.2em; margin-top: 10px; display: block; }
        .step input, .step select, .step button { width: 100%; padding: 10px; font-size: 1em; margin: 5px 0; }
        .step button { cursor: pointer; background-color: #4CAF50; color: white; border: none; }
        .step button:disabled { background-color: #ddd; cursor: not-allowed; }
        #compraForm { display: flex; flex-direction: column; }
        .carousel { text-align: center; position: relative; margin-bottom: 20px; }
        .carousel img { max-width: 100%; max-height: 300px; display: block; margin: 0 auto; border-radius: 8px; }
        .carousel button { position: absolute; top: 50%; background-color: rgba(0, 0, 0, 0.5); color: white; border: none; padding: 10px; cursor: pointer; }
        .carousel button.left { left: 10px; }
        .carousel button.right { right: 10px; }
        @media (max-width: 600px) {
            label, button { font-size: 1em; }
            .step button { padding: 8px; }
        }
    </style>
</head>
<body>

<h1>🛒 Compra de Artículo</h1>

<!-- Carrusel de imágenes del artículo -->
<div class="carousel">
    <button class="left" onclick="prevImage()">⬅️</button>
    <img id="itemImage" src="imagenes/cargador-usb-moto-portada.png" alt="Imagen del artículo">
    <button class="right" onclick="nextImage()">➡️</button>
</div>

<form id="compraForm" method="post" enctype="multipart/form-data">
    
    <!-- Paso 1: Selecciona la Cantidad -->
    <div class="step active" id="step1">
        <label for="cantidad">🔢 Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required>
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep()">Siguiente ➡️</button>
    </div>
    
    <!-- Paso 2: Nombre Completo -->
    <div class="step" id="step2">
        <label for="nombre">👤 Nombre completo:</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep()">Siguiente ➡️</button>
    </div>
    
     <!-- Paso 3: Direccion de envío -->
    <div class="step" id="step3">
        <label for="direccion">📍 Dirección de envío:</label>
        <input type="text" name="direccion" id="direccion" required>
        
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep()">Siguiente ➡️</button>
    </div>
     
     <!-- Paso 4: Telefono de contacto -->
    <div class="step" id="step4">
        
        <label for="telefono">☎️ Teléfono de contacto:</label>
        <input type="tel" name="telefono" id="telefono" required>
        
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep()">Siguiente ➡️</button>
    </div>
    
    <!-- Paso 5: Método de pago -->
    <div class="step" id="step5">
        <label for="metodo_pago">💳 Método de pago:</label>
        <select name="metodo_pago" id="metodo_pago" required>
            <option value="Sinpe Movil">💸📲 Sinpe Movil</option>
            <option value="Transferencia bancaria">🏦 Transferencia bancaria</option>
        </select>
        
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep()">Siguiente ➡️</button>
    </div>
    
    <!-- Paso 6: Enviar comprobante de pago -->
    <div class="step" id="step6">
        <p>Gracias por tu compra! 🛒💸 Para completar el pedido, realiza la transferencia por Sinpe Móvil al número [número de teléfono] 📲.

Una vez hecho el pago, por favor sube el comprobante aquí mismo para confirmar tu pedido. 📤🧾

Si tienes alguna duda, ¡estamos aquí para ayudarte! 😊
        </p>
        <label for="comprobante_pago">💳 Comprobante de pago:</label>
        <input type="file" name="comprobante_pago" id="comprobante_pago" value="" />
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep()">Siguiente ➡️</button>
    </div>
    
</form>

<script>
    let currentStep = 1;
    let imageIndex = 0;

    // Imágenes de ejemplo para cada artículo
    const images = {
        "Camiseta": ["imagenes/cargador-usb-moto-portada.png","imagenes/cargador-usb-moto-info.png"],
        "Gorra": ["gorra1.jpg", "gorra2.jpg", "gorra3.jpg"],
        "Mochila": ["mochila1.jpg", "mochila2.jpg", "mochila3.jpg"]
    };

    function showStep(step) {
        document.querySelectorAll('.step').forEach((div, index) => {
            div.classList.toggle('active', index === step - 1);
        });
    }

    function nextStep() {
        if (currentStep < 7) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    function updateImages() {
        const articulo = document.getElementById("articulo").value;
        imageIndex = 0;
        document.getElementById("itemImage").src = images[articulo][imageIndex];
    }

    function nextImage() {
        const articulo = document.getElementById("articulo").value;
        imageIndex = (imageIndex + 1) % images[articulo].length;
        document.getElementById("itemImage").src = images[articulo][imageIndex];
    }

    function prevImage() {
        const articulo = document.getElementById("articulo").value;
        imageIndex = (imageIndex - 1 + images[articulo].length) % images[articulo].length;
        document.getElementById("itemImage").src = images[articulo][imageIndex];
    }
</script>

</body>
</html>
