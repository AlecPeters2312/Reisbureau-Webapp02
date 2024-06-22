<header>
    <nav>
        <div id="company-name">
            <a class="img-a" href="index.php">
                <img src="img/logo.png" alt="Deelft Blue Travel Logo">
            </a>
            <div id="company-tekst">
                <p class="company-color">Blue</p>
                <p class="company-color">Sky</p>
                <p class="company-color">Travels</p>
            </div>
        </div>
        <div class="nav-buttons">
            <a class="white-color" href="contact.php">Contact</a>
            <a class="white-color" href="about-us.php">About Us</a>

            <?php
            session_start();
            if (isset($_SESSION["email"])) {
            ?>

            <?php
            } else { ?> <a class="white-color" href="register.php">Login</a>
            <?php }
            ?>
            <a class="white-color" href="<?php if (isset($_SESSION["email"])) { ?> account.php <?php } else { ?> register.php <?php } ?>">Account</a>
            <?php
            if (isset($_SESSION["rol"])) {
                if ($_SESSION["rol"] == "1") {
            ?>
                    <a class="white-color" href="admin.php">Admin</a>
            <?php
                } else {
                    echo "error";
                }
            }
            if (isset($_SESSION["email"]) or isset($_SESSION["rol"])) {
                ?>
                <a class="white-color" href="mand.php"><i class="fa-solid fa-basket-shopping"></i></a>
                <?php
            }
            
            include ('connection.php');
            ?>
        </div>
    </nav>
</header>