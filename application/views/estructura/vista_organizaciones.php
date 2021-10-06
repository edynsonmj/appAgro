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


<?php $this->load->view("estructura/barraOpciones", $existeSesion);  ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="row">
          <!--columnas dentro de la fila-->
          <?php if (count($organizaciones) > 0) : ?>
            <?php count($organizaciones) ?>
            <?php foreach ($organizaciones as $organizacion) : ?>
              <div class="col-12 col-lg-3 p-2">
                <article style="width: 18rem;" class="card h-100 bg-info text-dark bg-opacity-50">
                <img src="data:image/png;base64,<?php echo base64_encode($organizacion->getImagen()); ?>" class=" card-img-top">
                  <div class="card-body">
                    <div>
                      <div class="ps-lg-3">
                        <a style="text-align: center;"><?php echo $organizacion->getNombre(); ?> </a>
                        <a style="text-align: center;"> </a>
                        <a style="text-align: center;"><?php echo $organizacion->getTelefono(); ?></a>

                      </div>
                    </div>
                  </div>
                </article>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>