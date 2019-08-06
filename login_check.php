<?php
if (!isset($_POST['btnLogin'])) {
    header("location: index.php?error=5");
} else {
    include "../config/functions.php";
    $conn = dbConnect();

    // fungsi untuk menghindari injeksi dari user yang jahil
    $nip = anti_injection($_POST['nip']);
    $password = anti_injection(sha1($_POST['password']));

    // menghindari sql injection
    $injeksi_nip = $conn->real_escape_string($nip);
    $injeksi_password = $conn->real_escape_string($password);

    // pastikan nip dan password adalah berupa huruf atau angka.
    if (!ctype_alnum($injeksi_nip) OR !ctype_alnum($injeksi_password)) {
        //Login tidak bisa diinjeksi ya...
        header("location: index.php?error=6");
    } else {
        $res = $conn->query("SELECT * FROM pegawai WHERE nip='$nip' AND password='$password'");
        $user_data = $res->fetch_assoc();
        $row_cnt = $res->num_rows;

        // Apabila nip dan password ditemukan (benar) & hanya satu
        if ($row_cnt == 1) {
            session_start();

            // bikin variabel session
            $_SESSION['nip'] = $user_data['nip'];
            $_SESSION['password'] = $user_data['password'];
            $_SESSION['nama'] = $user_data['nama_pegawai'];
            $_SESSION['jabatan'] = $user_data['jabatan'];

            // bikin id_session yang unik dan mengupdatenya agar saat login langsung berubah
            // agar user biasa sulit untuk mengganti password Administrator
            $sid_lama = session_id();
            session_regenerate_id();
            $sid_baru = session_id();
            $conn->query("UPDATE pegawai SET id_session='$sid_baru' WHERE nip='$nip'");

            //langsung direct ke modul
//            header("location:media.php?m=module");
            header("location:pesanan.php");
        } else {
            header("location: index.php?error=1");
        }
    }
}
?>