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
                        <button class="admin-button" onclick="showUpdate()">
                            <h5>Change</h5>
                        </button>
                        <button class="admin-button" onclick="showmessages()">
                            <h5>Messages</h5>
                        </button>
                        <button class="admin-button" onclick="showreviews()">
                            <h5>reviews</h5>
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
                                <label for="start-datum">start datum</label>
                                <input type="date" name="start-datum" placeholder="start Date">
                                <label for="eind-datum">end datum</label>
                                 <input type="date" name="eind-datum" placeholder="end Date">
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
                        <form method="GET" action="zoeken-admin-reis.php">
                            <input type="text" name="zoeken" placeholder="zoek hier naar een reis">
                            <input type="submit">
                        </form>
                        <h1>Update Reizen</h1>
                        <?php
                        updateReizen($conn);
                        ?>
                        <form method="GET" action="zoeken-admin-vluchten.php">
                            <input type="text" name="zoeken" placeholder="zoek hier naar een vlucht">
                            <input type="submit">
                        </form>
                        <h1> Update Vluchten</h1>

                        <?php
                        updateVluchten($conn);
                        ?>
                        <section id="locatie">
                            <form method="GET" action="zoeken-admin-locaties.php">
                                <input type="text" name="zoeken" placeholder="zoek hier naar een locatie">
                                <input type="submit">
                            </form>
                            <h1>Update Locations</h1>
                            <?php
                            updatelocaties($conn)
                                ?>
                        </section>
                    </section>
                    <section id="winkelmandje">
                        <h1>alle geboekte reizen</h1>
                    </section>
                    <section id="mes">
                        <?php
                        getBerichten($conn);
                        ?>
                    </section>
                    <section id="rev">

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