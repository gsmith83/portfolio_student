using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using OpenQA.Selenium;
using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium.Firefox;
using OpenQA.Selenium.Interactions;


namespace SeleniumTester
{
    [TestClass]
    public class UnitTest
    {
        [TestMethod]
        // Tests all navigation links (not class example links) of main landing page
        public void TestMethod1()
        {
            String title = "";

            IWebDriver driver = new FirefoxDriver();
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/index.php");
            
            // Click to go to readme.php and test the title
            IWebElement readme = driver.FindElement(By.LinkText("README"));
            readme.Click();
            title = driver.Title;
            Assert.AreEqual(title, "README");

            // Click to go to myprojects.php and test it is the correct page
            IWebElement projects = driver.FindElement(By.LinkText("Projects"));
            projects.Click();
            title = driver.Title;
            Assert.AreEqual(title, "My Projects");

            // Click to go to schema.php and test it is correct
            IWebElement schema = driver.FindElement(By.LinkText("Database Schema"));
            schema.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Database Information");

            // Click to go back to index.php
            IWebElement homepage = driver.FindElement(By.LinkText("Homepage"));
            homepage.Click();

            driver.Close();
        }

        [TestMethod]
        // Tests all links in "My Projects" page under the main landing page
        public void TestMethod2()
        {
            String title = "";

            IWebDriver driver = new FirefoxDriver();
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/myprojects.php");

            // Test TA1
            IWebElement ta1 = driver.FindElement(By.LinkText("TA1"));
            ta1.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Go back and test TA2
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/myprojects.php");
            IWebElement ta2 = driver.FindElement(By.LinkText("TA2"));
            ta2.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Go back and test TA3
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/myprojects.php");
            IWebElement ta3 = driver.FindElement(By.LinkText("TA3"));
            ta3.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Go back and test TA4
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/myprojects.php");
            IWebElement ta4 = driver.FindElement(By.LinkText("TA4"));
            ta4.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Go back and test TA5
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/myprojects.php");
            IWebElement ta5 = driver.FindElement(By.LinkText("TA5"));
            ta5.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Go back and test TA6
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/myprojects.php");
            IWebElement ta6 = driver.FindElement(By.LinkText("TA6"));
            ta6.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Go back and test TA7
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/myprojects.php");
            IWebElement ta7 = driver.FindElement(By.LinkText("TA7"));
            ta7.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            driver.Close();
        }

        [TestMethod]
        // Tests TA7 user logins for validity
        public void TestMethod3()
        {
            String title = "";
            IWebDriver driver = new FirefoxDriver();
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/Projects/TA7/index.php");

            // Test aj@aj.com (Applicant)
            IWebElement login = driver.FindElement(By.Name("email"));
            login.SendKeys("aj@aj.com");

            IWebElement password = driver.FindElement(By.Name("password"));
            password.SendKeys("hello");

            IWebElement submit = driver.FindElement(By.Id("submit"));
            submit.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Log off
            IWebElement logoff = driver.FindElement(By.LinkText("Log Off"));
            logoff.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Test joe@harvard.com (Instructor)
            login = driver.FindElement(By.Name("email"));
            login.SendKeys("joe@harvard.com");
            password = driver.FindElement(By.Name("password"));
            password.SendKeys("world");
            submit = driver.FindElement(By.Id("submit"));
            submit.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");

            // Log off
            logoff = driver.FindElement(By.LinkText("Log Off"));
            logoff.Click();

            // Test jim@cs.utah.edu (Admin)
            login = driver.FindElement(By.Name("email"));
            login.SendKeys("jim@cs.utah.edu");
            password = driver.FindElement(By.Name("password"));
            password.SendKeys("apple");
            submit = driver.FindElement(By.Id("submit"));
            submit.Click();
            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications");


            driver.Close();
        }

        [TestMethod]
        // Tests TA7 user logins for invalidity
        public void TestMethod4()
        {
            String title = "";
            IWebDriver driver = new FirefoxDriver();
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/Projects/TA7/index.php");

            // Test aj@aj.com (Applicant)
            IWebElement login = driver.FindElement(By.Name("email"));
            login.SendKeys("aj@aj.com");

            IWebElement password = driver.FindElement(By.Name("password"));
            password.SendKeys("wrongPassword");

            IWebElement submit = driver.FindElement(By.Id("submit"));
            submit.Click();

            title = driver.Title;
            Assert.AreEqual(title, "Teaching Assistant Applications"); // same web page

            driver.Close();
        }

        [TestMethod]
        // Test "Create an Account"
        public void TestMethod5()
        {
            IWebDriver driver = new FirefoxDriver();
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/Projects/TA7/index.php");

            // click on register link
            IWebElement register = driver.FindElement(By.LinkText("Create an account"));
            register.Click();

            // fill out the registration form
            IWebElement fName = driver.FindElement(By.Name("firstName"));
            fName.SendKeys("Alan");
            IWebElement lName = driver.FindElement(By.Name("lastName"));
            lName.SendKeys("Turing");
            IWebElement unid = driver.FindElement(By.Name("unid"));
            unid.SendKeys("01234567");
            IWebElement email = driver.FindElement(By.Name("email"));
            email.SendKeys("alan@theotherside.com");
            IWebElement pass1 = driver.FindElement(By.Name("password"));
            pass1.SendKeys("theapple");
            IWebElement pass2 = driver.FindElement(By.Name("password2"));
            pass2.SendKeys("theapple");

            // click submit
            IWebElement submit = driver.FindElement(By.Id("submit"));
            submit.Click();

            driver.Close();
        }

