<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$sign = $_REQUEST['sign'];
$member = get_member($mb_id);


//echo $register_os;
if($mb_id == "") api_error('001','no id data'); //아이디 값이 없다
if($sign == "") api_error('002','no sign data'); //사인정보값이 없다
if($member['idx'] == "") api_error('003','no member data'); //회원정보가 없다

$sql = "
	update ".$TBA['MEM_TABLE']." set
		sign_data='".$sign."'
	where mb_id='".$mb_id."'
";
mysql_query($sql);


$mb = get_member($mb_id);

if($mb['sign_data'] == "") api_error('004','database error'); //디비 저장이 안됐다.

api_error('000','ok', $mb); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/quick_sign.php?mb_id=test&sign=test11111
*/
?>