<?
$dbhost="localhost";
$dbuser = "root";
$dbpasswd = "vmfhwprxm11!";
$dbname = "quick";

$connect=@mysql_connect($dbhost,$dbuser,$dbpasswd)or die("SQL서버에 연결할 수 없습니다");

if (!$db_charset) $db_charset="utf8";
mysql_query("set names $db_charset", $connect);
mysql_select_db($dbname);


//테이블 모음
$TBA['CONFIG_TABLE'] = "pnsoft_config_tbl";		//설정 테이블
$TBA['MEM_TABLE'] = "pnsoft_member";		//회원 테이블
$TBA['MSG_TABLE'] = "pnsoft_letter_tbl";		//메시지 테이블
$TBA['QNA_TABLE'] = "pnsoft_qna_tbl";		//문의하기 테이블
?>