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

    <div id="account-align">
        <section id="account-selection">
            <a href="account.php">
                <div class="account-button">
                    <h5>My Details</h5>
                </div>
            </a>
            <a href="account-adresses.php">
                <div class="account-button">
                    <h5>Addresses</h5>
                </div>
            </a>
            <a href="account-password.php">
                <div class="account-button">
                    <h5>Change Password</h5>
                </div>
            </a>
        </section>
    </div>
    <section id="account-section">
        <div id="account-box">

        <div class="account-align">
            <h1>Address</h1>
            <h1 class="account-left">...</h1>
        </div>
        </div>
    </section>
    <section id="logout-align">
        <div id="logout">
            <h1>Log Out</h1>
        </div>
    </section>

    <?php
    include('footer.php');
    ?>
</body>

</html>