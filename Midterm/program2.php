<!DOCTYPE html>
<html>
    <head>
        <title>Midterm program2</title>
    </head>
    <body>
        
        I didn't have time to link the database to heroku, hozever, the program works fine on my C9 Worskpace <br>
-        <a href="https://ide.c9.io/amichaudet/amichaudet">My Workspace</a> <br>
                                    <table border=1 width="600">
                                    <tr>
                                        <th>#</th>
                                        <th>Task Description</th>
                                        <th>Points</th>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>1</td>
                                        <td>A report shows all female students ordered by last name, from A to Z</td>
                                        <td width="20" align="center">10</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>2</td>
                                        <td>A report shows students that have assignments with a grade lower than 50, ordered by grade, in ascending order</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>3</td>
                                        <td>A report lists those assignments that have not been graded and their due date, ordered by due date, ascending</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>4</td>
                                        <td>A report shows the Gradebook, which includes first name, last name, assignment title, and grade. It should be ordered by last name and assignment title </td>
                                        <td align="center">15</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>5</td>
                                        <td>A report lists each student along with his/her average grade, ordered by average grade, from highest to lowest</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:green">
                                        <td>6</td>
                                        <td>This rubric is properly included AND UPDATED (BONUS)</td>
                                        <td width="20" align="center">2</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>T O T A L </td>
                                        <td width="20" align="center"><b></b></td>
                                    </tr>
                                </table>
                            
        
        
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
