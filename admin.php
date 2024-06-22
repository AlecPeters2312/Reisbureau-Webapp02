<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <title>Reisbureau</title>
</head>

<body>

    <?php include ('connection.php');
    include ('header.php');
    if (isset($_SESSION["rol"]) || $_SESSION["rol"] == "1") {

        include ('getReizen.php');
        ?>
        <main>
        <script src="admin.js"></script>
            <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>
            <section id="admin-align">
                <div id="admin-square">
                    <div id="admin-top-buttons">
                        <button onclick="showAdd()">
                            <div class="admin-button">
                                <h3>Add</h3>
                            </div>
                        </button>
                        <button onclick="update()">
                            <div class="admin-button">
                                <h3>Change</h3>
                            </div>
                        </button>
                        <button onclick="messages()">
                            <div class="admin-button">
                                <h3>Messages</h3>
                            </div>
                        </button>
                        <button onclick="reviews()">
                            <div class="admin-button">
                                <h3>Reviews</h3>
                            </div>
                        </button>
                        <button onclick="winkelmandje()">
                            <div class="admin-button">
                                <h3>Bookings</h3>
                            </div>
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

                                <h1>Start date</h1>
                                <input type="date" name="star-datum" placeholder="Start Date">
                                <h1>End date</h1>
                                <input type="date" name="en-datum" placeholder="End Date">

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

                        <h1>Update Trips</h1>
                        <?php
                        updateReizen($conn);
                        ?>
                        <section class="admin-center">

                        </section>
                        <h1> Update Flights</h1>

                        <?php
                        updateVluchten($conn);
                        ?>
                        <section class="admin-center">
                            <form method="GET" action="zoeken-admin-locaties.php">
                                <input type="text" name="zoeken" placeholder="Search for Locations">
                                <input type="submit">
                            </form>
                        </section>
                        <h1>Update Locations</h1>
                        <?php
                        updatelocaties($conn)
                            ?>
                    </section>
                    <section id="winkelmandje" >
                        <h1>All Booked Trips</h1>
                        <?php
                        include ("winkelmandjedisadmin.php");
                        ?>
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
        </main>

        <?php
        include ("footer.php");
        ?>
    <?php } else {
        echo 'test';
    } ?>


</body>