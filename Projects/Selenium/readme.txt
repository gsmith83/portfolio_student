Author: Gregory Smith
Filename: readme.html
README for the TA Application Website (version 2)

Selenium

My Selenium Unit Test file is located in the main trunk svn folder under the path "trunk/html/Projects/Selenium". The unit test file is located in SeleniumTester/UnitTest.cs.

This program tests all original links (not class examples) of the main landing page, project links, and various pages under TA7. To run, make sure the provided Selenium files are referenced and "Run All Tests".

In TA7, the program checks user logins for an Applicant, Instructor and Administrator. It also tests an unknown user
The program also tests the registration of a new user, including correct form submission and one where passwords do not match. It then checks for an eror message.
The program then tests a new application being filled out, including checking a checkbox for a particular class and selecting a grade.

The tester made me aware of several problems with my code. For instance, an applicant could access the instructor.php page if they typed the filename into their address bar. I've since fixed this so that every appropriate page checks that the current user is authorized to access it.