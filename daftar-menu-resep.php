<?php
session_start();
if (empty($_SESSION['nip']) && empty($_SESSION['password'])) {
    echo "Sementara : Anda harus login terlebih dahulu";
} else {
    include_once("functions.php");
    include_once "model/Menu.php";
    include_once "model/Resep.php";
    include_once "model/BahanBaku.php";
    $menu = new Menu();
    $resep = new Resep();
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
                                                <?php
                                                $namaHidangan = $menu->getItemMenu($_GET['id']);
                                                echo "$namaHidangan[nama_menu]";
                                                ?></p>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $id_menu = isset($_GET['id']) ? $_GET['id'] : "";

                                            $dmenu = $menu->getItemMenu($id_menu);

                                            ?>
                                            <form method="POST" action="action/action_resep.php?act=tambah">
                                                <input type="hidden" value="<?php echo "$dmenu[id_menu]"; ?>"
                                                       name="id_menu">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="fakeNamaMenu"><strong>Nama
                                                                    Menu</strong></label><input class="form-control"
                                                                                                type="text"
                                                                                                value="<?php echo "$dmenu[nama_menu]"; ?>"
                                                                                                placeholder="Nama Menu"
                                                                                                name="fakeNamaMenu"
                                                                                                style="width: 270px;"
                                                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group" style="width: 280px;"><label
                                                                    for="bahan_baku"><strong>Bahan
                                                                    Baku</strong> (yang tersedia)</label>
                                                            <input class="form-control"
                                                                   type="text"
                                                                   placeholder="isi bahan baku ..."
                                                                   name="bahan_baku"
                                                                   id="bahanBakuAutocomplete"
                                                                   style="width: 270px;">
                                                            <div class="" id="bahanBakuList"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="width: 251px;">
                                                        <div class="form-group" style="width: 250px;"><label
                                                                    for="jumlah_bahan"><strong>Jumlah
                                                                    <small> (yang dibutuhkan)</small>
                                                                </strong></label>
                                                            <input class="form-control" type="number"
                                                                   placeholder="jumlah" name="jumlah_bahan"
                                                                   style="width: 122px;"></div>

                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary btn-sm"
                                                                type="submit"
                                                                style="margin-left: 721px;width: 118px;">Tambahkan
                                                        </button>
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
                                                            $dataResep = $resep->getListResep("where id_menu='$_GET[id]'");
                                                            foreach ($dataResep as $dresep) {
                                                                $nama_bahan = $bahanBaku->getItemBahanBakuBy("id_bahan_baku", "$dresep[id_bahan_baku]");
                                                                echo "
                                                                    <tr>
                                                                        <td>$nama_bahan[nama_bahan_baku]</td>
                                                                        <td>$dresep[jumlah_bahan]</td>
                                                                        <td>Buahdada</td>
                                                                        <td>
                                                                            <a href=''>Edit</a> | 
                                                                            <a href='action/action_resep.php?act=hapus'>Hapus</a> 
                                                                        </td>
                                                                    </tr>";
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
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
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
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
                        data: {query: query},
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