<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$mb_nick = $_REQUEST['mb_nick'];
$mb_hp = $_REQUEST['mb_hp'];
$before_pass = $_REQUEST['before_pass'];
$after_pass = $_REQUEST['after_pass'];
$after_pass_ck = $_REQUEST['after_pass_ck'];

$member = get_member($mb_id);

if($mb_id == "") api_error('001','no mb_id data'); //아이디 값이 없다
if($mb_nick == "") api_error('002','no mb_nick data'); //닉네임 값이 없다
if($mb_hp == "") api_error('003','no mb_hp data'); //핸드폰 값이 없다
if($member['idx'] == "") api_error('004','no member data'); //회원정보가 없다

if($before_pass != ""){
	$be_password = get_encrypt_string($before_pass);
	if($member['mb_password'] != $be_password) api_error('005','no before password match'); //기존 비밀번호가 틀리다
	if($after_pass != $after_pass_ck) api_error('006','no after password match'); //새비밀번호와 비밀번호 확인이 틀리다
	$af_password = get_encrypt_string($after_pass);
	$password_sql = ", mb_password='".$af_password."'";
}

$mrow = sql_fetch( "select * from ".$TBA['MEM_TABLE']." where mb_nick='".$mb_nick."'" );
if($mrow['idx'] != "") api_error('007','have nickname value.'); //사용중인 닉네임이 있다

$sql = "
	update ".$TBA['MEM_TABLE']." set
		mb_nick='".$mb_nick."',
		mb_hp='".$mb_hp."'
		".$password_sql."
	where mb_id='".$mb_id."'
";
mysql_query($sql);

$mb = get_member($mb_id);

api_error('000','ok', $mb); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/modify.php?mb_id=test&mb_nick=test2&mb_hp=010-5511-6166&before_pass=test&after_pass=test22&after_pass_ck=test22
*/
?>