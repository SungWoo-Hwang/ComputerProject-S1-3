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

$query = "select * from PRD_CATE";

$stmt = oci_parse($conn,$query);
oci_execute($stmt);

//echo "<pre>";
while($row = oci_fetch_assoc($stmt))
{
    //print_r($row);
	//echo "<img src='https://talk.sisun.com".$row['PIMAGEPATH']."' width='100'>";


	$category = sql_fetch( "select * from ".$TBA['CATEGORY']." where STYLE_NO='".$row['STYLE_NO']."' and GU1='".$row['GU1']."' and GU2='".$row['GU2']."' and GU3='".$row['GU3']."'" );
	$date_ex = explode("/", $row['INSERT_DATETIME']);
	$common_sql = "
		signdate='".mktime()."',
		STYLE_NO = '".$row['STYLE_NO']."',
		SEQ_NO = '".$row['SEQ_NO']."',
		GU1 = '".$row['GU1']."',
		GU2 = '".$row['GU2']."',
		GU3 = '".$row['GU3']."',
		INSERT_DATETIME = '20".$date_ex[0]."-".$date_ex[1]."-".$date_ex[2]."'
	";
	if($category['idx'] != ""){
		$sql = "update ".$TBA['CATEGORY']." set ".$common_sql."";
	} else {
		$sql = "insert into ".$TBA['CATEGORY']." set ".$common_sql."";
	}

	if($category['idx'] != ""){
		$sql .= " where STYLE_NO='".$row['STYLE_NO']."' and GU1='".$row['GU1']."' and GU2='".$row['GU2']."' and GU3='".$row['GU3']."' ";
	}
	//echo $sql;
	mysql_query($sql);


	$query_p = "select * from PRD where STYLE_NO = '".$row['STYLE_NO']."'";
	$stmt_p = oci_parse($conn,$query_p);
	oci_execute($stmt_p);
	$row_p = oci_fetch_assoc($stmt_p);

	$product = sql_fetch( "select * from ".$TBA['PRODUCT_TABLE']." where STYLE_NO='".$row['STYLE_NO']."' and cate1='".$row['GU1']."' and cate2='".$row['GU2']."' and cate3='".$row['GU3']."'" );
	$common_sql = "
		signdate='".mktime()."',
		signdate_datetime='".date('Y-m-d H:i:s')."',
		STYLE_NO = '".$row_p['STYLE_NO']."',
		cate1 = '".$row['GU1']."',
		cate2 = '".$row['GU2']."',
		cate3 = '".$row['GU3']."',
		wr_subject = '".$row_p['PROD_DESC']."',
		wr_s_subject = '".$row_p['PROD_SUB']."',
		list_file = 'https://talk.sisun.com".$row_p['PIMAGEPATH']."'	
	";
	if($product['idx'] != ""){
		$sql = "update ".$TBA['PRODUCT_TABLE']." set ".$common_sql."";
	} else {
		$sql = "insert into ".$TBA['PRODUCT_TABLE']." set ".$common_sql."";
	}

	$query2 = "select * from PRD_DET where STYLE_NO = '".$row['STYLE_NO']."'";
	$stmt2 = oci_parse($conn,$query2);
	oci_execute($stmt2);

	while($row2 = oci_fetch_assoc($stmt2)){
		$sql .= ", img_file01 = '".$row2['PDET_IMG_PATH']."'";
	}

	if($product['idx'] != ""){
		$sql .= " where STYLE_NO='".$row_p['STYLE_NO']."' ";
	}

	mysql_query($sql);
}
//echo "</pre>";




$query = "select * from REFCD_DET";

$stmt = oci_parse($conn,$query);
oci_execute($stmt);

//echo "<pre>";
while($row = oci_fetch_assoc($stmt))
{
    //print_r($row);
	//echo "<img src='https://talk.sisun.com".$row['PIMAGEPATH']."' width='100'>";


	$category_info = sql_fetch( "select * from ".$TBA['CATEGORY_INfO']." where REFNM='".$row['REFNM']."' and GBNCD='".$row['GBNCD']."'" );
	$date_ex = explode("/", $row['INSERT_DATETIME']);

	$common_sql = "
		signdate='".mktime()."',
		GBNCD = '".$row['GBNCD']."',
		REFCD = '".$row['REFCD']."',
		REFNM = '".$row['REFNM']."',
		USEYN = '".$row['USEYN']."',
		INSERT_DATETIME = '20".$date_ex[0]."-".$date_ex[1]."-".$date_ex[2]."'
	";
	if($category_info['idx'] != ""){
		$sql = "update ".$TBA['CATEGORY_INfO']." set ".$common_sql."";
	} else {
		$sql = "insert into ".$TBA['CATEGORY_INfO']." set ".$common_sql."";
	}

	if($category_info['idx'] != ""){
		$sql .= " where REFNM='".$row['REFNM']."' and GBNCD='".$row['GBNCD']."' ";
	}
	//echo $sql;
	mysql_query($sql);


}
//echo "</pre>";



// 오라클 접속 닫기 
oci_free_statement($stmt);
// 오라클에서 로그아웃 
oci_close($conn); 


echo "y";
?>