<?php
include "../functions.php";
include "../model/DetailPesanan.php";

$act = $_GET['act'];
$detailPesanan = new DetailPesanan();
$conn = dbConnect();
// input modul
if ($act == 'tambah') {
    $no_pesanan = $conn->real_escape_string(my_inputformat(anti_injection($_POST['no_pesanan']), 0));
    $id_menu = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_menu']), 0));
    $qty = $conn->real_escape_string(my_inputformat(anti_injection($_POST['qty']), 0));

    $insert = $detailPesanan->insertDetailPesanan($no_pesanan, $id_menu, $qty);
    if ($insert) {
        header("location: ../pesanan-tambah-menu.php?id=$no_pesanan");
    } else {
        echo "Gagal Memasukkan data";
    }

} elseif ($act == 'update') {
    $id_menu = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_menu']), 0));
    $kategori = $conn->real_escape_string(my_inputformat(anti_injection($_POST['kategori']), 0));

    $update = $detailPesanan->updateDetailPesanan($id_menu, $kategori);
    if ($update) {
        header("location: ../detailPesanan.php");
    } else {
        echo "Gagal memperbarui data";
    }

} elseif ($act == 'hapus') {
    $id_menu = $_GET['id_menu'];
    $qty = $_GET['qty'];

    $delete = $detailPesanan->deleteDetailPesanan($id_menu, $qty);
    if ($delete) {
        header("location: ../daftar-menu-detailPesanan.php?id=$id_menu");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>