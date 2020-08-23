<?
include "./common.php";


$dbuser="MITALK";
$dbpass="sisun6500";

$dbsid = "(
  DESCRIPTION =
  (ADDRESS_LIST = 
   (ADDRESS = 
    (PROTOCOL = TCP)
    (HOST = 211.115.114.224)
    (PORT = 1252)
   )
  )
  
  (CONNECT_DATA =
   (SERVER = DEDICATED)
   (SERVICE_NAME = JERPGW)
  )
) ";

$conn = oci_connect($dbuser,$dbpass,$dbsid, 'AL32UTF8');

if(!$conn) {
	echo "No Connection ".oci_error();
	exit;
}

$query = "select * from REFCD_DET";

$stmt = oci_parse($conn,$query);
oci_execute($stmt);

echo "<pre>";
while($row = oci_fetch_assoc($stmt))
{
    print_r($row);
	//echo "<img src='https://talk.sisun.com".$row['PIMAGEPATH']."' width='100'>";

}
echo "</pre>";


// 오라클 접속 닫기 
oci_free_statement($stmt);
// 오라클에서 로그아웃 
oci_close($conn); 

?>
