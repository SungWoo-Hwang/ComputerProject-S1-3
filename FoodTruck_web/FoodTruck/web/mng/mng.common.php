<?


if($ic_page == "") $ic_page = "login";

if($ic_page == "login") $header_data = 'noheader';

$ic_page_url = $mng_url."/?ic_page";
$ic_sub_page_url = $mng_url."/?ic_page=".$ic_page."&ic_sub_page";


$member = sql_fetch( "select * from ".$TBA['MNG_TABLE']." where store_code='".$_SESSION['member_id']."' order by idx limit 1" );


$depth01_title['member'] = "고객";
$depth01_title['market'] = "매장";
$depth01_title['timeline'] = "타임라인";
$depth01_title['product'] = "위시리스트";


$depth02_title['member01'] = "고객관리";

$depth02_title['timeline01'] = "타임라인";

$depth02_title['product02'] = "위시리스트";
?>