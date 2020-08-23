<!-- left_area -->
<div class="left_area">
	<div class="lnb_area">
		<h2 class="title"><?=$depth01_title[$ic_page]?></h2>
		<!-- lnb -->
		<div class="lnb_area">
			<ul class="lnb">
				<li <?if($ic_sub_page == "customer01"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=customer01"><span>공지사항</span></a></li>
				<li <?if($ic_sub_page == "customer02"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=customer02"><span>자주하는질문</span></a></li>
				<li <?if($ic_sub_page == "customer03"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=customer03"><span>문의하기</span></a></li>
				<li <?if($ic_sub_page == "customer04"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=customer04"><span>푸쉬발송</span></a></li>
			</ul>
		</div>
		<!--// lnb -->
	</div>
</div>
<!--// left_area -->