

<?php
// IUser and User
interface IUser
{    
  function getName();
  
  function showName();
}

class User implements IUser
{
  public function __construct( $id ) { }

  public function getName()
  {
    return "Jack";
  }

    public function showName()
  {
      return "baby";
  }
}

// UserFactory
class UserFactory
{
  public static function Create( $id )
  {
    return new User( $id );
  }
}

// Test code
$uo = UserFactory::Create( 1 );
echo( $uo->getName()."\n" );
echo( $uo->showName()."\n" );
?>