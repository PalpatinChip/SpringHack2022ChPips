<?php
require_once 'login_auth.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['qrcode']) && isset($_POST['submit'])) {
    $code = get_post($conn, 'code');
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
    if ($logged == 1){
        echo <<<_END
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h1>Все пучком</h1>
</body>
</html>
_END;

    }
}