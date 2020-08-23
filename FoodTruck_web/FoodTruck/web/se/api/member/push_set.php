<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$push_set = $_REQUEST['push_set'];
$member = get_member($mb_id);


//echo $register_os;
if($mb_id == "") api_error('001','no id data'); //아이디 값이 없다
if($push_set == "") api_error('002','no push_set data'); //푸시 설정 값이 없다
if($member['idx'] == "") api_error('003','no member data'); //회원정보가 없다

$sql = "
	update ".$TBA['MEM_TABLE']." set
		push_set='".$push_set."'
	where mb_id='".$mb_id."'
";
mysql_query($sql);

$mb = get_member($mb_id);

api_error('000','ok', $mb); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/push_set.php?mb_id=test&push_set=0
*/
?>