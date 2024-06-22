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
        <div class= "admin-square">
            <div id="admin-top-buttons">
                <a href="account.php">
                    <div class="admin-button">
                        <h5>Profile</h5>
                    </div>
                </a>
                <a href="account-trips.php">
                    <div class="admin-button">
                        <h5>Trips</h5>
                    </div>
                </a>
            </div>
            <h1>Old Password</h1>
            <section class="admin-center">
                <form action="addLocaties.php" method="POST">
                    <input type="password" name="old-password" class="" required>
                </form>
            </section>
            <h1>New Password</h1>
            <section class="admin-center">
                <form action="addreis.php" method="POST">
                    <input type="password" name="new-password" class="" required>
                </form>
            </section>
            <h1>Confirm New Password</h1>
            <section class="admin-center">
                <form action="addVlucht.php" method="POST">
                    <input type="password" name="confirm-new-password" class="" required>
                    <input type="submit">
                </form>
            </section>
        </div>
    </section>

    <?php
    include('footer.php');
    ?>
</body>

</html>