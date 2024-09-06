<?php
overall_header(__("Membership Plan"));
?>
<style>



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
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php _e("Membership Plan") ?></h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("Membership Plan") ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Content
================================================== -->
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <form name="form1" method="post">
                <div class="billing-cycle-radios margin-bottom-70">
                    

<!---membership plan new--->
<?php if($userinfotype=='employer'){ ?>
<div class="section gray padding-top-60 padding-bottom-75">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline centered margin-top-0 margin-bottom-75">
                    <h3><?php _e("Membership Plan") ?></h3>
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
</div>
            </form>
        </div>
    </div>
</div>
<div class="margin-top-80"></div>
<?php
overall_footer();
?>