

<!DOCTYPE html>
<html>
    <head>
        <title>Lab4 </title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    </head>
    <body>
        <h1> Device Search</h1>
        <div id="menu">
        
            <div id="select_type">
                <form action="index.php">
                <select name="type">
                <option value="">Select a type</option>
                <option value="webcam">webcam</option>
                <option value="VR headset">VR headset</option>
                <option value="Tablet">Tablet</option>
                <option value="Laptop">Laptop</option>
                <option value="Microphone">Microphone</option>
                <option value="Dynamic Mics">Dynamic Mics</option>
                <option value="Tripod">Tripod</option>
                <option value="CheatSheet">CheatSheet</option>
                <option value="Smartphone">Smartphone</option>
                <option value="Camera">Camera</option>
                </select><br>
                <input type="checkbox" name="item_name" id="item_name" />Sorted by name</label>
                <input type="checkbox" name="price" id="price" />Sorted by price</label>
                <br>
                <input type="submit", value="filter"><br>
                </form> 
            </div>
            
            <div id="select_name">
                <form action="index.php"><br>
                Search by name:<input type="text" name="name" value=""><br>
                <input type="checkbox" name="item_name" id="item_name" />Sorted by name</label>
                <input type="checkbox" name="price" id="price" />Sorted by price</label>
                <br>
                <input type="submit", value="Search">
                </form> 
            </div>
            
            <div id="availability">
                <form action="index.php"><br>
                    <input type="checkbox" name="case1" id="case1" /> <label for="case1">Available</label>
                    <input type="checkbox" name="case2" id="case2" /> <label for="case2">Checked Out</label><br>
                    <input type="checkbox" name="item_name" id="item_name" />Sorted by name</label>
                <input type="checkbox" name="price" id="price" /> Sorted by price</label>
                <br><br>
                <input type="submit", value="Select">
                </form> 
            </div>
        
        
        </div>
    
               
        
        
        
        
        <div id="list">
        
        
        
            <?php
        
            $bdd = new PDO("mysql:host=localhost;dbname=Lab4", 'amichaudet', 'amichaudet');
            
            if ($_GET['type']!='')
            {
               if($_GET['price']!=''){
                    $reponse = $bdd->query('SELECT * FROM device WHERE deviceType=\'' . $_GET['type'] . '\' ORDER BY price');
               } else {
                    $reponse = $bdd->query('SELECT * FROM device WHERE deviceType=\'' . $_GET['type'] . '\'');
               }
                
            } 
            else if ($_GET['name']!='')
            {
                if($_GET['price']!=''){
                    $reponse = $bdd->query('SELECT * FROM device WHERE deviceName=\'' . $_GET['name'] . '\' ORDER BY price');
               } else {
                    $reponse = $bdd->query('SELECT * FROM device WHERE deviceName=\'' . $_GET['name'] . '\'ORDER BY deviceName');
               }
            	
            } 
            
            
            else if ($_GET['case1']!='')
            {
                 if($_GET['price']!=''){
                    	$reponse = $bdd->query('SELECT * FROM device WHERE status=\'Available\'ORDER BY price');
               } else {
                    	$reponse = $bdd->query('SELECT * FROM device WHERE status=\'Available\'ORDER BY deviceName');
               }
            	
            } 
            else if ($_GET['case2']!='')
            {
                 if($_GET['price']!=''){
                    $reponse = $bdd->query('SELECT * FROM device WHERE status=\'CheckedOut\'ORDER BY price');
               } else {
                    $reponse = $bdd->query('SELECT * FROM device WHERE status=\'CheckedOut\' ORDER BY deviceName');
               }
            	
            } 
            else if($_GET['type']=='')
            {
                if($_GET['price']!=''){
                    $reponse = $bdd->query('SELECT * FROM device ORDER BY price');
               } 
               else if($_GET['item_name']!='')
               {
                    $reponse = $bdd->query('SELECT * FROM device ORDER BY deviceName');
               }else {
                $reponse = $bdd->query('SELECT * FROM device ');
                }
            	
            }
            
            
            
            
            
            while ($donnees = $reponse->fetch())
            {
            ?>
                <div id="item">
                    <p>
                    <strong>Device</strong> : <?php echo $donnees['deviceName']; ?><br />
                    type : <?php echo $donnees['deviceType']; ?> <br />
                    Price: $<?php echo $donnees['price']; ?> <br />
                    Status: <?php echo $donnees['status']; ?> </em>
                    </p>
                    </div>
        
        </div>
        
        <?php
        }
        $reponse->closeCursor();
    ?>
    </body>
</html>