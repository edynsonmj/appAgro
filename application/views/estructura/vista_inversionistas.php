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
    <div class="panelInversionistas">
        <section class="Inversionistas">
            <div class="container mt-5">
                <section class="text-center dark-grey-text">
                    <h3 class="font-weight-bold mb-4 pb-2">Inversionistas</h3>
                    <p class="text-center w-responsive mx-auto mb-5"> </p>
                    <div class="row">
                    <?php if (count($inversionistas) > 0): ?>
                    <?php foreach ($inversionistas as $inversionista): ?>
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card testimonial-card">
                                <div class="card-up info-color"></div>
                                <div class="avatar mx-auto white">
                                 <img width= "350" src="data:image/png;base64,<?php echo base64_encode($inversionista->getImagen());?>" class="border rounded-circle border-secundary border-3">
                                </div>
                                <div class="card-body">
                                    <h4 class="font-weight-bold mb-4"><?php echo $inversionista->getNombre(); ?></h4>
                                    <hr>
                                    <p class="dark-grey-text mt-4"><i
                                            class="fas fa-quote-left pr-2"><?php echo $inversionista->getTelefono(); ?></i></p>
                                    <p class="dark-grey-text mt-4"><i class="fas fa-quote-left pr-2"><?php echo $inversionista->getDescripcion(); ?></i></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td> no hay Inversionistas</td>
                        </tr>
                        <?php endif; ?>
                       
                    </div>
                </section>
            </div>
</body>

</html>