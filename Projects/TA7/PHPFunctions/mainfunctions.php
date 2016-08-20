<?php
//session_start();

function nav_bar(){
    echo <<<NAVBAR
        <div id="nav_bar">
            <div class="nav_btn">
                <a href="index.php" class="nav">Main page</a>
            </div>
            <div class="nav_btn">
                <a href="readme.php" class="nav">README</a>
            </div>
NAVBAR;

    if(isset($_SESSION['userid'])){
        if($_SESSION['role'] == "Applicant"){
        echo <<<APPLICANT
            <div class="nav_btn">
                <a href="ta_application.php" class="nav">TA Application</a>
            </div>
APPLICANT;
            }
        else if($_SESSION['role'] == "Instructor"){
            echo <<<INSTRUCTOR
            <div class="nav_btn">
                <a href="instructor.php" class="nav">Instructors</a>
            </div>
INSTRUCTOR;
        }
        else if($_SESSION['role'] == "Admin"){
            echo <<<ADMIN
            <div class="nav_btn">
                <a href="administrator.php" class="nav">Admin - Course List</a>
            </div>
ADMIN;
        }
        echo <<<LOGOUT
            <div class="nav_btn" id="logout_btn">
                <a href='logoff.php' class="nav">Log Off</a>
            </div>
LOGOUT;
    }
    echo "</div>";
}

function log_in() {
    echo <<<LOGIN
            <h2>Welcome to the TA Application page.</h2>
                <p>You are currently signed out. Please log in or click below to create a new account.</p>
            <form onsubmit="return checkLogin(this);" action='applicant.php?validate=true' method="post">
                    <h3>Log In</h3>
                    <table>
                        <tr><td>Email (login):</td><td><input type="email" name="email" value=""/></td></tr>
                        <tr><td>Password:</td><td><input type="password" name="password" value=""/></td></tr>
                        <tr><td><input type="submit" value="Submit" id="submit"/></td><td><a href="index.php"><input type="reset" value="Cancel"/></a></td></tr>
                    </table>
            </form>
                    <div id="loginError">&nbsp</div>


                    <h4>Test Accounts</h4>
                    <table>
                        <tr><th>Account type</th><th>User login</th><th>Password</th></tr>
                        <tr><td>Applicant</td><td>aj@aj.com</td><td>hello</td></tr>
                        <tr><td>Instructor</td><td>joe@harvard.com</td><td>world</td></tr>
                        <tr><td>Admin</td><td>jim@cs.utah.edu</td><td>apple</td></tr>
                    </table>

                    <h3>or</h3>
                    <a href="register.php">Create an account</a>


LOGIN;
}

function validate(){
    require("db_config.php");

    try{
        $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        // save current form information
        $loginEmail = $_POST['email'];
        $pass = $_POST['password'];

        // Get the user's information
        $queryValidate = "SELECT U.id_user, first_name, email, password, R.role 
                          FROM TA7.Users U, TA7.Role R
                          WHERE email=:email AND U.id_user=R.id_user";

        $statement = $db->prepare($queryValidate);
        $statement->bindParam(':email', $loginEmail);
        $statement->execute();

        // return all information from database
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        // if the login info is correct
        if(($loginEmail==$result['email']) && (sha1($pass)==$result['password'])){
            // set necessary session variables
            $_SESSION['userid'] = $result['id_user'];   
            $_SESSION['name'] = $result['first_name'];
            $_SESSION['role'] = $result['role'];
            /*
            echo "<h3>Welcome " . $_SESSION['name'] . $_SESSION['role'] ."!</h3>"
                . "<p>Click on a link above to start a new TA application, view a previous application, or see the readme page<br/>Or click below to log off of your account.</p>"
                . "<a href='logoff.php'>Log Off</a>";
                */
        }
        else
            echo "Incorrect username or password";
    }
    catch (PDOException $ex){
        echo "No database. Error code: " . $ex->getCode();
    }
}

