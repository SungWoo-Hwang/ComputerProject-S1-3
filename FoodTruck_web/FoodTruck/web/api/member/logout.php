<?
include "../../common.php";
$key_index = $_REQUEST['key_index'];
$login_type = $_REQUEST['login_type'];




if($login_type == 0){
	//업체일때 상태 OFF
	$sql = "UPDATE jy_member SET token = '' , ing_status=0 WHERE key_index = ".$key_index;
	mysql_query($sql);
}else{
	$sql = "UPDATE jy_member SET token = '' WHERE key_index = ".$key_index;
	mysql_query($sql);
}

api_error('000','ok', ""); 

/*
http://wnsti661.cafe24.com/Introduce/web/api/member/find_id.php?phone=01027065914&hint=snap40
*/

?>