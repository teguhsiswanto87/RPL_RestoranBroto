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
        <title>Manajemen Meja - RTB</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
        <!-- data tables -->
        <link rel="stylesheet" type="text/css"
              href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    </head>

    <body id="page-top">
    <div id="wrapper">
        <?php navigator(); ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php include "banner.php"; ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Meja</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Daftar Meja</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length"
                                         aria-controls="dataTable"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><a
                                                class="btn btn-primary" role="button" style="width: 128px;"
                                                href="meja-tambah.php">Tambah</a></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                 aria-describedby="dataTable_info">
                                <table class="table dataTable my-0 table-hover" id="dataTableMeja">
                                    <thead>
                                    <tr>
                                        <th>Nomor Meja</th>
                                        <th>Kapasitas</th>
                                        <th>Status Meja</th>
                                        <th style="width: 140px;">Pilihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include_once "model/Meja.php";
                                    $meja = new Meja();

                                    $dataMeja = $meja->getListMeja();
                                    foreach ($dataMeja as $data) {
                                        echo "<tr>
                                            <td>$data[no_meja]</td>
                                            <td>$data[kapasitas] orang</td>
                                            <td>$data[status_meja]</td>
                                            <td><a href='meja-edit.php?id=$data[no_meja]'>Edit</a> | 
                                                <a href='action/action_meja.php?act=hapus&id=$data[no_meja]' 
                                                    onclick='return confirm(`Hapus data meja dengan nomor $data[no_meja] ?`)'>Hapus</a></td>
                                        </tr>";
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td><strong>
                                                <?php $totalData = $meja->getCountTotalData();
                                                echo "Total:  $totalData[jumlahMeja]  meja"; ?><br>
                                            </strong>
                                        </td>
                                        <td><strong><?php $totalKapasitas = $meja->getCountTotalKapasitas();
                                                echo "= $totalKapasitas[totalKapasitas]"; ?><br>
                                            </strong>
                                        </td>
                                        <td><strong>
                                                <?php $jumlahMejaTerisi = $meja->getCountTotalData("where status_meja is not null");
                                                $jumlahMejaKosong = $meja->getCountTotalData("where status_meja is null OR status_meja='kosong'");
                                                echo "Meja Terisi: $jumlahMejaTerisi[jumlahMeja] <br>
                                                      Meja Kosong: $jumlahMejaKosong[jumlahMeja]"; ?><br>
                                            </strong>
                                        </td>
                                        <td><strong> - <br></strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- HIDE -->
                            <div class="row" style="display: none;">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing
                                        1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#"
                                                                              aria-label="Previous"><span
                                                            aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                            aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
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
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <!-- data tables -->
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTableMeja').DataTable();
        });
    </script>
    </body>

    </html>

<?php } ?>