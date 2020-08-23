<?
include "../../common.php";
$id = $_REQUEST['id'];


//echo " select * from ".$TBA['JY_MEMBER']." where phone_number = ".$phone." and hint = ".$hint."";
$mb = get_member($id);


if($mb['key_index'] != "") api_error('001','이미 가입한 회원 입니다.');


api_error('000','ok', "사용가능한 아이디 입니다."); 

/*
http://wnsti661.cafe24.com/Introduce/web/api/member/find_id.php?phone=01027065914&hint=snap40
*/

?>