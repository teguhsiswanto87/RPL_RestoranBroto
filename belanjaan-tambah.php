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
        <title>Tambah Belanja - RTB</title>
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
                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since
                                                last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since
                                                last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="width: 920px;">
                                    <div class="card shadow mb-3" style="width: 920px;">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Tambah Data Belanjaan</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="action/action_belanja.php?act=tambah"
                                                  onsubmit="return belanjaValidation()" name="formBelanja">
                                                <input type="hidden" value="<?php echo "$_SESSION[nip]"; ?>" name="nip">
                                                <div class="form-row">
                                                    <!--                                                    <div class="col">-->
                                                    <!--                                                        <div class="form-group"><label for="username"><strong>ID-->
                                                    <!--                                                                    Belanjaan</strong></label><input-->
                                                    <!--                                                                    class="form-control"-->
                                                    <!--                                                                    type="text"-->
                                                    <!--                                                                    placeholder="Id Belanjaan"-->
                                                    <!--                                                                    name="username"></div>-->
                                                    <!--                                                    </div>-->
                                                    <div class="col">
                                                        <div class="form-group"><label for="tgl_belanja"><strong>Tanggal
                                                                    Belanjaan</strong></label><input
                                                                    class="form-control"
                                                                    id="tgl_belanja"
                                                                    type="date"
                                                                    placeholder="Tanggal belanjaan"
                                                                    name="tgl_belanja"></div>
                                                    </div>
                                                    <div class="col">
                                                        <button class="btn btn-primary" type="submit"
                                                                style="width: 124px;margin-top: 32px;margin-left: 93px;">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
    <script src="assets/js/validations.js"></script>
    <script>
        // $("#tgl_belanja").datepicker();
    </script>
    </body>

    </html>

<?php } ?>