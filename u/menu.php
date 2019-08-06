<?php
if (empty($_SESSION['nip']) && empty($_SESSION['password'])) {
    header("location:index.php?error=8");
} else {
    $dataModule = getListModule($_SESSION['jabatan']);
    //style

    foreach ($dataModule as $data) {
        $module_name = substr($data['link'], 3);
        ($_GET['m'] == $module_name) ? $active = "active" : $active = "";
        $list_active = ($_GET['m'] == $module_name) ? "#1F3143" : "";
        echo "<li class='nav-item' style='background: $list_active' role = 'presentation' >
                <a class='nav-link $active' href = '$data[link]' ><i class='fas $data[icon]' ></i ><span > $data[module_name]</span ></a >
              </li >";
    }
}
