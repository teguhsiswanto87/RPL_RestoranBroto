<?php
session_start();
if (empty($_SESSION['nip']) && empty($_SESSION['password'])) {
    echo "Sementara : Anda harus login terlebih dahulu";
} else {
    include_once("functions.php");
    include_once "model/Menu.php";
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Edit Menu - RTB</title>
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
                <?php include "banner.php"; ?>

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
                            <div class="row" style="width: 920px;">
                                <div class="col" style="width: 920px;">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Tambah Menu</p>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $menu = new Menu();
                                            $dmenu = $menu->getItemMenu($_GET['id']);

                                            ?>
                                            <form method="POST" action="action/action_menu.php?act=update"
                                                  onsubmit="return menuValidation()" name="formMenu">
                                                <input type="hidden" value="<?php echo "$_GET[id]"; ?>" name="id_menu">
                                                <div class="form-row">
                                                    <!--                                                    <div class="col" style="width: 174px;">-->
                                                    <!--                                                        <div class="form-group" style="width: 160px;"><label-->
                                                    <!--                                                                    for="username"><strong>Kode-->
                                                    <!--                                                                    Menu</strong></label>-->
                                                    <!--                                                            <input class="form-control"-->
                                                    <!--                                                                   type="text"-->
                                                    <!--                                                                   placeholder="kode menu"-->
                                                    <!--                                                                   name="username"-->
                                                    <!--                                                                   style="width: 123px;">-->
                                                    <!--                                                        </div>-->
                                                    <!--                                                    </div>-->
                                                    <div class="col">
                                                        <div class="form-group" style="width: 353px;"><label
                                                                    for="kategori"><strong>Kategori</strong></label>
                                                            <select name="kategori" class="form-control">
                                                                <?php
                                                                $dataKategori = getCategory(); // array di function
                                                                $kategoriTerpilih = $menu->getItemMenuBy("id_menu", $_GET['id']);
                                                                foreach ($dataKategori as $dkategori) {
                                                                    if ($kategoriTerpilih['kategori'] == $dkategori) {
                                                                        $selected = "selected";
                                                                    } else {
                                                                        $selected = "";
                                                                    }

                                                                    echo "<option value='$dkategori' $selected>$dkategori</option>";
                                                                }

                                                                ?>
                                                                <!--                                                                <option value="makanan berat">Makanan Berat</option>-->
                                                                <!--                                                                <option value="makanan ringan">Makanan Ringan</option>-->
                                                                <!--                                                                <option value="minuman">Minuman</option>-->
                                                            </select>
                                                            <!--                                                            <input class="form-control" type="text"-->
                                                            <!--                                                                   placeholder="kategori"-->
                                                            <!--                                                                   name="kategori" style="width: 271px;">-->
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label
                                                                    for="harga"><strong>Harga</strong></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">Rp</div>
                                                                </div>
                                                                <input class="form-control" type="text"
                                                                       placeholder="harga"
                                                                       value="<?php echo "$dmenu[harga]"; ?>"
                                                                       name="harga" tabindex="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="nama_menu"><strong>Nama
                                                                    Menu</strong></label><input class="form-control"
                                                                                                type="text"
                                                                                                placeholder="Nama Menu"
                                                                                                name="nama_menu"
                                                                                                tabindex="0"
                                                                                                value="<?php echo "$dmenu[nama_menu]"; ?>"
                                                            ></div>
                                                    </div>
                                                    <div class="col">
                                                        <!--                                                        <div class="form-group"><label-->
                                                        <!--                                                                    for="last_name"><strong>Status</strong></label><select-->
                                                        <!--                                                                    class="form-control">-->
                                                        <!--                                                                <optgroup label="This is a group">-->
                                                        <!--                                                                    <option value="12" selected="">-- Pilih Status Menu-->
                                                        <!--                                                                        ---->
                                                        <!--                                                                    </option>-->
                                                        <!--                                                                    <option value="13">This is item 2</option>-->
                                                        <!--                                                                    <option value="14">This is item 3</option>-->
                                                        <!--                                                                </optgroup>-->
                                                        <!--                                                            </select></div>-->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-sm" type="submit"
                                                            style="margin-left: 730px;width: 125px;">Simpan
                                                    </button>
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
    </body>

    </html>

<?php } ?>