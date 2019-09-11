<?php
    $data = array("name" => "Grace ", "age" => 19.6);
    $string = http_build_query($data);
    // echo $string;
    $ch = curl_init("http://localhost/upload_data/data.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $response = curl_exec($ch);
    curl_exec($ch);
    curl_close($ch);
?>