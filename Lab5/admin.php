<?php
session_start();
include 'function.php';

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 
         <title>Admin Page</title> 
         <script>
             function confirmDelete() {
                 return confirm("Do you really want to delete this user ?");
             }
         </script>
         <style>@import url(styles.css);
         </style>
    </head>
        
    <body>
        <h1>Admin </h1>
        <h2>Welcome</h2>
        
        <form method='POST' action="addUser.php">
            <input type="submit" name="action" value='Add new user'/>
        </form>
        
        <form action="logout.php">
            <input type="submit" name="action" value="Logout"/>
        </form>
        
        <table id="users">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php 
                showUser();
            ?>
        </table>
    </body>
</html>
