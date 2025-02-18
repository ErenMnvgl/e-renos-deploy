<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    echo "<h2>Giriş Bilgileri:</h2>";
    echo "<p>Kullanıcı Adı: " . $username . "</p>";
    echo "<p>Şifre: " . $password . "</p>";
} else {
    echo "<p>Form verisi alınamadı.</p>";
}
?>
