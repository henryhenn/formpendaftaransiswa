<?php

include 'config/config.php';

if (isset($_POST['submit'])) {
    // var_dump($_FILES);
    if (empty($_FILES['rapor_smp']) || empty($_FILES['surat_keterangan']) || empty($_FILES['ijazah']) || empty($_FILES['kartu_keluarga']) || empty($_FILES['foto_siswa'])) {
        session_start();
        $_SESSION['error'] = $_FILES == null;
        header("Location: pendaftaran.php");
    }

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kota = $_POST['kota'];
    $kode_pos = $_POST['kode_pos'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $diterima_di_kelas = $_POST['diterima_di_kelas'];
    $anak_ke = $_POST['anak_ke'];
    $saudara = $_POST['saudara'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $nama_ayah = $_POST['nama_ayah'];
    $alamat_ayah = $_POST['alamat_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $alamat_ibu = $_POST['alamat_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];

    // ambil nama asli file rapor
    $rapor_smp = $FILES['rapor_smp']['name'];
    // ambil nama sementara file rapor
    $raporsementara = $_FILES['rapor_smp']['tmp_name'];
    // direktori upload file
    $dirRapor = "rapor/";
    // pindahkan file ke direktori
    $uploadrapor = move_uploaded_file($raporsementara, $dirRapor . $rapor_smp);

    // ambil nama asli file surat keterangan
    $surat_keterangan = $_FILES['surat_keterangan']['name'];
    // ambil nama sementara file surat keterangan
    $suratSementara = $_FILES['surat_keterangan']['tmp_name'];
    // direktori upload file
    $dirSurat = "suratketerangan/";
    // pindahkan file ke direktori
    $uplaodsurat = move_uploaded_file($suratSementara, $dirSurat . $surat_keterangan);

    // ambil nama asli file ijazah
    $ijazah = $_FILES['ijazah']['name'];
    // ambil nama sementara file ijazah
    $ijazahSementara = $_FILES['ijazah']['tmp_name'];
    // direktori upload
    $dirIjazah = "ijazah/";
    // pindahkan file ke direktori
    $uploadijazah = move_uploaded_file($ijazahSementara, $dirIjazah . $ijazah);

    // ambil nama asli file kartu keluarga
    $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
    // ambil nama sementara kartu keluarga
    $kartukelSementara = $_FILES['kartu_keluarga']['tmp_name'];
    // direktori upload
    $dirKartuKel = "kartukeluarga/";
    // pindahkan file ke direktori
    $uploadkartukel = move_uploaded_file($kartukelSementara, $dirKartuKel . $kartu_keluarga);

    // ambil nama asli file foto siswa
    $foto_siswa = $_FILES['foto_siswa']['name'];
    // ambil nama sementara file foto siswa
    $fotoSementara = $_FILES['foto_siswa']['tmp_name'];
    // direktori upload file
    $dirFoto = "fotosiswa/";
    // pindahkan file ke direktori
    $uplaodfoto = move_uploaded_file($fotoSementara, $dirFoto . $foto_siswa);

    $sql = "INSERT INTO siswa VALUES(0, '$nama', '$alamat', '$jenis_kelamin','$kota','$kode_pos','$tempat_lahir','$tanggal_lahir','$diterima_di_kelas','$anak_ke','$saudara','$asal_sekolah','$nama_ayah','$alamat_ayah','$pekerjaan_ayah','$nama_ibu','$alamat_ibu','$pekerjaan_ibu','$dirRapor$rapor_smp','$dirSurat$surat_keterangan','$dirIjazah$ijazah','$dirKartuKel$kartu_keluarga','$dirFoto$foto_siswa')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        session_start();
        $_SESSION['siswa'] = $_POST;
        $_SESSION['berhasil'] = "Siswa Berhasil diterima di kelas " . $_POST['diterima_di_kelas'] . " !";
        header("Location: berhasil.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru SMA</title>
    <style>
        body {
            margin: 20px;
            font-family: sans-serif;
        }

        fieldset {
            padding: 40px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <header>
        <h2>Formulir Pendaftaran Siswa Baru</h2>
    </header>

    <fieldset>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            foreach ($_SESSION['error'] as $nama) {
                echo "$nama";
            }
        }
        ?>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <h3>Biodata</h3>
            <div class="input-group">
                <label for="nama">Nama Siswa:</label>
                <input type="text" required name="nama" id="nama">
            </div>
            <div class="input-group">
                <label for="alamat">Alamat:</label>
                <textarea required name="alamat" id="alamat" cols="30" rows="5"></textarea>
            </div>
            <div class="input-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <input type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin">&nbsp; Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin">&nbsp; Perempuan
            </div>
            <div class="input-group">
                <label for="kota">Kota:</label>
                <input type="text" required name="kota" id="kota">
            </div>
            <div class="input-group">
                <label for="kode_pos">Kode Pos:</label>
                <input type="number" required name="kode_pos" id="kode_pos">
            </div>
            <div class="input-group">
                <label for="tempat">Tempat, Tanggal Lahir:</label>
                <input type="text" required name="tempat_lahir" id="tempat_lahir">
                <input type="date" required name="tanggal_lahir" id="tanggal_lahir">
            </div>
            <div class="input-group">
                <label for="diterima_di_kelas">Diterima di Kelas:</label>
                <select required name="diterima_di_kelas" id="diterima_di_kelas">
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="input-group">
                <label for="anak_ke">Anak Ke-:</label>
                <input type="text" required name="anak_ke" id="anak_ke">
                <label for="dari_bersaudara">Dari:</label>
                <input type="text" required name="saudara" id="saudara">
                <span>Bersaudara</span>
            </div>
            <div class="input-group">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" required name="asal_sekolah" id="asal_sekolah">
            </div>
            <div class="input-group">
                <label for="nama_ayah">Nama Ayah:</label>
                <input type="text" required name="nama_ayah" id="nama_ayah">
            </div>
            <div class="input-group">
                <label for="alamat_ayah">Alamat Ayah:</label>
                <textarea required name="alamat_ayah" id="alamat_ayah" cols="30" rows="5"></textarea>
            </div>
            <div class="input-group">
                <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
                <input type="text" required name="pekerjaan_ayah" id="pekerjaan_ayah">
            </div>
            <div class="input-group">
                <label for="nama_ibu">Nama Ibu:</label>
                <input type="text" required name="nama_ibu" id="nama_ibu">
            </div>
            <div class="input-group">
                <label for="alamat_ibu">Alamat Ibu:</label>
                <textarea required name="alamat_ibu" id="alamat_ibu" cols="30" rows="5"></textarea>
            </div>
            <div class="input-group">
                <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
                <input type="text" required name="pekerjaan_ibu" id="pekerjaan_ibu">
            </div>
            <h3>Dokumen Wajib</h3>
            <div class="input-group">
                <label for="rapor_smp">Buku Rapor SMP/Sederajat:</label>
                <input type="file" multiple="multiple" required name="rapor_smp" id="rapor_smp">
                <span class="error"><?= $raporError ?></span>
            </div>
            <div class="input-group">
                <label for="surat_keterangan">Surat Keterangan Nilai Rapor Setiap Jenjang SMP:</label>
                <input type="file" required name="surat_keterangan" id="surat_keterangan">
                <span class="error"><?= $suratError ?></span>
            </div>
            <div class="input-group">
                <label for="ijazah">Ijazah SMP/Sederajat:</label>
                <input type="file" required name="ijazah" id="ijazah">
                <span class="error"><?= $ijazahError ?></span>

            </div>
            <div class="input-group">
                <label for="kartu_keluarga">Kartu Keluarga:</label>
                <input type="file" required name="kartu_keluarga" id="kartu_keluarga">
                <span class="error"><?= $kartuKelError ?></span>

            </div>
            <div class="input-group">
                <label for="foto_siswa">Foto Siswa:</label>
                <input type="file" required name="foto_siswa" id="foto_siswa">
                <span class="error"><?= $fotoError ?></span>

            </div>

            <button type="submit" required name="submit">Daftar</button>
            <button type="reset">Kosongkan Form</button>
        </form>
    </fieldset>

</body>

</html>