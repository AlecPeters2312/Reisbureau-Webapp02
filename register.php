<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <title>Reisbureau</title>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>

    <section class="account-container">
        <section class="account-selection">
            <button onclick="showregister()">
                <div class="account-button" id="register">
                    <h5>register</h5>
                </div>
            </button>

            <button onclick="showlogin()">
                <div class="account-button" id="login">
                    <h5>login</h5>
                </div>
            </button>
            <a href="">
                <div class="account-button" id="password">
                    <h5>forgot Password</h5>
                </div>
            </a>
        </section>
        <section class="account-section">
            <div class="account-box">
                <div id="registers">
                    <h1>Register</h1>
                    <form action="inlog.php" method="POST" onsubmit="return validatie();">
                        <input type="text" name="voornaam" placeholder="E-mail" id="email">
                        <input type="password" name="wachtwoord" placeholder="Password" id="wachtwoord">
                        <input type="submit" value="login">
                    </form>
                </div>

                <div id="inlog">
                    <h1>Login</h1>
                    <form action="inlog.php" method="POST" onsubmit="return validatie();">
                        <input type="text" name="username" placeholder="E-mail" id="username">
                        <input type="password" name="wachtwoord" placeholder="Password" id="wachtwoord">
                        <input type="submit" value="login">
                    </form>
                </div>
            </div>
        </section>
    </section>
    <?php
    include('footer.php');
    ?>
    <script>
        function hide() {
            var register = document.getElementById("registers");
            register.hidden = true;
            var login = document.getElementById("inlog");
            login.hidden = false;
        }
        hide();

        function showlogin() {
            var register = document.getElementById("registers");
            register.hidden = true;
            var login = document.getElementById("inlog");
            login.hidden = false;
            highlightlogin();
        }

        function showregister() {
            var login = document.getElementById("inlog");
            login.hidden = true;
            var register = document.getElementById("registers");
            register.hidden = false;
            HighlightRegister();
        }
    </script>
    <script src="higlight.js">

    </script>
</body>

</html>