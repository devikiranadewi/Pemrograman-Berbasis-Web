<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Menu</title>
</head>
<body>

<h2>Tambah Menu Kopi</h2>

<form method="POST" enctype="multipart/form-data">
  <input type="text" name="nama" placeholder="Nama Kopi" required><br><br>
  <input type="number" name="harga" placeholder="Harga" required><br><br>
  <input type="file" name="gambar" accept="image/*" required><br><br>
  <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $harga  = $_POST['harga'];

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "uploads/" . $gambar);

    mysqli_query($conn, "INSERT INTO menu_kopi VALUES (
      '',
      '$nama',
      '$harga',
      '$gambar'
    )");

    echo "<script>
      alert('Menu berhasil ditambahkan');
      window.location='dashboard.php';
    </script>";
}
?>

</body>
</html>
