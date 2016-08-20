<?php
require("mainfunctions.php");
session_start();
?>
<!--
Author: Gregory Smith
Date: 02/11/2015
CS 4540 - TA2

This page will display information relevant to the instructor view
-->

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='style.css'>
        <title>Instructor</title>
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
                
                <h2>TA Application - Instructor view</h2>
                
                In future assignments, this page will list the current status of an 
                instructor's courses. For now, this page is simply stubbed out.
            </div>
            
            <div id="footer">
                by Greg Smith
            </div>
            
        </div>

    </body>
</html>
