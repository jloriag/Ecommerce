<?php

// Obtener el protocolo (http o https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? "https" : "http";

// Obtener el host (ejemplo.com)
$host = $_SERVER['HTTP_HOST'];

// Obtener el directorio de la URL donde se encuentra el archivo actual
$directory = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

$css_url = $protocol . "://" . $host . $directory . "/../boostrap/css/bootstrap.min.css";

$js_url = $protocol . "://" . $host . $directory . "/../boostrap/js/bootstrap.bundle.min.js";

$request_url=$_SERVER['REQUEST_URI'];
