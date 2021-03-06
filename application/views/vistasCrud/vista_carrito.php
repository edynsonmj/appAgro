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
              <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#">productos Canasta</button>
            </li>
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#">Organizaciones</button>
            </li>
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#">Ofertas</button>
            </li>    
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#">Inversionistas</button>
            </li>  
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#">Eventos</button>
            </li>  
            <li class="nav-item">
                <button style = " background:rgb(54, 54, 216);color: white; border: white solid" class="nav-link" href="#">Iniciar sesion</button>
            </li>  
          </ul>
        </div>  
      </nav>
    </div>
    <section class=" section">
    </body>
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
          Mi carrito 
        </h3>
        <div class="card-body">
          <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"
              ><a href="#!" class="text-success"
                ><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a
            ></span>
            <table class="table table-bordered table-responsive-md table-striped text-center">
              <thead>
                <tr>
                  <th class="text-center">Nombre del producto</th>
                  <th class="text-center">Precio/L</th>
                  <th class="text-center">Cantidad/L</th>
                </tr>
              </thead>
              <tbody>
              <?php if (count($compras) > 0): ?>
              <?php foreach ($compras as $compra): ?>
                <tr>
                  <td class="pt-3-half" contenteditable="true"><?php $compra->getNombre(); ?></td>
                  <td class="pt-3-half" contenteditable="true"><?php $compra->getPrecio(); ?></td>
                  <td class="pt-3-half" contenteditable="true"><?php $compra->getCantidad(); ?></td>

                  <td class="pt-3-half">
                    <span class="table-up"
                      ><a href="#!" class="indigo-text"
                        ><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a
                    ></span>
                    <span class="table-down"
                      ><a href="#!" class="indigo-text"
                        ><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a
                    ></span>
                  </td>
                  <td>
                    <span class="table-remove"
                      ><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                        Eliminar producto
                      </button></span
                    >
                  </td>
                </tr>
              <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td> no hay Compras</td>
                </tr>
              <?php endif; ?>
              </tbody>
            </table>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                Atras
              </button>
            </span>
            <span style="float: right;" class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                Comprar
              </button>
            </span>
          </div>
        </div>
      </div>
</html>