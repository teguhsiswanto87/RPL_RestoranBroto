<?php
include "../functions.php";
include "../model/Menu.php";

$act = $_GET['act'];
$menu = new Menu();
$conn = dbConnect();
// input modul
if ($act == 'tambah') {

    $hasil = $menu->getLastItemMenu();//dapatkan data id_menu yang terakhir
    if (empty($hasil)) {
        $id_menu = 'mnu0001';
    } else {
        $ambilAngka = substr($hasil['id_menu'], 3);
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
        $id_menu = "mnu$nol$incrementAngka";
    }

    $kategori = $conn->real_escape_string(my_inputformat(anti_injection($_POST['kategori']), 1));
    $nama_menu = $conn->real_escape_string(my_inputformat(anti_injection($_POST['nama_menu']), 1));
    $harga = $conn->real_escape_string(my_inputformat(anti_injection($_POST['harga']), 0));

    $insert = $menu->insertMenu($id_menu, $kategori, $nama_menu, $harga);
    if ($insert) {
        header("location: ../daftar-menu.php");
    } else {
        echo "Gagal Memasukkan data";
    }

} elseif ($act == 'update') {
    $id_menu = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id_menu']), 0));
    $kategori = $conn->real_escape_string(my_inputformat(anti_injection($_POST['kategori']), 0));

    $update = $menu->updateMenu($id_menu, $kategori);
    if ($update) {
        header("location: ../menu.php");
    } else {
        echo "Gagal memperbarui data";
    }

} elseif ($act == 'hapus') {
    $delete = $menu->deleteMenu($_GET['id']);
    if ($delete) {
        header("location: ../menu.php");
    } else {
        echo "Gagal menghapus data ID=$_GET[id]";
    }
} else {
    echo "Action tidak ada";
}

?>