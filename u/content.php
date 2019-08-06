<?php
if (empty($_SESSION['nip']) && empty($_SESSION['password'])) {
    header("location:index.php?error=8");
} else {
    include_once "../model/Modul.php";

    //format tampil peringatan jika halaman yang bukan hak-nya diakses oleh orang tersebut --versi Edy Rahmayadi
    function warningText($halaman)
    {
        echo "Apa urusan Anda membuka halaman <b>$halaman</b> ? <br><br> 
                <i>- Edy Rahmayadi <small>mantan ketua PSSI</small></i>";
    }

    // adaptasi variabel dengan nama kolom di database
    if ($_SESSION['jabatan'] == 'pemilik') {
        $accessName = 'access_owner';
    } else if ($_SESSION['jabatan'] == 'pantry') {
        $accessName = 'access_pantry';
    } else if ($_SESSION['jabatan'] == 'koki') {
        $accessName = 'access_chef';
    } else if ($_SESSION['jabatan'] == 'pelayan') {
        $accessName = 'access_waiter';
    } else if ($_SESSION['jabatan'] == 'kasir') {
        $accessName = 'access_cashier';
    } else {
        $accessName = 'access_cs';
    }

    //fungsi mengecek apakah user dengan jabatan tertentu boleh mengakses halamannya sesuai dengan database
    function moduleAccess($value, $accessName)
    {
        $module = new Module();
        if ($data = $module->getItemModuleBy('link', "?m=$value")) {
            $yourAccess = $data[$accessName];
            if ($yourAccess == 'Y') {
                return true;
            } else {
                return warningText($value);
            }
        } else return false;
    }

    if ($_GET['m'] == 'pengguna') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_pengguna/pengguna.php";
    } elseif ($_GET['m'] == 'module') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_module/module.php";
        else echo "GAGAL Include ";
    } elseif ($_GET['m'] == 'pasien') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_pasien/pasien.php";
    } elseif ($_GET['m'] == 'petugas') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_petugas/petugas.php";
    } elseif ($_GET['m'] == 'dokter') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_dokter/dokter.php";
    } elseif ($_GET['m'] == 'direktur') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_direktur/direktur.php";
    } elseif ($_GET['m'] == 'pemeriksaan') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_pemeriksaan/pemeriksaan.php";
    } elseif ($_GET['m'] == 'resep') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_resep/resep.php";
    } elseif ($_GET['m'] == 'laporan') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_laporan/laporan.php";
    } elseif ($_GET['m'] == 'pembayaran') {
        if (moduleAccess($_GET['m'], $accessName))
            include "module/mod_pembayaran/pembayaran.php";
    } else {
        echo "Modul <b>$_GET[m]</b> sedang dibuat";
    }


}