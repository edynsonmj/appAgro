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
    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    
        <nav style="height: 20em; background-image: url('../../imagenes/Vegetales2.jpg') !important;
        background-position: center;" class="navbar navbar-expand-lg navbar-light bg-light">
            <a style="background:rgb(54, 54, 216);color: white; border: white solid; color:white; position:relative; bottom: 42%;" class="navbar-brand" href="#">Agrocauca</a>
            <button style="background-color: blue; border: cornsilk; position: relative; top: -40%; color: white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                    <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#"><a style = "color: white; text-decoration: none;" href=" <?php echo base_url();?>index.php/Principal/cargarLogin">Iniciar sesion</a></button>
                </li>  
              </ul>
            </div>  
            
        </nav>
    </body>
    <header>
        <style>
          #intro {
            background-image: url('../../imagenes/Vegetales8.jpg');
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
                  <form method="POST" action="<?php echo base_url();?>index.php/GestionUsuario/crearUsuario" class="bg-white  rounded-5 shadow-5-strong p-5">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example1">Ingrese su nombre</label>
                      <input type="nombre" id="form1Example1" class="form-control" />

                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example1">Ingrese su nombre de usuario</label>
                      <input type="userName" id="form1Example1" class="form-control" />

                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example2">Ingrese su contrase??a</label>
                      <input type="password" id="form1Example2" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example2">Ingrese admin o noAdmin</label>
                      <input type="rol" id="form1Example2" class="form-control" />

                    </div>
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-center">
                      </div>
                    <button type="submit" class="btn btn-primary btn-block">Crear cuenta </button>
               
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