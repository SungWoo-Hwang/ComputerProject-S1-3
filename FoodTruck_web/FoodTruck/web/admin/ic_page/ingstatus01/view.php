<?
$row = sql_fetch( "select * from ".$TBA['PRODUCT_TABLE']." where idx='".$vidx."'" );

$cate1_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU1' and REFCD='".$row['cate1']."'" );
$cate2_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU2' and REFCD='".$row['cate2']."'" );
$cate3_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU3' and REFCD='".$row['cate3']."'" );


$comment = htmlspecialchars($row['wr_comment']);
$comment = str_replace("\r\n","<BR>",$comment);
$comment = str_replace("\n","<BR>",$comment);
$comment = str_replace("&lt;br&gt;","<BR>",$comment);
$comment = stripslashes($comment);

?>



<!-- table_area -->
<div class="table_area margint10">
	<table class="write margint10">
		<caption>게시물관리 등록 화면</caption>
		<colgroup>
			<col style="width: 10%;">
			<col style="width: 90%">
		</colgroup>
		<tbody>

		<tr>
			<th scope="row">
				분류
			</th>
			<td>
				<?=$cate1_row['REFNM']?> > <?=$cate2_row['REFNM']?> > <?=$cate3_row['REFNM']?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				상품명
			</th>
			<td>
				<?=$row['wr_subject']?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				부제목
			</th>
			<td>
				<?=$row['wr_s_subject']?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				상품설명
			</th>
			<td>
				<?=$comment?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				대표이미지
			</th>
			<td>
				<img src="<?=$row['list_file']?>" onerror="this.src='./images/common/no_img.png'" width="250">
			</td>
		</tr>
		<tr>
			<th scope="row">
				상세이미지
			</th>
			<td>
				<img src="<?=$row['img_file01']?>" onerror="this.src='./images/common/no_img.png'" width="230">
				<img src="<?=$row['img_file02']?>" onerror="this.src='./images/common/no_img.png'" width="230">
				<img src="<?=$row['img_file03']?>" onerror="this.src='./images/common/no_img.png'" width="230">
				<img src="<?=$row['img_file04']?>" onerror="this.src='./images/common/no_img.png'" width="230">
				<img src="<?=$row['img_file05']?>" onerror="this.src='./images/common/no_img.png'" width="230">
			</td>
		</tr>
		</tbody>
	</table>

</div>
<!--// table_area -->


<!-- button_area -->
<div class="button_area">
	<div class="alignc">
		<a href="<?=$link_url?>=<?=$ic_page?>&ic_sub_page=<?=$ic_sub_page?>" class="btn list" title="목록 페이지로 이동">
			<span>목록</span>
		</a>
		<a href="<?=$link_url?>&pt=write&vidx=<?=$row['idx']?>&w=u" class="btn save" title="목록 페이지로 이동">
			<span>수정</span>
		</a>
	</div>
</div>
<!--// button_area -->