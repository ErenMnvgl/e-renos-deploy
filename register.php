<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    
    if ($stmt->execute()) {
        echo "<div class='container'>
                <h2>🎉 Kayıt Başarılı!</h2>
                <p>Hesabınız başarıyla oluşturuldu.</p>
                <a href='index.php' class='button'>Giriş Yap</a>
              </div>";
    } else {
        echo "<div class='container'>
                <h2>❌ Hata!</h2>
                <p>Kayıt işlemi başarısız oldu. Kullanıcı adı zaten alınmış olabilir.</p>
                <a href='signup.php' class='button'>Tekrar Dene</a>
              </div>";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Tamamlandı</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; background-color: #f8f9fa; }
        .container { 
            width: 400px; margin: auto; padding: 20px; background: white; 
            border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h2 { color: #28a745; }
        p { font-size: 18px; }
        .button {
            display: inline-block; padding: 10px 20px; background: #007bff; 
            color: white; text-decoration: none; border-radius: 5px;
        }
        .button:hover { background: #0056b3; }
    </style>
</head>
<body>

</body>
</html>
