<?
include "../../common.php";
$login_id = $_REQUEST['login_id'];
$login_pw = $_REQUEST['login_pw'];

//echo $login_id;
$mb = get_member($login_id);

//if($mb['mb_password'] != $password) api_error('006','비밀번호가 일치하지 않습니다.'); //비밀번호 값이 틀리다.
if($mb['PW'] != $login_pw) api_error('006','비밀번호가 일치하지 않습니다.'); //비밀번호 값이 틀리다.

api_error('000','ok', $mb); //정상

/*
http://snap50.cafe24.com/FoodTruck/web/api/member/login.php?login_id=snap40&login_pw=rbdyd3174
*/

?>
