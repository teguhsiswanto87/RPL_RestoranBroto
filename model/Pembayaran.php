<?php

class Pembayaran
{
    // get list of data from Meja
    function getListPembayaran()
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT pesanan.no_pesanan, pesanan.no_meja, pesanan.nama_pelanggan, pembayaran.nip, pembayaran.status_pembayaran 
                    FROM pembayaran JOIN pesanan ON pesanan.no_pesanan = pembayaran.no_pesanan 
                                    JOIN pegawai ON pembayaran.nip = pegawai.nip";
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

    // get 1 data (ambil 1 record aja berdasarkan No.meja)
    function getItemMeja($no_meja)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "SELECT * FROM meja WHERE no_meja='$no_meja'";
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

    // input data meja
    function insertMeja($no_meja, $kapasitas)
    {
        $conn = dbConnect();
        if ($conn->connect_errno == 0) {
            $sql = "INSERT INTO meja(no_meja,kapasitas,status_meja)
                    VALUES('$no_meja','$kapasitas','kosong') ";
            $res = $conn->query($sql);
            if ($res) return true;
            else return false;
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
