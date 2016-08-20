<!--
Author: Gregory Smith
Date: 02/11/2015
CS 4540 - TA3

The main page for TA2
-->
<?php
require("db_config.php");

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
        <link rel='stylesheet' href='style.css'>
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