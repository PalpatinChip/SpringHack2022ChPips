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
        $query = "INSERT INTO register (name, login, password, phone, email, id, access_key) VALUES" .
            "('$name', '$login', '$password', '$phone', '$email', NULL, NULL)";
        $result = $conn->query($query);
        if (!$result) echo "Сбой при вставке данных: $query<br>" .
            $conn->error . "<br><br>";
        echo <<<_END
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Login page</title>
            <link rel="stylesheet" type="text/css" href="loginStyle.css">
            <link rel="stylesheet" type="text/css" href="preloader.css">
            <script
                    type="text/javascript"
                    src="https://vk.com/js/api/openapi.js?168"
                    charset="utf-8"
            ></script>
            <script type="text/javascript">
                VK.init({ apiId: 8108771 });
            </script>
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
        
            <div>
            <img src = "images/figure.png" alt = "AAA" class = "Figures">
            <div class = "Contact_us">
                <h1 class = "Contact_us_text">Contact us:</h1>
                <div class = "contactsBlock">
                    <a class = "contactsImages"  href="https://vk.com/ddosguard"  target="_blank"><img src="images/vk.png"></a>
                    <a class = "contactsImages"  href="https://t.me/ddos_guard" target="_blank"><img src="images/teleg.png"></a>
                    <a class = "contactsImages"  href="info@ddos-guard.net"     target="_blank"><img src="images/gmail.png"></a>
                    <a class = "contactsImages" href="https://wa.me/89889476904" target="_blank"><img src="images/wapp.png"></a>
                </div>
            </div>
        
            <div class="LoginFrame">
                <h1 class = "textLogin">Log in</h1>
                <form class = "form" name="test" method="post" action="login.php">
                        <input class = "baseBox"  name="name"   type="text"   placeholder = "Enter your name">
                        <input class = "baseBox"  name="password"   type="password"   placeholder = "Enter your password">
                        <input class = "buttonEnter" type="submit" value = "Enter">
                </form>
                <div id="vk_auth" class = "vkAuth"></div>
                <script type="text/javascript">
                    VK.Widgets.Auth("vk_auth", {authUrl: "/Hackathon/vkwidget.php"});
                </script>
                <a href="1usecode.php "><p class = "rememberPassw">Забыли пароль? Войдите по одноразовому коду.</p></a>
        <!--        <h1 class = "OR">OR:</h1>-->
        <!--        <a href="https://" target="_blank"><img src="images/Google.png" class = "googleEnter"></a>-->
            </div>
            <div class = "Register">
                <h1 class = "RegAsking">Don't have an account? Lets fix this trouble!</h1>
                <a href = "reg.html"><div class = "registerbutton"><h1 class = "toRegBtnText">To registration</h1></div></a>
            </div>
            <a href="https://ddos-guard.net" class = "Ddos"><img src = "images/ddos.png"> </a>
            <img src = "images/topright.png" class = "okrug2">
        </div>
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
        _END;

    }
    else echo <<<_end
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="styleVova.css">
        <script
                type="text/javascript"
                src="https://vk.com/js/api/openapi.js?168"
                charset="windows-1251"
        ></script>
        <script type="text/javascript">
            VK.init({ apiId: 8108776 });
        </script>
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
        <script>alert('Пароли не совпадают')</script>
        <div class = "contactUsFrame" onclick="this.style.left='14vw'" ondblclick="this.style.left='0'">
            <h1 class = "ContactUSText">Contact us:</h1>
            <div class = "ContUsBtns">
                <div class = "contactsBlock" style = "z-index: 10;">
                    <a class = "contactsImages" href = "https://vk.com/ddosguard"  target="_blank"><img src="images/vk.png" class = "contactsImages"></a>
                    <a class = "contactsImages" href = "https://t.me/ddos_guard"   target="_blank"><img src="images/teleg.png" class = "contactsImages"></a>
                </div>
                <div class = "contactsBlock">
                    <a class = "contactsImages" href="info@ddos-guard.net" target="_blank"><img src="images/gmail.png" class = "contactsImages"></a>
                    <a class = "contactsImages" href="https://wa.me/89889476904" target="_blank"><img src="images/wapp.png" class = "contactsImages"></a>
                </div>
            </div>
    
        </div>
            <main class="inputInfoFrame">
                <h1 class = "txtRegistration">Registration</h1>
                <form class = "form" name="test" method="post" action="register.php">
                    <input style = "z-index: 7;" class = "baseBox" type="text"     name="name"       placeholder="Enter your full name">
                    <input style = "z-index: 6;" class = "baseBox" type="text"     name="login"      placeholder="Enter your future username">
                    <input style = "z-index: 5;" class = "baseBox" type="password" name="password"   placeholder="Enter your password">
                    <input style = "z-index: 4;" class = "baseBox" type="password" name="pass_again" placeholder="Enter your password again">
                    <input style = "z-index: 3;" class = "baseBox" type="text"     name="phone"      placeholder="Enter your phone number">               
                    <input style = "z-index: 2;" class = "baseBox" type="text"     name="email"      placeholder="Enter your mail">       
                    <input class = "boxButtonEnter" type="submit" value="Enter">
                </form>
            </main>
        <div class = "toLoginPageFrame">
            <h1 class = "txtAlreadyReg">Are you already registred?</h1>
            <div class = "boxLogPage"><a href = "log.html" style = "user-select: none; text-decoration: none;"><h1 class = "txtLoginPage">To login page</h1></a></div>
        </div>
        <div class = "pngwing1"></div>
        <div class = "pngwing2"></div>
        <a href="https://ddos-guard.net" class = "ddosImg"><img src = "images/ddos.png">"</a>
        <div class = "topLeft"></div>
        
        <div style = "position:fixed; width: 15%; height: 10%; background-color: white; top:50%; left: 17%; user-select: none; text-align: center;" onclick="alert('Wow! You found easter egg! You are awesome!')">Click me</div>
    
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
    _end;
}

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}


// UPDATE register SET access_key = '123' WHERE login = 'test2';