<?php
define("DEVELOPMENT", TRUE);
function dbConnect()
{
    $db = new mysqli("localhost", "root", "", "db_restoran_tradisional_bubroto");
    return $db;
}

// fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data)
{
    $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter;
}

// format input buatan
function my_inputformat($str, $space)
{
    if ($space == 1)
        return trim(preg_replace("/\s+/", " ", $str));
    else
        return trim(preg_replace("/\s+/", "", $str));
}

// getListKategori digunakan untuk mengambil seluruh data dari tabel produk
///---------------------------------------------------------------
function getListMeja()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * 
						 FROM meja WHERE status_meja = 'kosong'
						 ORDER BY no_meja");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

// digunakan untuk mengambil data sebuah menu
///---------------------------------------------------------------
function getListMenu()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * 
						 FROM menu WHERE status = 'tersedia'
						 ORDER BY kategori");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

///---------------------------------------------------------------
function banner()
{
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Table - Brand</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    </head>
    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top"
         style="background: #4A90E2;">
        <div class="container-fluid">
            <button class="btn btn-link d-md-none rounded-circle mr-3"
                    id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                                                    data-toggle="dropdown" aria-expanded="false"
                                                                    href="#"><i
                                class="fas fa-search"></i></a>
                    <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                         aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto navbar-search w-100">
                            <div class="input-group"><input class="bg-light form-control border-0 small"
                                                            type="text" placeholder="Search for ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary py-0"
                                            type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                          data-toggle="dropdown" aria-expanded="false" href="#"></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                         role="menu"></div>
                </li>
                </li>
                <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                          data-toggle="dropdown" aria-expanded="false" href="#"></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                         role="menu">
                        <h6 class="dropdown-header">alerts center</h6>
                    </div>
                </li>
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                     aria-labelledby="alertsDropdown"></div>
                </li>
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow" role="presentation">
                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                          data-toggle="dropdown" aria-expanded="false" href="#"><span
                                class="mr-2 small"
                                style="color: #fff;"><?php echo "$_SESSION[nama]"; ?></span><img
                                class="border rounded-circle img-profile"
                                src="assets/img/avatars/avatar1.jpeg"></a>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a
                                class="dropdown-item" role="presentation" href="#"><i
                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                    </div>
                </li>
                </li>
            </ul>
        </div>
    </nav>
    <?php
}

///---------------------------------------------------------------
function navigator()
{
    ?>
    <?php 
        $jb = $_SESSION["jabatan"];

        if ($jb == "pelayan"){
            pelayan();
        } else if ($jb == "koki"){
            koki();
        } else if ($jb == "pemilik"){
            pemilik();
        } else if ($jb == "pantri"){
            pantri();
        }
    ?>
    <?php
}
///---------------------------------------------------------------
function pelayan()
{
    ?>
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
         style="background: #2C3E50;">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link" href="pesanan.php"><i
                                class="material-icons">chrome_reader_mode</i><span>PESANAN</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="meja.php"><i
                                class="fas fa-table"></i><span>MEJA</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="daftar-menu.php"><i
                                class="material-icons">kitchen</i><span>DAPUR</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
    <?php
}
///---------------------------------------------------------------
function koki()
{
    ?>
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
         style="background: #2C3E50;">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link" href="pesanan.php"><i
                                class="material-icons">chrome_reader_mode</i><span>PESANAN</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="daftar-menu.php"><i
                                class="material-icons">kitchen</i><span>DAPUR</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
    <?php
}
///---------------------------------------------------------------
function pantri()
{
    ?>
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
        style="background: #2C3E50;">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                
                <li class="nav-item" role="presentation"><a class="nav-link" href="daftar-bahan-baku.php"><i
                                class="material-icons">kitchen</i><span>DAPUR</span></a></li>
                
                <li class="nav-item" role="presentation"><a class="nav-link"><i class="material-icons">input</i><span>LAPORAN</span></a>
                </li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
    <?php
}
///---------------------------------------------------------------
function kasir()
{
    ?>
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
         style="background: #2C3E50;">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                
                <li class="nav-item" role="presentation"><a class="nav-link" href="pembayaran.php"><i
                                class="material-icons">account_balance_wallet</i><span>PEMBAYARAN</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link"><i 
                                class="material-icons">input</i><span>LAPORAN</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
    <?php
}
///---------------------------------------------------------------
function pemilik()
{
    ?>
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
        style="background: #2C3E50;">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link" href="pesanan.php"><i
                                class="material-icons">chrome_reader_mode</i><span>PESANAN</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="meja.php"><i
                                class="fas fa-table"></i><span>MEJA</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="daftar-menu.php"><i
                                class="material-icons">kitchen</i><span>DAPUR</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="pembayaran.php"><i
                                class="material-icons">account_balance_wallet</i><span>PEMBAYARAN</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="kuisioner.php"><i
                                class="far fa-edit"></i><span>KUISIONER</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link"><i class="material-icons">input</i><span>LAPORAN</span></a>
                </li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
    <?php
}
///---------------------------------------------------------------
function showError($message)
{
    ?>
    <div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
        <?php echo $message; ?>
    </div>
    <?php
}

?>