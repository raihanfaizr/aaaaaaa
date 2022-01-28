<?php
session_start();

if(!isset($_SESSION["admin"])){
  header("location: login.php");
}

include_once "../koneksi.php";

$sql = "SELECT * FROM  `users`";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin FIKCLASS 2022</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>

  <body class="app sidebar">

    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">FIKCLASS 2022</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user bg-warning">
        <div>
          <p class="app-sidebar__user-name">Admin</p>
          <p class="app-sidebar__user-designation">FIKCLASS 2022</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Peserta</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Dashboard</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="bg-light">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>NPM</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>Domisili</th>
                      <th>ID Line</th>
                      <th>E-mail</th>
                      <th>No Handphone</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $result = mysqli_query($conn,$sql);

                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['nama']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['npm']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['kelas']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['jurusan']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['domisili']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['idline']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['email']));?></td>
                      <td><?=htmlspecialchars(mysqli_real_escape_string($conn,$row['nohp']));?></td>
                      <td>
                        <a href="ubah.php?id=<?=$row['id']?>"><i class="fas fa-pen"></i></a> | 
                        <a href="hapus.php?id=<?=$row['id']?>" onclick="return confirm('Apakah anda yakin ingin menghapus ini?\n\nData tidak bisa dikembalikan ketika sudah dihapus.');"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    <?php
                    $no++;
                    };
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

  </body>
</html>