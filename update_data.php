<?php

// set post fields
$mydata = [
    ["user_id"=> "4",
      "shipping_id"=> "1",
      "payment_id"=> "11",
      "products"=> [
        "1"=> ["product_id"=> "17","amount"=> "20"],
        "2"=> ["product_id"=> "12","amount"=> "15"]]
      ],
    
      ["user_id"=> "4",
      "shipping_id"=> "1",
      "payment_id"=> "11",
      "products"=> [
        "1"=> ["product_id"=> "17","amount"=> "30"],
        "2"=> ["product_id"=> "12","amount"=> "25"]]
      ]
    
    ];

$returned_order = array();


getOrderCreated($mydata);


function getOrderCreated($data_to_send){
  for($i=0;$i<sizeof($data_to_send);$i++){  
  makeOrder($data_to_send[$i]);
  }
  return $GLOBALS['returned_order'];
}

function makeOrder($post){
try{
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost/cscart/api/stores/1/orders/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json','Authorization:Basic aGVydm56aWcxQGdtYWlsLmNvbTpkODlmN3VEeUpROTlVd2lENTMwd0VyN2IwNTc2NHJTOA=='));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post,true));

// execute!
$response = curl_exec($ch);

$data = json_decode($response);


// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
// array_push($GLOBALS['returned_order'],$data['order_id']);
}catch(Exception $e){
error_log($e.getMessage());
}

}

?>


