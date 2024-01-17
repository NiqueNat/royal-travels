<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT'].'/ui-ux/projects/project2/php/db.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_type'])) {
    // If user_type is not set in the session, redirect to the login page
    header("Location: https://myrna67.web582.com/ui-ux/projects/project2/index.php");
    exit();
} else if ($_SESSION['user_type'] === 'Admin') {
    // If user_type is 'Admin', redirect to the admin dashboard
    header("Location: https://myrna67.web582.com/ui-ux/projects/project2/admin_dashboard.php");
    exit();
}

// Fetch and display hotel and package information
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Fetch hotel information
    $hotelStmt = $db->query('SELECT * FROM Hotels');
    $hotels = $hotelStmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch package information
    $packageStmt = $db->query('SELECT * FROM Packages');
    $packages = $packageStmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch user's bookings
    $userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    if ($userID) {
        $bookingStmt = $db->prepare('SELECT * FROM Bookings WHERE UserID = ?');
        $bookingStmt->execute([$userID]);
        $bookings = $bookingStmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $bookings = [];
    }
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
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://myrna67.web582.com/ui-ux/projects/project2/assets/css/style.css">
</head>
<body>
    <h2>Welcome, User!</h2>

    <div class="container">
    <div class="hotels">
    <!-- Display hotel information -->
    <h3>Hotel Information</h3>
    <ul>
        <?php foreach ($hotels as $hotel): ?>
            <li>
                <?= isset($hotel['HotelName']) ? $hotel['HotelName'] : 'N/A' ?> -
                <?= isset($hotel['HotelLocation']) ? $hotel['HotelLocation'] : 'N/A' ?> -
                $<?= isset($hotel['PerNightRate']) ? $hotel['PerNightRate'] : 'N/A' ?>
            </li>
        <?php endforeach; ?>
    </ul>
    </div>

    <div class="packages">
    <!-- Display package information -->
    <h3>Package Information</h3>
    <table border="1">
        <tr>
            <th>Package ID</th>
            <th>Package Name</th>
            <th>Package Price</th>
            <th>Hotel ID</th>
        </tr>
        <?php foreach ($packages as $package): ?>
            <tr>
                <td><?= $package['PackageID'] ?? 'N/A' ?></td>
                <td><?= $package['PackageName'] ?? 'N/A' ?></td>
                <td><?= $package['PackagePrice'] ?? 'N/A' ?></td>
                <td><?= $package['HotelID'] ?? 'N/A' ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
    
<div class="bookings">
   <!-- Display user's bookings -->
<h3>Your Bookings</h3>
<table border="1">
    <tr>
        <th>Booking ID</th>
        <th>Package ID</th>
        <th>Hotel ID</th>
        <th>Check-In Date</th>
        <th>Check-Out Date</th>
        <th>Total Price</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?= $booking['BookingID'] ?? 'N/A' ?></td>
            <td><?= $booking['PackageID'] ?? 'N/A' ?></td>
            <td><?= $booking['HotelID'] ?? 'N/A' ?></td>
            <td><?= $booking['CheckInDate'] ?? 'N/A' ?></td>
            <td><?= $booking['CheckOutDate'] ?? 'N/A' ?></td>
            <td>$<?= $booking['TotalPrice'] ?? 'N/A' ?></td>
            <td>
                <a href="edit_booking.php?booking_id=<?= $booking['BookingID'] ?>">Edit</a> |
                <a href="cancel_booking.php?booking_id=<?= $booking['BookingID'] ?>">Cancel</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>

<?php if (!empty($bookings)): ?>
    <table>
        <tr>
            <th>Booking ID</th>
            <th>Package ID</th>
            <th>Hotel ID</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?= isset($booking['BookingID']) ? htmlspecialchars($booking['BookingID']) : 'N/A' ?></td>
                <td><?= isset($booking['PackageID']) ? htmlspecialchars($booking['PackageID']) : 'N/A' ?></td>
                <td><?= isset($booking['HotelID']) ? htmlspecialchars($booking['HotelID']) : 'N/A' ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No bookings found.</p>
<?php endif; ?>
        <br>
    <button><a href="https://myrna67.web582.com/ui-ux/projects/project2/logout.php">Logout</a></button>
    </div>
</body>
</html>
