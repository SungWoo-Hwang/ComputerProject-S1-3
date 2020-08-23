<!-- left_area -->
<div class="left_area">
	<div class="lnb_area">
		<h2 class="title"><?=$depth01_title[$ic_page]?></h2>
		<!-- lnb -->
		<div class="lnb_area">
			<ul class="lnb">
				<li <?if($ic_sub_page == "visit01"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=visit01"><span>이용현황</span></a></li>
				<li <?if($ic_sub_page == "visit02"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=visit02"><span>회원</span></a></li>
			</ul>
		</div>
		<!--// lnb -->
	</div>
</div>
<!--// left_area -->