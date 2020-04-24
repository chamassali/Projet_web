<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');
$reqAnnonce = $bdd->query("SELECT * FROM annonces");

?>

<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/e7e038a132.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="../assets/css/style.css">

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

        <div id="annonce-main-container">

            <?php
            if (empty($_GET['q'])) {
                $variable = "";
                while ($variable = $reqAnnonce->fetch()) {
                    $requser = $bdd->prepare("SELECT * FROM users WHERE id_users = ?;");
                    $requser->execute(array($variable["id_users"]));
                    $userInfo = $requser->fetch();
            ?>

                    <div id="annonce-container">

                        <div id="image-container">
                            <img src="../assets/images/<?php echo $variable['image'] ?>" alt="" id="image">
                        </div>

                        <div id="vertical-bar"></div>

                        <div id="info-container">

                            <div id="title-container">
                                <span class="bold-annonce"><?php echo $variable['titre']; ?></span>
                            </div>

                            <div id="description-container">
                                <span class="bold-annonce">Description :</span> <?php echo $variable['description']; ?>
                            </div>

                            <div id="price-container">
                                <span class="bold-annonce">Prix :</span> <?php echo $variable['prix'];
                                                                            echo "€"; ?>
                            </div>

                            <div id="userInfo-container">
                                <span class="bold-annonce">Contact du vendeur :</span> <?php echo $userInfo['mail']; ?>
                            </div>

                        </div>

                    </div>
                <?php }
            } elseif ($articles->rowCount() == 0) {
                ?>

                <div id="no-results"> Nous avons trouvé aucun résultat pour : <?php echo $q ?></div>
                <?php
            } else {
                while ($a = $articles->fetch()) {
                    $variable = $reqAnnonce->fetch();
                    $requser = $bdd->prepare("SELECT * FROM users WHERE id_users = ?;");
                    $requser->execute(array($variable["id_users"]));
                    $userInfo = $requser->fetch();
                ?>

                    <div id="annonce-container">

                        <div id="image-container">
                            <img src="../assets/images/<?php echo $a['image'] ?>" alt="" id="image">
                        </div>

                        <div id="vertical-bar"></div>

                        <div id="info-container">

                            <div id="title-container">
                                <span class="bold-annonce"><?php echo $a['titre']; ?></span>
                            </div>

                            <div id="description-container">
                                <span class="bold-annonce">Description :</span> <?php echo $a['description']; ?>
                            </div>

                            <div id="price-container">
                                <span class="bold-annonce">Prix :</span> <?php echo $a['prix'];
                                                                            echo "€"; ?>
                            </div>

                            <div id="userInfo-container">
                                <span class="bold-annonce">Contact du vendeur :</span> <?php echo $userInfo['mail']; ?>
                            </div>

                        </div>

                    </div>



            <?php }
            } ?>
        </div>

    </div>

</body>

</html>