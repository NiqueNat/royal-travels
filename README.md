

# Royal Travels
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

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/26dfce29-12a3-426d-83f4-c70f905f6edd)


![image](https://github.com/NiqueNat/royal-travels/assets/70446500/a44ac2d5-84da-495c-92f3-e27e7fa4d985)


![image](https://github.com/NiqueNat/royal-travels/assets/70446500/c51ceb54-2191-4618-878a-c773e555c71f)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/28464415-c8a3-48c7-845d-ecb1ee07fae0)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/8e318c84-a7ff-4101-8b51-dc1865d19bb0)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/73a8cbba-a680-4d1f-8315-cd635dcc2dfc)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/0b167220-b7f3-4f26-acfe-d627aba2d9c9)


CASE STUDY AND VISUAL UPDATES

Royal Travels - Backend Excellence in Travel Booking(What it could be, maybe will be)..
Introduction
Royal Travels stands out not only for its user-friendly frontend but also for the robust and efficient backend that powers the entire travel booking platform. In this case study, we delve into the backend architecture, database management, and the seamless integration that ensures a smooth user experience.

Backend Architecture
1. Server-Side Logic
The backend of Royal Travels is powered by a PHP-based server-side logic, handling the core functionalities of user authentication, data processing, and communication with the database. 

2. Database Management with PDO
 The backend employs PDO extensively to manage user details, bookings, hotels, and packages seamlessly.

3. Session Management (session start)
User sessions are a critical aspect of the backend. PHP's session management is employed to keep track of user login status and type. This ensures that the user dashboard is accessible only to authenticated users, and admins have exclusive access to their control panel.

User Dashboard and Booking Process
1. Efficient User Authentication
Upon user login, the backend verifies credentials securely and initiates a session, granting access to the user dashboard. PHP's session handling ensures a secure and efficient authentication process.

2. Dynamic Data Retrieval
The user dashboard dynamically fetches relevant information from the backend, such as available hotels, package details, and the user's booking history. This dynamic data retrieval is achieved through well-optimized PHP queries.

3. Seamless Booking Process
The backbone of Royal Travels' success lies in its booking process. When a user submits a booking request, the backend processes the data, validates inputs, and inserts the details into the database using PDO. This seamless interaction ensures that user bookings are accurate, secure, and instantaneously reflected in the backend.

4. Admin Control Panel
The admin control panel showcases the power of the backend. Admins can effortlessly oversee bookings, manage hotel and package details, and execute updates—all powered by PHP scripts that interact seamlessly with the underlying database.

Conclusion
Through a combination of PHP, PDO, and secure session management, the platform ensures data integrity, user authentication, and a streamlined booking process. The synergy between the frontend and backend creates a travel booking experience that is not only user-friendly but also backed by a robust and scalable architecture.

Thank you,
Myrna Dominique

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/00b0d64a-a142-412f-a459-2748f6bfa0e3)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/55a70182-6b81-4e32-b676-e5860a648146)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/2ace771e-2456-48bb-a60e-b506ebffdc85)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/56b5b86f-505f-43eb-ba21-f0904dfc9d3a)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/002c513d-b88f-40c0-8f86-e1e9c8d08f6c)

ADMIN
![image](https://github.com/NiqueNat/royal-travels/assets/70446500/7f9a6df5-b8cb-4b5e-9fff-1813fb0cd915)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/acfa7538-1e78-42b6-8e5b-701b1df85091)

![image](https://github.com/NiqueNat/royal-travels/assets/70446500/4b4ef638-c404-462b-8ded-fcd7ed95cf8f)







