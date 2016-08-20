<!--
Author: Gregory Smith
Date: 03/04/2015
CS 4540 - TA7

This page gets the data from the form on the last page, and inserts the data
into the database. It then displays the information the applicant submitted
for review
-->
<?php

include "PHPFunctions/db_config.php";
require("PHPFunctions/mainfunctions.php");
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
    $uid = '65124519';
    $dayPhone = $_POST['phoneNumber'];
    $evePhone = $_POST['phoneNumberEvening'];
    $address = $_POST['address'];
    $degreebtn = $_POST['degreebtn'];
    $diffDegree = $_POST['diffDegree'];
    $degreeTypeBtn = $_POST['degreeTypeBtn'];
    $extraInfo = $_POST['extraInfo'];
    $role  = 'applicant';
    $id_user = $_SESSION['userid'];
}

// build and execute the inserts into the Application table
// Uses BIND syntax

$queryApp =     "
       INSERT INTO TA7.Application (id_user, status, day_phone, night_phone, address, pursuing_degree, program, degree, extra)
       VALUES            (:id_user, 'ongoing', :dayPhone, :evePhone, :address, 1, 'CS', 'Bachelors', :extra)
       ";

$statement = $db->prepare( $queryApp );
$statement->bindParam(':id_user', $id_user);
$statement->bindParam(':dayPhone', $dayPhone);
$statement->bindParam(':evePhone', $evePhone);
$statement->bindParam(':address', $address);
$statement->bindParam(':extra', $extra);
$statement->execute(  );

// get the id_app from Application
$id_app = $db->lastInsertId();


// build and execute the insert statement into the wants_ta table
$insertWant = "
    INSERT INTO TA7.Wants_Ta (id_app, catalog_num, status)
    VALUES (:id_app, 1410, 'ongoing')
";

$statement = $db->prepare($insertWant);
$statement->bindParam(':id_app', $id_app);
$statement->execute();

?>



<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='Styles/style.css'>
        <title>Application Review</title>
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
                        <td class="field">Program</td>
                        <td>CS</td>
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