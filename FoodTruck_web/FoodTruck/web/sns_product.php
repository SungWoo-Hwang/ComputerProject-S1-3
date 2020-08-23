<?
include "./common.php";

$v_idx = $_REQUEST['vidx'];

if($v_idx == ""){
	alert("정상적인 방법으로 접속해 주세요.");
	exit;
}
$row = sql_fetch( "select * from ".$TBA['PRODUCT_TABLE']." where idx = ".$v_idx." order by idx" );


$comment = htmlspecialchars($row['wr_comment']);
$comment = str_replace("\r\n","<BR>",$comment);
$comment = str_replace("\n","<BR>",$comment);
$comment = str_replace("&lt;br&gt;","<BR>",$comment);
$comment = stripslashes($comment);

?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
		<title>상품상세보기</title>
		<link rel="stylesheet" type="text/css" href="<?=$home_css_url?>/default.css" />
		<link rel="stylesheet" type="text/css" href="<?=$home_css_url?>/layout.css?v=<?=mktime()?>" />
		<link rel="stylesheet" type="text/css" href="<?=$home_css_url?>/swiper.css?v=<?=mktime()?>" />
		<!--[if lt IE 9]>
			<script type="text/javascript" src="<?=$home_js_url?>/html5.js"></script>
		<![endif]-->
		<script src="<?=$home_js_url?>/jquery-1.8.3.min.js"></script>
		<script src="<?=$home_js_url?>/common.js?v=<?=mktime()?>"></script>
		<script src="<?=$home_js_url?>/swiper.js?v=<?=mktime()?>"></script>
	</head>

	<body>
		<div class="contents_area">
			<div class="logo">
				<img src="<?=$home_img_url?>/logo.png">
			</div>
			<div class="contents">
				<div class="img_area">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?if($row['list_file'] != ""){?><div class="swiper-slide"><img src="<?=$row['list_file']?>"></div><?}?>
							<?if($row['img_file01'] != ""){?><div class="swiper-slide"><img src="<?=$row['img_file01']?>"></div><?}?>
							<?if($row['img_file02'] != ""){?><div class="swiper-slide"><img src="<?=$row['img_file02']?>"></div><?}?>
							<?if($row['img_file03'] != ""){?><div class="swiper-slide"><img src="<?=$row['img_file03']?>"></div><?}?>
							<?if($row['img_file04'] != ""){?><div class="swiper-slide"><img src="<?=$row['img_file04']?>"></div><?}?>
							<?if($row['img_file05'] != ""){?><div class="swiper-slide"><img src="<?=$row['img_file05']?>"></div><?}?>
						</div>
						<div class="swiper-button-next swiper-button-white"></div>
						<div class="swiper-button-prev swiper-button-white"></div>
					</div>

					<script>
					var swiper = new Swiper('.swiper-container', {
						autoHeight: true, //enable auto height
						spaceBetween: 20,
						loop: false,
						pagination: {
							el: '.swiper-pagination',
							clickable: true,
						},
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
					});
					</script>					
				</div>
				<div class="info_area2">
					<ul class="">
						<li>
							<p><?=$row['wr_subject']?><span><?=date("Y-m-d", $row['signdate'])?></span></p>
							<p><?=$row['wr_s_subject']?></p>
						</li>
					</ul>

					<div class="comment">
						<?=$comment?>
					</div>
				</div>

				<a href="http://michaa.sisun.com" class="foot_link" target="_blank">michaa.sisun.com</a>
			</div>
		</div>
	</body>
</html>
