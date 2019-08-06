insert into pegawai(nip, nama_pegawai, jabatan, jenis_kelamin, password) values
('pgw0001', 'Yusrizal Falahan', 'pemilik', 'L',sha1('yusrizal')),
('pgw0002', 'Alif Hermawan', 'koki', 'L',sha1('alif')),
('pgw0003', 'Alwi Yahya Muljabar', 'pantry', 'L',sha1('alwi')),
('pgw0004', 'Teguh Siswanto', 'pelayan', 'L',sha1('teguh'));

-- untuk mengelola modul/data menu pada halaman administrator
create table module(
    module_id int primary key auto_increment,
    module_name varchar(50) not null,
    link varchar(50),
    icon varchar(50),
    active enum('Y','N') not null default 'Y',
    access_owner enum('Y','N'),
    access_pantry enum('Y','N'),
    access_chef enum('Y','N'),
    access_waiter enum('Y','N'),
    access_cashier enum('Y','N'),
    access_cs enum('Y','N')
)Engine=InnoDB;

insert into module (module_id, module_name, link, icon, active, access_owner, access_pantry, access_chef, access_waiter, access_cashier, access_cs) values
(1, 'Beranda', '?m=beranda','fa-home','Y','Y','Y','Y','Y','Y','Y'),
(2, 'Pesanan', '?m=pesanan','fa-clipboard-list','Y','Y','N','Y','Y','Y','N'),
(3, 'Meja', '?m=meja','fa-table','Y','Y','N','Y','Y','Y','N'),
(4, 'Dapur', '?m=dapur','fa-utensils','Y','Y','N','Y','Y','Y','N'),
(5, 'Pembayaran', '?m=pembayaran','fa-money-bill-alt','Y','Y','N','N','N','Y','N'),
(6, 'Kuisioner', '?m=kuisioner','fa-clipboard','Y','Y','N','N','N','N','Y'),
(7, 'Laporan', '?m=laporan','fa-book','Y','Y','N','N','N','N','Y'),
(8, 'Module', '?m=module','fa-clone','Y','Y','N','N','N','N','N');
