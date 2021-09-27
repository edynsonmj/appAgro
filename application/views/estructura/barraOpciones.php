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
</head>

<body>
  <div class="container-fluid">
    <!-- BARRA NAVEGACIÓN -->
    <div class="bg-light">
      <nav class="navbar navbar-expand-md navbar-light bg-light border-3 border-bottom border-primary">
        <div class="container-fluid">
          <a href="#" class="navbar-brand">Agro App</a>
          <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div id="MenuNavegacion" class="collapse navbar-collapse">
          <ul class="navbar-nav ms-3">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url(); ?>index.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/Frontal/Organizacion">Organizaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/Frontal/Ofertas">Ofertas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/Frontal/Inversionistas">Inversionistas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/Frontal/Eventos">Eventos</a>
            </li>

            <?php if ($existeSesion) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Info usuario
              </a>
              <ul class="dropdown-menu">
                <li><label class="dropdown-item" >Nombre</label></li>
                <li><label class="dropdown-item" >Nombre Usuario</ñ></li>
                <li><label class="dropdown-item" >Role</label></li>
              </ul>
            </li>
            <?php } ?>

          </ul>
          <ul class="navbar-nav ms-3">
            <?php if ($existeSesion) { ?>
              <li class="nav-item">
                <a class="nav-link text-nowrap" href="<?php echo base_url(); ?>index.php/Frontal/cerrarsesion">Cerrar Sesion</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link text-nowrap" href="<?php echo base_url(); ?>index.php/Frontal/cargarLogin">Iniciar sesión</a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </nav>
    </div>
    <!--esta linea trae la dinamica necesaria para que se expanda y contraiga la barra de opciones-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>