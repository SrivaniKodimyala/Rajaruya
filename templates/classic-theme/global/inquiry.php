<?php
overall_header();

$siteUrl = $config['site_url'];
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
        flex-direction: column;
        align-items: center;
        max-width: 1000px; /* Increased width */
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 30px;
    }

    .intro {
        text-align: center;
        margin-bottom: 30px;
        position: relative;
    }

    .intro h3 {
        font-size: 28px;
        color: #333;
        margin-bottom: 15px;
        position: relative;
    }

    .intro p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .intro .icon {
        font-size: 40px;
        color: #20C997;
       margin-bottom:10px;
      
    }

    .form-group {
        width: 100%;
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-size: 16px;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px;
        padding-left: 35px; /* Increased padding */
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s ease-in-out;
        box-sizing: border-box; /* Ensure padding and border are included in width */
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
    }

    .form-group textarea {
        resize: vertical;
        height: 200px; /* Increased height */
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .button {
        display: inline-block;
        padding: 15px 30px; /* Increased padding */
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

    
    #titlebar h1, #titlebar h2 {
margin-top:30px !important;
    }
</style>

<!-- Include Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1mq2auTzsyYxiFT+ExPhXi7iJhCmY5ClPvb4xv5P3B5TfT1NVK9nGzKfhGhCKlTtR3eM7Xdz+iy54Z29PeM19g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Titlebar -->
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">


            <div class="col-md-12">
           
            <h2 class="dark-modetextgray"><?php _e("Inquiry") ?></h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("Inquiry") ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="cont">
    <div class="content">
        <div class="intro">
        <div class="icon">
                <i class="fa fa-envelope"></i>
            </div>
            <h3><?php _e("Inquiry Form") ?></h3>
            <p>
                Please fill out the form below to submit your inquiry. Our team will get back to you as soon as possible.
            </p>
        </div>
        <form id="inquiryForm" action="#" method="POST" name="contact-form" style="width:100%">
            <div class="form-group">
                <label for="name"><i class="fa fa-user"></i> <?php _e("Name") ?></label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fa fa-envelope"></i> <?php _e("Email") ?></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject"><i class="fa fa-tag"></i> <?php _e("Subject") ?></label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message"><i class="fa fa-comment"></i> <?php _e("Message") ?></label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <!-- Main Category Dropdown -->
            <div class="form-group">
                <label for="main_category"><i class="fa fa-folder-open"></i> <?php _e("Main Category") ?></label>
                <select id="main_category" name="main_category" required>
                    <option value="">Select Main Category</option>
                    <?php foreach ($category as $GetCat) : ?>
                        <option value="<?php echo htmlspecialchars($GetCat['name']); ?>" data-id="<?php echo htmlspecialchars($GetCat['id']); ?>"><?php echo htmlspecialchars($GetCat['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Subcategory Dropdown (populated via AJAX) -->
            <div class="form-group">
                <label for="sub_category"><i class="fa fa-folder"></i> <?php _e("Subcategory") ?></label>
                <select id="sub_category" name="sub_category" required>
                    <option value="">Select Subcategory</option>
                </select>
            </div>
            <!-- Google reCAPTCHA -->
            <!-- <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div> -->
            <div class="button-container">
                <button type="submit" name="submit" class="button"><?php _e("Submit Inquiry") ?></button>
            </div>
        </form>
    </div>
</div>

<div class="margin-top-70"></div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
$(document).ready(function() {
    var siteUrl = '<?php echo $siteUrl; ?>';

    $('#main_category').change(function() {
        var mainCategoryId = $('#main_category option:selected').attr('data-id');
        var subCategorySelect = $('#sub_category');

        if (!mainCategoryId) {
            subCategorySelect.html('<option value="">Select Subcategory</option>');
            return;
        }

        subCategorySelect.html('<option value="">Loading...</option>');

        $.ajax({
            type: 'GET',
            url: siteUrl + 'templates/classic-theme/global/get_subcategoriesinquiry.php',
            data: { mainCategoryId: mainCategoryId },
            dataType: 'json',
            success: function(data) {
                subCategorySelect.html('<option value="">Select Subcategory</option>');
                $.each(data, function(index, subcategory) {
                    subCategorySelect.append('<option value="' + subcategory.sub_cat_name + '">' + subcategory.sub_cat_name + '</option>');
                });
            },
            error: function() {
                subCategorySelect.html('<option value="">Failed to load subcategories</option>');
            }
        });
    });
});
</script>

<?php
overall_footer();
?>
