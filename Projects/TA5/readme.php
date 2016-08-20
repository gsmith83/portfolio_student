<?php
require("mainfunctions.php");
session_start();
?>
<!--
Author: Gregory Smith
Date: 02/26/2015
File: readme.html

The README for TA5. This page describes information relating to the TA Application
project (TA5) including version history and general overview.
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
                    The TA Application site (TA5) allows users to login, or register for a new
                    account if they don't have one. Depending on the role (applicant, admin or
                    instructor), the user will have access to a TA application, a course list
                    with TA information, or information relevant to an instructor. Only links
                    appropriate to the type of user will be shown. 
                </p>
                <p>
                    TA4 now uses objects in the creation of a new User and a new Application. I began by first creating two new .php files, user and application. These would represent the User class and the Application class respectively. Their public fields were directly associated with the information kept in the database for each, such as a first and last name for a user or which semester and year the applicant is applying for in the application. These class files are being stored in a 'Models' directory.<br/>
                    Next I built constructors for each class, allowing each to be build directly from the .php files that handles user input. In this case, these were register_success.php and ta_application_review.php. These fields then will allow easy access for storing in sessions and validating password info. 
                </p>
                <p>You can use the username 'aj@aj.com' and password 'hello' to access an Applicant account, or create your own.<br/>
                    You can use the username 'joe@harvard.com' and password 'world' to access an Instructor account.<br/>
                    You can use the username 'jim@cs.utah.edu' and password 'apple' to access an Admin account.
                </p>


                <h3>Version history</h3>
                <h4>(02/26/2015)</h4> 
                <p>
                    Registration form (register.php) now uses javascript to validate various fields, such as an email must match an email format or a name cannot have numerical digits.<br/>
                    Application form (ta_application.php) now uses javascript to validate several fields, and advises user on the validity of each required field with a red 'X' or a green check.<br/>
                    All MySQL commands now use the BIND syntax.<br/>
                    In addition, all user inputs are now validated on the back end to ensure proper data is inserted into the database. Located in the validate() function in mainfunctions.php, in register_success.php, and in ta_application_review.php
                </p>

                <h4>(02/25/2015)</h4>
                <p>
                    Added login verification functionality through javascript to print an error message if user has not entered a login / password (index.php). 
                </p>
                <h4>(02/24/2015) </h4>
                <p>
                    Copied database schema to TA5. Created new TA5 directory with copied contents from TA4.
                </p>

                <h4>(02/19/2015) </h4>
                <p>
                    Completed use of objects in creation of a new User and a new Application. Stubbed out all remaining pages for the complete website.
                </p>

                <h4>(02/15/2015) </h4>
                <p>TA3 copied to TA4. Minor improvements in code structure and commenting.
                </p>

                <h4>(02/12/2015) </h4>
                <p>Re-styled TA Application web site. Added registration and main pages. Limited access to TA Application form to just account holders. 
                    to TA3. DB connected to application and new user creation. 
                </p>
                <h4>(02/11/2015) </h4>
                <p>TA2 copied to TA3. Imported TA_Application database to
                    the new TA3 database. This readme created.</p>

            </div>
        </div>
    </body>
</html>