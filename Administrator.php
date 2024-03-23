<?php
session_start();
if(isset($_SESSION['user_role'])&& $_SESSION['user_role'] === 'admin'){
// echo "<h3>Welcome te Dashboard</h3>";
// echo "<br><a href='welcome.php'>back</a>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="administrator.css">
    <title>Dashboard</title>
</head>
<body>

<header>
        <div class="container">
            <div class="site-logo">
                <h1 class="s-l-h1-1">L&D MEAT</h1>
            </div>
            <nav class="site-nav">
                <ul class="site-nav_menu">
                    <li><a href="Administrator.php">Admin</a></li>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="menu.php">MENUS</a></li>
                    <li><a href="LOGINFORM.php">LOGIN</a></li>
                    <li><a href="About-us.php">ABOUT US</a></li>
                    <li><a href="#">LOCATIONS</a></li>
                    <li><a href="RegisterForm.php">REGISTER</a></li>
                    <li><a class="border-a-1" href="reserving.php">RESERVING</a></li>
                </ul>
            </nav>
        </div>
    </header>
    

    <table border="1">
        <h3>Welcome te Dashboard</h3>
             <tr>
                 <th>EMAIL</th>
                 <th>PASSWORD</th>
                 <th>Edit</th>
                 <th>Delete</th>
                 
             </tr>
             

             <?php 
             include_once './userRepository.php';

             $userRepository = new UserRepository();

             $users = $userRepository->getAllUsers();

             foreach($users as $user){
                echo 
                "
                <tr>
                    
                     <td>$user[email] </td>
                     
                     <td>$user[password] </td>
                     <td><a href='edit.php?id=$user[email]'>Edit</a> </td>
                     <td><a href='delete.php?id=$user[email]'>Delete</a></td>
                     
                </tr>
                ";
             }

             
             
             ?>
    </table>
</body>
</html>
<?php } else {header('Location:index.php');}?>