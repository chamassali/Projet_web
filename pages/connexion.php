<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');

if (isset($_POST['form_connect'])) {

    $mailConnect = htmlspecialchars($_POST['mail_connect']);
    $mdpConnect = $_POST['mdp_connect'];

    if (!empty($mailConnect) and !empty($mdpConnect)) {

        $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
        $requser->execute(array($mailConnect));
        $userExist = $requser->rowCount();
        $result = $requser->fetch();

        if ($userExist == 1 && password_verify($_POST['mdp_connect'], $result['motdepasse'])) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['pseudo'] = $result['pseudo'];
            $_SESSION['mail'] = $result['mail'];
            header("Location: profil.php?id=" . $_SESSION['id']);
        } else {
            $erreur = "Mot de passe ou mail non correct !";
        }
    } else {
        $erreur = "Tous les champs doivent être rempli !";
    }
}

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

                    <input type="email" name="mail_connect" placeholder="Mail" class="login-form">

                    <input type="password" name="mdp_connect" placeholder="Mot de passe" class="login-form">
                    
                    <div id="error-message"> <?php if (isset($erreur)) {echo $erreur;}?></div>

                    <input type="submit" name="form_connect" value="Se connecter" id="login-button">

                    <a id="sign-up-link" href="register.php">Not a user ? Sign up now !</a>

                </form>
            </div>

        </div>

    </div>



</body>

</html>