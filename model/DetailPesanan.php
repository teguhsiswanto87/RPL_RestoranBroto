<?php

class DetailPesanan
{
    // get list of data from DetailPesanan
    function getListDetailPesanan($condition = "")
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM detail_pesanan $condition";
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

    // get 1 data (ambil 1 record aja berdasarkan No.detail_pesanan)
    function getItemDetailPesanan($no_pesanan, $id_menu)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM detail_pesanan WHERE no_pesanan='$no_pesanan' AND id_menu='$id_menu'";
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

    // input data detail_pesanan
    function insertDetailPesanan($no_pesanan, $id_menu, $qty)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO detail_pesanan(no_pesanan,id_menu, qty)
                    VALUES('$no_pesanan','$id_menu','$qty') ";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        }
    }

    // update data detail_pesanan
    function updateDetailPesanan($id_menu, $id_bahan_baku, $jumlah_bahan)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE detail_pesanan SET jumlah_bahan='$jumlah_bahan'
                                WHERE id_menu='$id_menu' AND id_bahan_baku='$id_bahan_baku' ";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }

    //delete 1 data detail_pesanan
    function deleteDetailPesanan($no_pesanan, $id_menu)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM detail_pesanan WHERE no_pesanan='$no_pesanan$' AND id_menu='$id_menu' ";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }
}
