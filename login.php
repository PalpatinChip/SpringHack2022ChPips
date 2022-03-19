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
$logged = 0;
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    if (($name == $row[0]) && ($password == $row[1])) $logged = 1;
}
$out = $logged == 1 ? '' : "Неправильно введены данные";
if ($logged == 1) {
    $query = "SELECT * FROM register";
    $result = $conn->query($query);
    if (!$result) echo "Сбой при вставке данных: $query<br>" .
        $conn->error . "<br><br>";
    $rows = $result->num_rows;
    for ($j = 0 ; $j < $rows ; ++$j)
    {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    if ($name == $row[0] && $password == $row[2]) $result = shell_exec("C:\Users\Олег\AppData\Local\Programs\Python\Python39\python.exe C:/Users/Олег/Desktop/Hackathon_1case/hackathon/main.py $name");
  }
    echo <<<_end
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
    <form action="homepage.html" method="post">
    <h1>Вам на почту был выслан код. Введите его в поле:</h1>
        <input name="qrcode" type="text">
        <input name="submit" type="submit">
    </form>
</body>
</html>
_end;

}

else echo <<<_END
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
    <img src = "images/figure.png" alt = "AAA">
    <div class = "Contact_us">
        <h1 class = "Contact_us_text">Contact us:</h1>
        <div class = "contactsBlock">
            <a class = "contactsImages" style = "background-image: url('images/vk.png');"    href="https://vk.com/ddosguard"  target="_blank"></a>
            <a class = "contactsImages" style = "background-image: url('images/teleg.png');" href="https://t.me/ddos_guard"   target="_blank"></a>
            <a class = "contactsImages" style = "background-image: url('images/gmail.png');" href="info@ddos-guard.net"       target="_blank"></a>
            <a class = "contactsImages" style = "background-image: url('images/wapp.png');"  href="https://wa.me/89889476904" target="_blank"></a>
        </div>
    </div>

    <div class="LoginFrame">
        <h1 class = "textLogin">Log in</h1>
        <form class = "form" name="test" method="post" action="login.php">
                <input class = "baseBox"  name="name"   type="text"   placeholder = "Enter your name">
                <input class = "baseBox"  name="password"   type="password"   placeholder = "Enter your password">
                <input class = "buttonEnter" type="submit" value = "Enter">
        </form>
        <h1 class = "OR">OR:</h1>
        <a href="https://" class = "googleEnter" target="_blank"></a>
    </div>
    <div class = "Register">
        <h1 class = "RegAsking">Don't have an account? Lets fix this trouble!</h1>
        <a href = "reg.html" class = "registerbutton"><h1 class = "toRegBtnText">To registration</h1></a>
    </div>
    <a href="https://ddos-guard.net" class = "Ddos"></a>
    <div class = "okrug2"></div>
</body>
</html>
_END;
function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
?>




<!--//if (isset($_POST['name']) &&-->
<!--//    isset($_POST['login']) &&-->
<!--//    isset($_POST['password']) &&-->
<!--//    isset($_POST['phone']) &&-->
<!--//    isset($_POST['email']))-->
<!--//{-->
<!--//    $name = get_post($conn, 'name');-->
<!--//    $login = get_post($conn, 'login');-->
<!--//    $password = get_post($conn, 'phone');-->
<!--//    $phone = get_post($conn, 'phone');-->
<!--//    $email = get_post($conn, 'email');-->
<!--//    $query = "INSERT INTO register VALUES" .-->
<!--//        "('$name', '$login', '$password', '$phone', '$email', NULL)";-->
<!--//    $result = $conn->query($query);-->
<!--//    if (!$result) echo "Сбой при вставке данных: $query<br>" .-->
<!--//        $conn->error . "<br><br>";-->
<!--//-->
<!--//}-->
<!--//echo <<<_END-->
<!--// <form action="login.php" method="post"><pre>-->
<!--//     Name <input type="text" name="name">-->
<!--//    login <input type="text" name="login">-->
<!--// password <input type="text" name="password">-->
<!--//    phone <input type="text" name="phone">-->
<!--//    email <input type="text" name="email">-->
<!--//          <input type="submit" value="ADD RECORD">  Добавить запись-->
<!--// </pre></form>-->
<!--// _END;-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--//$query = "SELECT * FROM register";-->
<!--//$result = $conn->query($query);-->
<!--//if (!$result) die ("Сбой при доступе к базе данных: " . $conn->error);-->
<!--//$rows = $result->num_rows;-->
<!--//for ($j = 0 ; $j < $rows ; ++$j)-->
<!--//{-->
<!--//    $result->data_seek($j);-->
<!--//    $row = $result->fetch_array(MYSQLI_NUM);-->
<!--//    echo <<<_END-->
<!--// <pre>-->
<!--//     name $row[0]-->
<!--//    login $row[1]-->
<!--//    phone $row[3]-->
<!--//     mail $row[4]-->
<!--// </pre>-->
<!--// <form action="login.php" method="post">-->
<!--// <input type="hidden" name="delete" value="yes">-->
<!--// <input type="hidden" name="isbn" value="$row[3]">-->
<!--// <input type="submit" value="DELETE RECORD"> Удалить запись</form>-->
<!--// _END;-->
<!--//}-->
<!---->
