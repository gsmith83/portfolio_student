<?php
/*
Author: Gregory Smith
Date: 03/22/2015

This class represents a user of the TA Application web site.
*/

class User
{
    public $firstName      = "";
    public $lastName       = "";
    public $email          = "";
    public $hashedPassword = "";
    public $uid            = "";
    public $role           = "";

    // Constructor build directly from form information. 
    public function __construct($firstName, $lastName, $email, $hashedPassword, $uid, $role)
    {
        $this->firstName      = $firstName;
        $this->lastName       = $lastName;
        $this->$email         = $email;
        $this->hashedPassword = $hashedPassword;
        $this->uid            = $uid;
        $this->role           = $role;
    }
    
    // default constructor    
    public function __construct()
    {
        // Builds an empty User. 
    }

    // Setters
    function set_first_name( $name )
    {
        if (  strlen($name) > 0 )
        {
            $this->firstName = $name;
            return "";
        }
        else
        {
            return "class='err'";
        }
    }
    
    function set_last_name( $name )
    {
        if (  strlen($name) > 0 )
        {
            $this->lastName = $name;
            return "";
        }
        else
            return "class='err'";
    }  
    
    function set_email( $mail )
    {
        if (  strlen($name) > 0 )
        {
            $this->email = $email;
            return "";
        }
        else
            return "class='err'";
    }  
    
    function set_hashed_password( $pass )
    {
        if (  strlen($pass) > 0 )
        {
            $this->hashed_password = $pass;
            return "";
        }
        else
            return "class='err'";
    }  
    
    function set_uid( $uid )
    {
        if (  strlen($uid) > 0 )
        {
            $this->uid = $uid;
            return "";
        }
        else
            return "class='err'";
    }  


    public function __toString()
    {
        // So far only a first name is used in a welcome message
        return '$this->firstName';
    }
}
?>