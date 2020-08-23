<!-- container -->
<div id="container">
<article>
	<?
	include $mng_ic_page_include_path."/left_".$ic_page.".php";
	?>
	<div class="content_area">
		<?
		include $mng_ic_page_include_path."/page_location.php";
		?>
		<!-- content -->
		<div id="content">
			<!-- main_title -->
			<div class="main_title">
				<h3 class="title">
					<?if($ic_sub_page != ''){?>
						<li>
							<?=$depth02_title[$ic_sub_page]?>
						</li>
					<?} else {?>
						<li>
							<?=$depth01_title[$ic_page]?>
						</li>
					<?}?>				
				</h3>
			</div>
			<!-- main_title -->
			<!-- division -->
			<div class="division">
				<?
				if($ic_sub_page != ""){
					if($folder_use == "no"){
						$page_path = $mng_ic_page_path."/".$ic_page;
						include $mng_ic_page_path."/".$ic_page."/index.php";
					} else {
						$page_path = $mng_ic_page_path."/".$ic_sub_page;
						include $mng_ic_page_path."/".$ic_sub_page."/index.php";
					}
				} else {
					$page_path = $mng_ic_page_path."/".$ic_page;
					include $mng_ic_page_path."/".$ic_page."/index.php";
				}
				?>
			</div>
			<!--// division -->
		</div>
		<!--// content -->
	</div>
</article>	
</div>
<!-- //container -->