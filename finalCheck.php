<?php
require_once 'login_auth.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['qrcode']) && isset($_POST['submit'])) {
    $code = get_post($conn, 'qrcode');
    $query = "SELECT access_key FROM register";
    $result = $conn->query($query);
    if (!$result) echo "Сбой при вставке данных: $query<br>" .
        $conn->error . "<br><br>";
    $rows = $result->num_rows;
    $logged = 0;
    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);
        if ($code == $row[0]) $logged = 1;
    }
    if ($logged == 0) {
        echo <<<_END
            <!DOCTYPE html>
            <html lang="ru">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Login page</title>
                <link rel="stylesheet" type="text/css" href="auth.css">
            </head>
            <body>
                <script>
                    alert("Неправильный код")
                    // location.href = "./finalCheck.php"
                </script>
                <div class = "mainFrame">
                    <h1 class = "Text">Вам на почту был выслан код. Введите его в поле:</h1>
                    <form action="" method="post">
                        <input class = "btnEnter" name="qrcode" type="text" maxlength="8" placeholder="# # # # # # # #">
                        <input class = "btnSend"  name="submit" type="submit" value="Отправить!">
                    </form>
                    <div>
                        <img src = "images/triangle.png" class = "triangle">
                        <img src = "images/qr-code.png" class = "qrCod">
                    </div>
                </div>
                <div> <img src = "images/fon.png" class = "fon"> </div>
            </body>
            </html>
        _END;
    }
    else echo <<<end
        <html>
        <head>
        
        </head>
        <body>
        <script>
            location.href = './homepage.html'
        </script> <p>этого не нужно видеть</p>
        </body>
        </html>
    end;


}
function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}