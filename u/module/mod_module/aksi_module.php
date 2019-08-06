<?php

include "../../../config/functions.php";
include "../../../model/Modul.php";

$m = $_GET['m'];
$act = $_GET['act'];
$module = new Module();
$conn = dbConnect();
// input modul
if ($m === 'module' && $act == 'tambah') {
    $module_name = $conn->real_escape_string(my_inputformat(anti_injection($_POST['module_name']), 1));
    $link = $conn->real_escape_string(my_inputformat(anti_injection($_POST['link']), 0));
    $icon = $conn->real_escape_string(my_inputformat(anti_injection($_POST['icon']), 1));
    $active = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['active']) ? $_POST['active'] : 'N'), 0));
    $access_owner = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_owner']) ? $_POST['access_owner'] : 'N'), 0));
    $access_pantry = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_pantry']) ? $_POST['access_pantry'] : 'N'), 0));
    $access_chef = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_chef']) ? $_POST['access_chef'] : 'N'), 0));
    $access_waiter = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_waiter']) ? $_POST['access_waiter'] : 'N'), 0));
    $access_cashier = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_cashier']) ? $_POST['access_cashier'] : 'N'), 0));
    $access_cs = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_cs']) ? $_POST['access_cs'] : 'N'), 0));

    $insert = $module->insertModule($module_name, '?m=' . $link, $icon, $active, $access_owner, $access_pantry, $access_chef, $access_waiter, $access_cashier, $access_cs);
    if ($insert) {
        header("location: ../../media.php?m=" . $m . "&info=1");
    } else {
        echo "Gagal Memasukkan data $m ";
    }
} elseif ($m == 'module' && $act == 'update') {
    $module_id = $conn->real_escape_string(my_inputformat(anti_injection($_POST['id']), 0));
    $module_name = $conn->real_escape_string(my_inputformat(anti_injection($_POST['module_name']), 1));
    $link = $conn->real_escape_string(my_inputformat(anti_injection($_POST['link']), 0));
    $icon = $conn->real_escape_string(my_inputformat(anti_injection($_POST['icon']), 1));
    $active = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['active']) ? $_POST['active'] : 'N'), 0));
    $access_owner = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_owner']) ? $_POST['access_owner'] : 'N'), 0));
    $access_pantry = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_pantry']) ? $_POST['access_pantry'] : 'N'), 0));
    $access_chef = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_chef']) ? $_POST['access_chef'] : 'N'), 0));
    $access_waiter = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_waiter']) ? $_POST['access_waiter'] : 'N'), 0));
    $access_cashier = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_cashier']) ? $_POST['access_cashier'] : 'N'), 0));
    $access_cs = $conn->real_escape_string(my_inputformat(anti_injection(isset($_POST['access_cs']) ? $_POST['access_cs'] : 'N'), 0));

    $update = $module->updateModule($module_id, $module_name, '?m=' . $link, $icon, $active, $access_owner, $access_pantry, $access_chef, $access_waiter, $access_cashier, $access_cs);
    if ($update) {
        header("location: ../../media.php?m=" . $m . "&info=2");
    } else {
        echo "Gagal memperbarui data $m";
    }
} elseif ($m == 'module' && $act == 'hapus') {
    $delete = $module->deleteModule($_GET['id']);
    if ($delete) {
        header("location: ../../media.php?m=" . $m . "&info=3");
    } else {
        echo "Gagal menghapus data $m ID=$_GET[id]";
    }
} else {
    echo "gagal berak_si";
}
