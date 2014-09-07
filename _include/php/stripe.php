<?php
/*
* stripe Form Class
*/

require('../../vendor/stripe/stripe-php/lib/Stripe.php');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account
//sk_test_M6X3oFRbstm8VuBwoTJNZUXG
//sk_live_0wtSTDiYACsKvfC3YBgXN9ZE
Stripe::setApiKey("sk_test_M6X3oFRbstm8VuBwoTJNZUXG");

// Get the credit card details submitted by the form
$token = $_POST['token'];
$amount = $_POST['amount'];
$currency = $_POST['currency'];
$description = $_POST['description'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
$charge = Stripe_Charge::create(array(
  "amount" => $amount, // amount in cents, again
  "currency" => $currency,
  "card" => $token,
  "description" => $description)
);
		$response = array();
		$response['status'] = 1;	
		
		echo json_encode($response);
} catch(Stripe_CardError $e) {
  // The card has been declined
}
?>