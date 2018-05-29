<!doctype html>
<?php include '../Partials/head.php';?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">

</style>
<script src="Highcharts/code/highcharts.js"></script>
<script src="Highcharts/code/modules/exporting.js"></script>
<script src="Highcharts/code/modules/export-data.js"></script>
<?php

  //<h1>Bienvenido  <?php  echo $_SESSION["usuario"]["nombre"]; </h1>
if (isset($_SESSION["usuario"]))
{
  if($_SESSION["usuario"]["id_perfil"]==2)
  {
    header("location:../Usuario/index.php");
  }
}
else
{
  header ("location:../Login/login.php");
}

 ?>
<?php include '../Partials/menu.php'; ?>


      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">

          <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        <script type="text/javascript">


        // Make monochrome colors
        var pieColors = (function () {
            var colors = [],
                base = Highcharts.getOptions().colors[0],
                i;

            for (i = 0; i < 10; i += 1) {
                // Start out with a darkened base color (negative brighten), and end
                // up with a much brighter color
                colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
            }
            return colors;
        }());

        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Estadistica de modo de pago'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    colors: pieColors,
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                        distance: -50,
                        filter: {
                            property: 'percentage',
                            operator: '>',
                            value: 4
                        }
                    }
                }
            },
            series: [{
                name: 'Modos de pago',
                data: [
                  <?php
                  include_once '../../Controlador/ProductoControladoor.php';
                  $resultado = ProductoControlador::prodModoPago();
                  foreach ($resultado as $res):
                  ?>
                    { name: '<?php echo $res['nombre']; ?>', y: <?php echo $res['total']; ?> },
                          <?php endforeach ?>


                ]
            }]
        });
        	</script>







          </div>

          <!--<div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">-->
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <div id="cliente" style="min-width: 510px; height: 400px; margin: 0 auto"></div>

          <script type="text/javascript">

                  // Create the chart
                  Highcharts.chart('cliente', {
                      chart: {
                          type: 'column'
                      },
                      title: {
                          text: 'Reporte ventas por cliente'
                      },
                      subtitle: {
                          text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                      },
                      xAxis: {
                          type: 'category'
                      },
                      yAxis: {
                          title: {
                              text: 'Cantidad'
                          }

                      },
                      legend: {
                          enabled: false
                      },
                      tooltip: {

                          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> ({point.percentage:.0f}%) of total<br/>',
                          shared: true

                      },
                      plotOptions: {

                          series: {
                              borderWidth: 0,
                              dataLabels: {
                                  enabled: true,
                                  format: '${point.y:.0f}'
                              }
                          }
                      },



                      "series": [
                          {
                              "name": "Browsers",
                              "colorByPoint": true,
                              "data": [

                                <?php
                                include_once '../../Controlador/ProductoControladoor.php';
                                $resultado = ProductoControlador::ventasXCliete();
                                foreach ($resultado as $res):
                                ?>
                                  { "name": '<?php echo $res['nombre_usuario2']." ". $res['apellido_usuario2']; ?>',
                                    "y": <?php echo $res['total']; ?>,
                                    "drilldown": '<?php echo $res['nombre_usuario2']." ". $res['apellido_usuario2']; ?>'

                                  },
                                        <?php endforeach ?>

                              ]
                          }
                      ],

                  });
                  		</script>

                      <div id="porcentajeVentas" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <script type="text/javascript">


                    // Make monochrome colors
                    var pieColors = (function () {
                        var colors = [],
                            base = Highcharts.getOptions().colors[0],
                            i;

                        for (i = 0; i < 10; i += 1) {
                            // Start out with a darkened base color (negative brighten), and end
                            // up with a much brighter color
                            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                        }
                        return colors;
                    }());

                    // Build the chart
                    Highcharts.chart('porcentajeVentas', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Estadistica ventas por cliente'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                colors: pieColors,
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                    distance: -50,
                                    filter: {
                                        property: 'percentage',
                                        operator: '>',
                                        value: 4
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Porcenaje de ventas',
                            data: [



                                      <?php
                                      include_once '../../Controlador/ProductoControladoor.php';
                                      $resultado = ProductoControlador::ventasXCliete();
                                      foreach ($resultado as $res):
                                      ?>
                                        { name: '<?php echo $res['nombre_usuario2']." ". $res['apellido_usuario2']; ?>',
                                          y: <?php echo $res['total']; ?>
                                        },
                                              <?php endforeach ?>

                            ]
                        }]
                    });
                      </script>


          </div>


          <!-- <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">Updates</h2>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                Non dolore elit adipisicing ea reprehenderit consectetur culpa.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                <h3>View options</h3>
                <ul>
                  <li>
                    <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox1" class="mdl-checkbox__input">
                      <span class="mdl-checkbox__label">Click per object</span>
                    </label>
                  </li>
                  <li>
                    <label for="chkbox2" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox2" class="mdl-checkbox__input">
                      <span class="mdl-checkbox__label">Views per object</span>
                    </label>
                  </li>
                  <li>
                    <label for="chkbox3" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox3" class="mdl-checkbox__input">
                      <span class="mdl-checkbox__label">Objects selected</span>
                    </label>
                  </li>
                  <li>
                    <label for="chkbox4" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox4" class="mdl-checkbox__input">
                      <span class="mdl-checkbox__label">Objects viewed</span>
                    </label>
                  </li>
                </ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Change location</a>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">location_on</i>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div> -->


<?php include '../Partials/footer.php'; ?>
