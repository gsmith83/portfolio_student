<?php
require("mainfunctions.php");
?>

<!--
Author: Gregory Smith
Date: 02/19/2015
CS 4540 - TA5

The registration page for TA5
-->

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='style.css'>
        <title>Teaching Assistant Applications</title>
        <script type="text/javascript" src="jquery/jquery-2.1.3.js"></script>
        <script src="jquery/js_functions.js"></script>
        <script>
            $(document).ready(function(){
                checkInput();
            });
        </script>
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
                <form onsubmit="return checkRegistration(this);" action="register_success.php" method="post">
                    <table>
                        <tr><td>First name</td>
                            <td><input onfocusout="checkInput()" type="text" name="firstName" required/></td></tr>
                        <tr><td>Last Name</td>
                            <td><input type="text" name="lastName" required/></td></tr><tr>
                        <tr><td>UID</td>
                            <td><input type="text" name="unid" required/></td></tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr><td>Email (login)</td>
                            <td><input type="email" name="email" required/></td></tr>
                        <tr><td>Password</td>
                            <td><input type="password" name="password" required/></td></tr>
                        <tr><td>Re-enter password</td>
                            <td><input type="password" name="password2" required/></td></tr>
                    </table>
                    <input type="submit" value="Submit"/> 
                    <a href="index.php"><input type="button" value="Cancel"/></a>
                </form>
                
                <div id="loginError"></div>
                
            </div>
            
            <div id="footer">
                by Greg Smith
            </div>
            
        </div>

    </body>
</html>

