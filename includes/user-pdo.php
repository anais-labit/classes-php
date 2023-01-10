<?php

$DB_DSN = 'mysql:host=localhost; dbname=classes';
$username = 'root';
$password_db = '';

$conn = new PDO($DB_DSN, $username, $password_db);

class User_pdo
{
    // déclaration des propriétés
    private $_id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    // déclaration des méthodes/attributs
    public function __construct()
    {
    }

    public function register($login, $password, $email, $firstname, $lastname)
    {
        global $conn;
        $req = "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (:login, :password, :email, :firstname, :lastname)";
        $newUser = $conn->prepare($req);
        $newUser->bindParam(':login', $login);
        $newUser->bindParam(':password', $password);
        $newUser->bindParam(':email', $email);
        $newUser->bindParam(':firstname', $firstname);
        $newUser->bindParam(':lastname', $lastname);
        $newUser->execute();
    }

    public function connect($login, $password)
    {
        global $conn;
        $req = "SELECT (login, password) FROM utilisateurs WHERE login=:login";
        $connUser = $conn->prepare($req);
        $connUser->bindParam(':login', $login);
        $connUser->bindParam(':password', $password);
        $connUser->execute();
        $

    }

    public function disconnect()
    {
        global $conn;
        unset($_SESSION['login']);
        session_destroy();
        header('Location:../connexion.php');
    }

    public function delete()
    {
        global $conn;
        $eraseUser = $conn->query("DELETE FROM utilisateurs WHERE login='$login';");
        // détruire la session
        unset($_SESSION['login']);
        session_destroy();
    }

    public function update($newLogin, $password, $email, $firstname, $lastname)
    {

        $upInfo = $conn->query("UPDATE utilisateurs SET login='$newLogin', password='$password', email='$email', firstname='$firstname', lastname='$lastname' WHERE login='$login'");
    }

    public function isConnected()
    {
        global $conn;
        $login = $_SESSION['login'];
        if (isset($login)) {
            echo $login . ", vous êtes bien connecté";
        } else {
            header('Location: connexion.php');
        }
    }

    public function getAllInfos()
    {

        $catchInfos = $conn->query("SELECT * FROM utilisateurs WHERE login ='$login'");
    }

    public function getLogin()
    {

        $catchInfos = $conn->query("SELECT login FROM utilisateurs WHERE login ='$login'");
    }

    public function getEmail()
    {

        $catchInfos = $conn->query("SELECT email FROM utilisateurs WHERE login ='$login'");
    }

    public function getFirstName()
    {

        $catchInfos = $conn->query("SELECT firstname FROM utilisateurs WHERE login ='$login'");
    }

    public function getLastName()
    {

        $catchInfos = $conn->query("SELECT lastname FROM utilisateurs WHERE login ='$login'");
    }
}
