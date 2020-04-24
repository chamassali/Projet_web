<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');


if (isset($_POST['modifierAnnonce']) and !empty($_POST['description'])) {
    $annonceToUpdate = htmlspecialchars($_POST["annonce_a_modif"]);
    $description = htmlspecialchars($_POST["description"]);
    $insertDescription = $bdd->prepare("UPDATE annonces SET description = '$description' WHERE titre = '$annonceToUpdate'");
    $insertDescription->execute();
}

if (isset($_POST['modifierAnnonce']) and !empty($_POST['prix'])) {
    $annonceToUpdate = $_POST["annonce_a_modif"];
    $prix = htmlspecialchars($_POST["prix"]);
    $insertPrix = $bdd->prepare("UPDATE annonces SET prix = '$prix' WHERE titre = '$annonceToUpdate'");
    $insertPrix ->execute();
}

if (isset($_POST['modifierAnnonce']) and !empty($_POST['image'])) {
    $annonceToUpdate = htmlspecialchars($_POST["annonce_a_modif"]);
    $image = htmlspecialchars($_POST["image"]);
    $insertImage = $bdd->prepare("UPDATE annonces SET image = '$image' WHERE titre = '$annonceToUpdate'");
    $insertImage->execute();
}

if (isset($_POST['modifierAnnonce']) and !empty($_POST['titre'])) {
    $annonceToUpdate = htmlspecialchars($_POST["annonce_a_modif"]);
    $titre = htmlspecialchars($_POST["titre"]);
    $insertTitre = $bdd->prepare("UPDATE annonces SET titre = '$titre' WHERE titre = '$annonceToUpdate'");
    $insertTitre->execute();
}



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/modification.css">
    <!-- Axentix CSS minified version -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">

    <!-- Axentix JS minified version -->
    <script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>

</head>

<body>
    <?php
    if (isset($_SESSION['id_users'])) {
        include "../includes/navbarCo.php";
    } else {
        include "../includes/navbar.php";
    }
    ?>

    <div id="wrapper">


        <form class="form-container" method="POST" action="">

            <div class="form-field">
                <label for="titre">Titre de l'annonce à modifier</label>
                <input type="text" name="annonce_a_modif" class="form-control" placeholder="Titre de l'annonce" />
            </div>

            <div class="form-field">
                <label for="titre">Nouveau titre</label>
                <input type="text" name="titre" class="form-control" placeholder="Nouveau Titre" />
            </div>

            <div class="form-field">
                <label class="txt-left hide-xs" for="description">Nouvelle Description</label>
                <input type="text" name="description" class="form-control" placeholder="Description de l'annonce" />
            </div>

            <div class="form-field">
                <label for="prix">Nouveau Prix</label>
                <input type="number" name="prix" class="form-control" placeholder="Prix de votre article" />
            </div>

            <div class="form-field">
                <label for="image">Insérez votre nouvelle image</label>
                <input type="file" name="image" class="form-control" accept="image/*" />
            </div>

            <div id="error-message"><?php if (isset($erreur)) {
                                        echo $erreur;
                                    } ?></div>

            <button type="submit" name="modifierAnnonce" class="btn green">Modifier</button>

        </form>

    </div>



</body>

</html>