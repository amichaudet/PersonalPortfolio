<?php

function dbConnect() {
    $connUrl = "mysql://gonadbcm28b2pbc2:j8logw12pooo3jyl@p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/jmjet2bi89ylt1b5";
            $hasConnUrl = !empty($connUrl);
            
            $connParts = null;
            if ($hasConnUrl) {
                $connParts = parse_url($connUrl);
            }
            
            //var_dump($hasConnUrl);
            $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
            $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'lab5';
            $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
            $password = $hasConnUrl ? $connParts['pass'] : '';
            
            return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}


function showUser() {
    $conn = dbConnect();
    $sql = "SELECT * FROM user ORDER BY lastName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        
        echo "<td>".$row['firstName']."</td>";
        echo "<td>".$row['lastName']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td><a href='updateUser.php?id=".$row['user_id']."'>Update</a></td>";
        echo "<td><a onclick='return confirmDelete()' href='deleteUser.php?id=".$row['user_id']."'>Delete</a></td>";
        echo "</tr>";
    }
}


function departments($id) {
    $conn = dbConnect();
    $sql = "SELECT * FROM departments ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $userInfo;
    echo $id;
    if($id != 0) {
        global $userInfo;
        echo $id;
        $sql = "SELECT deptId FROM user WHERE id=".$id;
        $stmt2 = $conn->prepare($sql);
        $stmt2->execute();
        $userInfo = $stmt2->fetch(PDO::FETCH_ASSOC);
    }
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($id != 0) {
            $userDeptId = ($userInfo['deptId'] == $row['id'])?"selected" : "";
            echo "<option value=" .$row['id']. " " .$userDeptId. "> " .$row['name']. "</option>";
        } else {
            echo "<option value=" .$row['id']. "> " .$row['name']. "</option>";
        }
    }
}

function getUserInfo($id){
    $conn = dbConnect();
    $sql = "SELECT * FROM user WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function deleteUser($id) {
    $conn = dbConnect();
    $sql = "DELETE FROM user
            WHERE id=".$id;
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

?>
