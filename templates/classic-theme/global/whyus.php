<?php
overall_header();
?>
<style>
    
    /* @media (min-width: 993px) and (max-width: 5000px) {
    .marginforleftbox {
        margin-left: 10px !important;
    }
    .marginforrightbox {
        margin-right: 10px !important;
    }
    }

@media (max-width: 992px) {
    .marginforleftbox {
        margin-left: 0 !important;
    }
    .marginforrightbox {
        margin-right: 0 !important;
    }
} */

.marginleftright{
    margin-left: 10px;
    margin-right: 10px;
}

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }
        .why-us-section {
            background-color: #ffffff;
            padding: 60px 0;
        }
        .header-text h2 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        .header-text p {
            font-size: 1.2rem;
            color: #6c757d;
            text-align: center;
        }
        .why-us-card {
            margin-bottom: 30px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background-color: #f4f9f4; /* Light green background */
        }
        .why-us-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .why-us-card .card-body {
            padding: 30px;
        }
        .why-us-card .card-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #34495e;
        }
        .why-us-card .card-text {
            font-size: 1rem;
            color: #7f8c8d;
        }
        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .icon-container i {
            font-size: 3rem;
            color: #28a745; /* Green color */
        }
    </style>

    <div class="container why-us-section dark-modeforgray" style="max-width:1587px">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="header-text">
                    <h2 class="dark-modetextgray">Why Choose Us</h2>
                    <p class="dark-modetextgray">At Rajasuya Engineering Solutions, we stand out because of our unwavering commitment to excellence and client satisfaction.</p>
                </div>
            </div>
        </div>
        <div class="row marginleftright">
            <div class="col-lg-4 col-md-6">
                <div class="card why-us-card">
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-industry"></i>
                        </div>
                        <h5 class="card-title">Expertise Across Industries</h5>
                        <p class="card-text">We offer solutions tailored to the unique needs of various industries, including buildings, firefighting, irrigation, power, prefab structures, transportation, and water & wastewater.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card why-us-card">
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h5 class="card-title">Comprehensive Services</h5>
                        <p class="card-text">Our multidisciplinary team excels in design, subcontracting, procurement, project management, staffing, and more. We cover all aspects of your project, ensuring seamless execution and delivery.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card why-us-card">
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h5 class="card-title">Renowned Partnerships</h5>
                        <p class="card-text">We collaborate with leading infrastructure companies across India, ensuring that our clients benefit from the best practices and innovations in the industry.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card why-us-card">
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h5 class="card-title">Customized Solutions</h5>
                        <p class="card-text">We understand that every business is different. Our solutions are personalized to meet the specific requirements of your project, ensuring optimal results and satisfaction.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card why-us-card">
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h5 class="card-title">Proven Track Record</h5>
                        <p class="card-text">With years of experience and a portfolio of successful projects, we have built a reputation for reliability, quality, and excellence.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card why-us-card">
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h5 class="card-title">Professional Growth</h5>
                        <p class="card-text">Whether you’re an individual freelancer, a consultancy firm, an SME, or an MNC, we offer opportunities for professional development and career growth. Our supportive environment fosters innovation and excellence.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card why-us-card">
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="card-title">Business Development Support</h5>
                        <p class="card-text">We act as your business development and billing team, allowing you to focus on your core competencies while we handle the rest.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

</script>
<?php
overall_footer();