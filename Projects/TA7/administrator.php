<?php
/*
Author: Gregory Smith
CS 4540 - TA7
03/04/2015

This page displays the current courses that require TA positions, whether they are
 filled or not. These are pulled from the database which currently includes about
 a dozen courses total. Note: Not all courses require TAs, and this page reflects
 this.
*/


require("PHPFunctions/mainfunctions.php");
require("PHPFunctions/db_config.php");
session_start();

if($_SESSION['role'] != "Admin")
    header('Location: unauthorized.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='Styles/style.css'>
        <title>Administrator</title>
        <script type="text/javascript" src="jquery/jquery-2.1.3.js"></script>
        <script src="jquery/js_functions.js"></script>
    </head>
    <body>

        <div id="header">
            TA Application
        </div>

        <?php nav_bar(); ?>
        <div id="main">
            <div id="content">
                <h2>TA Application - Course List Selection</h2>

                <form action ="course_list.php" method="post">
                    <p>Please select a year and semester for the CS course information you would like to request:<p>

                    <table>
                        <tr>
                            <td>Year:</td>
                            <td>
                                <select name="year">
                                    <option value="2015" selected>2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Semester:</td>
                            <td>
                                <select name="semester">
                                    <option value="4" selected>Spring</option>
                                    <option value="6">Summer</option>
                                    <option value="8">Fall</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <input type="submit" value="Submit" id="submit"/>

                </form>



            </div>

            <div id="footer">
                by Greg Smith
            </div>

        </div>

    </body>
</html>

