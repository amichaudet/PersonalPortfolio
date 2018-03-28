
<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

 
  <title>midterm program 1</title>
  <style>
  	#wrapper{
  	  width:800px;
  	  padding:20px;
  	  margin-left: auto;
  	  margin-right: auto;
  	  border: 3px solid black;
  	}
  	#result{
  	    margin-top: 80px;
  	    width:100%;
  	    margin-left: auto;
  	    margin-right: auto;
  	    text-align: center;
  	    border: 1px solid black;
  	}
  </style>
</head>
<body>

                                <table border="1" width="600">
                                    <tbody><tr>
                                        <th>#</th>
                                        <th>Task Description</th>
                                        <th>Points</th>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>1</td>
                                        <td>The page includes the basic form elements as in the Program Sample: Text boxes, Dropdown menu, submit button</td>
                                        <td width="20" align="center">5</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>2</td>
                                        <td>When submitting the form, an error message is displayed if the product of columns and rows exceeds 39</td>
                                        <td width="20" align="center">5</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>3</td>
                                        <td>When submitting the form, a table is created with random playing cards</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>4</td>
                                        <td>The size of the table corresponds to the one selected by the user </td>
                                        <td align="center">10</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>5</td>
                                        <td>The cards are NOT duplicated </td>
                                        <td align="center">10</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>6</td>
                                        <td>No cards of the suit selected by the user are displayed in the game </td>
                                        <td align="center">10</td>
                                    </tr>
                                    <tr style="background-color:red">
                                        <td>7</td>
                                        <td>The Aces have a yellow background</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:red">
                                        <td>8</td>
                                        <td>The Kings have a cyan background</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>9</td>
                                        <td>The total number of Aces and Kings are displayed</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>10</td>
                                        <td>A message indicates who won, Aces or Kings, (or neither) </td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>11</td>
                                        <td>At least five CSS rules are included</td>
                                        <td align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#99E999">
                                        <td>12</td>
                                        <td>This rubric is properly included AND UPDATED (BONUS)</td>
                                        <td width="20" align="center">2</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>T O T A L </td>
                                        <td width="20" align="center"><b></b></td>
                                    </tr>
                                </tbody></table>
                                
    
    
    
    
    
    <div id="wrapper">
        <header>
            <h1>Aces vs Kings</h1>
        </header>
        <div id="game">
            <form  action="program1.php">
                Number of Rows: <input type="text" name="rows" value=""><br /><br />
                Number of Columns: <input type="text" name="cols" value=""><br /><br />
                Suit to omit: <select name="omitSuit">
                 		           <option value="1">Hearts</option>
                 		           <option value="2">Clubs</option>
                 		           <option value="3">Diamonds</option>
                 		           <option value="4">Spades</option>
                 		           </select>
            
                <input type="submit">
            </form>
            <br /><br />
        </div>
    </div>
    
<div id="result">
        <?php 
            if($_GET['rows']!='' && $_GET['cols']!=''){
                $rows=$_GET['rows'];
                $cols=$_GET['cols'];
                if($cols*$rows>39){
                    echo "The product of columns and rows must not exceed 39!";
                } else if ($_GET['omitSuit']=="1" || $_GET['omitSuit']=="2" || $_GET['omitSuit']=="3" ||$_GET['omitSuit']=="4"){
                    $suit=$_GET['omitSuit'];
                    /*echo $rows;
                    echo $cols;
                    echo $suit;*/
                    printcard($rows, $cols, $suit);
                }
            }
        ?>
    </div>
</body>
</html>
<?php
function printcard($rows, $cols, $suit){
    $avail=array();
    $ace=0;
    $kings=0;
    for($i=1; $i<=$rows; $i++){
         for($j=1; $j<=$cols; $j++){
            do {
               $color=rand(1,4); 
            } while ( $color==$suit);
            
            $numberRandom=rand(1,13);
                 
             switch ($color)
            {
                case 2: $symbol ='clubs';
                    break;
                case 3: $symbol ='diamonds';
                    break;
                case 1: $symbol ='hearts';
                    break;
                case 4: $symbol = 'spades';
                    break;
            }
             echo "<img id='card$i$j' src='cards/$symbol/$numberRandom.png' width='75'/>";
             array_push($avail,"$symbol$randomNumber");
             if ($numberRandom==1){
                 $ace=$ace+1;
             } else if ($numberRandom==13){
                 $kings=$kings+1;
             }
             
         }
         echo" <br>" ;
    }
    echo "Number of Aces:" . $ace . "<br>";
    echo "Number of Kings:" . $kings . "<br>";
    if($ace>$kings){
                 echo "ACES WON !";
             } else if($ace<$kings){
                 echo "KINGS WON !";
             } else {
                 echo "It's a tie !";
             }
             print_r($avail);
}
             
?>