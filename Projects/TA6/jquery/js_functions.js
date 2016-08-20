/*
 * Author: Gregory Smith
 * Date Last Modified: 02/26/2015
 * Filename: js_functions.js
 *
 * Contains all javascript functions for the TA5 site.
*/

function checkLogin(form)
{
    if(form.email.value == "" && form.password.value == "")
    {
        document.getElementById("loginError").innerHTML = "Please enter your login (email) and password";
        form.email.focus();
        return false;
    }
    else if(form.email.value == "")
    {
        document.getElementById("loginError").innerHTML = "Please enter your login (email)";
        form.email.focus();
        return false;
    }
    else if(form.password.value == "")
    {
        document.getElementById("loginError").innerHTML = "Please enter your password";   
        form.password.focus();
        return false;
    }
    
    return true;
}

function checkRegistration(form)
{
    if(form.password.value != form.password2.value)
    {
        document.getElementById("loginError").innerHTML = "Password fields do not match. Please enter your password again.";
        form.password.value = "";
        form.password2.value = "";
        form.password.focus();
        return false;
    }

    re = /[^0-9]/;
    if(!re.test(form.firstName.value)){
        document.getElementById("loginError").innerHTML = "Names cannot contain numeric digits";  
        form.firstName.focus();
        return false;
    }
    if(!re.test(form.lastName.value)){
        document.getElementById("loginError").innerHTML = "Names cannot contain numeric digits";
        form.lastName.focus();
        return false;
    }
    
    var re = /^\d{8}$/;
    if(!re.test(form.unid.value)){
        document.getElementById("loginError").innerHTML = "Your UID must contain 8 numeric digits only";
        form.unid.focus();
        return false;
    }
    
    re = /([a-zA-z0-9]){6,}/;
    if(!re.test(form.password.value)){
        document.getElementById("loginError").innerHTML = "Passwords must contain at least 6 alpha-numeric characters";
        form.password.value = "";
        form.password2.value = "";
        form.password.focus();
        return false;
    }
    
    return true;
}

function hideCol(par, child){
    document.getElementById('toggle'+par+'').value = "Show " + par;
    document.getElementById('toggle'+par+'').setAttribute('onclick', "showCol(\'"+par+"\', \'"+child+"\')");
    $('td:nth-child('+child+'),th:nth-child('+child+')').hide();
}

function showCol(par, child)
{
    document.getElementById('toggle'+par+'').value = "Hide " + par;
    document.getElementById('toggle'+par+'').setAttribute('onclick', "hideCol(\'"+par+"\', \'"+child+"\')");
    $('td:nth-child('+child+'),th:nth-child('+child+')').show();
}