<?
include "../../common.php";

$query = "select * from ".$TBA['JY_MEMBER']." where accesse_yn = 'N' and use_y_date = '' ORDER BY  signdate DESC ";
//echo $query;
$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$list[$i] = $row;
	$i++;
}

if($i == 0) api_error('002','데이터가 존재하지 않습니다.'); 



api_error('000','ok', $list); 

/*
http://projectn11.vps.phps.kr/MICHAA/web/api/member/login_store.php?login_id=michaa001&login_pw=1234
*/

?>