<!--
Author: Gregory Smith
Date: 02/11/2015
CS 4540 - TA3

This page gets the data from the form on the last page, and inserts the data
 into the database. It then displays the information the applicant submitted
 for review
-->
<?php

include "db_config.php";
require("mainfunctions.php");
session_start();

  // Establish database connection
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//
//  // Check for any new additions
  if (isset ( $_POST['firstName'] ))
    {
      $first = $_POST['firstName'];
      $last  = $_POST['lastName'];
      $semester = $_POST['semester'];
      $year = $_POST['year'];
      $uid = $_POST['uid'];
      $dayPhone = $_POST['phoneNumber'];
      $evePhone = $_POST['phoneNumberEvening'];
      $address = $_POST['address'];
      $degreebtn = $_POST['degreebtn'];
      $diffDegree = $_POST['diffDegree'];
      $degreeTypeBtn = $_POST['degreeTypeBtn'];
      $extraInfo = $_POST['extraInfo'];
      $role  = 'applicant';
//      
      // build and execute the inserts into the Application table
//      $queryApp =     "
//       INSERT INTO TA3.Application (id_user, status, day_phone, night_phone, address, pursuing_degree, program, degree, extra)
//       VALUES            ($id_user, 'ongoing', '$dayPhone', '$evePhone', '$address', 1, 'CS', 'Bachelors', '$extra')
//       ";
      
//      $statement = $db->prepare( $queryApp );
//      $statement->execute(  );
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='style.css'>
        <title>Teaching Assistant Applications</title>
    </head>
    <body>

        <div id="header">
            TA Application
        </div>

        <?php
            nav_bar();
        ?>

        <div id="main">
            <div id="content">
                <h2>Application Review</h2>
            <?php
                echo <<<END
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
                        <td class="field">Address</td>
                        <td>  $address  </td>
                    </tr>
                    <tr>
                        <td class="field">CS Degree</td>
                        <td>  $degreeBtn  </td>
                    </tr>
                </table>
            </div>
            <div id="footer">
                by Greg Smith
            </div>
END;
?>

        </div>
    </body>
</html>