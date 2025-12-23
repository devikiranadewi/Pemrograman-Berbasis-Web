<?php
include 'koneksi.php';
mysqli_query($conn, "DELETE FROM menu_kopi WHERE id=$_GET[id]");
header("Location: dashboard.php");
?>
