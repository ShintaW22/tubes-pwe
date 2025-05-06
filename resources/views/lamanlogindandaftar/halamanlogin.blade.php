<!DOCTYPE html>
<html>
<head>
  <title>Login PHP</title>
</head>
<body>
  <h2>Form Login</h2>

  <form method="post" action="">
    <label for="username">Nama Pengguna:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Kata Sandi:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
  </form>

  <p><?php echo $pesan; ?></p>
</body>
</html>
