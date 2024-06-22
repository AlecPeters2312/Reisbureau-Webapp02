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
    <section id="admin-align">
        <div id="admin-square">
            <div id="admin-top-buttons">
                <button onclick="showregister()">
                    <div class="admin-button" id="register">
                        <h3>Register</h3>
                    </div>
                </button>
                <button onclick="showlogin()">
                    <div class="admin-button" id="login">
                        <h3>Login</h3>
                    </div>
                </button>
            </div>
            <div id="inlog">
                <h1>Login</h1>
                <section class="admin-center">
                    <form action="inlog.php" method="POST" onsubmit="return validatie();">
                        <input type="text" name="email"  placeholder="E-mail" id="email1">
                        <input type="password" name="wachtwoord" placeholder="Password" id="wachtwoord1">
                        <input type="submit" value="Confirm">
                    </form>
                    <h1>
                        wachtwoord vergeten
                    </h1>
                    <form action="password-forget.php" method="POST">
                        <input type="text" name="email" placeholder="email">
                        <input type="password" name="wachtwoord" required placeholder="nieuw wachtwoord">
                        <input type="submit" value="submit">
                    </form>
                </section>
            </div>
            <div id="registers">
                <h1>Register</h1>
                <section class="admin-center">
                    <form action="registreren.php" method="POST" onsubmit="return validatie();">
                        <input type="text" name="voornaam" id="name" placeholder="First Name">
                        <input type="text" name="achternaam" id="achternaam" placeholder="Last Name">
                        <input type="text" name="email" placeholder="E-mail" id="email">
                        <input type="password" name="wachtwoord" placeholder="Password" id="wachtwoord">
                        <input type="hidden" name="admin" value="1">
                        <input type="submit" value="Confirm">
                    </form>
                </section>
            </div>
        </div>
    </section>

    <?php
    include ('footer.php');
    ?>
    <script src="higlight.js">

    </script>
</body>

</html>