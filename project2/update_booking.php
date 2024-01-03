<?php
// Connect to your database
$host = "localhost:3306";
$dbname = "Royal_Travels";
$username = "myrna223";
$dbPassword = "yz#2V7p22";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

    // Get the booking details from the form submission
    $bookingId = $_POST['booking_id'];
    $userId = $_POST['user_id'];
    $packageId = $_POST['package_id'];

    // Update the booking in the database
    $stmt = $db->prepare('UPDATE Bookings SET UserID = ?, PackageID = ? WHERE BookingID = ?');
    $stmt->execute([$userId, $packageId, $bookingId]);

    // Redirect back to the admin dashboard
    header('Location: admin_dashboard.php');

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>