<!-- détruire la session à la deconnexion -->
<?php
session_start();
require_once 'User.php';

$logout = new User();
$logout->disconnect();
