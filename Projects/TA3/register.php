<?php
require("mainfunctions.php");
?>

<!--
Author: Gregory Smith
Date: 02/12/2015
CS 4540 - TA3

The registration page for TA3
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

                <h3>Create a new account for the TA Application</h3>
                <form action="register_success.php" method="post">
                    <table>
                        
                        <tr><td>First name</td><td><input type="text" name="firstName"/></td></tr>
                        <tr><td>Last Name</td><td><input type="text" name="lastName"</td></tr><tr>
                        <tr><td>UID</td><td><input type="text" name="unid"</td></tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr><td>Email (login)</td><td><input type="email" name="email"/></td></tr>
                        <tr><td>Password</td><td><input type="password" name="password"</td></tr>
                        <tr><td>Re-enter password</td><td><input type="password" name="password2"</td></tr>
                    </table>
                        <input type="submit" value="Submit"/> <a href="index.php"><input type="button" value="Cancel"/></a>
                </form>
                
                
            </div>
            
            <div id="footer">
                by Greg Smith
            </div>
            
        </div>

    </body>
</html>

