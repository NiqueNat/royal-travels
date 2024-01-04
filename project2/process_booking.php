<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/ui-ux/projects/project2/php/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Get the form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $packageID = isset($_POST['package']) ? $_POST['package'] : '';
    $checkinDate = isset($_POST['checkin']) ? $_POST['checkin'] : '';
    $checkoutDate = isset($_POST['checkout']) ? $_POST['checkout'] : '';

    // Validate the form data 
    if (empty($name) || empty($email) || empty($packageID) || empty($checkinDate) || empty($checkoutDate)) {
        // Handle validation errors (redirect or display an error message)
        header("Location: booking_form.php?error=Please fill in all fields");
        exit();
    }


    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

        $totalCost = $_POST['totalCost'];

        // Insert booking information into the 'Bookings' table
        $stmt = $db->prepare('INSERT INTO Bookings (UserID, PackageID, CheckinDate, CheckoutDate, TotalCost) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$userID, $packageID, $checkinDate, $checkoutDate, $totalCost]);

        // Redirect to a success page or display a success message
        header("Location: booking_success.php");
        exit();
    } catch (PDOException $e) {
        // Handle database connection or query error
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
} else {
    // Redirect to the booking form if accessed without a form submission
    header("Location: booking_form.php");
    exit();
}
?>
