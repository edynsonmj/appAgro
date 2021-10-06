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

  <!--mapbox-->
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
  <!--estilos en la raiz del proyecto-->
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <?php $this->load->view("estructura/barraOpciones", $existeSesion);  ?>
  <script>
    mapboxgl.accessToken = 'aqui tu token';
  </script>
  <section class=" section">
    <div class="card">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        Vista Admin editar Eventos
      </h3>
      <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal">
        Agregar Evento
      </button>

      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Nuevo evento</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!--mapa-->
            <h5>Ubicacion del evento</h5>
            <div id='map' style='width: 400px; height: 300px;' class="border rounded-3 border-success">
            </div>
            <p>Elige una ubicacion para tu evento, toca el mapa</p>
            <!--<pre id='coordenadas'></pre>-->
            <!--configuracion del mapa o definicion del mapa-- debe realizarce despues de definir el contenedor del mapa y antes de su modificacion-->
            <script>
              //token publico
              var currentMarkers = [];
              let map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                //coordenadas de popayan
                center: [-76.610102, 2.439890],
                //sum del tamaño del cauca
                zoom: 6.8
              });

              function limpiar() {
                if (currentMarkers !== null) {
                  for (var i = currentMarkers.length - 1; i >= 0; i--) {
                    currentMarkers[i].remove();
                  }
                }
              }
              map.on('click', function(e) {
                //document.getElementById('coordenadas').innerHTML =
                //JSON.stringify(e.lngLat);
                limpiar();
                var marker = new mapboxgl.Marker()
                  .setLngLat(e.lngLat)
                  .setPopup(
                    new mapboxgl.Popup({
                      offset: 25
                    }) // add popups
                  )
                  .addTo(map);
                currentMarkers.push(marker);
                //
                document.getElementById('coord').value = JSON.stringify(e.lngLat);
              });
            </script>

            <!-- Modal body -->
            <div class="modal-body">
              <form method="POST" class="form-inline" action="<?php echo base_url(); ?>index.php/GestionEvento/addEvento">
                <label for="text" class="mr-sm-2">Coordenadas</label>
                <input id="coord" name="coordenadas" type="text" class="form-control mb-2 mr-sm-2" readonly placeholder="Longitud">
                <label for="email" class="mr-sm-2">Nombre del evento:</label>
                <input name="nameEvento" type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre evento">

                <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0 mb-2">Guardar</button>
              </form>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

    </div>
    <div class="card-body">
      <div id="table" class="table-editable">
        <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
        <table class="table table-bordered table-responsive-md table-striped text-center">
          <thead>
            <tr>
              <th class="text-center">Nombre del evento</th>
              <th class="text-center">Longitud</th>
              <th class="text-center">Latitud</th>
            </tr>
          </thead>
          <tbody>
            <?php $var = 0; ?>
            <?php if (count($eventos) > 0) : ?>
              <?php foreach ($eventos as $evento) : ?>
                <tr>
                  <td class="pt-3-half" contenteditable="false"><?php echo $evento->getNombre(); ?></td>
                  <td class="pt-3-half" contenteditable="false"><?php echo $evento->getLongitud(); ?></td>
                  <td class="pt-3-half" contenteditable="false"><?php echo $evento->getLatitud();; ?></td>
                  <td>
                    <span class="table-remove">
                      <form method="POST" action="<?php echo base_url(); ?>index.php/GestionEvento/deleteEvento">
                        <input name="idEvento" type="hidden" class="form-control mb-2 mr-sm-2" value=<?php echo $evento->getId(); ?>>
                        <button onclick="javascript: return confirm('¿estas seguro de eliminar este item?');" type="submit" class="btn btn-danger btn-rounded btn-sm my-0">
                          Eliminar
                        </button>
                      </form>
                      <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal<?php echo $var += 1; ?>">
                        Editar
                      </button>

                      <!-- The Modal -->
                      <div class="modal" id="myModal<?php echo $var; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Editar un evento</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- MAPA PARA LA EDICION-->
                            <h5>Ubicacion del evento</h5>
                            <div id='map<?php echo $var ?>' style='width: 400px; height: 300px;' class="border rounded-3 border-success"></div>
                            <p>Elige una ubicacion para tu evento, toca el mapa</p>

                            <script>
                              //mapboxgl.accessToken = 'pk.eyJ1IjoiZWR5bnNvbm1qIiwiYSI6ImNrdTV6bzBieTBiYm0ycXBhNHd6djkzZXQifQ.yj7fUjvLoQ3Afz94x9fueQ';
                              var map<?php echo $var ?> = new mapboxgl.Map({
                                container: 'map<?php echo $var ?>',
                                style: 'mapbox://styles/mapbox/streets-v11',
                                //coordenadas de popayan
                                center: [-76.610102, 2.439890],
                                //sum del tamaño del cauca
                                zoom: 6.8
                              });

                              map<?php echo $var ?>.on('click', function(e) {
                                //document.getElementById('coordenadas').innerHTML =
                                //JSON.stringify(e.lngLat);
                                limpiar();
                                var marker = new mapboxgl.Marker()
                                  .setLngLat(e.lngLat)
                                  .setPopup(
                                    new mapboxgl.Popup({
                                      offset: 25
                                    }) // add popups
                                  )
                                  .addTo(map<?php echo $var ?>);
                                currentMarkers.push(marker);
                                //
                                document.getElementById('coor<?php echo $var ?>').value = JSON.stringify(e.lngLat);
                              });
                            </script>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <form method="POST" class="form-inline" action="<?php echo base_url(); ?>index.php/GestionEvento/updateEvento">
                                <input name="nameEvento" type="text" class="form-control mb-2 mr-sm-2" value=<?php echo $evento->getNombre(); ?>>
                                <label for="text" class="mr-sm-2">Coordenadas</label>
                                <input id='coor<?php echo $var ?>' readonly name="coordenadas" type="text" class="form-control mb-2 mr-sm-2" value=<?php echo '{"lng":' . $evento->getLongitud() . ',"lat":' . $evento->getLatitud() . '}' ?>>
                                <input name="idEvento" type="hidden" class="form-control mb-2 mr-sm-2" value=<?php echo $evento->getId(); ?>>
                                <label for="text" class="mr-sm-2">Nombre del Evento:</label>
                                <button type="submit" class="btn btn-primary mb-2" onclick="javascript: return confirm('¿estas seguro de actualizar este item');">
                                  Actualizar
                                </button>
                              </form>

                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>

      </div>
      </span>
      </td>
      </tr>
    <?php endforeach; ?>
  <?php else : ?>
    <tr>
      <td> no hay Eventos</td>
    </tr>
  <?php endif; ?>

  </tbody>
  </table>
  </span>
    </div>
    </div>
    </div>
</body>

</html>