<?
$dbhost="localhost";
$dbuser = "snap50";
$dbpasswd = "rbdyd3174@";
$dbname = "snap50";

$connect=@mysql_connect($dbhost,$dbuser,$dbpasswd)or die("SQL서버에 연결할 수 없습니다");

if (!$db_charset) $db_charset="utf8";
mysql_query("set names $db_charset", $connect);
mysql_select_db($dbname);


//테이블 모음
$TBA['ADM_TABLE'] = "adm_member_tbl";		//설정 테이블
$TBA['JY_MEMBER'] = "jy_member";			//멤버
$TBA['JY_ACCOUNT'] = "jy_account";			//계좌
$TBA['JY_INTRODUCTION_STATUS'] = "jy_introduction_status";			//소개소 현황
$TBA['JY_NOTICE'] = "jy_notice";			//공지사항

$TBA['JY_REQUEST'] = "jy_request";			//요청테이블
$TBA['JY_HISTORY'] = "jy_request_history";			//요청테이블



?>
