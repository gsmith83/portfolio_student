<?php
/*
Author: Gregory Smith
CS 4540 - TA6
03/04/2015

This page displays the current courses that require TA positions, whether they are
 filled or not. These are pulled from the database which currently includes about
 a dozen courses total. Note: Not all courses require TAs, and this page reflects
 this.
*/


require("mainfunctions.php");
require("db_config.php");
session_start();

// Process year and semester
$year = $_POST['year'];
$semester = $_POST['semester'];

// call web_scrape with appropriate parameters
web_scrape(substr($year, 2, 2), $semester);



// *************************************************************
try
{
    $output = "";

    $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    //Correct the semester and year
    if($semester == 4)
        $sem = "Spring";
    else if($semester == 6){
        $sem = "Summer";
    }
    else if($semester == 8){
        $sem = "Fall";
    }
    // Define query from a SELECT statement. A natural join is used to get information from both DBs
    $query =     "
       SELECT * 
       FROM TA6.Courses C, TA6.Course_Info I
       WHERE C.semester = :sem AND C.year = :year AND C.semester = I.semester AND C.year = I.year AND C.catalog_num = I.catalog_num";

    $statement = $db->prepare( $query );
    $statement->bindParam(':sem', $sem);
    $statement->bindParam(':year', $year);
    $statement->execute(  );

    $result    = $statement->fetchAll(PDO::FETCH_ASSOC);

    // check that there is a result
    if ( empty( $result ) )
    {
        $output .= "<h2> No Info </h2>";
    }
    else
    {

        $output .= "<h3 class='app'>".$sem." ".$year." class information</h3>";

        // Declare table and table headers
        $output .= "<table class='app'><tr><th class='app'>Class Number</th><th class='app'>Title</th>"
            . "<th class='app'>Enrolled</th><th class='app'>Cap</th><th class='app'>TAs Needed</th><th class='app'>TAs Registered</th><th class='app'>Instructor</th><th class='app'>Component</th><th class='app'>Units</th><th class='app'>Time</th><th class='app'>Location</th></tr>";

        // output each tuple in the schema
        foreach ($result as $row)
        {
            $output .= "<tr class='app'>" 
                . "<td class='app'>". $row['department'] . " " . $row['catalog_num'] . "</td>"
                . "<td class='app'>". $row['title'] . "</td>"
                . "<td class='app'>". $row['enrolled'] . "</td>"
                . "<td class='app'>". $row['enroll_cap'] . "</td>"
                . "<td class='app'>". $row['ta_needed'] . "</td>"
                . "<td class='app'>". $row['ta_registered'] . "</td>"
                . "<td class='app'>". $row['instructor_full_name'] . "</td>"
                . "<td class='app'>". $row['component'] . "</td>"
                . "<td class='app'>". $row['units'] . "</td>"
                . "<td class='app'>". $row['time'] . "</td>"
                . "<td class='app'>". $row['location'] . "</td>"
                ."</tr>";
        }

        // close the table
        $output .=   "</table>";

        // Display number of records found
        $output .= "<p>Found: " . count($result) . " records </p>";
    }

}
catch (PDOException $ex)
{
    $output .= "<p>oops</p>";
    $output .= "<p> Code: {$ex->getCode()} </p>";
    $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
    $output .= "<pre>$ex</pre>";

    if ($ex->getCode() == 23000)
    {
        $output .= "<h2> Duplicate Entries not allowed </h2>";
    }
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='style.css'>
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
                <h2>TA Application - Course List Review</h2>


                
<div class='options'>
<h4>Table Options</h4>

<input id="toggleClassNum" type="button" onclick="hideCol('ClassNum', '1');" value="Hide Class Number"/>
<input id="toggleTitle" type="button" onclick="hideCol('Title', '2');" value="Hide Title"/>
<input id="toggleEnrolled" type="button" onclick="hideCol('Enrolled', '3');" value="Hide Enrolled"/>
<input id="toggleCap" type="button" onclick="hideCol('Cap', '4');" value="Hide Enrollment Cap"/>
<input id="toggleTANeeded" type="button" onclick="hideCol('TANeeded', '5');" value="Hide TAs Needed"/>
<input id="toggleTAReg" type="button" onclick="hideCol('TAReg', '6');" value="Hide TAs Registered"/>
<input id="toggleInst" type="button" onclick="hideCol('Inst', '7');" value="Hide Instructor"/>
<input id="toggleComp" type="button" onclick="hideCol('Comp', '8');" value="Hide Component"/>
<input id="toggleUnits" type="button" onclick="hideCol('Units', '9');" value="Hide Units"/>
<input id="toggleTime" type="button" onclick="hideCol('Time', '10');" value="Hide Time"/>
<input id="toggleLocation" type="button" onclick="hideCol('Location', '11');" value="Hide Location"/>

</div>


                <?php echo $output; ?>

            </div>

            <div id="footer">
                by Greg Smith
            </div>

        </div>

    </body>
</html>

