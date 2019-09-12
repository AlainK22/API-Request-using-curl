<?php
// set post fields
$mydata =[
      [
        [
          "product_id"=> 1,
          "amount"=> 10
        ],
        [
          "product_id"=> 1,
          "amount"=> 10
        ]
      ],
      [
        [
          "product_id"=> 1,
          "amount"=> 10
        ]
      ]
      ];



$returned_order = array();
$results = getOrderCreated($mydata);
var_dump($results);

function getOrderCreated($data_to_send){
  for($i=0;$i<sizeof($data_to_send);$i++){  
  makeOrder($data_to_send[$i]);
  }
  return $GLOBALS['returned_order'];
}
function makeOrder($post){
try{
  $data = ["user_id"=> "2",
  "shipping_id"=> "1",
  "payment_id"=> "1",
  "products"=> $post
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://localhost/cscart/api/stores/1/orders/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json','Authorization:Basic YS5rYW1hbmRhQGhlaGUucnc6VVMwMDI4TTl6QjN1YVhxMzI3UTQxcDdlNDE5Um40NU0='));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data,true));
// execute!
$response = curl_exec($ch);
$data = json_decode($response);
$dump= var_dump($data);
echo $dump;
// close the connection, release resources used
curl_close($ch);
// do anything you want with your response
 //array_push($GLOBALS['returned_order'],$data['order_id']);
}catch(Exception $e){
error_log($e.getMessage());
}
}
?>
