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

  <title>Pendapatan - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
  require 'koneksi.php';
  require('sidebar.php'); 
  
  $sekarang = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
  WHERE tgl_pemasukan = CURDATE()");
  $sekarang = mysqli_fetch_array($sekarang);

  $satuhari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan 
  WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 1 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $satuhari = mysqli_fetch_array($satuhari);

  $duahari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan 
  WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 2 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $duahari = mysqli_fetch_array($duahari);

  $tigahari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
  WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 3 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $tigahari = mysqli_fetch_array($tigahari);

  $empathari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan 
  WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 4 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $empathari = mysqli_fetch_array($empathari);

  $limahari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan 
  WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 5 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $limahari = mysqli_fetch_array($limahari);

  $enamhari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan 
  WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 6 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $enamhari = mysqli_fetch_array($enamhari);

  $tujuhhari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan 
  WHERE tgl_pemasukan = DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
  $tujuhhari = mysqli_fetch_array($tujuhhari);
  ?>
  <!-- Main Content -->
  <div id="content">

    <?php $halamanaktif = "Pendapatan";?>
    <?php require('navbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Content Row -->
      <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

          <!-- Project Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sumber Pendapatan</h6>
            </div>
            <div class="card-body">
              <?php
              $namasumber1 = mysqli_query($koneksi, "SELECT * FROM `sumber` where id_sumber= 1 ");
              $sumbern1 = mysqli_fetch_assoc($namasumber1);

              $namasumber2 = mysqli_query($koneksi, "SELECT * FROM `sumber` where id_sumber= 2 ");
              $sumbern2 = mysqli_fetch_assoc($namasumber2);

              $namasumber3 = mysqli_query($koneksi, "SELECT * FROM `sumber` where id_sumber= 3 ");
              $sumbern3 = mysqli_fetch_assoc($namasumber3);

              $namasumber4 = mysqli_query($koneksi, "SELECT * FROM `sumber` where id_sumber= 4 ");
              $sumbern4 = mysqli_fetch_assoc($namasumber4);

              $namasumber5 = mysqli_query($koneksi, "SELECT * FROM `sumber` where id_sumber= 5 ");
              $sumbern5 = mysqli_fetch_assoc($namasumber5);

              $hasil1 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 1");
              while ($jumlah1 = mysqli_fetch_array($hasil1)) {
                $arrayhasil1[] = $jumlah1['jumlah'];
              }

              if (empty($arrayhasil1)) {
                $jumlahhasil1 = '0';
              } else {
                $jumlahhasil1 = array_sum($arrayhasil1);
              }

              $hasil2 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 2");
              while ($jumlah2 = mysqli_fetch_array($hasil2)) {
                $arrayhasil2[] = $jumlah2['jumlah'];
              }
              if (empty($arrayhasil2)) {
                $jumlahhasil2 = '0';
              } else {
                $jumlahhasil2 = array_sum($arrayhasil2);
              }

              $hasil3 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 3");
              while ($jumlah3 = mysqli_fetch_array($hasil3)) {
                $arrayhasil3[] = $jumlah3['jumlah'];
              }
              if (empty($arrayhasil3)) {
                $jumlahhasil3 = '0';
              } else {
                $jumlahhasil3 = array_sum($arrayhasil3);
              }

              $hasil4 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 4");
              while ($jumlah4 = mysqli_fetch_array($hasil4)) {
                $arrayhasil4[] = $jumlah4['jumlah'];
              }
              if (empty($arrayhasil4)) {
                $jumlahhasil4 = '0';
              } else {
                $jumlahhasil4 = array_sum($arrayhasil4);
              }

              $hasil5 = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_sumber = 5");
              while ($jumlah5 = mysqli_fetch_array($hasil5)) {
                $arrayhasil5[] = $jumlah5['jumlah'];
              }
              if (empty($arrayhasil5)) {
                $jumlahhasil5 = '0';
              } else {
                $jumlahhasil5 = array_sum($arrayhasil5);
              }

              $sumber1 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan where id_sumber ='1'");
              $sumber1text = mysqli_num_rows($sumber1);
              $sumber1 = mysqli_num_rows($sumber1);
              $sumber1 = $sumber1 * 10;

              $sumber2 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan where id_sumber ='2'");
              $sumber2text = mysqli_num_rows($sumber2);
              $sumber2 = mysqli_num_rows($sumber2);
              $sumber2 = $sumber2 * 10;

              $sumber3 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan where id_sumber ='3'");
              $sumber3text = mysqli_num_rows($sumber3);
              $sumber3 = mysqli_num_rows($sumber3);
              $sumber3 = $sumber3 * 10;

              $sumber4 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan where id_sumber ='4'");
              $sumber4text = mysqli_num_rows($sumber4);
              $sumber4 = mysqli_num_rows($sumber4);
              $sumber4 = $sumber4 * 10;

              $sumber5 = mysqli_query($koneksi, "SELECT id_sumber FROM pemasukan where id_sumber ='5'");
              $sumber5text = mysqli_num_rows($sumber5);
              $sumber5 = mysqli_num_rows($sumber5);
              $sumber5 = $sumber5 * 10;



              $no = 1;
              echo '
                  <h4 class="small font-weight-bold">' . $sumbern1['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil1, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:' . $sumber1 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber1text . ' Kali</div>
                  </div>
				  <h4 class="small font-weight-bold">' . $sumbern2['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil2, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:' . $sumber2 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber2text . ' Kali</div>
                  </div>
				  <h4 class="small font-weight-bold">' . $sumbern3['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil3, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width:' . $sumber3 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber3text . ' Kali</div>
                  </div>
				  <h4 class="small font-weight-bold">' . $sumbern4['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil4, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $sumber4 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber4text . ' Kali</div>
                  </div>
				  <h4 class="small font-weight-bold">' . $sumbern5['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil5, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width:' . $sumber5 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber5text . ' Kali</div>
                  </div>';
              ?>
            </div>
          </div>
        </div>

        <!-- catatan pendapatan -->
        <div class="col-lg-6">
          <!-- Collapsable Card Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
              aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Catatan</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <?php
                $catatan = mysqli_query($koneksi, "SELECT catatan FROM catatan where id_catatan= 1");
                $catatan = mysqli_fetch_array($catatan);
                echo $catatan['catatan'];

                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-toggle="modal"
                  data-target="#editCatatan">Edit</button>
              </div>
            </div>
          </div>

        </div>

        <!-- Edit Catatan -->
        <div id="editCatatan" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- heading  -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Catatan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- body  -->
              <form action="proses-edit-catatan.php" method="get">
                <div class="modal-body">
                  <textarea class="form-control" id="input_catatan"
                    name="input_catatan"><?php echo $catatan["catatan"] ?></textarea>
                </div>
                <!-- footer  -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Tambah</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
          <hr>
        </div>
      </div>
    </div>

        <!-- DataTales Example -->
        <div class="col-xl-8 col-lg-7">
          <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal"
            data-target="#myModalTambah"><i class="fa fa-plus"> Pemasukan</i></button><br>

            <!-- Modal -->
            <div id="myModalTambah" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- konten modal-->
                        <div class="modal-content">
                          <!-- heading modal -->
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Pemasukan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- body modal -->
                          <form action="tambah-pendapatan.php" method="get">
                            <div class="modal-body">
                              Tanggal :
                              <input type="date" class="form-control" name="tgl_pemasukan" required="required">
                              Jumlah :
                              <input type="text" id="jumlah_input_masuk" class="form-control angka" name="jumlah" required="required">
                              Sumber :
                              <select class="form-control" name="sumber" id="sumber">
                                <option value="none" selected hidden>---pilih---</option>
                                <option value="1">1. Ayam Utuh</option>
                                <option value="2">2. Ayam Potong</option>
                                <option value="3">3. Ati Ampela</option>
                                <option value="4">4. Usus</option>
                                <option value="5">5. Kepala Ayam dan Ceker</option>
                              </select>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                              <button type="submit" onclick="return validasi()" class="btn btn-success">Tambah</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi Masuk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <!-- <th>ID Pemasukan</th> -->
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Sumber</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM pemasukan");
                  $no = 1;
                  
                  while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                      <!-- <td>< ?= $data['id_pemasukan'] ?></td> -->
                      <td>
                        <?= $data['tgl_pemasukan'] ?>
                      </td>
                      <td>Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>
                      <td>
                        <?php
                          $id_sumber = $data["id_sumber"];
                          $querysumber = mysqli_query($koneksi, "SELECT * FROM sumber where id_sumber ='$id_sumber'");
                          $nama_sumber = mysqli_fetch_array($querysumber);
                          echo $nama_sumber["nama"];
                          
                        ?>
                      </td>
                      <td>
                        <!-- Button untuk modal -->
                        <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal"
                          data-target="#myModal<?php echo $data['id_pemasukan']; ?>"></a>
                      </td>
                    </tr>
                    <!-- Modal Edit Mahasiswa-->
                    <div class="modal fade" id="myModal<?php echo $data['id_pemasukan']; ?>" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Ubah Data pemasukan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <form role="form" action="proses-edit-pemasukan.php" method="get">

                              <?php
                              $id = $data['id_pemasukan'];
                              $query_edit = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_pemasukan='$id'");
                              //$result = mysqli_query($conn, $query);
                              while ($row = mysqli_fetch_array($query_edit)) {
                                ?>


                                <input type="hidden" name="id_pemasukan" value="<?php echo $row['id_pemasukan']; ?>">

                                <div class="form-group">
                                  <label>Id</label>
                                  <input type="text" name="id_pemasukan" class="form-control"
                                    value="<?php echo $row['id_pemasukan']; ?>" disabled>
                                </div>

                                <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" name="tgl_pemasukan" class="form-control"
                                    value="<?php echo $row['tgl_pemasukan']; ?>">
                                </div>

                                <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="text" name="jumlah" class="form-control angka"
                                    value="<?php echo $row['jumlah']; ?>">
                                </div>
                                
                                <div class="form-group" >
                                  <label>Sumber</label>
                                  <?php
                                  if ($row['id_sumber'] == 1) {
                                    $querynama = mysqli_query($koneksi, "SELECT * FROM sumber where id_sumber=1");
                                    $querynama = mysqli_fetch_array($querynama);
                                  } else if ($row['id_sumber'] == 2) {
                                    $querynama = mysqli_query($koneksi, "SELECT * FROM sumber where id_sumber=2");
                                    $querynama = mysqli_fetch_array($querynama);
                                  } else if ($row['id_sumber'] == 3) {
                                    $querynama = mysqli_query($koneksi, "SELECT * FROM sumber where id_sumber=3");
                                    $querynama = mysqli_fetch_array($querynama);
                                  } else if ($row['id_sumber'] == 4) {
                                    $querynama = mysqli_query($koneksi, "SELECT * FROM sumber where id_sumber=4");
                                    $querynama = mysqli_fetch_array($querynama);
                                  } else if ($row['id_sumber'] == 5) {
                                    $querynama = mysqli_query($koneksi, "SELECT * FROM sumber where id_sumber=5");
                                    $querynama = mysqli_fetch_array($querynama);
                                  }
                                  ?>

                                  <select class="form-control"  name='id_sumber'>
                                      <option value=" <?php echo $row["id_sumber"] ?>"selected hidden> <?php echo $row["id_sumber"] ?>.<?php echo $querynama["nama"]?></option>

                                      <?php
                                      $queri = mysqli_query($koneksi, "SELECT * FROM sumber WHERE id_sumber < 6");
                                      $no = 1;
                                      $noo = 1;
                                      while ($querynama = mysqli_fetch_assoc($queri)) {

                                        echo '<option value="' . $querynama["id_sumber"] . '">' . $querynama["id_sumber"] . '.' . $querynama["nama"] . '</option>';
                                        
                                      }
                                      ?>
                                  </select>
                                </div>

                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-success">Ubah</button>
                                  <a href="hapus-pemasukan.php?id_pemasukan=<?= $row['id_pemasukan']; ?>"
                                    onclick="return hapusData()" class="btn btn-danger">Hapus</a>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                </div>
                                <?php
                              }
                              //mysql_close($host);
                              ?>

                            </form>
                          </div>
                        </div>

                      </div>
                    </div>


                    <?php
                  }
                  ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <?php require 'footer.php' ?>

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- Chart -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <script type="text/javascript" >
    function validasi() {
      if(document.getElementById("sumber").value=="none"){
        alert("Pilih sumber!");
        return false;
      }
      else{
        return true;
      }
    }
    function hapusData(){
      var hapus = confirm("Anda yakin ingin menghapus?");
      if (hapus) {
        return true;
      }else{
        return false;
      }
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
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
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["7 hari lalu", "6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "1 hari lalu"],
        datasets: [{
          label: "Pemasukan",
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
          data: [<?php
          if (empty($tujuhhari['0'])) {
            echo 0;
          } else {
            echo $tujuhhari['0'];
          }
          ?>,
            <?php
            if (empty($enamhari['0'])) {
              echo 0;
            } else {
              echo $enamhari['0'];
            }
            ?>,
            <?php
            if (empty($limahari['0'])) {
              echo 0;
            } else {
              echo $limahari['0'];
            }
            ?>,
            <?php
            if (empty($empathari['0'])) {
              echo 0;
            } else {
              echo $empathari['0'];
            }
            ?>,
            <?php
            if (empty($tigahari['0'])) {
              echo 0;
            } else {
              echo $tigahari['0'];
            }
            ?>,
            <?php
            if (empty($duahari['0'])) {
              echo 0;
            } else {
              echo $duahari['0'];
            }
            ?>,
            <?php
            if (empty($satuhari['0'])) {
              echo 0;
            } else {
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
              callback: function (value, index, values) {
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
          // tooltip: saat mouse hover 
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
          }
        }
      }
    }
});
  </script>

<script language="javascript">
    $('input.kalimat').keyup(function(event){
    if(event.which >= 37 && event.which <= 40){return;}
    
      $(this).val(function(index, value){
        return value
        .replace(/([^a-zA-Z\s])/g,"").replace(/([\s]{2,})/g," ");
        
      });
    
    });

    $('input.kalimat').focusout(function(event){
    if(event.which >= 37 && event.which <= 40){return;}
    
      $(this).val(function(index, value){
        return value
        .replace(/([^a-zA-Z\s])/g,"").replace(/([\s]{2,})/g,"");
        
      });
    
    });

    //saat kursor input field aktif
    $('input.angka').keyup(function(event){
    if(event.which >= 37 && event.which <= 40){return;}

    $(this).val(function(index, value){
        //menghapus semua karakter yang bukan angka
        return value
        .replace(/([^0-9])/g,"");
        
      });
    
    });

    $('input.angka').focusout(function(event){
    if(event.which >= 37 && event.which <= 40){return;}

    $(this).val(function(index, value){
        //menghapus semua karakter yang bukan angka
        return value
        .replace(/([^0-9])/g,"");
        
      });

    });
  </script>
</body>

</html>