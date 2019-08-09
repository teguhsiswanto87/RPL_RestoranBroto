<?php

class Pesanan
{
    // get list of data from Pesanan
    function getListPesanan()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM pesanan";
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

    // get list of data from Pesanan
    function getItemPesanan($no_pesanan)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM pesanan WHERE no_pesanan='$no_pesanan'";
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

    function getListMenuPesan($condition = "")
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

    // input data meja
    function insertPesananMeja($no_pesanan, $nip, $no_meja, $nama_pelanggan)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO pesanan(no_pesanan,nip,no_meja,nama_pelanggan)
                    VALUES('$no_pesanan','$nip','$no_meja','$nama_pelanggan') ";
            $res = $conn->query($sql);
            $this->updatePesananMeja($no_meja, "terisi");
            if ($res) return true;
            else return false;
        }
    }

    // update data meja
    function updatePesananMeja($no_meja, $status_meja)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE meja SET status_meja='$status_meja' WHERE no_meja='$no_meja'";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }

    // update data meja
    function updateMeja($no_meja, $kapasitas)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "UPDATE meja SET kapasitas='$kapasitas' WHERE no_meja='$no_meja'";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }

    // get data menu yang terakhir
    function getLastItemPesanan()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM pesanan ORDER BY no_pesanan DESC LIMIT 1";
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

    //delete 1 data meja
    function deleteMeja($no_meja)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "DELETE FROM meja WHERE no_meja='$no_meja'";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
        } else {
            return false;
        }
    }


    // get jumlah total data Meja --------------------------------------
    function getCountTotalData($condition = "") //beri value kosong jika function tidak menyertakan parameternya
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT count(no_meja) as jumlahMeja FROM meja $condition";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    // get total kapasitas yang ada
    function getCountTotalKapasitas()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT sum(kapasitas) as totalKapasitas FROM meja ";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    // cek no_meja, apakah ada yang sama ?
    function isNoMejaExist($no_meja)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT no_meja FROM meja WHERE no_meja='$no_meja'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
            $row_cnt = $res->num_rows;
            if ($row_cnt == 1) {
                return true;
            }
        } else {
            return false;
        }
    }
}