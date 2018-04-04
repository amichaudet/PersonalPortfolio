<?php
include "function.php";
session_start();
if(isset($_GET['id'])) {
    $userInfo = getUserInfo($_GET['id']);
}

if(isset($_GET['Update'])) {
    $sql = "UPDATE user
            SET firstName = :fName,
                lastName = :lName,
                email = :email,
                phone = :phone,
                role = :role,
                deptId = :deptId
                WHERE id = :userId";
                
    $np = array();
    $np[':fName'] = $_GET['firstName'];
    $np[':lName'] = $_GET['lastName'];
    $np[':email'] = $_GET['email'];
    $np[':phone'] = $_GET['phone'];
    $np[':role'] = $_GET['role'];
    $np[':deptId'] = $_GET['deptId'];
    $np[':userId'] = $_GET['id']; 
                
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
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
        <title>Admin: Update User</title>
        <style>@import url(styles.css);</style>
        <script>
            function confirmUpdate() {
                alert("User has been updated.");
            }
        </script>
    </head>
    <body>
        <h1> Tech Checkout System: Updating User Info</h1>
        <form method="GET" class="forms">
            <input type="hidden" name="id" value="<?=$userInfo['id']?>"/>
            First Name:<input type="text" name="firstName" value="<?=$userInfo['firstName']?>"/>
            <br />
            Last Name:<input type="text" name="lastName" value="<?=$userInfo['lastName']?>"/>
            <br/>
            Email: <input type= "email" name ="email" value="<?=$userInfo['email']?>"/>
            <br/>
            Phone Number: <input type ="text" name= "phone" value="<?=$userInfo['phone']?>"/>
            <br />
           Role: 
           <select name="role">
                <option value=""> - Select One - </option>
                <option value="Staff" <?=($userInfo['role'] == 'Staff')?"selected" : "" ?> >Staff</option>
                <option value="Student" <?=($userInfo['role'] == 'Student')?"selected" : "" ?> >Student</option>
                <option value="Faculty" <?=($userInfo['role'] == 'Faculty')?"selected" : "" ?> >Faculty</option>
            </select>
            <br />
            Department: 
            <select name="deptId">
                <option value="" >- Select One -</option>
                <?=departments($_GET['id'])?>
            </select>
            <input onclick="confirmUpdate()" type="submit" value="Update" name="Update">
        </form>
    </body>
</html>