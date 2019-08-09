-- create database
create database db_restoran_tradisional_bubroto;
use db_restoran_tradisional_bubroto;

-- create schema
-- 1
create table pegawai(
    nip varchar(8) primary key,
    password varchar(50) not null,
    nama_pegawai varchar(50) not null,
    jabatan varchar(30),
    jenis_kelamin enum('L','P') not null
)Engine=InnoDB;

-- 2
create table menu(
    id_menu varchar(8) primary key,
    nip varchar(8),
    kategori varchar(30) not null,
    nama_menu varchar(50) not null,
    harga int(10),
    status varchar(15),

    constraint fk_menu_nip foreign key(nip) references pegawai(nip)

)Engine=InnoDB;

-- 3
create table bahan_baku(
    id_bahan_baku varchar(8) primary key,
    nama_bahan_baku varchar(30) not null,
    stok int(3),
    satuan varchar(10)
)Engine=InnoDB;

-- 4
create table resep(
    id_menu varchar(8) not null,
    id_bahan_baku varchar(8) not null,
    jumlah_bahan int(3) not null,

    constraint fk_resep_idmenu foreign key(id_menu) references menu(id_menu),
    constraint fk_resep_idbahanbaku foreign key(id_bahan_baku) references bahan_baku(id_bahan_baku),

    primary key (id_menu,id_bahan_baku)

)Engine=InnoDB;

-- 5
create table belanja(
    id_belanja varchar(8) primary key,
    nip varchar(8) not null,
    tgl_belanja date not null,
    total_harga int(10) not null,

    constraint fk_belanja_nip foreign key(nip) references pegawai(nip)

)Engine=InnoDB;

-- 6
create table detail_belanja(
    id_belanja varchar(8) not null,
    id_bahan_baku varchar(8) not null,
    harga int(10) not null,
    qty int(3) not null,
    satuan varchar(10),
    tgl_kadaluarsa date,

    constraint fk_detailbelanja_belanja foreign key(id_belanja) references belanja(id_belanja),
    constraint fk_detailbelanja_idbahanbaku foreign key(id_bahan_baku) references bahan_baku(id_bahan_baku),

    primary key (id_belanja, id_bahan_baku)

)Engine=InnoDB;

-- 7
create table meja(
    no_meja varchar(2) primary key ,
    kapasitas varchar(3) not null,
    status_meja varchar(15)
)Engine=InnoDB;

-- 8
create table pesanan(
    no_pesanan varchar(8) primary key,
    nip varchar(8) not null,
    no_meja varchar(2),
    nama_pelanggan varchar(50) not null,
    status_pesanan varchar(15),

    constraint fk_pesanan_nip foreign key(nip) references pegawai(nip),
    constraint fk_pesanan_nomeja foreign key(no_meja) references meja(no_meja)

)Engine=InnoDB;

-- 9
create table detail_pesanan(
    no_pesanan varchar(8),
    id_menu varchar(8) not null,
    qty int(3) not null,
    status_detail_pesanan varchar(15),

    constraint fk_detailpesanan_nopesanan foreign key(no_pesanan) references pesanan(no_pesanan),
    constraint fk_detailpesanan_idmenu foreign key(id_menu) references menu(id_menu),

    primary key(no_pesanan, id_menu)

)Engine=InnoDB;

-- 10
create table pembayaran(
    id_pembayaran varchar(8) primary key,
    no_pesanan varchar(8) not null,
    nip varchar(8) not null,
    tgl_pembayaran timestamp not null,
    total int(10) not null,
    status_pembayaran varchar(15),

    constraint fk_pembayaran_nopesanan foreign key(no_pesanan) references pesanan(no_pesanan),
    constraint fk_pembayaran_nip foreign key(nip) references pegawai(nip)

)Engine=InnoDB;

-- 11
create table kritik_saran(
    id_kritik_saran varchar(8) primary key,
    id_pembayaran varchar(8) not null,
    kritik text,
    saran text,

    constraint fk_kritiksaran_idpembayaran foreign key(id_pembayaran) references pembayaran(id_pembayaran)

)Engine=InnoDB;

-- 12
create table kuisioner(
    id_kuisioner varchar(8) primary key,
    nip varchar(8) not null,
    topik_kuisioner varchar(50) not null,
    aktif enum('Y','N') default 'Y' not null,

    constraint fk_kuisioner_nip foreign key(nip) references pegawai(nip)

)Engine=InnoDB;

-- 13
create table pertanyaan(
    id_pertanyaan varchar(8) primary key,
    id_kuisioner varchar(8) not null,
    pertanyaan varchar(50) not null,

    constraint fk_pertanyaan_idkuisioner foreign key(id_kuisioner) references kuisioner(id_kuisioner)

)Engine=InnoDB;

