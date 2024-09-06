<?php
overall_header(__(""));

// echo "<pre>";
// print_r($pages);
// die();
?>
<!-- Dashboard Container -->
<div class="dashboard-container">

    <?php include_once TEMPLATE_PATH.'/dashboard_sidebar.php'; ?>


    <!-- Dashboard Content
    ================================================== -->
    <div class="dashboard-content-container dark-modeforgray" data-simplebar>
        <div class="dashboard-content-inner" >

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3 class="dark-modetextgray"
                ><?php _e("Bookmark") ?></h3>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("BookMark Projects") ?></li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-assignment"></i> <?php _e("Bookmark Projects") ?></h3>
                           
                        </div>
                        <!-- Content Start -->
                        <div class="content">
                            <ul class="dashboard-box-list" id="js-table-list">
                                <?php foreach($bookmarks as $item){ ?>
                                    <li class="ajax-item-listing" data-item-id="<?php _esc($item['id'])?>">
                                        <!-- Project Listing -->
                                        <div class="job-listing width-adjustment">
                                            <!-- Project Listing Details -->
                                            <div class="job-listing-details">
                                                <!-- Details -->
                                                <div class="job-listing-description">
                                                    <h3 class="job-listing-title">
                                                        <a href="<?php _esc($item['link'])?>"><?php _esc($item['product_name'])?></a>

                                                      
                                                    </h3>

                                                    <!-- Project Listing Footer -->
                                                    <div class="job-listing-footer">
                                                        <ul>
                                                            <li><i class="icon-material-outline-access-time"></i> <?php _esc(timeAgo($item['created_at']))?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Task Details -->
                                        <ul class="dashboard-task-info margin-bottom-5">
                                            <li><strong><?php _esc($item['bids_count'])?></strong><span><?php _e("Bids") ?></span></li>
                                            <li><strong><?php _esc($config['currency_sign'])?><?php _esc($item['avg_bid'])?></strong><span><?php _e("Avg. Bid") ?></span></li>
                                            <li><strong><?php _esc($config['currency_sign'])?><?php _esc($item['salary_min'])?>-<?php _esc($config['currency_sign'])?><?php _esc($item['salary_max'])?></strong><span><?php _esc($item['salary_type'])?></span></li>
                                        </ul>

                                    
                                    </li>

                                <?php } ?>
                                <?php if(!$bookmarks){ ?>
                                    <li class="ajax-item-listing">
                                        <!-- Project Listing -->
                                        <div class="job-listing width-adjustment">
                                            <!-- Project Listing Details -->
                                            <div class="job-listing-details">
                                                <?php _e("No result found.") ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>

                        </div>
                        <!-- Content End -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <div class="pagination-container margin-top-20">
                                <nav class="pagination">
                                    <ul>
                                        <?php
                                        foreach($pages as $page) {
                                            if ($page['current'] == 0){
                                                ?>
                                                <li><a href="<?php _esc($page['link'])?>"><?php _esc($page['title'])?></a></li>
                                            <?php }else{
                                                ?>
                                                <li><a href="#" class="current-page"><?php _esc($page['title'])?></a></li>
                                            <?php }
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row / End -->
            <!-- Leave a Review for Freelancer Popup
            ================================================== -->
           
            <!-- Leave a Review Popup / End -->
       
            

            <?php include_once TEMPLATE_PATH.'/overall_footer_dashboard.php'; ?>

