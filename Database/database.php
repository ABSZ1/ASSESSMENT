<?php
$dsn = 'mysql:host=localhost;dbname=Shopping_Database'; //Database credentials to make it work
$username = 'root';
$password = '';

try
{
    $db = new PDO($dsn, $username, $password);
}
catch(PDOException $e)
{
    $error_message = $e->getMessage(); //Execute database error message if anything wrong happens
    include ('database_error.php');
    exit();
}
?>
