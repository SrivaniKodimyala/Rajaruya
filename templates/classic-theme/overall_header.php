
<!DOCTYPE html>
<html lang="<?php _esc($config['lang_code']);?>" dir="<?php _esc($lang_direction);?>">
<head>
    <title><?php _esc($page_title); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="<?php _esc($config['site_title']);?>">
    <meta name="keywords" content="<?php _esc($config['meta_keywords']);?>">
    <meta name="description" content="<?php ($meta_desc == '')?_esc($config['meta_description']):_esc($meta_desc);?>">

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//google.com">
    <link rel="dns-prefetch" href="//apis.google.com">
    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
    <link rel="dns-prefetch" href="//gstatic.com">
    <link rel="dns-prefetch" href="//oss.maxcdn.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta property="fb:app_id" content="<?php _esc($config['facebook_app_id']);?>"/>
    <meta property="og:site_name" content="<?php _esc($config['site_title']);?>"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:url" content="<?php _esc($page_link);?>"/>
    <meta property="og:title" content="<?php _esc($page_title); ?>" />
    <meta property="og:description" content="<?php _esc($meta_desc);?>"/>
    <meta property="og:type" content="<?php _esc($meta_content);?>"/>
    <?php if($meta_content == 'article'){ ?>
        <meta property="article:author" content="#"/>
        <meta property="article:publisher" content="#"/>
        <meta property="og:image" content="<?php _esc($meta_image);?>"/>
        <?php
    }
    if($meta_content == 'website'){
        echo '<meta property="og:image" content="'.$meta_image.'"/>';
    }
    ?>

    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="<?php _esc($page_title);?>">
    <meta property="twitter:description" content="<?php _esc($meta_desc);?>">
    <meta property="twitter:domain" content="<?php _esc($config['site_url']);?>">
    <meta name="twitter:image:src" content="<?php _esc($meta_image);?>"/>
    <link rel="shortcut icon" href="<?php _esc($config['site_url']);?>storage/logo/<?php _esc($config['site_favicon']);?>">

    <script async>
        var themecolor = '<?php _esc($config['theme_color']);?>';
        var mapcolor = '<?php _esc($config['map_color']);?>';
        var siteurl = '<?php _esc($config['site_url']);?>';
        var template_name = '<?php _esc($config['tpl_name']);?>';
    </script>

    <!--Loop for Theme Color codes-->
    <style>
        :root{
        <?php
        $themecolor = $config['theme_color'];
        $colors = array();
        list($r, $g, $b) = sscanf($themecolor, "#%02x%02x%02x");
        $i = 0.01;
        while($i <= 1){
            echo "--theme-color-".str_replace('.','_',$i).": rgba($r,$g,$b,$i);";
            $i += 0.01;
        }
        echo "--theme-color-1: rgba($r,$g,$b,1);";
        ?>
        }
         .dark-mode{

            background:#121212 !important;
        }
       .dark-modegray{
        background:#333 !important;
       } 
       .dark-modecolorwhite{
           color:white !important;
       }
       
       
        .dark-modecolorgray{
           color:#aaa !important;
       }
       .dark-modeborderbottom{
           
               border-bottom: 1px solid !important;
       }
       
       .dark-modeborderright{
               border-right: 1px solid !important;
       }
       
        
       .dark-modebordertop{
               border-top: 1px solid !important;
       }
       
       
       .dark-modebordernone{
               border:none !important;
       }
       .dark-mode #navigation ul li a:after, #navigation ul ul li a:after {
               background-color: #aaa !important;
    color: black !important;
       }
       .dark-mode #logo{
           border:none !important;
       }
       
       
       
       
/* Style for the search icon */
.search-icon {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    font-size: 20px;
  color:#D94554;
    margin-top: 11px;
    border-radius: 50%;
    /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
    cursor: pointer;
}
       /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: 85px auto; /* Centered horizontally with a top margin */
    padding: 20px;
    border: 1px solid #888;
    width: 60%; /* Smaller width for the search form */
    position: relative;
    transition: top 0.3s; /* Smooth transition */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Adjusted dropdown styles */
#qucikad-ajaxsearch-dropdown-header {
    min-width: 100%;
    max-height: 200px;
    display: none;
    position: absolute;
    background: #fff;
    border: none;
    box-shadow: 0 6px 10px 0px rgba(0, 0, 0, .12);
    margin-top: 1px;
    padding-top: 0;
    top: 52px;
    border-radius: 0 0 4px 4px;
    left: 0;
    width: calc(100% + 1px);
    z-index: 9999;
    overflow-y: scroll;
    outline: none;
    cursor: -webkit-grab;
}

