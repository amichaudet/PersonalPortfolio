<?php
session_start();
include "function.php";
$conn = dbConnect();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE userName='$username' AND password='".sha1($pass)."'";
    
    $_SESSION['username'] = $username;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

?>

<!DOCTYPE>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 
        <title>Admin Login</title>
        <h1>Admin Login</h1>
        <style>@import url(styles.css);</style>
    </head>
    <body>
        
        <form method="post">
            Username: <input type="text" name="username"/> <br>
            Password : <input type="password" name="password"/> <br>
            <input type="submit" name="submit" value="Login"/>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                if($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['adminName'] = $row['firstName']. " " . $row['lastName'];
                    header("Location: admin.php");
                } else {
                    echo "Invalid username or password.<br>";
                }
            }
        ?>
    </body>
</html>
