<?
include "../../common.php";

	
$key_index = $_REQUEST['key_index'];


$query = "select * from ".$TBA['JY_REQUEST']." where request_id = '".$key_index."'";
//echo $query;
$mb = sql_fetch($query);

api_error('000','ok', $mb); //����


/*
�׽�Ʈ url
http://wnsti661.cafe24.com/Introduce/web/api/request/my_sel_request.php?key_index=1
*/
?>