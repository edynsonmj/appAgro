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
    <nav style="height: 20em; background-image: url('../../imagenes/Vegetales.jpg') !important;
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
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href = "vista_inicio_sesion.html">Iniciar sesion</a></button>
            </li> 
          </ul>
        </div>  
      </nav>
    </div>
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

          <div class="row">
    
            <!-- Grid column -->
            <div style="display: flex; flex-wrap: wrap; width: 550px;" class="col-lg-5 mb-lg-0 pb-lg-3 mb-4">
    
              <div class="card">
                <div class="card-body">
                    <img style ='width: 500px; height: 500px;' src = '../../imagenes/Organizacion.jpg'>
                </div>
                <a style = "text-align: center;">Agrocauca </a>
                <a style ="text-align: center;">3125864584</a>
              </div>
            </div>

            <div class="col-lg-7">
    
              <!--Google map-->
              <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
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
            <!-- Grid column -->
    
          </div>
          <!-- Grid row -->
</body>

</html>