<?php
session_start();

include("config.php");

// Cek apakah pengguna sudah login
if (!isset($_SESSION['ID'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: login.php");
    exit();
}

if (isset($_POST['daftar'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];
    
    // Ambil id_user dari session
    $id_user = $_SESSION['ID']; // Pastikan id_user ada di session

    // Variabel untuk menyimpan nama file yang akan disimpan di database
    $nama_foto_unik = null;
    $nama_ijazah_unik = null;

    // Proses upload foto
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);
        $nama_foto_unik = uniqid() . '.' . $extFoto;
        
        // Validasi ekstensi foto
        $ext = array('png', 'jpg', 'jpeg');
        if (!in_array($extFoto, $ext)) {
            echo "Ekstensi foto tidak sesuai. Ekstensi yang diizinkan: " . implode(", ", $ext);
            exit;
        }
        
        // Pindahkan file foto ke folder 'upload/'
        move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto_unik);
    }

    // Proses upload ijazah (hanya menerima .pdf)
    if (!empty($_FILES['ijazah']['name'])) {
        $nama_ijazah = $_FILES['ijazah']['name'];
        $extIjazah = pathinfo($nama_ijazah, PATHINFO_EXTENSION);
        $nama_ijazah_unik = uniqid() . '.' . $extIjazah;
        
        // Validasi ekstensi ijazah (hanya pdf)
        if ($extIjazah !== 'pdf') {
            echo "Ekstensi ijazah tidak sesuai. Hanya file PDF yang diizinkan.";
            exit;
        }
        
        // Pindahkan file ijazah ke folder 'ijazah/'
        move_uploaded_file($_FILES['ijazah']['tmp_name'], 'ijazah/' . $nama_ijazah_unik);
    }
    
    // Simpan data pendaftaran ke dalam tabel calon_siswa
    $query = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto, ijazah, id_user) 
              VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal', '$nama_foto_unik', '$nama_ijazah_unik', '$id_user')";
    
    // Eksekusi query dan cek hasilnya
    $result = mysqli_query($db, $query);
    
    if ($result) {
        // Redirect dengan status success
        header("Location: form-daftar.php?success");
    } else {
        // Redirect dengan status error
        header("Location: form-daftar.php?error");
    }
}
?>
