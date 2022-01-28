<?php
include_once "koneksi.php";

if(isset($_POST['submit'])){
    $nama = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['nama']));
    $npm = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['npm']));
    $kelas = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['kelas']));
    $jurusan = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['jurusan']));
    $domisili = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['domisili']));
    $idline = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['idline']));
    $email = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email']));
    $nohp = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['nohp']));

    $sql = "INSERT INTO `users`(`nama`, `npm`, `kelas`, `jurusan`, `domisili`, `idline`, `email`, `nohp`) VALUES 
            ('$nama','$npm','$kelas','$jurusan','$domisili','$idline','$email','$nohp')";

    $result = mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo"<script>alert('Pendaftaran berhasil !'); location.href='index.php';</script>";
    }else{
        echo"<script>alert('Pendaftaran gagal !');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FIKCLASS 2022</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

		<style>
            .wall-1 {
                padding: 20px 0;
                background: linear-gradient(to bottom right, rgb(0, 0, 0, 0.7), rgb(0, 0, 0, 0.2)), url("./assets/img/wall-1.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: top;
                background-size: cover;
            }
            
            .close-btn{
                text-align: right;
            }

            .close-btn:hover{
                color: rgb(255, 211, 18);
            }

            .registration-form {
                padding: 50px 0;
            }

            .registration-form form {
                background-color: #fff;
                max-width: 800px;
                margin: auto;
                padding: 10px 20px;
                border-radius: 10px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
            }

            form .form-group{
                padding: 0 60px;
            }

            .registration-form .item {
                border-radius: 5px;
                margin-bottom: 15px;
                padding: 10px 20px;
            }

            @media (max-width: 576px) {
                .registration-form form {
                    padding: 10px 20px;
                }

            }
		</style>
    </head>
    <body class="wall-1" style="height:100vh;">

    <div class="container-fluid">

            <div class="registration-form">
                
                <form action="" method="post">
                    <h3 style="text-align: right; margin:0;">
                        <a href="./index.php" style="text-decoration: none; display:inline;" class="text-dark"><span class="close-btn">&times;</span></a>
                    </h3>
                    <div class="text-center form-group">
                        <h4>Form Pendaftaran<span class="text-primary"> FIKLASS</span> 2022</h4>
                        <br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="nama" required placeholder="Nama" name="nama">
                    </div>

                    <div class="form-group row">
                        <div class="col-5">
                            <input type="text" class="form-control item" id="npm" required placeholder="NPM" name="npm" pattern="[0-9]{8}" title="8 angka NPM anda">
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control item" id="kelas" required placeholder="Kelas" name="kelas" pattern="[0-9a-zA-Z]{5}" title="Harus terdiri dari 5 karakter">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control item" id="jurusan" required placeholder="Jurusan" name="jurusan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="domisili" required placeholder="Domisili" name="domisili">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="idline" required placeholder="ID Line" name="idline">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control item" id="email" required placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="nohp" required placeholder="Nomor Handphone" name="nohp" pattern="[0-9]{11,}" title="Tidak diperkenankan menggunakan karakter spesial dan minimal terdiri dari 11 angka">
                    </div>
                    <div class="form-group text-center pb-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg text-dark"><h5 class="m-0">Daftar</h5></button>
                    </div>
                </form>
            </div>

    </div>

        

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    </body>
</html>
