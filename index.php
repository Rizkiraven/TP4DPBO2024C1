<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Dota</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Data Dota</a>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="index.php">Home</a>
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
    <div class="container my-4">
    <div class="col-1 my-3">
        <a type="button" class="btn btn-primary nav-link active" href="create.php">Tambah Baru</a>
    </div>
    <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Hero</th>
        <th>Nama Lain Hero</th>
        <th>Deskripsi</th>
        <th>Tipe</th>
        <th>Posisi Terbaik</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "select * from hero join type on hero.type_id=type.type_id join bestpos on hero.bestpos_id=bestpos.bestpos_id";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[hero_id]</th>
        <td>$row[hero_name]</td>
        <td>$row[hero_altname]</td>
        <td>$row[hero_description]</td>
        <td>$row[type_name]</td>
        <td>$row[bestpos_name]</td>
        <td>
                  <a class='btn btn-success' href='edit.php?id=$row[hero_id]'>Edit</a>
                  <a class='btn btn-danger' href='delete.php?id=$row[hero_id]'>Delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>