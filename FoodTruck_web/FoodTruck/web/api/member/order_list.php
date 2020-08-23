<?
include "../../common.php";

$f_keyindex = $_REQUEST['f_keyindex'];
	


$query = "select d.NAME , a.DATE , c.NAME AS M_NAME,d.PRICE from order_tb  a
	Inner join keepermenu_tb  b
	on a.N_KEYINDEX = b.KEYINDEX
	Inner join mem_tb c
		on c.KEYINDEX = a.F_KEYINDEX
Inner join keepermenu_tb d
		on d.KEYINDEX = a.N_KEYINDEX where a.F_KEYINDEX ='".$f_keyindex."'";
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