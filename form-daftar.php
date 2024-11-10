<?php
session_start();
if (!isset($_SESSION['ID'])) {
    // Jika pengguna tidak login, redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" />
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>


<body>
        <?php
            require_once "inc/nav.php";
        ?>

    <header class="container text-center mt-5">
        <h3>Pendaftaran Siswa Baru</h3>
    </header>

    <div class="mt-3 container-sm p-2">
        <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
    
            <fieldset class="border p-3 border-black border-2">
            <legend class="float-none w-auto px-3">Formulir Pendaftaran Siswa Baru</legend>
    
                <div class="mb-3 col-sm-6">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jenis_kelamin" required>Jenis Kelamin</label>
                    
                    <br>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                    <br>
                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label" for="agama">Agama</label>
                    <select class="form-select" name="agama" required>
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Atheis</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="sekolah_asal">Sekolah Asal</label>
                    <input type="text" class="form-control" name="sekolah_asal" placeholder="Nama sekolah asal" required/>
                </div>


                <div class="mb-3 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="form-label" for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" required/>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="ijazah">Ijazah </label>
                            <input type="file" class="form-control" name="ijazah" required/>
                        </div>
                    </div>
                </div>



                <div align="right">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <input class="btn btn-primary" type="submit" value="Daftar" name="daftar" />
                </div>
    
            </fieldset>
    
        </form>
    </div>

    </body>
</html>
