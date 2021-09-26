<!DOCTYPE html>
<html style='overflow-x: hidden;' lang="en">

<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <nav style="height: 20em; background-image: url('../../imagenes/Vegetales.jpg') !important;
    background-position: center;" class="navbar navbar-expand-md bg-primary navbar-dark">
    <button style=" background:rgb(54, 54, 216);color: white; border: white solid" class="navbar-brand"
      href="#">AgroCauca</button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <button style=" background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a
              style="color: white; text-decoration: none;" href="vista_editar_principal.html">Productos Agricolas</a>
          </button>
        </li>
        <li class="nav-item">
          <button style=" background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a
              style="color: white; text-decoration: none;" href="vista_editar_organizacion.html">Organizacion</a>
          </button>
        </li>
        <li class="nav-item">
          <button style=" background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a
              style="color: white; text-decoration: none;" href="vista_editar_ofertas.html">Ofertas</a></button>
        </li>
        <li class="nav-item">
          <button style=" background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a
              style="color: white; text-decoration: none;"
              href="vista_editar_inversionistas.html">Inversionistas</a></button>
        </li>
        <li class="nav-item">
          <button style=" background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a
              style="color: white; text-decoration: none;" href="vista_editar_eventos.html">Eventos</a></button>
        </li>
        <li class="nav-item">
          <button style=" background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link"
            href="#">Cerrar sesion</button>
        </li>
      </ul>
    </div>
  </nav>
  </div>

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
          <form method="POST" action="<?php echo base_url();?>index.php/GestionProducto/agregarProducto" class="form-inline">
            <label class="mr-sm-2">Nombre del producto</label>
            <input name="nombrePro" type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre del producto">
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
    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
          aria-hidden="true"></i></a></span>
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
        <?php if(count($productos) > 0): ?>
        <?php foreach($productos as $producto): ?>
            <tr>
              <td class="pt-3-half" contenteditable="true"><?php $producto->getNombre(); ?></td>
              <td class="pt-3-half" contenteditable="true"><?php $producto->getImagen(); ?></td>
              <td class="pt-3-half" contenteditable="true"><?php $producto->getCantidad(); ?></td>
              <td class="pt-3-half" contenteditable="true"><?php $producto->getPrecio(); ?></td>
  
              <td class="pt-3-half">
                <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
              </td>
              <td>
                <span class="table-remove">
                  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button>
                  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal2">Editar</button>
                </span>
              </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td> no hay Productos</td>
          </tr>
        <?php endif; ?>
        <!-- This is our clonable table line -->
        <tr class="hide">
          <td class="pt-3-half">
            <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                  aria-hidden="true"></i></a></span>
            <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                  aria-hidden="true"></i></a></span>
          </td>
        </tr>
      </tbody>
    </table>
    </span>
  </div>
</div>
</div>

</html>