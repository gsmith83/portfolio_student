<?php

function main_nav_bar(){
    echo <<<NAVBAR

 <div class='left_nav_bar'>
      <a href="index.php" id="homepage">Homepage</a><br/><br/>
      <a href="myprojects.php" id="projects">TA Application Stages</a><br/><br/>
      <a href="schema.php" id="schema">Database Schema</a><br/><br/>
      <a href="readme.php" id="readme">README</a><br/><br/>
      <hr>

      <h2>Class Examples</h2>

      <a href="class_examples/HttpDemos/index.html">HttpDemos</a><br/>
      <a href="class_examples/LightsOut/index.html">LightsOut</a><br/>
      <a href="class_examples/PHP/index.html">PHP</a><br/>
      <a href="class_examples/WebClientEchoServer">WebClientEchoServer</a><br/>
      <a href="class_examples/WebTour/index.html">WebTour</a><br/>
      <a href="class_examples/PDO/index.php">PDO</a><br/>
      <a href="class_examples/VerySimpleSession/index.php">VerySimpleSession</a><br/>
      <a href="class_examples/GSCDB/index.html">GSCDB</a><br/>
      <a href="class_examples/Resume_Using_Classes/">ResumeUsingClasses</a><br/>
      <a href="class_examples/Forms/">Forms</a><br/>
      <a href="class_examples/PHP_Scraping/">PHP_Scraping</a><br/>
    </div>

NAVBAR;
}

?>