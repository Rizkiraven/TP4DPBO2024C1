<?php
include "connection.php";
if (isset($_POST['submit'])) {
  $hero_name = $_POST['tname'];
  $hero_altname = $_POST['taltname'];
  $hero_description = $_POST['tdescription'];
  $type_id = $_POST['ttype'];
  $bestpos_id = $_POST['tbestpos'];
  $sql = " INSERT INTO `hero`(`tname`, `taltname`, `tdescription`, `ttype`, `tbestpos`) VALUES ( '$hero_name', '$hero_altname', '$hero_description', '$type_id', '$bestpos_id')";

  $query = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah Hero</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="styles/jquery.min.js"></script>
  <script src="styles/popper.min.js"></script>
  <script src="styles/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Data Dota</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="type.php">Type</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="bestpos.php">Best Position</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="col-lg-6 m-auto">

    <form method="post">

      <br><br>
      <div class="card">

        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Tambah Hero Baru </h1>
        </div><br>

        <label> Nama: </label>
        <input type="text" name="hero_name" class="form-control"> <br>

        <label> Nama Lain: </label>
        <input type="text" name="hero_altname" class="form-control"> <br>

        <label> Deskripsi: </label>
        <input type="text" name="hero_description" class="form-control"> <br>

        <label for="ttype">Tipe</label>
        <select class="custom-select form-control" name="cmbtype">
          <option selected>Open this select menu</option>
          OPTION
        </select> <br>

        <label for="tbestpos">Posisi Terbaik</label>
        <select class="custom-select form-control" name="cmbbestpos">
          <option selected>Open this select menu</option>
          OPTION2
        </select> <br>

        <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

      </div>
    </form>
  </div>
</body>

</html>