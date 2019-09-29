<?php
    $server = 'localhost';
    $username = 'root';
    $password = 'iu';
    $database = 'php_login_database';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    } catch (PDOException $e) {
        die('Connected failed: '.$e -> getMessage());
    }
?>
