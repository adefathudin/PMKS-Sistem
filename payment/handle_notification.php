<?php
require_once(dirname(__FILE__) . '/Veritrans.php');
Veritrans_Config::$isProduction = true;
Veritrans_Config::$serverKey = 'Mid-server-E_OTckBg2L0a02es6LL_suIL';



if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {


 try {
  $notif = new Veritrans_Notification();
} catch (Exception $e) {
  echo "Exception: ".$e->getMessage()."\r\n";
  echo "Notification received: ".file_get_contents("php://input");
  exit();
} 
$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;
if ($transaction == 'capture') {
  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
  if ($type == 'credit_card'){
    if($fraud == 'challenge'){
      // TODO set payment status in merchant's database to 'Challenge by FDS'
      // TODO merchant should decide whether this transaction is authorized or not in MAP
      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
      }
      else {
      // TODO set payment status in merchant's database to 'Success'
      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
      }
    }
  }
else if ($transaction == 'settlement'){
  // TODO set payment status in merchant's database to 'Settlement'
  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
  }
  else if($transaction == 'pending'){
  // TODO set payment status in merchant's database to 'Pending'
  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
  }
  else if ($transaction == 'deny') {
  // TODO set payment status in merchant's database to 'Denied'
  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
  }
  else if ($transaction == 'expire') {
  // TODO set payment status in merchant's database to 'expire'
  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
  }
  else if ($transaction == 'cancel') {
  // TODO set payment status in merchant's database to 'Denied'
  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
}


} else {


    //
    // order_id=776981683&status_code=200&transaction_status=capture

    $order_id = $_GET['order_id'];
    $statusCode = $_GET['status_code'];
    $transaction  = $_GET['transaction_status'];


	if($transaction == 'capture') {
	  echo "<p>Transaksi berhasil.</p>";
	  echo "<p>Status transaksi untuk order id : " . $order_id;

	}
	// Deny
	else if($transaction == 'deny') {
	  echo "<p>Transaksi ditolak.</p>";
	  echo "<p>Status transaksi untuk order id .: " . $order_id;

	}
	// Challenge
	else if($transaction == 'challenge') {
	  echo "<p>Transaksi challenge.</p>";
	  echo "<p>Status transaksi untuk order id : " . $order_id;

	}
	// Error
	else {
	  echo "<p>Terjadi kesalahan pada data transaksi yang dikirim.</p>";
	  echo "<p>Status message: [$response->status_code] " . $transaction;
	}


}