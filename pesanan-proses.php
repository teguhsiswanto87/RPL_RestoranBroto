<?php
session_start();
if (empty($_SESSION['nip']) && empty($_SESSION['password'])) {
    echo "Sementara : Anda harus login terlebih dahulu";
} else {
    include_once("functions.php");
    include_once "model/Menu.php";
    include_once "model/Pesanan.php";
    include_once "model/DetailPesanan.php";
    $menu = new Menu();
    $pesanan = new Pesanan();
    $detailPesanan = new DetailPesanan();
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
        <!-- jquery style-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>

    <body>
    <div id="wrapper">
        <?php navigator(); ?>

        </nav>
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
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since last month</p>
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
                                                since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width: 920px;">
                                <div class="col" style="width: 920px;">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Tambah Bahan Baku

                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $noPesanan = isset($_GET['id']) ? $_GET['id'] : "";

                                            $dpesanan = $pesanan->getItemPesanan($noPesanan);

                                            ?>
                                            <form method="POST" action="action/action_resep.php?act=tambah">
                                                <input type="hidden" value="<?php echo "$dpesanan[no_pesanan]"; ?>"
                                                       name="no_pesanan">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="fakeNamaMenu"><strong>No
                                                                    Pesanan</strong></label>
                                                            <input class="form-control" type="text"
                                                                   value="<?php echo "$dpesanan[no_pesanan]"; ?>"
                                                                   placeholder="no pesanan" name="fakeNamaMenu"
                                                                   style="width: 270px;" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group" style="width: 280px;"><label
                                                                    for="bahan_baku"><strong>Nama
                                                                    Pemesan</strong></label>
                                                            <input class="form-control" type="text"
                                                                   value="<?php echo "$dpesanan[nama_pelanggan]"; ?>"
                                                                   placeholder="nama pesanan" name="fakeNamaMenu"
                                                                   style="width: 270px;" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="width: 251px;">


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
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Nama Bahan Baku</th>
                                                                <th>Jumlah</th>
                                                                <th>Satuan</th>
                                                                <th>Pilihan</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $dataDpesanan = $detailPesanan->getListDetailPesanan("where no_pesanan='$_GET[id]'");
                                                            foreach ($dataDpesanan as $dp) {
                                                                $nama_menu = $menu->getItemMenuBy("id_menu", "$dp[id_menu]");
                                                                echo "
                                                                            <tr>
                                                                                <td>$nama_menu[nama_menu]</td>
                                                                                <td>$dp[qty]</td>
                                                                                <td>$dp[status_detail_pesanan]</td>
                                                                                <td>
                                                                                    <a href=''>Selesai</a> | <a href=''>Edit</a> |
                                                                                    <a href='action/action_resep.php?act=hapus'>Hapus</a> 
                                                                                </td>
                                                                            </tr>";
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group"><a class="btn btn-primary btn-sm" role="button"
                                                                           style="margin-left: 691px;width: 118px;"
                                                                           href="pesanan.php">Selesai</a></div>
                                            </div>
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
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        // var arr = ["teguh", "siswanto", "universitas", "komputer", "indonesia", "teti", "tasya", "tamara", "emang"];
        // $("#bahanBakuAutocomplete").autocomplete(
        //     {
        //         source: 'resources/nama_bahan_baku.php',
        // source: arr,
        // delay: 0
        // });
        $(document).ready(function () {
            $("#bahanBakuAutocomplete").keyup(function () {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "resources/nama_bahan_baku.php",
                        data: {
                            query: query
                        },
                        method: "POST",
                        success: function (data) {
                            $('#bahanBakuList').fadeIn();
                            $('#bahanBakuList').html(data);
                        }
                    });
                }
            });
            $(document).on('click', 'li', function () {
                $('#bahanBakuAutocomplete').val($(this).text());
                $('#bahanBakuList').fadeOut();
            });
        });
    </script>
    </body>

    </html>

<?php } ?>