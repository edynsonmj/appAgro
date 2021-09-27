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
    <nav style="height: 8em; background-image: url('../../imagenes/Vegetales.jpg') !important;
    background-position: center;" class="navbar navbar-expand-md bg-primary navbar-dark">
        <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="navbar-brand" href="#">AgroCauca</button>
        <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div  class="collapse navbar-collapse justify-content-center"  id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_principal.html">Productos Agricolas</a> </button>
            </li>
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_organizaciones.html">Organizacion</a> </button>
            </li>
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_ofertas.html">Ofertas</a></button>
            </li>    
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_inversionistas.html">Inversionistas</a></button>
            </li>  
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_eventos.html">Eventos</a></button>
            </li>  
            
            <li class="nav-item">
                <form action="<?php echo base_url(); ?>index.php/Principal/cargarLogin">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link">
                    iniciar sesion 
                </button>
            </form>
            </li>  
 
          </ul>
        </div>  
      </nav>
    </div>
    <section class=" section">
        <!-- Container Start -->
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section title -->
                    <div style ='position: relative; left: 500px;' class="section-title">
                        <h2>                       </h2>
                    </div>
                    <div class="row">
                    <?php if(count($productos) > 0): ?>
                    <?php foreach ($productos as $producto): ?>
                            <div style = "border:solid  rgb(56, 55, 58);" class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                                <div style= 'position: relative; left: 80px;'class="category-block">
                                    <div class="header">
                                        <img style = "width: 100px; height: 100px;" src="../../imagenes/Zanahoria.jpg">
                                        <i class="fa fa-laptop icon-bg-1"></i> 
                                        <h4><?php echo $producto->getNombre();?> </h4>
                                    </div>
                                    <ul class="category-list" >
                                        <li><a>Cantidad <span><?php echo $producto->getCantidad();?> </span></a></li>
                                        <li><a></a>Precio <span><?php echo $producto->getPrecio();?>/L</span></a></li>
                                        <button style="position: relative; right: 40px; background-color: rgb(20, 63, 20); color:white" href="category.html">Agregar al carrito</button>
                                    </ul>
                                </div>
                            </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <p>no hay nada</p>
                    <?php endif; ?>
                        
                    </div>
                </div>
            </div>
            <button style="float:right;background:rgb(54, 54, 216)"type="button" class="btn btn-primary">Mirar Carrito</button>
        </div>
        <!-- Container End -->
    </section>
</body>

</html>