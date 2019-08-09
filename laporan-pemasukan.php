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
                    <?php banner(); ?>
                    <div class="container-fluid" style="margin-bottom: 6px;">
                        <h3 class="text-dark mb-4">Laporan</h3>
                        <div class="card shadow" style="margin-bottom: 26px;">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Daftar Laporan Pemasukan</p>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table dataTable my-0" id="dataTablePemasukan">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once "model/Laporan.php";
                                            $laporan = new Laporan();
                                            $total = 0;
                                            $jum = 0;
                                            $dataLaporan = $laporan->getListLaporan();
                                            foreach ($dataLaporan as $data) {
                                                $total = $total + $data['total'];
                                                $jum = $jum + 1;
                                                echo "<tr>
                                                    <td>$data[tgl_pembayaran]</td>
                                                    <td>$data[total]</td>
                                                    </tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Data Laporan Keuangan</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table dataTable my-0" id="dataTable">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>$1,200,000</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Transsaksi</td>
                                                <td>
                                                    <?php echo $jum ?> Transaksi
                                                </td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <td>Total Pemasukan</td>
                                                <td><?php echo $total ?></td>
                                            </tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                        </tbody>
                                        <tfoot>
                                            <tr></tr>
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
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="assets/js/theme.js"></script>
        <!-- data tables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTablePemasukan').DataTable();
            });
        </script>
    </body>

    </html>
<?php } ?>