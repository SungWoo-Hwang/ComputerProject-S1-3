<?
include "../../common.php";
$login_id = $_REQUEST['login_id'];
$login_pw = $_REQUEST['login_pw'];
$token = $_REQUEST['token'];

//echo $login_id;
$mb = get_admin_member($login_id);



if($login_id == "") api_error('001','아이디값이 없습니다.'); //아이디 값이 없다
if($login_pw == "") api_error('002','비밀번호 값이 없습니다.'); //비밀번호 값이 없다
if($mb['idx'] == "") {
    api_error('005','회원정보가 없습니다.'); //회원정보가 없다.
}else{
    
}


//if($mb['mb_password'] != $password) api_error('006','비밀번호가 일치하지 않습니다.'); //비밀번호 값이 틀리다.
if($mb['mb_pass'] != $login_pw) api_error('006','비밀번호가 일치하지 않습니다.'); //비밀번호 값이 틀리다.

$sql = "
	update ".$TBA['ADM_TABLE']." set
		token='".$token."'
	where mb_id='".$login_id."'
";
mysql_query($sql);


api_error('000','ok', $mb); //정상

/*
http://wnsti661.cafe24.com/bodo/web/api/member/login.php?login_id=snap40&login_pw=rbdyd3174&token=12344
*/

?>
