<?
include "../../common.php";
$phone = $_REQUEST['phone'];
$hint = $_REQUEST['hint'];
$hint_position = $_REQUEST['hint_position'];



if($phone == "") api_error('001','æ¯Ω¿¥œ¥Ÿ.'); //æ∆¿Ãµ ∞™¿Ã æ¯¥Ÿ
if($hint == "") api_error('002','æ¯Ω¿¥œ¥Ÿ.'); //∫Òπ–π¯»£ ∞™¿Ã æ¯¥Ÿ

//echo " select * from ".$TBA['JY_MEMBER']." where phone_number = ".$phone." and hint = ".$hint."";
$mb = sql_fetch(" select * from ".$TBA['JY_MEMBER']." where phone_number = '".$phone."' and hint = '".$hint."' and hint_position = ".$hint_position);


if($mb['id'] == "") api_error('001','정보가 일치하지 않습니다');

api_error('000','ok', $mb); //¡§ªÛ

/*
http://wnsti661.cafe24.com/Introduce/web/api/member/find_id.php?phone=01027065914&hint=snap40
*/

?>