<?
include "../../common.php";

$mb_hp = $_REQUEST['phone_number'];
$mb_hp = str_replace("-","",$mb_hp);





//echo $register_os;
if($mb_hp == "") api_error('001','no mb_hp data'); //전화번호 값이 없다


$row = sql_fetch( "select * from ".$TBA['MEM_TABLE']." where mb_hp='".$mb_hp."' order by idx limit 1" );

$member = get_member($row['mb_id']);

if($member['idx'] == "") api_error('002','no member data'); //전화번호로 검색한 회원정보가 없다.

api_error('000','ok', $member); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/find_id.php?phone_number=01055116166
*/
?>