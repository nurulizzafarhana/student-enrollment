<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" />
    <title>Formulir Edit Siswa | SMK Coding</title>
</head>

<body>
        <?php
            require_once "inc/nav.php";
        ?>

    <header class="container text-center mt-5">
        <h3>Formulir Edit Siswa</h3>
    </header>

    <div class="mt-3 container-sm p-2">
        <form action="proses-edit.php" method="POST" enctype="multipart/form-data">
    
            <fieldset class="border p-3 border-black border-2">
            <legend class="float-none w-auto px-3">Edit Formulir</legend>
    
                <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
    
                <div class="mb-3 col-sm-6">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $siswa['nama'] ?>" required />
                </div>

                <div class="mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat"><?php echo $siswa['alamat'] ?></textarea>
                </div>

                <div class="mb-3 col-sm-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <?php $jk = $siswa['jenis_kelamin']; ?>
                <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($jk == 'Laki-laki') ? "checked": "" ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jk == 'Perempuan') ? "checked": "" ?>> Perempuan</label>
                </div>

                <div class="mb-3 col-sm-6">
                    <label for="agama">Agama</label>
                    <?php $agama = $siswa['agama']; ?>
                    <select class="form-select" name="agama">
                        <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                        <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                        <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                        <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                        <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-6">
                    <label for="sekolah_asal">Sekolah Asal: </label>
                    <input class="form-control" type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
                </div>

            

                <div class="mb-3 col-sm-12">
                    <div class="row">
                        <!-- Menambahkan label dan input untuk foto -->
                            <div class="mb-3 col-sm-6">
                                <label for="foto">Foto:</label><br>
                                <?php if (!empty($siswa['foto'])): ?>
                                    <img src="upload/<?php echo $siswa['foto']; ?>" alt="Foto Siswa" style="max-width: 150px; max-height: 150px;"><br>
                                    <small>Foto yang diunggah sebelumnya.</small><br>
                                <?php endif; ?>
                                <input type="file" name="foto" class="form-control" />
                            </div>

                            <!-- Menambahkan label dan input untuk ijazah -->
                            <div class="mb-3 col-sm-6">
                                <label for="ijazah">Ijazah:</label><br>
                                <?php if (!empty($siswa['ijazah'])): ?>
                                    <a href="ijazah/<?php echo $siswa['ijazah']; ?>" target="_blank">Lihat Ijazah (PDF)</a><br>
                                    <small>Ijazah yang diunggah sebelumnya.</small><br>
                                <?php endif; ?>
                                <input type="file" name="ijazah" class="form-control" />
                            </div>

                    </div>
                </div>
                
          
            <p>
                <a href="list-siswa.php" class="btn btn-dark">Kembali</a>
                <input class="btn btn-primary" type="submit" value="Simpan" name="simpan" />
            </p>
    
            </fieldset>
        </form>
    </div>


    </body>
</html>
