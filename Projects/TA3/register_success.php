<!--
Author: Gregory Smith
Date: 02/11/2015
CS 4540 - TA3

The main page for TA3
-->
<?php
require("db_config.php");
session_start();

$msg = "";

try{

// Establish database connection
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  // Check for any new additions
  if (isset ( $_POST['firstName'] ))
    {
      $first = $_POST['firstName'];
      $last  = $_POST['lastName'];
      $email = $_POST['email'];
      $password = sha1($_POST['password']);
      $uid = $_POST['unid'];
      $role  = 'Applicant';
      
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
       VALUES            ( $id_user , '$role')
       ";
      
      $statement = $db->prepare( $queryRole );
      $statement->execute(  );
      
      $_SESSION['userid'] = $id_user;
      $_SESSION['name'] = $first;
      $_SESSION['role'] = "applicant";
    }
      else
    {
      // Display user-friendly message if nothing was queried
      $msg .=  "<h2>Incomplete information. Please submit your complete application</h2>";
    }
}
catch (PDOException $ex)
{
    // output the exception message
  $msg .= "<p>oops</p>";
  $msg .= "<p> Code: {$ex->getCode()} </p>";
  $msg .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
  $msg .= "<pre>$ex</pre>";

  if ($ex->getCode() == 23000)
    {
      $output .= "<h2> Duplicate Entries not allowed </h2>";
    }
}

echo <<<END



<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='style.css'>
        <title>Teaching Assistant Applications</title>
        <META http-equiv="refresh" content="2; url=index.php">
    </head>
    <body>

        <div id="header">
            TA Application
        </div>
END;
        nav_bar();

        echo <<<END2
        <div id="main">
            <div id="content">
                Registration successful!
                
            </div>
            
            <div id="footer">
                by Greg Smith
            </div>
            
        </div>

    </body>
</html>

END2;
?>