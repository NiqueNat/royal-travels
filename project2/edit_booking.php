<?php

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

    <form action="update_booking.php" method="post">
        <input type="hidden" name="booking_id" value="<?= $booking['BookingID'] ?>">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" value="<?= $booking['UserID'] ?>">
        <label for="package_id">Package ID:</label>
        <input type="text" id="package_id" name="package_id" value="<?= $booking['PackageID'] ?>">
        <!-- Add other fields as needed -->
        <input type="submit" value="Update Booking">
    </form>

    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
