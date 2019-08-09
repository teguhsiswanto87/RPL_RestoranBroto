<?php
include "../functions.php";
include "../model/Resep.php";

$act = $_GET['act'];
$resep = new Resep();
$conn = dbConnect();
// input modul
if ($act == 'tambah') {
    $id_menu = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_menu']), 0));
    $id_bahan_baku = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_bahan_baku']), 0));
    $jumlah_bahan = $conn->real_escape_string(my_inputformat(anti_injection($_POST['jumlah_bahan']), 0));

    $insert = $resep->insertResep($id_menu, $id_bahan_baku, $jumlah_bahan);
    if ($insert) {
        header("location: ../daftar-menu-resep.php?id=$id_menu");
    } else {
        echo "Gagal Memasukkan data";
    }

} elseif ($act == 'update') {
    $id_menu = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_menu']), 0));
    $kategori = $conn->real_escape_string(my_inputformat(anti_injection($_POST['kategori']), 0));

    $update = $resep->updateResep($id_menu, $kategori);
    if ($update) {
        header("location: ../resep.php");
    } else {
        echo "Gagal memperbarui data";
    }

} elseif ($act == 'hapus') {
    $id_menu = $_GET['id_menu'];
    $id_bahan_baku = $_GET['id_bahan_baku'];

    $delete = $resep->deleteResep($id_menu, $id_bahan_baku);
    if ($delete) {
        header("location: ../daftar-menu-resep.php?id=$id_menu");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>