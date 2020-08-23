<?
include "../../common.php";
include $mng_path."/mng.common.php";

$old_sessid = $Session_ID;
session_destroy();

goto_url($mng_url);
?>