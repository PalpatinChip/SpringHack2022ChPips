<?php
require_once 'login_auth.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['name']) && isset($_POST['password'])){
    $name = get_post($conn, 'name');
    $password = get_post($conn, 'password');
    $query = "SELECT name, password FROM register";
    $result = $conn->query($query);
    if (!$result) echo "Сбой при вставке данных: $query<br>" .
        $conn->error . "<br><br>";
}
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    if (($name == $row[0]) && ($password == $row[1])) echo "Совпадение найдено.";

}
function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}



//if (isset($_POST['name']) &&
//    isset($_POST['login']) &&
//    isset($_POST['password']) &&
//    isset($_POST['phone']) &&
//    isset($_POST['email']))
//{
//    $name = get_post($conn, 'name');
//    $login = get_post($conn, 'login');
//    $password = get_post($conn, 'phone');
//    $phone = get_post($conn, 'phone');
//    $email = get_post($conn, 'email');
//    $query = "INSERT INTO register VALUES" .
//        "('$name', '$login', '$password', '$phone', '$email', NULL)";
//    $result = $conn->query($query);
//    if (!$result) echo "Сбой при вставке данных: $query<br>" .
//        $conn->error . "<br><br>";
//
//}
//echo <<<_END
// <form action="login.php" method="post"><pre>
//     Name <input type="text" name="name">
//    login <input type="text" name="login">
// password <input type="text" name="password">
//    phone <input type="text" name="phone">
//    email <input type="text" name="email">
//          <input type="submit" value="ADD RECORD">  Добавить запись
// </pre></form>
// _END;





//$query = "SELECT * FROM register";
//$result = $conn->query($query);
//if (!$result) die ("Сбой при доступе к базе данных: " . $conn->error);
//$rows = $result->num_rows;
//for ($j = 0 ; $j < $rows ; ++$j)
//{
//    $result->data_seek($j);
//    $row = $result->fetch_array(MYSQLI_NUM);
//    echo <<<_END
// <pre>
//     name $row[0]
//    login $row[1]
//    phone $row[3]
//     mail $row[4]
// </pre>
// <form action="login.php" method="post">
// <input type="hidden" name="delete" value="yes">
// <input type="hidden" name="isbn" value="$row[3]">
// <input type="submit" value="DELETE RECORD"> Удалить запись</form>
// _END;
//}

