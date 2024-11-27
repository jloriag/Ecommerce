<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slider de Imágenes con Bootstrap</title>
  <!-- Enlace al CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicadores -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Contenedor de Imágenes -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Imagen 1">
    </div>
    <div class="carousel-item">
      <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Imagen 2">
    </div>
    <div class="carousel-item">
      <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Imagen 3">
    </div>
  </div>

  <!-- Controles de Navegación -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<!-- Enlace al JavaScript de Bootstrap y sus dependencias -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
