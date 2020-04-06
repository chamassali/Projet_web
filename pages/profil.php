<?php include('../includes/server.php') ?>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://kit.fontawesome.com/e7e038a132.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/connexion.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/profil.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">

</head>

<body>

    <div id="wrapper">

        <nav id="navbar-container">

            <div id="logo-container">
                <a href="index.html"><img id="page-background-logo" src="../assets/images/logo.png" alt=""></a>
            </div>

            <div id="navbar">
                <ul>
                    <li><a href="../index.php">Acceuil</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                    <li id="user-icon-container"><a class="active" href="profil.php"><i class="fas fa-user user-icon"></i></a></li>
                </ul>
            </div>

        </nav>

        <?php
        if ($_SESSION["connected"] == 1) {
        ?>
            <p class="admin-text">WELCOME ADMIN ! <br> What page do you want to change ?</p>

        <?php
        }
        ?>

    </div>



</body>

</html>