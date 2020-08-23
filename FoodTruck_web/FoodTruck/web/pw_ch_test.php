<?
include "./common.php";


$query = "select * from pnsoft_member_tbl order by idx desc";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
	$password = get_encrypt_string($row['mb_password']);
	echo $row['idx'] = $row['mb_password']."<BR>";
	$sql = " update pnsoft_member_tbl set mb_password='".$password."' where idx='".$row['idx']."'";
	//mysql_query($sql);
}
?>
