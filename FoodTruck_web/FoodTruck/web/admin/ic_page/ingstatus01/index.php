<?

$link_url = $admin_url."/?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page;
if($pt == "view"){
	include $page_path."/view.php";
} else if($pt == "write"){
	include $page_path."/write.php";
} else if($pt == "write_add"){
	include $page_path."/write_add.php";
} else {
	include $page_path."/list.php";
}
?>