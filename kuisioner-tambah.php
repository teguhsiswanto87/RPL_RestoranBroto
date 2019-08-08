<?php include_once("functions.php");?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
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
            <?php include "banner.php"; ?>
                
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Kuisioner</h3>
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
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Isi Kuisioner</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col" style="width: 454px;">
                                                    <div class="form-group" style="width: 613px;"><label for="username"><strong>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry ......</strong><br></label><input class="form-control" type="text" placeholder="user.name" name="username"></div>
                                                </div>
                                                <div class="col" style="width: 332px;">
                                                    <div class="form-group" style="width: 80px;margin-left: 325px;"><button class="btn btn-primary" type="button">Lihat</button></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="first_name"><strong>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry ......</strong><br></label><input class="form-control" type="text" placeholder="John" name="first_name"
                                                            style="width: 613px;"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group" style="height: 24px;"><label for="first_name"><strong>3. Lorem Ipsum is simply dummy text of the printing and typesetting industry ......</strong><br></label></div>
                                                    <div class="form-group" style="margin-left: 19px;"><input type="radio"><label for="first_name" style="margin-right: 22px;"><strong>&nbsp;Lorem Ipsum</strong><br></label><input type="radio"><label for="first_name" style="margin-right: 22px;"><strong>&nbsp;Lorem Ipsum</strong><br></label>
                                                        <input
                                                            type="radio"><label for="first_name" style="margin-right: 22px;"><strong>&nbsp;Lorem Ipsum</strong><br></label></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="first_name"><strong>4. Lorem Ipsum is simply dummy text of the printing and typesetting industry ......</strong><br></label><textarea class="form-control" style="width: 611px;height: 126px;"></textarea></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><a class="btn btn-primary btn-sm" role="button" style="margin-left: 393px;width: 97px;" href="kuisioner.php">Simpan</a></div>
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