-- 14
create table pilihan_pertanyaan(
    id_pilihan_pertanyaan varchar(8) primary key,
    id_pertanyaan varchar(8) not null,
    pilihan varchar(30) not null,

    constraint fk_pilihanpertanyaan_idpertanyaan foreign key(id_pertanyaan) references pertanyaan(id_pertanyaan)

)Engine=InnoDB;

-- 15
create table respon(
    id_respon varchar(8) primary key,
    id_pembayaran varchar(8) not null,
    id_pertanyaan varchar(8) not null,
    jawaban varchar(30) not null,

    constraint fk_respon_idpembayaran foreign key(id_pembayaran) references pembayaran(id_pembayaran),
    constraint fk_respon_idpertanyaan foreign key(id_pertanyaan) references pertanyaan(id_pertanyaan)

)Engine=InnoDB;

-- insert data
insert into pegawai(nip, nama_pegawai, jabatan, jenis_kelamin, password) values
('pgw0001', 'Yusrizal Falahan', 'pemilik', 'L',sha1('yusrizal')),
('pgw0002', 'Alif Hermawan', 'koki', 'L',sha1('alif')),
('pgw0003', 'Alwi Yahya Muljabar', 'pantry', 'L',sha1('alwi')),
('pgw0004', 'Teguh Siswanto', 'pelayan', 'L',sha1('teguh')),
('pgw0005', 'Paulo AL Kasir', 'kasir', 'L',sha1('kasir')),
('pgw0006', 'Kosumantri', 'cs', 'P',sha1('kosumantri'));

insert into menu(id_menu, kategori, nama_menu, harga, status) values
('mnu0001','makanan berat','Nasi Goreng',20000,''),
('mnu0002','minuman','Es Kelapa',7000,'');

insert into bahan_baku(id_bahan_baku, nama_bahan_baku, stok, satuan) values
('bbk0001','Beras',null,'kilogram'),
('bbk0002','Bawang Merah',null,'kilogram'),
('bbk0003','Bawang Putih',null,'kilogram'),
('bbk0004','Merica',null,'kilogram'),
('bbk0005','Cabai',null,'kilogram'),
('bbk0006','Kecap',null,'botol'),
('bbk0007','Kelapa',null,'buah'),
('bbk0008','Susu Kental',null,'kaleng');

insert into resep(id_menu, id_bahan_baku, jumlah_bahan) values
('mnu0001','bbk0001',1),
('mnu0001','bbk0002',5),
('mnu0001','bbk0003',3),
('mnu0001','bbk0004',1),
('mnu0001','bbk0005',2),
('mnu0001','bbk0006',1),
('mnu0002','bbk0007',1),
('mnu0002','bbk0008',1);

insert into belanja(id_belanja, nip, tgl_belanja, total_harga) values
('blj0001','pgw0003','2018-09-10',345000),
('blj0002','pgw0003','2018-09-11',100000);

insert into detail_belanja(id_belanja, id_bahan_baku, harga, qty, satuan, tgl_kadaluarsa) values
('blj0001','bbk0001',100000,20,'kilogram','2019-09-10'),
('blj0001','bbk0002',50000,10,'kilogram','2018-12-10'),
('blj0001','bbk0003',40000,10,'kilogram','2018-12-10'),
('blj0001','bbk0004',20000,1,'kilogram','2019-10-10'),
('blj0001','bbk0005',100000,5,'kilogram','2018-11-10'),
('blj0001','bbk0006',35000,1,'botol','2020-09-10'),
('blj0002','bbk0007',40000,10,'buah','2019-01-11'),
('blj0002','bbk0008',60000,5,'kaleng','2020-09-11');

insert into meja(no_meja, kapasitas, status_meja) values
('A1','1','kosong'),
('A2','1','kosong'),
('A3','1','kosong'),
('A4','1','kosong'),
('A5','1','kosong'),
('B1','2','kosong'),
('B2','2','kosong'),
('B3','2','kosong'),
('B4','2','kosong'),
('B5','2','kosong'),
('C1','3','kosong'),
('C2','3','kosong'),
('C3','3','kosong'),
('C4','3','kosong'),
('C5','3','kosong'),
('D1','4','kosong'),
('D2','4','kosong'),
('D3','4','kosong'),
('D4','4','kosong'),
('D5','4','kosong'),
('E1','5','kosong'),
('E2','5','kosong'),
('E3','5','kosong'),
('E4','5','kosong'),
('E5','5','kosong');