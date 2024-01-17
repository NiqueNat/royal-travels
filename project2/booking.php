<?php
include $_SERVER['DOCUMENT_ROOT'].'/ui-ux/projects/project2/php/db.php';

session_start();

if (isset($_POST['name'])) {
  
    $userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $packageID = strip_tags($_POST['package']); 
    $hotelID = isset($_POST['hotel']) ? strip_tags($_POST['hotel']) : '';
    $checkinDate = new DateTime(strip_tags($_POST['checkin']));
    $checkoutDate = new DateTime(strip_tags($_POST['checkout']));

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Retrieve the price per day from the 'Packages' table
        $stmt = $db->prepare('SELECT PackagePrice FROM Packages WHERE PackageID = ?');
        $stmt->execute([$packageID]);
        $package = $stmt->fetch(PDO::FETCH_ASSOC);
        $pricePerDay = $package['PackagePrice'];

        // Calculate the number of days between the check-in and check-out dates
        $numDays = $checkinDate->diff($checkoutDate)->days;

        // Calculate the total price
        $totalPrice = $pricePerDay * $numDays;

        // Insert booking information into the 'Bookings' table
        $stmt = $db->prepare('INSERT INTO Bookings (UserID, PackageID, HotelID, CheckinDate, CheckoutDate, TotalPrice) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$userID, $packageID, $hotelID, $checkinDate->format('Y-m-d'), $checkoutDate->format('Y-m-d'), $totalPrice]);

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