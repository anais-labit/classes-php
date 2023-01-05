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
        global $conn;
        $login = $_SESSION['login'];
        $this->password = $password;
        $this->login = $newLogin;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $upInfo = $conn->query("UPDATE utilisateurs SET login='$newLogin', password='$password', email='$email', firstname='$firstname', lastname='$lastname' WHERE login='$login'");
        var_dump($upInfo);

        if ($upInfo === TRUE) {
            echo "Les modifications ont bien été prises en compte";
        } else {
            echo "bouuuuuuuuu";
        }
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
        global $conn;
        $login = $_SESSION['login'];
        $catchInfos = $conn->query("SELECT * FROM utilisateurs WHERE login ='$login'");
        $userInfo = $catchInfos->fetch_assoc();
        $this->id = $userInfo['id'];
        $this->password = $userInfo['password'];
        $this->login = $userInfo['login'];
        $this->email = $userInfo['email'];
        $this->firstname = $userInfo['firstname'];
        $this->lastname = $userInfo['lastname'];
    }

    public function getLogin()
    {
        global $conn;
        $login = $_SESSION['login'];
        $catchInfos = $conn->query("SELECT login FROM utilisateurs WHERE login ='$login'");
        $userInfo = $catchInfos->fetch_assoc();
        $this->login = $userInfo['login'];
    }

    public function getEmail()
    {
        global $conn;
        $login = $_SESSION['login'];
        $catchInfos = $conn->query("SELECT email FROM utilisateurs WHERE login ='$login'");
        $userInfo = $catchInfos->fetch_assoc();
        $this->email = $userInfo['email'];
    }

    public function getFirstName()
    {
        global $conn;
        $login = $_SESSION['login'];
        $catchInfos = $conn->query("SELECT firstname FROM utilisateurs WHERE login ='$login'");
        $userInfo = $catchInfos->fetch_assoc();
        $this->firstname = $userInfo['firstname'];
    }

    public function getLastName()
    {
        global $conn;
        $login = $_SESSION['login'];
        $catchInfos = $conn->query("SELECT lastname FROM utilisateurs WHERE login ='$login'");
        $userInfo = $catchInfos->fetch_assoc();
        $this->lastname = $userInfo['lastname'];
    }
}
