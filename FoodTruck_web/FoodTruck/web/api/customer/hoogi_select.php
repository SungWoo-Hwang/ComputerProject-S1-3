<?
include "../../common.php";

$k_keyindex = $_REQUEST['k_keyindex'];


$query = "select * from review_tb as a join mem_tb as b on a.m_keyindex = b.keyindex where a.K_KEYINDEX ='".$k_keyindex."'";
//echo $query;
$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$list[$i] = $row;
	$i++;
}
	
//echo $query ;

api_error('000','ok', $list); //¡§ªÛ

/*
http://wnsti661.cafe24.com/Introduce/web/api/request/insert_request.php?request_id=1&ea=1000
*/

?>
