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
    <title>Database Information</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="main">
      
      <h1>TA Application Database Schema overview</h1>
      
      <?php
        main_nav_bar();
      ?>
      <div class="content">
        
        <h3>Peer review changes</h3>
        <p>Please note: For later versions of this web site, there will be more questions on 
          the TA Application form and some questions may be moved out into a new page (such 
          as the password and email fields being moved to a login page)<br/><br/>

          For the schema peer review we met with Andrew Van Tassell and Cody. First, they 
          suggested that we split up our "name" field to a first name and a last name. We 
          agreed, and changed our schema to reflect this. <br/><br/>

          Next, they suggested we include a priority information on a student as to whether 
          a particular instructor wanted or did not want them. We believed our student 
          standings field, which consists of 4 different values, reflected this information 
          well enough, so we did not make this change. <br/><br/>

          They also suggested creating tables specific to International and Graduate 
          students, as there is extra information specific to these cases. While we agreed 
          these changes would be necessary, right now our TA Application does not address 
          this so we did not make the change (although we will in the future). <br/><br/>

          Lastly, they suggested an "extra information" field for the Application table, so 
          that students could include a paragraph or two about extenuating circumstances 
          they would like the administrator or instructors to take into account. We made 
          this addition.<br/><br/>
        </p>
        
        <img src='images/Schema.png'/>
        
        <h3>Users table</h3>
        <table>
          <tr>
            <th>Fields</th><th>Description</th>
          </tr>
          <tr>
            <td>id_user</td><td>(Primary key) (Unique) (Auto-increment) The unique id of the user. INTEGER</td>
          </tr>
          <tr>
            <td>email</td><td>(Unique) The email of the user; acts as a user login. VARCHAR(45)</td>
          </tr>
          <tr>
            <td>name</td><td>The name of the user. VARCHAR(45)</td>
          </tr>
          <tr>
            <td>password</td><td>The user's password. VARCHAR(45)</td>
          </tr>
          <tr>
            <td>unid</td><td>(Can be null) The user's U ID number for the U of U. VARCHAR(8)</td>
          </tr>
        </table>
        
        <h3>Role table</h3>
        <table>
          <tr>
            <th>Fields</th><th>Description</th>
          </tr>
          <tr>
            <td>id_user</td><td>(Primary key)(Foreign key) (Unique) The user's id. References Users. INTEGER </td>
          </tr>
          <tr>
            <td>role</td><td>(Primary key) The role of the user. Can be Admin, Student, or Instructor. VARCHAR(10</td>
          </tr>
        </table>
        
        <h3>Courses table</h3>
        <table>
          <tr>
            <th>Fields</th><th>Description</th>
          </tr>
          <tr>
            <td>id_course</td><td>(Primary key) An id for the course. INTEGER</td>
          </tr>
          <tr>
            <td>dept</td><td>The course department. VARCHAR(45)</td>
          </tr>
          <tr>
            <td>name</td><td>The name of the course. VARCHAR(45)</td>
          </tr>
          <tr>
            <td>num</td><td>The course number (level). VARCHAR(45)</td>
          </tr>
          <tr>
            <td>defunct</td><td>Used to determine if a class is still currently 
              being offered, since we keep all information in the DB. 0 is
              false (still taught); 1 is true. TINYINT(1)</td>
          </tr>
        </table>
        
        <h3>Offered_Courses table</h3>
        <table>
          <tr>
            <th>Fields</th><th>Description</th>
          </tr>
          <tr>
            <td>id_course</td><td>(Primary key) The course id. References Courses table</td>
          </tr>
          <tr>
            <td>year</td><td>The year the course is being offered</td>
          </tr>
          <tr>
            <td>sem</td><td>The seemster the course is being offered</td>
          </tr>
          <tr>
            <td>id_instructor</td><td>The id of the instructor teaching this course. References Users table</td>
          </tr>
          <tr>
            <td>id_offered_course</td><td>(Primary Key) (Auto Increment) The offered course id, unique to this offered course</td>
          </tr>
        </table>
        
        <h3>Application table</h3>
        <table>
          <tr>
            <th>Fields</th><th>Description</th>
          </tr>
          <tr>
            <td>id_user</td><td>(Primary Key) The id of the user. References Users table</td>
          </tr> 
          <tr>
            <td>status</td><td>The status of the application. Could be ongoing, denied, or approved.</td>
          </tr>
          <tr>
            <td>version</td><td>(Primary Key) A timestamp detailing when the application was
            submitted, and used here as the application version.</td>
          </tr>
          <tr>
            <td>unid</td><td>The university id. References users.</td>
          </tr>
          <tr>
            <td>email</td><td>The user's email; also used as their login. References users table.</td>
          </tr>
          <tr>
            <td>day_phone</td><td>The user's daytime phone number</td>
          </tr>
        </table>
        
        <h3>Student_Standings table</h3>
        <table>
          <tr><th>Fields</th><th>Description</th></tr>
          <tr>
            <td>student_id</td><td>(Primary Key) The id of the student (applicant). References Users table</td>
          </tr>
          <tr>
            <td>instructor_id</td><td>(Primary Key) The id of the instructor of the course. Referneces Users table</td>
          </tr>
          <tr>
            <td>id_offered_course</td><td>(Primary Key) The course id for this offered course. Refernces Courses table</td>
          </tr>
          <tr>
            <td>standing</td><td>A value between 1 and 4 representing the applications's standing.</td>
          </tr>
        </table>
        
        <h3>Has_Ta table</h3>
        <table>
          <tr>
            <th>Fields</th><th>Description</th>
          </tr>
          <tr>
            <td>id_app</td><td>(Primary Key) The id of the application. References Application table</td>
          </tr>
          <tr>
            <td>id_course</td><td>The course id the student has TA'd for. References Courses table</td>
          </tr>
        </table>
        
        <h3>Has_Taken table</h3>
        <table>
          <tr>
            <th>Fields</th><th>Description</th>
          </tr>
          <tr>
            <td>id_app</td><td>(Primary Key)The application id. References Application table</td>
          </tr>
          <tr>
            <td>id_course</td><td>(Primary Key) The course id. References Courses table</td>
          </tr>
          <tr>
            <td>grade</td><td>The grade the student received.</td>
          </tr>
        </table>
        
        <h3>Wants_Ta Table</h3>
        <table>
          <tr>
            <th>Fields</th><th>Description</th>
          </tr>
          <tr>
            <td>id_app</td><td>(Primary Key) The id of the application</td>
          </tr>
          <tr>
            <td>id_course</td><td>The course id. References Courses table.</td>
          </tr>
        </table>
      </div>
      
      
    </div>
  </body>
</html>