<?php
session_start();
if (empty($_SESSION['nip']) && empty($_SESSION['password'])) {
    echo "Sementara : Anda harus login terlebih dahulu";
} else {
    include_once("functions.php");
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Dashboard - Brand</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <?php navigator(); ?>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <?php banner(); ?>
                    <div class="container-fluid">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h3 class="text-dark mb-0">Laporan</h3>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-lg-6 mb-4"><a class="btn btn-primary" role="button" style="width: 450px;height: 111px;padding-top: 33px;font-size: 26px;padding-bottom: 7px;" href="laporan-pengeluaran.php">Pengeluaran</a></div>
                                    <div class="col-lg-6 mb-4"><a class="btn btn-primary" role="button" style="width: 450px;height: 111px;padding-bottom: 7px;padding-top: 33px;font-size: 26px;" href="laporan-pemasukan.php">Pemasukan</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>

    </html>
<?php } ?>