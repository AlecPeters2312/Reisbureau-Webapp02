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
        <div id="admin-square">
            <?php include('getAccount.php'); ?>
            <form action="logout.php">
                <input type="submit" value="logout">
            </form>
        </div>
    </section>

    <?php include('footer.php'); ?>
</body>

</html>