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

    #titlebar h1, #titlebar h2 {
margin-top:30px !important;
    }
</style>


<!-- Titlebar -->
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="dark-modetextgray"><?php _e("Partner") ?></h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("Partner") ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="cont">
    <div class="content">
        <div class="left">
            <div class="phone">
                <img src="<?php echo _esc($config['site_url']); ?>storage/partner.jpg" alt="Partner Image">
            </div>
        </div>
        <div class="right">
        <h3><?php _e("Join Us as a Partner") ?></h3>
                    <p><?php _e("Use your time wisely by working with renowned infrastructure companies across India. Whether you are an individual freelancer, a consultancy firm, an SME, or an MNC, join Rajasuya Engineering Solutions. Whether you're a subcontractor or an HR consultant, become a part of our team and enjoy a professional and fulfilling career. We will handle your business development and billing needs. Welcome aboard.") ?></p>
                   

                    <a href="<?php url("LOGIN") ?>" class="button button-sliding-icon ripple-effect"><?php _e("Log In") ?> <i class="icon-material-outline-arrow-right-alt"></i></a>
                <a href="<?php url("SIGNUP") ?>" class="button button-sliding-icon ripple-effect"><?php _e("Register") ?> <i class="icon-material-outline-arrow-right-alt"></i></a>
                <a href="<?php url("SEARCH_PROJECTS") ?>" class="button button-sliding-icon ripple-effect"><?php _e("Find a Job") ?> <i class="icon-material-outline-arrow-right-alt"></i></a>
            </div>
        </div>
    </div>
</div>


<div class="margin-top-70"></div>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
overall_footer();
?>


