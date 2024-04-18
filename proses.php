<?php
include 'database.php';
$db = new Database();

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if ($aksi == "tambah") {
    if(isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['usia'])){
        $db->input($_POST['nama'], $_POST['alamat'], $_POST['usia']);
        header("location: tampil.php");
    } else {
        echo "Form input tidak lengkap";
    }
} elseif ($aksi == "hapus") {
    if(isset($_GET['id'])){
        $db->hapus($_GET['id']);
        header("location: tampil.php");
    } else {
        echo "ID tidak ditemukan";
    }
} elseif ($aksi == "update") {
    if(isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['usia'])){
        $db->update($_POST['id'], $_POST['nama'], $_POST['alamat'], $_POST['usia']);
        header("location: tampil.php");
    } else {
        echo "Form input tidak lengkap";
    }
} else {
    echo "Aksi tidak valid";
}
?>
