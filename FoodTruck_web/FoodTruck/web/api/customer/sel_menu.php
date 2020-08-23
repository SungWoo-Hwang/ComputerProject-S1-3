<?
include "../../common.php";

$m_keyindex = $_REQUEST['m_keyindex'];
	


$query = "select * from keepermenu_tb where M_KEYINDEX ='".$m_keyindex."'";
//echo $query;
$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$list[$i] = $row;
	$i++;
}

if($i == 0) api_error('002','데이터가 없습니다.'); 



api_error('000','ok', $list); //정상


/*
테스트 url
http://snap50.cafe24.com/FoodTruck/web/api/customer/sel_menu.php
*/
?>