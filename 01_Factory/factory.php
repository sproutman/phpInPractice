

<?php
// IUser and User
interface IUser
{
  function getName();
}

class User implements IUser
{
  public function __construct( $id ) { }

  public function getName()
  {
    return "Jack";
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

?>