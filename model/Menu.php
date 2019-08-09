<?php

class Menu
{
    // get list of data from Menu
    function getListMenu($condition = "")
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM menu $condition";
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
    function getItemMenu($id_menu)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM menu WHERE id_menu='$id_menu'";
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
    function insertMenu($id_menu, $kategori, $nama_menu, $harga)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO menu(id_menu, kategori, nama_menu, harga)
                    VALUES('$id_menu','$kategori','$nama_menu','$harga') ";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        }
    }

// update data menu
    function updateMenu($id_menu, $kategori, $nama_menu, $harga)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE menu SET kategori='$kategori',
                                    nama_menu='$nama_menu',
                                    harga='$harga' 
                                WHERE id_menu='$id_menu'";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }

//delete 1 data menu
    function deleteMenu($id_menu)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM menu WHERE id_menu='$id_menu'";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }

// get data menu yang terakhir
    function getLastItemMenu()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM menu ORDER BY id_menu DESC LIMIT 1";
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

// get 1 data based on specific columns
    function getItemMenuBy($column, $value)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM menu WHERE $column='$value'";
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

}

?>