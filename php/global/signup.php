<?php
if(isset($_GET['confirm']))
{
    $check_confirm = 0;

    $check_confirm = ORM::for_table($config['db']['pre'].'user')
        ->where(array(
            'id' => $_GET['user'],
            'confirm' => $_GET['confirm']
        ))
        ->count();

    if($check_confirm)
    {
        $pdo = ORM::get_db();
        $query = "UPDATE `".$config['db']['pre']."user` SET `status` = '1', `confirm` = '' WHERE id='".mysqli_real_escape_string($mysqli,$_GET['user'])."' AND confirm='".mysqli_real_escape_string($mysqli,$_GET['confirm'])."' LIMIT 1 ";

        $pdo->query($query);


        $user_info = get_user_data(null,$_GET['user']);
        $user_email = $user_info['email'];


        message(__("Success"),__("Thanks for signing up"), 'login');
    }
    else
    {
        message(__("Error"), __('Confirmation ID does not exist or has already been used') ,'',false);
    }

    exit;
}

if(checkloggedin())
{
    header("Location: ".$config['site_url']."dashboard");
    exit;
}
// Check if this is an Name availability check from signup page using ajax

$name_field = '';
$username_field = '';
$email_field = '';
$type_error = '';
$name_error = '';
$company_name_error='';
$username_error = '';
$email_error = '';
$designation_error='';
$contact_erro='';
$password_error = '';
$recaptcha_error = '';
$gst_number_error='';

$file_error_message='';

