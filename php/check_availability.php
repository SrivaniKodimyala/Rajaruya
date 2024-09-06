<?php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH."/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_'.$config['lang'].'.php';

sec_session_start();

// Check if this is an Name availability check from signup page using ajax
if(isset($_POST["name"])) {
    if(empty($_POST["name"])) {
        $name_error = __("Enter your full name.");
        echo "<span class='status-not-available'> ".$name_error."</span>";
        exit;
    }

    $name_length = strlen(utf8_decode($_POST['name']));
    if( ($name_length < 4) OR ($name_length > 21) )
    {
        $name_error = __("Name must be between 4 and 20 characters long.");
        echo "<span class='status-not-available'> ".$name_error.".</span>";
        exit;
    }
    else{
        echo "<span class='status-available'>".__("Success")."</span>";
        exit;
    }
}

if(isset($_POST["company_name"])) {


    if(empty($_POST["company_name"])) {
        $company_name_error = __("Enter Company name");
        echo "<span class='status-not-available'> ".$company_name_error."</span>";
        exit;
    } else{
        $company_count = check_companyname_exists($_POST["company_name"]);
        if($company_count>0) {
            $company_name_error  = __("contact number already exists");
            echo "<span class='status-not-available'>". $company_name_error ."</span>";
            exit;
        }
       
       
    }
    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
    
}


if(isset($_POST["gst_number"])) {
    if(empty($_POST["gst_number"])) {
        $gst_number_error = __("Enter Gst Number");
        echo "<span class='status-not-available'> ".$gst_number_error."</span>";
        exit;
    }
    else{
        $gst_number_count = check_gstnumber_exists($_POST["gst_number"]);
        if($gst_number_count>0) {
            $gst_number_error  = __("contact number already exists");
            echo "<span class='status-not-available'>". $gst_number_error ."</span>";
            exit;
        }
       
       
    }
    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
    
}

// Check if this is a Designation availability check from signup page using ajax
if(isset($_POST["designation"])) {
    if(empty($_POST["designation"])) {
        $designation_error = __("Please enter your designation");
        echo "<span class='status-not-available'> ".$designation_error."</span>";
        exit;
    }
    // Additional validation rules can be added as needed
    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
}


if(isset($_POST["contact_number"])) {
    if(empty($_POST["contact_number"])) {
        $contact_number_error = __("Please enter your contact number");
        echo "<span class='status-not-available'> ".$contact_number_error."</span>";
        exit;
    }elseif(!preg_match('/^[0-9]{10}$/', $_POST['contact_number'])) {
        $contact_number_error = __("Please enter a valid contact number with exactly 10 digits.");
        echo "<span class='status-not-available'> ".$contact_number_error."</span>";
        exit;
    }
else{
    $user_count = check_usernamecontact_exists($_POST["contact_number"]);
    if($user_count>0) {
        $contact_error  = __("contact number already exists");
        echo "<span class='status-not-available'>". $contact_error ."</span>";
        exit;
    }
   
    
}
echo "<span class='status-available'>".__("Success")."</span>";
    exit;
}

// Check if this is a PAN Card file upload validation from signup page using ajax
if(isset($_FILES["pan_card"])) {
    $allowed_extensions = array('pdf', 'jpg', 'jpeg', 'png');
    $file_extension = pathinfo($_FILES['pan_card']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($file_extension), $allowed_extensions)) {
        $pan_card_error = __("Invalid file format. Allowed formats: PDF, JPG, JPEG, PNG");
        echo "<span class='status-not-available'> ".$pan_card_error."</span>";
        exit;
    }

    if($_FILES['pan_card']['size'] > 5242880) { // 5MB in bytes
        $pan_card_error = __("File size exceeds the limit of 5MB");
        echo "<span class='status-not-available'> ".$pan_card_error."</span>";
        exit;
    }

    // Handle file upload and storage securely
    // Example: move_uploaded_file($_FILES['pan_card']['tmp_name'], $upload_directory . $_FILES['pan_card']['name']);

    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
}

