<?
include "../../common.php";

$type = $_REQUEST['type'];		//0 : ��ü , 1 : �Ұ���
	
if($type == "") api_error('001','type �����ϴ�.'); 

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

if($i == 0) api_error('002','�����Ͱ� �����ϴ�.'); 



api_error('000','ok', $list); //����


/*
�׽�Ʈ url
http://wnsti661.cafe24.com/bodo/web/api/notice/sel_notice.php?type=0
*/
?>
