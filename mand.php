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
    ?>
    <main>

        <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>
        <?php
        require ("winkelmandjedis.php");
        ?>
    </main>

    <?php
    include ("footer.php");
    ?>

</body>