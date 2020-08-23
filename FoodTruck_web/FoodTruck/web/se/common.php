<?session_start();
date_default_timezone_set('Asia/Seoul');

/*******************************************************************************
** 공통 변수, 상수, 코드
*******************************************************************************/
error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING );

// 보안설정이나 프레임이 달라도 쿠키가 통하도록 설정
header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');
header("Content-Type: text/html; charset=UTF-8");

if (!defined('G5_SET_TIME_LIMIT')) define('G5_SET_TIME_LIMIT', 0);
@set_time_limit(G5_SET_TIME_LIMIT);


$ext_arr = array ('PHP_SELF', '_ENV', '_GET', '_POST', '_FILES', '_SERVER', '_COOKIE', '_SESSION', '_REQUEST',
                  'HTTP_ENV_VARS', 'HTTP_GET_VARS', 'HTTP_POST_VARS', 'HTTP_POST_FILES', 'HTTP_SERVER_VARS',
                  'HTTP_COOKIE_VARS', 'HTTP_SESSION_VARS', 'GLOBALS');
$ext_cnt = count($ext_arr);
for ($i=0; $i<$ext_cnt; $i++) {
    // POST, GET 으로 선언된 전역변수가 있다면 unset() 시킴
    if (isset($_GET[$ext_arr[$i]]))  unset($_GET[$ext_arr[$i]]);
    if (isset($_POST[$ext_arr[$i]])) unset($_POST[$ext_arr[$i]]);
}
@extract($_GET);
@extract($_POST);

function SET(){
    $result['path'] = str_replace('\\', '/', dirname(__FILE__));
    $tilde_remove = preg_replace('/^\/\~[^\/]+(.*)$/', '$1', $_SERVER['SCRIPT_NAME']);
    $document_root = str_replace($tilde_remove, '', $_SERVER['SCRIPT_FILENAME']);
    $root = str_replace($document_root, '', $result['path']);
    $port = $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '';
    $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://';
    $user = str_replace(str_replace($document_root, '', $_SERVER['SCRIPT_FILENAME']), '', $_SERVER['SCRIPT_NAME']);
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
    if(isset($_SERVER['HTTP_HOST']) && preg_match('/:[0-9]+$/', $host))
        $host = preg_replace('/:[0-9]+$/', '', $host);
    $host = preg_replace("/[\<\>\'\"\\\'\\\"\%\=\(\)\/\^\*]/", '', $host);
    $result['url'] = $http.$host.$port.$user.$root;
    return $result;
}

$ETW_SET = SET();
$home_url = $ETW_SET['url'];
$home_path = $ETW_SET['path'];
$home_js_url = $home_url."/js";
$home_css_url = $home_url."/css";
$home_img_url = $home_url."/images";

$home_proc_url = $home_url."/proc";
$home_proc_path = $home_path."/proc";

$home_editor_url = $home_url."/se";
$home_editor_path = $home_path."/se";

$home_upload_url = $home_url."/upload";
$home_upload_path = $home_path."/upload";

$home_data_path = $home_path."/data";
$home_ic_page_path = $ETW_SET['path']."/ic_page";

$admin_path = $home_path."/admin";
$admin_url = $home_url."/admin";
$admin_css_url = $admin_url."/css";
$admin_js_url = $admin_url."/js";
$admin_ic_page_path = $admin_path."/ic_page";
$admin_ic_page_include_path = $admin_path."/ic_page/include";


$config_path = $home_path."/config";

/* 인클루드 파일 */
include_once $config_path."/db_config.php";
include_once $config_path."/function.php";

/* 공통 변수 */
$signdate = time();
$signdate_YMDHIS = date('Y-m-d H:i:s', $signdate);
$signdate_YMD = substr($signdate_YMDHIS, 0, 10);
$signdate_HIS = substr($signdate_YMDHIS, 11, 8);

$insert_ip = $_SERVER['REMOTE_ADDR'];


/*
$member = get_member($_SESSION['member_id']);
$config = sql_fetch( "select * from ".$TBA['CONFIG_TABLE']." order by idx limit 1" );
*/

$img_file_upload_ext = "gif,GIF,jpg,JPG,jpeg,JPEG,png,PNG,zip,ZIP,ppt,PPT,pdf,PDF,xls,XLS,xlsx,XLSX,hwp,HWP,txt,TXT";
$img_upload_ext = "gif,GIF,jpg,JPG,jpeg,JPEG,png,PNG";

define('G5_STRING_ENCRYPT_FUNCTION', 'sql_password');

$daily = array('일','월','화','수','목','금','토');
?>