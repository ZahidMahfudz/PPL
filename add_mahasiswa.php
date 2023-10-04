<?php
// Include file koneksi ke database
include_once("koneksi.php");

// Inisialisasi variabel pesan
$pesan = "";

// Jika formulir disubmit
if(isset($_POST['submit'])){
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    // Query SQL untuk menambahkan data mahasiswa
    $sql = "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')";

    // Eksekusi query
    if($koneksi->query($sql) === TRUE){
        $pesan = "Data mahasiswa berhasil ditambahkan.";
    } else{
        $pesan = "Error: " . $sql . "<br>" . $koneksi->error;
    }
    
    // Tutup koneksi ke database
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Mahasiswa</title>
</head>
<body>
    <h2>Form Tambah data Mahasiswa ini</h2>
    
    <!-- Tampilkan pesan jika ada -->
    <?php if($pesan != ""){ ?>
        <p><?php echo $pesan; ?></p>
    <?php } ?>

    <!-- Formulir untuk menambahkan data mahasiswa -->
    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" required><br><br>

        <input type="submit" name="submit" value="Tambah Data">
    </form>
</body>
</html>
