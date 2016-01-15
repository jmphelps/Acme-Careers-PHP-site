<?php
    $dsn = 'mysql:host=localhost;dbname=w182_jmphelps';
    $username = 'w182_jmphelps';
    $password = 'JoPhe6211';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./../errors/database_error.php');
        exit();
    }
?>