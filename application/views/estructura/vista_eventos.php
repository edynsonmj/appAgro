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

  <!--mapa mapbox -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
  <link rel="stylesheet" href="./main.css">
</head>
<header>
  <?php $this->load->view("estructura/barraOpciones", $existeSesion);  ?>
</header>

<body>
  <div class="container">

    <?php if (count($eventos) > 0) : ?>
      <?php foreach ($eventos as $evento) : ?>

        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="row">
              <!--columnas dentro de la fila-->
              <div class="col-12 col-lg-9 p-2">
                <!--mapa-->
                <div id="map">
                  <script src="./main.js"></script>
                  <script>
                    const marker = new mapboxgl.Marker()
                      .setLngLat([-76.610102, 2.439890])
                      .addTo(map);
                    const marker2 = new mapboxgl.Marker()
                      .setLngLat([-70.610105, 2.439895])
                      .addTo(map);
                    const lngLat = marker.getLngLat();
                    // Print the marker's longitude and latitude values in the console
                    console.log(`Longitude: ${lngLat.lng}, Latitude: ${lngLat.lat}`);
                  </script>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-3 p-2">
            <article class="card h-100 bg-info text-dark bg-opacity-50">
              <div class="card-body">
                <div>
                  <div class="ps-lg-3">
                    <h2><?php echo $evento->getNombre(); ?></h2>
                  </div>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td> no hay Eventos</td>
        </tr>
      <?php endif; ?>
        </div>
  </div>
</body>

</html>