<?
include "../../common.php";

$key_index = $_REQUEST['key_index'];
$introduce = $_REQUEST['introduce'];


$sql = "
		update mem_tb set
			INTRODUCE = '".$introduce."'
		where KEYINDEX=".$key_index;
		mysql_query($sql);


api_error('000','ok', ""); //����

/*
http://projectn11.vps.phps.kr/MICHAA/web/api/member/member_update.php?mb_id=01055116167&mb_name=��뻽&birthday_y=1988&birthday_m=10&birthday_d=28&mb_addr=���� ��õ�� �弱���� 105&mb_addr_detail=�������Ʈ103�� 413ȣ
*/

?>
