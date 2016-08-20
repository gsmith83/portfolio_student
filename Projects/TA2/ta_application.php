<!--
Author: Gregory Smith
Date: 02/05/2015
CS 4540 - TA2

The main TA Application form. This uses a post to get the form data to the next
page, the review application page.
-->

<!DOCTYPE HTML>
<html>
<head>
  <link rel='stylesheet' href='style.css'>
  <title>TA Application</title>
</head>
<body>
  <h1>TA Application</h1>
  <div class="main">
    <form action="ta_application_review.php" method="post">
      
      <div class="question">
        <div class="questionlabel">Which Semester are you applying to? &nbsp</div>
        <select name="semester">
          <option selected="selected">Choose Semester</option>
          <option value="Fall ">Fall</option>
          <option value="Summer">Summer</option>
          <option value="Spring">Spring</option>
        </select>
        <div class="questionlabel">Which Year?&nbsp</div>
        <select name="year">
          <option selected="selected">Choose Year</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
        </select>
        
      </div>
      
      <div class="question">
        <div class="questionlabel">First Name: &nbsp</div>
        <input type="text" name="firstName">
      </div>
      <div class="question">
        <div class="questionlabel">Last Name: &nbsp</div>
        <input type="text" name="lastName">
      </div>
      
      <div class="question">
        <div class="questionlabel">Email: &nbsp</div>
        <input type="text" name="email">
      </div>
      
      <div class="question">
        <div class="questionlabel">What would you like your application password to be?: &nbsp</div>
        <input type="password" name="password">
      </div>
        
      <div class="question">
        <div class="questionlabel">uID: &nbsp</div>
        <input type="text" name="uid"><br/>
      </div>
      
      <div class="question">
        <div class="questionlabel">Phone Number (Day): &nbsp</div>
        <input type="text" name="phoneNumber">
      </div>
      <div class="question">
        <div class="questionlabel">Phone Number (Evening): &nbsp</div>
        <input type="text" name="phoneNumberEvening">
      </div>
      
      
      
      <div class="question">
        <div class="questionlabel">Address: &nbsp</div>
        <textarea name="address" rows="5" cols="50"></textarea>
      </div>
      
      <div class="question">
        <div class="questionlabel">Are you pursuing a Computer Science degree? &nbsp</div>
        
          <input class="radio" type="radio" name="degreebtn" id="yb001">
          <label for="yb001">Yes</label> 
          
          <input class="radio" type="radio" name="degreebtn" id="nb001">
          <label for="nb001">No</label>
          
      </div>
      
      <div class="question">
        <div class="questionlabel">If not, which degree are you pursuing? &nbsp</div>
        <input type="text" name="diffDegree">
      </div>
      
      <div class="question">
        
        <div class="questionlabel">Select your degree: &nbsp</div>
        
          <input class="radio" type="radio" name="degreeTypeBtn" id="db001">
          <label for="db001">Bachelor's</label>
          
          <input class="radio" type="radio" name="degreeTypeBtn" id="db002">
          <label for="db002">BS/MS</label>
          
          <input class="radio" type="radio" name="degreeTypeBtn" id="db003">
          <label for="db003">Master's</label>
          
          <input class="radio" type="radio" name="degreeTypeBtn" id="db004">
          <label for="db004">Ph.D.</label>
      </div>
      
      
      
      
      <div class="question">
        
        <div class="questionlabel">Please check the classes you have previously taken, TA'd for, and would like to apply to: </div><br/><br/>
        
        <div class='classes'>
          
          <div class='column'>Taken &nbsp TA'd &nbsp Want to TA</div>
          
          <input id='box001' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade1">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box001'>CS 1410 - Intro to Programming</label><br/>
          
          <input id='box002' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade2">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box002'>CS 2100 - Discrete Structures</label><br/>
          
          <input id='box003' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade3">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box003'>CS 2420 - Data Structures & Algorithms</label><br/>
          
          <input id='box004' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade4">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box004'>CS 3100 - Models of Computation</label><br/>
          
          <input id='box005' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade5">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box005'>CS 3500 - Software Practice I</label><br/>
          
          <input id='box006' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade6">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box006'>CS 3505 - Software Practice II</label><br/>
          
          <input id='box007' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade7">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box007'>CS 3700 - Digital Design Lab</label><br/>
          
          <input id='box008' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade8">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box008'>CS 3810 - Computer Organization</label><br/>
          
          <input id='box009' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade9">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box009'>CS 4150 - Advanced Algorithms & Data Structures</label><br/>
          
          <input id='box010' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade10">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box010'>CS 4540 - Web Software Architecture</label><br/>
          
          <input id='box011' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade11">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box011'>CS 5320 - Computer Vision</label><br/>
          
          <input id='box012' type='checkbox' name='classes[]'>
          <input type='checkbox' name='didTA'>
          <input type='checkbox' name='wantToTA'>
          <select name="grade12">
            <option selected="selected">Grade</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="E">E</option>
          </select>
          <label for='box012'>CS 5958 - Network Security</label><br/>
        </div>
        
      </div>
      
      <div class="question">
        <div class="questionlabel">Please tell us any extra information you would like us to consider: &nbsp</div>
        <textarea name="extraInfo" rows="5" cols="50"></textarea>
      </div>
      
      
      <div class="submitBtn"><input type="submit"></div>
    </form>

<!--    
    <div class="submitBtn">
      <a href="ta_application_review.php"><button type="button" onclick="submitApp()">Submit</button></a>
    </div>-->
    
  </div>
  
  
  <div class="footer"><a href="index.php">Main Page</a></div>
  
</body>
</html>