<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>
<body>
<?php require './view/layouts/menu.php'; ?>
    <div class="container text-center mt-5">
        <h3>Iniciar sesión</h3>
    </div>
    
    <form action="<?php echo $helper->url("Usuario","login"); ?>" method="post">
        <div class="container bg-white">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="IzquierdaDerecha">
                        <div class="izquierda text-left">
                            <a class="nav-link" href="<?php echo $helper->url("Usuario","recuperar"); ?>"> 
                                Olvidó su contraseña ?
                            </a>
                        </div>
                    </div>
                    <hr>
                    <p>
                        <label for="email" class="col-md-2">Email</label><br>
                        <input type="email" name="email" autofocus required class="form-control"/>
                    </p>
                    <br>
                    <p>
                        <label for="contrasena">Password</label><br>
                        <input type="password" name="contrasena" required class="form-control"/>
                        
                    
                    </p>

                    <p>
                        <div class="btnOpciones center">
                            <input type="submit" name="enviar" value="Iniciar sesión" class="btn btn-info">
                        </div>
                    </p>
                    <hr>
                        <a class="nav-link" href="<?php echo $helper->url("Usuario","registro"); ?>"> Si no tiene una cuenta, regístrese aquí...
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                        </a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </form>

</body>
</html>