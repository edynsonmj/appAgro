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

    <section class=" section">
    <!--Section: Content-->
    <section class="text-center">
          <!-- Section heading -->
          <h3 class="font-weight-bold dark-grey-text pb-2 mb-4">Oferta Agricola</h3>
          <!-- Section description -->
          <p class="text-muted w-responsive mx-auto mb-5">Aprovecha de esta gran Oferta
              los mejores productos con los mejores descuestos
          </p>
          <?php if (count($ofertas) > 0): ?>
          <?php foreach ($ofertas as $oferta): ?>
          <!-- Grid row -->

 
          <div class = "container">
            <!-- Grid column -->
            <div class="col-lg-4 col-md-12 mb-4">
                <!-- Pricing card -->
                <div class="card pricing-card white-text">
                  <!-- Price -->
                  <div class="aqua-gradient rounded-top">
                    <img style = "width: 150px; height: 100px;" src="../../imagenes/pepino1.jpg">
                </div>
                <!-- Features -->
                <div class="card-body striped purple-striped card-background px-5">
                  <h2 class="my-4 pb-3 h1"><?php echo $oferta->getDescuento(); ?>%</h2>
                  <ul>
                        </div>
                          <a style = "text-align: center;"><?php echo $oferta->getNombre(); ?> </a>
                          <a style ="text-align: center;"><?php echo $oferta->getImagen(); ?></a>
                          <a style ="text-align: center;"><?php echo $oferta->getCantidad(); ?></a>
                          <a style ="text-align: center;"><?php echo $oferta->getPrecio(); ?></a>
                        </div>
                      <button style="position: relative; right: 0px; background-color: rgb(21, 187, 21); color:white" href="category.html">Agregar al carrito</button>

                  </ul>
              </div>
              <!-- Pricing card -->
              
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
          <?php
  endforeach; ?>
          <?php
else: ?>
            <tr>
              <td> no hay ofertas</td>
            </tr>
          <?php
endif; ?>
          
      
        </section>
        <!--Section: Content-->
        </section>

    
    
</body>

</html>