// Check if this is an ID Proof file upload validation from signup page using ajax
if(isset($_FILES["id_proof"])) {
    $allowed_extensions = array('pdf', 'jpg', 'jpeg', 'png');
    $file_extension = pathinfo($_FILES['id_proof']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($file_extension), $allowed_extensions)) {
        $id_proof_error = __("Invalid file format. Allowed formats: PDF, JPG, JPEG, PNG");
        echo "<span class='status-not-available'> ".$id_proof_error."</span>";
        exit;
    }

    if($_FILES['id_proof']['size'] > 5242880) { // 5MB in bytes
        $id_proof_error = __("File size exceeds the limit of 5MB");
        echo "<span class='status-not-available'> ".$id_proof_error."</span>";
        exit;
    }

    // Handle file upload and storage securely
    // Example: move_uploaded_file($_FILES['id_proof']['tmp_name'], $upload_directory . $_FILES['id_proof']['name']);

    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
}

// Check if this is a GST Certificate file upload validation from signup page using ajax
if(isset($_FILES["gst_certificate"])) {
    $allowed_extensions = array('pdf', 'jpg', 'jpeg', 'png');
    $file_extension = pathinfo($_FILES['gst_certificate']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($file_extension), $allowed_extensions)) {
        $gst_certificate_error = __("Invalid file format. Allowed formats: PDF, JPG, JPEG, PNG");
        echo "<span class='status-not-available'> ".$gst_certificate_error."</span>";
        exit;
    }

    if($_FILES['gst_certificate']['size'] > 5242880) { // 5MB in bytes
        $gst_certificate_error = __("File size exceeds the limit of 5MB");
        echo "<span class='status-not-available'> ".$gst_certificate_error."</span>";
        exit;
    }

    // Handle file upload and storage securely
    // Example: move_uploaded_file($_FILES['gst_certificate']['tmp_name'], $upload_directory . $_FILES['gst_certificate']['name']);

    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
}

// Check if this is a Qualifications file upload validation from signup page using ajax
if(isset($_FILES["qualifications"])) {
    $allowed_extensions = array('pdf', 'jpg', 'jpeg', 'png');
    $file_extension = pathinfo($_FILES['qualifications']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($file_extension), $allowed_extensions)) {
        $qualifications_error = __("Invalid file format. Allowed formats: PDF, JPG, JPEG, PNG");
        echo "<span class='status-not-available'> ".$qualifications_error."</span>";
        exit;
    }

    if($_FILES['qualifications']['size'] > 5242880) { // 5MB in bytes
        $qualifications_error = __("File size exceeds the limit of 5MB");
        echo "<span class='status-not-available'> ".$qualifications_error."</span>";
        exit;
    }

    // Handle file upload and storage securely
    // Example: move_uploaded_file($_FILES['qualifications']['tmp_name'], $upload_directory . $_FILES['qualifications']['name']);

    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
}

// Check if this is an Experience Certificates file upload validation from signup page using ajax
if(isset($_FILES["experience_certificates"])) {
    $allowed_extensions = array('pdf', 'jpg', 'jpeg', 'png');
    $file_extension = pathinfo($_FILES['experience_certificates']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($file_extension), $allowed_extensions)) {
        $experience_certificates_error = __("Invalid file format. Allowed formats: PDF, JPG, JPEG, PNG");
        echo "<span class='status-not-available'> ".$experience_certificates_error."</span>";
        exit;
    }

    if($_FILES['experience_certificates']['size'] > 5242880) { // 5MB in bytes
        $experience_certificates_error = __("File size exceeds the limit of 5MB");
        echo "<span class='status-not-available'> ".$experience_certificates_error."</span>";
        exit;
    }

    // Handle file upload and storage securely
    // Example: move_uploaded_file($_FILES['experience_certificates']['tmp_name'], $upload_directory . $_FILES['experience_certificates']['name']);

    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
}

