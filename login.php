<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" type="image/x-icon" href="img/ICON_ANANDACHICKEN.png"/>

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%);">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-6 col-md-4">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <!-- Nested Row within Card Body -->

                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                  <form class="user" action="proses-login.php" method="post">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password..">
                    </div>
                    <div class="custom-control custom-checkbox small">
                        <!-- <input type="checkbox" class="custom-control-input" id="customCheck"> -->
                        <a href="" data-toggle="modal" data-target="#myModalTambah"><label class="">Daftar Akun</label></a>
                           
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Masuk">
                  </form>
                  <hr>
                </div>

          </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Daftar Akun Baru</h4>
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
        <form action="tambah-karyawan.php" method="get">
            <div class="modal-body">
              Nama : 
              <input type="text" class="form-control kalimat" id="nama" name="nama" required="required">
              Posisi : 
              <input type="text" class="form-control kalimat" id="posisi" name="posisi" required="required">
              Alamat : 
              <input type="text" class="form-control" id="alamat" name="alamat" required="required">
              Umur : 
              <input type="text" class="form-control angka" id="umur" name="umur" required="required">
              Email : 
              <input type="text" class="form-control" id="kontak" name="kontak" required="required">
              Password baru : 
              <input type="password" class="form-control" id="pass" name="pass" required="required">
              Ulangi password : 
              <input type="password" class="form-control" id="pass_verif" name="pass_verif" required="required">
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
        <button type="submit" onclick="return verify()" class="btn btn-success" >Tambah</button>
        </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  
  <script type="text/javascript">
    function verify() {
      if(document.getElementById("pass").value != document.getElementById("pass_verif").value){
        alert("Password harus sama");
        return false;
      }
      else{
        return true;
      }    
    }

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
