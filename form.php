<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Formu</title>
</head>
<body>
    <h2>Giriş Yap</h2>
    <form action="process.php" method="post">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Şifre:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Giriş Yap</button>
    </form>
</body>
</html>
