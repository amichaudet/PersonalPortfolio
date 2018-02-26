<?php
    session_start();
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmation</title>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
    </head>
    <body>
       <div class="container">
            <div class="content">
                <div class="center">
                    <h1><?php echo $name?>'s profile :</h1>
                    <br>
                    <h4>Your email address is: </h4> <?php echo $email?> 
                    <br> <br>
                    <br> <h4>Your age is: </h4><?php echo $_POST["age"]; ?>
                    <br> <h4>You come from:</h4> <?php echo $_POST["origine"]; ?>
                    <br> <h4>Your genre is:</h4> 
                            <?php
                    
                        if(empty($_POST['genre']))
                        {
                            $genreErr = "Genre is required!";
                            echo $genreErr;
                        }
                        else
                        {
                           echo $_POST["genre"];
                          
                        }
                        ?>
                        <br> <h4>You like:</h4><br> <?php
                        if(!empty($_POST['hobby']))
                        {
                            foreach($_POST['hobby'] as $value)
                            {
                                echo $value."<br>" ;
                            }
                        }
                    echo "</div>";
                    echo "<hr>";
                echo "</div>";
                
            echo "</div>";
            
                ?>
        </div>
        
    </body>
</html>