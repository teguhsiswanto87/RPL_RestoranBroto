<?php
session_start();
include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
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
                <?php include "banner.php"; ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Pembayaran</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Daftar Pemabayaran</p>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTablePembayaran">
                                    <thead>
                                        <tr>
                                            <th style="width: 126px;">No Pesanan</th>
                                            <th style="width: 110px;">No Meja</th>
                                            <th>Nama Pemesan</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Status</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once "model/Pembayaran.php";
                                        $bayar = new Pembayaran();

                                        $dataPembayaran = $bayar->getListPembayaran();
                                        foreach ($dataPembayaran as $data) {
                                            echo "<tr>
                                            <td>$data[no_pesanan]</td>
                                            <td>$data[no_meja]</td>
                                            <td>$data[nama_pelanggan]</td>
                                            <td>$data[nip]</td>
                                            <td>$data[status_pembayaran]</td>
                                            <td><a href='pembayaran-proses.php?id=$data[no_meja]'>Edit</a> 
                                        </tr>";
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>No Pesanan</strong></td>
                                            <td><strong>No Meja</strong></td>
                                            <td><strong>Nama Pemesan</strong></td>
                                            <td><strong>Penanggung Jawab</strong></td>
                                            <td><strong>Status</strong></td>
                                            <td><strong>Pilihan</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
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
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <!-- data tables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTablePembayaran').DataTable();
        });
    </script>
</body>

</html>