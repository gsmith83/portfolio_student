<?php
require("mainfunctions.php");
session_start();
$message = "";
?>

<!--
Author: Gregory Smith
Date: 02/19/2015
CS 4540 - TA4

Used for validation in the main page for TA4. Re-directs to index.php
-->

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='style.css'>
        <title>Teaching Assistant Applications</title>
        <meta http-equiv="refresh" content="0; url=index.php">
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
                // validate the login name and password if
                if(!empty($_GET['validate'])){
                        validate();   
                }
                ?>



            </div>

            <div id="footer">
                by Greg Smith
            </div>

        </div>

    </body>
</html>
