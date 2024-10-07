<?php
require "array.php";
require_once "funciones.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>1er Desempeño</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "header.php" ?>
  <!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Paquetes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listado.html">
              <i class="bi bi-circle"></i><span>Disponibles</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>
        Listado de Paquetes de Viajes </h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Paquetes</a></li>
          <li class="breadcrumb-item active">Disponibles</li>


        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Los mas vendidos </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio B/D</th>
                        <th scope="col">Precio B/T</th>
                        <th scope="col">Info Paquetes</th>
                        <th scope="col">Info Pasajes</th>
                        <th scope="col">Total de ventas</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php

                      $total = 0;
                      $sumaI = 0;
                      $sumaN = 0;
                      $contadorI = 0;
                      $contadorN = 0;


                      ?>
                      <?php for ($i = 0; $i < count($viajes); $i++) { ?>

                        <tr>

                          <th scope="row"> <?php echo $i + 1; ?> </th>
                          <th scope="row">
                            <a href="#"><img src="assets/img/<?php echo $viajes[$i]['codigo']; ?>.jpg" data-bs-placement="left" data-bs-toggle="tooltip"
                                data-bs-original-title="1234" /></a>
                            <br />
                            <i class="bi bi-bookmark-star-fill text-<?php echo colorInfo($esInternacional = $viajes[$i]['internacional']) ?> "></i>
                            <?php echo strtoupper($viajes[$i]['nombreDestino']); ?>
                          </th>

                          <td>
                            <a href="#" class="text-primary fw-bold">
                              <?php echo $viajes[$i]['descripcion']; ?>
                            </a>
                          </td>

                          <td>
                            <h6>
                              <span title="Precio Final: <?php echo number_format(precioFinal($esInternacional, $viajes[$i]['precio-usd-bd'], $imp), 2) ?> ">
                                <?php echo "U\$S " . $viajes[$i]['precio-usd-bd'];
                                if ($esInternacional) echo " +  Imp.  U\$S  $imp "; ?></span>
                            </h6>
                          </td>

                          <td>
                            <h6>

                              <?php $precioBt = aplicarDescuento($viajes[$i]['precio-usd-bd'], 0.10, $esInternacional); ?>

                              <span title="Precio Final: <?php echo number_format(precioFinalBt($precioBt, $imp, $esInternacional), 2) ?> ">

                                <?php echo "U\$S " . $precioBt;
                                if ($esInternacional) echo " +  Imp.  U\$S  $imp ";  ?>

                              </span>


                            </h6>
                          </td>

                          <td>
                            <h5>
                              <!-- info paquetes -->



                              <?php $vendidosBD = $viajes[$i]['total-vendidos-bd'];
                              $vendidosBT = $viajes[$i]['total-vendidos-bt'];
                              ?>
                              <?php $paqDisp =  $viajes[$i]['paquetes-disponibles'] ?>

                              <span class="badge border-success border-1 text-<?php echo $color = colorPaquetesVendidos($paquetesVsuma = sumarPaqutesVendidos($viajes[$i]['total-vendidos-bd'], $viajes[$i]['total-vendidos-bt']), $paqDisp) ?>">
                                <?php echo "B/D vendidos: " . $vendidosBD ?> </span>


                              <span class="badge border-success border-1 text-<?php echo $color ?>">
                                <?php echo "B/T vendidos: " . $vendidosBT ?> </span>

                              <span class="badge border-info border-1 text-info" title="Total paquetes vendidos: <?php echo $paquetesVsuma ?>">
                                <?php echo "Paquetes disponibles: " . $paqDisp  ?> </span>

                              <?php

                              if ($esInternacional) {
                                $sumaI += $paquetesVsuma;
                                $contadorI++;
                              } else {
                                $sumaN += $paquetesVsuma;
                                $contadorN++;
                              }

                              ?>
                            </h5>

                          </td>

                          <td>
                            <!-- info pasajes -->
                            <h5>
                              <span class="badge border-info border-1 text-info">
                                <?php echo "B/D Vendidos: " . $totalVendidosBd = $viajes[$i]['total-vendidos-bd'] * 2 ?> </span>

                              <span class="badge border-info border-1 text-info">
                                <?php echo "B/t Vendidos: " . $totalVendidosBt = $viajes[$i]['total-vendidos-bt'] * 3 ?></span>
                              <span class="badge border-info border-1 text-info">
                                <?php echo "Total pasajes vendidos: " . sumarPaqutesVendidos($totalVendidosBd, $totalVendidosBt) ?></php> </span>


                            </h5>




                          </td>

                          <td>
                            <h4>

                              <span class="badge border-info border-1 text-info"
                                title="Precio Final (499 + 169 ) * Cant. Pasajes vendidos (200 )">
                                <?php echo " B/D: U\$S " . $totalVentasBD = totalVentas($viajes[$i]['precio-usd-bd'], $imp, $totalVendidosBd, $esInternacional)  ?> </span>
                              <span class="badge border-info border-1 text-info"
                                title="Precio Final (449.1 + 169 ) * Cant. Pasajes vendidos (60 )">
                                <?php echo " B/T: U\$S " . $totalVentasBt = totalVentas($precioBt, $imp, $totalVendidosBt, $esInternacional)  ?> </span>
                              <span class="badge border-info border-1 text-info" title="(133600 + 37086 ) ">
                                <?php echo "TOTAL U\$S " . $sumaP = sumarPaqutesVendidos($totalVentasBD, $totalVentasBt) ?> </span>
                              <?php $total += $sumaP;  ?>
                            </h4>
                          </td>
                        </tr>

                      <?php }; ?>

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">
                    DESTINOS <span>| Cantidad Internacionales</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $contadorI ?></h6>
                      <h5>Paquetes vendidos: <?php echo $sumaI  ?> </h5>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">
                    DESTINOS <span>| Cantidad Nacionales</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $contadorN ?></h6>
                      <h5>Paquetes vendidos: <?php echo $sumaN ?></h5>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body"><!--  Stock Actual * Precio -->
                  <h5 class="card-title">
                    Total <span>| Final de Ventas</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>U$S <?php echo $total ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>


          </div><!-- End Left side columns -->
        </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php" ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files 2023-->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File 2023-->
  <script src="assets/js/main.js"></script>

</body>

</html>