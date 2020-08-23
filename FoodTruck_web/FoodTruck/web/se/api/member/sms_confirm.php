<?
include "../../common.php";

$phone_number = $_REQUEST['phone_number'];

if($phone_number == "") api_sms_error('3202','no hp data'); //핸드폰 번호가 없다

$rand_code = rand(1294, 9999);
$msg = "인증번호 : ".$rand_code." 를 입력해주세요";
$_SESSION['secret_n_session'] = $rand_code;

$sms = sms_send_func($phone_number, $msg);
if($sms == "success"){
	api_sms_error('0000','ok', $rand_code); //정상
} else {
	api_sms_error($sms,'sms hosting error'); //핸드폰 번호가 없다
}
?>