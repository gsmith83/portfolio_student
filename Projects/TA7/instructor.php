<?php
require("PHPFunctions/mainfunctions.php");
session_start();

if($_SESSION['role'] != "Instructor")
    header('Location: unauthorized.php');
?>
<!--
Author: Gregory Smith
Date: 03/04/2015
CS 4540 - TA7

This page will display information relevant to the instructor view 
-->

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='Styles/style.css'>
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
