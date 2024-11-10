<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" />
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
        <?php
            require_once "inc/nav.php";
        ?>

    <header class="container text-center mt-5">
        <h3>Siswa yang Sudah Mendaftar</h3>
    </header>

    <div class="container-md"  align="right">
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </div>

    <br>

    <div class="container-md">
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
        
                <?php
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);
        
                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";
        
                    echo "<td>".$siswa['id']."</td>";
                    echo "<td>".$siswa['nama']."</td>";
                    echo "<td>".$siswa['alamat']."</td>";
                    echo "<td>".$siswa['jenis_kelamin']."</td>";
                    echo "<td>".$siswa['agama']."</td>";
                    echo "<td>".$siswa['sekolah_asal']."</td>";
        
                    echo "<td>";
                    echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> | ";
                    echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
                    echo "</td>";
        
                    echo "</tr>";
                }
                ?>
        
            </tbody>
            </table>
            <p>Total: <?php echo mysqli_num_rows($query) ?></p>
        </div>
    </div>

    

    </body>
</html>
