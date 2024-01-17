<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

list($db, $dbPassword) = include_once $_SERVER['DOCUMENT_ROOT'].'/ui-ux/projects/project2/php/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $userType = isset($_POST['userType']) ? $_POST['userType'] : '';

    try {
        $stmt = $db->prepare('SELECT * FROM Users WHERE Email = ? AND Password = ? AND Category = ?');
        $stmt->execute([$email, $password, $userType]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user_type'] = $userType;
            $_SESSION['user_id'] = $user['UserID']; 
        
            if ($userType == 'Admin') {
                header("Location: https://myrna67.web582.com/ui-ux/projects/project2/admin_dashboard.php");
                exit();
            } else {
                header("Location: https://myrna67.web582.com/ui-ux/projects/project2/packages.php");
                exit();
            }
        } else {
            $error = "Invalid email, password, or user type.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>