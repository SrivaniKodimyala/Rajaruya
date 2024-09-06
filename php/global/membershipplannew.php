<?php
require_once("includes/lib/curl/curl.php");
require_once("includes/lib/curl/CurlResponse.php");

if(checkloggedin())
{


    if(isset($_REQUEST['upgrade']))
    {
   

    $plan_name=$_POST['plan_name'];


    $title=$plan_name;
    $amount=$_POST['amount'];
$plan_id=$_POST['plan_id'];
 
 
 $term='YEARLY';

    $payment_type = "membershipsubscr";
    if(isset($_POST['payment_method_id']))
    {

  

        $access_token = uniqid();
        $_SESSION['quickad'][$access_token]['name'] = $title . " " . __("Membership Plan");
    
        $_SESSION['quickad'][$access_token]['amount'] = $amount;
        $_SESSION['quickad'][$access_token]['base_amount'] = $amount;
        $_SESSION['quickad'][$access_token]['payment_type'] = $payment_type;
        $_SESSION['quickad'][$access_token]['sub_id'] = $plan_id;
        $_SESSION['quickad'][$access_token]['plan_interval'] = $term;
      

        if($_POST['payment_method_id'] == "wallet"){
            $_SESSION['quickad'][$access_token]['folder'] = "wallet";
       
            $user_data = get_user_data(null,$_SESSION['user']['id']);
            $user_balance = $user_data['balance'];
            if($user_balance < $amount)
            {
                $message = __("Wallet balance must be grater than").' '.$config['currency_sign'].$amount.'.';
                error($message, __LINE__, __FILE__, 1);
                exit();
            }
            else {
                $deducted = $user_balance - $amount;
                //Minus From Employer Account
                $user_update = ORM::for_table($config['db']['pre'] . 'user')->find_one($_SESSION['user']['id']);
                $user_update->set('balance', $deducted);
                $user_update->save();
            }
            /*Success*/
            payment_success_save_detail($access_token);
            exit();
        }

        $info = ORM::for_table($config['db']['pre'] . 'payments')
            ->where(array(
                'payment_id' => $_POST['payment_method_id'],
                'payment_install' => '1'
            ))
            ->find_one();

        $folder = $info['payment_folder'];

        if ($folder == "2checkout") {
            $_SESSION['quickad'][$access_token]['firstname'] = $_POST['checkoutCardFirstName'];
            $_SESSION['quickad'][$access_token]['lastname'] = $_POST['checkoutCardLastName'];
            $_SESSION['quickad'][$access_token]['BillingAddress'] = $_POST['checkoutBillingAddress'];
            $_SESSION['quickad'][$access_token]['BillingCity'] = $_POST['checkoutBillingCity'];
            $_SESSION['quickad'][$access_token]['BillingState'] = $_POST['checkoutBillingState'];
            $_SESSION['quickad'][$access_token]['BillingZipcode'] = $_POST['checkoutBillingZipcode'];
            $_SESSION['quickad'][$access_token]['BillingCountry'] = $_POST['checkoutBillingCountry'];
        }

        $_SESSION['quickad'][$access_token]['payment_mode'] = !empty($_POST['payment_mode']) ? $_POST['payment_mode'] : 'one_time';
        if($folder == 'paypal' || $folder == 'stripe'){
            $payment_mode = get_option($folder.'_payment_mode');
            if($payment_mode == 'both'){
                $_SESSION['quickad'][$access_token]['payment_mode'] = !empty($_POST['payment_mode']) ? $_POST['payment_mode'] : 'one_time';
            }else{
                $_SESSION['quickad'][$access_token]['payment_mode'] = $payment_mode;
            }
        }

        $_SESSION['quickad'][$access_token]['folder'] = $folder;

        if (file_exists('includes/payments/' . $folder . '/pay.php')) {
            require_once('includes/payments/' . $folder . '/pay.php');
        } else {
            error(__("This payment method is not enabled."), __LINE__, __FILE__, 1);
            exit();
        }

    }
else{
    
 
    $payment_types = array();
    $rows = ORM::for_table($config['db']['pre'].'payments')
        ->where('payment_install', '1')
        ->find_many();

    $num_rows = count($rows);
    foreach ($rows as $info)
    {
        $payment_image = $config['site_url']."includes/payments/".$info['payment_folder']."/logo/logo.png";
        $payment_types[$info['payment_id']]['id'] = $info['payment_id'];
        $payment_types[$info['payment_id']]['title'] = $info['payment_title'];
        $payment_types[$info['payment_id']]['folder'] = $info['payment_folder'];
        $payment_types[$info['payment_id']]['desc'] = $info['payment_desc'];
        $payment_types[$info['payment_id']]['image'] = $payment_image;
    }
    $bank_information = nl2br(get_option('company_bank_info'));
    $userdata = get_user_data($_SESSION['user']['username']);
    $email = $userdata['email'];
    $user_balance = $userdata['balance'];

if($term == 'YEARLY') {
        $period = 31536000;
    }

    $expires = (time()+$period);
    $start_date = date("d-m-Y",time());
    $expiry_date = $period ? date("d-m-Y",$expires) : __("Lifetime");

    HtmlTemplate::display('global/membershipplannew_payment', array(
        'payment_types' => $payment_types,
       
        'payment_method_count' => $num_rows,
        'bank_info' => $bank_information,
        'order_title' => $title,
        'amount' => $amount,
        'user_balance' => $user_balance,
        'start_date' => $start_date,
        'expiry_date' => $expiry_date,
        'email' => $email,
        'country_code' => strtoupper(check_user_country()),
        'stripe_publishable_key' => isset($config['stripe_publishable_key'])? $config['stripe_publishable_key']: '',
        'paystack_public_key' => isset($config['paystack_public_key'])? $config['paystack_public_key']: '',
        'sandbox_mode_2checkout' => isset($config['2checkout_sandbox_mode'])? $config['2checkout_sandbox_mode']: '',
        'checkout_account_number' => isset($config['checkout_account_number'])? $config['checkout_account_number']: '',
        'checkout_public_key' => isset($config['checkout_public_key'])? $config['checkout_public_key']: '',
        'token' => ''
    ));
    exit;

}}
else
{


    $upgrades = array();

    if(isset($_GET['change_plan']) && $_GET['change_plan'] == "changeplan")
    {
      
        if(isset($_SESSION['user']['id'])) {
   
            $userdata = get_user_data(null,$_SESSION['user']['id']);
            
            $membershipplan_id=$userdata['membershipplan_id'];
            $userinfotype=$userdata['user_type'];
        
            $info = ORM::for_table($config['db']['pre'].'membershipupgrades')
            ->where('user_id', $_SESSION['user']['id'])
            ->find_one();
        
        
        if(!isset($info['sub_id'])){
           
            $upgrades_term = $upgrades_start_date = $upgrades_expiry_date = '-';
        }else{
           
             
            $upgrades_start_date = date("d-m-Y",$info['upgrade_lasttime']);
            $upgrades_expiry_date = date("d-m-Y",$info['upgrade_expires']);
        }
        
        
        
        
        }
     
        //Print Template
        HtmlTemplate::display('global/membershipplannew_plan', array(
            'membershipplan_id' =>  $membershipplan_id,
            'userinfotype' =>  $userinfotype,
            'today_date' => $today_date,
            'upgrades_start_date' => $upgrades_start_date,
            'upgrades_expiry_date' => $upgrades_expiry_date
        ));
        exit;
    }
    else{
        
        
    $info = ORM::for_table($config['db']['pre'].'membershipupgrades')
        ->where('user_id', $_SESSION['user']['id'])
        ->find_one();

    $show_cancel_button = 0;
    $payment_mode = 'one_time';
    if(!isset($info['sub_id'])){
       
        $upgrades_term = $upgrades_start_date = $upgrades_expiry_date = '-';
    }else{
       
         
        $upgrades_start_date = date("d-m-Y",$info['upgrade_lasttime']);
        $upgrades_expiry_date = date("d-m-Y",$info['upgrade_expires']);
    }
    $upgrades_title = '';
    if($info['sub_id']==2){
$upgrades_title='Basic';
    }
    elseif($info['sub_id']==3){
        $upgrades_title='Premium';
            } 
            else{
                $upgrades_title='Free';
                    }
    
   

    //Print Template
    HtmlTemplate::display('global/membershipplannew_current', array(
        'upgrades_title' => $upgrades_title,
        'upgrades_start_date' => $upgrades_start_date,
        'upgrades_expiry_date' => $upgrades_expiry_date,
        'payment_mode' => $payment_mode,
        'show_cancel_button' => $show_cancel_button
    ));
    exit;
}

}
}
else
{
    headerRedirect($link['LOGIN']);
}