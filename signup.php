<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); // Eğer kullanıcı giriş yaptıysa yönlendir
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        .container { width: 300px; margin: auto; }
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
        .login-btn { 
            position: absolute; top: 10px; right: 10px;
            background-color: #007bff; color: white; padding: 10px 15px; border: none;
            text-decoration: none; font-size: 16px; cursor: pointer;
        }
        .login-btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<a href="index.php" class="login-btn">Giriş Yap</a>

<div class="container">
    <h2>Kayıt Ol</h2>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required>
        <input type="password" name="password" placeholder="Şifre" required>
        <input type="password" name="confirm_password" placeholder="Şifre Tekrar" required>
        <button type="submit">Kayıt Ol</button>
    </form>
</div>

</body>
</html>
