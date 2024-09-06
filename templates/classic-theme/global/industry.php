<?php
overall_header();
?>
<style>
    #titlebar {
        margin-bottom: 20px; 
        background-color: #f2f2f2; 
        padding: 10px;
    }

    .cont {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        max-width: 1200px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px; 
        margin-bottom: 30px; /* Added margin-bottom for spacing */
    }

    .intro {
        text-align: center;
        margin-bottom: 30px;
    }

    .intro h3 {
        font-size: 28px;
        color: #333;
        margin-bottom: 15px;
    }

    .intro p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .card {
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 10px;
        max-width: 300px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        flex: 1 1 calc(33.333% - 20px); /* Adjusted for three per row */
        box-sizing: border-box; /* Include padding and border in element's total width and height */
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .card h4 {
        font-size: 22px;
        margin-bottom: 15px;
        color: #333; 
    }

    .card p {
        font-size: 16px; 
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .icon {
        font-size: 36px; 
        margin-bottom: 10px;
        color: #1abc9c; /* Default icon color */
    }

    .icon.building { color: #1abc9c; }
    .icon.fire { color: #3498db; }
    .icon.water { color: #9b59b6; }
    .icon.bolt { color: #f39c12; }
    .icon.home { color: #e74c3c; }
    .icon.truck { color: #2ecc71; }
    .icon.tint { color: #34495e; }

    .button-container {
        text-align: center;
        margin-top: 30px;
    }

    .button {
        display: inline-block;
        padding: 12px 24px; 
        background-color: #ff6666;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        font-size: 18px; 
        transition: background-color 0.3s ease; 
    }

    .button:hover {
        background-color: #e55b5b; 
    }

    @media (max-width: 700px) {
        .content {
            flex-direction: column; 
            padding: 15px; 
        }

        .card {
            flex: 1 1 100%; /* Make each card take full width on small screens */
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
                <h2 class="dark-modetextgray"><?php _e("Industry") ?></h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("Industry") ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="cont">
    <div class="content">
        <div class="intro">
            <h3><?php _e("Our Industry Expertise") ?></h3>
            <p>
                Our team of poly-industrial experts will add value to your project not only with their domain expertise but also with timely production, efficiency, and robust engineering solutions. We offer solutions for every need in the following areas:
            </p>
            <h4><?php _e("Areas of Expertise") ?></h4>
        </div>
        <div class="card">
            <i class="icon fas fa-building building"></i>
            <h4><?php _e("Buildings") ?></h4>
            <p>Comprehensive building solutions, including structural design, construction management, and sustainability practices.</p>
        </div>
        <div class="card">
            <i class="icon fas fa-fire fire"></i>
            <h4><?php _e("Fire Fighting") ?></h4>
            <p>Advanced fire protection systems, risk assessment, and safety compliance to ensure the highest level of fire safety.</p>
        </div>
        <div class="card">
            <i class="icon fas fa-water water"></i>
            <h4><?php _e("Irrigation") ?></h4>
            <p>Efficient irrigation systems designed to optimize water usage and enhance agricultural productivity.</p>
        </div>
        <div class="card">
            <i class="icon fas fa-bolt bolt"></i>
            <h4><?php _e("Power") ?></h4>
            <p>Innovative power solutions, including renewable energy systems, power plant design, and energy efficiency improvements.</p>
        </div>
        <div class="card">
            <i class="icon fas fa-home home"></i>
            <h4><?php _e("Prefab Structures") ?></h4>
            <p>Prefabricated building solutions that offer cost savings, speed, and flexibility for various construction needs.</p>
        </div>
        <div class="card">
            <i class="icon fas fa-truck truck"></i>
            <h4><?php _e("Transportation") ?></h4>
            <p>Comprehensive transportation solutions, from infrastructure planning to project execution, ensuring efficient and sustainable transport systems.</p>
        </div>
        <div class="card">
            <i class="icon fas fa-tint tint"></i>
            <h4><?php _e("Water & Waste Water") ?></h4>
            <p>Advanced water and wastewater treatment solutions to ensure clean water supply and effective waste management.</p>
        </div>
    </div>
    <div class="button-container">
        <a href="<?php url("CONTACT") ?>" class="button"><?php _e("Contact Us") ?></a>
    </div>
</div>

<div class="margin-top-70"></div>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
overall_footer();
?>
