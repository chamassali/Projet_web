<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');


if (isset($_POST['ajoutAnnonce'])) {
    $id_users = $_SESSION['id_users'];
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $prix = htmlspecialchars($_POST['prix']);
    $image = htmlspecialchars($_POST['image']);

    if (!empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['prix']) and !empty($_POST['image'])) {

        $reqTitre = $bdd->prepare("SELECT * FROM annonces where id_users=?");
        $reqTitre->execute(array($titre));
        $insertuser = $bdd->prepare("INSERT INTO annonces(id_users, titre, description, prix, image) VALUES (?, ?, ?, ?, ?)");
        $insertuser->execute(array($id_users, $titre, $description, $prix, $image));
        $erreur = "Votre annonce a bien été créé !";
    } else {
        $erreur = "Tous les champs doivent être rempli !";
    }
}

 
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'annonces</title>
    <link rel="stylesheet" href="../assets/css/ajoutAnnonce.css">
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
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" placeholder="Titre de l'annonce" />
            </div>

            <div class="form-field">
                <label class="txt-left hide-xs" for="description">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Description de l'annonce" />
            </div>

            <div class="form-field">
                <label for="prix">Prix</label>
                <input type="number" name="prix" class="form-control" placeholder="Prix de votre article" />
            </div>

            <div class="form-field">
                <label for="image">Insérez votre image</label>
                <input type="file" name="image" class="form-control" accept="image/*" />
            </div>

            <?php if (isset($msg)) {
                echo $msg;
            } ?>

            <button type="submit" name="ajoutAnnonce" class="btn green">Ajouter</button>

        </form>

    </div>



</body>

</html>