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
                    <h5>Trips</h5>
                </div>
            </a>
        </section>
    </div>
    <section id="account-section">
        <div id="account-box">
            <form action="change-password.php" method="post">
                <div class="account-align">
                    <h1>Old Password</h1>
                    <input type="password" name="old-password" class="account-left" required>
                </div>
                <div class="account-align">
                    <h1>New Password</h1>
                    <input type="password" name="new-password" class="account-left" required>
                </div>
                <div class="account-align">
                    <h1>Confirm New Password</h1>
                    <input type="password" name="confirm-new-password" class="account-left" required>
                </div>
                <div id="password-button">
                    <div class="account-align">
                        <button type="submit" class="account-left">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <?php
    include('footer.php');
    ?>
</body>

</html>