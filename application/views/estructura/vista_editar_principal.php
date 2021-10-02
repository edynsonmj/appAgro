<!DOCTYPE html>
<html style='overflow-x: hidden;' lang="en">

<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <section class=" section">
</body>
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
    Vista Admin editar producto canasta
  </h3>
  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal">
    Agregar un nuevo producto
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar nuevo producto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="<?php echo base_url(); ?>index.php/GestionProducto/agregarProducto" class="form-inline">
            <label class="mr-sm-2">Nombre del producto</label>
            <input name="nombrePro" type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre">
            <label class="mr-sm-2">Cantidad</label>
            <input name="cantidadPro" type="number" class="form-control mb-2 mr-sm-2" placeholder="Cantidad">
            <label class="mr-sm-2">Precio</label>
            <input name="precioPro" type="number" class="form-control mb-2 mr-sm-2" placeholder="Precio">
  
            <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0 mb-2">Guardar</button>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="card-body">
  <div id="table" class="table-editable">
    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>

    <!--GESTION DE LA TABLA-->
    <table class="table table-bordered table-responsive-md table-striped text-center">
      <thead>
        <tr>
          <th class="text-center">Nombre del producto</th>
          <th class="text-center">Imagen</th>
          <th class="text-center">Cantidad/L</th>
          <th class="text-center">Precio/L</th>
        </tr>
      </thead>
      <tbody>
        <?php $var=0; ?>
        <?php if (count($productos) > 0) : ?>
          <?php foreach ($productos as $producto) : ?>
            
            <tr>
              <td class="pt-3-half" contenteditable="false"><?php echo $producto->getNombre(); ?></td>
              <td class="pt-3-half" contenteditable="false"><?php echo $producto->getImagen(); ?></td>
              <td class="pt-3-half" contenteditable="false"><?php echo $producto->getCantidad(); ?></td>
              <td class="pt-3-half" contenteditable="false"><?php echo $producto->getPrecio(); ?></td>


              <td>
                <span class="table-remove">
                  <form method="POST" action="<?php echo base_url(); ?>index.php/GestionProducto/eliminarProducto">
                    <!--sacar id del produto y encapsularlo en algun elemento de html, el nombre que se le de a este elemeto sera recibido en el controlador, viajara por post y se recibira con input-->
                    <input name="idPro" type="hidden" value="<?php echo $producto->getId(); ?>" >
                    <button type="submit" class="btn btn-warning btn-rounded btn-sm my-0">
                      Eliminar
                    </button>
                  </form>
                  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal<?php echo $var+=1; ?>">
                    Editar
                  </button>

                  <!-- The Modal -->
                  <div class="modal" id="myModal<?php echo $var; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Editar producto</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <form method="POST" class="form-inline" action="<?php echo base_url(); ?>index.php/GestionProducto/actualizarProducto">
                            <input name="idProducto" type="hidden" class="form-control mb-2 mr-sm-2" value=<?php echo $producto->getId(); ?>>
                            <label for="email" class="mr-sm-2">Nombre:</label>
                            <input name="nameProducto" type="text" class="form-control mb-2 mr-sm-2" value=<?php echo $producto->getNombre(); ?>>
                            <label for="pwd" class="mr-sm-2">Precio/L</label>
                            <input name="priceProducto" type="number" class="form-control mb-2 mr-sm-2" value=<?php echo $producto->getPrecio(); ?>>
                            <label for="pwd" class="mr-sm-2">Cantidad/L</label>
                            <input name="amountProducto" type="number" class="form-control mb-2 mr-sm-2" value=<?php echo $producto->getCantidad(); ?>>
                            <label for="email" class="mr-sm-2">Imagen:</label>
                            <input name="imagen" type="file" class="form-control mb-2 mr-sm-2" value=<?php echo $producto->getImagen(); ?>>

                            <button name="actualizar" type="submit" class="btn btn-primary mb-2">Actualizar</button>
                          </form>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
  </div>
  </span>


  </td>
  </tr>
<?php endforeach; ?>
<?php else : ?>
  <tr>
    <td> no hay Productos</td>
  </tr>
<?php endif; ?>
</tbody>
</table>
</span>
</div>
</div>
</div>

</html>