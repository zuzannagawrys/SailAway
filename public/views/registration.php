<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/registration.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTRATION PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-and-registration">
            <div class="registration-container">
                <form class="registration" action="registration" method="post">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="username" type="text" placeholder="username">
                    <input name="name" type="text" placeholder="name">
                    <input name="surname" type="text" placeholder="surname">
                    <input name="email" type="text" placeholder="email@email.com">
                    <input name="password" type="password" placeholder="password">
                    <input name="confirmedPassword" type="password" placeholder="confirm password">
                    <button type="submit">REGISTER</button>
                </form>
            </div>
            <div class="login">
                <a href="http://http://20.16.165.177/login">LOGIN</a>
            </div>

        </div>
    </div>
</body>