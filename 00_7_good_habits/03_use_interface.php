
<?php

require 'Person.php';



interface PersonProvider
{
    public function getPerson($givenName, $familyName);
}

class DBPersonProvider implements PersonProvider 
{
    public function getPerson($givenName, $familyName)
    {
        /* pretend to go to the database, get the person... */
        $person = new Person();
        $person->setPrefix("Mr.");
        $person->setGivenName("John");
        return $person;
    }
}

class PersonProviderFactory
{
    public static function createProvider($type)
    {
        if ($type == 'database')
        {
            return new DBPersonProvider();
        } else {
            return new NullProvider();
        }
    }
}

$config = 'database';
/* I need to get person data... */
$provider = PersonProviderFactory::createProvider($config);
$person = $provider->getPerson("John", "Doe");

echo($person->getPrefix());
echo($person->getGivenName());
?>