<?php
require("mainfunctions.php");
session_start();
?>
<!--
Author: Gregory Smith
Date: 03/04/2015
File: readme.html

The README for TA6. This page describes information relating to the TA Application
project (TA6) including version history and general overview.
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
                    The TA Application site (TA6) allows users to login, or register for a new
                    account if they don't have one. Depending on the role (applicant, admin or
                    instructor), the user will have access to a TA application, a course list (information pulled from two sites at www.acs.utah.edu), or information relevant to an instructor. 
                </p>
                <p>You can use the username 'aj@aj.com' and password 'hello' to access an Applicant account, or create your own.<br/>
                    You can use the username 'joe@harvard.com' and password 'world' to access an Instructor account.<br/>
                    You can use the username 'jim@cs.utah.edu' and password 'apple' to access an Admin account.
                </p>


                <h3>Version history</h3>
                <h4>(03/05/2015)</h4>
                <p>
                    Finished styling of the table in course list page. Additional javascript functionality to show or hide columns, making it easier to find the information a user needs. This is found in course_list.php.
                </p>
                <h4>(03/04/2015)</h4>
                <p>
                    The Admin - Course list page now scrapes information from two pages at www.acs.utah.edu for course list information. PHP is used to insert the relevant information to the database after it has been bound using the BIND syntax. The user is re-directed to a new page where PHP retrieves information from the database to be displayed to the user. 
                </p>
                <h4>(03/03/2015)</h4>
                <p>
                    Added basic web-scraping functionality to pull course info from a single www.acs.utah.edu web page.
                </p>
                <h4>(03/02/2015)</h4>
                <p>
                    Set up the TA6 version of the TA Application website. Copied version TA5 to this new version, and created a new shchema, TA6 with all the same data as TA5. 
                </p>
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