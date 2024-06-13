
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/stylecss">
        <link rel="stylesheet" href="css/style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>opdracht</title>
    </head>

    <body>
        <?php
        include ('header.php');
        
        if (isset($_SESSION["rol"]) || $_SESSION["rol"] == "1") {
            ?>
        <?php
        include ('connection.php');
        include ('getReizen.php');
        ?>

        <main>
            <section class="landingspagina">
                <h1>vul hier niewe locaties toe</h1>
            </section>

            <section class="reis-formulier">
                <form class="reis" action="addLocaties.php" method="POST">
                    <input type="text" name="land" placeholder="land">
                    <input type="text" name="stad" placeholder="stad">
                    <input type="submit">
                </form>
            </section>
            <section class="landingspagina">
                <h1>vul hier niewe reis in</h1>
            </section>

            <section class="reis-formulier">
                <form class="reis" action="addreis.php" method="POST">
                    <input type="text" name="reis" placeholder="reis">
                    <input type="text" name="prijs" placeholder="prijs">
                    <input type="date" name="datum" placeholder="datum">
                    <input type="text" name="beschrijving" placeholder="beschrijving:">
                    <select id="vluchten" name="vluchtid">
                        <?php
                        getVluchten($conn);
                        ?>
                    </select>
                    <input type="text" name="img" placeholder="path naar img">
                    <input type="submit">
                </form>
            </section>
            <section class="landingspagina">
                <h1>vul hier nieuwe vluchten in</h1>
            </section>

            <section class="reis-formulier">
                <form class="reis" action="addVlucht.php" method="POST">
                    <input type="text" name="reistijd" placeholder="geschatte reistijd">
                    <h1>Van</h1>
                    <select name="startplek" id="startplek">

                        <?php
                        getplek($conn);
                        ?>
                    </select>
                    <h1>naar</h1>
                    <select name="eindplek" id="eindplek">
                        <?php
                        getplek($conn);
                        ?>
                    </select>
                    <input type="submit">
                </form>
            </section>
            <h1>reizen veranderen</h1>
            <?php
            updateReizen($conn);
            ?>
        </main>

        <?php
        include ("footer.php");
        ?>
        <?php }
        else{
            echo 'test';
        }?>
    </body>

    </html>
