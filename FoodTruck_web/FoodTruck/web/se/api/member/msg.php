<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$mb_name = $_REQUEST['mb_name'];
$recive_id = $_REQUEST['recive_id'];
$recive_name = $_REQUEST['recive_name'];
$comment = $_REQUEST['comment'];
$member = get_member($mb_id);
$revice_member = get_member($recive_id);


//echo $register_os;
if($mb_id == "") api_error('001','no id data'); //아이디 값이 없다
if($mb_name == "") api_error('002','no mb_name data'); //이름 값이 없다
if($recive_id == "") api_error('003','no recive_id data'); //받는이 아이디 값이 없다
if($recive_name == "") api_error('004','no recive_name data'); //받는이 이름 값이 없다
if($comment == "") api_error('005','no comment data'); //내용 값이 없다
if($member['idx'] == "") api_error('006','no member data'); //보내는이 회원정보가 없다
if($revice_member['idx'] == "") api_error('007','no revice member data'); //받는이의 회원정보가 없다

$comment = str_replace("\"","&quot;", $comment);
$comment = str_replace("'","&acute;", $comment);
$sql = "
	insert into ".$TBA['MSG_TABLE']." set
		signdate='".mktime()."',
		signdate_datetime='".date('Y-m-d H:i:s')."',
		mb_id='".$mb_id."',
		mb_name='".$mb_name."',
		recive_id='".$recive_id."',
		recive_name='".$recive_name."',
		comment='".$comment."'
";
mysql_query($sql);


api_error('000','ok', $member); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/msg.php?mb_id=test&mb_name=김대호&recive_id=snap40&recive_name=심규용&comment=동해물과백두산이 마르고닳도록
*/
?>