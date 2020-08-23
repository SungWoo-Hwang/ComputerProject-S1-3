<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$member = get_member($mb_id);


//echo $register_os;
if($mb_id == "") api_error('001','no id data'); //아이디 값이 없다
if($member['idx'] == "") api_error('002','no member data'); //회원정보가 없다

$sql = "
	update ".$TBA['MEM_TABLE']." set
		abort_date='".date('Y-m-d H:i:s')."',
		abort_member_ck='1'
	where mb_id='".$mb_id."'
";
mysql_query($sql);

$mb = get_member($mb_id);

api_error('000','ok', $mb); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/abort_member.php?mb_id=test
*/
?>