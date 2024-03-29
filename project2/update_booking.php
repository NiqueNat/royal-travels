<?php


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

    // Get the booking details from the form submission
    $bookingId = $_POST['booking_id'];
    $userId = $_POST['user_id'];
    $packageId = $_POST['package_id'];
    $hotelID = $_POST['hotel_id'];

    // Update the booking in the database
    $stmt = $db->prepare('INSERT INTO Bookings (UserID, PackageID, HotelID, CheckinDate, CheckoutDate, TotalPrice) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$userID, $packageID, $hotelID, $checkinDate, $checkoutDate, $totalPrice]);

    // Redirect back to the admin dashboard
    header('Location: admin_dashboard.php');

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
