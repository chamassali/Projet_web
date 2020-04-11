<?php

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['mail']) and !empty($_POST['message']) and !empty($_POST['sujet'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mailFrom = $_POST['mail'];
        $message = $_POST['message'];
        $sujet = $_POST['sujet'];

        $mailTo = "chamasahmadali@gmail.com";
        $headers = "From: " . $mailFrom;
        $txt = "Email : " . $mailFrom . "\n\nSubject : " . $sujet . "\n\n" . "Name : " . $nom . "\n\nMessage : " . $message;

        mail($mailTo, $sujet, $txt, $headers);
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
    <link rel="stylesheet" type="text/css" href="../assets/css/contact.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <title>Register</title>
</head>

<body>
    <div id="wrapper">

        <nav id="navbar-container">

            <div id="logo-container">
                <a href="../index.html"><img id="page-background-logo" src="../assets/images/logo.png" alt=""></a>
            </div>

            <div id="navbar">
                <ul>
                    <li><a href="../index.php">Acceuil</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                    <li id="user-icon-container"><a href="pages/profil.php"><i class="fas fa-user user-icon"></i></a></li>
                </ul>
            </div>
        </nav>

        <h1>Contact Me</h1>
        <div id="bar-separation"></div>

        <form id="formulaire-contact" action="" method="post">

            <input required type="text" name="nom" class="formulaire" placeholder="Votre Nom">

            <input required type="text" name="prenom" class="formulaire" placeholder="Votre Prenom">

            <input type="email" name="mail" class="formulaire" placeholder="Adresse mail" required>

            <input required type="text" name="sujet" class="formulaire" placeholder="Sujet">

            <textarea name="message" class="formulaire" placeholder="Votre message" required></textarea>
            
            <div id="error-message"><?php if (isset($erreur)) {
                                        echo $erreur;
                                    } ?></div>

            <button type="submit" name="envoyer" id="bouton-submit">Envoyer</button>

        </form>

    </div>
</body>

</html>