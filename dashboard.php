<?php
session_start();
include "db.php"; // Veritabanı bağlantısı

// Eğer giriş yapılmadıysa login sayfasına yönlendir
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// 🔄 Kullanıcı hala aktif, `last_active` sütununu güncelle
$username = $_SESSION['username'];
$updateStmt = $conn->prepare("UPDATE users SET last_active = NOW() WHERE username = ?");
$updateStmt->bind_param("s", $username);
$updateStmt->execute();
$updateStmt->close();

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol Paneli</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; background-color: #f8f9fa; }
        .container { 
            width: 400px; margin: auto; padding: 20px; background: white; 
            border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h2 { color: #007bff; }
        p { font-size: 18px; }
        .button {
            display: inline-block; padding: 10px 20px; background: #dc3545; 
            color: white; text-decoration: none; border-radius: 5px;
        }
        .button:hover { background: #c82333; }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            background-color: #ffffff;
        }
        .status {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }
        .active { background-color: green; } /* Aktifse yeşil nokta */
        .inactive { background-color: gray; } /* Aktif değilse gri nokta */
    </style>
</head>
<body>

<div class="container">
    <h2>👋 Hoş Geldin, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Başarıyla giriş yaptın.</p>
    <a href="logout.php" class="button">Çıkış Yap</a>
</div>

<h3>📌 Aktif Kullanıcılar</h3>
<table>
    <tr>
        <th>Kullanıcı Adı</th>
        <th>Son Aktiflik</th>
        <th>Durum</th>
    </tr>

    <?php
    $stmt = $conn->prepare("SELECT username, last_active FROM users ORDER BY last_active DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $now = time(); // Şu anki zaman

    while ($row = $result->fetch_assoc()) {
        $last_active_time = strtotime($row['last_active']);
        $time_diff = $now - $last_active_time;
        $is_active = ($time_diff <= 60); // 60 saniyeden azsa aktif kabul et

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>" . htmlspecialchars($row['last_active']) . "</td>";
        echo "<td><span class='status " . ($is_active ? "active" : "inactive") . "'></span></td>";
        echo "</tr>";
    }

    $stmt->close();
    $conn->close();
    ?>
</table>

</body>
</html>
