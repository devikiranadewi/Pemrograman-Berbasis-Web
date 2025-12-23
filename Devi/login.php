<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login KopiKita</title>
  <style>
    body {
      font-family: Poppins, sans-serif;
      background: #fffaf5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: white;
      padding: 30px;
      width: 350px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,.2);
      text-align: center;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #6d4c41;
      color: white;
      border: none;
      border-radius: 5px;
    }
    a {
      display: block;
      margin-top: 15px;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h2>Login KopiKita ☕</h2>

  <form method="POST" action="proses_login.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>

  <a href="index.php">← Kembali</a>
</div>

</body>
</html>
