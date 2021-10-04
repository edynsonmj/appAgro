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
<?php $this->load->view("estructura/barraOpciones", $existeSesion); ?>



<div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <!--columnas dentro de la fila-->
                    <?php $image = "" ?>
                    <?php foreach ($ofertas as $oferta) { ?>
                        <div class="col-12 col-lg-3 p-2">
                            <article class="card h-100 bg-info text-dark bg-opacity-50">
                                <div class="card-body">
                                    <div>
                                        <img width=100 src="data:image/png;base64,<?php echo base64_encode($oferta->getImagen());?>" class="border rounded-circle border-secundary border-3">
                                        <div class="ps-lg-3">
                                        <h2 class="my-4 pb-3 h1"><?php echo $oferta->getDescuento(); ?>%</h2>
                                        <a><?php echo $oferta->getNombre(); ?> </a>
                                        <a><?php echo $oferta->getCantidad(); ?></a>
                                        <a><?php echo $oferta->getPrecio(); ?></a>
                                            <form method="POST" action="<?php echo base_url(); ?>index.php/GestionCarrito/addItemCarrito">
                                                <input name="idCarrito" type="hidden" value=<?php echo $oferta->getId(); ?>>
                                                <input name="vista" type="hidden" value="index">
                                                <button type="submit"> Añadir al carrito</button>
                                             </form>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>



<section class=" section">
    <div class="panelInversionistas">
        <section class="Inversionistas">
            <div class="container mt-5">
                <section class="text-center dark-grey-text">
                    <h3 class="font-weight-bold mb-4 pb-2">Ofertas</h3>
                    <p class="text-center w-responsive mx-auto mb-5"> </p>
                    <div class="row">
          <?php if (count($ofertas) > 0): ?>
            <?php// var_dump($ofertas); ?>
          <?php foreach ($ofertas as $oferta): ?>
          <div class = "container">
            <!-- Grid column -->
            <div class="col-lg-4 col-md-12 mb-4">
                <!-- Pricing card -->
                <div class="card pricing-card white-text">
                  <!-- Price -->
                  <div class="aqua-gradient rounded-top">
                    
                    <img style = "width: 150px; height: 100px;" src="data:image/png;base64,<?php echo base64_encode($oferta->getImagen());?>" class="border rounded-circle border-secundary border-3">
                </div>
                <!-- Features -->
                <div class="card-body striped purple-striped card-background px-5">
                  <h2 class="my-4 pb-3 h1"><?php echo $oferta->getDescuento(); ?>%</h2>
                  <ul>
                        </div>
                          <a style = "text-align: center;"><?php echo $oferta->getNombre(); ?> </a>
                          <a style ="text-align: center;"><?php echo $oferta->getCantidad(); ?></a>
                          <a style ="text-align: center;"><?php echo $oferta->getPrecio(); ?></a>
                        </div>
                      <button style="position: relative; right: 0px; background-color: rgb(21, 187, 21); color:white" href="category.html">Agregar al carrito</button>

                  </ul>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td> no hay ofertas</td>
            </tr>
          <?php endif; ?>
        </section>
        </section>

</body>

</html>