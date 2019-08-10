<?php
include "../functions.php";
include "../model/Belanja.php";

$act = $_GET['act'];
$belanja = new Belanja();
$conn = dbConnect();
// input modul
if ($act == 'tambah') {

    $hasil = $belanja->getLastItemBelanja();//dapatkan data id_belanja yang terakhir
    if (empty($hasil)) {
        $id_belanja = 'blj0001';
    } else {
        $ambilAngka = substr($hasil['id_belanja'], 3);
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
        $id_belanja = "blj$nol$incrementAngka";
    }

    $nip = $conn->real_escape_string(my_inputformat(anti_injection($_POST['nip']), 0));
    $tgl_belanja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['tgl_belanja']), 0));

    //cek apakah nomer belanja sudah ada
    $insert = $belanja->insertBelanja($id_belanja, $nip, $tgl_belanja);
    if ($insert) {
        header("location: ../belanjaan-tambah-detail.php?id=$id_belanja");
    } else {
        echo "Gagal Memasukkan data";
    }

} elseif ($act == 'update') {
    $id_belanja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_belanja']), 0));
    $tgl_belanja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['tgl_belanja']), 0));

    $update = $belanja->updateBelanja($id_belanja, $tgl_belanja);
    if ($update) {
        header("location: ../belanja.php");
    } else {
        echo "Gagal memperbarui data";
    }

} elseif ($act == 'hapus') {
    $delete = $belanja->deleteBelanja($_GET['id']);
    if ($delete) {
        header("location: ../belanja.php");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>