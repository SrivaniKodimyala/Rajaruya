<?php
overall_header(__("Register"));
?>
<style>
    /* .form-label.required::after {
        content: '*';
        color: red;
        margin-left: 4px; 
    } */
    body {
            font-family: Arial, sans-serif;
        }

      

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .required::after {
            content: " *";
            color: red;
        }

        .input-text {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-with-icon-left {
            position: relative;
        }

     
        .input-with-icon-left .fa {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .custom-file-input {
            display: none;
        }

        .custom-file-label {
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #20C997;
            color: #fff;
            border: 1px solid #20C997;
            border-radius: 4px;
            text-align: center;
        }

        .custom-file-label i {
            margin-right: 8px;
        }


/* Modal container */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black with opacity */
}

/* Modal content */
.modal-content-signup {
    background-color: #fff;
    margin: 10% auto; /* 10% from the top and centered */
    padding: 20px;
    border: 1px solid #ccc;
    width: 80%; /* Could be more or less, depending on screen size */
    max-width: 700px; /* Max width for larger screens */
    border-radius: 10px;
    position: relative;
    max-height: 50vh; /* Maximum height of 80% of viewport height */
    overflow-y: auto; /* Enable vertical scroll if content exceeds modal height */
}

/* Close button */
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

.close:hover {
    color: #555;
}

/* Terms and conditions container */
.terms-container {
    line-height: 1.6;
}

/* Styling for headings and paragraphs */
.terms-container h1, .terms-container h3 {
    color: #333;
}

.terms-container p {
    margin-bottom: 10px;
}

.terms-container ul {
    margin-bottom: 10px;
}

.terms-container ul li {
    list-style-type: disc;
    margin-left: 20px;
}



</style>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2><?php _e("Register") ?></h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("Register") ?></li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="login-register-page">
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3 style="font-size: 26px;"><?php _e("Let's create your account!") ?></h3>
                    <span><?php _e("Already have an account?") ?> <a href="<?php url("LOGIN") ?>"><?php _e("Log In!") ?></a></span>
                </div>
                <?php if($config['facebook_app_id'] != "" && $config['google_app_id'] != ""){ ?>
                <div class="social-login-buttons">
                    <?php if($config['facebook_app_id'] != ""){ ?>
                    <button class="facebook-login ripple-effect" onclick="fblogin()"><i class="fa fa-facebook"></i> <?php _e("Log In via Facebook") ?>
                    </button>
                    <?php } ?>

                    <?php if($config['google_app_id'] != ""){ ?>
                    <button class="google-login ripple-effect" onclick="gmlogin()"><i class="fa fa-google"></i> <?php _e("Log In via Google") ?>
                    </button>
                    <?php } ?>
                </div>
                <div class="social-login-separator"><span><?php _e("or") ?></span></div>
                <?php } ?>
                <form method="post" id="register-account-form" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                    <!-- Account Type -->
                    <div class="account-type">
                       
                        <div>
                            <input type="radio" name="user-type" id="employer-radio" class="account-type-radio" value="2" checked required/>
                            <label for="employer-radio" class="ripple-effect-dark"><i class="la la-suitcase"></i> <?php _e("Employer") ?></label
                            >
                        </div>
                    </div>
                    <span id="type-status"><?php if($type_error != ""){ _esc($type_error) ; }?></span>

                    <div class="row">
                        
                       

                        <div class="form-group col-md-4 employer-fields">
                            <span class="form-label required"><?php _e("Company Name") ?></span>
                            <div class="input-with-icon-left">
                                <i class="la la-user"></i>
                                <input type="text" class="input-text with-border" placeholder="<?php _e("Company Name") ?>" value="<?php _esc($company_field)?>" id="company_name" name="company_name" onBlur="checkAvailabilityCompanyName()"/>
                            </div>
                            <span id="company_name-availability-status"><?php if($company_name_error != ""){ _esc($company_name_error) ; }?></span>
                        </div>


                     

                        <!-- Designation -->
                        <div class="form-group col-md-4">
                            <span class="form-label required"><?php _e("Designation") ?></span>
                            <div class="input-with-icon-left">
                                <i class="la la-briefcase"></i>
                                <input type="text" class="input-text with-border" placeholder="<?php _e("Designation") ?>" value="<?php _esc($designation_field)?>" id="designation" onBlur="checkAvailabilityDesignation()" name="designation" />
                            </div>

                            <span id="designation-availability-status"><?php if($name_error != ""){ _esc($name_error) ; }?></span>
                        </div>

                        <!-- Contact Number -->
                        <div class="form-group col-md-4">
                            <span class="form-label required"><?php _e("Contact Number") ?></span>
                            <div class="input-with-icon-left">
                                <i class="la la-phone"></i>
                                <input type="text" class="input-text with-border" placeholder="<?php _e("Contact Number") ?>" value="<?php _esc($contact_number_field)?>" id="contact_number" onBlur="checkAvailabilityContact()" name="contact_number" required/>
                            </div>
                      
                        <span id="contact_number-availability-status"><?php if($contact_error != ""){ _esc($contact_error) ; }?></span>
                    </div>
                    </div>
                    <div class="row">
                        <!-- Email Address -->
                        <div class="form-group col-md-4">
                            <span class="form-label required"><?php _e("Email Address") ?></span>
                            <div class="input-with-icon-left">
                                <i class="la la-envelope"></i>
                                <input type="text" class="input-text with-border" placeholder="<?php _e("Email Address") ?>" value="<?php _esc($email_field)?>" name="email" id="email" onBlur="checkAvailabilityEmail()" required/>
                            </div>
                            <span id="email-availability-status"><?php if($email_error != ""){ _esc($email_error) ; }?></span>
                        </div>

                        <!-- Username -->
                        <div class="form-group col-md-4">
                            <span class="form-label required"><?php _e("Username") ?></span>
                            <div class="input-with-icon-left">
                                <i class="la la-user"></i>
                                <input type="text" class="input-text with-border" placeholder="<?php _e("Username") ?>" value="<?php _esc($username_field)?>" id="Rusername" name="username" onBlur="checkAvailabilityUsername()" required/>
                            </div>
                            <span id="user-availability-status"><?php if($username_error != ""){ _esc($username_error) ; }?></span>
                        </div>

                        <!-- Password -->
                        <div class="form-group col-md-4">
                            <span class="form-label required"><?php _e("Password") ?></span>
                            <div class="input-with-icon-left">
                                <i class="la la-unlock"></i>
                                <input type="password" class="input-text with-border" placeholder="<?php _e("Password") ?>" id="Rpassword" name="password" onBlur="checkAvailabilityPassword()" required/>
                            </div>
                            <span id="password-availability-status"><?php if($password_error != ""){ _esc($password_error) ; }?></span>
                        </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-md-4 employer-fields">
                            <span class="form-label required"><?php _e("GST Number") ?></span>
                            <div class="input-with-icon-left">
                                <i class="la la-user"></i>
                                <input type="text" class="input-text with-border" placeholder="<?php _e("GST Number") ?>" value="<?php _esc($gst_number_field)?>" id="gst_number" name="gst_number" onBlur="checkAvailabilityGstNumber()"/>
                            </div>
                            <span id="gst_number-availability-status"><?php if($gst_number_error != ""){ _esc($gst_number_error) ; }?></span>
                        </div>


                        <div class="form-group col-md-8 employer-fields">
        <span class="form-label"><?php _e("About Company") ?></span>
        <textarea class="input-text with-border" placeholder="<?php _e("Tell us about your company") ?>" id="about_company" name="about_company"><?php _esc($about_company_field) ?></textarea>
    </div>
                    </div>

                    <div class="row">
                        <!-- PAN Card -->
                        <div class="form-group col-md-4">
                            <span class="form-label required"><?php _e("PAN Card") ?></span>
                          
                                <input type="file" class="custom-file-input" name="pan_card" onBlur="checkAvailabilityPanCard()" id="pan_card">
                <label for="pan_card" class="custom-file-label">
                    <i class="fa fa-upload"></i> Choose file
                </label>

                           

                            <span id="pan_card-availability-status"><?php if($pan_card_error != ""){ _esc($pan_card_error) ; }?></span>
                        </div>

                       
                    <div class="form-group col-md-4">
                            <span class="form-label required"><?php _e("GST Certificate") ?></span>
                       
                                
                                <input type="file" class="custom-file-input" name="gst_certificate" onBlur="checkAvailabilityGst()" id="gst_certificate"/>
                <label for="gst_certificate" class="custom-file-label">
                    <i class="fa fa-upload"></i> Choose file
                </label>

                            <span id="gst_certificate-availability-status"><?php if($gst_certificate_error != ""){ _esc($gst_certificate_error) ; }?></span>
                        </div>

                    </div>
                    <div class="row">
                        <!-- GST Certificate -->
                     


                  
                    </div>
                    <!-- Experience Certificates -->
                   

                    <!-- ReCaptcha -->
                    <div class="form-group">
                        <div class="text-center">
                            <?php
                            if($config['recaptcha_mode'] == '1'){
                                echo '<div class="g-recaptcha" data-sitekey="'._esc($config['recaptcha_public_key'],false).'"></div>';
                            }
                            ?>
                        </div>
                        <span><?php if($recaptcha_error != ""){ _esc($recaptcha_error) ; }?></span>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="checkbox">
                        <input type="checkbox" id="agree_for_term" name="agree_for_term" value="1" required>
                        <label for="agree_for_term">
    <span class="checkbox-icon"></span>
    <?php _e("By clicking on Register button you are agree to our") ?>
    <a href="#" id="openModal">
        <?php _e("Terms & Condition") ?>
    </a>
</label>
<!-- The Modal -->
<!-- Modal -->
<div id="termsModal" class="modal">
    <div class="modal-content-signup">
        <span class="close">&times;</span>
        <div class="terms-container">
            <h1>Terms and Conditions</h1>
            <p>Welcome to Rajasuya Engineering Solutions. These terms and conditions outline the rules and regulations for the use of Rajasuya Freelancing website, located at [https://rajasuya.com].</p>
            <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use Rajasuya Engineering Solutions if you do not agree to take all of the terms and conditions stated on this page.</p>
            
            <h3>Changes to Terms</h3>
            <p>Rajasuya Engineering Solutions reserves the right to revise these terms at any time. By using this website, you are expected to review these terms regularly.</p>
            
            <h3>User Responsibilities</h3>
            <p>Users are responsible for maintaining the confidentiality of their account and password. You agree to accept responsibility for all activities that occur under your account or password. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>
            
            <h3>Intellectual Property Rights</h3>
            <p>Unless otherwise stated, Rajasuya Engineering Solutions and/or its licensors own the intellectual property rights for all material on Rajasuya Engineering Solutions. All intellectual property rights are reserved. You may access this from Rajasuya Engineering Solutions for your own personal use subjected to restrictions set in these terms and conditions.</p>
            
            <h3>Prohibited Activities</h3>
            <ul>
                <li>Publishing any website material in any other media without prior permission</li>
                <li>Engaging in data mining</li>
                <li>Using this website in any way that is or may be damaging to this website</li>
                <li>Using this website contrary to applicable laws and regulations</li>
            </ul>
            
            <h3>Duration to Show Featured Badge</h3>
            <p>The duration to show a featured badge on Rajasuya Freelancing website is specified in days. This means the length of time, measured in days, that an item or profile will display a "Featured" badge.</p>
            
            <h3>Payment Terms</h3>
            <p>All payments are processed securely through our payment gateways. Payments for services must be completed as per the agreed terms. Failure to make timely payments may result in suspension or termination of services.</p>
            
            <h3>Termination</h3>
            <p>We may terminate or suspend access to our website immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the terms.</p>
            
            <h3>Limitation of Liability</h3>
            <p>In no event shall Rajasuya Engineering Solutions, nor any of its officers, directors, and employees, be held liable for anything arising out of or in any way connected with your use of this website whether such liability is under contract. Rajasuya Engineering Solutions, including its officers, directors, and employees shall not be held liable for any indirect, consequential, or special liability arising out of or in any way related to your use of this website.</p>
            
            <h3>Governing Law</h3>
            <p>These terms and conditions are governed by and construed in accordance with the laws of India, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>
            
            <h3>Contact Information</h3>
            <p>If you have any questions about these Terms, please contact us at [Contact Information].</p>
            
            <p>By using the services or accessing the website of Rajasuya Engineering Solutions, you acknowledge that you have read these terms and conditions and agree to be bound by them.</p>
        </div>
    </div>
</div>            </div>

                    <!-- Submit Button -->
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" name="submit" type="submit"><?php _e("Register") ?> <i class="icon-feather-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="margin-top-70"></div>

<script>
    // Toggle visibility based on user type selection
    $(document).ready(function() {
        $('input[name="user-type"]').change(function() {
            if (this.value == '1') {
                $('.freelancer-fields').show();
                $('.employer-fields').hide();
            } else if (this.value == '2') {
                $('.freelancer-fields').hide();
                $('.employer-fields').show();
            }
        });
    });
</script>
<script>
        document.querySelectorAll('.custom-file-input').forEach(input => {
            input.addEventListener('change', function () {
                const label = this.nextElementSibling;
                const fileName = this.files[0] ? this.files[0].name : 'Choose file';
                label.innerHTML = '<i class="fa fa-upload"></i> ' + fileName;
            });
        });
    </script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>

    var error = "";

    function checkAvailabilityName() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'name=' + $("#name").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#name").removeClass('has-success');
                    $("#name-availability-status").html(data);
                    $("#name").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#name").removeClass('has-error mar-zero');
                    $("#name-availability-status").html("");
                    $("#name").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

    
    function checkAvailabilityCompanyName() {
      console.log($("#company_name").val());
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'company_name=' + $("#company_name").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#company_name").removeClass('has-success');
                    $("#company_name-availability-status").html(data);
                    $("#company_name").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#company_name").removeClass('has-error mar-zero');
                    $("#company_name-availability-status").html("");
                    $("#company_name").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

    function checkAvailabilityGstNumber() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'gst_number=' + $("#gst_number").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#gst_number").removeClass('has-success');
                    $("#gst_number-availability-status").html(data);
                    $("#gst_number").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#gst_number").removeClass('has-error mar-zero');
                    $("#gst_number-availability-status").html("");
                    $("#gst_number").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityDesignation() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'designation=' + $("#designation").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#designation").removeClass('has-success');
                    $("#designation-availability-status").html(data);
                    $("#designation").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#designation").removeClass('has-error mar-zero');
                    $("#designation-availability-status").html("");
                    $("#designation").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

    function checkAvailabilityContact() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'contact_number=' + $("#contact_number").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#contact_number").removeClass('has-success');
                    $("#contact_number-availability-status").html(data);
                    $("#contact_number").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#contact_number").removeClass('has-error mar-zero');
                    $("#contact_number-availability-status").html("");
                    $("#contact_number").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

    function checkAvailabilityPanCard() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'pan_card=' + $("#pan_card").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#pan_card").removeClass('has-success');
                    $("#pan_card-availability-status").html(data);
                    $("#pan_card").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#pan_card").removeClass('has-error mar-zero');
                    $("#pan_card-availability-status").html("");
                    $("#pan_card").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityIdProof() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'id_proof=' + $("#id_proof").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#id_proof").removeClass('has-success');
                    $("#id_proof-availability-status").html(data);
                    $("#id_proof").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#id_proof").removeClass('has-error mar-zero');
                    $("#id_proof-availability-status").html("");
                    $("#id_proof").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityGst() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'gst_certifcate=' + $("#gst_certificate").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#gst_certificate").removeClass('has-success');
                    $("#gst_certificate-availability-status").html(data);
                    $("#gst_certificate").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#gst_certificate").removeClass('has-error mar-zero');
                    $("#gst_certificate-availability-status").html("");
                    $("#gst_certificate").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityQualifications() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'qualifications=' + $("#qualifications").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#qualifications").removeClass('has-success');
                    $("#qualifications-availability-status").html(data);
                    $("#qualifications").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#qualifications").removeClass('has-error mar-zero');
                    $("#qualifications-availability-status").html("");
                    $("#qualifications").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

    function checkAvailabilityExpr() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'experience_certificates=' + $("#experience_certificates").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#experience_certificates").removeClass('has-success');
                    $("#experience_certificates-availability-status").html(data);
                    $("#experience_certificates").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#experience_certificates").removeClass('has-error mar-zero');
                    $("#experience_certificates-availability-status").html("");
                    $("#experience_certificates").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityUsername() {
        var $item = $("#Rusername").closest('.form-group');
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'username=' + $("#Rusername").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $item.removeClass('has-success');
                    $("#user-availability-status").html(data);
                    $item.addClass('has-error');
                }
                else {
                    error = 0;
                    $item.removeClass('has-error');
                    $("#user-availability-status").html("");
                    $item.addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityEmail() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#email").removeClass('has-success');
                    $("#email-availability-status").html(data);
                    $("#email").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#email").removeClass('has-error mar-zero');
                    $("#email-availability-status").html("");
                    $("#email").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityPassword() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'password=' + $("#Rpassword").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#Rpassword").removeClass('has-success');
                    $("#password-availability-status").html(data);
                    $("#Rpassword").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#Rpassword").removeClass('has-error mar-zero');
                    $("#password-availability-status").html("");
                    $("#Rpassword").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }


$(document).ready(function() {
    var modal = $("#termsModal");
    var btn = $("#openModal");
    var span = $(".close");

    btn.click(function() {
        modal.show();
        // $(".modal-content").slideDown();
    });

    span.click(function() {
        
            modal.hide();
       
    });

    $(window).click(function(event) {
        if ($(event.target).is(modal)) {
           
                modal.hide();
       
        }
    });
});
</script>
<?php
overall_footer();