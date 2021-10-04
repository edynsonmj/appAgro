<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Welcome to CodeIgniter</title>
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
  <!--estilos en la raiz del proyecto-->
  <link rel="stylesheet" href="main.css">
  <?php $this->load->view("estructura/barraOpciones"); ?>
</head>

<body>
  <div class="container">
    <div class="col-12 col-lg-12">
      <div class="row">

        <!--primera columna, pertenece al mapa-->
        <div class="col-12 col-lg-6 p-2">
          <h2>Mapa de eventos</h2>
          <!--contenedor del mapa-->
          <div id='map' style='width: 400px; height: 300px;' class="border rounded-3 border-success">
          </div>
          <p>toca un marcador para conocer mas de el...</p>
        </div>

        <!--configuracion del mapa o definicion del mapa-- debe realizarce despues de definir el contenedor del mapa y antes de su modificacion-->
        <script>
          //token publico
          mapboxgl.accessToken = 'pk.eyJ1IjoiZWR5bnNvbm1qIiwiYSI6ImNrdTV6bzBieTBiYm0ycXBhNHd6djkzZXQifQ.yj7fUjvLoQ3Afz94x9fueQ';
          let map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            //coordenadas de popayan
            center: [-76.610102, 2.439890],
            //sum del tamaño del cauca
            zoom: 6.8
          });
        </script>

        <div class="col-12 col-lg-3 p-2">
          <!--control de datos y obtencion de ellos-->
          <?php if (count($eventos) > 0) : ?>
            <h2>Lista eventos</h2>
            <?php
            //sera usada esta variable para nombrar a las distintas marcas a generar en el mapa.
            $numMarcas = 0;
            ?>
            <?php foreach ($eventos as $evento) : ?>
              <div class="p-1">
                <article class="card bg-info text-dark bg-opacity-50">
                  <div class="card-body">
                    <h4><?php echo $evento->getNombre(); ?></h4>
                  </div>
                </article>
              </div>
              <!--modificacion del mapa, agregacion de marcas con logitud y latitud mas etiquetas sobre las marcas con sus nombres-->
              <!--hace uso de los estilos main.css que se encuentran en la raiz-->
              <script>
                //para añadir una nueva marca, se debe establecer un nuevo nombre para ella
                //de lo contrario solo se reescribe. acontinuacion se concatena un numero al nombre para que cambie con cada evento a marcar
                const marker<?php echo $numMarcas; ?> = new mapboxgl.Marker()
                  .setLngLat([<?php echo $evento->getLongitud(); ?>, <?php echo $evento->getLatitud(); ?>])
                  .setPopup(
                    new mapboxgl.Popup({
                      offset: 25
                    }) // add popups
                    .setHTML(`<h3><?php echo $evento->getNombre() ?></h3>`)
                  )
                  .addTo(map);
              </script>


              <?php
              //la variable debe ser incrementada.
              $numMarcas += 1;
              ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
</body>

</html>