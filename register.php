<?php
require_once 'login_auth.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['name']) &&
    isset($_POST['login']) &&
    isset($_POST['password']) &&
    isset($_POST['phone']) &&
    isset($_POST['email']) &&
    isset($_POST['pass_again']))
{
    $name = get_post($conn, 'name');
    $login = get_post($conn, 'login');
    $password = get_post($conn, 'password');
    $pass_again = get_post($conn, 'pass_again');
    $phone = get_post($conn, 'phone');
    $email = get_post($conn, 'email');
    if ($password == $pass_again) {
        $query = "INSERT INTO register VALUES" .
            "('$name', '$login', '$password', '$phone', '$email', NULL)";
        $result = $conn->query($query);
        if (!$result) echo "Сбой при вставке данных: $query<br>" .
            $conn->error . "<br><br>";
    }
    else echo 'Неправильно ввел.';

}

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}