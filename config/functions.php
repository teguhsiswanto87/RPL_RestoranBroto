<?php
define("DEVELOPMENT", TRUE);
function dbConnect()
{
    $db = new mysqli("localhost", "root", "siswanto123321", "db_restoran_tradisional_bubroto");
    return $db;
}

// fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data)
{
    $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter;
}

// format input buatan
function my_inputformat($str, $space)
{
    if ($space == 1)
        return trim(preg_replace("/\s+/", " ", $str));
    else
        return trim(preg_replace("/\s+/", "", $str));
}

// getListKategori digunakan untuk mengambil seluruh data dari tabel produk
///---------------------------------------------------------------
function getListMeja()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM meja ORDER BY no_meja");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else
            return FALSE;
    } else
        return FALSE;
}

// digunakan untuk mengambil data sebuah produk

///---------------------------------------------------------------
function getDataMenu($id_menu)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT m.nama_menu, 
								m.harga
						 FROM menu m
						 WHERE m.id_menu='$id_menu'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

///---------------------------------------------------------------
function getDataPelanggan($id_pelanggan)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT m.id_pelanggan, 
								m.nama_pelanggan
						 FROM pelanggan m
						 WHERE m.id_pelanggan='$id_pelanggan'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

///---------------------------------------------------------------
function getDataPegawai($nip)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT p.nip, 
								p.password, 
								p.nama_pegawai, 
								p.jabatan, 
								p.jenis_kelamin
						 FROM pegawai p
						 WHERE p.nip='$nip'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

///---------------------------------------------------------------
function getDataPesanan()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT pl.nama_pelanggan, 
								p.no_meja, 
								m.nama_menu,
								dt.jumlah
   						FROM pelanggan pl, pesanan p, menu m, detail_pesanan dt 
   						WHERE pl.id_pelanggan = p.id_pelanggan 
						   	and p.no_pesanan = dt.no_pesanan 
							and dt.id_menu = m.id_menu");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

///---------------------------------------------------------------
// function getDataPesanan($no_pesanan){
// 	$db=dbConnect();
// 	if($db->connect_errno==0){
// 		$res=$db->query("SELECT p.no_pesanan,
// 								p.no_meja,
// 								p.status_pesanan,
// 								m.nama_menu
// 						 FROM pesanan p, detail_pesanan dp, menu m
// 						 WHERE p.no_pesanan = dp.no_pesanan and dp.id_menu = m.id_menu");
// 		if($res){
// 			if($res->num_rows>0){
// 				$data=$res->fetch_assoc();
// 				$res->free();
// 				return $data;
// 			}
// 			else
// 				return FALSE;
// 		}
// 		else
// 			return FALSE; 
// 	}
// 	else
// 		return FALSE;
// }
///---------------------------------------------------------------

// get data from Module (store in side bar administrator web)
function getListModule($status)
{

    //berdasarkan hak akses module (ini berdasarkan nama dari kolom tabel module)
    if ($status == 'pemilik') {
        $akses = 'access_owner';
    } else if ($status == 'pantry') {
        $akses = 'access_pantry';
    } else if ($status == 'koki') {
        $akses = 'access_chef';
    } else if ($status == 'pelayan') {
        $akses = 'access_waiter';
    } else if ($status == 'kasir') {
        $akses = 'access_cashier';
    } else {
        $akses = 'access_cs';
    }

    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM module WHERE active='Y' AND $akses='Y' ");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

///---------------------------------------------------------------
function showError($message)
{
    ?>
    <div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
        <?php echo $message; ?>
    </div>
    <?php
}

?>