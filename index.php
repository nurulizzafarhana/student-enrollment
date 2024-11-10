<?php
session_start();
// if (isset($_SESSION['id'])) {
//     echo "ID User: " . $_SESSION['id'];
// } else {
//     echo "Session tidak ditemukan!";
// }
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" />
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
   

    <nav>
        <?php if(isset($_GET['status'])): ?>
            <p>
                <?php
                    if($_GET['status'] == 'sukses'){
                        echo "Pendaftaran siswa baru berhasil!";
                    } else {
                        echo "Pendaftaran gagal!";
                    }
                ?>
            </p>
        <?php endif; ?>
        <?php
        require_once "inc/nav.php";
        ?>
    </nav>

    <header class="container text-center">
        <h3>Pendaftaran Siswa Baru</h3>
        <h1>SMK Coding - No Ngadat</h1>
    </header>

    </body>
</html>