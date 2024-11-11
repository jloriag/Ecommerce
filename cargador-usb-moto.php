<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Asegúrate de que la ruta es correcta

$nombreArticulo="Cargador de Motocicleta 12V USB";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $metodo_pago = $_POST['metodo_pago'];
    
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jozzlg@gmail.com'; // Tu dirección de correo de Gmail
    $mail->Password = 'zvsmfldglsoiyuho'; // Contraseña de tu correo o contraseña de aplicación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita TLS en Gmail
    $mail->Port = 587; // Puerto de Gmail para TLS

    // Configuración del correo
    $mail->setFrom('jozzlg@gmail.com', $nombre);
    $mail->addAddress('jozzlg@gmail.com', 'Josue Loria'); // Añadir destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Compra de articulo';
    $mail->Body    = 'Un nuevo cliente: '.$nombre.' ha comprado un:  cargador. </br>Su direccion es: '.$direccion.' </br>El telefono es: '.$telefono;
    //$mail->AltBody = 'Este es el contenido del correo en texto plano para clientes que no soporten HTML.';

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado con éxito';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
    echo "<h2>🎉 ¡Gracias por tu compra, $nombre!</h2>";
    echo "<p>Has comprado un $nombreArticulo. El pedido será enviado a $direccion. 📦</p>";
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
    <title>Compra de Cargador USB Moto</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .step { display: none; }
        .step.active { display: block; }
        .step label { font-size: 1.2em; margin-top: 10px; display: block; }
        .step input, .step select, .step button { width: 100%; padding: 10px; font-size: 1em; margin: 5px 0; box-sizing: border-box; }
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
        
        /* Estilos para el ícono flotante */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            text-decoration: none;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }
        .whatsapp-float:hover {
            background-color: #20b455;
        }
        
                .stars {
            display: inline-block;
            font-size: 2rem;
            line-height: 1;
        }
        .star {
            color: lightgray; /* Color para estrellas "vacías" */
            position: relative;
        }
        .star::before {
            content: "★";
        }
        .star-filled {
            color: gold; /* Color para estrellas "llenas" */
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            width: 0%; /* Ancho inicial */
        }
        
        .scrollable-div {
            width: 100%;           /* Ancho del div */
            height: 100px;          /* Altura máxima visible antes de activar scroll */
            overflow-y: auto;       /* Habilita el scroll vertical cuando se supera la altura */
            padding: 10px;
            border: 1px solid #ccc; /* Borde para hacer visible el div */
            font-size: 16px;
            line-height: 1.4;       /* Ajusta el interlineado */
            white-space: pre-wrap;  /* Permite saltos de línea automáticos */
        }
    </style>
</head>
<body>

<h1>🛒 Compra de <?= $nombreArticulo ?></h1>
<h2>Precio: ¢9900</h2>

<p>Este producto tiene una clasificación de 4.3 de 5 en <a target="_blank" rel="nofollow" href="https://www.amazon.ca/Beedove-Motorcycle-Voltmeter-Waterproof-Motorbike/dp/B089LQVF2P#customerReviews">Amazon</a></p>
    <div class="stars" id="star-rating">
        <!-- Estrellas con contenido ajustable -->
        <span class="star"><span class="star-filled">★</span></span>
        <span class="star"><span class="star-filled">★</span></span>
        <span class="star"><span class="star-filled">★</span></span>
        <span class="star"><span class="star-filled">★</span></span>
        <span class="star"><span class="star-filled">★</span></span>
    </div>
<h3>Pagas cuando recibes el producto 🫱🫲</h3>
<h3>Envío rapido 📦💨</h3>
<h3>Soporte por <a href="https://wa.me/50685972117" target="_blank" title="Contáctanos por WhatsApp"> WhatsApp</a></h3>
    <div class="scrollable-div" id="limitedDiv">🔌【Puertos Dual Quick Charge 3.0 USB】El cargador USB dual para motocicleta cuenta con 2 puertos USB, ofreciendo una carga 4 veces más rápida que los cargadores convencionales.

📊【Pantalla de Voltaje en Tiempo Real】El voltímetro inteligente incorporado con pantalla LED digital te muestra el estado de voltaje de la batería o el alternador en tiempo real mientras conduces, ayudando a evitar problemas de voltaje anormal.

🔥【Material de Alta Calidad】La capa exterior del cargador está hecha de material ABS ecológico, resistente a altas y bajas temperaturas, evitando sobrecalentamientos. Estabilidad y seguridad mejoradas. Equipado con una cubierta plástica, es impermeable y a prueba de polvo.

