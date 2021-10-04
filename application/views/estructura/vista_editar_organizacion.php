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
    <?php $this->load->view("estructura/barraOpciones", $existeSesion);  ?>
    
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
            Vista Admin editar Organizacion
        </h3>
        <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal">
            agregar organizacion
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar organizacion</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="POST" action="<?php echo base_url();?>index.php/GestionOrganizacion/addOrganizacion" class="form-inline" enctype="multipart/form-data">
                            <label for="email" class="mr-sm-2">Agregar nombre Organizacion</label>
                            <input name="nameOrg" type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre Producto">
                            <label for="email" class="mr-sm-2">imagen</label>
                            <input name="imagen2" type="file" class="form-control mb-2 mr-sm-2">
                            <label for="pwd" class="mr-sm-2">ubicacion</label>
                            <input name="ubicationOrg" type="text" class="form-control mb-2 mr-sm-2" placeholder="Add ubicacion" >
                            <label for="pwd" class="mr-sm-2">Telefono</label>
                            <input name="phoneOrg" type="number" class="form-control mb-2 mr-sm-2" placeholder="Add telefono" >
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
                <?php $var=0; ?>
                <?php if (count($organizaciones) > 0): ?>
                <?php foreach ($organizaciones as $organizacion): ?>
                    <tr>
                        <td class="pt-3-half" contenteditable="false"><?php echo $organizacion->getNombre(); ?></td>
                        <td class="pt-3-half" contenteditable="false"><img width=100 src="data:image/png;base64,<?php echo base64_encode($organizacion->getImagen());?>" class="border rounded-circle border-secundary border-3"></td>
                        <td class="pt-3-half" contenteditable="false"><?php echo $organizacion->getUbicacion(); ?></td>
                        <td class="pt-3-half" contenteditable="false"><?php echo $organizacion->getTelefono(); ?></td>
                        <td>
                            <span class="table-remove">
                                <form method="POST" action="<?php echo base_url(); ?>index.php/GestionOrganizacion/deleteOrganizacion">
                                    <input name="idOrg" type="hidden" value="<?php echo $organizacion->getId(); ?>" >
                                    <button type="submit" class="btn btn-warning btn-rounded btn-sm my-0">
                                        Eliminar
                                    </button>
                                </form>
                                <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal"
                                    data-target="#myModal<?php echo $var+=1; ?>">
                                    Editar
                                </button>

                                <!-- The Modal -->
                                <div class="modal" id="myModal<?php echo $var; ?>">
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
                                                <form method="POST" class="form-inline" action="<?php echo base_url();?>index.php/GestionOrganizacion/updateOrganizacion" enctype="multipart/form-data">
                                                    <input name="idOrganizacion" type="hidden" class="form-control mb-2 mr-sm-2" value=<?php echo $organizacion->getId(); ?>>
                                                    <label for="email" class="mr-sm-2">Agregar nombre Organizacion</label>
                                                    <input name="nameProd" type="text" class="form-control mb-2 mr-sm-2" value=<?php echo $organizacion->getNombre(); ?> >
                                                    <label for="pwd" class="mr-sm-2">imagen</label>
                                                    <input name="nameProd" type="file" class="form-control mb-2 mr-sm-2">
                                                    <label for="pwd" class="mr-sm-2">ubicacion</label>
                                                    <input name="ubication" type="text" class="form-control mb-2 mr-sm-2" value=<?php echo $organizacion->getUbicacion(); ?>>
                                                    <label for="pwd" class="mr-sm-2">Telefono</label>
                                                    <input name="phone" type="number" class="form-control mb-2 mr-sm-2" value=<?php echo $organizacion->getTelefono(); ?>>

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