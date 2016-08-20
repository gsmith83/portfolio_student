<!--
Author: Gregory Smith
Date: 03/04/2015
CS4540 - TA Application
-->
<?php
require("functions.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Web Software Architecture</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  
  <div class="main">
    
    <h1>Gregory Smith</h1>
    
    
    <img src="images/me.jpg" alt="A picture of me" class="me_pic"/>
    
    <?php
    main_nav_bar();
    ?>
      
    <div class='content'>
      
      
      <h2>Hello!</h2> 
      <p>My name is Greg Smith.  I'm currently in the Computer Science 
        program at the University of Utah. Web and mobile development, embedded systems, 
		networking and security are some of my interests. I'm working on IoT platforms and services.
      </p>
	  <p>
	  This website was built for a class on web development. The various stages of a teaching assistant
	  application showcases the use of html/css, javascript, and php in the development of simple static
	  pages, user validation, databases, web-scraping, dynamic page creation, and user interaction principles.
	  </p>
	  <p>
	  <a href="Projects/TA7">Final TA Application site</a>
	  </p>
	  
      <h3>Some electives I've taken:</h3>
      <ul>
        <li>Mobile programming (Android)</li>
        <li>Web Software Architecture</li>
        <li>Computer Networks</li>
        <li>Databases</li>
		<li>Network Security</li>
      </ul>
    </div>
  </div>
</body>
</html>