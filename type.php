<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Type.controller.php");

$type = new TypeController();

if (isset($_POST['add'])) {
    //memanggil add
    $type->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $type->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $type->update($id);
}
else{
    $type->index();
}