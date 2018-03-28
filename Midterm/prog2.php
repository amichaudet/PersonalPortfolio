<!DOCTYPE html>
<html>
    <head>
        <title>Midterm program2</title>
    </head>
    <body>
        <?php
            $bdd= new PDO("mysql:host=localhost; dbname=midterm", 'amichaudet', 'amichaudet');
        ?>
        <div id="header">
            <h1><u>Midterm Program2</u></h1>
        </div>

         <?php
            $reponse = $bdd->query('SELECT * FROM m_students WHERE gender="F" ORDER BY lastName ASC');
            
            echo "<br><b><u>The female students are</u></b><br><br>" ;
            
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "   " ;
                echo $donnees['lastName'] . "</br>"; 
            }
            $reponse = $bdd->query('SELECT firstName, lastName, grade FROM m_students NATURAL JOIN m_gradebook WHERE grade <50 ORDER BY grade ASC');
            
             echo "<br><b><u>List of students that have assignments with a grade lower than 50 </u></b><br><br>" ;
             
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "   " ;
                echo $donnees['lastName'] . "   " ;
                echo $donnees['grade'] . "</br>"; 
            }
            
            $reponse = $bdd->query('SELECT title, dueDate, assignmentId FROM m_assignments WHERE NOT EXISTS (SELECT assignmentId FROM m_gradebook WHERE m_assignments.assignmentId = m_gradebook.assignmentId)');
            echo "<br><b><u>List of assignements that have not been graded</u></b><br><br>" ;

            while ($donnees = $reponse->fetch())
            {
                echo $donnees['title'] . "  ";
                echo $donnees['dueDate'] . "</br>";
            }
            
            $reponse = $bdd->query('SELECT firstName, lastName, title, grade FROM m_students NATURAL JOIN m_gradebook NATURAL JOIN m_assignments ORDER BY lastName');
            echo "<br><b><u>gradebook</u></b><br><br>" ;
    
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "   ";
                echo $donnees['lastName'] . "   ";
                echo $donnees['title'] . "   ";
                echo $donnees['grade'] . "</br>";
            }
            
            $reponse = $bdd->query('SELECT studentId, firstName, lastName, sum(grade) FROM m_students NATURAL JOIN m_gradebook GROUP BY studentId ORDER BY sum(grade) DESC');
            
            echo "<br><b><u>List of average grade per student (average of the three assignments)</u></b><br><br>" ;
           
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['studentId'] . "   ";
                echo $donnees['firstName'] . "   ";
                echo $donnees['lastName'] . "   ";
                echo $donnees['sum(grade)']/3;
                echo $avg . "</br>";
            }

            
            $reponse->closeCursor(); 
            ?>
    </body>
</html>