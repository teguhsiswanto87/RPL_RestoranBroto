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
        <title> Belanja - RTB</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
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
                    <h3 class="text-dark mb-4">
                        <a class="btn btn-secondary btn-sm" role="button"
                           style="margin-right: 2rem;width: 100px; color: #fafafa; cursor: pointer;"
                           onclick="self.history.back()">
                            <i class="fas fa-chevron-left"></i> Kembali</a>
                        Dapur</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold"> Data Detail Belanjaan </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-md-right dataTables_filter float-right" id="dataTable_filter"
                                         style="width: 881px;"><label><a class="btn btn-primary "
                                                                         role="button"
                                                                         style="width: 112px;"
                                                                         href="belanjaan-tambah.php">
                                                Tambah</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                 aria - describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th> Nama Bahan Baku</th>
                                        <th> Harga</th>
                                        <th style="width: 101px;"> Qty</th>
                                        <th> Satuan</th>
                                        <th style="width: 172px;"> Tanggal Kadaluarsa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> Airi Satou</td>
                                        <td> Accountant</td>
                                        <td> Tokyo</td>
                                        <td> 33</td>
                                        <td> 2008 / 11 / 28</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td><strong> Name</strong></td>
                                        <td><strong> Position</strong></td>
                                        <td><strong> Office</strong></td>
                                        <td><strong> Age</strong></td>
                                        <td><strong> Start date </strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!--                            <div class="row">-->
                            <!--                                <div class="col-md-6 align-self-center">-->
                            <!--                                    <p id="dataTable_info" class="dataTables_info" role="status" aria - live="polite">-->
                            <!--                                        Showing-->
                            <!--                                        1 to 10 of 27 </p>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">-->
                            <!--                                        <ul class="pagination">-->
                            <!--                                            <li class="page-item disabled"><a class="page-link" href="#"-->
                            <!--                                                                              aria - label="Previous"><span-->
                            <!--                                                            aria - hidden="true"> «</span></a></li>-->
                            <!--                                            <li class="page-item active"><a class="page-link" href="#"> 1</a></li>-->
                            <!--                                            <li class="page-item"><a class="page-link" href="#"> 2</a></li>-->
                            <!--                                            <li class="page-item"><a class="page-link" href="#"> 3</a></li>-->
                            <!--                                            <li class="page-item"><a class="page-link" href="#" aria --->
                            <!--                                                                     label="Next"><span-->
                            <!--                                                            aria - hidden="true"> »</span></a></li>-->
                            <!--                                        </ul>-->
                            <!--                                    </nav>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span> Copyright © Brand 2019 </span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    </body>

    </html>


<?php } ?>