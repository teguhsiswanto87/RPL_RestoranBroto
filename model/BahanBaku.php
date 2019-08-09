<?php

class BahanBaku
{
    // get list of data from BahanBaku
    function getListBahanBaku($condition = "")
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM bahan_baku $condition";
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

// get 1 data (ambil 1 record aja berdasarkan ID.bahan_baku)
    function getItemBahanBaku($id_bahan_baku)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM bahan_baku WHERE id_bahan_baku='$id_bahan_baku'";
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

// input data bahan_baku
    function insertBahanBaku($id_bahan_baku, $nama_bahan_baku, $satuan)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO bahan_baku(id_bahan_baku, nama_bahan_baku, satuan)
                    VALUES('$id_bahan_baku','$nama_bahan_baku','$satuan')";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        }
    }

// update data bahan_baku
    function updateBahanBaku($id_bahan_baku, $nama_bahan_baku, $stok, $satuan)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE bahan_baku SET nama_bahan_baku='$nama_bahan_baku',
                                            stok='$stok',
                                            satuan='$satuan'
                                WHERE id_bahan_baku='$id_bahan_baku' ";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }

//delete 1 data bahan_baku
    function deleteBahanBaku($id_bahan_baku)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM bahan_baku WHERE id_bahan_baku='$id_bahan_baku' ";
            $res = $conn->query($sql);
            if ($res) return true; else return false;
        } else {
            return false;
        }
    }

// get 1 data berdasarkan column tertentu
    function getItemBahanBakuBy($column, $value)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM bahan_baku WHERE $column='$value'";
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

    // get data menu yang terakhir
    function getLastItemBahanBaku()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM bahan_baku ORDER BY id_bahan_baku DESC LIMIT 1";
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