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
            <a href="register.php">
                <div class="account-button" id="register">
                    <h5>register</h5>
                </div>
            </a>



            <a href="login.php">
                <div class="account-button" id="login">
                    <h5>login</h5>
                </div>
            </a>
            <a href="account-password.php">
                <div class="account-button" id="password">
                    <h5>forgot Password</h5>
                </div>
            </a>
        </section>
        <section class="account-section">
            <div class="account-box">
                <h1>Login of maak een account aan</h1>

                E-mailadres
                <form action="inlog.php" method="POST" onsubmit="return validatie();">
                    <input type="text" name="username" placeholder="email" id="username">
                    <input type="password" name="wachtwoord" placeholder="wachtwoord" id="wachtwoord">
                    <input type="submit" value="login">
                </form>
            </div>
        </section>
        <?php
        if (isset($_SESSION["ingelogd"])) {
            ?>
            <div id="logout">
                <h1>Log Out</h1>
            </div>
            <?php
        }
        ?>
    </section>
    <?php
    include ('footer.php');
    ?>
    <script src="higlight.js"></script>
    <script src="validatie.js" async defer></script>
</body>

</html>