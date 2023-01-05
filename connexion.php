<?php
session_start();
require_once './includes/User.php';
require_once './includes/header.php';


if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $connectUser = new User($login, $password);
    $connectUser->connect($login, $password);

    echo "Bienvenue " . ($_SESSION['login']) . "<br>";
    $displayConn = new User();
    $displayConn->isConnected();
    header('refresh:3; url= profil.php');
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Connexion</title>
</head>

<body>
    <div class="page">
        <h1>Se connecter</h1>

        <div class="formContainer">
            <form action="connexion.php" method="post">
                <input type="text" name="login" placeholder="Login" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" id="log" name="submit" value="Connexion">
            </form>
        </div>
    </div>

    <?php
    require_once './includes/footer.php';
    ?>

</body>

</html>