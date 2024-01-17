<?php
session_start();
include '../project2/php/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Tourist') {
    // Redirect to the login page if not logged in or not a 'Tourist'
    header("Location: https://myrna67.web582.com/ui-ux/projects/project2/login.php");
    exit();
}

// Fetch available packages and hotels from the database


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $dbPassword);

    // Fetch available packages
   $packageStmt = $db->query('SELECT Packages.*, Hotels.HotelName, Hotels.PricePerNight FROM Packages JOIN Hotels ON Packages.HotelID = Hotels.HotelID');
$packages = $packageStmt->fetchAll(PDO::FETCH_ASSOC);

    // Debug: Print packages
    echo "<pre>Packages: ";
    print_r($packages);
    echo "</pre>";

    // Fetch available hotels
    $hotelStmt = $db->query('SELECT * FROM Hotels');
    $hotels = $hotelStmt->fetchAll(PDO::FETCH_ASSOC);

    // Debug: Print hotels
    echo "<pre>Hotels: ";
    print_r($hotels);
    echo "</pre>";
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
    <title>Booking Form</title>
    <link rel="stylesheet" href="https://myrna67.web582.com/ui-ux/projects/project2/assets/css/style.css">
   
</head>
<body>
    <h2>Booking Form</h2>
    <div class="container">
    <form action="process_booking.php" method="post">
    <label for="package">Select a Package:</label>
<select id="package" name="package" required>
    <?php foreach ($packages as $package): ?>
        <option value="<?= $package['PackageID'] ?>" data-price="<?= $package['PricePerNight'] ?>"><?= $package['PackageName'] . ' - ' . $package['HotelName'] ?></option>
    <?php endforeach; ?>
</select>
        <br>
        <label for="hotel">Select a Hotel:</label>
        <select id="hotel" name="hotel" required>
            <?php foreach ($hotels as $hotel): ?>
                <option value="<?= $hotel['HotelID'] ?>" data-price="<?= $hotel['PricePerNight'] ?>"><?= $hotel['HotelName'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="checkInDate">Check-in Date:</label>
        <input type="date" id="checkInDate" name="checkInDate" required>
        <br>
        <label for="checkOutDate">Check-out Date:</label>
        <input type="date" id="checkOutDate" name="checkOutDate" required>
        <br>
        <p id="totalCost"></p>
        <input type="hidden" id="totalCostInput" name="totalCost">
        <button type="submit">Submit Booking</button>
    </form>

    <script>
window.onload = function() {
    // Get the form fields
    var checkInDateField = document.getElementById('checkInDate');
    var checkOutDateField = document.getElementById('checkOutDate');
    var hotelField = document.getElementById('hotel');

    // Listen for changes on the date and hotel selection fields
    checkInDateField.addEventListener('change', calculateTotalCost);
    checkOutDateField.addEventListener('change', calculateTotalCost);
    hotelField.addEventListener('change', calculateTotalCost);

    // Calculate the total cost and display it
var totalCost = numberOfDays * hotelPricePerNight;
totalCostField.textContent = 'Total cost: $' + totalCost.toFixed(2);

// Update the total cost input field
var totalCostInputField = document.getElementById('totalCostInput');
totalCostInputField.value = totalCost;
}
</script>

    <br>
    <a href="https://myrna67.web582.com/ui-ux/projects/project2/user_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
