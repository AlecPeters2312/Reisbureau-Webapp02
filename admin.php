<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reisbureau</title>

</head>

<body>
    <?php include ('connection.php');
    include ('header.php');
    if (isset($_SESSION["rol"]) || $_SESSION["rol"] == "1") {

        include ('getReizen.php');
        ?>
        <main>

            <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>
            <section id="admin-align">
                <div id="admin-square">
                    <div id="admin-top-buttons">
                        <button class="admin-button" onclick="showAdd()">
                            <h5>Add</h5>
                        </button>
                        <button class="admin-button" onclick="showDelete()">
                            <h5>Remove</h5>
                        </button>
                        <button class="admin-button" onclick="showUpdate()">
                            <h5>Change</h5>
                        </button>
                        <button class="admin-button" onclick="showWinkelmandje()">
                            <h5>Bookings</h5>
                        </button>
                    </div>
                    <section id="add">
                        <h1>Add New Locations</h1>
                        <section class="admin-center">
                            <form class="reis" action="addLocatie.php" method="POST">
                                <input type="text" name="land" placeholder="Country">
                                <input type="text" name="stad" placeholder="City">
                                <input type="submit">
                            </form>
                        </section>
                        <h1>Add New Trips</h1>
                        <section class="admin-center">
                            <form class="reis" action="addreis.php" method="POST">
                                <input type="text" name="reis" placeholder="Trips">
                                <input type="text" name="prijs" placeholder="Price">
                                <input type="date" name="datum" placeholder="Date">
                                <input type="text" name="beschrijving" placeholder="Description">
                                <select id="vluchten" name="vluchtid">
                                    <?php
                                    getVluchten($conn);
                                    ?>
                                </select>
                                <input type="text" name="img" placeholder="Path To The Image">
                                <input type="submit">
                            </form>
                        </section>
                        <h1>Add New Flights</h1>
                        <section class="admin-center">
                            <form class="reis" action="addVlucht.php" method="POST">
                                <input type="text" name="reistijd" placeholder="Estimated Travel Time">
                                <h1>From</h1>
                                <select name="startplek" id="startplek">

                                    <?php
                                    getplek($conn);
                                    ?>
                                </select>
                                <h1>To</h1>
                                <select name="eindplek" id="eindplek">
                                    <?php
                                    getplek($conn);
                                    ?>
                                </select>
                                <input type="submit">
                            </form>
                        </section>
                    </section>
                    <section id="update">
                        <h1>Update</h1>
                            <?php
                            updateReizen($conn);
                            ?>
                    </section>
                    <section id="deletes">
                        <h1>Delete</h1>
                    </section>
                    <section id="winkelmandje">
                        <h1>alle geboekte reizen</h1>
                    </section>
                </div>
            </section>
            <script src="admin.js"></script>
        </main>

        <?php
        include ("footer.php");
        ?>
    <?php } else {
        echo 'test';
    } ?>


</body>