        [TestMethod]
        // Test user registration with passwords that DO NOT match
        public void TestMethod6()
        {
            IWebDriver driver = new FirefoxDriver();
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/Projects/TA7/register.php");

            // fill out the registration form
            IWebElement fName = driver.FindElement(By.Name("firstName"));
            fName.SendKeys("Kurt");
            IWebElement lName = driver.FindElement(By.Name("lastName"));
            lName.SendKeys("Godel");
            IWebElement unid = driver.FindElement(By.Name("unid"));
            unid.SendKeys("76543210");
            IWebElement email = driver.FindElement(By.Name("email"));
            email.SendKeys("kurt@theotherside.com");
            IWebElement pass1 = driver.FindElement(By.Name("password"));
            pass1.SendKeys("settheoryrules");
            IWebElement pass2 = driver.FindElement(By.Name("password2"));
            pass2.SendKeys("settheorysucks");

            // click submit
            IWebElement submit = driver.FindElement(By.Id("submit"));
            submit.Click();

            IWebElement error = driver.FindElement(By.Id("loginError"));
            String errorMsg = error.Text;
            Assert.AreEqual(errorMsg, "Password fields do not match. Please enter your password again.");

            driver.Close();
        }

        [TestMethod]
        // Test application form
        public void TestMethod7()
        {
            IWebDriver driver = new FirefoxDriver();
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/Projects/TA7/index.php");

            // Test aj@aj.com application
            IWebElement login = driver.FindElement(By.Name("email"));
            login.SendKeys("aj@aj.com");

            IWebElement password = driver.FindElement(By.Name("password"));
            password.SendKeys("hello");

            IWebElement submit = driver.FindElement(By.Id("submit"));
            submit.Click();

            // click "TA Application"
            IWebElement app = driver.FindElement(By.LinkText("TA Application"));
            app.Click();

            // Fill out application
            SelectElement sem = new SelectElement(driver.FindElement(By.Name("semester")));
            sem.SelectByIndex(1); // Fall

            SelectElement year = new SelectElement(driver.FindElement(By.Name("year")));
            year.SelectByIndex(1); // 2015

            IWebElement fName = driver.FindElement(By.Name("firstName"));
            fName.SendKeys("Alan");

            IWebElement lName = driver.FindElement(By.Name("lastName"));
            lName.SendKeys("Turing");

            IWebElement phoneNumber = driver.FindElement(By.Name("phoneNumber"));
            phoneNumber.SendKeys("555-5555");

            IWebElement phoneNumberEve = driver.FindElement(By.Name("phoneNumberEvening"));
            phoneNumberEve.SendKeys("444-4444");

            IWebElement address = driver.FindElement(By.Name("address"));
            address.SendKeys("123 Park Place");

            IWebElement degreebtn = driver.FindElement(By.Id("yb001"));
            degreebtn.Click();

            IWebElement degreebtn2 = driver.FindElement(By.Id("db001"));
            degreebtn2.Click();

            IWebElement check1 = driver.FindElement(By.Id("box001"));
            check1.Click();

            SelectElement sel1 = new SelectElement(driver.FindElement(By.Name("grade1")));
            sel1.SelectByIndex(1);

            IWebElement extra = driver.FindElement(By.Name("extraInfo"));
            extra.SendKeys("I love using Selenium! Also, I love my Teaching Assistant overlords!");

            IWebElement submit2 = driver.FindElement(By.Id("submit"));
            submit2.Click();

            driver.Close();
        }
        [TestMethod]
        public void TestMethod8()
        {
            IWebDriver driver = new FirefoxDriver();
            driver.Navigate().GoToUrl("http://uofu-cs4540-72.cloudapp.net/Projects/TA7/index.php");

            // fill out login information
            IWebElement login = driver.FindElement(By.Name("email"));
            login.SendKeys("jim@cs.utah.edu");
            IWebElement password = driver.FindElement(By.Name("password"));
            password.SendKeys("apple");
            IWebElement submit = driver.FindElement(By.Id("submit"));
            submit.Click();

            // Course List link
            IWebElement link = driver.FindElement(By.LinkText("Admin - Course List"));
            link.Click();

            // We'll just check the defaults Spring 2015 course list
            IWebElement submitAdmin = driver.FindElement(By.Id("submit"));
            submitAdmin.Click();

            // Test that the header for the web page matches Spring 2015 as expected
            IWebElement selCheck = driver.FindElement(By.Id("selCheck"));
            String selCheckString = selCheck.Text;
            Assert.AreEqual(selCheckString, "Spring 2015 class information");

            driver.Close();
        }
    }
}
