<?php
// enable PHP session
if(!isset($_SESSION)) session_start();

// Build HTML <option> tags
function buildOptions($options, $selectedOption)
{
  foreach ($options as $value => $text)
  {
    if ($value == $selectedOption)
    {
      echo '<option value="' . $value . 
           '" selected="selected">' . $text . '</option>';
    }
    else
    {
      echo '<option value="' . $value . '">' . $text . '</option>';
    }
  }
}




// initialize some session variables to prevent PHP throwing Notices
if (!isset($_SESSION['values']))
{
  $_SESSION['values']['txtUsername'] = '';
 
}
if (!isset($_SESSION['errors']))
{
  $_SESSION['errors']['txtUsername'] = 'hidden';
 
}
?>
