<?
include "../../common.php";

	
$self_id = $_REQUEST['self_id'];//echo $request_id;


$query = "select * from ".$TBA['JY_INTRODUCTION_STATUS']." as A JOIN ".$TBA['JY_MEMBER']." AS B ON A.self_id = B.key_index and A.self_id ='".$self_id."'";

//echo $query;
$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$list[$i] = $row;
	$i++;
}

if($i == 0) api_error('001','데이터가 없습니다.'); 



api_error('000','ok', $list); //정상


/*
테스트 url
http://wnsti661.cafe24.com/Introduce/web/api/introduction/sel_introduction_status.php
*/
?>