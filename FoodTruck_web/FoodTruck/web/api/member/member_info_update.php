<?
include "../../common.php";

$key_index = $_REQUEST['key_index'];
$pw = $_REQUEST['pw'];


$sql = "
		update mem_tb set
			PW = '".$pw."'
		where KEYINDEX=".$key_index;
		mysql_query($sql);


api_error('000','ok', ""); //정상

/*
http://projectn11.vps.phps.kr/MICHAA/web/api/member/member_update.php?mb_id=01055116167&mb_name=김대뻥&birthday_y=1988&birthday_m=10&birthday_d=28&mb_addr=전남 순천시 장선배기길 105&mb_addr_detail=중흥아파트103동 413호
*/

?>
