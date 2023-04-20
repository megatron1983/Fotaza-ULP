<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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

        <div class="col-lg-7">
         <h3 style="display:inline">Usuarios</h3>
		<span>
          <a href="<?php echo $helper->url("usuario","registrar"); ?>" class="btn btn-info">Agregar Nuevo Usuario</a>
        </span>

            <hr/>
        </div>
        <section class="col-lg-7 usuario">
            <?php foreach($allusers as $user) {?>
                <?php echo $user->usuarioId; ?> -
                <?php echo $user->contrasena; ?> -
                <?php echo $user->apellido; ?> -
                <?php echo $user->nombre; ?> -
                <?php echo $user->email; ?>-
                <?php echo $user->sexo; ?> -
                <?php echo $user->foto; ?> -
                <div class="right">
                    <a href="<?php echo $helper->url("usuario","borrar"); ?>&id=<?php echo $user->usuarioId; ?>" class="btn btn-danger">Borrar</a>
					<a href="<?php echo $helper->url("usuario","editar"); ?>&id=<?php echo $user->usuarioId; ?>" class="btn btn-info">Editar</a>
                </div>
                <hr/>
            <?php } ?>
	
        </section>
		
        <footer class="col-lg-12">
            <hr/>
        </footer>
    </body>
</html>