if(isset($_POST["submit"])) {
  
    $errors = 0;
    $name_field = $_POST['name'];
    $username_field = $_POST['username'];
    $email_field = $_POST['email'];
    $name_length = strlen(utf8_decode($_POST['name']));

    if(empty($_POST["user-type"])) {
        $errors++;
        $type_error = "<span class='status-not-available'> ".__("Please select a user type.")."</span>";
    }else{
        if(!in_array($_POST["user-type"], array(1,2))){
            $errors++;
            $type_error = "<span class='status-not-available'> ".__("Invalid user type.")."</span>";
        }
    }

    if ($_POST["user-type"] == 1) {
    if(empty($_POST["name"])) {
        $errors++;
        $name_error = __("Enter your full name.");
        $name_error = "<span class='status-not-available'> ".$name_error."</span>";
    }
    elseif( ($name_length < 4) OR ($name_length > 21) )
    {
        $errors++;
        $name_error = __("Name must be between 4 and 20 characters long.");
        $name_error = "<span class='status-not-available'> ".$name_error.".</span>";
    }
    }

    if ($_POST["user-type"] == 2) {
    if(empty($_POST["company_name"])) {
        $errors++;
        $company_name_error = __("Enter Company Name.");
        $company_name_error = "<span class='status-not-available'> ".$company_name_error."</span>";
    }
    else{
        $company_count = check_companyname_exists($_POST["company_name"]);
        if($company_count>0) {
            $errors++;
            $company_name_error  = __("contact number already exists");
           $company_name_error = "<span class='status-not-available'>". $company_name_error ."</span>";
        
        }
       
       
    }
  
}
    // Check if this is an Username availability check from signup page using ajax
    if(empty($_POST["username"]))
    {
        $errors++;
        $username_error = __("Please enter an username");
        $username_error = "<span class='status-not-available'> ".$username_error."</span>";
    }
    elseif(preg_match('/[^A-Za-z0-9]/',$_POST['username']))
    {
        $errors++;
        $username_error = __("Username may only contain alphanumeric characters");
        $username_error = "<span class='status-not-available'> ".$username_error." [A-Z,a-z,0-9]</span>";
    }
    elseif( (strlen($_POST['username']) < 4) OR (strlen($_POST['username']) > 16) )
    {
        $errors++;
        $username_error = __("Username must be between 4 and 15 characters long");
        $username_error = "<span class='status-not-available'> ".$username_error.".</span>";
    }
    else{
     

        if(checkloggedin())
        {
            if($_POST["username"] != $_SESSION['user']['username'])
            {
                $user_count = check_username_exists($_POST["username"]);
                if($user_count>0) {
                    $username_error = __("Username not available");
                     $username_error = "<span class='status-not-available'>".$username_error."</span>";
                }
                else {
                    $username_error = __("Username available");
                     $username_error = "<span class='status-available'>".$username_error."</span>";
                }
            
            }
           
        }
        else{
            $user_count = check_username_exists($_POST["username"]);
            if($user_count>0) {
                $username_error = __("Username already exists");
             $username_error ="<span class='status-not-available'>".$username_error."</span>";
         
            }


    }
    }



    
    if(empty($_POST["designation"])) {
        $errors++;
        $designation_error = __("Please enter your designation.");
        $designation_error = "<span class='status-not-available'> ".$designation_error."</span>";
    } elseif(strlen($_POST["designation"]) > 50) {
        $errors++;
        $designation_error = __("Designation must be less than 50 characters.");
        $designation_error = "<span class='status-not-available'> ".$designation_error."</span>";
    }

    // Validate Contact Number (Assuming VARCHAR(15))
    if(empty($_POST["contact_number"])) {
        $errors++;
        $contact_error = __("Please enter your contact number.");
        $contact_error = "<span class='status-not-available'> ".$contact_error."</span>";
    } elseif(!preg_match('/^[0-9]{10}$/', $_POST['contact_number'])) {
        $errors++;
        $contact_error = __("Please enter a valid contact number with exactly 10 digits.");
        $contact_error = "<span class='status-not-available'> ".$contact_error."</span>";
    }
    else{
        $user_count = check_usernamecontact_exists($_POST["contact_number"]);
        if($user_count>0) {
             $contact_error  = __("contact number available");
            echo "<span class='status-not-available'>". $contact_error ."</span>";
        }
       
        
    }
 
    // Check if this is an Email availability check from signup page using ajax
    $_POST["email"] = strtolower($_POST["email"]);
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if(empty($_POST["email"])) {
        $errors++;
        $email_error = __("Please enter an email address");
        $email_error = "<span class='status-not-available'> ".$email_error."</span>";
    }
    elseif(!preg_match($regex, $_POST['email'])) {
        $errors++;
        $email_error = __("This is not a valid email address");
        $email_error = "<span class='status-not-available'> ".$email_error.".</span>";
    }
    else{
        $user_count = check_account_exists($_POST["email"]);
        if($user_count>0) {
            $errors++;
            $email_error = __("An account already exists with that e-mail address");
            $email_error = "<span class='status-not-available'>".$email_error."</span>";
        }
    }


    // Check if this is an Password availability check from signup page using ajax
    if(empty($_POST["password"])) {
        $errors++;
        $password_error = __("Please enter password");
        $password_error = "<span class='status-not-available'> ".$password_error."</span>";
    }
    elseif( (strlen($_POST['password']) < 4) OR (strlen($_POST['password']) > 21) )
    {
        $errors++;
        $password_error = __("Password must be between 4 and 20 characters long");
        $password_error = "<span class='status-not-available'> ".$password_error.".</span>";
    }



    if ($_POST["user-type"] == 2) {   
    if(empty($_POST["gst_number"])) {
        $errors++;
        $gst_number_error = __("Enter GST Number.");
        $gst_number_error = "<span class='status-not-available'> ".$gst_number_error."</span>";
    }
    else{
        $gst_number_count = check_gstnumber_exists($_POST["gst_number"]);
        if($gst_number_count>0) {
            $errors++;
            $gst_number_error  = __("contact number already exists");
            $gst_number_error  = "<span class='status-not-available'>". $gst_number_error ."</span>";
            exit;
        }
       
       
    }
    }
 
    if($config['recaptcha_mode'] == 1) {
//         echo "registerwork";
// die();
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            //your site secret key
            $secret = $config['recaptcha_private_key'];
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if (!$responseData->success) {
                $errors++;
                $recaptcha_error = __("reCAPTCHA verification failed, please try again.");
                $recaptcha_error = "<span class='status-not-available'> " . $recaptcha_error . ".</span>";
            }
        } else {
            $errors++;
            $recaptcha_error = __("Please click on the reCAPTCHA box.");
            $recaptcha_error = "<span class='status-not-available'> " . $recaptcha_error . ".</span>";
        }
    }

    //fileuploading
   
    $upload_errors = array();
    
    function upload_file($file_field, $upload_dir) {
        global $upload_errors;
    
        if(!isset($_FILES[$file_field]) || !is_uploaded_file($_FILES[$file_field]['tmp_name'])) {
            return null; // No file uploaded for this field
        }
    
        $file_name = $_FILES[$file_field]['name'];
        $file_tmp = $_FILES[$file_field]['tmp_name'];
    
        // Generate unique file name to avoid conflicts
        $new_file_name = uniqid() . '_' . $file_name;
    
        $upload_path = $upload_dir . $new_file_name;
    
        if(move_uploaded_file($file_tmp, $upload_path)) {
            return $upload_path; // Return file URL or path
        } else {
            $upload_errors[] = "Failed to upload file: " . $file_name;
            return null;
        }
    }
    

    $pan_card_url = upload_file('pan_card', 'uploads/pan_card/');
    if ($_POST["user-type"] == 1) {
    $id_card_url = upload_file('id_proof', 'uploads/id_card/');  
    }

    $gst_certificate_url = upload_file('gst_certificate', 'uploads/gst_certificate/');
    if ($_POST["user-type"] == 1) {
    $qualifications_url = upload_file('qualifications', 'uploads/qualifications/');
    $experience_certificates_url = upload_file('experience_certificates', 'uploads/experience_certificates/');
    }
    // Check for errors in file uploads
    if(!empty($upload_errors)) {
        foreach($upload_errors as $error) {
            $errors++;
            $file_error_message .= "<span class='status-not-available'> Error: " . $error . "</span><br>";
        }
    }
