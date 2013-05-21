

<?php

class AddressUtils
{
    public static function formatAddress($formatType, $address1, 
        $address2, $city, $state)
    {
        return "some address string";
    }
    
    public static function parseAddress($formatType, $val)
    {
        // real implementation would set values, etc...
        return new Address();
    }
    
}

class PersonUtils
{
    public static function formatPersonName($formatType, $givenName, 
        $familyName)
    {
        return "some person name";
    }
    
    public static function parsePersonName($formatType, $val)
    {
        // real implementation would set values, etc...
        return new PersonName();
    }
}

?>