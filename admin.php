<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opdracht</title>
</head>

<body>
    <?php
    include('header.php');
    include('connection.php');
    include('getReizen.php');
    ?>
    <main>
        <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>
        <section id="admin-align">
            <div id="admin-square">
                <div id="admin-top-buttons">
                    <a href="">
                        <div class="admin-button">
                            <h5>Add</h5>
                        </div>
                    </a>
                    <a href="">
                        <div class="admin-button">
                            <h5>Remove</h5>
                        </div>
                    </a>
                    <a href="">
                        <div class="admin-button">
                            <h5>Change</h5>
                        </div>
                    </a>
                    <a href="">
                        <div class="admin-button">
                            <h5>Bookings</h5>
                        </div>
                    </a>
                </div>
                <h1>Add Location</h1>
                <section class="admin-center">
                    <form action="addLocaties.php" method="POST">
                        <input type="password" name="old-password" class="" required>
                    </form>
                </section>
                <h1>Add Trip</h1>
                <section class="admin-center">
                    <form action="addreis.php" method="POST">
                        <input type="password" name="new-password" class="" required>
                        </select>
                        <input type="text" name="img" placeholder="Path from img">
                        <input type="submit">
                    </form>
                </section>
                <h1>Add Flight</h1>
                <section class="admin-center">
                    <form action="addVlucht.php" method="POST">
                        <input type="password" name="confirm-new-password" class="" required>
                        </select>
                        <input type="submit">
                    </form>
                </section>
            </div>
        </section>
    </main>

    <?php
    include("footer.php");
    ?>
</body>

</html>