<?
include "../common.php";

$mb_id =  $_REQUEST['id'];
$type = $_REQUEST['type'];

$member = get_member($mb_id);
$imagedata = base64_encode(file_get_contents("../images/admin/dashicon_01.png")); 
//echo $member['sign_data']; exit;
//$data = base64_encode(file_get_contents("../images/admin/dashicon_01.png")); 
?>

<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="Hancom HWP 10.0.0.5060">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<link rel="stylesheet" type="text/css" href="<?=$home_css_url?>/default.css" />
<script src="<?=$home_js_url?>/bluebird.min.js"></script>
<script src="<?=$home_js_url?>/html2canvas.min.js"></script>
<script src="<?=$home_js_url?>/jspdf.min.js"></script>
</head>
<body style="width:100%">

<div>
<img src="../images/admin/dashicon_01.png">
<img src="data:image/gif;base64, <?=$member['sign_data']?>">
<?=$config[$type]?>
</div>
<div>
<a href="<?=$home_proc_url?>/make_img.php?type=<?=$type?>" id="download_bt">다운로드</a>
</div>
</body>
</html>
