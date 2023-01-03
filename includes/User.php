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
        // verifier si le login existe déjà en comptant les éventuels doublons
        $users = mysqli_num_rows($catchUsers);
        // fetch le contenu de la requête
        $userInfo = $catchUsers->fetch_all();
        // var_dump($userInfo[0][2]);
        echo "Bienvenue " . ($userInfo[0][1]);
    }

    public function disconnect()
    {
    }

    public function delete()
    {
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
