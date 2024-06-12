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
    include ('header.php');
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
            <a href="account-password.php">
                <div class="account-button" id="password">
                    <h5>forgot Password</h5>
                </div>
            </a>
        </section>
        <section class="account-section">
            <div class="account-box">
                <div id="inlog">
                    <h1>login</h1>
                    <form action="inlog.php" method="POST" onsubmit="return validatie();">
                        <input type="text" name="email" placeholder="email" id="email">
                        <input type="password" name="wachtwoord" placeholder="wachtwoord" id="wachtwoord">
                        <input type="submit" value="login">
                    </form>
                </div>

                <div id="registers">
                    <h1>maak een account aan</h1>


                    <form action="registreren.php" method="POST" onsubmit="return validatie();">
                        <input type="text" name="voornaam" id="name" placeholder="voornaam">
                        <input type="text" name="achternaam" id="achternaam" placeholder="achternaam">
                        <input type="text" name="email" placeholder="email" id="email">
                        <input type="password" name="wachtwoord" placeholder="wachtwoord" id="wachtwoord">
                        <input type="hidden" name="admin" value="1">
                        <input type="submit" value="login">
                    </form>
                </div>
            </div>
        </section>
    </section>
    <?php
    include ('footer.php');
    ?>
    <script src="higlight.js">

    </script>
</body>

</html>