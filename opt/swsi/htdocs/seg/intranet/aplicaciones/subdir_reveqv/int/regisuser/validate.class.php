<?php
// load error handler and database configuration
require_once ('config.php');

// Class supports AJAX and PHP web form validation 
class Validate
{
  // stored database connection
  private $mMysqli;
  
  // constructor opens database connection
  function __construct()
  {
    $this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  }

  // destructor closes database connection
  function __destruct()
  {
    $this->mMysqli->close();      
  }
    
  // supports AJAX validation, verifies a single value
  public function ValidateAJAX($inputValue, $fieldID)
  {
    // check which field is being validated and perform validation
    switch($fieldID)
    {
      // Check if the username is valid
      case 'txtUsername':
        return $this->validateUserName($inputValue);
        break;
    }
  }
  
  // validates all form fields on form submit
  public function ValidatePHP()
  {
    // error flag, becomes 1 when errors are found.
    $errorsExist = 0;
    // clears the errors session flag    
    if (isset($_SESSION['errors']))
      unset($_SESSION['errors']);
    // By default all fields are considered valid
    $_SESSION['errors']['txtUsername'] = 'hidden';
   
    
    // Validate username
    if (!$this->validateUserName($_POST['txtUsername']))
    {
      $_SESSION['errors']['txtUsername'] = 'error';
      $errorsExist = 1;
    }
    
    // If no errors are found, point to a successful validation page
    if ($errorsExist == 0)
    {
      return 'allok.php';
    }
    else
    {
      // If errors are found, save current user input
      foreach ($_POST as $key => $value)
      {
        $_SESSION['values'][$key] = $_POST[$key];
      }
      return 'index.php';
    }
  }

  // validate user name (must be empty, and must not be already registered)
  private function validateUserName($value)
  {
    // trim and escape input value    
    $value = $this->mMysqli->real_escape_string(trim($value));
    // empty user name is not valid
    if ($value == null) 
      return 0; // not valid
    // check if the username exists in the database
    $query = $this->mMysqli->query('SELECT usrname FROM cat_usuarios ' .
                                   'WHERE usrname="' . $value . '"');
    if ($this->mMysqli->affected_rows > 0)
      return '0'; // not valid
    else
      return '1'; // valid
  }

}
?>
