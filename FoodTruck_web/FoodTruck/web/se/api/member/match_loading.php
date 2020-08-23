<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$match_loading_data = $_REQUEST['match_loading_data'];
$member = get_member($mb_id);


//echo $register_os;
if($mb_id == "") api_error('001','no id data'); //아이디 값이 없다
if($match_loading_data == "") api_error('002','no match_loading_data data'); //매칭 대기 시간 값이 없다
if($member['idx'] == "") api_error('003','no member data'); //회원정보가 없다

$sql = "
	update ".$TBA['MEM_TABLE']." set
		matching_loading_time='".$match_loading_data."'
	where mb_id='".$mb_id."'
";
mysql_query($sql);

$mb = get_member($mb_id);

api_error('000','ok', $mb); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/match_loading.php?mb_id=test&match_loading_data=60
*/
?>