/* Adjusted suggestion item styles */
.search-suggestion-item {
    padding: 3px 15px;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-bottom: 1px solid #f0f0f0; /* Light gray border between items */
}

.search-suggestion-item:hover {
    background-color: #f0f0f0; /* Light gray background on hover */
}

.search-suggestion-item .qucikad-as-caticon,
.search-suggestion-item .cat-picture {
    width: 30px; /* Adjust size as needed */
    height: 30px; /* Adjust size as needed */
    margin-right: 15px; /* Space between icon/image and text */
    flex-shrink: 0; /* Prevent icon/image from shrinking */
    margin-top: 13px;
    vertical-align: top;
    width: 17px;
    font-size: 20px;
}

.search-suggestion-item .qucikad-as-cat {
    font-size: 16px; /* Adjust font size as needed */
    color: #333; /* Example text color */
}

@media (max-width: 1400px) {
    .resp {
        display: none !important;
    }
}
    </style>
    <!--Loop for Theme Color codes-->

    <link rel="stylesheet" href="<?php _esc($config['site_url']);?>includes/assets/plugins/flags/flags.min.css">
    <link rel="stylesheet" href="<?php _esc($config['site_url']);?>includes/assets/css/icons.css">
    <?php if($lang_direction == 'rtl') {
        echo '<link rel="stylesheet" href="'.TEMPLATE_URL.'/css/rtl.css?ver='.$config['version'].'">';
    }else{
        echo '<link rel="stylesheet" href="'.TEMPLATE_URL.'/css/style.css?ver='.$config['version'].'">';
    }?>
    <link rel="stylesheet" href="<?php _esc(TEMPLATE_URL);?>/css/color.css?ver=<?php _esc($config['version']);?>">
    <script src="<?php _esc(TEMPLATE_URL);?>/js/jquery-3.4.1.min.js"></script>
    <script async>var ajaxurl = "<?php _esc($config['app_url']);?>user-ajax.php";</script>
    <script async type="text/javascript">
        $(document).ready(function() {
            $('.resend').click(function(e) { 						// Button which will activate our modal
                var the_id = $(this).attr('id');						//get the id
                // show the spinner
                $(this).html("<i class='fa fa-spinner fa-pulse'></i>");
                $.ajax({											//the main ajax request
                    type: "POST",
                    data: "action=email_verify&id="+$(this).attr("id"),
                    url: ajaxurl,
                    success: function(data)
                    {
                        $("span#resend_count"+the_id).html(data);
                        //fadein the vote count
                        $("span#resend_count"+the_id).fadeIn();
                        //remove the spinner
                        $("a.resend_buttons"+the_id).remove();

                    }
                });
                return false;
            });
        });
    </script>

    <!-- ===External Code=== -->
    <?php _esc($config['external_code']);?>
    <!-- ===/External Code=== -->
</head>
<body data-role="page" class="<?php _esc($lang_direction);?>" id="page" data-ipapi="<?php _esc($config['live_location_api']);?>" data-showlocationicon="<?php _esc($config['location_track_icon']);?>">
<!--[if lt IE 8]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.
</p>
<![endif]-->
<!--Country-Cities-changes-Model-->

