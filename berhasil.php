<?php session_start();
if (!isset($_SESSION['siswa'])) header("Location: pendaftaran.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat datang, <?= $_SESSION['siswa']['nama'] ?></title>
    <style>
        body {
            margin: 20px;
            font-family: sans-serif;
        }

        img {
            width: 300px;
        }

        .wrapper {
            padding: 15px;
        }
    </style>
</head>

<body>
    <fieldset>
        <?= $_SESSION['berhasil'] ?>
        <img src="<?= $_SESSION['siswa']['foto_siswa'] ?>">
        <a href="pendaftaran.php">Kembali</a>
        <div class="wrapper">
            <li>Nama: <?= $_SESSION['siswa']['nama'] ?></li>
            <li>Alamat: <?= $_SESSION['siswa']['alamat'] ?></li>
            <li>Jenis Kelamin: <?= $_SESSION['siswa']['jenis_kelamin'] ?></li>
            <li>Kota : <?= $_SESSION['siswa']['kota'] ?></li>
            <li>Kode Pos: <?= $_SESSION['siswa']['kode_pos'] ?></li>
            <li>Tempat, Tanggal Lahir: <?= $_SESSION['siswa']['tempat_lahir'] ?>, <?= $_SESSION['siswa']['tanggal_lahir'] ?></li>
            <li>Diterima di Kelas: <?= $_SESSION['siswa']['diterima_di_kelas'] ?></li>
            <li>Anak Ke-: <?= $_SESSION['siswa']['anak_ke'] ?> dari <?= $_SESSION['siswa']['saudara'] ?> bersaudara</li>
            <li>Asal Sekolah: <?= $_SESSION['siswa']['asal_sekolah'] ?></li>
            <li>Nama Ayah: <?= $_SESSION['siswa']['nama_ayah'] ?></li>
            <li>Alamat Ayah: <?= $_SESSION['siswa']['alamat_ayah'] ?></li>
            <li>Pekerjaan Ayah: <?= $_SESSION['siswa']['pekerjaan_ayah'] ?></li>
            <li>Nama Ibu: <?= $_SESSION['siswa']['nama_ibu'] ?></li>
            <li>Alamat Ibu: <?= $_SESSION['siswa']['alamat_ibu'] ?></li>
            <li>Pekerjaan Ibu: <?= $_SESSION['siswa']['pekerjaan_ibu'] ?></li>
        </div>
    </fieldset>
</body>

</html>