create database pendaftaransma;
use pendaftaransma;

CREATE TABLE siswa (
	id int(4) primary key auto_increment,
    nama varchar(55),
    alamat text,
    jenis_kelamin varchar(20),
    kota varchar (50),
    kode_pos int(20),
    tempat_lahir varchar(100),
    tanggal_lahir date,
    diterima_di_kelas varchar(5),
    anak_ke varchar(3),
    saudara varchar(3),
    asal_sekolah varchar(100),
    nama_ayah varchar(55),
    alamat_ayah text,
    pekerjaan_ayah varchar(55),
    nama_ibu varchar(55),
    alamat_ibu text,
    pekerjaan_ibu varchar(55),
    rapor_smp varchar(255),
    surat_keterangan varchar(255),
    ijazah varchar(255),
    kartu_keluarga varchar(255),
    foto_siswa varchar(255)
)engine = InnoDB;