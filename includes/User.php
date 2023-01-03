<?php
$conn = new mysqli('localhost', 'root', '', 'classes');

class User
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
        global $conn;
    }

    public function register($login, $password, $email, $firstname, $lastname)
    {
        global $conn;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $newUser = "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$login', '$password', '$email', '$firstname', '$lastname')";
        if ($conn->query($newUser) === TRUE) {
            echo "bravo!";
        } else {
            echo "bouuuuuuuuu";
        }
    }

    public function connect($login, $password)
    {
        global $conn;
        $this->login = $login;
        $this->password = $password;
        // requete pour récupérer le contenu de la DB pour l'utilisateur concerné
        $catchUsers = $conn->query("SELECT * FROM utilisateurs WHERE login='$login';");
        // fetch le contenu de la requête
        $userInfo = $catchUsers->fetch_assoc();
        $_SESSION['id'] = $userInfo['id'];

        if ($userInfo['id'] === $_SESSION['id']) {
            $_SESSION['login'] = $userInfo['login'];
            $_SESSION['password'] = $userInfo['password'];
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['firstname'] = $userInfo['firstname'];
            $_SESSION['lastname'] = $userInfo['lastname'];
        }
    }

    public function disconnect()
    {
        global $conn;
        unset($_SESSION['login']);
        session_destroy();
        header("refresh:3;url=../connexion.php");
    }

    public function delete()
    {
        global $conn;
        $login = $_SESSION['login'];
        $eraseUser = $conn->query("DELETE FROM utilisateurs WHERE login='$login';");
        // détruire la session
        unset($_SESSION['login']);
        session_destroy();

    }

    public function update()
    {
    }

    public function isConnected()
    {
    }

    public function getAllInfos()
    {
    }

    public function getLogin()
    {
    }

    public function getEmail()
    {
    }

    public function getFirstName()
    {
    }

    public function getLastName()
    {
    }
}
