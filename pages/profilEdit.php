<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');

if (isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if (isset($_POST['newNom']) and !empty($_POST['newNom']) and $_POST['newNom'] != $user['nom']) {
        $newNom = htmlspecialchars($_POST['newNom']);
        $insertnom = $bdd->prepare("UPDATE users SET nom = ? WHERE id = ?");
        $insertnom->execute(array($newNom, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }

    if (isset($_POST['newPrenom']) and !empty($_POST['newPrenom']) and $_POST['newPrenom'] != $user['prenom']) {
        $newPrenom = htmlspecialchars($_POST['newPrenom']);
        $insertprenom = $bdd->prepare("UPDATE users SET prenom = ? WHERE id = ?");
        $insertprenom->execute(array($newPrenom, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }

    if (isset($_POST['newMail']) and !empty($_POST['newMail']) and $_POST['newMail'] != $user['mail']) {
        $newMail = htmlspecialchars($_POST['newMail']);
        $insertmail = $bdd->prepare("UPDATE users SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newMail, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }

    if (isset($_POST['newMdp1']) and !empty($_POST['newMdp1']) and isset($_POST['newMdp2']) and !empty($_POST['newMdp2'])) {
        $mdp1 = sha1($_POST['newMdp1']);
        $mdp2 = sha1($_POST['newMdp2']);
        if ($mdp1 == $mdp2) {
            $insertmdp = $bdd->prepare("UPDATE users SET motdepasse = ? WHERE id = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header('Location: profil.php?id=' . $_SESSION['id']);
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
?>
    <html>

    <head>
        <title>TUTO PHP</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/profilEdit.css">
        <link rel="stylesheet" href="../assets/css/navbar.css">
        <!-- Axentix CSS minified version -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">

        <!-- Axentix JS minified version -->
        <script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>
    </head>

    <body>

        <div id="wrapper">

            <?php
            if (isset($_SESSION['id'])) {
                include "../includes/navbarCo.php";
            } else {
                include "../includes/navbar.php";
            }
            ?>




            <form class="form-container" method="POST" action="" enctype="multipart/form-data">

                <div class="form-field">
                    <label for="nom">Nom</label>
                    <input type="text" name="newNom" id="nom" class="form-control" placeholder="Nouveau Nom" value="<?php echo $user['nom']; ?>" />
                </div>

                <div class="form-field">
                    <label class="txt-left hide-xs" for="prenom">Prenom</label>
                    <input type="text" name="newPrenom" id="prenom" class="form-control" placeholder="Nouveau Prenom" value="<?php echo $user['prenom']; ?>" />
                </div>

                <div class="form-field">
                    <label for="mail">Email</label>
                    <input type="email" id="name" name="newMail" class="form-control" placeholder="Nouveau mail" value="<?php echo $user['mail']; ?>" />
                </div>

                <div class="form-field">
                    <label for="name">Mot de passe</label>
                    <input type="password" id="name" name="newMdp1" class="form-control" placeholder="Nouveau mot de passe" />
                </div>

                <div class="form-field">
                    <label for="name">Confirmation mot de passe</label>
                    <input type="password" id="name" name="newMdp2" class="form-control" placeholder="Confirmation du nouveau mot de passe" />
                </div>

                <?php if (isset($msg)) {
                    echo $msg;
                } ?>

                <button type="submit" class="btn green">Modifier</button>

            </form>




        </div>

    </body>

    </html>
<?php
} else {
    header("Location: connexion.php");
}
?>