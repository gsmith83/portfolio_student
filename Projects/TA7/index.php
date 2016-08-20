<?php
require("PHPFunctions/mainfunctions.php");
session_start();
$message = "";
?>

<!--
Author: Gregory Smith
Date: 03/22/2015
CS 4540 - TA7

The main page for TA7
-->

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='Styles/style.css'>
        <title>Teaching Assistant Applications</title>
        <script type="text/javascript" src="jquery/jquery-2.1.3.js"></script>
        <script src="jquery/js_functions.js"></script>
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


                <?php
                //if not logged in
                if (!isset($_SESSION['userid']))
                {
                    log_in();
                }
                else
                { // If logged in, display a welcome message and a log off button
                echo "<h3>Welcome " . $_SESSION['name'] . "!</h3>";
                    
                if($_SESSION['role'] == "Applicant"){
                    echo "<p>Click on a link above to start a new TA application, view a previous application, or see the readme page.</p>";
                }
                else if($_SESSION['role'] == "Instructor"){
                    echo "<p>Click on a link above to view your classes or see the readme page.</p>";   
                }
                else if($_SESSION['role'] == "Admin"){
                    echo "<p>Click on a link above to view courses in need of TAs, assign potential TAs to a course, or see the readme page.</p>";
                }
                }
                ?>



            </div>

            <div id="footer">
                by Greg Smith
            </div>

        </div>

    </body>
</html>

