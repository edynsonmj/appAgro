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
                  <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_editar_principal.html">Productos Agricolas</a> </button>
                </li>
              <li class="nav-item">
                  <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_editar_organizacion.html">Organizacion</a> </button>
              </li>
              <li class="nav-item">
                  <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_editar_ofertas.html">Ofertas</a></button>
              </li>    
              <li class="nav-item">
                  <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_editar_inversionistas.html">Inversionistas</a></button>
              </li>  
              <li class="nav-item">
                  <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_editar_eventos.html">Eventos</a></button>
              </li>  
              <li class="nav-item">
                  <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#">Cerrar sesion</button>
              </li>  
              </ul>
            </div>  
          </nav>
        </div>
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
            Vista Admin editar Organizacion
        </h3>
        <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal1">
            agregar organizacion
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar organizacion</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="POST" class="form-inline" action="<?php echo base_url();?>index.php/GestionOrganizacion/addOrganizacion">
                            <label for="email" class="mr-sm-2">Agregar nombre Organizacion</label>
                            <input name="nameProd" type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre Producto">
                            <label for="pwd" class="mr-sm-2">imagen</label>
                            <input name="pathImage" type="text" class="form-control mb-2 mr-sm-2" placeholder="ruta imagen" >
                            <label for="pwd" class="mr-sm-2">ubicacion</label>
                            <input name="ubication" type="text" class="form-control mb-2 mr-sm-2" placeholder="Add ubicacion" >
                            <label for="pwd" class="mr-sm-2">Telefono</label>
                            <input name="phone" type="number" class="form-control mb-2 mr-sm-2" placeholder="Add telefono" >
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
            <table class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">nombre de la organizacion</th>
                        <th class="text-center">imagen</th>
                        <th class="text-center">Ubicacion</th>
                        <th class="text-center">Telefono</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($organizaciones) > 0): ?>
                <?php foreach ($organizaciones as $organizacion): ?>
                    <tr>
                        <td class="pt-3-half" contenteditable="true"><?php $organizacion->getNombre(); ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php $organizacion->getImagen(); ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php $organizacion->getUbicacion(); ?></td>
                        <td class="pt-3-half" contenteditable="true"><?php $organizacion->getTelefono(); ?></td>

                        <td class="pt-3-half">
                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                        aria-hidden="true"></i></a></span>
                            <span class="table-down"><a href="#!" class="indigo-text"><i
                                        class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                        </td>
                        <td>
                            <span class="table-remove">
                                <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                                    Eliminar
                                </button>
                                <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal"
                                    data-target="#myModal">
                                    Editar
                                </button>

                                <!-- The Modal -->
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar un producto</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" class="form-inline" action="<?php echo base_url();?>index.php/GestionOrganizacion/updateOrganizacion">
                                                    <label for="email" class="mr-sm-2">Agregar nombre Organizacion</label>
                                                    <input name="nameProd" type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre Producto">
                                                    <label for="pwd" class="mr-sm-2">imagen</label>
                                                    <input name="pathImage" type="image" class="form-control mb-2 mr-sm-2" placeholder="ruta imagen">
                                                    <label for="pwd" class="mr-sm-2">ubicacion</label>
                                                    <input name="ubication" type="text" class="form-control mb-2 mr-sm-2" placeholder="Add ubicacion">
                                                    <label for="pwd" class="mr-sm-2">Telefono</label>
                                                    <input name="phone" type="number" class="form-control mb-2 mr-sm-2" placeholder="Add telefono">

                                                    <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
                                                </form>

                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td> no hay Organizaciones</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>