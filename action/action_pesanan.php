<?php
include "../functions.php";
include "../model/Pesanan.php";

$act = $_GET['act'];
$pesanan = new Pesanan();
$conn = dbConnect();
// input modul
if ($act == 'tambah') {

    $hasil = $pesanan->getLastItemPesanan();//dapatkan data id_bahan_baku yang terakhir
    if (empty($hasil)) {
        $no_pesanan = 'psn0001';
    } else {
        $ambilAngka = substr($hasil['no_pesanan'], 3);
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
        $no_pesanan = "psn$nol$incrementAngka";
    }

    $nip = $conn->real_escape_string(my_inputformat(anti_injection($_POST['nip']), 0));
    $no_meja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['no_meja']), 0));
    $nama_pelanggan = $conn->real_escape_string(my_inputformat(anti_injection($_POST['nama_pelanggan']), 1));

    $insert = $pesanan->insertPesananMeja($no_pesanan, $nip, $no_meja, $nama_pelanggan);
    if ($insert) {
        header("location: ../pesanan-tambah-menu.php?id=$no_pesanan");
    } else {
        echo "Gagal Memasukkan data";
    }

} elseif ($act == 'update') {
    $no_meja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['no_meja']), 0));
    $kategori = $conn->real_escape_string(my_inputformat(anti_injection($_POST['kategori']), 0));

    $update = $pesanan->updatePesanan($no_meja, $kategori);
    if ($update) {
        header("location: ../pesanan.php");
    } else {
        echo "Gagal memperbarui data";
    }

} elseif ($act == 'hapus') {
    $no_meja = $_GET['no_meja'];
    $nama_pelanggan = $_GET['nama_pelanggan'];

    $delete = $pesanan->deletePesanan($no_meja, $nama_pelanggan);
    if ($delete) {
        header("location: ../daftar-menu-pesanan.php?id=$no_meja");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>