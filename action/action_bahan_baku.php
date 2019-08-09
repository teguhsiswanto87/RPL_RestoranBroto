<?php
include "../functions.php";
include "../model/BahanBaku.php";

$act = $_GET['act'];
$bahanBaku = new BahanBaku();
$conn = dbConnect();
// input modul tambahDariResep
if ($act == 'tambah') {

    $hasil = $bahanBaku->getLastItemBahanBaku();//dapatkan data id_bahan_baku yang terakhir
    if (empty($hasil)) {
        $id_bahan_baku = 'mnu0001';
    } else {
        $ambilAngka = substr($hasil['id_bahan_baku'], 3);
        $incrementAngka = (int)$ambilAngka + 1;
        // membuat angka 4 menjadi 0004 / 34 -> 0034 / 234 -> 0234
        if (strlen($incrementAngka) == 1) {
            $nol = '000';
        } elseif (strlen($incrementAngka) == 2) {
            $nol = '00';
        } elseif (strlen($incrementAngka) == 3) {
            $nol = '0';
        } else {
            $nol = '';
        }
        $id_bahan_baku = "mnu$nol$incrementAngka";
    }

    $nama_bahan_baku = $conn->real_escape_string(my_inputformat(anti_injection($_POST['nama_bahan_baku']), 1));
    $satuan = $conn->real_escape_string(my_inputformat(anti_injection($_POST['satuan']), 1));

    $insert = $bahanBaku->insertBahanBaku($id_bahan_baku, $nama_bahan_baku, $satuan);
    if ($insert) {
        header("location: ../daftar-bahan-baku.php");
    } else {
        echo "Gagal Memasukkan data";
    }

} elseif ($act == 'tambahDariResep') {

    $hasil = $bahanBaku->getLastItemBahanBaku();//dapatkan data id_bahan_baku yang terakhir
    if (empty($hasil)) {
        $id_bahan_baku = 'bbk0001';
    } else {
        $ambilAngka = substr($hasil['id_bahan_baku'], 3);
        $incrementAngka = (int)$ambilAngka + 1;
        // membuat angka 4 menjadi 0004 / 34 -> 0034 / 234 -> 0234
        if (strlen($incrementAngka) == 1) {
            $nol = '000';
        } elseif (strlen($incrementAngka) == 2) {
            $nol = '00';
        } elseif (strlen($incrementAngka) == 3) {
            $nol = '0';
        } else {
            $nol = '';
        }
        $id_bahan_baku = "bbk$nol$incrementAngka";
    }

    $id_menu = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_menu']), 0));
    $nama_bahan_baku = $conn->real_escape_string(my_inputformat(anti_injection($_POST['nama_bahan_baku']), 1));
    $satuan = $conn->real_escape_string(my_inputformat(anti_injection($_POST['satuan']), 1));

    $insert = $bahanBaku->insertBahanBaku($id_bahan_baku, $nama_bahan_baku, $satuan);
    if ($insert) {
        header("location: ../daftar-menu-resep.php?id=$id_menu");
    } else {
        echo "Gagal Memasukkan data";
    }

} elseif ($act == 'update') {
    $nama_bahan_baku = $conn->real_escape_string(my_inputformat(anti_injection($_POST['nama_bahan_baku']), 0));
    $kategori = $conn->real_escape_string(my_inputformat(anti_injection($_POST['kategori']), 0));

    $update = $bahanBaku->updateBahanBaku($nama_bahan_baku, $kategori);
    if ($update) {
        header("location: ../bahanBaku.php");
    } else {
        echo "Gagal memperbarui data";
    }

} elseif ($act == 'hapus') {
    $delete = $bahanBaku->deleteBahanBaku($_GET['id']);
    if ($delete) {
        header("location: ../daftar-bahan-baku.php");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>