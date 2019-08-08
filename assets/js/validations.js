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

//bikin function lagi utuk validasi yang lainnya