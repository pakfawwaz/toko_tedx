<?php

namespace Midtrans;

require_once dirname(__FILE__) . '/Midtrans.php';
//Set Your server key
Config::$serverKey = "Mid-server-53fZHdvxICHSPWGgRt3lpPX9";

// Uncomment for production environment
Config::$isProduction = true;

// Uncomment to enable sanitization
// Config::$isSanitized = true;

// Uncomment to enable 3D-Secure
// Config::$is3ds = true;

// Required

// Optional

include 'includes/session.php';
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products on products.id=cart.product_id WHERE user_id=:user_id");
        $stmt->execute(['user_id'=>$user['id']]);

        $total = 0;
        $count=0;
        foreach($stmt as $row){
            $item_details[$count] = array(
                    'id' => 'a1',
                    'price' => $row['price'],
                    'quantity' => $row['quantity'],
                    'name' => $row['name']
                );
            $subtotal =  $row['price']*$row['quantity'];
            $total += $subtotal;
            $count=$count+1;
        }


$transaction_details = array(
    'order_id' => rand(),
);


$billing_address = array(
    'first_name'    => $user['firstname'],
    'last_name'     => $user['lastname'],
    'address'       => $user['address'],
    'phone'         => $user['contact_info'],
    'country_code'  => 'IDN'
);

// Optional
$shipping_address = array(
    'first_name'    => $user['firstname'],
    'last_name'     => $user['lastname'],
    'address'       => $user['address'],
    'phone'         => $user['contact_info'],
    'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
    'first_name'    => $user['firstname'],
    'last_name'     => $user['lastname'],
    'email'         => $user['email'],
    'phone'         => $user['contact_info'],
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);

// Fill SNAP API parameter
$params = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

try {
    // Get Snap Payment Page URL
    $paymentUrl = Snap::createTransaction($params)->redirect_url;
  
    // Redirect to Snap Payment Page
    header('Location: ' . $paymentUrl);
}
catch (Exception $e) {
    echo $e->getMessage();
}
