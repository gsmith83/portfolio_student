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
        echo <<<LOGGED
            <div class="nav_btn">
                <a href="ta_application.php" class="nav">TA Application</a>
            </div>
            <div class="nav_btn">
                <a href="instructor.php" class="nav">Instructors</a>
            </div>
            <div class="nav_btn">
                <a href="administrator.php" class="nav">Admin - Course List</a>
            </div>
LOGGED;
    }
            echo "</div>";
}

function log_in() {
    echo <<<LOGIN
            <h2>Welcome to the TA Application page.</h2>
                <p>You are currently signed out. Please log in or click below to create a new account.</p>
            <form action='applicant.php?validate=true' method="post">
                    <h3>Log In</h3>
                    <table>
                        <tr><td>Username</td><td><input type="email" name="email" value=" "/></td></tr>
                        <tr><td>Password:&nbsp </td><td><input type="password" name="password" value=""/></td></tr>
                        <tr><td><input type="submit" value="Submit"/></td><td><a href="index.php"><input type="reset" value="Cancel"/></a></td></tr>
                    </table>
            </form>
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
        $queryValidate = "SELECT id_user, first_name, email, password FROM TA3.Users WHERE email='$loginEmail'";
        
        $statement = $db->prepare($queryValidate);
        $statement->execute();
        
        // return all information from database
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        // if the login info is correct
        if(($loginEmail==$result['email']) && (sha1($pass)==$result['password'])){
            // set necessary session variables
            $_SESSION['userid'] = $result['id_user'];   
            $_SESSION['name'] = $result['first_name'];
            echo "<h3>Welcome " . $_SESSION['name'] . "!</h3>"
                . "<p>Click on a link above to start a new TA application, view a previous application, or see the readme page<br/>Or click below to log off of your account.</p>"
                . "<a href='logoff.php'>Log Off</a>";
        }
        else
            echo "Incorrect username or password";
    }
    catch (PDOException $ex){
        echo "No database. Error code: " . $ex->getCode();
    }
}
?>