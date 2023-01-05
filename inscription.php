<?php
// démarrer une session
session_start();
require_once './includes/User.php';

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    
    $password = $_POST['pwd'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $newUser = new User($login, $password, $email, $firstname, $lastname);
    $newUser->register($login, $password, $email, $firstname, $lastname);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <?php
    require_once './includes/header.php';
    ?>

    <div class="page">
        <div class="form_container">
            <form action="inscription.php" method="post">
                <div class="banner">
                    <h1>S'inscrire</h1>
                </div>
                <input type="text" placeholder="Login" name="login" required>
                <input type="password" placeholder="Mot de passe" name="pwd" required>
                <input type="password" placeholder="Confirmation de mot de passe" name="pwd2" required>
                <input type="email" placeholder="email" name="email" required>
                <input type="text" placeholder="Prénom" name="firstname" required>
                <input type="text" placeholder="Nom" name="lastname" required>
                <input type="submit" name="submit" value="Créer mon compte">
            </form>
        </div>
    </div>
    <?php
    require_once './includes/footer.php';
    ?>

</body>

</html>