<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

require 'lib/autoload.php';
use YooKassa\Client;
global $config,$lang,$link;

if(isset($access_token)){
    $user_id = $_SESSION['user']['id'];
    $username = $_SESSION['user']['username'];
    $payment_type = $_SESSION['quickad'][$access_token]['payment_type'];
    $title = $_SESSION['quickad'][$access_token]['name'];
    $amount = $_SESSION['quickad'][$access_token]['amount'];
    $trans_desc = isset($_SESSION['quickad'][$access_token]['trans_desc']) ? $_SESSION['quickad'][$access_token]['trans_desc'] : $title;

    if($payment_type == "order") {
        $restaurant_id = $_SESSION['quickad'][$access_token]['restaurant_id'];
        $restaurant = ORM::for_table($config['db']['pre'] . 'restaurant')
            ->find_one($restaurant_id);

        $userdata = get_user_data(null, $restaurant['user_id']);
        $user_email = ''; //Please Pass buyer valid email id here its required.
        $currency = !empty($userdata['currency'])?$userdata['currency']:get_option('currency_code');

        $phonepe_api_key = get_restaurant_option($restaurant_id,'restaurant_phonepe_api_key');
        $phonepe_secret_key = get_restaurant_option($restaurant_id,'restaurant_phonepe_secret_key');
    }else{
        $currency = $config['currency_code'];

        $phonepe_api_key = get_option('phonepe_api_key');
        $phonepe_secret_key = get_option('phonepe_secret_key');

        $userdata = get_user_data(null, $user_id);
        $user_email = $userdata['email'];
    }

    $order_id = isset($_SESSION['quickad'][$access_token]['order_id'])? $_SESSION['quickad'][$access_token]['order_id'] : rand(1,400);

}else{
    error(__("Invalid Payment Processor"), __LINE__, __FILE__, 1);
    exit();
}

$return_url = $link['IPN']."?access_token=".$access_token."&i=yoomoney";
$cancel_url = $link['PAYMENT']."?access_token=".$access_token."&status=cancel";

$curl = curl_init();

$customer_email = $user_email;
$amount = $amount;
$currency = $currency;
$redirect_url = $return_url;


$client = new \YooKassa\Client();
$client->setAuth($yoomoney_shop_id, $yoomoney_secret_key);

try {
    $idempotenceKey = uniqid('', true);
    $response = $client->createPayment(
        array(
            'amount' => array(
                'value' => $amount,
                'currency' => $currency,
            ),
            'confirmation' => array(
                'type' => 'redirect',
                'return_url' => $redirect_url,
            ),
            'capture' => true,
            'description' => $trans_desc,
            'metadata' => array(
                'orderNumber' => $order_id
            )
        ),
        $idempotenceKey
    );

    //получаем confirmationUrl для дальнейшего редиректа
    $confirmationUrl = $response->getConfirmation()->getConfirmationUrl();
} catch (\Exception $e) {
    $response = $e;
}

if (!empty($response)) {
    echo "<pre>";
    print_r($response);
    echo "</pre>";
}