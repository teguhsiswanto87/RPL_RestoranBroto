<?php
$konek = mysqli_connect("localhost", "root", "", "db_restoran_tradisional_bubroto");
include_once "../functions.php";
include_once "../model/BahanBaku.php";
$bahanBaku = new BahanBaku();

if (isset($_POST["query"])) {

    $output = ' ';
    $sql = "select * from bahan_baku where nama_bahan_baku like '%" . $_POST["query"] . "%' ";
    $result = mysqli_query($konek, $sql);
    $output = '<ul class="list-group">';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<li class="list-group-item list-group-item-action" style="cursor: pointer;">' . $row["nama_bahan_baku"] . '</li>';
        }
    } else {
        $output .= '<li class="list-group-item list-group-item-action disabled" style="cursor: pointer;">Bahan Baku Tidak Ditemukan</li>';
    }
    $output .= '</ul>';
    echo $output;
}

//$dataBahanBaku = $bahanBaku->getListBahanBaku("where nama_bahan_baku like '%$_POST[query]%' ");
//
//$bahanBakuArray = array();
//foreach ($dataBahanBaku as $dbb) {
//    $bahanBakuArray[] = $dbb['nama_bahan_baku'];
//}
//echo json_encode($bahanBakuArray);

?>
<style>
    /*.list-group-item : hover {*/
    /*    background: #0f6848;*/
    /**/
    /*}*/
</style>
