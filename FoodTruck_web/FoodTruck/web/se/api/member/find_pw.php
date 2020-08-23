<?
include "../../common.php";

$phone_number = $_REQUEST['phone_number'];
$phone_number = str_replace("-", "", $phone_number);
if($phone_number == "") api_sms_error('3202','no hp data'); //핸드폰 번호가 없다

$rand_code = rand(129412, 999999);
$msg = "임시비밀번호는 : ".$rand_code." 입니다. 임시비밀번호로 로그인 후 비밀번호를 변경해주세요.";
$_SESSION['secret_n_session'] = $rand_code;


$member = sql_fetch( "select * from ".$TBA['MEM_TABLE']." where mb_hp='".$phone_number."' order by idx limit 1" );
if($member['idx'] == "") api_sms_error('0001','no member data'); //핸드폰번호로 검색한 회원정보가 없다.


$password = get_encrypt_string($rand_code);
$sql = "
	update ".$TBA['MEM_TABLE']." set
		mb_password='".$password."'
	where mb_id='".$member['mb_id']."'
";
mysql_query($sql);


$sms = sms_send_func($phone_number, $msg);
if($sms == "success"){
	api_sms_error('0000','ok', $rand_code); //정상
} else {
	api_sms_error($sms,'sms hosting error'); //호스팅 에러
}

/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/find_pw.php?phone_number=010-5511-6166
*/


?>