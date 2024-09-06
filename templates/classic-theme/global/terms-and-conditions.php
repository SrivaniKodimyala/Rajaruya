<?php
overall_header();
?>
<style>
  #titlebar {
      margin-bottom: 20px; /* Create space below titlebar */
      background-color: #f2f2f2; /* Optional: Add background color */
      padding: 10px;
    }
    
    /* Style for the container */
    .cont {
      display: flex;
      justify-content: center;
      align-items: center;
      /* min-height: 100vh; */
      padding: 10px;
    }
    
    /* Style for the content */
    .content {
      display: flex;
      flex-wrap: wrap-reverse; /* Reverse the order for smaller screens */
      justify-content: space-between;
      align-items: center;
      max-width: 1000px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 10px; /* Reduce padding */
    }

    /* Style for the left side */
    .left {
      flex: 0 0 300px; /* Fixed width for left column */
      margin-right: 30px;
    }

    /* Style for the phone image */
    .phone {
      width: 100%;
      height: 500px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .phone img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    .phone:hover img {
      transform: scale(1.1); /* Zoom effect on hover */
    }
    /* Style for the right side */
    .right {
      flex: 1; /* Take remaining space */
      margin-top: 20px; /* Space between phone and text on smaller screens */
    }

    /* Style for the right side heading */
    .right h3 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    /* Style for the right side paragraphs */
    .right p {
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 20px;
    }

    /* Style for the client information section */
    .client-info {
      margin-top: 20px;
    }

    /* Style for the section titles */
    .section-title {
      margin-bottom: 10px;
    }

    .section-title h4 {
      font-size: 20px;
    }

    /* Style for the client information paragraphs */
    .client-info p {
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 20px;
    }

    /* Style for the buttons */
    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #ff6666;
      color: #fff;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
      margin-right: 10px; /* Space between buttons */
    }

    /* Style for the margin at the bottom */
    .margin-top-70 {
      margin-top: 70px;
    }
    
    @media (max-width: 700px) {
      .content {
        flex-direction: column-reverse; /* Stack content vertically */
        padding: 10px;
      }
      .left {
        margin-right: 0;
        margin-bottom: 20px;
      }
      .phone {
        height: auto;
      }
    }

    /* Terms and conditions styles */
    .terms-container {
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .terms-container h1 {

      margin-bottom: 20px;
    }

    .terms-container p {
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .terms-container ul {
      list-style-type: disc;
      padding-left: 20px;
    }

    .terms-container ul li {
      margin-bottom: 10px;
      font-size: 16px;
    }
</style>



<div class="cont">
    <div class="content">
        <div class="terms-container">
        <h1>Terms and Conditions</h1>
            <p>Welcome to Rajasuya Engineering Solutions. These terms and conditions outline the rules and regulations for the use of Rajasuya Freelancing website, located at <a href="/" rel="noopener noreferrer">Rajasuya</a>
.</p>
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
            <p>If you have any questions about these Terms, please contact us at <a href="tel:+919666997320">+91 96669 97320</a>
.</p>
            
            <p>By using the services or accessing the website of Rajasuya Engineering Solutions, you acknowledge that you have read these terms and conditions and agree to be bound by them.</p>
        </div>
    </div>
</div>

<div class="margin-top-70"></div>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
overall_footer();
?>
