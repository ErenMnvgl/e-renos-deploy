<?php
session_start();
include __DIR__ . "/db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];

            // 🟢 Kullanıcı giriş yaptığı an last_active güncelle
            $updateStmt = $conn->prepare("UPDATE users SET last_active = NOW() WHERE username = ?");
            $updateStmt->bind_param("s", $username);
            $updateStmt->execute();
            $updateStmt->close();

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Şifreyi yanlış girdin!";
        }
    } else {
        echo "Böyle bir kullanıcı yok!";
    }

    $stmt->close();
}
?>
