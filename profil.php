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
        if ((isset($_SESSION['login']))) {
            echo " <h1> Modifier votre profil " . ucwords($_SESSION['login']) . "</h1> <br>" . "Vos informations connues à ce jour :";
            $userInfo = new User();
            $userInfo->getAllInfos();
        ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $userInfo->id ?></td>
                        <td><?= $userInfo->login ?></td>
                        <td><?= $userInfo->email ?></td>
                        <td><?= $userInfo->firstname ?></td>
                        <td><?= $userInfo->lastname ?></td>
                    </tr>
                </tbody>
            </table>
        <?php
        } else {
            header('Location: inscription.php');
        }
        ?>

        <div class="formContainer">
            <form action="profil.php" method="post">
                <input type="text" name="newlogin" placeholder="<?= $userInfo->login ?>" useecho r$userInfouired>
                <!-- <input type="password" name="confpwd" placeholder="Ancien mot de passe" useecho r$userInfouired> -->
                <input type="password" name="newpwd" placeholder="Nouveau Mot de passe" useecho r$userInfouired>
                <!-- <input type="password" name="newpwd2" placeholder="Confirmation" useecho r$userInfouired> -->
                <input type="email" name="newemail" placeholder="<?= $userInfo->email ?>" useecho r$userInfouired>
                <input type="text" name="newfirstname" placeholder="<?= $userInfo->firstname ?>" useecho r$userInfouired>
                <input type="text" name="newlastname" placeholder="<?= $userInfo->lastname ?>" useecho r$userInfouired>
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