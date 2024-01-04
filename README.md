# royal-travels
Project 2. UI-UX Royal Travels 

## Database Structure

The database for this project is:

1. **Packages table**: This table contains information about the packages. The columns are:
   - `PackageID`: A unique identifier for each package.
   - `PackageName`: The name of the package.
   - `PackagePrice`: The price of the package.

2. **Hotels table**: This table contains information about the hotels. The columns are:
   - `HotelID`: A unique identifier for each hotel.
   - `HotelName`: The name of the hotel.
   - `PricePerNight`: The price per night for the hotel.
   - `Location`: The location of the hotel.

3. **Bookings table**: This table contains information about the bookings. The columns are:
   - `BookingID`: A unique identifier for each booking.
   - `UserID`: The ID of the user who made the booking.
   - `PackageID`: The ID of the package that was booked.
   - `HotelID`: The ID of the hotel that was booked.
   - `CheckInDate`: The check-in date for the booking.
   - `CheckOutDate`: The check-out date for the booking.
   - `TotalCost`: The total cost of the booking.

4. **Users table**: This table contains information about the users. The columns are:
   - `UserID`: A unique identifier for each user.
   - `UserName`: The name of the user.
   - `UserEmail`: The email of the user.
   - Other columns as needed (e.g., password, registration date, etc.).

This structure allows you to link the tables together using the ID columns. For example, you can find all bookings made by a user by joining the `Bookings` and `Users` tables on `UserID`, and you can find the details of the package and hotel for each booking by joining the `Packages` and `Hotels` tables on `PackageID` and `HotelID`, respectively.

## User Dashboard

The User Dashboard is what the logged in user will see after they log in. It displays the following information:

- Welcome message with the user's name.
- List of available hotels with their names, locations, and prices per night.
- List of available packages with their names and prices.
- List of the user's bookings, including the booking ID, package ID, hotel ID, check-in date, check-out date, and total price.

Users can make new bookings from this dashboard.

## Admin Dashboard

The Admin Dashboard is the main view for admin users. It provides additional functionality compared to the User Dashboard, including:

- Ability to add, edit, and delete hotels.
- Ability to add, edit, and delete packages.
- View all bookings made by all users.
- Ability to cancel bookings.

This allows administrators to manage the application's data and handle user bookings.

## PHP Pages

1. **login.php**: This page handles user authentication. It takes a username and password, verifies them against the database, and starts a session if the credentials are valid.

2. **register.php**: This page handles user registration. It takes a username, password, and email, and creates a new user in the database.

3. **user_dashboard.php**: This page displays the User Dashboard. It fetches the user's bookings, available hotels, and packages from the database and displays them.

4. **admin_dashboard.php**: This page displays the Admin Dashboard. It provides functionality for managing hotels, packages, and bookings.

5. **booking.php**: This page handles the creation of new bookings. It takes a user ID, package ID, hotel ID, check-in date, and check-out date, and creates a new booking in the database.

## Backend Technologies

Here are the languages and technologies I'm using for the backend of this application:

* PHP: Server-side scripting language used for backend logic.
* MySQL: Database management system used for storing and retrieving data.
* Apache: Web server software used to serve the application.
* Composer: Dependency management tool used to manage PHP packages.
* PHPUnit: Testing framework used for unit testing.

## Known Issues

### Total Price Calculation

Currently, the total price for a booking is not being calculated correctly. This might be due to the fact that I'm using test data. I'm working on a solution to calculate the total price based on the check-in and check-out dates and the price per night of the selected hotel.

### Packages Table

I'm not confident that the Packages table is set up correctly. This could also be due to the use of test data. I'm reviewing the structure of the Packages table to ensure it meets the requirements of the application.



![image](https://github.com/NiqueNat/royal-travels/assets/70446500/a44ac2d5-84da-495c-92f3-e27e7fa4d985)


![image](https://github.com/NiqueNat/royal-travels/assets/70446500/c51ceb54-2191-4618-878a-c773e555c71f)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/28464415-c8a3-48c7-845d-ecb1ee07fae0)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/8e318c84-a7ff-4101-8b51-dc1865d19bb0)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/73a8cbba-a680-4d1f-8315-cd635dcc2dfc)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/0b167220-b7f3-4f26-acfe-d627aba2d9c9)






