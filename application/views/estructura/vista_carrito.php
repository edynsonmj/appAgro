<!DOCTYPE html>
<html style='overflow-x: hidden;' lang="en">

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

<body>


  <section class=" section">
</body>
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
    Mi carrito
  </h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Nombre del producto</th>
            <th class="text-center">Precio/L</th>
            <th class="text-center">Cantidad/L</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($compras) > 0) : ?>
            <?php foreach ($compras as $compra) : ?>
              <tr>
                <td class="pt-3-half" contenteditable="false"><?php echo $compra[1]->getNombre(); ?></td>
                <td class="pt-3-half" contenteditable="false"><?php echo $compra[1]->getPrecio(); ?></td>
                <td class="pt-3-half" contenteditable="false"><?php echo $compra[1]->getCantidad(); ?></td>

                <td class="pt-3-half">
                  <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                  <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                </td>
                <td>
                  <span class="table-remove">
                    <form method="POST" action="<?php echo base_url(); ?>index.php/GestionCarrito/deleteItemCarrito">
                      <input name="id" type="hidden" value=<?php echo $compra[0]; ?>>
                      <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"> Eliminar producto</button>
                    </form>
                  </span>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <td>
              no hap elementos
            </td>
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