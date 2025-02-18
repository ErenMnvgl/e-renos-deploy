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
    <title>Giriş Yap</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        .container { width: 300px; margin: auto; }
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
        .register-btn { 
            position: absolute; top: 10px; right: 10px;
            background-color: #28a745; color: white; padding: 10px 15px; border: none;
            text-decoration: none; font-size: 16px; cursor: pointer;
        }
        .register-btn:hover { background-color: #218838; }
    </style>
</head>
<body>

<a href="signup.php" class="register-btn">Kayıt Ol</a>

<div class="container">
    <h2>Giriş Yap</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required>
        <input type="password" name="password" placeholder="Şifre" required>
        <button type="submit">Giriş Yap</button>
    </form>
</div>

</body>
</html>
