<?php
overall_header();
?>
<style>
  body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
  }

  /* Title Bar Styles */
  #titlebar {
    background-color: #ffffff; /* Darker background color */
    color: #fff; /* White text */
    padding: 30px 0; /* Increased padding */
    margin-bottom: 20px; /* Space between title bar and content */
  }

  #titlebar h2 {
    margin: 0;
    font-size: 28px;
  }

  #breadcrumbs ul li {
    color: #bdc3c7; /* Light grey color */
    font-size: 14px;
    margin-right: 5px;
  }

  #breadcrumbs ul li a {
    color: #ecf0f1;
    text-decoration: none;
  }


  #breadcrumbs ul li:last-child:after {
    content: "";
    margin-left: 0;
  }

  .content-wrapper {
    padding: 20px;
  }

  .privacy-container {
    background-color: #fff;
    padding: 30px;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
  }

  .privacy-container h2 {
    font-size: 24px;
    color: #2c3e50;
    margin-bottom: 20px;
    border-bottom: 2px solid #e7e7e7;
    padding-bottom: 10px;
  }

  .privacy-container p {
    margin-bottom: 15px;
    font-size: 16px;
    color: #333;
  }

  .privacy-container ul {
    list-style-type: disc;
    padding-left: 20px;
    margin-bottom: 20px;
  }

  .privacy-container ul li {
    margin-bottom: 10px;
  }

  .footer {
    background-color: #2c3e50;
    color: #fff;
    padding: 10px 0;
    text-align: center;
    position: fixed;
    width: 100%;
    bottom: 0;
  }

  .footer p {
    margin: 0;
    font-size: 14px;
  }

  @media (max-width: 768px) {
    .privacy-container {
      padding: 20px;
    }

    .privacy-container h2 {
      font-size: 20px;
    }

    .privacy-container p, .privacy-container ul li {
      font-size: 14px;
    }

    #titlebar {
      padding: 20px 0;
    }

    #titlebar h2 {
      font-size: 24px;
    }
  }
</style>

<div id="titlebar" class="dark-modeforgray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="dark-modetextgray"><?php _e("Privacy Policy") ?></h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("Privacy Policy") ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="privacy-container">
        <h2>Introduction</h2>
        <p>Welcome to Rajasuya Engineering Solutions. This Privacy Policy explains how we collect, use, and share information about you when you use our website.</p>
        
        <h2>Information We Collect</h2>
        <p>We may collect the following types of information:</p>
        <ul>
            <li>Personal identification information (Name, email address, phone number, etc.)</li>
            <li>Payment information</li>
            <li>Technical data (IP address, browser type, etc.)</li>
        </ul>
        
        <h2>How We Use Your Information</h2>
        <p>Your information is used for the following purposes:</p>
        <ul>
            <li>To provide and maintain our services</li>
            <li>To process payments</li>
            <li>To communicate with you</li>
            <li>To improve our website and services</li>
        </ul>
        
        <h2>Sharing of Information</h2>
        <p>We do not share your personal information with third parties except as necessary to provide our services or as required by law.</p>
        
        <h2>Your Rights</h2>
        <p>You have the right to access, correct, or delete your personal information. You can also opt-out of receiving communications from us.</p>
        
        <h2>Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page.</p>
        
        <h2>Contact Us</h2>
        <p>If you have any questions about this Privacy Policy, please contact us at <a href="mailto:finance@rajasuya.com">finance@rajasuya.com</a> or <a href="tel:+919666997320">+91 96669 97320</a>.</p>
    </div>
</div>



<?php
overall_footer();
?>
