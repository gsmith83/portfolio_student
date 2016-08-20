<?php
require("mainfunctions.php");
session_start();
?>
<!--
Author: Gregory Smith
Date: 02/19/2015
File: readme.html

The README for TA4. This page describes information relating to the TA Application
project (TA4) including version history and general overview.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>README</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
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
                <h2>README</h2>
                <h3>Overview</h3>
                <p>
                    The TA Application site (TA4) allows users to login, or register for a new
                    account if they don't have one. Depending on the role (applicant, admin or
                    instructor), the user will have access to a TA application, a course list
                    with TA information, or information relevant to an instructor. Only links
                    appropriate to the type of user will be shown. 
                </p>
                <p>
                    TA4 now uses objects in the creation of a new User and a new Application. I began by first creating two new .php files, user and application. These would represent the User class and the Application class respectively. Their public fields were directly associated with the information kept in the database for each, such as a first and last name for a user or which semester and year the applicant is applying for in the application. These class files are being stored in a 'Models' directory.<br/>
                    Then I built constructors for each class, allowing each to be build directly from the .php files that handles user input. In this case, these were register_success.php and ta_application_review.php. These fields then will allow easy access for storing in sessions and validating password info. 
                </p>
                <p>Users can test the functionality of a TA Applicant by using the test username 'aj@aj.com' and password 'hello', or by creating their own new username. All new accounts are Applicant accounts.
                </p>
                <h3>Version history</h3>
                <p>
                    (02/19/2015) Completed use of objects in creation of a new User and a new Application. Stubbed out all remaining pages for the complete website.
                </p>
                <p>
                    (02/15/2015) TA3 copied to TA4. Minor improvements in code structure and commenting.
                </p>
                <p>
                    (02/12/2015) Re-styled TA Application web site. Added registration and main pages. Limited access to TA Application form to just account holders. 
                    to TA3. DB connected to application and new user creation. 
                </p>
                <p>(02/11/2015) TA2 copied to TA3. Imported TA_Application database to
                    the new TA3 database. This readme created.</p>

            </div>
        </div>
    </body>
</html>