<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Bestpos.controller.php");

$bestpos = new BestposController();

if (isset($_POST['add'])) {
    //memanggil add
    $bestpos->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $bestpos->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $bestpos->update($id);
}
else{
    $bestpos->index();
}