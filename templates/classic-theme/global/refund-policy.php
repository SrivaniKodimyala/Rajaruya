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

  .refund-container {
    background-color: #fff;
    padding: 30px;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
  }

  .refund-container h2 {
    font-size: 24px;
    color: #2c3e50;
    margin-bottom: 20px;
    border-bottom: 2px solid #e7e7e7;
    padding-bottom: 10px;
  }

  .refund-container p {
    margin-bottom: 15px;
    font-size: 16px;
    color: #333;
  }

  .refund-container ul {
    list-style-type: disc;
    padding-left: 20px;
    margin-bottom: 20px;
  }

  .refund-container ul li {
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
    .refund-container {
      padding: 20px;
    }

    .refund-container h2 {
      font-size: 20px;
    }

    .refund-container p, .refund-container ul li {
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
                <h2 class="dark-modetextgray"><?php _e("Refund Policy") ?></h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("Refund Policy") ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="refund-container">
        <h2>Refund Policy</h2>
        <p>Welcome to Rajasuya Engineering Solutions. We are committed to delivering high-quality engineering freelance services. Please be advised that all payments for our services are non-refundable. By engaging our services, you agree to the following terms:</p>

        <h2>No Refunds</h2>
        <p>We do not offer refunds for any services provided. Once payment is made, it is considered final and non-refundable. This includes:</p>
        <ul>
            <li>Prepaid services, regardless of the project's status.</li>
            <li>Completed projects, including those marked as completed and accepted by the client.</li>
            <li>Partial payments for ongoing projects.</li>
        </ul>

        <h2>Contact Us</h2>
        <p>If you have any questions or need further information regarding our services or payment policies, please contact us at <a href="mailto:finance@rajasuya.com">finance@rajasuya.com</a> or call <a href="tel:+919666997320">+91 96669 97320</a>.</p>
    </div>
</div>

<?php
overall_footer();
?>
