<?php
session_start();
$host = "localhost";
$dbname = "kullanicilar";
$username = "eren";
$password = "sifre123";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($pass, $hashed_password)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["username"] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Hatalı kullanıcı adı veya şifre.";
    }

    $stmt->close();
}

$conn->close();
?>
