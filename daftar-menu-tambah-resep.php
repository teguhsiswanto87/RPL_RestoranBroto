<?php include_once("functions.php");?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Restoran-Bu-Broto</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
</head>

<body>
    <div id="wrapper">
    <?php navigator();?>
        
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php banner();?>
                
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Dapur</h3>
                <div class="row mb-3">
                    <div class="col-lg-8" style="width: 920px;">
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
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
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
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="width: 920px;">
                            <div class="col" style="width: 920px;">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Tambah Resep Menu</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>Nama Menu</strong></label><input class="form-control" type="text" placeholder="Nama Menu" name="username" style="width: 270px;"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" style="width: 280px;"><label for="email"><strong>Bahan Baku</strong></label><select class="form-control" style="width: 270px;"><optgroup label="This is a group"><option value="12" selected="">-- Pilih Bahan Baku --</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                                                </div>
                                                <div class="col" style="width: 251px;">
                                                    <div class="form-group" style="width: 118px;"><label for="email"><strong>Jumlah</strong></label><input class="form-control" type="email" placeholder="jumlah" name="email" style="width: 122px;"></div>
                                                </div>
                                                <div class="col" style="width: 254px;">
                                                    <div class="form-group" style="margin-left: 0px;margin-top: 34px;width: 138px;"><button class="btn btn-primary btn-sm" type="submit" style="width: 118px;">Tambah</button></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Daftar Bahan Baku</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Bahan Baku</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Satuan</th>
                                                                    <th>Pilihan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Kelapa Parud</td>
                                                                    <td>2</td>
                                                                    <td>Buah</td>
                                                                    <td>Hapus</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><a class="btn btn-primary btn-sm" role="button" style="margin-left: 721px;width: 118px;" href="daftar-menu.php">Selesai</a></div>
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
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>