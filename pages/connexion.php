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
    <link rel="stylesheet" href="../assets/css/connexion.css">
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
                    <li><a href="pages/contact.php">Contact</a></li>
                    <li><a class="active" href="#">Connexion</a></li>
                    <li id="user-icon-container"><a href="profil.php"><i class="fas fa-user user-icon"></i></a></li>
                </ul>
            </div>
        </nav>
    
        <div id="center-wrapper">

            <div id="form-container">

                <form method="post" action="connexion.php" id="connexion-form">

                    

                    <div id="form-title">Connexion</div>

                    <input type="text" class="login-form" placeholder="Username" name="username" id="email">

                    <input type="password" class="login-form" id="password" name="password" placeholder="Password">

                    <div id="error-message"> <?php include('errors.php'); ?> </div> 

                    <button type="submit" name="login_user" id="login-button">Connexion</button>

                    <a id="sign-up-link" href="register.php">Not a user ? Sign up now !</a>
                </form>
            </div>

        </div>

    </div>



</body>

</html>