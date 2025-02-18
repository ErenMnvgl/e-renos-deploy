<?php
session_start();
session_destroy();
header("Location: index.php"); // Çıkış yaptıktan sonra giriş sayfasına yönlendir
exit;
?>
