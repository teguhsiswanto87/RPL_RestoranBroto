<?php

class DetailBelanja
{
    // get list of data from DetailBelanja
    function getListDetailBelanja($condition = "")
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM detail_belanja $condition";
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

    // get 1 data (ambil 1 record aja berdasarkan No.detail_belanja)
    function getItemDetailBelanja($id_belanja, $id_bahan_baku)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM detail_belanja WHERE id_belanja='$id_belanja' AND id_bahan_baku='$id_bahan_baku'";
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

    // input data detail_belanja
    function insertDetailBelanja($id_belanja, $id_bahan_baku, $harga, $qty, $satuan, $tgl_kadaluarsa)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO detail_belanja(id_belanja,id_bahan_baku, harga, qty, satuan, tgl_kadaluarsa)
                    VALUES('$id_belanja','$id_bahan_baku','$harga','$qty','$satuan','$tgl_kadaluarsa') ";
            $res = $conn->query($sql);

            $bahanBaku = $this->getItemDetailBelanja($id_belanja, $id_bahan_baku);
            (int)$stok = (int)$bahanBaku['stok'] + (int)$qty;

            $this->updateStokBahanBaku($id_bahan_baku, $stok);

            if ($res) return true;
            else return false;
        }
    }

    // update data detail_belanja
    function updateStokBahanBaku($id_bahan_baku, $qty)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE bahan_baku SET stok=stok+'$qty'
                                WHERE id_bahan_baku='$id_bahan_baku' ";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }

    // update data detail_belanja
    function updateDetailBelanja($id_belanja, $id_bahan_baku, $harga, $qty, $satuan, $tgl_kadaluarsa)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE detail_belanja SET harga='$harga',
                                              qty='$qty',
                                              satuan='$satuan',
                                              tgl_kadaluarsa='$tgl_kadaluarsa'
                                WHERE id_belanja='$id_belanja' AND id_bahan_baku='$id_bahan_baku' ";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }

    //delete 1 data detail_belanja
    function deleteDetailBelanja($id_belanja, $id_bahan_baku)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM detail_belanja WHERE id_belanja='$id_belanja$' AND id_bahan_baku='$id_bahan_baku' ";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }

}
