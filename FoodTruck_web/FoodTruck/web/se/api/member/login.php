<?
include "../../common.php";
$login_id = $_REQUEST['login_id'];
$login_pw = $_REQUEST['login_pw'];
$device = $_REQUEST['device'];
$token = $_REQUEST['token'];

$mb = get_member($login_id);

if($login_id == "") api_error('001','no id data'); //아이디 값이 없다
if($login_pw == "") api_error('002','no password data'); //비밀번호 값이 없다
if($device == "") api_error('003','no device data'); //기기정보가 없다 android, ios
if($token == "") api_error('004','no token data'); //토큰값이 없다

if($mb['idx'] == "") api_error('005','no member data'); //회원정보가 없다.

$password = get_encrypt_string($login_pw);

if($mb['mb_password'] != $password) api_error('006','no password match'); //비밀번호 값이 틀리다.

if($device == "ios") {
	$regi_os = "2";
} else if($device == "android") {
	$regi_os = "1";
} else {
	$regi_os = "0";
}

$sql = "
	update ".$TBA['MEM_TABLE']." set
		register_os='".$regi_os."',
		device='".$device."',
		token='".$token."',
		login_date='".date('Y-m-d H:i:s')."',
		login_ip='".$insert_ip."'
	where mb_id='".$login_id."'
";
mysql_query($sql);


api_error('000','ok', $mb); //정상



?>