// Check if this is an Username availability check from signup page using ajax
if(isset($_POST["username"])) {

    if(empty($_POST["username"])) {
        $username_error = __("Please enter an username");
        echo "<span class='status-not-available'> ".$username_error."</span>";
        exit;
    }

    if(preg_match('/[^A-Za-z0-9]/',$_POST['username']))
    {
        $username_error = __("Username may only contain alphanumeric characters");
        echo "<span class='status-not-available'> ".$username_error." [A-Z,a-z,0-9]</span>";
        exit;
    }
    elseif( (strlen($_POST['username']) < 4) OR (strlen($_POST['username']) > 16) )
    {
        $username_error = __("Username must be between 4 and 15 characters long");
        echo "<span class='status-not-available'> ".$username_error.".</span>";
        exit;
    }
    else
    {
        if(checkloggedin())
        {
            if($_POST["username"] != $_SESSION['user']['username'])
            {
                $user_count = check_username_exists($_POST["username"]);
                if($user_count>0) {
                    $username_error = __("Username not available");
                    echo "<span class='status-not-available'>".$username_error."</span>";
                }
                else {
                    $username_error = __("Username available");
                    echo "<span class='status-available'>".$username_error."</span>";
                }
                exit;
            }
            else{
                echo "<span class='status-available'>".__("Success")."</span>";
                exit;
            }
        }
        else{
            $user_count = check_username_exists($_POST["username"]);
            if($user_count>0) {
                $username_error = __("Username already exists");
                echo "<span class='status-not-available'>".$username_error."</span>";
                exit;
            }
           
        }
        echo "<span class='status-available'>".__("Success")."</span>";
        exit;
    }
}

// Check if this is an Email availability check from signup page using ajax
if(isset($_POST["email"])) {
    $_POST['email'] = strtolower($_POST['email']);

    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if(empty($_POST["email"])) {
        $email_error = __("Please enter an email address");
        echo "<span class='status-not-available'> ".$email_error."</span>";
        exit;
    }
    elseif(!preg_match($regex, $_POST['email']))
    {
        $email_error = __("This is not a valid email address");
        echo "<span class='status-not-available'> ".$email_error.".</span>";
        exit;
    }

    if(checkloggedin())
    {
        $ses_userdata = get_user_data($_SESSION['user']['username']);
        if($_POST["email"] != $ses_userdata['email'])
        {
            $user_count = check_account_exists($_POST["email"]);
            if($user_count>0) {
                $email_error = __("An account already exists with that e-mail address");
                echo "<span class='status-not-available'>".$email_error."</span>";
            }
            else {
                $email_error = __("Email address is Available");
                echo "<span class='status-available'>".$email_error."</span>";
            }
            exit;
        }else{
            echo "<span class='status-available'>".__("Success")."</span>";
            exit;
        }
    }
    else{
        $user_count = check_account_exists($_POST["email"]);
        if($user_count>0) {
            $email_error = __("An account already exists with that e-mail address");
            echo "<span class='status-not-available'>".$email_error."</span>";
            exit;
        }
      
    }
    echo "<span class='status-available'>".__("Success")."</span>";
    exit;
}

// Check if this is an Password availability check from signup page using ajax
if(isset($_POST["password"])) {

    if(empty($_POST["password"])) {
        $password_error = __("Please enter password");
        echo "<span class='status-not-available'> ".$password_error."</span>";
        exit;
    }
    elseif( (strlen($_POST['password']) < 5) OR (strlen($_POST['password']) > 21) )
    {
        $password_error = __("Password must be between 4 and 20 characters long");
        echo "<span class='status-not-available'> ".__("Password must be between 4 and 20 characters long").".</span>";
        exit;
    }
    else{
        echo "<span class='status-available'>".__("Success")."</span>";
        exit;
    }

}

?>
