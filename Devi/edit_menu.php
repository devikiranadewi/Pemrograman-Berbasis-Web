<?php
include 'koneksi.php';
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu_kopi WHERE id=$_GET[id]"));
?>

<form method="POST">
  <input type="text" name="nama" value="<?= $data['nama_kopi'] ?>">
  <input type="number" name="harga" value="<?= $data['harga'] ?>">
  <button name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
  mysqli_query($conn, "UPDATE menu_kopi SET 
    nama_kopi='$_POST[nama]', 
    harga='$_POST[harga]' 
    WHERE id=$_GET[id]");
  header("Location: dashboard.php");
}
?>
