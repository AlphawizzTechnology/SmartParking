<?php


    $device_id = "f8-9iVo7R3epredLZbk4dl:APA91bFFQv_Zv9elW29eVqlRlEq44rpTQ0YjQ67FBgaAZ7rsSQsiP9ICvVJ_qrNzVVEM64ICHYtDiGL3kymNIAij-iDY3ddfQpQa9Pt9c6r6_RxSmEKH318RyO0gKArEPjVz8pygNHeQ";

    $url = "https://fcm.googleapis.com/fcm/send";
    $token = $device_id;
    $serverKey = 'AAAAEG7lRsY:APA91bFY-F4jWnH0iBac8gzq7NP6JUU2dHTuI8gNA2PvjCgx8m58a04r-L5VAE4ercB79xkmtFu5adfVAzI2ZQsO-Ep21Y8FUTMtAzRN3cAZXzBN0kdoA2Dp8d-McVu0UmWcmyHsKolw';
    $title = "Notification title";
    $body = "Hello aaa this is a android push notifiaction............";
    $notification = array('title' =>$title , 'body' => $body);
    $arrayToSend = array('to' => $token, 'notification' => $notification,'title'=>$title);
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    // curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    //return $response;
    echo $response;
    // var_dump($response);exit;
?>