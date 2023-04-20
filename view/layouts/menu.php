<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Fotaza</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $helper->url("Home","index"); ?>" >Home</a>
      </li>
      
      <li class="nav-item">
      <a class="nav-link" href="<?php echo $helper->url("Usuario","index"); ?>" >Usuarios</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo $helper->url("Publicacion","publicar"); ?>" >Publicar</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo $helper->url("AcercaDe","acercaDe"); ?>" >Acerca de</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Tecnología</a>
          <a class="dropdown-item" href="#">Animales</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Comidas</a>
          <a class="dropdown-item" href="#">Cumpleaños de 15</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Arte</a>
        </div>
      </li>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </ul>
    
    <ul class="navbar-nav text-right">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $helper->url("usuario","registrar"); ?>" >Registrarse</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $helper->url("usuario","iniciarSesion"); ?>" >Iniciar Sesión</a>
      </li>
    </ul>
      
  </div>
</nav>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>