<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <title>Document</title>
</head>
<body>
<?php require './view/layouts/menu.php'; ?>
  

  <h1>Publicar una Foto</h1>
   <form action="<?php echo $helper->url("Publicacion", "insertar"); ?>" method="post" enctype="multipart/form-data">
   

   Tipo de licencia <br>
   <select name="licencia">
   <?php foreach ($alllicencias as $licencia) {?>
     <option value="<?php echo $licencia->licenciaId ?>"><?php echo $licencia->tipo ?>
   </option> 
   <?php } ?><br>

  </select><br>
   
   Categoría <br>
   <select name="categoria">
   <?php foreach ($allcategorias as $categoria) {?>
     <option value="<?php echo $categoria->categoriaId ?>"><?php echo $categoria->nombre ?>
   </option> 
   <?php } ?><br>

      
   
   </select><br>
   Ingrese Titulo <br>
   <input type="text"  name="titulo"  class="form-control"  required/><br>
   <div> 
  <label for="formFileLg" class="form-label">Ingrese una Foto</label>
  <input class="form-control form-control-lg" id="formFileLg" type="file" name="imagen[0]">
</div>
   
   Ingrese Etiqueta 1 <br>
   <input type="text"  name="etiqueta1"  class="form-control"  required/><br>
   Ingrese Etiqueta 2 <br>
   <input type="text"  name="etiqueta2"  class="form-control"  required/><br>
   Ingrese Etiqueta 3 <br>
   <input type="text"  name="etiqueta3"  class="form-control"  required/><br>
    <select class="form-select form-control" name="publica"  aria-label="Default select example">
                  <option selected value="1">Publica</option>
                  <option value="0">Privada</option>
                  
            </select><br>
   <input type="submit" value="Guardar" class="btn btn-success"/>

   </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>