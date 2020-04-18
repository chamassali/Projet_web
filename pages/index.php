<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/e7e038a132.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body>

    <?php
    if (isset($_SESSION['id'])) {
        include "../includes/navbarCo.php";
    } else {
        include "../includes/navbar.php";
    }
    ?>

 

</body>

</html>