//validasi kelola meja
function mejaValidation() {
    var no_meja = document.formMeja.no_meja.value.trim();
    var kapasitas = document.formMeja.kapasitas.value.trim();

    //jika no_meja kosong
    if (no_meja.length == 0) {
        alert("Nomor Meja tidak boleh kosong");
        document.formMeja.no_meja.focus();
        return false;
    }
    //pastikan no_meja hanya mengandung huruf dan angka
    var regex = /^[A-Za-z0-9]+$/;
    if (!regex.test(no_meja)) {
        alert("Nomor Meja harus berupa huruf dan/atau angka saja");
        document.formMeja.no_meja.focus();
        return false;
    }

    //jika no_meja lebih dari 2 digit
    if (no_meja.length > 2) {
        alert("Nomor Meja tidak boleh lebih dari 2 digit");
        document.formMeja.no_meja.focus();
        return false;
    }

    //jika kapasitas kosong
    if (kapasitas.length == 0) {
        alert("Kapasitas tidak boleh kosong");
        document.formMeja.kapasitas.focus();
        return false;
    }

    //pastikan kapasitas berupa angka saja
    var regex = /^[0-9]+$/;
    if (!regex.test(kapasitas)) {
        alert("Kapasitas harus berupa angka saja");
        document.formMeja.kapasitas.focus();
        return false;
    }

    //jika kapasitas lebih dari 3 digit
    if (kapasitas.length > 3) {
        alert("Kapasitas tidak boleh leboh dari 3 digit");
        document.formMeja.kapasitas.focus();
        return false;
    }

    //jika kapasitas bernilai negatif
    if (parseInt(kapasitas) < 1) {
        alert("Kapasitas tidak valid");
        document.formMeja.kapasitas.focus();
        return false;
    }
}

//validasi kelola menu
function menuValidation() {
    var harga = document.formMenu.harga.value.trim();
    var nama_menu = document.formMenu.nama_menu.value.trim();

    //jika harga kosong
    if (harga.length == 0) {
        alert("Harga tidak boleh kosong");
        document.formMenu.harga.focus();
        return false;
    }
    //pastikan harga hanya mengandung huruf dan angka
    var regexAngka = /^[0-9]+$/;
    if (!regexAngka.test(harga)) {
        alert("Harga harus berupa angka saja");
        document.formMenu.harga.focus();
        return false;
    }

    //jika harga lebih dari 2 digit
    if (harga.length > 10) {
        alert("Harga tidak boleh lebih dari 10 digit");
        document.formMenu.harga.focus();
        return false;
    }

    //jika nama_menu bernilai negatif
    if (parseInt(harga) < 1) {
        alert("Harga tidak valid");
        document.formMenu.nama_menu.focus();
        return false;
    }

    //jika nama_menu kosong
    if (nama_menu.length == 0) {
        alert("Nama menu tidak boleh kosong");
        document.formMenu.nama_menu.focus();
        return false;
    }

    //pastikan nama_menu berupa angka saja
    var regexAngkaHuruf = /^[A-Za-z0-9\s]+$/;
    var regexHuruf = /^[A-Za-z\s]+$/;
    if (!regexAngkaHuruf.test(nama_menu) && !regexHuruf.test(nama_menu)) {
        alert("Nama menu harus berupa huruf dan/atau angka saja");
        document.formMenu.nama_menu.focus();
        return false;
    }

}

//validasi kelola menu
function resepValidation() {
    var jumlah_bahan = document.formResep.jumlah_bahan.value.trim();

    //jika jumlah_bahan kosong
    if (jumlah_bahan.length == 0) {
        alert("Jumlah Bahan tidak boleh kosong");
        document.formResep.jumlah_bahan.focus();
        return false;
    }
    //pastikan jumlah_bahan hanya mengandung huruf dan angka
    var regexAngka = /^[0-9]+$/;
    if (!regexAngka.test(jumlah_bahan)) {
        alert("Jumlah Bahan harus berupa angka saja");
        document.formResep.jumlah_bahan.focus();
        return false;
    }

    //jika jumlah_bahan lebih dari 2 digit
    if (jumlah_bahan.length > 3) {
        alert("Jumlah Bahan tidak boleh lebih dari 3 digit");
        document.formResep.jumlah_bahan.focus();
        return false;
    }

    //jika nama_menu bernilai negatif
    if (parseInt(jumlah_bahan) < 1) {
        alert("Jumlah Bahan tidak valid");
        document.formResep.jumlah_bahan.focus();
        return false;
    }

}

//validasi kelola menu
function bahanBakuValidation() {
    var nama_bahan_baku = document.formBahanBaku.nama_bahan_baku.value.trim();

    //jika nama_bahan_baku kosong
    if (nama_bahan_baku.length == 0) {
        alert("Nama bahan baku tidak boleh kosong");
        document.formBahanBaku.nama_bahan_baku.focus();
        return false;
    }
    //pastikan nama_bahan_baku hanya mengandung huruf dan/atau angka
    var regexAngkaHuruf = /^[A-Za-z0-9\s]+$/;
    var regexHuruf = /^[A-Za-z\s]+$/;
    if (!regexAngkaHuruf.test(nama_bahan_baku) && !regexHuruf.test(nama_bahan_baku)) {
        alert("Nama bahan baku tidak boleh mengandung simbol");
        document.formBahanBaku.nama_bahan_baku.focus();
        return false;
    }

    //jika nama_bahan_baku lebih dari 2 digit
    if (nama_bahan_baku.length > 30) {
        alert("Nama bahan baku tidak boleh lebih dari 30 digit");
        document.formBahanBaku.nama_bahan_baku.focus();
        return false;
    }

}

//bikin function lagi utuk validasi yang lainnya