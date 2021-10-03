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
    <div class="container mt-5">

 
        <!--Section: Content-->
        <section class="dark-grey-text mb-5">
          
          <style>
            .map-container-section {
              overflow:hidden;
              padding-bottom:56.25%;
              position:relative;
              height:0;
            }
            .map-container-section iframe {
              left:0;
              top:0;
              height:100%;
              width:100%;
              position:absolute;
            }
          </style>
          <?php if (count($organizaciones) > 0): ?>
          <?php foreach ($organizaciones as $organizacion): ?>
          <div class="row">
            
            <!-- Grid column -->
            <div style="display: flex; flex-wrap: wrap; width: 550px;" class="col-lg-5 mb-lg-0 pb-lg-3 mb-4">
    
              <div class="card">
                <div class="card-body">
                    <img style ='width: 400px; height: 400px;' src="data:image/png;base64,<?php echo base64_encode($organizacion->getImagen());?>">
                </div>

                <a style = "text-align: center;"><?php echo $organizacion->getNombre(); ?> </a>
                <a style = "text-align: center;"> </a>
                <a style ="text-align: center;"><?php echo $organizacion->getTelefono(); ?></a>
              </div>
            </div>

            <div class="col-lg-7">
    
              <!--Google map-->

              <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 300px">
                <iframe src="https://maps.google.com/maps?q=Manhatan&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0"
                  style="border:0" allowfullscreen></iframe>
              </div>
              <!-- Buttons-->
              <div class="row text-center">
                <div class="col-md-4">
                  <a class="btn-floating blue accent-1">
                    <i class="fas fa-map-marker-alt"></i>
                  </a>
                  <p>MAPA</6p>
                </div>
              </div>
    
            </div>
          <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td> no hay Organizaciones</td>
            </tr>
          <?php endif; ?>
</body>

</html>