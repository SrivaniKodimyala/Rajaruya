<?php 


$selected = "";
if(isset($_GET['cat']) && !empty($_GET['cat'])){
    $selected = $_GET['cat'];
}
// Check Settings For quotes
$GetCategory = get_maincategory('default',$selected);
$cat_dropdown = get_categories_dropdown();


// Ensure ORM is included and configured correctly
// Example: require_once 'path/to/your/ORM.php';

if(isset($_POST['submit']))
{

        /*SEND REPORT EMAIL TO ADMIN*/
        email_template("inquiry");

        message(__("Thanks"),__("Thank you for contacting us."));
  

}



HtmlTemplate::display('global/inquiry', array(
   
    'category' => $GetCategory,
    'cat_dropdown' => $cat_dropdown
));

?>