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
            <a href="account.php" id="register">
                <div class="account-button">
                    <h5>register</h5>
                </div>
            </a>



            <a href="account-adresses.php">
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
                <div class="account-align">
                    <h1>Username</h1>
                    <h1 class="account-left">...</h1>
                </div>
                <div class="account-align">
                    <h1>Full Name</h1>
                    <h1 class="account-left">...</h1>
                </div>
                <div class="account-align">
                    <h1>E-Mail</h1>
                    <h1 class="account-left">...</h1>
                </div>
            </div>
        </section>
        <section class="logout-align">
            <div id="logout">
                <h1>Log Out</h1>
            </div>
        </section>
    </section>
    <?php
    include ('footer.php');
    ?>
    <script>
        function gethref() {
            return window.location.href;
        }
        function highlight() {
            if (gethref() == "http://localhost/reisbureau-poging%202/Reisbureau-Webapp02/register.php") {
                var register = document.getElementById("register");
                var currWidth = register.clientWidth;
                var currheight = register.clientHeight;
                register.style.width = (currWidth + 50) + "px";
                register.style.height = (currheight + 50) + "px";
            }
            else {
                console.log("RIP")
            }
        }
        highlight();
    </script>
</body>

</html>