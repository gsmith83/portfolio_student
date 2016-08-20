<?php
require("user.php");
/*
Author: Greg Smith
Date: 03/22/2015
CS4540 - TA7

This class represents an application in the TA Application web site.
*/

class Application
{
    public $user;
    public $semester;
    public $year;
    public $dayPhone;
    public $evePhone;
    public $address;
    public $diffDegree;
    public $extraInfo;
    
    // This constructor builds an Application directly from form information.
    public function __construct($user, $semester, $year, $dayPhone, $evePhone, $address,  $diffDegree, $extraInfo)
    {
        $this->user       = $user;
        $this->semester   = $semester;
        $this->year       = $year;
        $this->dayPhone   = $dayPhone;
        $this->evePhone   = $evePhone;
        $this->address    = $address;
        $this->diffDegree = $diffDegree;
        $this->extraInfo  = $extraInfo;
    }
    
    // default constructor    
    public function __construct()
    {
        // Builds an empty Application. 
    }

    // Setters
    function set_$user( $user )
    {
            $this->$user = $user;
            return "";
    }
    
    function set_$semester( $semester )
    {
        if (  strlen($semester) > 0 )
        {
            $this->semester = $semester;
            return "";
        }
        else
            return "class='err'";
    }  
    
    function set_year( $year )
    {
        if (  strlen($year) > 0 )
        {
            $this->year = $year;
            return "";
        }
        else
            return "class='err'";
    }  
    
    function set_dayPhone( $dayPhone )
    {
        if (  strlen($dayPhone) > 0 )
        {
            $this->dayPhone = $dayPhone;
            return "";
        }
        else
            return "class='err'";
    }  
    
    function set_evePhone( $evePhone )
    {
        if (  strlen($evePhone) > 0 )
        {
            $this->evePhone = $evePhone;
            return "";
        }
        else
            return "class='err'";
    } 
    
    public function __toString()
    {
        return '$this->user';
    }
}


?>