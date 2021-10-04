<?php require_once "/xampp/htdocs/appAgro/application/negocio/clsProducto.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <!--columnas dentro de la fila-->
                    <?php $image = "" ?>
                    <?php foreach ($productos as $producto) { ?>
                        <div class="col-12 col-lg-3 p-2">
                            <article class="card h-100 bg-info text-dark bg-opacity-50">
                                <div class="card-body">
                                    <div>
                                        <img width=100 src="data:image/png;base64,<?php echo base64_encode($producto->getImagen());?>" class="border rounded-circle border-secundary border-3">
                                        <div class="ps-lg-3">
                                            <h4><?php echo $producto->getNombre() ?></h4>
                                            <h7><?php echo "Cantidad: ".$producto->getCantidad()."<br>" ?></h7>
                                            <h7><?php echo "Precio:".$producto->getPrecio()."<br>" ?></h7>
                                            <form method="POST" action="<?php echo base_url(); ?>index.php/GestionCarrito/addItemCarrito">
                                                <input name="idCarrito" type="hidden" value=<?php echo $producto->getId(); ?>>
                                                <input name="vista" type="hidden" value="index">
                                                <button type="submit"
                                                <?php if ($existeSesion == false) { ?>
                                                    onclick="javascript: return confirm('es necesario iniciar sesion antes de agregar items al carrito');"
                                                <?php }?>
                                                > 
                                                    Añadir al carrito
                                                </button>
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
