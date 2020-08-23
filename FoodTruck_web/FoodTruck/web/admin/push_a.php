<?php

define("GOOGLE_API_KEY", "AAAAVDhA4K8:APA91bEJe0PDb-QPUmaHFCsXphXaSZNSqQEZnEb48cQ10Ts-LRdLN0KeEIgM1zqk76AGIF_pU-Gk5UhZe_JmWRdsuVnvL_aga9ZxYGWRu_Qm7yOX7Ax3B4Fi1-ZPmvz3N7ICUftycV8o");
define("GOOGLE_GCM_URL", "https://fcm.googleapis.com/fcm/send");

function send_gcm_notify($reg_id, $message ,$url) {

	
    $fields = array(
        'registration_ids'  => array( $reg_id ),
        'data'              => array( "msg" => $message , "url" => $url ),
    );

    $headers = array(
        'Authorization: key=AAAAVDhA4K8:APA91bEJe0PDb-QPUmaHFCsXphXaSZNSqQEZnEb48cQ10Ts-LRdLN0KeEIgM1zqk76AGIF_pU-Gk5UhZe_JmWRdsuVnvL_aga9ZxYGWRu_Qm7yOX7Ax3B4Fi1-ZPmvz3N7ICUftycV8o',
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Problem occurred: ' . curl_error($ch));
    }

    curl_close($ch);
    echo $result;
 }

    //token
$reg_id = "eDBnoUVs58U:APA91bEt0UtHyL5cI-TrNoFFJdJawxK9DeF0Hfic5NjxV6g1yqgYziK3dQZXchqKnRVT95OkKXM5OZp7-HdNg43-c1QbQH4A1dUC1lRwSxbyCHzoDlYz2hwL4vOhT99lHfuQzhir0fNg";
$msg = "테스트입니다..";
$url = "https://www.naver.com/";

send_gcm_notify($reg_id, $msg , $url);
?>
