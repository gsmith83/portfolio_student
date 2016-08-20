<!--
Author: Gregory Smith
Last Modified: 02/04/2015
CS 4540 - TA Application 2

This page displays the information relating to the TA Application Database
-->
<?php
require('functions.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>README</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main">

            <h1>README</h1>

            <div class='wrapper'>

                <?php
                main_nav_bar();
                ?>
                <div class="content">
                    <p>
                        Author: Gregory Smith<br/>
                        Filename: readme.html<br/>
                        README for the TA Application Website (version 2)
                    </p>
                    <h2>Selenium</h2>
                    <p>My Selenium Unit Test file is located in the main trunk svn folder under the path "trunk/html/Projects/Selenium"</p>
                    <p>This program tests all original links (not class examples) of the main landing page, project links, and various pages under TA7. To run, make sure the provided Selenium files are referenced and "Run All Tests".</p>
                    <p>In TA7, the program checks user logins for an Applicant, Instructor and Administrator. It also tests an unknown user</br>
                The program also tests the registration of a new user, including correct form submission and one where passwords do not match. It then checks for an eror message.</br>
            The program then tests a new application being filled out, including checking a checkbox for a particular class and selecting a grade.
                    </p>
        <p>
            The tester made me aware of several problems with my code. For instance, an applicant could access the instructor.php page if they typed the filename into their address bar. I've since fixed this so that every appropriate page checks that the current user is authorized to access it.
        </p>
                    
                    <h2>Overview</h2>
                    <p>
                        The TA Application website currently allows a student to fill out a TA
                        application form, which asks several questions regarding student 
                        information and classes the student has taken and would like to TA for.
                    </p>

                    <h3>Design decisions</h3>
                    <p>
                        The structure of the website is currently split into two. There is a main 
                        homepage, which includes this README page, an about me page (homepage), 
                        a page detailing the database schema used in the TA Application website,
                        and links to class examples. This part of the website has a distinct
                        style from any projects we do in class.
                    </p>
                    <p>
                        The style for this part of the web site is based around boxes, which is
                        implemented with "div" tags. These include a wrapper div to contain 
                        everything, a left navigation bar with important links, and a content 
                        div to include any necessary information.
                    </p>

                    <h3>Version history</h3>
                    <p>
                        (02/08/2015) Changed the look-and-feel of the main start page of the 
                        website, including updating the CSS and changing some of the html layout
                    </p>
                    <p>
                        (02/05/2015) Updated the TA Application and schema (in TA2) to reflect
                        suggestions from our peer review. Added Database insertions and queries.
                    </p>
                    <p>
                        (02/04/2015) Created schema.html page to detail the Database information
                        implemented on the TA Application website.
                    </p>
                    <p>
                        (02/03/2015) Database implementation designed and uploaded to website.
                    </p>
                    <p>
                        (02/01/2015) Changed navigation link layout. Set up phpMyAdmin.
                    </p>
                    <p>
                        (01/28/2015) CSS completed. TA Application page completed. Some 
                        application review page complete
                    </p>
                    <p>
                        (01/26/2015) Main information added. Div tags set up. Some CSS added.
                    </p>
                    <p>
                        (01/25/2015) VM on Azure set up. Site skeleton uploaded.
                    </p>

                </div>
            </div>
        </div>
    </body>
</html>