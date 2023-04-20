<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
       
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
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
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </ul>
    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
    <ul class="navbar-nav text-right">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $helper->url("usuario","iniciarSesion"); ?>" >Iniciar Sesión</a>
      </li>
      </ul>
  </div>
</nav>
        <form action="<?php echo $helper->url("usuario","actualizar"); ?>" method="post" class="col-lg-5">
            <h3>Actualizar usuario</h3>
            <hr/>
			<input type="hidden" value="<?php echo $usuario->usuarioId;?>" name="id" class="form-control"/>
            Nombre: <input type="text" value="<?php echo $usuario->nombre;?>" name="nombre" minlength="5" class="form-control"  required/>
            Apellido: <input type="text" value="<?php echo $usuario->apellido;?>" name="apellido" minlength="5" class="form-control"  required/>
            Sexo: <input type="text" value="<?php echo $usuario->sexo;?>" name="sexo" class="form-control"  required/>
            <select class="form-select form-control" name="sexo"  aria-label="Default select example">
                  <option selected value="0">Seleccione su Sexo</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                  <option value="No Binario">No Binario</option>
            </select>
            Email: <input type="text" name="email" minlength="5" value="<?php echo $usuario->email;?>" class="form-control"  required/>
            <input type="submit" value="Guardar" class="btn btn-success"/>
            <input type="submit" value="Cancelar" class="btn btn-secondary"/>
        
        </form>
        <footer class="col-lg-12">
            <hr/>
        </footer>
    </body>
</html>