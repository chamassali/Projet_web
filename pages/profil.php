<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');


if (isset($_GET['id_users']) and $_GET['id_users'] > 0) {

    $getId = intval($_GET['id_users']);
    $requser = $bdd->prepare("SELECT * FROM users where id_users = ?");
    $requser->execute(array($getId));
    $userInfo = $requser->fetch();
    $_SESSION['id_users'] = $userInfo['id_users'];


    $reqAnnonce = $bdd->query("SELECT * FROM annonces A JOIN users U ON A.id_users = U.id_users WHERE A.id_users = $getId");
?>



    <html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil</title>

        <link rel="stylesheet" href="../../css/connexion.css">
        <link rel="stylesheet" href="../assets/css/profil.css">
        <link rel="stylesheet" href="../assets/css/navbar.css">
        <!-- Axentix CSS minified version -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.3/dist/css/axentix.min.css">

        <!-- Axentix JS minified version -->
        <script src="https://cdn.jsdelivr.net/npm/axentix@0.5.3/dist/js/axentix.min.js"></script>

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

        
            <div id="center-wrapper">
        
                <div id="annonce-main-container">

                    <?php
                    if (isset($_SESSION['id_users'])) {
                        $variable = "";
                        while ($variable = $reqAnnonce->fetch()) {
                    ?>


                            <div id="annonce-container">

                                <div id="image-container">
                                    <img src="../assets/images/<?php echo $variable['image'] ?>" alt="Image Annonce" id="image">
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

                        <?php } ?>

                </div>

                <div id="left-main-container">

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
                            if (isset($_SESSION['id_users']) and $userInfo['id_users'] == $_SESSION['id_users']); {
                            ?>
                                <a class="disconnect-edit" href="profilEdit.php">Modifier mon profil</a>
                                <a class="disconnect-edit" href="deconnexion.php">Se déconnecter</a>
                            <?php
                            }
                            ?>
                        </div>


                    </div>

                    <div id="edit-container">

                        <div id="sub-edit-container">

                            <a href="ajoutAnnonce.php"><button class="btn outline opening txt-green button" id="btn">
                                    <span class="outline-text">
                                        <i class="fas fa-plus"></i><span id="button-title"> Ajouter une annonce</span>
                                    </span></button></a>

                            <a href="modification.php"><button class="btn outline opening txt-green button" id="btn">
                                    <span class="outline-text">
                                        <i class="far fa-edit"></i></i><span id="button-title">Modifier une annonce</span>
                                    </span></button></a>

                            <a href="supression.php"><button class="btn outline opening txt-green button" id="btn">
                                    <span class="outline-text">
                                        <i class="fas fa-minus"></i><span id="button-title"> Supprimer une annonce</span>
                                    </span></button></a>

                        </div>

                    </div>

                </div>
            </div>


        </div>

    </body>

    </html>

<?php }
                } ?>