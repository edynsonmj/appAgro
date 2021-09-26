<?php require_once "/xampp/htdocs/appAgro/application/negocio/clsProducto.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <!--columnas dentro de la fila-->
                    <?php foreach ($productos as $producto) { ?>
                        <div class="col-12 col-lg-3 p-2">
                            <article class="card h-100 bg-info text-dark bg-opacity-50">
                                <div class="card-body">
                                    <div>
                                        <img src="<?php echo $producto->getImagen() ?>" class="border rounded-circle border-secundary border-3">
                                        <div class="ps-lg-3">
                                            <h4><?php echo $producto->getNombre() ?></h4>
                                            <h7><?php echo "Cantidad: ".$producto->getCantidad()."<br>" ?></h7>
                                            <h7><?php echo "Precio:".$producto->getPrecio()."<br>" ?></h7>
                                            <h7><?php var_dump($producto->getImagen())."<br>" ?></h7>
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