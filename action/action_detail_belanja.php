<?php
include "../functions.php";
include "../model/DetailBelanja.php";

$act = $_GET['act'];
$detailBelanja = new DetailBelanja();
$conn = dbConnect();
// input modul
if ($act == 'tambah') {
    $id_belanja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_belanja']), 0));
    $id_bahan_baku = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_bahan_baku']), 0));
    $qty = $conn->real_escape_string(my_inputformat(anti_injection($_POST['qty']), 0));
    $satuan = $conn->real_escape_string(my_inputformat(anti_injection($_POST['satuan']), 1));
    $tgl_kadaluarsa = $conn->real_escape_string(my_inputformat(anti_injection($_POST['tgl_kadaluarsa']), 0));
    $harga = $conn->real_escape_string(my_inputformat(anti_injection($_POST['harga']), 0));

    //cek apakah nomer detailBelanja sudah ada
    $insert = $detailBelanja->insertDetailBelanja($id_belanja, $id_bahan_baku, $harga, $qty, $satuan, $tgl_kadaluarsa);
    if ($insert) {
        header("location: ../belanjaan-tambah-detail.php?id=$id_belanja");
    } else {
        echo "Gagal Memasukkan data";
    }

} elseif ($act == 'update') {
    $id_detailBelanja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_detailBelanja']), 0));
    $tgl_kadaluarsa = $conn->real_escape_string(my_inputformat(anti_injection($_POST['tgl_kadaluarsa']), 0));

    $update = $detailBelanja->updateDetailBelanja($id_detailBelanja, $tgl_kadaluarsa);
    if ($update) {
        header("location: ../detailBelanja.php");
    } else {
        echo "Gagal memperbarui data";
    }

} elseif ($act == 'hapus') {
    $delete = $detailBelanja->deleteDetailBelanja($_GET['id']);
    if ($delete) {
        header("location: ../detailBelanja.php");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>