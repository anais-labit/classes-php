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
    public function __construct($login, $password, $email, $firstname, $lastname)
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

    public function connect()
    {
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
