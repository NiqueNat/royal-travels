<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/ui-ux/projects/project2/php/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $userType = isset($_POST['userType']) ? $_POST['userType'] : '';

  

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);
        $stmt = $db->prepare('INSERT INTO Users (Name, Email, Password, Category) VALUES (?, ?, ?, ?)');
        $stmt->execute([$name, $email, $password, $userType]);

        // Redirect to the login page after successful registration
        header("Location: https://myrna67.web582.com/ui-ux/projects/project2/index.php");
        exit();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
