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
                        <section class="admin-left">
                            <form action="addLocaties.php" method="POST">
                                <input type="text" name="land" placeholder="Country">
                                <input type="text" name="stad" placeholder="City">
                                <input type="submit">
                            </form>
                        </section>
                        <h1>Add Trip</h1>
                        <section class="admin-left">
                            <form action="addreis.php" method="POST">
                                <input type="text" name="reis" placeholder="Trip">
                                <input type="text" name="prijs" placeholder="Price">
                                <input type="date" name="datum" placeholder="Date">
                                <select name="vluchtid">
                                    <?php
                                    getVluchten($conn);
                                    ?>
                                </select>
                                <input type="text" name="img" placeholder="Path from img">
                                <input type="submit">
                            </form>
                        </section>
                        <h1>Add Flight</h1>
                        <section class="admin-left">
                            <form action="addVlucht.php" method="POST">
                                <input type="text" name="reistijd" placeholder="Estimated Time">
                                <h2>From</h2>
                                <select name="startplek">
                                    <?php
                                    getplek($conn);
                                    ?>
                                </select>
                                <h2>To</h2>
                                <select name="eindplek">
                                    <?php
                                    getplek($conn);
                                    ?>
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
