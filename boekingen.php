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
    <?php include('header.php'); ?>
    <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>

    <section id="admin-align">
        <div class="admin-square">
            <div id="admin-top-buttons">
                <button>
                    <a href="account.php">
                        <div class="admin-button">
                            <h3>Info</h3>
                        </div>
                    </a>
                </button>
                <button>
                    <a href="boekingen.php">
                        <div class="admin-button">
                            <h3>Trips</h3>
                        </div>
                    </a>
                </button>
            </div>
            <div class="image-space"></div>
            <?php
            require("boekingendis.php");
            ?>
            <form action="logout.php">
                <input id="logout" type="submit" value="Logout">
            </form>
        </div>
    </section>

    <?php include('footer.php'); ?>
</body>

</html>