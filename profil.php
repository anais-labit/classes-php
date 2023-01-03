<!-- détruire la session à la deconnexion -->
<?php
session_start();
require_once './includes/header.php';
require_once './includes/User.php';

// récupéer les valeurs de session
$login = $_SESSION['login'];

// si le formulaire est envoyé
if (isset($_POST['submit'])) {

}


if (isset($_POST['erase'])) {
    $delete = new User();
    $delete->delete();
    $logout = new User();
    $logout->disconnect();
    echo "<p>" . "Votre compte a bien été supprimé" . "</p>";
    // rediriger vers le formulaire d'inscription
    header("refresh:3;url=../inscription.php");
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>

    <div class="page">
        <form action="profil.php" method="post">
            <input type="text" name="login" placeholder="Login <?php $login ?> ou nouveau ?" required>
            <input type="password" name="confpwd" placeholder="Ancien mot de passe" required>
            <input type="password" name="newpwd" placeholder="Nouveau Mot de passe" required>
            <input type="password" name="newpwd2" placeholder="Confirmation" required>
            <input type="submit" name="submit" value="Sauvegarder les changements">
            <input type="submit" name="erase" value="supprimer votre compte">
        </form>
    </div>

</body>

</html>