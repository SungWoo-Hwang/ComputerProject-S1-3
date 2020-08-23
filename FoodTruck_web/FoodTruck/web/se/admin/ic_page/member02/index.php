<?
$link_url = $admin_url."/?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page;
if($pt == "") $pt = "list";
if($pt == "list2"){
	include $page_path."/list2.php";
} else if($pt == "list3"){
	include $page_path."/list3.php";
} else if($pt == "list4"){
	include $page_path."/list4.php";
} else {
	include $page_path."/list.php";
}
?>