<?php
require_once 'login_auth.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['uid']) && isset($_GET['first_name'])){
    $name = $_GET['first_name'];
    $id = $_GET['uid'];
    $query = "INSERT INTO vklogin VALUES " . "('$name', '$id')";
    $result = $conn->query($query);
    if (!$result) echo "Сбой при вставке данных: $query<br>" . $conn->error . "<br><br>";
    $query = "SELECT * FROM vklogin";
    $result = $conn->query($query);
    $rows = $result->num_rows;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/ddos.png" type="image/png">
    <title>Welcome!</title>
    <link rel="stylesheet" type="text/css" href="auth.css">
    <link rel="stylesheet" type="text/css" href="preloader.css">
</head>
<body>
<!-- Preloader -->
<div class = "preloader">
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</div>

<div class = "mainFrame">
    <h1 class = "Text">Добро пожаловать на ресурс!</h1>

    <div>
        <img src = "images/triangle.png" class = "triangleHomePage">
        <img src = "images/qr-code.png" class = "qrCod">
    </div>
</div>
<div><img src = "images/fon.png" class = "fon"> </div>
<script>
    window.onload = function () {
        document.body.classList.add('loaded_hiding');
        window.setTimeout(function () {
            document.body.classList.add('loaded');
            document.body.classList.remove('loaded_hiding');
        }, 500);
    }
</script>
</body>
</html>