//fileuploadingends

if ($errors == 0) {
    // All validations passed, proceed with user registration
   
    $confirm_id = get_random_id();
    $location = getLocationInfoByIp();
    $password = $_POST["password"];
    $pass_hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 13]);
    $now = date("Y-m-d H:i:s");

    $insert_user = ORM::for_table($config['db']['pre'].'user')->create();

    $insert_user->status = '0';
    if ($_POST["user-type"] == 1) {
    $insert_user->name = $_POST["name"];
    }
    if ($_POST["user-type"] == 1) {
        $insert_user->user_type = 'user';
    } else {
        $insert_user->user_type = 'employer';
    }
    $insert_user->username = $_POST["username"];
    if ($_POST["user-type"] == 2) {
        $insert_user->name = $_POST["company_name"];
    $insert_user->company_name = $_POST["company_name"];
    $insert_user->gst_number = $_POST["gst_number"];
    $insert_user->membershipplan_id = '1';
    }
    $insert_user->password_hash = $pass_hash;
    $insert_user->email = $_POST['email'];

      
    
  
    $insert_user->confirm = $confirm_id;
    $insert_user->contact = $_POST['contact_number'];
    $insert_user->designation = $_POST['designation']; // corrected typo "desgination" to "designation"
    $insert_user->created_at = $now;
    $insert_user->updated_at = $now;
    $insert_user->country = $location['country'];
    $insert_user->country_code = $location['countryCode'];
    $insert_user->city = $location['city'];

    if ($_POST["user-type"] == 2) {
    $insert_user->about_company = $_POST['about_company'];
    }
    // Set URLs for uploaded files
    $insert_user->pan_card = $pan_card_url;
    if ($_POST["user-type"] == 1) {
    $insert_user->id_proof = $id_card_url;
    }
    $insert_user->gst_certificate= $gst_certificate_url;
    if ($_POST["user-type"] == 1) {
    $insert_user->qualifications= $qualifications_url;
    $insert_user->experience_certificate= $experience_certificates_url;
    }
    $insert_user->save();

    // Check if data was inserted
    $user_id = $insert_user->id();
    if ($user_id) {
 
      
        email_template("signup_confirm", $user_id);

   
        email_template("signup_details", $user_id, $password);


        $loggedin = userlogin($_POST['username'], $_POST['password']);
        create_user_session($loggedin['id'], $loggedin['username'], $loggedin['password'], $loggedin['user_type']);


        message(__("Welcome"), __("Welcome to our site. Get experience to post free job jobs. Thanks"), 'dashboard', false);
        exit;
    } else {

        echo "Failed to insert user data into the database.";

    }
}

}

//Print Template
HtmlTemplate::display('global/signup', array(
    'name_field' => $name_field,
    'username_field' => $username_field,
    'email_field' => $email_field,
    'type_error' => $type_error,
    'name_error' => $name_error,
    'username_error' => $username_error,
    'email_error' => $email_error,
    'password_error' => $password_error,
    'recaptcha_error' => $recaptcha_error
));
exit;
