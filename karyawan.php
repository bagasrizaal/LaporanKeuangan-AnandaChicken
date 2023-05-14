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

  <link rel="shortcut icon" type="image/x-icon" href="img/ICON_ANANDACHICKEN.png" />

  <title>Data Karyawan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php require 'koneksi.php'; ?>
  <?php require 'sidebar.php'; ?>
  <!-- Main Content -->
  <div id="content">
    <?php $halamanaktif = "Karyawan";?>
    <?php require 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal"
        data-target="#myModalTambah"><i class="fa fa-plus"> Karyawan</i></button><br>

      <!-- Modal -->
      <div id="myModalTambah" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- konten modal-->
          <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Karyawan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->
            <form action="tambah-karyawan.php" method="get">
              <div class="modal-body">
                Nama :
                <input type="text" class="form-control" id="nama" name="nama">
                Posisi :
                <input type="text" class="form-control" id="posisi" name="posisi">
                Alamat :
                <input type="text" class="form-control" id="alamat" name="alamat">
                Umur :
                <input type="text" class="form-control angka" id="umur" name="umur" required="required">
                Email :
                <input type="text" class="form-control" id="kontak" name="kontak" required="required">
                Password baru :
                <input type="password" class="form-control" id="pass" name="pass">
                Ulangi password :
                <input type="password" class="form-control" id="pass_verif" name="pass_verif">
              </div>
              <!-- footer modal -->
              <div class="modal-footer">
                <button type="submit" onclick="return verify()" class="btn btn-success">Tambah</button>
            </form>
            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          </div>
        </div>

      </div>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Karyawan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Alamat</th>
                <th>Umur</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php 
$query = mysqli_query($koneksi,"SELECT * FROM karyawan");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
              <tr>
                <td><?=$data['nama']?></td>
                <td><?=$data['posisi']?></td>
                <td><?=$data['alamat']?></td>
                <td><?=$data['umur']?></td>
                <td><?=$data['kontak']?></td>
                <td>
                  <!-- Button untuk modal -->
                  <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal"
                    data-target="#myModal<?php echo $data['id_karyawan']; ?>"></a>
                </td>
              </tr>
              <!-- Modal Edit Mahasiswa-->
              <div class="modal fade" id="myModal<?php echo $data['id_karyawan']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Ubah Data Karyawan</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="proses-edit-karyawan.php" method="get">

                        <?php
$id = $data['id_karyawan']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id_karyawan='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


                        <input type="hidden" name="id_karyawan" value="<?php echo $row['id_karyawan']; ?>">

                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" id="edit_nama" name="nama" class="form-control"
                            value="<?php echo $row['nama']; ?>">
                        </div>

                        <div class="form-group">
                          <label>Posisi</label>
                          <input type="text" id="edit_posisi" name="posisi" class="form-control"
                            value="<?php echo $row['posisi']; ?>">
                        </div>

                        <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" id="edit_alamat" name="alamat" class="form-control"
                            value="<?php echo $row['alamat']; ?>">
                        </div>

                        <div class="form-group">
                          <label>Umur</label>
                          <input type="text" id="edit_umur" name="umur" class="form-control angka"
                            value="<?php echo $row['umur']; ?>">
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" id="edit_kontak" name="kontak" class="form-control"
                            value="<?php echo $row['kontak']; ?>">
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success" onclick="return verify()">Ubah</button>
                          <a href="hapus-karyawan.php?id_karyawan=<?=$row['id_karyawan'];?>"
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

  <!-- Logout Modal-->
  <?php require 'logout-modal.php';?>

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

  <script type="text/javascript">
    function verify() {
      if (document.getElementById("edit_nama").value == "") {
        alert("Isi nama dahulu");
        return false;
      } else if (document.getElementById("edit_posisi").value == "") {
        alert("Isi nama posisi");
        return false;
      } else if (document.getElementById("edit_alamat").value == "") {
        alert("Isi nama alamat");
        return false;
      } else if (document.getElementById("edit_umur").value == "") {
        alert("Isi nama umur");
        return false;
      } else if (document.getElementById("edit_kontak").value == "") {
        alert("Isi nama kontak");
        return false;
      } else if (document.getElementById("pass").value != document.getElementById("pass_verif").value) {
        alert("Password harus sama");
        return false;
      } else {
        return true;
      }

    }

    function hapusData() {
      var hapus = confirm("Anda yakin ingin menghapus?");
      if (hapus) {
        return true;
      } else {
        return false;
      }
    }
  </script>

  <script language="javascript">
    $('input.kalimat').keyup(function (event) {
      if (event.which >= 37 && event.which <= 40) {
        return;
      }

      $(this).val(function (index, value) {
        return value
          .replace(/([^a-zA-Z\s])/g, "").replace(/([\s]{2,})/g, " ");

      });

    });

    $('input.kalimat').focusout(function (event) {
      if (event.which >= 37 && event.which <= 40) {
        return;
      }

      $(this).val(function (index, value) {
        return value
          .replace(/([^a-zA-Z\s])/g, "").replace(/([\s]{2,})/g, "");

      });

    });

    //saat kursor input field aktif
    $('input.angka').keyup(function (event) {
      if (event.which >= 37 && event.which <= 40) {
        return;
      }

      $(this).val(function (index, value) {
        //menghapus semua karakter yang bukan angka
        return value
          .replace(/([^0-9])/g, "");

      });

    });

    $('input.angka').focusout(function (event) {
      if (event.which >= 37 && event.which <= 40) {
        return;
      }

      $(this).val(function (index, value) {
        //menghapus semua karakter yang bukan angka
        return value
          .replace(/([^0-9])/g, "");

      });

    });
  </script>
</body>

</html>