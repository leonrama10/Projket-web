<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <header>
        <div class="headeri">
            <h1 class="emri">Sage & Salt Admin</h1>
            <div class="linkk">
                <a class="linqet" href="index.php">Home</a>
                <a class="linqet scroll-link" href="#abUs">About Us</a>
                <a class="linqet" href="menu.php">Menu</a>
                <a class="linqet scroll-link" href="#contact-section">Contact Us</a>
                <a class="linqet" href="register.php">Register</a>
            </div>
        </div>
    </header>

    <div class="first">
        <h2 class="user">User Management</h2>
        <div class="forms-container">
            <div class="p1">
                <form action="adduser.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                
                    <button type="submit">Add User</button>
                </form>
            </div>

            <div class="p1">
                <form action="deleteuser.php" method="post">
                    <label for="user_id">User ID to Delete:</label>
                    <input type="text" id="user_id" name="user_id" required>
                    <button type="submit">Delete User</button>
                </form>
            </div>

            <div class="p1">
                <form action="editusers.php" method="post">
                    <button type="submit">Edit User</button>
                </form>
            </div>

            <div class="p1">
                <button id="showUsersBtn">Show Users</button>
                <div id="userTable" class="table-container"></div>
            </div>
        </div>
    </div>

    <div class="second">
        <h2>Menu Management</h2>
        <div class="form-container2">
            <div class="p1">
                <form action="add_item.php" method="post">
                    <button type="submit">Add Item</button>
                </form>
            </div>

            <div class="p1">
                <form action="delete_item.php" method="post">
                    <button type="submit">Delete Item</button>
                </form>
            </div>

            <div class="p1">
                <form action="edit_items.php" method="post">
                
                    <button type="submit">Edit Item</button>
                </form>
            </div>

            <div class="p1">
                <button id="showItemsBtn">Show Menu Items</button>
                <div id="menuItemTable" class="table-container"></div>
            </div>
        </div>
    </div>

    <div class="reservation-section">
        <h2>Reservations</
