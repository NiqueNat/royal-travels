<?php
session_start();

if (isset($_POST['name'])) {
    // Assuming you have a 'Users' table with a 'UserID' column
    $userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $packageID = strip_tags($_POST['package']); 
    $checkinDate = strip_tags($_POST['checkin']);
    $checkoutDate = strip_tags($_POST['checkout']);
    $totalPrice = strip_tags($_POST['totalPrice']);



    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

        // Insert booking information into the 'Bookings' table
        $stmt = $db->prepare('INSERT INTO Bookings (UserID, PackageID, HotelID, CheckinDate, CheckoutDate, TotalPrice) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$userID, $packageID, $hotelID, $checkinDate, $checkoutDate, $totalPrice]);

        // Redirect to a success page or display a success message
        header("Location: booking_success.php");
        exit();
    } catch (PDOException $e) {
        // Handle database connection or query error
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
}
?>
