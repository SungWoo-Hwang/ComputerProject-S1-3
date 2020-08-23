<?
include "../../common.php";

$type = $_REQUEST['type'];		//0 : 업체 , 1 : 소개소
	
if($type == "") api_error('001','type 없습니다.'); 

if($type == 'ALL'){
    $query = "select * from ".$TBA['JY_NOTICE']." order by key_index desc";
}else{
    $query = "select * from ".$TBA['JY_NOTICE']." where type = '".$type."' order by key_index desc";
}

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
http://wnsti661.cafe24.com/bodo/web/api/notice/sel_notice.php?type=0
*/
?>
