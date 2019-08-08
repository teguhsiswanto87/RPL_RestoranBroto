<?php

class Resep
{
    // get list of data from Resep
    function getListResep($condition = "")
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM resep $condition";
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

// get 1 data (ambil 1 record aja berdasarkan No.resep)
    function getItemResep($id_menu)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM resep WHERE id_menu='$id_menu'";
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

// input data resep
    function insertResep($id_menu, $id_bahan_baku, $jumlah_bahan)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO resep(id_menu, id_bahan_baku, jumlah_bahan)
                    VALUES('$id_menu','$id_bahan_baku','$jumlah_bahan') ";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        }
    }

// update data resep
    function updateResep($id_menu, $id_bahan_baku, $jumlah_bahan)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE resep SET jumlah_bahan='$jumlah_bahan'
                                WHERE id_menu='$id_menu' AND id_bahan_baku='$id_bahan_baku' ";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }

//delete 1 data resep
    function deleteResep($id_menu, $id_bahan_baku)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM resep WHERE id_menu='$id_menu' AND id_bahan_baku='$id_bahan_baku'";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }

}

?>