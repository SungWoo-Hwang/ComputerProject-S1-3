<?
include "../../common.php";

$query = "select * from ".$TBA['JY_ACCOUNT']." as A JOIN ".$TBA['JY_MEMBER']." AS B ON A.self_id = B.key_index and A.status=0 order by A.date desc";

//$query = "select * from ".$TBA['JY_INTRODUCTION_STATUS']." as A JOIN ".$TBA['JY_MEMBER']." AS B ON A.self_id = B.key_index";

//echo $query;
$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$list[$i] = $row;
	$i++;
}

if($i == 0) api_error('002','데이터가 없습니다.'); 



api_error('000','ok', $list); 

/*
http://projectn11.vps.phps.kr/MICHAA/web/api/member/login_store.php?login_id=michaa001&login_pw=1234
*/

?>
