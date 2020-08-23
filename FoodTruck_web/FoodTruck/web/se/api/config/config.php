<?
include "../../common.php";

$config = sql_fetch( "select * from ".$TBA['CONFIG_TABLE']." order by idx limit 1" );

$charge_point = explode("[@]", $config['charge_point_set']);

api_config($charge_point, $config); 
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/config/config.php
*/
?>