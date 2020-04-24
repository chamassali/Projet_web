<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');


if (isset($_POST['forminscription'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];
    $hash = password_hash($mdp, PASSWORD_DEFAULT);

    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['mdp']) and !empty($_POST['mdp2'])) {

        if ($mail == $mail2) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
                $reqmail->execute(array($mail));
                $mail_exist = $reqmail->rowCount();
                if ($mail_exist == 0) {
                    if ($mdp == $mdp2) {
                        $insertuser = $bdd->prepare("INSERT INTO users(nom, prenom, mail, motdepasse) VALUES (?, ?, ?, ?)");
                        $insertuser->execute(array($nom, $prenom, $mail, $hash));
                        $erreur = "Votre compte a bien été créé !";
                    } else {
                        $erreur = "Vos mots de passe ne correspondent pas !";
                    }
                } else {

                    $erreur = "Cette adresse mail est déjà utilisée !";
                }
            } else {
                $erreur = "Votre adresse mail n'est pas valdie !";
            }
        } else {
            $erreur = "Vos adresses mails ne correspondent pas !";
        }
    } else {
        $erreur = "Tous les champs doivent être rempli !";
    }
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e7e038a132.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/register.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <title>Register</title>
</head>

<body>
    <div id="wrapper">

        <?php
        if (isset($_SESSION['id_users'])) {
            include "../includes/navbarCo.php";
        } else {
            include "../includes/navbar.php";
        }
        ?>


        <div id="center-wrapper">

            <div id="form-container">

                <form method="POST" action="" id="register-form">

                    <div id="form-title">Incription</div>

                    <input type="text" class="login-form" placeholder="Votre Nom" name="nom" value="<?php if (isset($nom)) {
                                                                                                        echo $nom;
                                                                                                    } ?>">


                    <input type="text" class="login-form" placeholder="Votre Prenom" name="prenom" value="<?php if (isset($prenom)) {
                                                                                                                echo $prenom;
                                                                                                            } ?>">

                    <input type="email" class="login-form" placeholder="Email" name="mail" value="<?php if (isset($mail)) {
                                                                                                        echo $mail;
                                                                                                    } ?>">

                    <input type="email" class="login-form" placeholder="Confirmez votre Email" name="mail2" value="<?php if (isset($mail2)) {
                                                                                                                        echo $mail2;
                                                                                                                    } ?>">

                    <input type="password" class="login-form" placeholder="Mot de passe" name="mdp">

                    <input type="password" class="login-form" placeholder="Condirmez votre mot de passe" name="mdp2">

                    <div id="error-message"><?php if (isset($erreur)) {
                                                echo $erreur;
                                            } ?></div>

                    <input type="submit" id="login-button" name="forminscription" value="Envoyer">

                    <a id="sign-up-link" href="connexion.php">Déjà un utilisateur ? Connectez-vous !</a>



                </form>



            </div>

        </div>

    </div>
</body>

</html>