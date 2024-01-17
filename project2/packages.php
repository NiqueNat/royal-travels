<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

list($db, $password) = include_once $_SERVER['DOCUMENT_ROOT'].'/ui-ux/projects/project2/php/db.php';

session_start();
print_r($_SESSION);

try {
    $host = "localhost:3306";
    $dbname = "Royal_Travels";
    $username = "myrna223";
    $dbPassword = "yz#2V7p22";

    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $hotelStmt = $db->query('SELECT * FROM Hotels');
    $hotels = $hotelStmt->fetchAll(PDO::FETCH_ASSOC);
    
    $packageStmt = $db->query('SELECT * FROM Packages');
    $packages = $packageStmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Tourist Booking Form</title>
    <link rel="stylesheet" href="https://myrna67.web582.com/ui-ux/projects/project2/assets/css/style.css">
</head>
<body>
    <h2>Booking Form</h2>
    
    <form method="post" action="booking.php">
       <!-- Display available hotels -->
<label for="hotel">Select Hotel:</label>
<select id="hotel" name="hotel" required>
    <?php
    foreach ($hotels as $hotel) {
        echo "<option value=\"{$hotel['HotelID']}\">{$hotel['HotelName']} - {$hotel['HotelLocation']} - {$hotel['PerNightRate']}</option>";
    }
    ?>
</select>
        
        <br>
        
        <!-- Display available packages -->
        <label for="package">Select Package:</label>
        <select id="package" name="package" required>
            <?php
            foreach ($packages as $package) {
                echo "<option value=\"{$package['PackageID']}\">Package {$package['PackageID']}</option>";
            }
            ?>
        </select>
        
        <br>
        
        <!-- Other input fields -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <br>
        
        <label for="checkin">Check-In Date:</label>
        <input type="date" id="checkin" name="checkin" required>
        
        <br>
        
        <label for="checkout">Check-Out Date:</label>
        <input type="date" id="checkout" name="checkout" required>
        
        <br>
        
        <button type="submit">Book Now</button>
    </form>
</body>
</html>
