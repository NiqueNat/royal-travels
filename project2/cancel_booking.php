<?php


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

    // Get the booking ID from the URL parameter
    $bookingId = $_GET['booking_id'];

    // Delete the booking from the database
    $stmt = $db->prepare('DELETE FROM Bookings WHERE BookingID = ?');
    $stmt->execute([$bookingId]);

    // Redirect back to the admin dashboard
    header('Location: admin_dashboard.php');

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
