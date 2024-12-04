<?php

$actualPage="Inicio";
if(str_contains($request_url, "index.php?action=contacto")){
    $actualPage="Contacto";
}

?>  

<!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php"><?= "Tus Accesorios CR"?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?=$actualPage=="Inicio"?"active":"" ?>" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?=$actualPage=="Contacto"?"active":"" ?>" href="index.php?action=contacto">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Carrito</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>