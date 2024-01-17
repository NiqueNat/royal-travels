
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT'] . '/ui-ux/projects/project2/php/db.php';

session_start(); 


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
    if (!$stmt->execute()) {
        print_r($stmt->errorInfo());
        exit();
    }
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

    <div class="hotels">
        <!-- Display hotel information -->
        <h3>Hotel Information</h3>
        <ul>
            <?php foreach ($hotels as $hotel): ?>
                <li>
                    <?= $hotel['HotelName'] ?> -
                    <?= $hotel['HotelLocation'] ?> - $
                    <?= $hotel['PerNightRate'] ?>
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
    </div>


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
                <td>
                    <?= $booking['BookingID'] ?>
                </td>
                <td>
                    <?= $booking['UserID'] ?>
                </td>
                <td>
                    <?= $booking['PackageID'] ?>
                </td>
                <td>
                    <a href="edit_booking.php?booking_id=<?= $booking['BookingID'] ?>">Edit</a>
                    <a href="cancel_booking.php?booking_id=<?= $booking['BookingID'] ?>">Cancel</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <button><a href="https://myrna67.web582.com/ui-ux/projects/project2/logout.php">Logout</a></button>
</body>

</html>