<?php include_once("functions.php");?>
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
</head>

<body id="page-top">
    <div id="wrapper">
    <?php navigator();?>
        
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php banner();?>
                
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Kuisioner</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Daftar Pemesan</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label><button class="btn btn-primary" type="button" style="margin-left: 27px;width: 81px;">Cari</button></div>
                            </div>
                            <!-- <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><a class="btn btn-primary" role="button" style="margin-left: 342px;width: 94px;" href="kuisioner-tambah.php">Kuisioner</a></div>
                            </div> -->
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 157px;">No Pesanan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Status</th>
                                        <th style="width: 112px;">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>P001</td>
                                        <td>Alwi Yahya Muljabar</td>
                                        <td>Sudah Dibayar</td>
                                        <td><a href="kuisioner-tambah.php">Kuisioner</a></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>No Pesanan</strong></td>
                                        <td><strong>Nama Pelanggan</strong></td>
                                        <td><strong>Status</strong></td>
                                        <td><strong>Pilihan</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
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
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>