<?php
require("PHPFunctions/mainfunctions.php");
session_start();
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

                <h3>Unauthorized Access</h3>
                <p>
                    You have attempted to access a web page you do not have authorization to access. Your name and IP address have been forwarded to the proper authorities.</br>
                    Please choose a link above.
            </p>



        </div>

    <div id="footer">
        by Greg Smith
    </div>

    </div>

</body>
</html>