<?php
// call Class Module
include_once "../model/Modul.php";

$m = $_GET['m'];
$aksi = "module/mod_module/aksi_module.php";
$act = isset($_GET['act']) ? $_GET['act'] : '';
$module = new Module();

switch ($act) {
    default: ?>
        <h3 class="text-dark mb-4">Pengelolaan Modul</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Daftar Modul</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                            <label><input type="search" class="form-control form-control-sm"
                                          aria-controls="dataTable" placeholder="Search"></label>
                            <button class="btn btn-primary" type="button"
                                    style="margin-left: 27px;width: 81px;">Cari
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right dataTables_filter" id="dataTable_filter">
                            <a class="btn btn-primary"
                               role="button"
                               style="width: 149px;"
                               href="<?php echo "?m=$m&act=tambah"; ?>"
                            >Tambah Modul</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid"
                     aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTableModule">
                        <thead>
                        <tr>
                            <th rowspan="2">ID</th>
                            <th rowspan="2">Nama Modul</th>
                            <th rowspan="2">Link</th>
                            <th rowspan="2">Ikon</th>
                            <th rowspan="2">Aktif</th>
                            <th colspan="6" class="text-center">Hak Akses</th>
                            <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>Pemilik</th>
                            <th>Pantry</th>
                            <th>Koki</th>
                            <th>Pelayan</th>
                            <th>Kasir</th>
                            <th>CS</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $dataModule = $module->getListModule();
                        foreach ($dataModule as $data) {
                            echo "
                    <tr>
                        <td>$data[module_id]</td>
                        <td>$data[module_name]</td>
                        <td>$data[link]</td>
                        <td>$data[icon]</td>
                        <td>$data[active]</td>
                        <td class='center aligned'>";
                            if ($data['access_owner'] == 'Y') {
                                echo "<i class='fas fa-check'></i>";
                            }
                            echo "
                        </td>
                        <td class='center aligned'>";
                            if ($data['access_pantry'] == 'Y') {
                                echo "<i class='fas fa-check'></i>";
                            }
                            echo "
                        </td>
                        <td class='center aligned'>";
                            if ($data['access_chef'] == 'Y') {
                                echo "<i class='fas fa-check'></i>";
                            }
                            echo "
                        </td>
                        <td class='center aligned'>";
                            if ($data['access_waiter'] == 'Y') {
                                echo "<i class='fas fa-check'></i>";
                            }
                            echo "
                        </td>
                        <td class='center aligned'>";
                            if ($data['access_cashier'] == 'Y') {
                                echo "<i class='fas fa-check'></i>";
                            }
                            echo "
                        </td>
                        <td class='center aligned'>";
                            if ($data['access_cs'] == 'Y') {
                                echo "<i class='fas fa-check'></i>";
                            }
                            echo "
                        </td>
                        <td class='center aligned'>
                            <a href='?m=$m&act=edit&id=$data[module_id]'>Edit</a> | ";
                            if ($data['module_id'] > 8) {
                                echo "<a id='btn-delete' style='cursor: pointer;' href='$aksi?m=$m&act=hapus&id=$data[module_id]'
                                     onclick='return confirm(`Hapus $_GET[m] $data[module_name] ID=$data[module_id]?`)'>Hapus</a>";
                            }
                            // href='$aksi?m=$m&act=hapus&id=$data[module_id]'
                            // onclick='return confirm(`Hapus modul $data[module_name] ID=$data[module_id]?`);'
                            echo "
                        </td>
                    </tr>";
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        break;
    case "tambah": ?>
        <h3 class="text-dark mb-4"><a class="btn btn-secondary btn-sm" role="button"
                                      style="margin-right: 2rem;width: 100px; color: #fafafa; cursor: pointer;"
                                      onclick="self.history.back()">
                <i class="fas fa-chevron-left"></i> Kembali</a>
            Pengelolaan Modul</h3>
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
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since
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
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since
                                    last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="width: 920px;">
                    <div class="col" style="width: 920px;">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Tambah Modul</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo "$aksi?m=$m&act=tambah"; ?>">
                                    <div class="form-row">
                                        <div class="col" style="">
                                            <div class="form-group" style=""><label for="username"><strong>Nama Modul
                                                    </strong></label><input class="form-control"
                                                                            type="text"
                                                                            placeholder="Nama Module"
                                                                            name="module_name"
                                                                            style="width: 20rem;"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group" style="">
                                                <label for="first_name">
                                                    <strong>Link</strong>
                                                </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">?m=</span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="link"
                                                           name="link"
                                                           aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label
                                                        for="first_name"><strong>Icon</strong></label><input
                                                        class="form-control" type="text" placeholder="icon"
                                                        name="icon"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                        for="first_name"><strong>Akses</strong></label>

                                                <div class="input-group mb-3">
                                                    <table class="table">
                                                        <tr>
                                                            <td><input type="checkbox" value="Y" name="access_owner"
                                                                       checked>
                                                                Pemilik
                                                            </td>
                                                            <td><input type="checkbox" value="Y" name="access_pantry">
                                                                Pantry
                                                            </td>
                                                            <td><input type="checkbox" value="Y" name="access_chef">
                                                                Koki
                                                            </td>
                                                            <td><input type="checkbox" value="Y" name="access_waiter">
                                                                Pelayan
                                                            </td>
                                                            <td><input type="checkbox" value="Y" name="access_cashier">
                                                                Kasir
                                                            </td>
                                                            <td><input type="checkbox" value="Y" name="access_cs">
                                                                Customer Service
                                                            </td>
                                                        </tr>
                                                    </table>


                                                </div>

                                            </div>
                                            <div class="col">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label
                                                            for="active"
                                                            style="margin-right: 1rem;"><strong>Aktif</strong></label>
                                                    <input type="checkbox" value="Y" name="active" id="active" checked>
                                                    Tampilkan modul di bagian menu
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm"
                                                        style="margin-left: 730px;width: 125px; color: #fafafa;"
                                                        type="submit"
                                                >Simpan
                                                </button>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        break;
    case "edit":
        $data = $module->getItemModule($_GET['id']); ?>

        <h3 class="text-dark mb-4"><a class="btn btn-secondary btn-sm" role="button"
                                      style="margin-right: 2rem;width: 100px; color: #fafafa; cursor: pointer;"
                                      onclick="self.history.back()">
                <i class="fas fa-chevron-left"></i> Kembali</a>
            Pengelolaan Modul</h3>
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
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since
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
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since
                                    last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="width: 920px;">
                    <div class="col" style="width: 920px;">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Edit Modul</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo "$aksi?m=$m&act=update"; ?>">
                                    <input type="hidden" value="<?php echo $data['module_id']; ?>" name="id">
                                    <div class="form-row">
                                        <div class="col" style="">
                                            <div class="form-group" style=""><label for="username"><strong>Nama Modul
                                                    </strong></label><input class="form-control"
                                                                            type="text"
                                                                            value="<?php echo "$data[module_name]"; ?>"
                                                                            placeholder="<?php echo "$data[module_name]"; ?>"
                                                                            name="module_name"
                                                                            style="width: 20rem;"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group" style="">
                                                <label for="first_name">
                                                    <strong>Link</strong>
                                                </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">?m=</span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                           placeholder="<?php echo substr($data['link'], 3); ?>"
                                                           name="link"
                                                           value="<?php echo substr($data['link'], 3); ?>"
                                                           aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label
                                                        for="first_name"><strong>Icon</strong></label><input
                                                        class="form-control" type="text"
                                                        placeholder="<?php echo "$data[icon]"; ?>"
                                                        value="<?php echo "$data[icon]"; ?>"
                                                        name="icon"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                        for="first_name"><strong>Akses</strong></label>

                                                <div class="input-group mb-3">
                                                    <table class="table">
                                                        <tr>
                                                            <td>
                                                                <?php ($data['access_owner'] == 'Y') ? $checked_owner = 'checked' : $checked_owner = ''; ?>
                                                                <input type="checkbox" value="Y"
                                                                       name="access_owner" <?php echo $checked_owner; ?>>
                                                                Pemilik
                                                            </td>
                                                            <td>
                                                                <?php ($data['access_pantry'] == 'Y') ? $checked_pantry = 'checked' : $checked_pantry = ''; ?>
                                                                <input type="checkbox" value="Y"
                                                                       name="access_pantry" <?php echo $checked_pantry; ?>>
                                                                Pantry
                                                            </td>
                                                            <td>
                                                                <?php ($data['access_chef'] == 'Y') ? $checked_chef = 'checked' : $checked_chef = ''; ?>
                                                                <input type="checkbox" value="Y"
                                                                       name="access_chef" <?php echo $checked_chef; ?>>
                                                                Koki
                                                            </td>
                                                            <td>
                                                                <?php ($data['access_waiter'] == 'Y') ? $checked_waiter = 'checked' : $checked_waiter = ''; ?>
                                                                <input type="checkbox" value="Y"
                                                                       name="access_waiter" <?php echo $checked_waiter; ?>>
                                                                Pelayan
                                                            </td>
                                                            <td>
                                                                <?php ($data['access_cashier'] == 'Y') ? $checked_cashier = 'checked' : $checked_cashier = ''; ?>
                                                                <input type="checkbox" value="Y"
                                                                       name="access_cashier" <?php echo $checked_cashier; ?>>
                                                                Kasir
                                                            </td>
                                                            <td>
                                                                <?php ($data['access_cs'] == 'Y') ? $checked_cs = 'checked' : $checked_cs = ''; ?>
                                                                <input type="checkbox" value="Y"
                                                                       name="access_cs" <?php echo $checked_cs; ?>>
                                                                Customer Service
                                                            </td>
                                                        </tr>
                                                    </table>


                                                </div>

                                            </div>
                                            <div class="col">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label
                                                            for="active"
                                                            style="margin-right: 1rem;"><strong>Aktif</strong></label>
                                                    <?php ($data['active'] == 'Y') ? $active = 'checked' : $active = ''; ?>
                                                    <input type="checkbox" value="Y" name="active"
                                                           id="active" <?php echo $active; ?>>
                                                    Tampilkan modul di bagian menu
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm"
                                                        style="margin-left: 730px;width: 125px; color: #fafafa;"
                                                        type="submit"
                                                >Perbarui
                                                </button>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        break;
} ?>