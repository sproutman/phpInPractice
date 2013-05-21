<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author Administrator
 */
class Person
{
    private $prefix;
    private $givenName;
    private $familyName;
    private $suffix;
    
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }
    
    public function getPrefix()
    {
        return $this->prefix;
    }
    
    public function setGivenName($gn)
    {
        $this->givenName = $gn;
    }
    
    public function getGivenName()
    {
        return $this->givenName;
    }
    
    public function setFamilyName($fn)
    {
        $this->familyName = $fn;
    }
    
    public function getFamilyName() 
    {
        return $this->familyName;
    }
    
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }
    
    public function getSuffix()
    {
        return $suffix;
    }
    
}

?>
