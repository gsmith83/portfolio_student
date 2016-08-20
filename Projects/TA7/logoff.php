<!--
Author: Gregory Smith
Date: 03/04/2015
CS 4540 - TA7

Logs the user off the website by unsetting session variabled. Re-directs to index.php
-->
<?php
require("PHPFunctions/db_config.php");

session_start();

unset($_SESSION['name']);
unset($_SESSION['userid']);
unset($_SESSION['role']);
unset($_SESSION['password']);
unset($_SESSION['email']);

echo <<<END



<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='Styles/style.css'>
        <title>Teaching Assistant Applications</title>
        <META http-equiv="refresh" content="0; url=index.php">
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
                
            </div>
            
            <div id="footer">
                by Greg Smith
            </div>
            
        </div>

    </body>
</html>

END2;
?>