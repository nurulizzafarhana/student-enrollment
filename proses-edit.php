<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // Ambil nama file foto dan ijazah lama dari form (jika ada)
    $foto_lama = $_POST['foto_lama'];
    $ijazah_lama = $_POST['ijazah_lama'];

    // Inisialisasi nama file foto dan ijazah yang baru
    $foto_baru = $foto_lama;
    $ijazah_baru = $ijazah_lama;

    // Cek apakah ada file foto baru yang diupload
    if($_FILES['foto']['error'] == 0) {
        // Ganti foto lama dengan foto baru
        $foto_baru = 'foto_' . time() . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload/" . $foto_baru);

        // Hapus foto lama jika ada
        if(file_exists("upload/" . $foto_lama)) {
            unlink("upload/" . $foto_lama);
        }
    }

    // Cek apakah ada file ijazah baru yang diupload
    if($_FILES['ijazah']['error'] == 0) {
        // Ganti ijazah lama dengan ijazah baru
        $ijazah_baru = 'ijazah_' . time() . '.' . pathinfo($_FILES['ijazah']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['ijazah']['tmp_name'], "ijazah/" . $ijazah_baru);

        // Hapus ijazah lama jika ada
        if(file_exists("ijazah/" . $ijazah_lama)) {
            unlink("ijazah/" . $ijazah_lama);
        }
    }

    // Buat query update
    $sql = "UPDATE calon_siswa SET 
            nama='$nama', 
            alamat='$alamat', 
            jenis_kelamin='$jk', 
            agama='$agama', 
            sekolah_asal='$sekolah', 
            foto='$foto_baru', 
            ijazah='$ijazah_baru' 
            WHERE id=$id";

    $query = mysqli_query($db, $sql);

    // Apakah query update berhasil?
    if($query) {
        // Kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php?success');
    } else {
        // Kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}

?>
