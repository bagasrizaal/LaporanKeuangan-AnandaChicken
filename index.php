  <?php
  require 'cek-sesi.php';
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/x-icon" href="img/ICON_ANANDACHICKEN.png"/>

    <title>Dashboard - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <?php
  require ('koneksi.php');
  require ('sidebar.php');

  $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
  $karyawan = mysqli_num_rows($karyawan);

  $pengeluaran_hari_ini = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran where tgl_pengeluaran = CURDATE()");
  $pengeluaran_hari_ini = mysqli_fetch_array($pengeluaran_hari_ini);
  
  $pemasukan_hari_ini = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan where tgl_pemasukan = CURDATE()");
  $pemasukan_hari_ini = mysqli_fetch_array($pemasukan_hari_ini);



  $pemasukan=mysqli_query($koneksi,"SELECT * FROM pemasukan");
  while ($masuk=mysqli_fetch_array($pemasukan)){
  $arraymasuk[] = $masuk['jumlah'];
  }
  if( empty($arraymasuk) ){
    $jumlahmasuk = '0';
  }
  else{
    $jumlahmasuk = array_sum($arraymasuk);
  }


  $pengeluaran=mysqli_query($koneksi,"SELECT * FROM pengeluaran");
  while ($keluar=mysqli_fetch_array($pengeluaran)){
  $arraykeluar[] = $keluar['jumlah'];
  }
  
  if( empty($arraykeluar) ){
    $jumlahkeluar = 0;
  }
  else{
    $jumlahkeluar = array_sum($arraykeluar);
  }
  
  $hutang=mysqli_query($koneksi,"SELECT * FROM hutang");
  while ($keluar=mysqli_fetch_array($hutang)){
  $arraykeluar[] = $keluar['jumlah'];
  }
  
  if( empty($arraykeluar) ){
    $jumlahhutang = 0;
  }
  else{
    $jumlahhutang = array_sum($arraykeluar);
  }

  $uang = $jumlahmasuk - ($jumlahkeluar + $jumlahhutang);

  //untuk data chart area



  $sekarang =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
  WHERE tgl_pemasukan = CURDATE()");
  $sekarang = mysqli_fetch_array($sekarang);

  $satuhari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 1 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $satuhari= mysqli_fetch_array($satuhari);

  $duahari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 2 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $duahari= mysqli_fetch_array($duahari);

  $tigahari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 3 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $tigahari= mysqli_fetch_array($tigahari);

  $empathari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 4 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $empathari= mysqli_fetch_array($empathari);

  $limahari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 5 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $limahari= mysqli_fetch_array($limahari);

  $enamhari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 6 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $enamhari= mysqli_fetch_array($enamhari);

  $tujuhhari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $tujuhhari= mysqli_fetch_array($tujuhhari);
  ?>
        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
  <h1> Selamat Datang, <?=$_SESSION['nama']?></h1>

  <?php require 'user.php'; ?>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              <a href="export-semua.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
            </div>

            <!-- Content Row -->
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan (Hari Ini)</div>
                        <?php 
                          if($pemasukan_hari_ini == NULL){
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 0</div>';
                          } else{
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">Rp. '.number_format($pemasukan_hari_ini["0"],2,",",".").'</div>';
                          }
                        ?>
                        <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.< ?=number_format($pemasukan_hari_ini['0'],2,',','.');?></div> -->
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div> &nbsp Mingguan : Rp. 
          <?php
          echo number_format($jumlahmasuk,2,',','.');
          ?>
        </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran (Hari Ini)</div>
                        
                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php
                            if($pengeluaran_hari_ini == NULL){
                              echo '0';
                            } else{
                              echo number_format($pengeluaran_hari_ini["0"],2,",",".");
                            }?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div> &nbsp Mingguan : Rp. <?= number_format($jumlahkeluar,2,',','.'); ?>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sisa Uang</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp. <?=number_format($uang,2,',','.');?></div>
                          </div>   
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>

                 
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Karyawan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$karyawan?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->

            <div class="row">

              <!-- Area Chart -->
              <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pendapatan Minggu Ini</h6>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="chart-area">
                      <canvas id="myAreaChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pie Chart -->
              <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Perbandingan</h6>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Pendapatan
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Pengeluaran
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Sisa
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

  <?php require 'footer.php'?>

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

  <?php require 'logout-modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- library chart -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  // Area Chart Example
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["7 hari lalu","6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "1 hari lalu"],
      datasets: [{
        label: "Pendapatan",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: [
          <?php 
              if( empty($tujuhhari['0']) ){
                echo 0;
              }
              else{
                echo $tujuhhari['0'];
              }
            ?>,
            <?php 
              if( empty($enamhari['0']) ){
                echo 0;
              }
              else{
                echo $enamhari['0'];
              }
            ?>,
            <?php 
              if( empty($limahari['0']) ){
                echo 0;
              }
              else{
                echo $limahari['0'];
              }
            ?>,
            <?php 
              if( empty($empathari['0']) ){
                echo 0;
              }
              else{
                echo $empathari['0'];
              }
            ?>,
            <?php 
              if( empty($tigahari['0']) ){
                echo 0;
              }
              else{
                echo $tigahari['0'];
              }
            ?>,
            <?php 
              if( empty($duahari['0']) ){
                echo 0;
              }
              else{
                echo $duahari['0'];
              }
            ?>,
            <?php 
              if( empty($satuhari['0']) ){
                echo 0;
              }
              else{
                echo $satuhari['0'];
              }
            ?>           
          ],
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return 'Rp.' + number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
          }
        }
      }
    }
  });

    
    </script>
    
    <script type="text/javascript">
    
    // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';
  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Pendapatan", "Pengeluaran", "Sisa"],
      datasets: [{
        data: [<?php echo $jumlahmasuk/1000000 ?>, <?php echo $jumlahkeluar/1000000 ?>, <?php echo $uang/1000000 ?>],
        backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#e74a3b', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

    
    </script>

  </body>

  </html>
