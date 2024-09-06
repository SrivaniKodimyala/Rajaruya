

<?php

overall_header();

global $config;
?>
<style>
.welcome-message {
    z-index: 100;
    position: relative;
}

.transparent-header-spacer {
    background-color: rgba(0, 0, 0, 0.7); /* semi-transparent background */
    padding: 20px;
    text-align: center;
    margin-bottom: 70px;
}
.intro-title {
    font-size: 36px;
    color: #D94554;
}

.sub-title {
    font-size: 24px;
    color: #ffffff;
    margin-top: 20px;
}

/* Responsive adjustments */
@media (max-width: 1200px) {
    .intro-title {
        font-size: 32px;
    }
    .sub-title {
        font-size: 22px;
    }
}

@media (max-width: 992px) {
    .intro-title {
        font-size: 28px;
    }
    .sub-title {
        font-size: 20px;
    }
}

@media (max-width: 768px) {
    .intro-title {
        font-size: 24px;
    }
    .sub-title {
        font-size: 18px;
    }
}

@media (max-width: 576px) {
    .intro-title {
        font-size: 20px;
    }
    .sub-title {
        font-size: 16px;
    }
}


        .pricing-plans-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pricing-plan {
            background: #fff;
            border: 1px solid #e6e6e6;
            padding: 20px;
            text-align: center;
            width: 300px;
            margin: 0 10px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .pricing-plan h3 {
            margin: 0 0 20px;
        }
        .pricing-plan-price {
            font-size: 24px;
            font-weight: bold;
            color: #20C997;
            margin-bottom: 20px;
        }
        .pricing-plan-features {
            margin-bottom: 20px;
        }
        .pricing-plan-features ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .pricing-plan-features li {
            margin-bottom: 10px;
        }
        .btn-upgrade, .btn-current {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
        }
        .btn-upgrade {
            background: #20C997;
            color: #fff;
        }
        .btn-current {
            background: #20C997;
            color: #fff;
        }
   
</style>
    <link type="text/css" href="<?php _esc(TEMPLATE_URL);?>/service_fragments/css/gig_detail.css" rel="stylesheet"/>
<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->
<div class="intro-banner <?php _esc($config['banner_overlay']);?>" data-background-image="<?php _esc($config['site_url']);?>storage/banner/<?php _esc($config['home_banner']);?>">
    <!-- Transparent Header Spacer -->
      <div class="transparent-header-spacer">
    <div class="welcome-message">
        <h1 class="intro-title"><?php _e("Welcome to RAJASUYA Engineering Solutions") ?></h1>
        <h2 class="sub-title"><?php _e("Your Trusted Partner in Infrastructure Excellence") ?></h2>
    </div>
</div>
    <div class="container">
        <!-- Intro Headline -->
        <div class="row">
            <div class="col-md-12">
                <div class="banner-headline">
                    <h3>
                  
                    </h3>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="row">
            <div class="col-md-12">
                <form autocomplete="off" method="get" action="<?php url("SEARCH_PROJECTS") ?>" accept-charset="UTF-8">
                    <div class="intro-banner-search-form margin-top-95">
                    <!-- Search Field -->
                    <div class="intro-search-field">
                        <label for="intro-keywords" class="field-title ripple-effect"><?php _e("Find Work") ?></label>
                        <input id="intro-keywords" type="text" class="qucikad-ajaxsearch-input"
                               placeholder="<?php _e("Project Title or Keywords") ?>" data-prev-value="0"
                               data-noresult="<?php _e("More Results For") ?>">
                        <i class="qucikad-ajaxsearch-close fa fa-times-circle" aria-hidden="true" style="display: none;"></i>
                        <div id="qucikad-ajaxsearch-dropdown" size="0" tabindex="0">
                            <ul>
                                <?php
                                foreach($category as $cat){
                                    ?>
                                    <li class="qucikad-ajaxsearch-li-cats" data-catid="<?php echo $cat['slug']; ?>">
                                        <?php
                                        echo ($cat['picture'] == '') ? '<i class="qucikad-as-caticon '.$cat['icon'].'"></i>' : '<img src="'.$cat['picture'].'"/>';
                                        ?>
                                        <span class="qucikad-as-cat"><?php echo $cat['name']; ?></span>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>

                            <div style="display:none" id="def-cats">

                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="intro-search-button">
                        <button class="button ripple-effect"><?php _e("Search") ?></button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <!-- Stats -->
        <div class="row">
            <div class="col-md-12">
                <ul class="intro-stats margin-top-45 hide-under-992px">
                    <li>
                        <strong class="counter"><?php _esc($total_projects);?></strong>
                        <span><?php _e("Projects") ?></span>
                    </li>
                    <li>
                        <strong class="counter"><?php _esc($total_gigs);?></strong>
                        <span><?php _e("Gigs Services") ?></span>
                    </li>
                    <li>
                        <strong class="counter"><?php _esc($total_jobs);?></strong>
                        <span><?php _e("Jobs Posted") ?></span>
                    </li>
                    <li>
                        <strong class="counter"><?php _esc($total_freelancer);?></strong>
                        <span><?php _e("Freelancers") ?></span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<!-- Content
================================================== -->
<!-- Category Boxes -->
<?php if($config['show_categories_home']){ ?>
<!-- Category Boxes project -->
<div class="section gray padding-top-65 padding-bottom-45 dark-modeforgray">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-headline centered margin-bottom-15">
                    <h3 class="dark-modetextgray"><?php _e("Project Categories") ?></h3>
                </div>
                <div class="categories-container">
                    <?php foreach($category as $cat){ ?>
                        <a href="<?php echo $cat['link']; ?>" class="category-box">
                            <div class="category-box-icon">
                                <?php
                                if($cat['picture'] == '') {
                                    echo '<div class="category-icon"><i class="'.$cat['icon'].'"></i></div>';
                                } else{
                                    echo '<div class="category-icon"><img src="'.$cat['picture'].'"/></div>';
                                }
                                ?>
                            </div>
                            <div class="category-box-counter"><?php echo $cat['main_ads_count']; ?></div>
                            <div class="category-box-content">
                                <h3 class="dark-modetextgray"><?php echo $cat['name']; ?> <small>(<?php echo $cat['main_ads_count']; ?>)</small></h3>
                            </div>
                            <div class="category-box-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                   <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- Category Boxes / End -->



<!-- Latest Projects -->
<div class="section margin-top-45 padding-top-65 padding-bottom-75 dark-modeforgray
">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <!-- Section Headline -->
                <div class="section-headline margin-top-0 margin-bottom-35">
                    <h3 class="dark-modetextgray"><?php _e("Latest Projects") ?></h3>
                    <a href="<?php url("SEARCH_PROJECTS") ?>" class="headline-link"><?php _e("Browse All Projects") ?></a>
                </div>

                <!-- Jobs Container -->
                <div class="tasks-list-container compact-list margin-top-35">
                    <?php
                    foreach($item2 as $project){
                    ?>
                    <!-- Task -->
                    <a href="<?php _esc($project['link']);?>" class="task-listing <?php if($project['highlight']){ echo 'highlight';} ?>">
                        <!-- Job Listing Details -->
                        <div class="task-listing-details">
                            <!-- Details -->
                            <div class="task-listing-description">
                                <h3 class="task-listing-title"><?php _esc($project['product_name']);?></h3>
                                <?php if($project['featured'] == 1){ ?>
                                <div class="dashboard-status-button blue"> <?php _e("Featured") ?></div>
                                <?php }
                                if($project['urgent'] == 1){ ?>
                                <div class="dashboard-status-button yellow"> <?php _e("Urgent") ?></div>
                                <?php } ?>
                                <ul class="task-icons">
                                    <li><i class="icon-material-outline-gavel"></i> <?php _esc($project['bids_count']);?> Bids</li>
                                    <li><i class="icon-material-outline-account-balance-wallet"></i> <?php _esc($project['avg_bid']);?> <?php _e("Avg bid") ?></li>
                                    <li><i class="icon-material-outline-access-time"></i> <?php _esc($project['created_at']);?></li>
                                </ul>
                                <div class="task-tags margin-top-15">
                                    <?php _esc($project['skills']);?>
                                </div>
                            </div>
                        </div>
                        <div class="task-listing-bid">
                            <div class="task-listing-bid-inner">
                                <div class="task-offers">
                                    <strong><?php _esc($project['salary_min']);?> - <?php _esc($project['salary_max']);?> </strong>
                                    <span><?php _esc($project['salary_type']);?></span>
                                </div>
                                <span class="button button-sliding-icon ripple-effect"><?php _e("Bid Now") ?> <i class="icon-material-outline-arrow-right-alt"></i></span>
                            </div>
                        </div>
                    </a>
                   <?php } ?>

                </div>
                <!-- Jobs Container / End -->

            </div>
        </div>
    </div>
</div>
<!-- Latest Projects / End -->
 
<?php if($config['show_categories_home']){ ?>
<!-- Category Boxes jobs -->
<div class="section padding-top-65 padding-bottom-45 dark-modeforgray" style="background:#f9f9f9">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-headline centered margin-bottom-15">
                    <h3 class="dark-modetextgray"><?php _e("Job Categories") ?></h3>
                </div>
                <div class="categories-container">
                    <?php foreach($categoryJob as $catJob){ ?>
                        <a href="<?php echo $catJob['link']; ?>" class="category-box">
                            <div class="category-box-icon">
                                <?php
                                if($catJob['picture'] == '') {
                                    echo '<div class="category-icon"><i class="'.$catJob['icon'].'"></i></div>';
                                } else{
                                    echo '<div class="category-icon"><img src="'.$catJob['picture'].'"/></div>';
                                }
                                ?>
                            </div>
                            <div class="category-box-counter"><?php echo $catJob['main_ads_count']; ?></div>
                            <div class="category-box-content">
                                <h3 class="dark-modetextgray"
                                ><?php echo $catJob['name']; ?> <small>(<?php echo $catJob['main_ads_count']; ?>)</small></h3>
                            </div>
                            <div class="category-box-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>




<?php if($config['show_latest_jobs_home']){ ?>
<!-- Latest Jobs -->
<div class="section gray padding-top-65 padding-bottom-75 dark-modeforgray
" style="background:white">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-headline margin-top-0 margin-bottom-35">
                    <h3 class="dark-modetextgray"><?php _e("Latest Jobs") ?></h3>
                    <a href="<?php url("LISTING") ?>" class="headline-link"><?php _e("Browse All Jobs") ?></a>
                </div>
                <div class="listings-container compact-list-layout margin-top-35">
                    <?php
                    foreach($item3 as $job){
                    ?>
                        <div class="job-listing <?php if($job['highlight']){ echo 'highlight'; } ?>">
                            <div class="job-listing-details">
                                <div class="job-listing-company-logo">
                                    <img src="<?php _esc($config['site_url']);?>storage/products/<?php _esc($job['image'])?>"
                                         alt="<?php _esc($job['product_name'])?>">
                                </div>
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title"><a href="<?php _esc($job['link'])?>"><?php _esc($job['product_name'])?></a>
                                        <?php if($job['featured'] == 1){ ?>
                                            <div class="dashboard-status-button blue"> <?php _e("Featured") ?></div>
                                        <?php }
                                        if($job['urgent'] == 1){ ?>
                                            <div class="dashboard-status-button yellow"> <?php _e("Urgent") ?></div>
                                        <?php } ?>
                                    </h3>

                                    <div class="job-listing-footer">
                                        <ul>
                                            <?php if($config['company_enable']){ ?>
                                            <li><i class="la la-building"></i> <?php _esc($job['company_name'])?></li>
                                            <?php } ?>
                                            <li><i class="la la-map-marker"></i> <?php _esc($job['location'])?></li>
                                            <?php if($job['salary_min'] != 0){ ?>
                                                <li><i class="la la-credit-card"></i> <?php _esc($job['salary_min'])?>
                                                    -<?php _esc($job['salary_max'])?> <?php _e("Per") ?> <?php _esc($job['salary_type'])?></li>
                                            <?php } ?>
                                            <li><i class="la la-clock-o"></i> <?php _esc($job['created_at'])?></li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="job-type"><?php _esc($job['product_type'])?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest Jobs / End -->
<?php } ?>



<!-- How it works Boxes -->
<div class="section padding-top-65 padding-bottom-65 dark-modeforgray" style="background:#f9f9f9">
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline centered margin-top-0 margin-bottom-5">
                    <h3 class="dark-modetextgray"><?php _e('How It Works?')?></h3>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <!-- Icon Box -->
                <div class="icon-box with-line">
                    <!-- Icon -->
                    <div class="icon-box-circle">
                        <div class="icon-box-circle-inner">
                            <i class="icon-line-awesome-lock"></i>
                            <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
                        </div>
                    </div>
                    <h3 class="dark-modetextgray"><?php _e('Choose from your best match')?></h3>
                    <p class="dark-modetextgray"><?php _e('Bring to the table win-win survival strategies to ensure proactive domination going forward.')?></p>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <!-- Icon Box -->
                <div class="icon-box with-line">
                    <!-- Icon -->
                    <div class="icon-box-circle">
                        <div class="icon-box-circle-inner">
                            <i class="icon-line-awesome-legal"></i>
                            <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
                        </div>
                    </div>
                    <h3 class="dark-modetextgray"> <?php _e('Get your work done')?></h3>
                    <p class="dark-modetextgray"><?php _e('Efficiently unleash cross-media information without. Quickly maximize return on investment.')?></p>
                    <h3></h3>
                    <p></p>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <!-- Icon Box -->
                <div class="icon-box">
                    <!-- Icon -->
                    <div class="icon-box-circle">
                        <div class="icon-box-circle-inner">
                            <i class=" icon-line-awesome-trophy"></i>
                            <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
                        </div>
                    </div>
                    <h3 class="dark-modetextgray"><?php _e('Give feedback and repeat')?></h3>
                    <p class="dark-modetextgray"><?php _e('Nanotechnology immersion along the information highway will close the loop on focusing solely.')?></p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- How it works Boxes / End -->


<?php if($config['show_categories_home']){ ?>
<!-- Category Boxes gig -->
<div class="section gray padding-top-65 padding-bottom-45 dark-modeforgray" style="background:white">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-headline centered margin-bottom-15">
                    <h3 class="dark-modetextgray"><?php _e("Gig Categories") ?></h3>
                </div>
                <div class="categories-container">
                    <?php foreach($categoryGig as $catGig){ ?>
                        <a href="<?php echo $catGig['link']; ?>" class="category-box">
                            <div class="category-box-icon">
                                <?php
                                if($catGig['picture'] == '') {
                                    echo '<div class="category-icon"><i class="'.$catGig['icon'].'"></i></div>';
                                } else{
                                    echo '<div class="category-icon"><img src="'.$catGig['picture'].'"/></div>';
                                }
                                ?>
                            </div>
                            <div class="category-box-counter"><?php echo $catGig['main_ads_count']; ?></div>
                            <div class="category-box-content">
                                <h3 class="dark-modetextgray"><?php echo $catGig['name']; ?> <small>(<?php echo $catGig['main_ads_count']; ?>)</small></h3>
                            </div>
                            <div class="category-box-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                   <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

    <!-- Latest Services -->
<div class="section gray margin-top-45 padding-top-65 padding-bottom-75 dark-modeforgray">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <!-- Section Headline -->
                <div class="section-headline margin-top-0 margin-bottom-35">
                    <h3 class="dark-modetextgray"><?php _e("Latest Gig Services") ?></h3>
                </div>

                <!-- Jobs Container -->
                <div class="recommended margin-top-30">
                    <div class="gig-slick-carousel recommended-slider">
                        <?php foreach ($items as $item){ ?>
                            <div>
                                <a href="<?php _esc($item['link'])?>">
                                    <img class="img-fluid" src="<?php _esc($config['site_url'])?>storage/products/<?php _esc($item['image'])?>" alt="<?php _esc($item['title'])?>">
                                </a>
                                <div class="inner-slider">
                                    <div class="inner-wrapper">
                                        <div class="d-flex align-items-center">
                                                <span class="seller-image">
                                                    <img class="img-fluid" src="<?php _esc($config['site_url'])?>storage/profile/<?php _esc($item['user_image'])?>" alt='<?php _esc($item['username'])?>' />
                                                </span>
                                            <span class="seller-name">
                                                    <a href="<?php url("PROFILE") ?>/<?php _esc($item['username'])?>"><?php _esc($item['fullname'])?></a>
                                                    <span class="level hint--top level-one-seller"><?php _esc($item['username'])?></span>
                                                </span>
                                        </div>
                                        <h3><?php _esc($item['title'])?></h3>
                                        <div class="content-info">
                                            <div class="rating-wrapper">
                                                    <span class="gig-rating">
                                                        <?php _esc($item['rating']);?>
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <?php if($usertype == 'employer') { ?>
                                                <i class="fa fa-heart set-item-fav <?php if($item['favorite'] == '1') { echo 'added'; }?>" data-item-id="<?php _esc($item['id'])?>" data-userid="<?php _esc($user_id)?>" data-post-type="gig" data-action="setFavAd"></i>
                                            <?php }?>
                                            <div class="price">
                                                <a href="#">
                                                    <?php _e('Starting At')?> <span> <?php _esc($item['price'])?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <!-- Jobs Container / End -->

            </div>
        </div>
    </div>
</div>
<!-- Latest Services / End -->


<!-- Highest Rated Freelancers -->
<div class="section padding-top-65 padding-bottom-70 full-width-carousel-fix dark-modeforgray">
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline margin-top-0 margin-bottom-25">
                    <h3 class="dark-modetextgray"><?php _e('Highest Rated Freelancers')?></h3>
                    <a href="<?php url("FREELANCERS") ?>" class="headline-link"><?php _e('Browse All Freelancers')?></a>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="default-slick-carousel freelancers-container freelancers-grid-layout">

                    <!--Freelancer -->
                    <?php
                    foreach($freelancers as $freelancer){
                    ?>
                    <div class="freelancer">
                        <!-- Overview -->
                        <div class="freelancer-overview">
                            <div class="freelancer-overview-inner">
                                <!-- Avatar -->
                                <div class="freelancer-avatar">
                                    <div class="verified-badge"></div>
                                    <a href="<?php url("PROFILE") ?>/<?php _esc($freelancer['username']) ?>">
                                        <img src="<?php _esc($config['site_url']);?>storage/profile/<?php _esc($freelancer['image']) ?>" alt="<?php _esc($freelancer['name']) ?>">
                                    </a>
                                </div>

                                <!-- Name -->
                                <div class="freelancer-name">
                                    <h4><a href="<?php url("PROFILE") ?>/<?php _esc($freelancer['username']) ?>"><?php _esc($freelancer['name']) ?> <div class="flag flag-<?php _esc($freelancer['country_code']) ?>"></a></h4>
                                    <?php
                                    if($freelancer['category'] != ""){
                                        echo "<span>";
                                        _esc($freelancer['category']);
                                        if($freelancer['subcategory'] != ""){
                                            echo " / ";
                                            _esc($freelancer['subcategory']);
                                        }
                                        echo "</span>";
                                    }
                                    ?>
                                </div>
                                <!-- Rating -->
                                <div class="freelancer-rating">
                                    <div class="star-rating" data-rating="<?php _esc($freelancer['rating']) ?>"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Details -->
                        <div class="freelancer-details">
                            <div class="freelancer-details-list">
                                <ul>
                                    <li><?php _e("Hourly Rate") ?> <strong><?php _esc($freelancer['hourly_rate']) ?></strong></li>
                                    <li><?php _e("Won Bid") ?> <strong><?php _esc($freelancer['win_project']) ?></strong></li>
                                    <li><?php _e("Rehired") ?> <strong><?php _esc($freelancer['rehired']) ?></strong></li>
                                </ul>
                            </div>
                            <a href="<?php url("PROFILE") ?>/<?php _esc($freelancer['username']) ?>" class="button button-sliding-icon ripple-effect"><?php _e("View Profile") ?> <i class="icon-material-outline-arrow-right-alt"></i></a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Freelancer / End -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Highest Rated Freelancers / End-->

<?php if($config['show_membershipplan_home']){ ?>
<!-- Membership Plans -->
<div class="section gray padding-top-60 padding-bottom-75 dark-modeforgray
">
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline centered margin-top-0 margin-bottom-75">
                    <h3 class="dark-modetextgray"><?php _e("Membership Plan")   ?> </h3>
                </div>
            </div>


            <div class="col-xl-12">
                <form name="form1" method="post" action="<?php url("MEMBERSHIP") ?>">
                    <div class="billing-cycle-radios margin-bottom-70">
                        <?php
                        if($total_monthly){
                        ?>
                        <div class="radio billed-monthly-radio">
                            <input id="radio-monthly" name="billed-type" type="radio" value="monthly" checked="">
                            <label for="radio-monthly"><span class="radio-label dark-modetextgray"></span> <?php _e("Monthly") ?></label>
                        </div>
                        <?php
                        }
                        if($total_annual){
                        ?>
                        <div class="radio billed-yearly-radio">
                            <input id="radio-yearly" name="billed-type" type="radio" value="yearly">
                            <label for="radio-yearly"><span class="radio-label dark-modetextgray"></span> <?php _e("Yearly") ?></label>
                        </div>
                        <?php
                        }
                        if($total_lifetime){
                        ?>
                        <div class="radio billed-lifetime-radio">
                            <input id="radio-lifetime" name="billed-type" type="radio" value="lifetime">
                            <label for="radio-lifetime"><span class="radio-label"></span> <?php _e("Lifetime") ?></label>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Pricing Plans Container -->
                    <div class="pricing-plans-container">
                        <?php
                        foreach($sub_types as $plan){
                        ?>
                            <!-- Plan -->
                            <div class='pricing-plan <?php if(isset($plan['recommended']) && $plan['recommended']=="yes"){ echo 'recommended';} ?>'>

                                <?php
                                if(isset($plan['recommended']) && $plan['recommended']=="yes"){
                                    echo '<div class="recommended-badge">'.__("Recommended").'</div> ';
                                }
                                ?>
                                <h3><?php _esc($plan['title'])?></h3>
                                <?php
                                if($plan['id']=="free" || $plan['id']=="trial"){
                                    ?>
                                    <div class="pricing-plan-label"><strong>
                                            <?php
                                            if($plan['id']=="free")
                                                _e("Free");
                                            else
                                                _e("Trial");
                                            ?>
                                        </strong></div>

                                    <?php
                                }
                                else{
                                    if($total_monthly != 0)
                                        echo '<div class="pricing-plan-label billed-monthly-label"><strong>'._esc($plan['monthly_price'],false).'</strong>/ '.__("Monthly").'</div>';
                                    if($total_annual != 0)
                                        echo '<div class="pricing-plan-label billed-yearly-label"><strong>'._esc($plan['annual_price'],false).'</strong>/ '.__("Yearly").'</div>';
                                    if($total_lifetime != 0)
                                        echo '<div class="pricing-plan-label billed-lifetime-label"><strong>'._esc($plan['lifetime_price'],false).'</strong>/ '.__("Lifetime").'</div>';
                                }
                                ?>

                                <div class="pricing-plan-features">
                                    <strong><?php _e("Features of") ?> <?php _esc($plan['title'])?></strong>
                                    <ul>
                                        <li><?php _e("Project Fee") ?> <?php _esc($plan['freelancer_commission'])?>%</li>
                                        <li><?php _esc($plan['bids'])?> <?php _e("Bids") ?></li>
                                        <li><?php _esc($plan['skills'])?> <?php _e("Skills") ?></li>
                                        <?php _esc($plan['custom_settings'])?>
                                    </ul>
                                </div>
                                <?php
                                if($plan['Selected'] == 0){
                                    echo '<button type="submit" class="button full-width margin-top-20 ripple-effect" name="upgrade" value="'._esc($plan['id'],false).'">'.__("Upgrade").'</button>';
                                }
                                if($plan['Selected'] == 1){
                                    echo '<a href="javascript:void(0);" class="button full-width margin-top-20 ripple-effect">'.__("Current Plan").'</a>';
                                }
                             
                                ?>
                               
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Membership Plans / End-->
<?php } ?>



<!---membership plan new--->
<?php if($userinfotype=='employer'){ ?>
<div class="section gray padding-top-60 padding-bottom-75 dark-modeforgray">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline centered margin-top-0 margin-bottom-75">
                    <h3 
                    class="dark-modetextgray"><?php _e("Membership Plan") ?></h3>
                </div>
            </div>

            <div class="col-xl-12">
               
                <div class="billing-cycle-radios margin-bottom-70"></div>
                
                <!-- Pricing Plans Container -->
                <div class="pricing-plans-container">
                    <!-- Free Plan -->
                    <div class="pricing-plan">
                        <h3><i class="fas fa-gift"></i> Free</h3>
                        <div class="pricing-plan-features">
                            <strong><?php _e("Features of Free Plan") ?></strong>
                            <ul>
                                <li><?php _e("Customer support through Email and chat") ?></li>
                            </ul>
                        </div>
                        <form method="post" action="javascript:void(0);">
                            <input type="hidden" name="plan_name" value="Free">
                            <input type="hidden" name="amount" value="0">
                            <input type="hidden" name="plan_id" value="1">
                            <?php if($membershipplan_id==1){?>
                            <button type="submit" class="btn-upgrade" style="margin-top:122px">Current Plan</button>
                            <?php }else{?>
                            <button type="submit" class="btn-upgrade" style="margin-top:122px">Upgrade</button>
                            <?php } ?>
                        </form>
                    </div>

                    <!-- Basic Plan -->
                    <div class="pricing-plan">
                    <div class="recommended-badge">Recommended</div> 
                        <h3><i class="fas fa-star"></i> Basic</h3>
                        <div class="pricing-plan-price">
                            <span>₹12,000/year</span>
                        </div>
                        <div class="pricing-plan-features">
                            <strong><?php _e("Features of Basic Plan") ?></strong>
                            <ul>
                                <li><?php _e("Customer support through Email, Chat and on call") ?></li>
                            </ul>
                        </div>
                        <form method="post" action="<?php url("MEMBERSHIPPLANNEW") ?>">
                            <input type="hidden" name="plan_name" value="Basic">
                            <input type="hidden" name="amount" value="12000">
                            <input type="hidden" name="plan_id" value="2">
                            <?php if($membershipplan_id==2 && $upgrades_expiry_date != $today_date){?>
                            <button type="submit" class="btn-upgrade" style="margin-top:52px">Current Plan</button>
                            <?php }else{?>
                            <button type="submit" name='upgrade' value="1" class="btn-upgrade" style="margin-top:52px">Upgrade</button>
                            <?php } ?>
                        </form>
                    </div>

                    <!-- Premium Plan -->
                    <div class="pricing-plan">
                    <div class="recommended-badge">Recommended</div> 
                        <h3><i class="fas fa-crown"></i> Premium</h3>
                        <div class="pricing-plan-price">
                            <span>₹30,000/year</span>
                        </div>
                        <div class="pricing-plan-features">
                            <strong><?php _e("Features of Premium Plan") ?></strong>
                            <ul>
                                <li><?php _e("Dedicated client relationship manager") ?></li>
                                <li><?php _e("Customer support through Email, Chat and on call") ?></li>
                            </ul>
                        </div>
                        <form method="post" action="<?php url("MEMBERSHIPPLANNEW") ?>">
                            <input type="hidden" name="plan_name" value="Premium">
                            <input type="hidden" name="amount" value="30000">
                            <input type="hidden" name="plan_id" value="3">
                            <?php if($membershipplan_id==3 && $upgrades_expiry_date != $today_date){?>
                            <button type="submit" class="btn-current">Current Plan</button>
                            <?php }else{?>
                            <button type="submit" name='upgrade' value="1" class="btn-upgrade">Upgrade</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!---membership plan ends-->

<!-- Testimonials -->
<?php if($config['testimonials_enable'] && $config['show_testimonials_home']){ ?>
<div class="section padding-top-65 padding-bottom-55 dark-modeforgray
"style="background:#f9f9f9">

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline centered margin-top-0 margin-bottom-5">
                    <h3 
                    class="dark-modetextgray"><?php _e("Testimonials") ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Carousel -->
    <div class="fullwidth-carousel-container margin-top-20">
        <div class="testimonial-carousel testimonials">

            <!-- Item -->
            <?php
            foreach($testimonials as $testimonial){
            ?>
            <div class="fw-carousel-review">
                <div class="testimonial-box">
                    <div class="testimonial-avatar">
                        <img src="<?php _esc($config['site_url']);?>storage/testimonials/<?php _esc($testimonial['image']) ?>" alt="<?php _esc($testimonial['name']) ?>">
                    </div>
                    <div class="testimonial-author">
                        <h4><?php _esc($testimonial['name']) ?></h4>
                        <span><?php _esc($testimonial['designation']) ?></span>
                    </div>
                    <div class="testimonial"><?php _esc($testimonial['content']) ?></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Categories Carousel / End -->

</div>
<?php } ?>
<!-- Testimonials / End -->

<!-- Counters -->
<div class="section gray padding-top-70 padding-bottom-75 dark-modeforgray
">
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <div class="counters-container">

                    <!-- Counter -->
                    <div class="single-counter">
                        <i class="icon-line-awesome-legal"></i>
                        <div class="counter-inner">
                            <h3><span class="counter"><?php _esc($total_projects);?></span></h3>
                            <span class="counter-title"><?php _e("Projects Posted") ?></span>
                        </div>
                    </div>
                    <!-- Counter -->
                    <div class="single-counter">
                        <i class="icon-line-awesome-suitcase"></i>
                        <div class="counter-inner">
                            <h3><span class="counter"><?php _esc($total_jobs);?></span></h3>
                            <span class="counter-title"><?php _e("Jobs Posted") ?></span>
                        </div>
                    </div>
                    <!-- Counter -->
                    <div class="single-counter">
                        <i class="icon-line-awesome-user"></i>
                        <div class="counter-inner">
                            <h3><span class="counter"><?php _esc($total_freelancer);?></span></h3>
                            <span class="counter-title"><?php _e("Freelancers") ?></span>
                        </div>
                    </div>
                    <!-- Counter -->
                    <div class="single-counter">
                        <i class="icon-line-awesome-trophy"></i>
                        <div class="counter-inner">
                            <h3><?php _esc($config['currency_sign']);?><span class="counter"><?php _esc($community_earning);?></span></h3>
                            <span class="counter-title"><?php _e("Community Earnings") ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters / End -->

<!-- Recent Blog Posts -->
<?php if($config['blog_enable'] && $config['show_blog_home']){ ?>
<div class="section padding-top-65 padding-bottom-50 dark-modeforgray">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <!-- Section Headline -->
                <div class="section-headline margin-top-0 margin-bottom-45">
                    <h3 class="dark-modetextgray"><?php _e("Recent Blog") ?></h3>
                    <a href="<?php url("BLOG") ?>" class="headline-link"><?php _e('View Blog')?></a>
                </div>

                <div class="row">
                    <!-- Blog Post Item -->
                    <?php
                    foreach($recent_blog as $blog){
                        ?>
                    <div class="col-xl-4">
                        <a href="<?php _esc($blog['link']) ?>" class="blog-compact-item-container">
                            <div class="blog-compact-item">
                                <img src="<?php _esc($config['site_url']);?>storage/blog/<?php _esc($blog['image']) ?>"
                                     alt="{RECENT_BLOG.title}">
                                <span class="blog-item-tag"><?php _esc($blog['author']) ?></span>
                                <div class="blog-compact-item-content">
                                    <ul class="blog-post-tags">
                                        <li><?php _esc($blog['created_at']) ?></li>
                                    </ul>
                                    <h3><?php _esc($blog['title']) ?></h3>
                                    <p><?php _esc($blog['description']) ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <!-- Blog post Item / End -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- Recent Blog Posts / End -->

<?php if($config['show_partner_logo_home']){ ?>
<div class="section gray border-top padding-top-45 padding-bottom-45 dark-modeforgray">
    <!-- Logo Carousel -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Carousel -->
                <div class="col-md-12">
                    <div class="logo-carousel">
                        <?php
                        $dir = ROOTPATH.'/storage/partner/';
                        $i = 0;
                        foreach (glob($dir . '*') as $path) {
                            ?>
                            <div class="carousel-item dark-modetextgray">
                                <img class="dark-modetextgray" src="<?php _esc($config['site_url']);?>storage/partner/<?php _esc(basename($path))?>">
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- Carousel / End -->
            </div>
        </div>
    </div>
</div>
<?php } ?>
    <script>
        var transparent_header = "<?php _esc($config['transparent_header'])?>";
        $(document).ready(function () {
            if(transparent_header != '0'){
                $("#wrapper").addClass('wrapper-with-transparent-header');
                $("#header-container").addClass('transparent-header');
            }
        });
    </script>
<?php
overall_footer();
?>