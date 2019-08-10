<?php
session_start();
if (empty($_SESSION['nip']) && empty($_SESSION['password'])) {
    echo "Sementara : Anda harus login terlebih dahulu";
} else {
    include_once("functions.php");
    include_once("model/BahanBaku.php");
    include_once("model/DetailBelanja.php");

    $bahanBaku = new BahanBaku();
    $detailBelanja = new DetailBelanja();
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Detail Belanja - RTB</title>
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
                    <h3 class="text-dark mb-4">Dapur</h3>
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
                                <div class="col">
                                    <div class="card shadow mb-4" style="width: 1090px;">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Tambah &nbsp;Data Detil
                                                Belanjaan</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="action/action_detail_belanja.php?act=tambah"
                                                  onsubmit="return detailBelanjaValidation()" name="formDetailBelanja">
                                                <input type="hidden" value="<?php echo "$_GET[id]"; ?>"
                                                       name="id_belanja">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Id
                                                                    Belanja</strong></label><input class="form-control"
                                                                                                   value="<?php echo "$_GET[id]"; ?>"
                                                                                                   type="text"
                                                                                                   name="fakeIdBelanja"
                                                                                                   disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group" style="width: 260px;"><label
                                                                    for="email"><strong>Nama Bahan
                                                                    Baku</strong></label>
                                                            <select class="form-control" name="id_bahan_baku"
                                                                    style="width: 263px;">
                                                                <optgroup label="      --- Pilih Bahan Baku ---">
                                                                    <?php
                                                                    $dataBahanBaku = $bahanBaku->getListBahanBaku("WHERE id_bahan_baku NOT in (SELECT id_bahan_baku FROM detail_belanja WHERE id_belanja='$_GET[id]')");

                                                                    foreach ($dataBahanBaku as $dBahanBaku) {
                                                                        echo "<option value='$dBahanBaku[id_bahan_baku]'>$dBahanBaku[nama_bahan_baku]</option>";
                                                                    }

                                                                    ?>
                                                                </optgroup>
                                                            </select></div>
                                                    </div>
                                                    <div class="col" style="width: 129px;">
                                                        <div class="form-group" style="width: 159px;"><label
                                                                    for="qty"><strong>qty</strong></label><input
                                                                    class="form-control" type="text" placeholder="qty"
                                                                    name="qty" style="width: 145px;"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group" style="width: 95px;"><label
                                                                    for="satuan"><strong>Satuan</strong></label><input
                                                                    class="form-control" type="text" placeholder="kg"
                                                                    name="satuan" style="width: 92px;"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"
                                                             style="width: 165px;margin-right: 20px;margin-left: -54px;">
                                                            <label for="tgl_kadaluarsa"><strong>Tanggal
                                                                    Kadaluarsa</strong></label>
                                                            <input class="form-control"
                                                                   type="date"
                                                                   name="tgl_kadaluarsa"
                                                                   style="width: 149px;margin-right: 25px;">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group" style="width: 140px;"><label
                                                                    for="harga"><strong>Harga</strong></label><input
                                                                    class="form-control" type="text" placeholder="Rp. "
                                                                    name="harga" style="width: 140px;"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit"
                                                                    style="width: 128px;margin-left: 365px;">Tambah
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow" style="width: 920px;">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Data Detail Belanja</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 220px;">Nama Bahan Baku</th>
                                                        <th style="width: 171px;">Harga</th>
                                                        <th style="width: 88px;">qty</th>
                                                        <th style="width: 122px;">Satuan</th>
                                                        <th style="width: 171px;">Tanggal Kadaluarsa</th>
                                                        <th style="width: 83px;">Pilihan</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $dataDetailPesanan = $detailBelanja->getListDetailBelanja("where id_belanja='$_GET[id]' ");

                                                    foreach ($dataDetailPesanan as $dDetailPesanan) {
                                                        $nama_bahan_baku = $bahanBaku->getItemBahanBaku($dDetailPesanan['id_bahan_baku']);
                                                        $tanggal = tgl_indo($dDetailPesanan['tgl_kadaluarsa']);
                                                        echo "
                                                        <tr>
                                                            <td>$nama_bahan_baku[nama_bahan_baku]</td>
                                                            <td>$dDetailPesanan[harga]</td>
                                                            <td>$dDetailPesanan[qty]</td>
                                                            <td>$dDetailPesanan[satuan]</td>
                                                            <td>$tanggal</td>
                                                            <td></td>
                                                        </tr>";
                                                    }

                                                    ?>
                                                    <!--                                                    <tr>-->
                                                    <!--                                                        <td>bawang</td>-->
                                                    <!--                                                        <td>20000</td>-->
                                                    <!--                                                        <td>2</td>-->
                                                    <!--                                                        <td>kg</td>-->
                                                    <!--                                                        <td>20-01-2019</td>-->
                                                    <!--                                                        <td>Hapus</td>-->
                                                    <!--                                                    </tr>-->
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