<a class="popup-with-zoom-anim hidden" href="#citiesModal" id="change-city"><?php _e("City") ?></a>
<div class="zoom-anim-dialog mfp-hide popup-dialog big-dialog" id="citiesModal">
    <div class="popup-tab-content padding-0">
        <div class="quick-states" id="country-popup" data-country-id="<?php _esc($country_code);?>" style="display: block;">
            <div id="regionSearchBox" class="title clr">
                <div class="clr">
                    <div class="locationrequest smallBox br5 col-sm-4">
                        <div class="rel input-container">
                            <div class="input-with-icon">
                                <input id="inputStateCity" class="with-border" type="text" placeholder="<?php _e("Search city") ?>">
                                <i class="la la-map-marker"></i>
                            </div>
                            <div id="searchDisplay"></div>
                            <div class="suggest bottom abs small br3 error hidden"><span
                                        class="target abs icon"></span>

                                <p></p>
                            </div>
                        </div>
                        <div id="lastUsedCities" class="last-used binded" style="display: none;"><?php _e("Popular cities") ?>
                            <ul id="last-locations-ul">
                            </ul>
                        </div>
                    </div>
                    <?php if($config['country_type'] == 'multi'){ ?>
                        <span style="line-height: 30px;">
                            <span class="flag flag-<?php _esc($user_country);?>"></span> <a href="#countryModal" class="popup-with-zoom-anim"><?php _e("Change Country") ?></a>
                        </span>
                    <?php } ?>
                </div>
            </div>
            <div class="popular-cities clr">
                <p><?php _e("Popular cities") ?></p>

                <div class="list row">

                    <ul class="col-lg-12 col-md-12 popularcity">
                        <?php foreach ($popularcity as $city){
                            _esc($city['tpl']);
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="viewport">
                <div class="full" id="getCities">
                    <div class="col-sm-12 col-md-12 loader" style="display: none"></div>
                    <div id="results" class="animate-bottom">
                        <ul class="column cities">
                            <?php foreach ($states as $state){
                                _esc($state['tpl']);
                            } ?>
                        </ul>
                    </div>
                </div>
                <div class="table full subregionslinks hidden" id="subregionslinks"></div>
            </div>
        </div>
    </div>
</div>
<!--Country-Cities-changes-Model-->
<!-- Country Picker -->
<div class="zoom-anim-dialog mfp-hide dialog-with-tabs popup-dialog big-dialog" id="countryModal">
    <ul class="popup-tabs-nav">
        <li><a href="#country"><i class="icon-feather-map-pin"></i> <?php _e("Select your country") ?></a></li>
    </ul>
    <div class="popup-tabs-container">
        <div class="popup-tab-content" id="country">

            <div class="row">
                <div class="col-md-6">
                    <div class="input-with-icon margin-bottom-30">
                        <input class="with-border" type="text" placeholder="<?php _e("Search") ?>..." id="country-modal-search">
                        <i class="icon-feather-search"></i>
                    </div>
                </div>
                <ul id="countries" class="column col-md-12 col-sm-12 cities">
                    <?php foreach ($countrylist as $country){ ?>
                    <li data-name="<?php _esc($country['name']);?>">
                        <span class="flag flag-<?php _esc($country['lowercase_code']);?>"></span>
                        <a href="<?php url("HOME") ?>/<?php _esc($country['lang']);?>/<?php _esc($country['lowercase_code']);?>"
                                data-id="<?php _esc($country['id']);?>"
                                data-name="<?php _esc($country['name']);?>"> <?php _esc($country['name']);?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php if($config['transparent_header'] == 'transparent-header') {
    $wrapper_class = 'wrapper-with-transparent-header';
    $header_class = 'transparent-header';
}else{
    $wrapper_class = '';
    $header_class = '';
}
?>
<!-- Wrapper -->
<div id="wrapper" class="dark-modeforgray">
    <!-- Header Container
    ================================================== -->
    <header id="header-container" class="fullwidth <?php _esc($config['header_sticky']);?>">
        <!-- Header -->
        <div id="header">
            <div class="container dark-modeforgray">
                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="<?php url("INDEX") ?>">
                            <?php
                            $logo_dark = $config['site_url'].'storage/logo/'.$config['site_logo'];
                            $logo_white = $config['site_url'].'storage/logo/'.$config['site_logo_footer'];
                            ?>
                            <img src="<?php _esc($logo_dark);?>" data-sticky-logo="<?php _esc($logo_dark);?>" data-transparent-logo="<?php _esc($logo_white);?>" alt="<?php _esc($config['site_title']);?>">
                        </a>
                    </div>

                    <!-- Main Navigation -->
                    <nav id="navigation">
                        <ul id="responsive">
                            <?php
                            if($config['country_type'] == 'multi'){
                                ?>
                                <li>
                                    <a href="#countryModal" class="country-flag popup-with-zoom-anim"
                                       title="<?php _e("Change Country") ?>"
                                       data-tippy-placement="right">

                                        <img src="<?php _esc($config['site_url']);?>includes/assets/plugins/flags/images/<?php _esc($user_country);?>.png"/>
                                    </a>
                                </li>
                            <?php } ?>

                            <li style="margin-top: 4px;"><a href="<?php url("INDEX") ?>" class="dark-modetextgray"><?php _e("Home") ?></a>

                                <!--<ul class="dropdown-nav">-->
                                <!--    <li><a href="<?php url("INDEX1") ?>" class="dark-modetextgray"><?php _e("Freelancer") ?></a></li>-->
                                    <!--<li><a href="<?php url("INDEX2") ?>" class="dark-modetextgray"><?php _e("Job") ?></a></li>-->
                                    <!--<li><a href="<?php url("INDEX3") ?>" class="dark-modetextgray"><?php _e("Home Gig Services") ?></a></li>-->
                                <!--</ul>-->
                            </li>
<!-- 
                            <li><a href="#"><?php _e("") ?><?php _e("Find Work") ?></a>
                                <ul class="dropdown-nav">
                                    <li><a href="<?php url("POST_SERVICE") ?>"><?php _e("Post a Service") ?></a></li>
                                    <li><a href="<?php url("SEARCH_PROJECTS") ?>"><?php _e("Browse Projects") ?></a></li>
                                    <li><a href="<?php url("LISTING") ?>"><?php _e("Browse Jobs") ?></a></li>
                                    <?php
                                    if($config['company_enable']){
                                        ?>
                                        <li><a href="<?php url("COMPANIES") ?>"><?php _e("Companies") ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li> -->

 <li style="margin-top: 4px;"><a href="<?php url("INDUSTRY") ?>" class="dark-modetextgray"><?php _e("") ?><?php _e("Industry") ?></a>
                              
                              </li>

                            <!-- <li><a href="#"><?php _e("") ?><?php _e("For Employers") ?></a>
                                <ul class="dropdown-nav">
                                    <li><a href="<?php url("POST-PROJECT") ?>"><?php _e("Post a Project") ?></a></li>
                                    <li><a href="<?php url("POST-JOB") ?>"><?php _e("Post a Job") ?></a></li>
                                    <li><a href="<?php url("SEARCH_SERVICES") ?>"><?php _e("Browse Gig Services") ?></a></li>
                                    <?php
                                    if($config['job_seeker_enable']){
                                        ?>
                                        <li><a href="<?php url("FREELANCERS") ?>"><?php _e("Find Freelancers") ?></a></li>
                                        <?php
                                    }?>
                                </ul>
                            </li> -->

                 
                         
                            <!--<li><a href="<?php echo $catService['link']; ?>" class="dark-modetextgray"><?php _e("") ?><?php _e("Service") ?></a>-->
                            <li style="margin-top: 4px;"><a href="<?php echo $catService['link']; ?>" class="dark-modetextgray"><?php _e("") ?><?php _e("Projects") ?></a>


                            
                            </li>


                            <li style="margin-top: 4px;"><a href="<?php url("CONTACT") ?>" class="dark-modetextgray"><?php _e("Contact") ?></a></li>

                                <!--<ul class="dropdown-nav">-->
                                <!--    <li><a href="<?php url("CONTACT") ?>" class="dark-modetextgray"><?php _e("Contact") ?></a></li>-->
                                <!--    <li><a href="<?php url("WHYUS") ?>" class="dark-modetextgray"><?php _e("Why us") ?></a></li>-->

                                <!--    <li><a href="<?php url("INQUIRY") ?>" class="dark-modetextgray"><?php _e("Inquiry") ?></a></li>-->
                               
                                <!--</ul>-->
                            </li>
                                       
                          <li style="margin-top: 4px;"><a href="<?php url("CLIENT") ?>" class="dark-modetextgray"><?php _e("Post a Job") ?></a>
                              
                            </li>

                         <li style="margin-top: 4px;"><a href="<?php url("PARTNER") ?>" class="dark-modetextgray"><?php _e("") ?><?php _e("Find a Job") ?></a>
                              
                              </li>

                      
    <li class="resp">
        <span class="fa fa-search search-icon" id="searchIcon"></span>
    </li>

<div id="searchModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form autocomplete="off" method="get" action="<?php url("SEARCH_PROJECTS") ?>" accept-charset="UTF-8">
            <div class="intro-banner-search-form">
                <div class="intro-search-field">
                    <label for="intro-keywords" class="field-title ripple-effect"><?php _e("Find Work") ?></label>
                    <input id="intro-keywords-header" type="text" class="qucikad-ajaxsearch-input-header" placeholder="<?php _e("Project Title or Keywords") ?>" data-prev-value="0" data-noresult="<?php _e("More Results For") ?>">
                    <i class="qucikad-ajaxsearch-close-header fa fa-times-circle" aria-hidden="true" style="display: none;"></i>
                    <div id="qucikad-ajaxsearch-dropdown-header" size="0" tabindex="0">
                        <div class="search-suggestion-item qucikad-ajaxsearch-li-cats" data-url="projects">
                            <i class="qucikad-as-caticon fa fa-briefcase"></i> <!-- Replace with your project icon class -->
                            <span class="qucikad-as-cat">Projects</span>
                        </div>
                        <div class="search-suggestion-item qucikad-ajaxsearch-li-cats" data-url="category">
                            <i class="qucikad-as-caticon fa fa-tasks"></i> <!-- Replace with your job icon class -->
                            <span class="qucikad-as-cat">Job</span>
                        </div>
                        <?php foreach($categoryProjects as $catProjects): ?>
                            <div class="search-suggestion-item qucikad-ajaxsearch-li-cats" data-url="projects">
                                <?php if ($catProjects['picture'] == ''): ?>
                                    <i class="qucikad-as-caticon <?php echo $catProjects['icon']; ?>"></i>
                                <?php else: ?>
                                    <img src="<?php echo $catProjects['picture']; ?>" class="cat-picture"/>
                                <?php endif; ?>
                                <span class="qucikad-as-cat"><?php echo $catProjects['name']; ?></span>
                            </div>
                        <?php endforeach; ?>
                        <div style="display:none" id="def-cats-header"></div>
                    </div>
                </div>
                <div class="intro-search-button">
                    <button class="button ripple-effect"><?php _e("Search") ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var modal = $("#searchModal");
    var btn = $("#searchIcon");
    var span = $(".close");

    btn.click(function() {
        modal.show();
        $(".modal-content").slideDown();
    });

    span.click(function() {
        $(".modal-content").slideUp(function() {
            modal.hide();
        });
    });

    $(window).click(function(event) {
        if ($(event.target).is(modal)) {
            $(".modal-content").slideUp(function() {
                modal.hide();
            });
        }
    });

    var inputField = $('.qucikad-ajaxsearch-input-header');
    var myDropDown = $("#qucikad-ajaxsearch-dropdown-header");

    // Show dropdown when input field is clicked
    inputField.on('click', function(event) {
        event.preventDefault();
        myDropDown.css('display', 'block');
    });

    // Hide dropdown when clicking outside of it
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.intro-search-field').length) {
            myDropDown.hide();
        }
    });

    // Fetch and display search suggestions
    inputField.on('input', function() {
        var searchTerm = $(this).val();
        if (searchTerm.length >= 2) {
            $.ajax({
                url: '<?php echo $config["site_url"]; ?>projects/',
                method: 'GET',
                dataType: 'json',
                data: { term: searchTerm },
                success: function(data) {
              
                    if (Array.isArray(data) && data.length) {
                        myDropDown.empty();
                        // Append fixed items first
                        $('#qucikad-ajaxsearch-dropdown-header .search-suggestion-item').each(function() {
                            myDropDown.append($(this).clone());
                        });
                        // Append dynamic search results
                        data.forEach(function(item) {
                            myDropDown.append('<div class="search-suggestion-item" data-url="' + item.site_url_name + '"><i class="qucikad-as-caticon fa fa-search"></i>' + item.url_name + '</div>');
                        });
                        myDropDown.show();
                    } else {
                        myDropDown.hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error occurred:', status, error);
                }
            });
        } else {
            myDropDown.hide();
        }
    });

    // Handle click on search suggestion items
    myDropDown.on('click', '.search-suggestion-item', function() {
        var url = $(this).data('url');
        window.location.href = url;
    });
});
</script>



                            <?php if($is_login){ ?>
                            <li><a href="#" class="dark-modetextgray"><?php _e("Dashboard") ?></a>
                                <ul class="dropdown-nav">
                                    <li><a href="<?php url("DASHBOARD") ?>" class="dark-modetextgray"><?php _e("Dashboard") ?></a></li>
                                    <?php if($config['quickchat_socket_on_off'] == 'on' || $config['quickchat_ajax_on_off'] == 'on'){ ?>
                                        <li><a href="<?php url("MESSAGE") ?>" class="dark-modetextgray"><?php _e("Message") ?></a></li>
                                    <?php } ?>
                                    <li><a href="#" class="dark-modetextgray"><?php _e("Gig Services") ?></a>
                                        <ul class="dropdown-nav">
                                            <?php
                                            if($usertype == "user"){
                                                echo '<li><a href="'.url("POST_SERVICE",false).'" class="dark-modetextgray">'.__("Post a Service").'</a></li>';
                                                echo '<li><a href="'.url("MYSERVICES",false).'" class="dark-modetextgray">'.__("My Services").'</a></li>';
                                            }
                                            ?>
                                            <li><a href="<?php url("SERVICE_ORDERS") ?>" class="dark-modetextgray"><?php _e("Manage Orders") ?></a></li>
                                            <li><a href="<?php url("SERVICE_ORDERS") ?>?status=progress" class="dark-modetextgray"><?php _e("My Progress Orders") ?></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php url("") ?>" class="dark-modetextgray"><?php _e("Projects") ?></a>
                                        <ul class="dropdown-nav">
                                            <?php
                                            if($usertype == "employer"){
                                                echo '<li><a href="'.url("POST-PROJECT",false).'" class="dark-modetextgray">'.__("Post a Project").'</a></li>';
                                            }
                                            ?>
                                            <li><a href="<?php url("MYPROJECTS") ?>" class="dark-modetextgray"><?php _e("Manage Projects") ?> </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php url("") ?>" class="dark-modetextgray"><?php _e("Jobs") ?></a>
                                        <ul class="dropdown-nav">
                                            <li><a href="<?php url("MYJOBS") ?>" class="dark-modetextgray"><?php _e("My Jobs") ?></a></li>
                                            <?php
                                            if($usertype == "employer"){
                                                echo '<li><a href="'.url("POST-JOB",false).'" class="dark-modetextgray">'.__("Post a Job").'</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </li>

                                    <li><a href="<?php url("ACCOUNT_SETTING") ?>" class="dark-modetextgray"><?php _e("Settings") ?></a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->


                <!-- Right Side Content / End -->
                <div class="right-side dark-modeforgray">
                    <?php
                    if($is_login){
                        ?>
                        <!--  User Notifications -->
                        <div class="header-widget hide-on-mobile dark-modeforbordernone" style="display:flex">

 <div class="header-darkmode-toggle header-notifications-trigger" style="top: 34%;
    right: 31%;">
        <a href="javascript:void(0);" id="dark-mode-toggle"><i class="icon-feather-moon dark-modetextgray" id="theme-toggle"></i></a>
    </div> 
                            <!-- Notifications -->
                            <div class="header-notifications padding-0">

                                <!-- Trigger -->
                                <div class="header-notifications-trigger">
                                    <a href="#"><i class="icon-feather-bell dark-modetextgray"></i>
                                        <?php
                                        if($unread_note_count != 0){
                                            echo '<span>'.$unread_note_count.'</span>';
                                        } ?>
                                    </a>
                                </div>

                                <!-- Dropdown -->
                                <div class="header-notifications-dropdown">

                                    <div class="header-notifications-headline">
                                        <h4><?php _e("Notifications") ?></h4>
                                        <button class="hidden mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                                            <i class="icon-feather-check-square"></i>
                                        </button>
                                    </div>

                                    <div class="header-notifications-content">
                                        <div class="header-notifications-scroll" data-simplebar>
                                            <ul>
                                                <?php
                                                //print_r($notification);
                                                foreach($notification as $note){
                                                    $id = $note['product_id'];
                                                    $sender = $note['sender_name'];
                                                    $title = $note['product_title'];
                                                    $nottype = $note['nottype'];
                                                    $msg = $note['message'];
                                                    ?>
                                                    <li class="notifications-not-read">
                                                        <?php if($nottype == "milestone_created"){ ?>
                                                            <a href="<?php url("MILESTONE") ?>/<?php _esc($id) ?>">
                                                                <span class="notification-icon"><i class="icon-material-outline-assignment"></i></span>
                                                                <span class="notification-text"><strong><?php _esc($sender) ?></strong> <?php _e("created a milestone") ?> <?php _esc($msg) ?> <?php _e("for") ?> <span class="color"><?php _esc($title) ?></span></span>
                                                            </a>
                                                        <?php }
                                                        elseif($note['nottype'] == "milestone_request_release"){ ?>
                                                            <a href="<?php url("MILESTONE") ?>/<?php _esc($id) ?>">
                                                                <span class="notification-icon"><i class="icon-material-outline-assignment"></i></span>
                                                                <span class="notification-text"><strong><?php _esc($sender) ?></strong> <?php _e("Request for release") ?> <?php _e("Milestone") ?> <?php _esc($msg) ?> <?php _e("for") ?> <span class="color"><?php _esc($title) ?></span></span>
                                                            </a>
                                                        <?php }
                                                        elseif($note['nottype'] == "milestone_released"){ ?>
                                                            <a href="<?php url("MILESTONE") ?>/<?php _esc($id) ?>">
                                                                <span class="notification-icon"><i class="icon-material-outline-assignment"></i></span>
                                                                <span class="notification-text"><strong><?php _esc($sender) ?></strong> <?php _e("Milestone") ?> <?php _e("Released") ?> <?php _esc($msg) ?> <?php _e("for") ?> <span class="color"><?php _esc($title) ?></span></span>
                                                            </a>
                                                        <?php }
                                                        elseif($note['nottype'] == "deposit"){ ?>
                                                            <a href="javascript:void(0);">
                                                                <span class="notification-icon"><i class="icon-material-outline-monetization-on"></i></span>
                                                                <span class="notification-text"><strong><?php _esc($sender) ?></strong> <?php _e("Deposit") ?> <?php _esc($msg) ?> <?php _e("to") ?> <span class="color"><?php _e("Wallet") ?></span></span>
                                                            </a>

                                                        <?php }
                                                        elseif($note['nottype'] == "new_order"){ ?>
                                                            <a href="<?php url("SERVICE") ?>/<?php _esc($id) ?>">
                                                                <span class="notification-icon"><i class="icon-material-outline-assignment"></i></span>
                                                                <span class="notification-text"><strong><?php _esc($sender) ?></strong> <?php _e("New") ?> <?php _esc($msg) ?> <?php _e("for") ?> <span class="color"><?php _esc($title) ?></span></span>
                                                            </a>
                                                        <?php } else{ ?>
                                                            <a href="#">
                                                                <span class="notification-icon"><i class="icon-material-outline-assignment"></i></span>
                                                                <span class="notification-text"><strong><?php _esc($sender) ?></strong> <?php _esc($msg) ?> <?php _e("for") ?> <span class="color"><?php _esc($title) ?></span></span>
                                                            </a>
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                                <!-- Notification -->

                                            </ul>

                                        </div>
                                    </div>
                                    <a href="<?php url("NOTIFICATIONS") ?>" class="header-notifications-button ripple-effect button-sliding-icon"><?php _e("View All") ?><i class="icon-material-outline-arrow-right-alt"></i></a>
                                </div>

                            </div>

                            <!-- Messages -->
                            <div class="header-notifications hidden">
                                <div class="header-notifications-trigger">
                                    <a href="#"><i class="icon-feather-mail"></i>
                                        <?php
                                        if($unread_message != 0){
                                            echo '<span>'.$unread_message.'</span>';
                                        } ?>
                                    </a>
                                </div>

                                <!-- Dropdown -->
                                <div class="header-notifications-dropdown">

                                    <div class="header-notifications-headline">
                                        <h4><?php _e("Messages") ?></h4>
                                        <button class="hidden mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                                            <i class="icon-feather-check-square"></i>
                                        </button>
                                    </div>

                                    <div class="header-notifications-content">
                                        <div class="header-notifications-scroll" data-simplebar>
                                            <ul>
                                                <?php foreach($chat as $msg){ ?>
                                                    <li class="notifications-not-read">
                                                        <a href="<?php url("MESSAGE") ?>">
                                                            <span class="notification-avatar status-<?php _esc($msg['status']) ?>"><img src="<?php _esc($config['site_url']);?>storage/profile/<?php _esc($msg['image']) ?>" alt=""></span>
                                                            <div class="notification-text">
                                                                <strong><?php _esc($msg['from_name']) ?></strong><br>
                                                                <div class="zechat-message"><i class="fa fa-file-text-o"></i>
                                                                    <?php _esc($msg['post_title']) ?>
                                                                </div>
                                                                <p class="notification-msg-text"><?php _esc($msg['message']) ?></p><br>
                                                                <span class="color"><?php _esc($msg['time']) ?></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <!-- Notification -->
                                            </ul>
                                        </div>
                                    </div>

                                    <a href="<?php url("MESSAGE") ?>" class="header-notifications-button ripple-effect button-sliding-icon"><?php _e("View All Messages") ?><i class="icon-material-outline-arrow-right-alt"></i></a>
                                </div>
                            </div>

                        </div>
                        <!--  User Notifications / End -->

                        <!-- User Menu -->
                        <div class="header-widget dark-modeforbordernone">

                            <!-- Messages -->
                            <div class="header-notifications user-menu">
                                <div class="header-notifications-trigger">
                                    <a href="#"><div class="user-avatar status-online"><img src="<?php _esc($config['site_url']);?>storage/profile/<?php _esc($userpic)?>" alt="<?php _esc($username);?>"></div></a>
                                </div>

                                <!-- Dropdown -->
                                <div class="header-notifications-dropdown">

                                    <!-- User Status -->
                                    <div class="user-status">

                                        <!-- User Name / Avatar -->
                                        <div class="user-details">
                                            <div class="user-avatar status-online"><img src="<?php _esc($config['site_url']);?>storage/profile/<?php _esc($userpic)?>" alt="<?php _esc($username);?>"></div>
                                            <div class="user-name">
                                                <?php _esc($fullname);?> <span>
                                                    <?php
                                                    $usertype = $usertype == 'user' ? 'Freelancer': 'Employer';
                                                    _esc($usertype);
                                                    ?></span>
                                                <div class="dashboard-status-button balance yellow"><?php _esc($config['currency_sign'])?><?php _esc($balance);?></div>
                                            </div>

                                        </div>

                                        <!-- User Status Switcher -->
                                        <div class="status-switch hidden" id="snackbar-user-status">
                                            <label class="user-online current-status"><?php url("Online") ?></label>
                                            <label class="user-invisible"><?php url("Invisible") ?></label>
                                            <!-- Status Indicator -->
                                            <span class="status-indicator" aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <ul class="user-menu-small-nav">
                                        <li><a href="<?php url("DASHBOARD") ?>"><i class="icon-material-outline-dashboard"></i> <?php _e("Dashboard") ?></a></li>
                                        <?php
                                        if($config['quickchat_ajax_on_off'] == 'on' || $config['quickchat_socket_on_off'] == 'on'){
                                            ?>
                                            <li><a href="<?php url("MESSAGE") ?>"><i class="icon-feather-message-circle"></i> <?php _e("Message") ?></a></li>
                                        <?php } ?>
                                        <li><a href="<?php url("ACCOUNT_SETTING") ?>"><i class="icon-material-outline-settings"></i> <?php _e("Account Setting") ?></a></li>
                                          <li><a href="<?php url("BOOKMARK_PAGE") ?>"><i class="fas fa-bookmark"></i> <?php _e("Bookmark") ?></a></li>
                                        <li><a href="<?php url("LOGOUT") ?>"><i class="icon-material-outline-power-settings-new"></i> <?php _e("Logout") ?></a></li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                        <!-- User Menu / End -->
                    <?php } ?>

                    <!-- Mobile Navigation Button -->
                    <span class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
				        </span>

                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->


 <script>
    $(document).ready(function() {
        
    
        function toggleTheme() {
      
        $('body').toggleClass('dark-mode');
        
      
        $('.dark-modeforuser').toggleClass('dark-mode');
          $('.dark-modeforgray').toggleClass('dark-modegray');
                          $('.dark-modetextwhite').toggleClass('dark-modecolorwhite');
                         
                          $('.dark-modetextgray').toggleClass('dark-modecolorgray');
                               $('.dark-modeforborderbottom').toggleClass('dark-modeborderbottom');
                                    $('.dark-modeforborderright').toggleClass('dark-modeborderright');
                                  $('.dark-modeforbordertop').toggleClass('dark-modebordertop');
                                 $('.dark-modeforbordernone').toggleClass('dark-modebordernone');

                                 $('.dark-modefordropdown').toggleClass('dark-modedropdown');
             
                     
                 
            
       
        localStorage.setItem('theme', $('body').hasClass('dark-mode') ? 'dark' : 'light');

       
        $('#theme-toggle').toggleClass('icon-feather-moon icon-feather-sun');
        //   $('#theme-toggleformobile').toggleClass('icon-feather-moon icon-feather-sun dark-modewhite');
   
     }


    $('#dark-mode-toggle').click(function() {
        toggleTheme();
    });

  
    var savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {

        toggleTheme();
    }
   


});

</script>


