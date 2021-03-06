<?php
/*
Author: Gregory Smith
CS 4540 - TA2
02/05/2015

This page displays the current courses that require TA positions, whether they are
 filled or not. These are pulled from the database which currently includes about
 a dozen courses total. Note: Not all courses require TAs, and this page reflects
 this.
*/

include 'db_config.php';  

try
{
  $output = "";
  
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  // Define query from a SELECT statement. A natural join is used to get information from both DBs
  $query =     "
       SELECT dept, num, name, ta_needed, ta_registered, (ta_needed - ta_registered) unfilled 
        FROM TA_Application.Courses 
        NATURAL JOIN TA_Application.Offered_Course;
   ";

  $statement = $db->prepare( $query );
  $statement->execute(  );

  $result    = $statement->fetchAll(PDO::FETCH_ASSOC);

  // check that there is a result
  if ( empty( $result ) )
    {
      $output .= "<h2> No Info </h2>";
    }
  else
    {
      // Declare table and table headers
      $output .= "<table><tr><th>Course</th><th>Name</th><th>TAs Needed</th>"
              . "<th>TAs Registered</th><th>Unfilled Positions</th></tr>";
  
      // output each tuple in the schema
      foreach ($result as $row)
	{
	  $output .= "<tr>" 
            . "<td>". strtoupper($row['dept']) ." ". $row['num'] . "</td>"
            . "<td>". $row['name'] . "</td>"
            . "<td>". $row['ta_needed'] . "</td>"
            . "<td>". $row['ta_registered'] . "</td>"
            . "<td>". $row['unfilled'] . "</td>"
        ."</tr>";
	}
       
       // close the table
       $output .=   "</table>";
       // Display number of records found
       $output .= "<p>Found: " . count($result) . " records </p>";
    }

}
catch (PDOException $ex)
{
  $output .= "<p>oops</p>";
  $output .= "<p> Code: {$ex->getCode()} </p>";
  $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
  $output .= "<pre>$ex</pre>";

  if ($ex->getCode() == 23000)
    {
      $output .= "<h2> Duplicate Entries not allowed </h2>";
    }
}




// Begin the html
echo <<<END

<!DOCTYPE HTML>
<html>
<head>
  <link rel='stylesheet' href='style.css'>
  <title>Administrator - Course List</title>
</head>
<body>
  
  <h1>Administrator Page</h1>
  <h2>Course List</h2>


  
  
  <div class="main">
    
    <div class='classes'>
          
          $output
          
    </div>
    
  </div>
  
  <div class="footer"><a href="index.php">Main Page</a></div>
</body>
</html>

END;
?>