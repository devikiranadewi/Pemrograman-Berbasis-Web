<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
$data = mysqli_query($conn, "SELECT * FROM menu_kopi");
?>

<h2>Dashboard Admin</h2>
<a href="tambah_menu.php">+ Tambah Menu</a>
<table border="1" cellpadding="10">
<tr>
  <th>Nama Kopi</th>
  <th>Harga</th>
  <th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
  <td><?= $row['nama_kopi'] ?></td>
  <td>Rp <?= $row['harga'] ?></td>
  <td>
    <a href="edit_menu.php?id=<?= $row['id'] ?>">Edit</a> |
    <a href="hapus_menu.php?id=<?= $row['id'] ?>">Hapus</a>
  </td>
</tr>
<?php } ?>
</table>

<br>
<a href="logout.php">Logout</a>
