<?php
/*
Author: Gregory Smith
Date: 02/05/2015
CS 4540 - TA2

This page gets the data from the form on the last page, and inserts the data
 into the database. It then displays the information the applicant submitted
 for review
*/


include "db_config.php";

// Declare output variable
$output = "";

try
{
  // Establish database connection
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  // Check for any new additions
  if (isset ( $_POST['firstName'] ))
    {
      $first = $_POST['firstName'];
      $last  = $_POST['lastName'];
      $semester = $_POST['semester'];
      $year = $_POST['year'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $uid = $_POST['uid'];
      $dayPhone = $_POST['phoneNumber'];
      $evePhone = $_POST['phoneNumberEvening'];
      $address = $_POST['address'];
      $degreebtn = $_POST['degreebtn'];
      $diffDegree = $_POST['diffDegree'];
      $degreeTypeBtn = $_POST['degreeTypeBtn'];
      $extraInfo = $_POST['extraInfo'];
      $role  = 'applicant';
      
      // build and execute the inserts into the User table
      $queryUser =     "
       INSERT INTO Users (first_name, last_name, email, password, unid)
       VALUES            ('$first', '$last', '$email', '$password', '$uid')
       ";
      
      $statement = $db->prepare( $queryUser );
      $statement->execute(  );
      
      // get the user_id from users
      $id_user = $db->lastInsertId();
      
      
      // build and execute the inserts into the Role table
      $queryRole =     "
       INSERT INTO Role (id_user, role)
       VALUES            ( $id_user ,'Applicant')
       ";
      
      $statement = $db->prepare( $queryRole );
      $statement->execute(  );
      
      
      // build and execute the inserts into the Application table
      $queryApp =     "
       INSERT INTO Application (id_user, status, day_phone, night_phone, address, pursuing_degree, program, degree, extra)
       VALUES            ($id_user, 'ongoing', '$dayPhone', '$evePhone', '$address', 1, 'CS', 'Bachelors', '$extra')
       ";
      
      $statement = $db->prepare( $queryApp );
      $statement->execute(  );
      
      $output =
      "<h3> Inserting new row into Users, Role and Application Tables of DB</h3>
       <p> This page was called by a form using a POST request </p>
       <p> The queries were: </p>
       <p>$queryUser</p><p>$queryRole</p><p>$queryApp</p><hr/>";
      
    }
  else
    {
      // Display user-friendly message if nothing was queried
      $output .=  "<h2>Incomplete information. Please submit your complete application</h2>";
    }
}
catch (PDOException $ex)
{
    // output the exception message
  $output .= "<p>oops</p>";
  $output .= "<p> Code: {$ex->getCode()} </p>";
  $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
  $output .= "<pre>$ex</pre>";

  if ($ex->getCode() == 23000)
    {
      $output .= "<h2> Duplicate Entries not allowed </h2>";
    }
}

echo <<<END

<!DOCTYPE html>
<html>
    <head>
        <title>
            Application Review
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Review your application</h1>
        <div class="main">
                
        $output

            <table>
                <tr>
                    <th>Field</th>
                    <th>Your submission</th>
                </tr>
                <tr>
                    <td class="field">Name</td>
                    <td>  $last , $first 
                    </td>
                </tr>
                <tr>
                    <td class="field">Semester/Year</td>
                    <td>  $semester  </td>
                </tr>
                <tr>
                    <td class="field">uID</td>
                    <td>  $uid   </td>
                </tr>
                <tr>
                    <td class="field">Phone Number (Day)</td>
                    <td>  $dayPhone  </td>
                </tr>
                <tr>
                    <td class="field">Phone Number (Evening)</td>
                    <td>  $evePhone  </td>
                </tr>
                <tr>
                    <td class="field">Email address</td>
                    <td>  $email  </td>
                </tr>
                <tr>
                    <td class="field">Address</td>
                    <td>  $address  </td>
                </tr>
                <tr>
                    <td class="field">CS Degree</td>
                    <td>  $degreeBtn  </td>
                </tr>
            </table>
        
            
        
        
        </div>
        
        <div class="footer"><a href="index.php">Main Page</a></div>
    </body>
</html>

END;
 
?>