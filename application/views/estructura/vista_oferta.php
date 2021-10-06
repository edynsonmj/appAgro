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
                            <img src="data:image/png;base64,<?php echo base64_encode($oferta->getImagen());?>" class="border">
                                <div class="card-body">
                                    <div>
                                        <div class="ps-lg-3">
                                        <h2 class="my-4 pb-3 h1"><?php echo "descuento: ".$oferta->getDescuento()*100; ?>%</h2>
                                        <a><?php echo "nombre: ".$oferta->getNombre(); ?> <br></a>
                                        <a><?php echo "cantidad: ".$oferta->getCantidad(); ?><br></a>
                                        <a><?php echo "precio: ".$oferta->getPrecio(); ?><br></a>
                                            <form method="POST" action="<?php echo base_url(); ?>index.php/GestionCarrito/addItemCarrito">
                                                <input name="idCarrito" type="hidden" value=<?php echo $oferta->getId(); ?>>
                                                <input name="vista" type="hidden" value="index">
                                                <button class="btn-warning" type="submit"> Añadir al carrito</button>
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


</body>

</html>