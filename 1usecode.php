<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="auth.css">
</head>
<body>
<div class = "mainFrame">
    <h1 class = "Text">Введите имя:</h1>
    <form action="1usecode.php" method="post">
        <input class = "btnEnter" name="qrcode" type="text" maxlength="25" placeholder="# # # # # # # #">
        <input class = "btnSend"  name="submit" type="submit" value="Отправить!">
    </form>
    <div>
        <img src = "images/triangle.png" class = "triangle">
        <img src = "images/qr-code.png" class = "qrCod">
    </div>
</div>
<div><img src = "images/fon.png" class = "fon"> </div>
</body>
</html>


<?php
require_once 'login_auth.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['qrcode'])){
    $name = get_post($conn, 'qrcode');
    $query = "select name, email from register";
    $result = $conn->query($query);
    if (!$result) echo "Сбой при вставке данных: $query<br>" . $conn->error . "<br><br>";
    $rows = $result->num_rows;
    $logged = 0;
    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);
        if($name == $row[0]) $logged = 1;
    }
    if ($logged == 1){
        shell_exec("C:\Users\Олег\AppData\Local\Programs\Python\Python39\python.exe C:/Users/Олег/Desktop/hackathon/setcodes.py $name");
    } else {

    }
}


function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
