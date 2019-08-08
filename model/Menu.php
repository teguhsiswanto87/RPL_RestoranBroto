<?php


class Menu
{
    // get list of data from Menu
    function getListMenu()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM menu";
            $res = $conn->query($sql);
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

// get 1 data (ambil 1 record aja berdasarkan No.menu)
    function getItemMenu($no_menu)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM menu WHERE no_menu='$no_menu'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
            $row_cnt = $res->num_rows;
            if ($row_cnt == 1) {
                return $data;
            }
        } else {
            return false;
        }
    }

// input data menu
    function insertMenu($no_menu, $kapasitas)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO menu(no_menu,kapasitas)
                    VALUES('$no_menu','$kapasitas') ";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        }
    }

// update data menu
    function updateMenu($no_menu, $kapasitas)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE menu SET kapasitas='$kapasitas' WHERE no_menu='$no_menu'";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }

//delete 1 data menu
    function deleteMenu($no_menu)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM menu WHERE no_menu='$no_menu'";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }

}

?>