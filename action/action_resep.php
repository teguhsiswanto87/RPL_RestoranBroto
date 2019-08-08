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
    $jumlah = $conn->real_escape_string(my_inputformat(anti_injection($_POST['jumlah']), 0));

    $insert = $resep->insertResep($id_menu, $id_bahan_baku, $jumlah);
    if ($insert) {
        header("location: ../daftar-resep.php");
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
    $delete = $resep->deleteResep($_GET['id']);
    if ($delete) {
        header("location: ../daftar-resep.php?id=$_GET[id]");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>