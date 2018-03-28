
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