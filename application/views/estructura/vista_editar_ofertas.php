<!DOCTYPE html>
<html style = 'overflow-x: hidden;'lang="en">

<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
<?php $this->load->view("estructura/barraOpciones", $existeSesion);  ?>
    <section class=" section">
    </body>
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
          Vista Admin editar Oferta
        </h3>
        <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal">
          Agregar Producto
        </button>
      
        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Agregar nueva oferta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                  <form method="POST" class="form-inline" action="<?php echo base_url();?>index.php/GestionOferta/addOferta" enctype="multipart/form-data">
                      <label for="email" class="mr-sm-2">Nombre del producto:</label>
                      <input name="nameOfer" type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre Producto">
                      <label for="pwd" class="mr-sm-2">Precio/L</label>
                      <input name="priceOfer" type="number" class="form-control mb-2 mr-sm-2" placeholder="Precio" >
                      <label for="pwd" class="mr-sm-2">Cantidad/L</label>
                      <input name="amountOfer" type="number" class="form-control mb-2 mr-sm-2" placeholder="Cantidad">
                      <label for="pwd" class="mr-sm-2">Descuento</label>
                      <input name="discountOfer" type="number" class="form-control mb-2 mr-sm-2" placeholder="Descuento" >
                      <label for="pwd" class="mr-sm-2">Descuento</label>
                      <input name="imagen5" type="file" class="form-control mb-2 mr-sm-2" placeholder="Imagen" >
                  
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
            <span class="table-add float-right mb-3 mr-2"
              ><a href="#!" class="text-success"
                ><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a
            ></span>
            <table class="table table-bordered table-responsive-md table-striped text-center">
              <thead>
                <tr>
                  <th class="text-center">Nombre del producto</th>
                  <th class="text-center">Precio/L</th>
                  <th class="text-center">Cantidad/L</th>
                  <th class="text-center">Descuento</th>
                  <th class="text-center">Imagen</th>
                </tr>
              </thead>
              <tbody>
              <?php $var=0; ?>
              <?php if (count($ofertas) > 0): ?>
              <?php foreach ($ofertas as $oferta): ?>
                <tr>
                  <td class="pt-3-half" contenteditable="true"><?php echo $oferta->getNombre();  ?></td>
                  <td class="pt-3-half" contenteditable="true"><?php  echo $oferta->getPrecio();  ?></td>
                  <td class="pt-3-half" contenteditable="true"><?php  echo $oferta->getCantidad();  ?></td>
                  <td class="pt-3-half" contenteditable="true"><?php echo $oferta->getDescuento();  ?></td>
                  <td class="pt-3-half" contenteditable="true"><img width=100 src="data:image/png;base64,<?php echo base64_encode($oferta->getImagen());?>" class="border rounded-circle border-secundary border-3"></td>
                  <td>
                      <span class="table-remove">
                        <form method="POST" action="<?php echo base_url(); ?>index.php/GestionOferta/deleteOferta">
                          <input name="idOferta" type="hidden" class="form-control mb-2 mr-sm-2" value=<?php echo $oferta->getId(); ?>>
                          <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0" onclick="javascript: return confirm('¿estas seguro de eliminar este item?');">
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
                                <h4 class="modal-title">Editar oferta</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              
                              <!-- Modal body -->
                              <div class="modal-body">
                                  <form method="POST" class="form-inline" action="<?php echo base_url();?>index.php/GestionOferta/updateOferta" enctype="multipart/form-data">
                                      <input name="idOferta" type="hidden" class="form-control mb-2 mr-sm-2" value=<?php echo $oferta->getId(); ?>>
                                      <label for="email" class="mr-sm-2">Nombre del producto:</label>
                                      <input name="nameOferta" type="text" class="form-control mb-2 mr-sm-2" value=<?php echo $oferta->getNombre(); ?>>
                                      <label for="pwd" class="mr-sm-2">Precio/L</label>
                                      <input name="priceOferta" type="number" class="form-control mb-2 mr-sm-2" value=<?php echo $oferta->getPrecio(); ?> >
                                      <label for="pwd" class="mr-sm-2">Cantidad/L</label>
                                      <input name="amountOferta" type="number" class="form-control mb-2 mr-sm-2" value=<?php echo $oferta->getCantidad(); ?> >
                                      <label for="email" class="mr-sm-2">Descuento:</label>
                                      <input name="DescuentoOferta" type="number" class="form-control mb-2 mr-sm-2" value=<?php echo $oferta->getDescuento(); ?> >
                                      <label for="pwd" class="mr-sm-2">Imagen:</label>
                                      <input name="imagen6" type="file" class="form-control mb-2 mr-sm-2">
                                      <button type="submit" class="btn btn-primary mb-2" onclick="javascript: return confirm('¿estas seguro de actualizar este item?');">Actualizar</button>
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
                <?php else: ?>
                    <tr>
                        <td> no hay ofertas</td>
                    </tr>
                <?php endif; ?>
              </tbody>
            </table>
            </span>
          </div>
        </div>
      </div>
</body>      
</html>