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
            <li class="nav-item">
                <form href = "<?php echo base_url(); ?>index.php/Principal/cargarLogin">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link">
                    Crear Cuenta 
                </button>
            </form>
            </li>  
          </ul>
        </div>  
      </nav>
    </div>
    <section class=" section">
    </body>
    <header>
        <style>
          #intro {
            background-image: url('../../imagenes/Vegetales7.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
          }
    
          /* Height for devices larger than 576px */
          @media (min-width: 992px) {
            #intro {
              margin-top: -58.59px;
            }
          }
    
          .navbar .nav-link {
            color: #fff !important;
          }
        </style>
    
        <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
          <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand nav-link" target="_blank" href="https://mdbootstrap.com/docs/standard/">

            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
              aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              </ul>
    
              <ul class="navbar-nav d-flex flex-row">
        </nav>
        <div id="intro" class="bg-image shadow-2-strong">
          <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-xl-5 col-md-8">
                  <form method="POST" action="<?php echo base_url();?>index.php/GestionUsuario/autenticacion" class="bg-white  rounded-5 shadow-5-strong p-5">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example1">User name</label>
                      <input name="userName" type="text" id="form1Example0" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example2">Ingrese su contraseña</label>
                      <input name="contraseña" type="password" id="form1Example2" class="form-control" />
                    </div>
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-center">
                      </div>
                    <button type="submit" class="btn btn-primary btn-block">Iniciar sesion </button>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>

      </header>

      <footer class="bg-light text-lg-start">

        <hr class="m-0" />

      </footer>
</html>