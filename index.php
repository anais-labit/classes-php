<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>

    <?php
    require_once './includes/User.php';
    require_once './includes/header.php';
    ?>

    <h1>Bienvenue</h1>

    <?php
    require_once './includes/footer.php';
    ?>

</body>

</html>