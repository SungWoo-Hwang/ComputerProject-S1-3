<?
include "../../common.php";
include $admin_path."/admin.common.php";

$old_sessid = $Session_ID;
session_destroy();

goto_url($admin_url);
?>