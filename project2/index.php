<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Travels</title>
    <link rel="stylesheet" href="https://myrna67.web582.com/ui-ux/projects/project2/assets/css/style.css">
</head>
<body>
<div class="container">
    <div>
        <h2>Tourist Login</h2>
        <form action="login.php" method="post">
            <label for="emailTourist">Email:</label>
            <input type="email" id="emailTourist" name="email" required>
            <br>
            <label for="passwordTourist">Password:</label>
            <input type="password" id="passwordTourist" name="password" required>
            <br>
            <input type="hidden" name="userType" value="Tourist">
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="#register">Register here</a></p>
    </div>

    <div>
        <h2>Admin Login</h2>
        <form action="login.php" method="post">
            <label for="emailAdmin">Email:</label>
            <input type="email" id="emailAdmin" name="email" required>
            <br>
            <label for="passwordAdmin">Password:</label>
            <input type="password" id="passwordAdmin" name="password" required>
            <br>
            <input type="hidden" name="userType" value="Admin">
            <button type="submit">Login</button>
        </form>
    </div>

    <div id="register">
    <h2>Register</h2>
   
    <form action="process_registration.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="emailRegister">Email:</label>
            <input type="email" id="emailRegister" name="email" required>
            <br>
            <label for="passwordRegister">Password:</label>
            <input type="password" id="passwordRegister" name="password" required>
            <br>
            <label for="userTypeRegister">User Type:</label>
            <select id="userTypeRegister" name="userType">
                <option value="Admin">Admin</option>
                <option value="Tourist">Tourist</option>
            </select>
            <br>
            <button type="submit">Register</button>
    </form>

</div>
</div>
</body>
</html>
