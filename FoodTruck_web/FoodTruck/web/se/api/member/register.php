<?
include "../../common.php";

$device = $_REQUEST['device'];
$token = $_REQUEST['token'];
$mb_id = $_REQUEST['mb_id'];
$mb_password = $_REQUEST['mb_password'];
$mb_name = $_REQUEST['mb_name'];
$mb_hp = $_REQUEST['mb_hp'];
$mb_hp = str_replace("-","",$mb_hp);
//echo $register_os;

if($device == "") api_error('002','no device data'); //기기정보가 없다 android, ios
if($token == "") api_error('003','no token data'); //토큰값이 없다
if($mb_id == "") api_error('004','no id data'); //아이디 값이 없다
if($mb_password == "") api_error('005','no password data'); //비밀번호값이 없다
if($mb_name == "") api_error('006','no name data'); //이름값이 없다
if($mb_hp == "") api_error('009','no mb_hp data'); //핸드폰번호가 없다
//api_error('999','etc error'); //기타 이유를 알수없는 오류


$mb = get_member($mb_id);
if($mb['idx'] != "") api_error('008','have mb_id value.'); //계정이 이미있다.


$password = get_encrypt_string($mb_password);

if($device == "ios") {
	$regi_os = "2";
} else if($device == "android") {
	$regi_os = "1";
} else {
	$regi_os = "0";
}
$sql = "
	insert into ".$TBA['MEM_TABLE']." set
		signdate='".mktime()."',
		signdate_datetime='".date('Y-m-d H:i:s')."',
		mb_grade='1',
		register_os='".$regi_os."',
		device='".$device."',
		token='".$token."',
		mb_id='".$mb_id."',
		mb_password='".$password."',
		mb_name='".$mb_name."',
		mb_nick='".$mb_name."',
		mb_hp='".$mb_hp."',
		register_date='".date('Y-m-d H:i:s')."',
		register_ip='".$insert_ip."',
		matching_loading_time='30'
";
mysql_query($sql);

$member = get_member($mb_id);
if($member['idx'] == "") api_error('007','database error'); //디비 저장이 안됐다.

api_error('000','ok', $member); //정상
?>