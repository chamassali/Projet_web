<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register;charset=utf8', 'root', '');

$articles = $bdd->query('SELECT titre FROM articles ORDER BY id DESC');
if (isset($_GET['q']) and !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $articles = $bdd->query('SELECT * FROM annonces WHERE titre LIKE "%' . $q . '%" ORDER BY id_annonces DESC');
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
</head>

<body>

    <nav id="navbar-container">

        <div id="logo-container">
            <a href="index.php"><img id="page-background-logo" src="../assets/images/logo.png" alt=""></a>
        </div>

        <div>
            <form id="search-bar-container" method="GET">
                    <input type="text" placeholder="Rechercher" name="q" class="search-form">
                    <button type="submit" value="" id="search-submit"><i class="fas fa-search search-icon"></i></button>
            </form>
        </div>

        <div id="navbar">
            <ul>
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="contact.php">Support</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </div>
    </nav>

</body>

</html>