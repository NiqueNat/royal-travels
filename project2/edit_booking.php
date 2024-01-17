<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/ui-ux/projects/project2/php/db.php';

session_start();

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

    // Get the booking ID from the URL parameter
    $bookingId = $_GET['booking_id'];

    // Fetch the booking from the database
    $stmt = $db->prepare('SELECT * FROM Bookings WHERE BookingID = ?');
    $stmt->execute([$bookingId]);
    $booking = $stmt->fetch();

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="https://myrna67.web582.com/ui-ux/projects/project2/assets/css/style.css">
</head>
<body>
    <h2>Edit Booking</h2>
    <div class="container">
    <form action="update_booking.php" method="post">
        <input type="hidden" name="booking_id" value="<?= $booking['BookingID'] ?>">
        <label for="check_in_date">Check-In Date:</label>
        <input type="date" id="check_in_date" name="check_in_date" value="<?= $booking['CheckInDate'] ?>">
        <label for="check_out_date">Check-Out Date:</label>
        <input type="date" id="check_out_date" name="check_out_date" value="<?= $booking['CheckOutDate'] ?>">
        <input type="submit" value="Update Booking">
    </form>

    <a href="<?= $_SESSION['user_type'] === 'Admin' ? 'admin_dashboard.php' : 'user_dashboard.php' ?>">Back to Dashboard</a>
    </div>
</body>
</html>