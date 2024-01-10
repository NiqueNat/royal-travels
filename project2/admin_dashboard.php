<!-- admin_dashboard.php -->
<?php
include $_SERVER['DOCUMENT_ROOT'].'/project2/php/db.php';

// Connect to your database


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

    // Fetch the bookings from the database
    $stmt = $db->prepare('SELECT * FROM Bookings');
    $stmt->execute();
    $bookings = $stmt->fetchAll();

    // Fetch the hotels from the database
    $stmt = $db->prepare('SELECT * FROM Hotels');
    $stmt->execute();
    $hotels = $stmt->fetchAll();

    // Fetch the packages from the database
    $stmt = $db->prepare('SELECT * FROM Packages');
    $stmt->execute();
    $packages = $stmt->fetchAll();

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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://myrna67.web582.com/ui-ux/projects/project2/assets/css/style.css">
</head>
<body>
    <h2>Welcome, Admin!</h2>

    <!-- Display hotel information -->
    <h3>Hotel Information</h3>
    <ul>
        <?php foreach ($hotels as $hotel): ?>
            <li><?= $hotel['HotelName'] ?> - <?= $hotel['HotelLocation'] ?> - $<?= $hotel['PerNightRate'] ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Display package information -->
    <h3>Package Information</h3>
    <table border="1">
        <tr>
            <th>Package ID</th>
            <th>User ID</th>
            <th>Booking ID</th>
            <th>Hotel Name</th>
            <!-- Add other package columns as needed -->
        </tr>
        <?php foreach ($packages as $package): ?>
            <tr>
                <td><?= $package['PackageID'] ?></td>
                <td><?= $package['UserID'] ?></td>
                <td><?= $package['BookingID'] ?></td>
                <td><?= $package['HotelName'] ?></td>
                <!-- Add other package columns as needed -->
            </tr>
        <?php endforeach; ?>
    </table>

   <!-- Display booking information -->
<h3>Booking Information</h3>
<table border="1">
    <tr>
        <th>Booking ID</th>
        <th>User ID</th>
        <th>Package ID</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?= $booking['BookingID'] ?></td>
            <td><?= $booking['UserID'] ?></td>
            <td><?= $booking['PackageID'] ?></td>
            <td>
                <a href="edit_booking.php?booking_id=<?= $booking['BookingID'] ?>">Edit</a>
                <a href="cancel_booking.php?booking_id=<?= $booking['BookingID'] ?>">Cancel</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

    <a href="https://myrna67.web582.com/ui-ux/projects/project2/logout.php">Logout</a>
</body>
</html>
