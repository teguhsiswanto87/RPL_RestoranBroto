<?php

class Belanja
{
    // get list of data from Belanja
    function getListBelanja($condition = "")
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM belanja $condition";
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

    // get 1 data (ambil 1 record aja berdasarkan No.belanja)
    function getItemBelanja($id_belanja)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM belanja WHERE id_belanja='$id_belanja'";
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

    // input data belanja
    function insertBelanja($id_belanja, $nip, $tgl_belanja)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO belanja(id_belanja,nip,tgl_belanja, total_harga)
                    VALUES('$id_belanja','$nip','$tgl_belanja',0) ";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        }
    }

    // update data belanja
    function updateBelanja($id_belanja, $tgl_belanja)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE belanja SET tgl_belanja='$tgl_belanja' WHERE id_belanja='$id_belanja'";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }

    //delete 1 data belanja
    function deleteBelanja($id_belanja)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM belanja WHERE id_belanja='$id_belanja'";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }

// get data menu yang terakhir
    function getLastItemBelanja()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM belanja ORDER BY id_belanja DESC LIMIT 1";
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
