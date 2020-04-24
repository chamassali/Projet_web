<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');

if (isset($_POST['Supprimer'])) {

    $reqTitre = $bdd->prepare("SELECT * FROM annonces WHERE titre = ?");
    $titre = htmlspecialchars($_POST['annonce_a_supp']);
    $reqTitre->execute(array($titre));
    $titre_exist = $reqTitre->rowCount();

    if (!empty($_POST['annonce_a_supp'])) {

        if ($titre_exist == 0) {
            $erreur = "Cette annonce n'existe pas, regardez bien le titre de votre annonce !";
        } else {
            $NameToDell = $_POST["annonce_a_supp"];
            $req = $bdd->prepare("DELETE FROM annonces WHERE titre= '$NameToDell'");
            $req->execute(['titre' =>  $NameToDell]);
            $req->closeCursor();
            $erreur = "Votre annonce a bien été supprimé!";
        }
    } else {
        $erreur = "Touls les champs doivent être rempli !";
    }
}

?>
<html>

<head>
    <title>Supression Annonces</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/supression.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <!-- Axentix CSS minified version -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">

    <!-- Axentix JS minified version -->
    <script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>
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




        <form name="delete" class="pages-container form-container" action="" method="POST" enctype="multipart/form-data">

            <div class="form-field">
                <label id="label-decoration" for="annonce_a_supp">Annonce à supprimer</label>
                <input type="text" name="annonce_a_supp" class="form-control" placeholder="Titre de l'annonce à supprimer" />
                <div id="error-message"><?php if (isset($erreur)) {
                                            echo $erreur;
                                        } ?></div>
                <button type="submit" name="Supprimer" class="btn small green">Supprimer</button>
            </div>


        </form>




    </div>

</body>

</html>