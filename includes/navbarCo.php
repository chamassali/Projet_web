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
            <a href="index.php?id=<?php echo $_SESSION['id'] ?>"><img id="page-background-logo" src="../assets/images/logo.png" alt=""></a>
        </div>

        <div id="navbar">
            <ul>
                <li><a href="index.php?id=<?php echo $_SESSION['id'] ?>">Acceuil</a></li>
                <li><a href="contact.php?id=<?php echo $_SESSION['id'] ?>">Contact</a></li>
                <li id="user-icon-container"><a href="profil.php?id=<?php echo $_SESSION['id'] ?>"><i class="fas fa-user user-icon"></i></a></li>
            </ul>
        </div>
    </nav>

</body>

</html>