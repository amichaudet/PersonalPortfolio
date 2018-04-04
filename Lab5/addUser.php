<?php
session_start();
include 'function.php';

if(isset($_GET['addUser'])) {
    $sql = "INSERT INTO user
                (firstName, lastName, email, phone, role, deptId)
            VALUES
                ('".$_GET["firstName"]."', '".$_GET["lastName"]."', '".$_GET["email"]."', '".$_GET["phone"]."', '".$_GET["role"]."', '".$_GET["deptId"]."')";
    
    $conn = dbConnect();
    $table = $conn->query($sql);
    header("Location: admin.php");
}

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 
        <title>Admin: Add new user </title>
        <style>@import url(styles.css);</style>
        <script>
            function confirmAdd() {
                alert("User has been added.");
            }
        </script>
    </head>
    <body>
        <h1>Adding a New User </h1>
        <form method="GET" class="forms">
            User Id: <input type="text" name="id" />
            <br />
            First Name:<input type="text" name="firstName" />
            <br />
            Last Name:<input type="text" name="lastName"/>
            <br/>
            Email: <input type= "email" name ="email"/>
            <br/>
            Phone Number: <input type ="text" name= "phone"/>
            <br />
            Role: 
            <select name="role">
                <option value=""> - Choose One - </option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
            </select>
            <br />
            Department: 
            <select name="deptId">
                <option value="" >- Select One -</option>
                <?=departments(0)?>
            </select>
            <input onclick="confirmAdd()" type="submit" value="Add User" name="addUser">
        </form>
    </body>
</html>