function web_scrape($yr, $sem){
    require("db_config.php");
    // build year and semester here for better effiency
    if($sem == "4")
        $semester = "Spring";
    else if($sem == "6"){
        $semester = "Summer";
    }
    else if($sem == "8"){
        $semester = "Fall";
    }
    $year = "20".$yr;

    // Establish socket connection
    $fp1 = fsockopen("www.acs.utah.edu", 80, $errno, $errstr, 5);

    $out = "GET /uofu/stu/scheduling/crse-info?term=1".$yr.$sem."&subj=CS HTTP/1.1\r\n";
    $out .= "Host: www.acs.utah.edu\r\n";
    $out .= "Connection: Close\r\n\r\n";

    fwrite($fp1, $out);

    if($fp1)
    {
        $page = "";
        while(!feof($fp1))
        {
            $page .= fgets($fp1, 2048);
        }
        fclose($fp1);

        $doc = new DOMDocument();
        @$doc->loadHTML($page);

        $table = $doc->getElementsByTagName('table');
        $rows = $table->item(0)->getElementsByTagName('tr');


        // Establish database connection
        try{
            $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch(PDOException $ex)
        {
            echo "Error connecting to database. " . $ex->getCode();
        }


        // used to avoid header row and empty rows in web site table
        $firstFlag = 0;

        // Loop through all the rows on the web site
        foreach($rows as $row)
        {
            // skip inappropriate rows
            if($firstFlag++ % 2 == 0)
                continue;

            // get all data
            $cells = $row->getElementsByTagName('td');

            // retrieve all data values we want to store
            $dept = trim($cells->item(1)->nodeValue);
            $cat_num = trim($cells->item(2)->nodeValue);
            $title = trim($cells->item(4)->nodeValue);
            $enroll_cap = $cells->item(5)->nodeValue;
            $enrolled = $cells->item(6)->nodeValue;
            $ta_needed = (intval($enroll_cap) / 40) + 1;
            $ta_registered = 0;

            // Insert data into Courses schema using BIND syntax
            $insertCourse = "
            INSERT IGNORE INTO TA7.Courses (year, semester, ta_needed, ta_registered, enroll_cap, enrolled, department, title, catalog_num)
            VALUES (:yr, :sem, :ta_needed, :ta_registered, :enroll_cap, :enrolled, :dept, :title, :cat_num)";
            $statement = $db->prepare($insertCourse);
            $statement->bindParam(':sem', $semester);
            $statement->bindParam(':yr', intval($year));
            $statement->bindParam(':ta_needed', intval($ta_needed));
            $statement->bindParam(':ta_registered', intval($ta_registered));
            $statement->bindParam(':enroll_cap', intval($enroll_cap));
            $statement->bindParam(':enrolled', intval($enrolled));
            $statement->bindParam(':dept', $dept);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':cat_num', intval($cat_num));
            $statement->execute();
        }
    }

    // Repeat for 2nd website

    // Establish socket connection
    $fp = fsockopen("www.acs.utah.edu", 80, $errno, $errstr, 5);

    $out = "GET /uofu/stu/scheduling?term=1".$yr.$sem."&dept=CS&classtype=g HTTP/1.1\r\n";
    $out .= "Host: www.acs.utah.edu\r\n";
    $out .= "Connection: Close\r\n\r\n";

    fwrite($fp, $out);

    if($fp)
    {
        $page = "";
        while(!feof($fp))
        {
            $page .= fgets($fp, 2048);
        }
        fclose($fp);

        $doc = new DOMDocument();
        @$doc->loadHTML($page);

        $tables = $doc->getElementsByTagName('table');
        $rows = $tables->item(4)->getElementsByTagName('tr');


        // Establish database connection
        try{
            $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch(PDOException $ex)
        {
            echo "Error connecting to database. " . $ex->getCode();
        }

        foreach($rows as $row)
        {
            $cells = $row->getElementsByTagName('td');
            // only process 'Lecture' and 'Special Topics' rows
            $component = trim($cells->item(5)->nodeValue);

            if(strcmp($component, "Lecture") == 0 || strcmp($component, "Special Topics") == 0)
            {
                // retrieve all data values we care about
                $cat_num = trim($cells->item(3)->nodeValue);
                $dept = trim($cells->item(2)->nodeValue);
                $inst_name = $cells->item(12)->nodeValue;
                $units = $cells->item(6)->nodeValue;
                $time = $cells->item(9)->nodeValue . " " . $cells->item(8)->nodeValue;
                $location = $cells->item(10)->nodeValue;

                // prepare and execute insert statement using BIND syntax
                $insertCourseInfo = "
                    INSERT IGNORE INTO TA7.Course_Info (semester, year, catalog_num, department, instructor_full_name, component, units, time, location)
                    VALUES (:sem, :yr, :cat_num, :dept, :inst_name, :component, :units, :time, :location)";

                $statement = $db->prepare($insertCourseInfo);
                $statement->bindParam(':sem', $semester);
                $statement->bindParam(':yr', intval($year));
                $statement->bindParam(':cat_num', intval($cat_num));
                $statement->bindParam(':dept', $dept);
                $statement->bindParam(':inst_name', $inst_name);
                $statement->bindParam(':component', $component);
                $statement->bindParam(':units', floatval($units));
                $statement->bindParam(':time', $time);
                $statement->bindParam(':location', $location);
                $statement->execute();
            }
        }

    }


}
?>