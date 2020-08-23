<?
include "../../common.php";

$mb = get_member("test01");
                
                
echo $mb["use_y_date"];
echo date("Y-m-d",strtotime($mb["use_y_date"].'+30 days'))
?>
