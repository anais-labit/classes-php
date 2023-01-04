<!-- détruire la session à la deconnexion -->
<?php
session_start();
require_once './includes/header.php';
require_once './includes/User.php';


// si le formulaire update est envoyé
if (isset($_POST['save'])) {
    $login = $_POST['newlogin'];
    $password = $_POST['newpwd'];
    $email = $_POST['newemail'];
    $firstname = $_POST['newfirstname'];
    $lastname = $_POST['newlastname'];
    $update = new User();
    $update->update($login, $password, $email, $firstname, $lastname);
}

// si le bouton supprimer est cliqué
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
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Modification</title>
</head>

<body>

    <div class="page">
        <?php
        // salut personnalisé s'il y a un login
        if (isset($login)) {
            echo " <h1> Modifier votre profil " . ucwords($login) . "</h1>";
        } else {
            echo "<h1> Salut ! </h1>";
        }
        ?>

        <div class="formContainer">
            <form action="profil.php" method="post">
                <input type="text" name="newlogin" placeholder="Login" required>
                <!-- <input type="password" name="confpwd" placeholder="Ancien mot de passe" required> -->
                <input type="password" name="newpwd" placeholder="Nouveau Mot de passe" required>
                <!-- <input type="password" name="newpwd2" placeholder="Confirmation" required> -->
                <input type="email" name="newemail" placeholder="Email" required>
                <input type="text" name="newfirstname" placeholder="Prénom" required>
                <input type="text" name="newlastname" placeholder="Nom" required>
                <input type="submit" name="save" value="Sauvegarder les changements">
                <input type="submit" name="erase" value="Supprimer mon compte">

            </form>
        </div>
    </div>

    <?php
    require_once './includes/footer.php';
    ?>

</body>

</html>