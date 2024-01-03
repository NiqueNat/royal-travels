<?php
include $_SERVER['DOCUMENT_ROOT'].'/ui-ux/projects/project2/php/db.php';

session_start(); // Start the session

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the user is logged in

if (!isset($_SESSION['user_type'])) {
    // If user_type is not set in the session, redirect to login page
    header("Location: https://myrna67.web582.com/ui-ux/projects/project2/index.php");
    exit();
} else if ($_SESSION['user_type'] === 'Admin') {
    // If user_type is 'Admin', redirect to the admin dashboard
    header("Location: https://myrna67.web582.com/ui-ux/projects/project2/admin_dashboard.php");
    exit();
}

// Fetch and display hotel and package information
$host = "localhost:3306";
$dbname = "Royal_Travels";
$username = "myrna223";
$dbPassword = "yz#2V7p22";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

    // Fetch hotel information
    $hotelStmt = $db->query('SELECT * FROM Hotels');
    $hotels = $hotelStmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch package information
    $packageStmt = $db->query('SELECT Packages.*, Hotels.HotelName, Hotels.PricePerNight FROM Packages JOIN Hotels ON Packages.HotelID = Hotels.HotelID');
    $packages = $packageStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Fetch user's bookings
    $userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    echo $_SESSION['user_id'];

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

    <!-- Display hotel information -->
    <h3>Hotel Information</h3>
    <ul>
        <?php foreach ($hotels as $hotel): ?>
            <li>
                <?= isset($hotel['HotelName']) ? $hotel['HotelName'] : 'N/A' ?> -
                <?= isset($hotel['Location']) ? $hotel['Location'] : 'N/A' ?> -
                $<?= isset($hotel['PerNightRate']) ? $hotel['PerNightRate'] : 'N/A' ?>
            </li>
        <?php endforeach; ?>
    </ul>

 <!-- Display package information -->
<h3>Package Information</h3>
<ul>
    <?php foreach ($packages as $package): ?>
        <li>
            <?php echo isset($package['PackageName']) ? $package['PackageName'] : 'N/A' ?> -
            $<?php echo isset($package['PackagePrice']) ? $package['PackagePrice'] : 'N/A' ?>
        </li>
    <?php endforeach; ?>
</ul>

    <!-- Display user's bookings -->
    <h3>Your Bookings</h3>
    <ul>
        <?php foreach ($bookings as $booking): ?>
            <li>
                Booking ID: <?= isset($booking['BookingID']) ? $booking['BookingID'] : 'N/A' ?>
                Package ID: <?= isset($booking['PackageID']) ? $booking['PackageID'] : 'N/A' ?>
                Hotel ID: <?= isset($booking['HotelID']) ? $booking['HotelID'] : 'N/A' ?>
                Check-In Date: <?= isset($booking['CheckInDate']) ? $booking['CheckInDate'] : 'N/A' ?>
                Check-Out Date: <?= isset($booking['CheckOutDate']) ? $booking['CheckOutDate'] : 'N/A' ?>
                Total Price: $<?= isset($booking['TotalPrice']) ? $booking['TotalPrice'] : 'N/A' ?>
            </li>

            
        <?php endforeach; ?>
    </ul>

    <?php if (!empty($bookings)): ?>
    <table>
        <tr>
            <th>Booking ID</th>
            <th>Package ID</th>
            <th>Hotel ID</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo htmlspecialchars($booking['BookingID']); ?></td>
                <td><?php echo htmlspecialchars($booking['PackageID']); ?></td>
                <td><?php echo htmlspecialchars($booking['HotelID']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No bookings found.</p>
<?php endif; ?>

    <a href="https://myrna67.web582.com/ui-ux/projects/project2/logout.php">Logout</a>
</body>
</html>
