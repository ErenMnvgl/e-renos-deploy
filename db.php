<?php
$host = "localhost";
$dbname = "kullanicilar";
$username = "eren"; // Senin MariaDB kullanıcı adın
$password = "sifre123"; // MariaDB root şifren

$conn = new mysqli($host, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}
?>
