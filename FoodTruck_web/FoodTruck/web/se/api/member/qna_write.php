<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$qus_type = $_REQUEST['qus_type'];
$qus_comment = $_REQUEST['qus_comment'];
$member = get_member($mb_id);

if($mb_id == "") api_error('001','no mb_id data'); //아이디 값이 없다
if($qus_type == "") api_error('002','no qus_type data'); //문의유형 값이 없다
if($qus_comment == "") api_error('003','no qus_comment data'); //문의 내용 값이 없다
if($member['idx'] == "") api_error('004','no member data'); //회원정보가 없다


$sql = "
	insert into ".$TBA['QNA_TABLE']." set
		signdate='".mktime()."',
		signdate_datetime='".date('Y-m-d H:i:s')."',
		mb_id='".$mb_id."',
		mb_name='".$member['mb_name']."',
		mb_nick='".$member['mb_nick']."',
		mb_hp='".$member['mb_hp']."',
		qus_type='".$qus_type."',
		qus_comment='".$qus_comment."',
		qna_type='0'
";
mysql_query($sql);

$row = sql_fetch( "select * from ".$TBA['QNA_TABLE']." where mb_id='".$mb_id."' order by idx desc limit 1" );

api_error('000','ok', $row); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/qna_write.php?mb_id=test&qus_type=배송지연&qus_comment=동해물과 백두산이 마르고 닳도록
*/
?>