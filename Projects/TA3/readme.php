<?php
    require("mainfunctions.php");
    session_start();
?>
<!--
Author: Gregory Smith
Date: 02/11/2015
File: readme.html

The README for TA3. This page describes information relating to the TA Application
project (TA3) including version history and general overview.
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
                    The TA Application site (TA3) allows users to login, or register for a new
                    account if they don't have one. Depending on the role (applicant, admin or
                    instructor), the user will have access to a TA application, a course list
                    with TA information, or information relevant to an instructor. Only links
                    appropriate to the type of user will be shown. 
                </p>
              <p>Users can test the functionality of a TA Applicant by using the test username 'aj@aj.com' and password 'hello', or by creating their own new username. All new accounts are Applicant accounts.</p>
                <h3>Version history</h3>
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