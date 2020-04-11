<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');

if (isset($_GET['id']) and $_GET['id'] > 0) {

    $getId = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM users where id = ?");
    $requser->execute(array($getId));
    $userInfo = $requser->fetch();

?>


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
                        <li id="user-icon-container"><a class="active" href="#"><i class="fas fa-user user-icon"></i></a></li>
                    </ul>
                </div>

            </nav>

            <div id="sub-user-container">
                <div id="user-info">
                    <div class="label-placement">
                        <label for="nom" class="label">Votre Nom</label>
                        <div class="login-form" name="nom" id="nom-display"><?php echo $userInfo['nom']; ?></div>
                    </div>

                    <div class="label-placement">
                        <label for="email_display" class="label">Votre Prenom</label>
                        <div class="login-form" name="prenom-display" id="prenom-display"><?php echo $userInfo['prenom']; ?></div>
                    </div>
                </div>

                <div id="user-info">

                <div class="label-placement">
                        <label for="email_display" class="label">Votre adresse mail</label>
                        <div class="login-form" name="email-display" id="email-display"><?php echo $userInfo['mail']; ?></div>
                    </div>

                </div>

                
                <div id="disconnect-edit-container">
                        <?php
                        if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']); {
                        ?>
                            <a class="disconnect-edit" href="profilEdit.php">Modifier mon profil</a>
                            <a class="disconnect-edit" href="deconnexion.php">Se déconnecter</a>
                        <?php
                        }
                        ?>
                    </div>

            </div>

        </div>

    </body>

    </html>

<?php
}
?>