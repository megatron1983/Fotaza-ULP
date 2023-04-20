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
       <?php require './view/layouts/menu.php'; ?>
       <?php if(isset($alert)&& $alert==true){ ?>
       
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
<!--          <strong>El usuario ya existe</strong> Intente nuevamente!-->
         <?php echo $mensaje ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <?php } ?>
        <form action="<?php echo $helper->url("usuario","crear"); ?>" method="post" class="col-lg-5">
            <h3>Añadir usuario</h3>
            <hr/>
            Nombre: <input type="text"  name="nombre" minlength="5" class="form-control"  required/>
            Apellido: <input type="text" name="apellido" minlength="5" class="form-control"  />
            <select class="form-select form-control" name="sexo"  aria-label="Default select example">
                  <option selected value="0">Seleccione su Sexo</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                  <option value="No Binario">No Binario</option>
            </select>
           <br>
            Email: <input value="" type="text" name="email" minlength="5" class="form-control"  required/>
            Contraseña: <input value="" type="password" name="contrasena" minlength="5" class="form-control"  required/>
            Confirmar Contraseña: <input value="" type="password" name="confirmarContrasena" minlength="5" class="form-control"  required/>
            <a class="nav-link" href="<?php echo $helper->url("usuario","index"); ?>" >Cancelar</a>
            <input type="submit" value="Guardar" class="btn btn-success"/>
        </form>
        
        <footer class="col-lg-12">
            <hr/>
        </footer>
    </body>
</html>