🔧【Fácil Instalación】Dos métodos de instalación: montaje en el manillar y montaje con tornillo. Solo necesitas fijar el USB y conectar los polos positivo y negativo del cable a la fuente de alimentación. Incluye un interruptor para encender o apagar cuando desees, ayudando a ahorrar energía.

🌍【Aplicación Universal】Voltaje de salida: 5V / 3.4A, 9V / 2.5A, 12V / 2A. Puede cargar casi cualquier teléfono, GPS, tableta, cámara, etc. y es compatible con vehículos de DC12V como motocicletas, ATV, SUV, barcos, entre otros</div>
<!-- Carrusel de imágenes del artículo -->
<div class="carousel">
    <button class="left" onclick="prevImage()">⬅️</button>
    <img id="itemImage" src="imagenes/cargador-usb-moto-portada.png" alt="Imagen del artículo">
    <button class="right" id="botonCambiarImagen" >➡️</button>
</div>
<br/>
<h4>Datos para comprar el producto:</h4>
<form id="compraForm" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
    <!-- Paso 1: Nombre Completo -->
    <div class="step active" id="step1">
        <label for="nombre">👤 Nombre completo:</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep('nombre')">Siguiente ➡️</button>
    </div>
    
     <!-- Paso 2: Direccion de envío -->
    <div class="step" id="step2">
        <label for="direccion">📍 Dirección de envío:</label>
        <input type="text" name="direccion" id="direccion" required>
        
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep('direccion')">Siguiente ➡️</button>
    </div>
     
     <!-- Paso 3: Telefono de contacto -->
    <div class="step" id="step3">
        
        <label for="telefono">☎️ Teléfono de contacto:</label>
        <input type="tel" name="telefono" id="telefono" required>
        
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button type="button" onclick="nextStep('telefono')">Siguiente ➡️</button>
    </div>
    
    <!-- Paso 4: Método de pago -->
    <div class="step" id="step4">
        <label for="metodo_pago">💳 Método de pago:</label>
        <select name="metodo_pago" id="metodo_pago" required>
            <option value="Efectivo - Sinpe Movil">💸📲 Efectivo - Sinpe Movil / Contra Entrega - Envío dentro del GAM</option>
        </select>
        <button type="button" onclick="prevStep()">⬅️ Anterior</button>
        <button onclick="return validarFormulario()" type="submit" >Finalizar compra ➡️</button>
    </div>
    
</form>

<script>
    let currentStep = 1;
    let imageIndex = 0;

    // Imágenes de ejemplo para cada artículo
    const images = ["imagenes/cargador-usb-moto-portada.png","imagenes/cargador-usb-moto-info.png"];

    function showStep(step) {
        document.querySelectorAll('.step').forEach((div, index) => {
            div.classList.toggle('active', index === step - 1);
        });
    }

    function nextStep(str) {
        if(document.getElementById(str).value==''){
            alert(str+" debe ser ingresado");
        }else if (currentStep < 8) {
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

    function actualizarImagen() {
        imageIndex = (imageIndex + 1) % images.length;
        document.getElementById("itemImage").src = images[imageIndex];
    }

    function prevImage() {
        imageIndex = (imageIndex - 1 + images.length) % images.length;
        document.getElementById("itemImage").src = images[imageIndex];
    }
    
    function validarFormulario(){
        mostrarElementosPorClase("step");
    }
    
    function mostrarElementosPorClase(str) {
        const elementos = document.querySelectorAll("."+str);
        elementos.forEach(elemento => {
            elemento.style.display = "block"; // Cambia "block" según el tipo de elemento
        });
    }

const boton = document.getElementById("botonCambiarImagen");
boton.addEventListener("click", actualizarImagen);

        function setStarRating(rating) {
            const stars = document.querySelectorAll("#star-rating .star-filled");
            stars.forEach((star, index) => {
                const starPercentage = Math.min(100, Math.max(0, (rating - index) * 100));
                star.style.width = `${starPercentage}%`;
            });
        }

        setStarRating(4.3); // Ajusta este valor a la calificación deseada


</script>

    <!-- Ícono flotante de WhatsApp -->
    <a href="https://wa.me/50685972117" target="_blank" class="whatsapp-float" title="Contáctanos por WhatsApp">
        &#x1F4AC; <!-- Ícono de burbuja de mensaje como alternativa, puedes usar Font Awesome para el logo oficial de WhatsApp -->
    </a>

</body>
</html>
