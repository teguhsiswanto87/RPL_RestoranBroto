<?php
session_start();
if (empty($_SESSION['nip']) && empty($_SESSION['password'])) {
    echo "Sementara : Anda harus login terlebih dahulu";
} else {
    include_once("functions.php");
    include_once "model/BahanBaku.php";
    $bahanBaku = new BahanBaku();
    ?>
    <!DOCTYPE html>
    <html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Restoran-Bu-Broto</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <!-- data tables -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>

<body>
<div id="wrapper">
    <?php navigator(); ?>

    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php include "banner.php"; ?>

            <div class="container-fluid">
                <h3 class="text-dark mb-4">
                    <a class="btn btn-secondary btn-sm" role="button"
                       style="margin-right: 2rem;width: 100px; color: #fafafa; cursor: pointer;"
                       onclick="self.history.back()">
                        <i class="fas fa-chevron-left"></i> Kembali</a>
                    Dapur</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Daftar Bahan Baku</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!--                            <div class="col-md-6 text-nowrap">-->
                            <!--                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">-->
                            <!--                                    <label><input type="search" class="form-control form-control-sm"-->
                            <!--                                                  aria-controls="dataTable" placeholder="Search"></label>-->
                            <!--                                    <button class="btn btn-primary" type="button"-->
                            <!--                                            style="margin-left: 27px;width: 81px;">Cari-->
                            <!--                                    </button>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <?php
                            $jb = $_SESSION["jabatan"];

                            if ($jb == "pantri") {
                                ?>
                                <div class="col-md-6">
                                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><a
                                                class="btn btn-primary" role="button" style="width: 149px;"
                                                href="daftar-bahan-baku-tambah.php">Tambah</a></div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid"
                             aria-describedby="dataTable_info">
                            <table class="table dataTable my-0 table-hover" id="dataTableBahanBaku">
                                <thead>
                                <tr>
                                    <th>Nama Bahan Baku</th>
                                    <th>Jumlah Bahan(Stok)</th>
                                    <th>Satuan</th>
                                    <th>Pilihan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $dataBahanBaku = $bahanBaku->getListBahanBaku();
                                foreach ($dataBahanBaku as $dbb) {
                                    echo "
                                    <tr>
                                        <td>$dbb[nama_bahan_baku]</td>
                                        <td>$dbb[stok]</td>
                                        <td>$dbb[satuan]</td>";

                                    $jb = $_SESSION["jabatan"];
                                    if ($jb == "pantri") {
                                        echo "<td><a href='daftar-menu-resep.php'>Hapus</a></td>";
                                    } else {
                                        echo "<td><a href='action/action_bahan_baku.php?act=hapus&id=$dbb[id_bahan_baku]'
                                                onclick='return confirm(`Hapus bahan baku $dbb[nama_bahan_baku] ?`);'>Hapus</a></td>";
                                    }
                                    echo "</tr>l";
                                }
                                ?>
                                </tbody>
                                <!--                                <tfoot>-->
                                <!--                                <tr>-->
                                <!--                                    <td><strong>Nama Bahan Baku</strong></td>-->
                                <!--                                    <td><strong>Jumlah Bahan</strong></td>-->
                                <!--                                    <td><strong>Satuan</strong></td>-->
                                <!--                                    <td><strong>Pilihan</strong></td>-->
                                <!--                                </tr>-->
                                <!--                                </tfoot>-->
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
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTableBahanBaku').DataTable();
    });
</script>
</body>

    </html><?php } ?>