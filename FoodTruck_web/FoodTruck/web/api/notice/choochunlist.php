<?
include "../../common.php";
$member_id = $_REQUEST['member_id'];




$query = "select * from ".$TBA['JY_MEMBER']." WHERE choochun = '".$member_id."'";
    //$query = "select * from ".$TBA['JY_NOTICE']." order by key_index desc";


//echo $query;
$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$list[$i] = $row;
	$i++;
}
//echo $i;
if($i == 0) api_error('002','데이터가 없습니다.'); 

api_error('000','ok', $list); //정상


?>