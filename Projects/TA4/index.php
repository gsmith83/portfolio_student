<?php
require("mainfunctions.php");
session_start();
$message = "";
?>

<!--
Author: Gregory Smith
Date: 02/19/2015
CS 4540 - TA4

The main page for TA4
-->

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


                <?php
                //if not logged in
                if (!isset($_SESSION['userid'])) 
                {
                    log_in();
                    echo "<p>You can use the username 'aj@aj.com' and password 'hello' to access an Applicant account, or create your own.</p>";
                    echo "<p>You can use the username 'joe@harvard.com' and password 'world' to access an Instructor account.</p>";
                    echo "<p>You can use the username 'jim@cs.utah.edu' and password 'apple' to access an Admin account.</p>";
                }
                else
                { // If logged in, display a welcome message and a log off button
                echo "<h3>Welcome " . $_SESSION['name'] . "!</h3>"
                . "<p>Click on a link above to start a new TA application, view a previous application, or see the readme page<br/>Or click below to log off of your account.</p>"
                . "<a href='logoff.php'>Log Off</a>";
                }
                ?>



            </div>

            <div id="footer">
                by Greg Smith
            </div>

        </div>

    </body>
</html>

