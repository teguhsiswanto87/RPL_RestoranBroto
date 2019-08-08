<?php
include "../functions.php";
include "../model/Meja.php";

$act = $_GET['act'];
$meja = new Meja();
$conn = dbConnect();
// input modul
if ($act == 'tambah') {
    $no_meja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['no_meja']), 0));
    $kapasitas = $conn->real_escape_string(my_inputformat(anti_injection($_POST['kapasitas']), 0));

    //cek apakah nomer meja sudah ada
    if ($meja->isNoMejaExist($no_meja)) {
        echo "Nomor Meja sudah ada";
    } else {//kalau nomor meja tidak ada yang sama
        $insert = $meja->insertMeja($no_meja, $kapasitas);
        if ($insert) {
            header("location: ../meja.php");
        } else {
            echo "Gagal Memasukkan data";
        }
    }

} elseif ($act == 'update') {
    $no_meja = $conn->real_escape_string(my_inputformat(anti_injection($_POST['no_meja']), 0));
    $kapasitas = $conn->real_escape_string(my_inputformat(anti_injection($_POST['kapasitas']), 0));

    $update = $meja->updateMeja($no_meja, $kapasitas);
    if ($update) {
        header("location: ../meja.php");
    } else {
        echo "Gagal memperbarui data";
    }
    
} elseif ($act == 'hapus') {
    $delete = $meja->deleteMeja($_GET['id']);
    if ($delete) {
        header("location: ../meja.php");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>