<?
include "../../common.php";

$key_index = $_REQUEST['key_index'];
$onoff = $_REQUEST['onoff'];


$sql = "
		update mem_tb set
			SHOP_KEEPER = '".$onoff."'
		where KEYINDEX=".$key_index;
mysql_query($sql);
//echo $sql; 

$mb = get_key_member($key_index);


api_error('000','ok', $mb); //정상

/*
https://snap50.cafe24.com/FoodTruck/web/api/member/member_on_off.php?key_index=1&onoff=N
*/

?>
