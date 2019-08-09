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
        <title>Manajemen Dapur - RTB</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
        <!-- data tables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <?php navigator(); ?>

            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <?php banner(); ?>

                    <div class="container-fluid">
                        <h3 class="text-dark mb-4">Dapur</h3>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Daftar Menu</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 text-nowrap">
                                        <!--                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTableMenu">-->
                                        <!--                                        <label><input type="search" class="form-control form-control-sm"-->
                                        <!--                                                      aria-controls="dataTable" placeholder="Search"></label>-->
                                        <!--                                        <button class="btn btn-primary" type="button"-->
                                        <!--                                                style="margin-left: 27px;width: 81px;">Cari-->
                                        <!--                                        </button>-->
                                        <!--                                    </div>-->
                                    </div>
                                    <?php
                                    $jb = $_SESSION["jabatan"];

                                    if ($jb == "pelayan") {
                                        ?>
                                        <div class="col-md-6">
                                            <div class="text-md-right dataTables_filter" id="dataTable_filter"><a class="btn btn-primary" role="button" style="width: 126px;" href="pesanan-tambah.php">Tambah</a>
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($jb == "master") {
                                        ?>
                                        <div class="col-md-6">
                                            <div class="text-md-right dataTables_filter" id="dataTable_filter"><a class="btn btn-primary" role="button" style="width: 126px;" href="pesanan-tambah.php">Tambah</a>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table dataTable my-0 table-hover" id="dataTableMenu">
                                        <thead>
                                            <tr>
                                                <th style="width: 118px;">No Pesanan</th>
                                                <th style="width: 91px;">No Meja</th>
                                                <th>Nama Pemesan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Status</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once "model/pesanan.php";
                                            $pesanan = new Pesanan();

                                            $datapesanan = $pesanan->getListPesanan();
                                            foreach ($datapesanan as $dpesanan) {

                                                echo " 
                                    <tr>
                                        <td>$dpesanan[no_pesanan]</td>
                                        <td style='text-transform: capitalize;'>$dpesanan[no_meja]</td>
                                        <td>$dpesanan[nama_pelanggan]</td>
                                        <td>$dpesanan[nip]</td>
                                        <td>$dpesanan[status_pesanan]</td>
                                        <td><a href='pesanan-proses.php?id=$dpesanan[no_pesanan]'>Detail</a>
                                    </tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <!--                                <tr>-->
                                            <!--                                    <td><strong>Id Menu</strong></td>-->
                                            <!--                                    <td><strong>Nama Menu</strong></td>-->
                                            <!--                                    <td><strong>Kategori</strong></td>-->
                                            <!--                                    <td><strong>Harga</strong></td>-->
                                            <!--                                    <td><strong>Status</strong></td>-->
                                            <!--                                    <td><strong>Pilihan</strong></td>-->
                                            <!--                                </tr>-->
                                        </tfoot>
                                    </table>
                                </div>


                                <!--                        <div class="row">-->
                                <!--                            <div class="col-md-6 align-self-center">-->
                                <!--                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing-->
                                <!--                                    1 to 10 of 27</p>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-md-6">-->
                                <!--                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">-->
                                <!--                                    <ul class="pagination">-->
                                <!--                                        <li class="page-item disabled"><a class="page-link" href="#"-->
                                <!--                                                                          aria-label="Previous"><span-->
                                <!--                                                        aria-hidden="true">«</span></a></li>-->
                                <!--                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
                                <!--                                        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                                <!--                                        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                                <!--                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span-->
                                <!--                                                        aria-hidden="true">»</span></a></li>-->
                                <!--                                    </ul>-->
                                <!--                                </nav>-->
                                <!--                            </div>-->
                                <!--                        </div>-->

                            </div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
                    </div>
                </footer>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="assets/js/theme.js"></script>
        <!-- data tables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTableMenu').DataTable();
            });
        </script>
    </body>

    </html>

<?php } ?>