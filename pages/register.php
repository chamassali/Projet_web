<?php include('../includes/server.php') ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e7e038a132.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/register.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <title>Register</title>
</head>

<body>
    <div id="wrapper">

        <nav id="navbar-container">

            <div id="logo-container">
                <a href="index.html"><img id="page-background-logo" src="../assets/images/logo.png" alt=""></a>
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

        <div id="center-wrapper">

            <div id="form-container">

                <form method="post" action="register.php" id="register-form">

                    <?php include('errors.php'); ?>

                    <div id="form-title">Register</div>

                    <input type="text" class="login-form" placeholder="Username" name="username" value="<?php echo $username; ?>">

                    <input type="text" class="login-form" placeholder="name" name="name" value="<?php echo $name; ?>">

                    <input type="text" class="login-form" placeholder="Family Name" name="familyName" value="<?php echo $familyName; ?>">

                    <input type="email" class="login-form" placeholder="Email" name="email" value="<?php echo $email; ?>">

                    <input type="password" class="login-form" placeholder="Password" name="password_1">

                    <input type="password" class="login-form" placeholder="Condirm Password" name="password_2">

                    <button type="submit" name="reg_user" id="login-button">Register</button>

                    <a id="sign-up-link" href="connexion.php">Already a user ? Sign in !</a>

                </form>

            </div>

        </div>

    </div>
</body>

</html>