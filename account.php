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

            <section id="admin-align">
                <div id="admin-square">
                    <div id="admin-top-buttons">
                <a href="account.php">
                    <div class="admin-button">
                        <h5>Profile</h5>
                    </div>
                </a>
                <a href="account-adresses.php">
                    <div class="admin-button">
                        <h5>Addresses</h5>
                    </div>
                </a>
                <a href="account-trips.php">
                    <div class="admin-button">
                        <h5>Trips</h5>
                    </div>
                </a>
                    </div>
            <div class="account-align">
                <h1>Username</h1>
                <h1 class="admin-left">...</h1>
            </div>
            <div class="account-align">
                <h1>Full Name</h1>
                <h1 class="admin-left">...</h1>
            </div>
            <div class="account-align">
                <h1>E-Mail</h1>
                <h1 class="admin-left">...</h1>
            </div>
            <a href="account-password.php">
                <div class="flex-center">
                <div class="account-password">
                    <h5>Change Password</h5>
                </div>
                </div>
            </a>
    </div>
    </section>

    <?php
    include('footer.php');
    ?>
</body>

</html>