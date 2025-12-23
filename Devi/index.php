<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KopiKita - Coffee Shop</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #fffaf5;
      color: #3e2723;
      scroll-behavior: smooth;
    }
    header {
      background-color: #3e2723;
      color: #fff;
      padding: 10px 20px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 10;
    }
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .logo {
      font-size: 1.5em;
      font-weight: bold;
    }
    .nav-links {
      list-style: none;
      display: flex;
      gap: 20px;
    }
    .nav-links a {
      text-decoration: none;
      color: #fff;
      transition: color 0.3s;
    }
    .nav-links a:hover {
      color: #ffcc80;
    }
    .menu-toggle {
      display: none;
      font-size: 1.8em;
      cursor: pointer;
    }
    .hero {
      background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93') center/cover no-repeat;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      padding: 0 20px;
    }
    .hero-text h1 {
      font-size: 2.5em;
      margin-bottom: 10px;
    }
    .hero-text p {
      font-size: 1.2em;
      margin-bottom: 20px;
    }
    .btn {
      background-color: #6d4c41;
      color: white;
      padding: 10px 20px;
      border: none;
      text-decoration: none;
      border-radius: 5px;
      transition: background 0.3s;
    }
    .btn:hover {
      background-color: #8d6e63;
    }
    .about, .menu, .contact {
      padding: 80px 20px;
      text-align: center;
    }
    h2 {
      font-size: 2em;
      margin-bottom: 20px;
    }
    .menu-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
    }
    .menu-item {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 250px;
      padding: 10px;
      transition: transform 0.3s;
    }
    .menu-item:hover {
      transform: scale(1.05);
    }
    .menu-item img {
      width: 100%;
      border-radius: 10px;
    }
    .menu-item h3 {
      margin: 10px 0 5px;
    }
    form {
      display: flex;
      flex-direction: column;
      max-width: 400px;
      margin: auto;
      gap: 10px;
    }
    input, textarea {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    footer {
      background-color: #3e2723;
      color: #fff;
      text-align: center;
      padding: 15px;
    }
    @media (max-width: 768px) {
      .nav-links {
        display: none;
        flex-direction: column;
        background-color: #4e342e;
        position: absolute;
        top: 60px;
        right: 0;
        width: 200px;
        padding: 10px;
      }
      .nav-links.active {
        display: flex;
      }
      .menu-toggle {
        display: block;
      }
      .menu-container {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">☕ KopiKita</div>
      <ul class="nav-links" id="navLinks">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#contact">Kontak</a></li>
       <li class="nav-item">
        <a class="nav-link" href="login.php" target="_blank">Login</a>
        </li>
      </ul>
      <div class="menu-toggle" id="menuToggle">☰</div>
    </nav>
  </header>
  <section id="home" class="hero">
    <div class="hero-text">
      <h1>Rasakan Nikmatnya Secangkir Kopi</h1>
      <p>Kopi terbaik dari biji pilihan, disajikan dengan cinta.</p>
      <a href="#menu" class="btn">Lihat Menu</a>
    </div>
  </section>
  <section id="about" class="about">
    <h2>Tentang Kami</h2>
    <p>KopiKita berdiri sejak 2020, menghadirkan pengalaman ngopi yang hangat dan autentik. 
       Kami menggunakan biji kopi lokal dari berbagai daerah di Indonesia.</p>
  </section>
 <section id="menu" class="menu">
  <h2>Menu Kami</h2>

  <?php
  $data = mysqli_query($conn, "SELECT * FROM menu_kopi");
  ?>

  <div class="menu-container">
<?php while($row = mysqli_fetch_assoc($data)) { ?>
  <div class="menu-item">
    <img src="uploads/<?= $row['gambar'] ?>">
    <h3><?= $row['nama_kopi'] ?></h3>
    <p>Rp <?= number_format($row['harga']) ?></p>
  </div>
<?php } ?>
</div>

</section>

  <section id="contact" class="contact">
    <h2>Hubungi Kami</h2>
    <form onsubmit="sendMessage(event)">
      <input type="text" id="name" placeholder="Nama Anda" required>
      <input type="email" id="email" placeholder="Email Anda" required>
      <textarea id="message" placeholder="Pesan..." rows="4" required></textarea>
      <button type="submit" class="btn">Kirim</button>
    </form>
  </section>
  <footer>
    <p>© 2025 KopiKita. Semua hak dilindungi.</p>
  </footer>
  <script>
    const menuToggle = document.getElementById("menuToggle");
    const navLinks = document.getElementById("navLinks");
    menuToggle.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });
    function sendMessage(event) {
      event.preventDefault();
      const name = document.getElementById("name").value;
      alert(`Terima kasih ${name}! Pesan Anda telah dikirim.`);
      event.target.reset();
    }
  </script>
</body>
</html>