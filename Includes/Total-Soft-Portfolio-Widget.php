<?php
	class  Total_Soft_Portfolio extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Total Soft Portfolio','description'=>'This is the widget of Total Soft Portfolio plugin');
			parent::__construct('Total_Soft_Portfolio','',$params);
 	  	}
 	  	function form($instance)
 		{
 			$defaults = array('Total_Soft_Portfolio'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Portfolio = $instance['Total_Soft_Portfolio'];
		   	?>
		   	<div>			  
			   	<p>
			   		Portfolio Title:
			   		<select name="<?php echo $this->get_field_name('Total_Soft_Portfolio'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;

							$table_name1 = $wpdb->prefix . "totalsoft_Portfolio";
							$Total_Soft_Portfolio=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id > %d", 0));
				   			
				   			foreach ($Total_Soft_Portfolio as $Total_Soft_Portfolio1)
				   			{
				   				?> <option value="<?php echo $Total_Soft_Portfolio1->id; ?>"> <?php echo $Total_Soft_Portfolio1->TotalSoftPortfolio_Name; ?> </option> <?php 
				   			}
				   		?>
			   		</select>
			   	</p>
		   	</div>
		   	<?php
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Total_Soft_Portfolio = empty($instance['Total_Soft_Portfolio']) ? '' : $instance['Total_Soft_Portfolio'];
 		 	global $wpdb;

			$table_name1  = $wpdb->prefix . "totalsoft_portfolio_settings";
			$table_name2  = $wpdb->prefix . "totalsoft_portfolio_dbt";
			$table_name4  = $wpdb->prefix . "totalsoft_portfolio_manager";
			$table_name5  = $wpdb->prefix . "totalsoft_portfolio_albums";
			$table_name6  = $wpdb->prefix . "totalsoft_portfolio_images";
			$table_name7  = $wpdb->prefix . "totalsoft_portfolio_Elgrid";
			$table_name8  = $wpdb->prefix . "totalsoft_portfolio_Filgrid";
			$table_name9  = $wpdb->prefix . "totalsoft_portfolio_CPopup";
			$table_name10 = $wpdb->prefix . "totalsoft_portfolio_SlPort";
			$table_name11 = $wpdb->prefix . "totalsoft_portfolio_GAAnim";
			require_once('Total-Soft-Portfolio-Check.php');

			$TotalSoftPortfolioManager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $Total_Soft_Portfolio));
			$TotalSoftPortfolioOpt=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE TotalSoftPortfolio_SetName=%s", $TotalSoftPortfolioManager[0]->TotalSoftPortfolio_Option));
			if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Total Soft Portfolio')
			{
				$TotalSoftPortfolioOption=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolioOpt[0]->id));
			}
			else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Elastic Grid')
	 		{
				$TotalSoftPortfolioOption=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolioOpt[0]->id));
	 		}
	 		else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Filterable Grid')
	 		{
				$TotalSoftPortfolioOption=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolioOpt[0]->id));
	 		}
	 		else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Gallery Portfolio/Content Popup')
	 		{
				$TotalSoftPortfolioOption=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolioOpt[0]->id));
	 		}
	 		else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Slider Portfolio')
	 		{
				$TotalSoftPortfolioOption=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolioOpt[0]->id));
	 		}
	 		else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Gallery Album Animation')
	 		{
				$TotalSoftPortfolioOption=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolioOpt[0]->id));
	 		}
			$TotalSoftPortfolioAlbums=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE Portfolio_ID=%d", $Total_Soft_Portfolio));
			$TotalSoftPortfolioImages=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Portfolio_ID=%d", $Total_Soft_Portfolio));
			
			if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='1'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-angle-double-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-angle-double-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='2'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-angle-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-angle-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='3'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-arrow-circle-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-arrow-circle-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='4'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-arrow-circle-o-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-arrow-circle-o-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='5'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-arrow-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-arrow-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='6'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-caret-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-caret-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='7'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-caret-square-o-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-caret-square-o-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='8'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-chevron-circle-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-chevron-circle-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='9'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-chevron-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-chevron-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='10'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-hand-o-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-hand-o-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Type=='11'){
				$TotalSoft_FG_Slider_Icon_Left='totalsoft totalsoft-long-arrow-left';
				$TotalSoft_FG_Slider_Icon_Right='totalsoft totalsoft-long-arrow-right';
			}
			
			if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Del_Icon_Type=='1'){
				$TotalSoft_FG_Slider_Del_Icon_Type='totalsoft totalsoft-times';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Del_Icon_Type=='2'){
				$TotalSoft_FG_Slider_Del_Icon_Type='totalsoft totalsoft-times-circle-o';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Del_Icon_Type=='3'){
				$TotalSoft_FG_Slider_Del_Icon_Type='totalsoft totalsoft-times-circle';
			}
			
			if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Style=='1'){
				$Pop_Ic_Type='totalsoft totalsoft-file-image-o';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Style=='2'){
				$Pop_Ic_Type='totalsoft totalsoft-eye';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Style=='3'){
				$Pop_Ic_Type='totalsoft totalsoft-camera-retro';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Style=='4'){
				$Pop_Ic_Type='totalsoft totalsoft-picture-o';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Style=='5'){
				$Pop_Ic_Type='totalsoft totalsoft-search-plus';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Style=='6'){
				$Pop_Ic_Type='totalsoft totalsoft-expand';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Style=='7'){
				$Pop_Ic_Type='totalsoft totalsoft-gratipay';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Style=='8'){
				$Pop_Ic_Type='totalsoft totalsoft-search';
			}
			
			if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='1'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-angle-double-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-angle-double-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='2'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-angle-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-angle-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='3'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-arrow-circle-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-arrow-circle-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='4'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-arrow-circle-o-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-arrow-circle-o-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='5'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-arrow-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-arrow-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='6'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-caret-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-caret-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='7'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-caret-square-o-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-caret-square-o-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='8'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-chevron-circle-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-chevron-circle-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='9'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-chevron-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-chevron-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='10'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-hand-o-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-hand-o-right';
			}else if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Type=='11'){
				$TotalSoft_FG_Car_Slider_Icon_Left='totalsoft totalsoft-long-arrow-left';
				$TotalSoft_FG_Car_Slider_Icon_Right='totalsoft totalsoft-long-arrow-right';
			}

 		 	echo $before_widget;
 		 	?>
 		 		<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
 		 	<?php
	 		 	if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Total Soft Portfolio')
				{ ?>
	 		 		<style type="text/css">
	 		 			.portfolio_<?php echo $Total_Soft_Portfolio;?>
	 		 			{
	 		 				height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ContH;?>px;
	 		 			}
	 		 			.background_<?php echo $Total_Soft_Portfolio;?>
	 		 			{
	 		 				background:url(<?php echo plugins_url('../Images/' . $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_BgImage,__FILE__);?>) no-repeat center;
	 		 			}
	 		 			.portfolio_<?php echo $Total_Soft_Portfolio;?> .item div img 
	 		 			{
	 		 				width:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IW;?>px;
	 		 				height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IH;?>px;
	 		 				border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IBW;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IBS;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IBC;?>;
	 		 				border-radius:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IBR;?>%;
	 		 			}
	 		 			.portfolio_<?php echo $Total_Soft_Portfolio;?> .item 
	 		 			{
	 		 				height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IH;?>px;
	 		 			}
						.portfolio_<?php echo $Total_Soft_Portfolio;?> .paths a 
						{
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_NavCol;?>;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_NavRad;?>px;
						}
						.portfolio_<?php echo $Total_Soft_Portfolio;?> .paths a:hover
						{
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_NavHovCol;?>;
						}
						.portfolio_<?php echo $Total_Soft_Portfolio;?> .paths .active{
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_NavCurCol;?>;
						}
						.Total_Soft_Portfolio_Icon_<?php echo $Total_Soft_Portfolio;?>
						{
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ArrowSize;?>px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ArrowCol;?>;
						}
						.Total_Soft_Portfolio_Icon_<?php echo $Total_Soft_Portfolio;?>:hover
						{
							opacity:0.8;
						}
						
	 		 		</style>
					<div class="portfolio portfolio_<?php echo $Total_Soft_Portfolio;?>">
						<input type="text" style="display:none;" class="TotalSoftPortfolio_IW" value="<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IW;?>">
						<input type="text" style="display:none;" class="TotalSoftPortfolio_IH" value="<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IH;?>">
						<input type="text" style="display:none;" class="TotalSoftPortfolio_NavS" value="<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_NavS;?>">
						<input type="text" style="display:none;" class="portDivHeigt" value="<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ContH;?>">
						<input type="text" style="display:none;" class="portItemHeigt" value="<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IH+100;?>">
						<input type="text" style="display:none;" class="portImHeigt" value="<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IH;?>">
						<input type="text" style="display:none;" class="portImWidth" value="<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_IW;?>">
						<input type="text" style="display:none;" class="TSICWidth" value="<?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ArrowSize;?>">
						<div class="background background_<?php echo $Total_Soft_Portfolio;?>"></div>		
						<div class="arrows">
							<span class="up" style='text-align:center;'><i class="TSIC Total_Soft_Portfolio_Icon_<?php echo $Total_Soft_Portfolio;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ArrowUp;?>"></i></span>
							<span class="down" style='text-align:center;'><i class="TSIC Total_Soft_Portfolio_Icon_<?php echo $Total_Soft_Portfolio;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ArrowDown;?>"></i></span>
							<span class="prev portIcLeft"><i class="TSIC Total_Soft_Portfolio_Icon_<?php echo $Total_Soft_Portfolio;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ArrowLeft;?>"></i></span>
							<span class="next portIcRight" style='text-align:right;'><i class="TSIC Total_Soft_Portfolio_Icon_<?php echo $Total_Soft_Portfolio;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoftPortfolio_ArrowRight;?>"></i></spana>
						</div>
						<div class="gallery">
							<div class="inside">
								<?php for($i=0;$i<$TotalSoftPortfolioManager[0]->TotalSoftPortfolio_AlbumCount;$i++){
				            		$TSoftPort_ElGrid_Images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftPortfolio_IA=%s", $TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle));
				            		?>

									<div class="item">
				            		<?php
				            			for($j=0;$j<count($TSoftPort_ElGrid_Images);$j++){ ?>
				            				<div><img src="<?php echo $TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_IURL;?>" alt="<?php echo $TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_IURL;?>" /></div>
								<?php } ?> </div> <?php } ?>

							</div>
						</div>
					</div>
					<script type="text/javascript">
						var o = {
							init: function(){
								this.portfolio.init();
							},
							portfolio: {
								data: {
								},
								init: function(){
									jQuery('.portfolio').portfolio(o.portfolio.data);
								}
							}
						}
						jQuery(function(){ o.init(); });
					</script>
	 			<?php } else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Elastic Grid')
	 			{
	 				?>
	 					<style type="text/css">
	 						.wagwep-container
	 						{
	 							display: <?php if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_SM=='false'){echo 'none';}?>
	 						}
	 						nav#porfolio-nav
	 						{
	 							background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_MBgC;?>;
	 						}
	 						ul#portfolio-filter a:hover 
	 						{
								text-decoration: none;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_HBgC;?> !important;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_HC;?> !important;
							}
							.wagwep-container ul#portfolio-filter li.current a 
							{
								background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_CurBgC;?>;
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_CurC;?>;
							}
							.wagwep-container ul#portfolio-filter a 
							{
								background-color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_BgC;?>;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_C;?>;
								font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_FS;?>px;
								font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_FF;?>;
							}
							.wagwep-container ul#portfolio-filter li 
							{
								line-height: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Nav_FS;?>px;
							}
							.wagwep-container ul#portfolio-filter 
							{
								border-bottom: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LAM_W;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LAM_S;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LAM_C;?>;
							}
							.og-grid li 
							{
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_H;?>px;
							}
							.og-grid li > a,.og-grid li > a img 
							{
								width:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_W;?>px;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_H;?>px;
								border-radius:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_BR;?>px;
								-webkit-box-shadow:0px 0px 20px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_BS;?>; 
								-moz-box-shadow:0px 0px 20px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_BS;?>; 
								box-shadow:0px 0px 20px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_BS;?>; 
							}
							.og-grid li a:hover, .og-grid li a:focus
							{
								-webkit-box-shadow:0px 0px 20px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_BS;?>; 
								-moz-box-shadow:0px 0px 20px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_BS;?>; 
								box-shadow:0px 0px 20px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_BS;?>; 
							}
							.og-grid li a figure 
							{
								background-color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_HBgC;?>;
								margin: 0;
							}
							.og-grid li a figure span 
							{
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_TC;?>;
								font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_TFS;?>px;
								font-family: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Im_TFF;?>;
								border-bottom: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LAT_W;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LAT_S;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LAT_C;?>;
							}
							.og-expander 
							{
								background-color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_BgC;?>;
								overflow: auto;
								padding-bottom: 5px;
								max-height: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_EH;?>px;
							}
							/* Events List custom webkit scrollbar */
							.og-expander::-webkit-scrollbar {width: 9px;}
							/* Track */
							.og-expander::-webkit-scrollbar-track {background: none;}
							/* Handle */
							.og-expander::-webkit-scrollbar-thumb {
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_TC;?>;
								border:1px solid #E9EBEC;
								border-radius: 10px;
							}
							.og-expander::-webkit-scrollbar-thumb:hover {background:#cecece;}
							.og-pointer
							{
								border-bottom-color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_BgC;?> !important;
							}
							.og-details h3
							{
								font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_TFS;?>px;
								font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_TFF;?> !important;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_TC;?> !important;
								cursor: default;
							}
							.og-details p:nth-child(2)
							{
								max-height:200px !important;
								overflow-x:hidden;
							}
							.og-details p:nth-child(2)::-webkit-scrollbar 
							{
								width: 0.5em;
							}
							.og-details p:nth-child(2)::-webkit-scrollbar-track 
							{
								-webkit-box-shadow: inset 0 0 6px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_BgC; ?>;
							}
							.og-details p:nth-child(2)::-webkit-scrollbar-thumb {
								background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_TC; ?>;
								outline: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_Pop_TC; ?>;
							}
							.og-details a.link-button 
							{
								font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_FS;?>px;
								background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_BgC;?>;
								-moz-border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_BR;?>px;
								-webkit-border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_BR;?>px;
								border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_BR;?>px;
								border: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_BW;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_BS;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_BC;?>;
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_C;?> !important;
								font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_FF;?>;
							}
							.og-details a:hover 
							{
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_HC;?> !important;
								background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LIP_HBgC;?>;
							}
							.og-details .infosep 
							{
								border-bottom: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LBT_W;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LBT_S;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_LBT_C;?>;
							}
							.elastislide-TS_Portfolio_GAA_
							{
								background-color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_BgC;?>;
								box-shadow: inset 0 0 10px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_BSC;?>;
							    -moz-box-shadow:    inset 0 0 10px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_BSC;?>;
							    -webkit-box-shadow: inset 0 0 10px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_BSC;?>;
							}
							.elastislide-list li a img,.elastislide-list li a,.elastislide-list li,.elastislide-list
							{
								height: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_IH;?>px;
								box-shadow:none;
							}
							.elastislide-carousel ul li a img 
							{
								border: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_BW;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_BS;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_BC;?>;
								border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_BR;?>px;
								-webkit-box-sizing: border-box;
								-moz-box-sizing: border-box;
								box-sizing: border-box;
							}
							.elastislide-carousel ul li a img.selected 
							{
								border-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_T_CurBC;?>;
							}
							.elastislide-horizontal nav span.totalsoft
							{
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_C;?>;
								font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_S;?>px;
							}
							.elastislide-horizontal nav span.totalsoft.elastislide-next:before
							{
								<?php if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '1'){ ?>
									content: '\f101';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '2'){ ?>
									content: '\f105';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '3'){ ?>
									content: '\f0a9';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '4'){ ?>
									content: '\f18e';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '5'){ ?>
									content: '\f061';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '6'){ ?>
									content: '\f0da';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '7'){ ?>
									content: '\f152';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '8'){ ?>
									content: '\f054';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '9'){ ?>
									content: '\f138';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '10'){ ?>
									content: '\f0a4';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '11'){ ?>
									content: '\f178';
								<?php }?>									
							}
							.elastislide-horizontal nav span.totalsoft.elastislide-prev:before
							{
								<?php if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '1'){ ?>
									content: '\f100';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '2'){ ?>
									content: '\f104';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '3'){ ?>
									content: '\f0a8';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '4'){ ?>
									content: '\f190';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '5'){ ?>
									content: '\f060';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '6'){ ?>
									content: '\f0d9';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '7'){ ?>
									content: '\f191';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '8'){ ?>
									content: '\f053';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '9'){ ?>
									content: '\f137';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '10'){ ?>
									content: '\f0a5';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_I_Type == '11'){ ?>
									content: '\f177';
								<?php }?>		
							}
							.og-close.totalsoft
							{
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_CI_C;?>;
								font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_CI_S;?>px;
								z-index: 999999999;
							}
							.og-close.totalsoft:before
							{
								<?php if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_CI_Type == '1'){ ?>
									content: '\f057';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_CI_Type == '2'){ ?>
									content: '\f05c';
								<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_ElG_CI_Type == '3'){ ?>
									content: '\f00d';
								<?php }?>	
							}
	 					</style>
						<div id="elastic_grid_demo"></div>
						<script src="<?php echo plugins_url('../JS/modernizr.custom.js',__FILE__);?>" type="text/javascript"></script>
						<script src="<?php echo plugins_url('../JS/classie.js',__FILE__);?>" type="text/javascript"></script>
						<script type="text/javascript" src="<?php echo plugins_url('../JS/elastic_grid.min.js',__FILE__);?>"></script>
						<script type="text/javascript">
						    jQuery(function(){
						        jQuery("#elastic_grid_demo").elastic_grid({
						            'showAllText' : '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_TSA;?>',
						            'filterEffect': '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_FE;?>', // moveup, scaleup, fallperspective, fly, flip, helix , popup
						            'hoverDirection': <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_HE;?>,
						            'hoverDelay': <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_HD;?>,
						            'hoverInverse': <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_HI;?>,
						            'expandingSpeed': <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_ES;?>,
						            'expandingHeight': <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_ElG_EH;?>,
						            'items' :
						            [
						            	<?php for($i=0;$i<$TotalSoftPortfolioManager[0]->TotalSoftPortfolio_AlbumCount;$i++){
						            		$TSoftPort_ElGrid_Images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftPortfolio_IA=%s", $TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle));
						            			for($j=0;$j<count($TSoftPort_ElGrid_Images);$j++){ ?>
						            				{
									                    'title'         : [ <?php echo "'" . html_entity_decode($TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_IT) . "',"; for($k=0;$k<count($TSoftPort_ElGrid_Images);$k++){ if($j!=$k){echo "'" . html_entity_decode($TSoftPort_ElGrid_Images[$k]->TotalSoftPortfolio_IT) . "',";}}?> ],
									                    'description'   : [ <?php echo "'" . html_entity_decode($TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_IDesc) . "',"; for($k=0;$k<count($TSoftPort_ElGrid_Images);$k++){ if($j!=$k){echo "'" . html_entity_decode($TSoftPort_ElGrid_Images[$k]->TotalSoftPortfolio_IDesc) . "',";}}?> ],
									                    'thumbnail'     : [ <?php echo "'" . $TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_IURL . "',"; for($k=0;$k<count($TSoftPort_ElGrid_Images);$k++){ if($j!=$k){echo "'" . $TSoftPort_ElGrid_Images[$k]->TotalSoftPortfolio_IURL . "',";}}?> ],
									                    'large'         : [ <?php echo "'" . $TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_IURL . "',"; for($k=0;$k<count($TSoftPort_ElGrid_Images);$k++){ if($j!=$k){echo "'" . $TSoftPort_ElGrid_Images[$k]->TotalSoftPortfolio_IURL . "',";}}?> ],
									                    'button_list'   :
									                    [							                        
															{ 'title':'View More', 'url':[ <?php echo "'" . $TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_ILink . "',"; for($k=0;$k<count($TSoftPort_ElGrid_Images);$k++){ if($j!=$k){echo "'" . $TSoftPort_ElGrid_Images[$k]->TotalSoftPortfolio_ILink . "',";}}?> ], 'new_window' : '<?php echo $TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_IONT; ?>' }
									                    ],
									                    'tags'          : ['<?php echo $TSoftPort_ElGrid_Images[$j]->TotalSoftPortfolio_IA;?>']
									                },
										<?php }} ?>
						            ]
						        });
						    });
						</script>
	 				<?php
	 			} 
	 			else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Filterable Grid')
	 			{ 
	 				?>
	 					<style type="text/css">
		 					<?php if($TotalSoftPortfolioOption[0]->TotalSoft_FG_Im_BW!='0'){ ?>
								.slider
								{
									padding: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Im_BW;?>px;
									background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Im_BC;?>;
								}
		 					<?php } else{ ?>
		 						.slider
								{
									padding:0;
									background:none !important;
								}
		 					<?php } ?>
		 					.grid__sizer,.grid__item 
		 					{
		 						padding:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_PBI;?>px;
								box-sizing:border-box;
		 					}
		 					.bar
		 					{
								text-align: center;
		 						background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_MBgC;?>;
		 					}
		 					.filter__item {
		 						color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_C;?> !important;
		 						background-color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_BgC;?> !important;
		 						font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_FS;?>px;
		 						font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_FF;?> !important;
		 					}
		 					.filter__item--selected {
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_CurC;?> !important;
								background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_CurBgC;?> !important;
							}
							.filter__item:hover, .filter__item:active, .filter__item:focus {
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_HC;?> !important;
								background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_HBgC;?> !important;
								border: none !important;
								box-shadow: none !important;
							}
							.grid__item .meta {
								text-align: center;
								background-color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_TDBgC;?>;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_TDBW;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_TDBC;?>;
							}
							.meta__title {
								font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_TFS;?>px !important;
								font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_TFF;?> !important;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_TC;?> !important;
								margin: 0 !important;
								text-transform: none !important;
								letter-spacing: 0 !important;
								font-weight: 400 !important;
								line-height: 1 !important;
							}
							.meta__brand {
								line-height: 1 !important;
							}
							.action--button {
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?>;
							}
							.no-touch .action--button:hover {
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?>;
							}
							.hoverDivPort{
								position:absolute;
								top:0px;
								left:0px;
								width:100%;
								height:100%;
								cursor:pointer;
							}
							.HovLine1_1{
								position:absolute;
								width:0%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(90deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(90deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_1{
								position:absolute;
								width:0%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(0deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(0deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_2{
								position:absolute;
								width:0%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(90deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(90deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_2{
								position:absolute;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								width:0%;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(0deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(0deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_3{
								position:absolute;
								width:0%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(90deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(90deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_3{
								position:absolute;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								width:0%;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(0deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(0deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_4{
								position:absolute;
								width:35%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(135deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_4{
								position:absolute;
								width:35%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_5{
								position:absolute;
								width:35%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(135deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_5{
								position:absolute;
								width:35%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_6{
								position:absolute;
								width:0%;
								top:50%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(135deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_6{
								position:absolute;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								width:0%;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_7{
								position:absolute;
								width:500%;
								top:55%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_7{
								position:absolute;
								width:500%;
								top:40%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_8{
								position:absolute;
								width:500%;
								top:55%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(135deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_8{
								position:absolute;
								width:500%;
								top:40%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(135deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_9{
								position:absolute;
								width:0%;
								top:0%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(135deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_9{
								position:absolute;
								width:0%;
								top:100%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(135deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}
							.HovLine1_10{
								position:absolute;
								width:0%;
								top:100%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Transition/10;?>s linear !important;
							}
							.HovLine2_10{
								position:absolute;
								width:0%;
								top:0%;
								left:50%;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Width;?>px;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg);
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Transition/10;?>s linear !important;
							}							
							.slider__item:hover .HovLine1_1{
								width:35%;
								opacity:1;
								transform:translateY(-50%) translateX(-50%) rotate(270deg);
							}
							.slider__item:hover .HovLine2_1{
								width:35%;
								opacity:1;
								transform:translateY(-50%) translateX(-50%) rotate(180deg);
							}
							.slider__item:hover .HovLine1_2{
								width:35%;
								opacity:1;
								transform:translateY(-50%) translateX(-50%) rotate(-270deg);
							}
							.slider__item:hover .HovLine2_2{
								width:35%;
								opacity:1;
								transform:translateY(-50%) translateX(-50%) rotate(-180deg);
							}
							.slider__item:hover .HovLine1_3{
								width:35% !important;
								opacity:1;								
							}
							.slider__item:hover .HovLine2_3{
								width:35%;
								opacity:1;								
							}
							.slider__item:hover .HovLine1_4{
								width:35%;
								opacity:1;
								transform:translateY(-50%) translateX(-50%) rotate(315deg);
							}
							.slider__item:hover .HovLine2_4{
								width:35%;
								opacity:1;
								transform:translateY(-50%) translateX(-50%) rotate(225deg);
							}
							.slider__item:hover .HovLine1_5{
								width:35%;
								opacity:1;
								transform:translateY(-50%) translateX(-50%) rotate(-315deg);
							}
							.slider__item:hover .HovLine2_5{
								width:35%;
								opacity:1;
								transform:translateY(-50%) translateX(-50%) rotate(-225deg);
							}
							.slider__item:hover .HovLine1_6{
								width:35%;
								opacity:1;								
							}
							.slider__item:hover .HovLine2_6{
								width:35%;
								opacity:1;								
							}
							.slider__item:hover .HovLine1_7{
								top:100%;
								opacity:1;								
							}
							.slider__item:hover .HovLine2_7{
								top:0%;
								opacity:1;								
							}
							.slider__item:hover .HovLine1_8{
								top:100%;
								opacity:1;	
							}
							.slider__item:hover .HovLine2_8{
								top:0%;
								opacity:1;
							}
							.slider__item:hover .HovLine1_9{
								width:200%;
								opacity:1;	
							}
							.slider__item:hover .HovLine2_9{
								width:200%;
								opacity:1;
							}
							.slider__item:hover .HovLine1_10{
								width:200%;
								opacity:1;	
							}
							.slider__item:hover .HovLine2_10{
								width:200%;
								opacity:1;
							}							
							.IconForPopup1{
								position:absolute;
								top:50%;
								left:20%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup1{
								opacity:1;
								left:38%;
							}
							.IconForPopup2{
								position:absolute;
								top:50%;
								left:80%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup2{
								opacity:1;
								left:62%;
							}
							.IconForPopup3{
								position:absolute;
								top:20%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup3{
								opacity:1;
								top:38%;
							}							
							.IconForPopup4{
								position:absolute;
								top:80%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup4{
								opacity:1;
								top:62%;
							}
							.IconForPopup5{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup5{
								opacity:1;
								left:38%;
							}
							.IconForPopup6{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup6{
								opacity:1;
								left:62%;
							}
							.IconForPopup7{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup7{
								opacity:1;
								top:38%;
							}							
							.IconForPopup8{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup8{
								opacity:1;
								top:62%;
							}							
							.IconForPopup9{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Color;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Color;?> !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Bg_Color;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								webkit-transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .IconForPopup9{
								opacity:1;
							}							
							.IconForLink1{
								position:absolute;
								top:50%;
								left:80%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Border_Color;?> solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Transition/10;?>s linear !important;
							}
							.IconForLink1:hover
							{
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
							}
							.slider__item:hover .IconForLink1{
								opacity:1;
								left:62%;
							}
							.IconForLink2{
								position:absolute;
								top:50%;
								left:20%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Border_Color;?> solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Transition/10;?>s linear !important;
							}
							.IconForLink2:hover
							{
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
							}
							.slider__item:hover .IconForLink2{
								opacity:1;
								left:38%;
							}							
							.IconForLink3{
								position:absolute;
								top:80%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Border_Color;?> solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Transition/10;?>s linear !important;
							}
							.IconForLink3:hover
							{
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
							}
							.slider__item:hover .IconForLink3{
								opacity:1;
								top:62%;
							}
							.IconForLink4{
								position:absolute;
								top:20%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Border_Color;?> solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Transition/10;?>s linear !important;
							}
							.IconForLink4:hover
							{
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
							}
							.slider__item:hover .IconForLink4{
								opacity:1;
								top:38%;
							}
							.IconForLink5{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Border_Color;?> solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Transition/10;?>s linear !important;
							}
							.IconForLink5:hover
							{
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
							}
							.slider__item:hover .IconForLink5{
								opacity:1;
								left:62%;
							}
							.IconForLink6{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Border_Color;?> solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Transition/10;?>s linear !important;
							}
							.IconForLink6:hover
							{
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
							}
							.slider__item:hover .IconForLink6{
								opacity:1;
								left:38%;
							}							
							.IconForLink7{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Border_Color;?> solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Transition/10;?>s linear !important;
							}
							.IconForLink7:hover
							{
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
							}
							.slider__item:hover .IconForLink7{
								opacity:1;
								top:62%;
							}
							.IconForLink8{
								position:absolute;
								top:50%;
								left:50%;
								font-size:5px;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
								padding:8px;
								border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Border_Color;?> solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Border_Size;?>px !important;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LHC;?> !important;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Transition/10;?>s linear !important;
							}
							.IconForLink8:hover
							{
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_LC;?> !important;
							}
							.slider__item:hover .IconForLink8{
								opacity:1;
								top:38%;
							}						
							.hoverDivPort1{
								position:absolute;
								width:0%;
								height:200%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s linear !important;
							}							
							.slider__item:hover .hoverDivPort1{
								width:200%;
							}
							.hoverDivPort2{
								position:absolute;
								width:0%;
								height:200%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s linear !important;
							}							
							.slider__item:hover .hoverDivPort2{
								width:200%;
							}							
							.hoverDivPort3{
								position:absolute;
								width:0%;
								height:0%;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .hoverDivPort3{
								width:200%;
								height:200%;								
							}
							.hoverDivPort4{
								position:absolute;
								width:0%;
								height:0%;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s cubic-bezier( 0.420, 0.9, 0.885, -1.310) !important;
							}
							.slider__item:hover .hoverDivPort4{
								width:200%;
								height:200%;
							}
							.hoverDivPort5{
								position:absolute;
								width:0%;
								height:200%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s cubic-bezier( 0.420, 0.9, 0.885, -1.310) !important;
							}							
							.slider__item:hover .hoverDivPort5{
								width:200%;
							}
							.hoverDivPort6{
								position:absolute;
								width:0%;
								height:200%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s cubic-bezier( 0.420, 0.9, 0.885, -1.310) !important;
							}							
							.slider__item:hover .hoverDivPort6{
								width:200%;
							}
							.hoverDivPort7{
								position:absolute;
								width:0%;
								height:0%;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .hoverDivPort7{
								width:200%;
								height:200%;
								border-radius:0%;
							}
							.hoverDivPort8{
								position:absolute;
								width:0%;
								height:0%;
								border-radius:50%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								top:50%;
								left:50%;
								transform:translateY(-50%) translateX(-50%) rotate(135deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s cubic-bezier( 0.420, 1.9, 0.885, -1.310) !important;
							}
							.slider__item:hover .hoverDivPort8{
								width:200%;
								height:200%;
								border-radius:0%;
							}
							.hoverDivPort9{
								position:absolute;
								width:200%;
								height:100%;
								top:0%;
								left:0%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								transform:translateY(100%) rotate(0deg);
								-webkit-transform:translateY(100%) rotate(0deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .hoverDivPort9{
								transform:translateY(50%) rotate(-20deg);
								-webkit-transform:translateY(60%) rotate(-24deg);
							}
							.hoverDivPort10{
								position:absolute;
								width:200%;
								height:100%;
								top:0%;
								left:0%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s linear !important;
							}
							.slider__item:hover .hoverDivPort10{
								opacity:0.8;
							}
							.hoverDivPort11{
								position:absolute;
								width:200%;
								height:100%;
								top:0%;
								left:0%;
								background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Bg_Color;?>;
								opacity:0;
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Transition/10;?>s cubic-bezier( 0.420, 0.9, 0.885, -1.310) !important;
							}
							.slider__item:hover .hoverDivPort11{
								opacity:0.8;
							}						
							.hovRound1{
								position:absolute;
								width:0%;
								height:0%;
								border:1px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								top:50%;
								left:50%;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_TRansition/10;?>s linear !important;
							}
							.slider__item:hover .hovRound1{
								width:80%;
								height:80%;								
								border:100px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
							}
							.hovRound2{
								position:absolute;
								width:0%;
								height:0%;
								border:1px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								top:50%;
								left:50%;
								opacity:0;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_TRansition/10;?>s cubic-bezier( 0.420, 1.3, 0.885, -1.3) !important;
							}
							.slider__item:hover .hovRound2{
								width:80%;
								height:80%;								
								border:100px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
							}
							.hovRound3{
								position:absolute;
								width:0%;
								height:0%;
								border:1px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								top:50%;
								left:50%;
								opacity:0;
								border-radius:50%;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_TRansition/10;?>s linear !important;
							}
							.slider__item:hover .hovRound3{
								width:40%;
								height:40%;								
								border:300px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
							}
							.hovRound4{
								position:absolute;
								width:0%;
								height:0%;
								border:1px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								top:50%;
								left:50%;
								opacity:0;
								border-radius:50%;
								transform:translateY(-50%) translateX(-50%);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_TRansition/10;?>s cubic-bezier( 0.420, 1.3, 0.885, -0.5) !important;
							}
							.slider__item:hover .hovRound4{
								width:40%;
								height:40%;								
								border:300px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
							}
							.hovRound5{
								position:absolute;
								width:0%;
								height:0%;
								border:1px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								top:50%;
								left:50%;
								opacity:0;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_TRansition/10;?>s linear !important;
							}
							.slider__item:hover .hovRound5{
								width:40%;
								height:40%;
								border:300px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
							}
							.hovRound6{
								position:absolute;
								width:0%;
								height:0%;
								border:1px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								top:50%;
								left:50%;
								opacity:0;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_TRansition/10;?>s cubic-bezier( 0.420, 1.3, 0.885, -0.5) !important;
							}
							.slider__item:hover .hovRound6{
								width:40%;
								height:40%;
								border:300px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
							}
							.hovRound7{
								position:absolute;
								width:0%;
								height:0%;
								border:1px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								top:50%;
								left:50%;
								opacity:0;
								transform:translateY(-50%) translateX(-50%) rotate(0deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_TRansition/10;?>s linear !important;
							}
							.slider__item:hover .hovRound7{
								width:40%;
								height:40%;
								border:300px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
							}
							.hovRound8{
								position:absolute;
								width:0%;
								height:0%;
								border:1px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								top:50%;
								left:50%;
								opacity:0;
								transform:translateY(-50%) translateX(-50%) rotate(0deg);
								transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_TRansition/10;?>s cubic-bezier( 0.420, 1.3, 0.885, -0.5) !important;
							}
							.slider__item:hover .hovRound8{
								width:40%;
								height:40%;
								border:300px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Bg_Color;?>;
								transform:translateY(-50%) translateX(-50%) rotate(45deg);
							}							
							.portIc{
								cursor:pointer;
							}
							.portLink{
								cursor:pointer;
								box-shadow: none !important;
							}
							.portLink:focus
							{
								box-shadow: none !important;
								outline: none !important;
							}
							.carSliderPort{
								position:fixed;
								bottom:0%;
								width:100%;
								left:0%;
								display:none;
								padding-top:5px;
								padding-bottom:5px;
								z-index:999999999 !important;
								text-align:center;
							}
							.carSliderPortRel{
								position:relative;
								margin-left:auto;
								margin-right:auto;
							}
							.carImgs{
								display:inline-block !important;
								position:relative;
								z-index:999999999;
								cursor:pointer;
								margin-left:2px;
								margin-right:2px;
								height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Img_Height;?>px;
							}
							.leftClickPortSl{
								position:absolute;
								display:block;
								width:50%;
								height:100%;
								left:0px;
								top:0px;
								cursor:pointer;
							}
							.rightClickPortSl{
								position:absolute;
								width:50%;
								display:block;
								height:100%;
								right:0px;
								top:0px;
								cursor:pointer;
							}
							.totLeft{
								position: absolute;
								top: 50%;
								font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Size_Time;?>px;
								transform: translateY(-50%);
								left: 2px;
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Color;?>;
								display:none;
							}
							.totRight{
								position: absolute;
								top: 50%;
								font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Size_Time;?>px;
								transform: translateY(-50%);
								right: 2px;
								color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Color;?>;
								display:none;
							}
							.leftClickPortSl:hover .totLeft{
								display:block;
							}
							.rightClickPortSl:hover .totRight{
								display:block;
							}
							.caruselLeftClick{
								position:absolute;
								left:0px;
								top:50%;
								transform:translateY(-50%);
								cursor:pointer;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Color;?>;
								z-index:99999999999;
								display:none;
							}
							.caruselRightClick{
								position:absolute;
								right:0px;
								top:50%;
								transform:translateY(-50%);
								cursor:pointer;
								color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Color;?>;
								z-index:99999999999;
								display:none;
							}
							.carCl{
								font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Size;?>px;
							}
							#jdbpopup_container .jdbpopup_overlay{position:fixed;width:100%;height:100%;z-index:20000;top:0;left:0;padding:0;background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Popup_Ov_Bg_Color;?>}
							#jdbpopup_container .jdbpopup_subcontainer{position:fixed;display:block;top:50%;left:50%;height:auto !important;width:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Img_Width;?>px !important;max-width:95%;z-index:999999999999999999999;border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Img_Border_Width;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Img_Border_Color;?>;margin-top:auto !important;margin-left:auto !important;transform:translateY(-50%) translateX(-50%);-webkit-transform:translateY(-50%) translateX(-50%);max-height:80%;overflow:hidden;}
							.portDelIcPop{font-size:20px;background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Del_Icon_Bg_Color;?>;padding:10px;color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Del_Icon_Color;?>}
							#jdbpopup_container .jdbpopup_subcontainer .jdbpopup_caption.caption_on { position:absolute;display:block;width:100%;padding:5px 0;left:0;bottom:6px;background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Title_Bg_Color;?>;text-align:center;line-height:1 !important;font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Title_Font_Size;?>px;font-weight:400;color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Title_Color;?>;-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-ms-backface-visibility:hidden;-o-backface-visibility:hidden;backface-visibility:hidden;font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Title_Font_Family;?>; text-align: center; }
							@media screen and (max-width: 500px)
							{
								.carSliderPort
								{
									display: none !important;
								}
								.gird, .grid *, .jdbpopup_subcontainer, .jdbpopup_subcontainer *
								{
									cursor: default !important;
								}
							}
	 					</style>						
						<div class="bar">
							<div class="filter">
								<button class="action filter__item filter__item--selected" data-filter="*"><?php echo html_entity_decode($TotalSoftPortfolioOption[0]->TotalSoft_FG_TSA);?></button>
								<?php for($i=0;$i<$TotalSoftPortfolioManager[0]->TotalSoftPortfolio_AlbumCount;$i++){
				            		?>
				            			<button class="action filter__item" data-filter="<?php echo  '.' . html_entity_decode($TotalSoftPortfolioAlbums[$i]->id);?>"><i class="icon" style='display:none;'></i><?php echo html_entity_decode($TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle);?></button>
								<?php } ?> 
							</div>
						</div>
						<div class="view">
							<!-- Grid -->
							<section class="grid grid--loading">
								<!-- Loader -->
								<img class="grid__loader" src="<?php echo plugins_url('../Images/grid.svg',__FILE__);?>" width="60" alt="Loader image" />
								<!-- Grid sizer for a fluid Isotope (Masonry) layout -->
								<div class="grid__sizer"></div>
								<!-- Grid items -->
								<?php for($i=0;$i<count($TotalSoftPortfolioImages);$i++){
									$Portfolio_AID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoftPortfolio_ATitle=%s order by id desc limit 1",$TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IA));

									if($TotalSoftPortfolioOption[0]->TotalSoft_FG_DSI=='true'){
										if($i%6==0){
											?>
												<div class="grid__item grid__item--size-a <?php echo $Portfolio_AID[0]->id;?>">
													<div class="slider">
														<div  class="slider__item slider__item<?php echo $i+1; ?>">
															<img  class='forZoom' src="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>" alt="Dummy" name='<?php echo $Portfolio_AID[0]->id;?>' />
															<div class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Effect_Type;?>'>
																
															</div>
															<div class='hovL <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Effect_Type;?>'></div>
															<div class='hovL <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Effect_Type;?>'></div>
															<div style='box-sizing:initial;' class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Effect_Type;?>'>
															
															</div>
															<i href="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>" title="<?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IT);?>" class='jdbpopup <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Effect_Type;?> <?php echo $Pop_Ic_Type; ?> portIc portIc<?php echo $i+1; ?>' onclick='carPop("<?php echo $Portfolio_AID[0]->id;?>",<?php echo $i; ?>,"<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>")'></i>		
															<?php if($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_ILink!=''){ ?>
															<a href="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_ILink;?>" class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Effect_Type;?> totalsoft totalsoft-link portLink portLink<?php echo $i+1; ?>' style='text-decoration:none;'></a>
															<?php } ?>	
														</div>
													</div>
													<div class="meta">
														<h3 class="meta__title" name='<?php echo $Portfolio_AID[0]->id;?>'><?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IT);?></h3>
														<?php if($TotalSoftPortfolioOption[0]->TotalSoft_FG_DShow=='true'){ ?>
															<span class="meta__brand"><?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IDesc);?></span>
														<?php } ?>
													</div>												
												</div>
											<?php
										}
										else
										{
											?>
												<div class="grid__item <?php echo $Portfolio_AID[0]->id;?>">
													<div class="slider">
														<div class="slider__item slider__item<?php echo $i+1; ?>">
															<img class='forZoom' src="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>" alt="Dummy" name='<?php echo $Portfolio_AID[0]->id;?>' />
															<div class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Effect_Type;?>'></div>
															<div class='hovL <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Effect_Type;?>' ></div>
															<div class='hovL <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Effect_Type;?>' ></div>
															<div style='box-sizing:initial;' class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Effect_Type;?>'></div>
															<i href="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>" title="<?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IT);?>" class='jdbpopup <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Effect_Type;?> <?php echo $Pop_Ic_Type; ?> portIc portIc<?php echo $i+1; ?>' onclick='carPop("<?php echo $Portfolio_AID[0]->id;?>",<?php echo $i; ?>,"<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>")'></i>
															<?php if($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_ILink!=''){ ?>
															<a href="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_ILink;?>" class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Effect_Type;?> totalsoft totalsoft-link portLink portLink<?php echo $i+1; ?>' style='text-decoration:none;'></a>
															<?php } ?>	
														</div>
													</div>
													<div class="meta">
														<h3 class="meta__title" name='<?php echo $Portfolio_AID[0]->id;?>'><?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IT);?></h3>
														<?php if($TotalSoftPortfolioOption[0]->TotalSoft_FG_DShow=='true'){ ?>
															<span class="meta__brand"><?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IDesc);?></span>
														<?php } ?>
													</div>	
												</div>
											<?php
										}
									}
									else
									{
										?>
											<div class="grid__item <?php echo $Portfolio_AID[0]->id;?>">
												<div class="slider">
													<div class="slider__item slider__item<?php echo $i+1; ?>">
														<img class='forZoom' src="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>" alt="Dummy" name='<?php echo $Portfolio_AID[0]->id;?>' />
															<div class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Ov_Effect_Type;?>'></div>
															<div class='hovL <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line1_Effect_Type;?>' ></div>
															<div class='hovL <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Line2_Effect_Type;?>' ></div>
															<div style='box-sizing:initial;' class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Hov_Raund_Effect_Type;?>'></div>									
															<i href="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>" title="<?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IT);?>" class='jdbpopup <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Hov_Effect_Type;?> <?php echo $Pop_Ic_Type; ?> portIc portIc<?php echo $i+1; ?>' onclick='carPop("<?php echo $Portfolio_AID[0]->id;?>",<?php echo $i; ?>,"<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IURL;?>")'></i>
															<?php if($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_ILink!=''){ ?>
															<a href="<?php echo $TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_ILink;?>" class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Link_Icon_Effect_Type;?> totalsoft totalsoft-link portLink portLink<?php echo $i+1; ?>' style='text-decoration:none;'></a>
															<?php } ?>	
													</div>
												</div>
												<div class="meta">
													<h3 class="meta__title" name='<?php echo $Portfolio_AID[0]->id;?>'><?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IT);?></h3>
													<?php if($TotalSoftPortfolioOption[0]->TotalSoft_FG_DShow=='true'){ ?>
														<span class="meta__brand"><?php echo html_entity_decode($TotalSoftPortfolioImages[$i]->TotalSoftPortfolio_IDesc);?></span>
													<?php } ?>
												</div>	
											</div>
										<?php
									}
				            	} ?>
								<input type='text' style='display:none;' class='popIcFS' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Icon_Size;?>'>
								<input type='text' style='display:none;' class='popStartTime' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Popup_Start_Time;?>'>
								<input type='text' style='display:none;' class='popStopTime' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Popup_Stop_Time;?>'>
								<input type='text' style='display:none;' class='popTimeEffectType' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Popup_Time_Effect_Type;?>'>
								<input type='text' style='display:none;' class='popEffectType' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Popup_Effect_Type;?>'>
								<input type='text' style='display:none;' class='sliderImgWidth' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Img_Width;?>'>
								<input type='text' style='display:none;' class='carsliderImgBordWidth' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Img_Border_Width;?>'>
								<input type='text' style='display:none;' class='carsliderImgBordColor' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Img_Border_Color;?>'>
								<input type='text' style='display:none;' class='SShowPauseTime' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_SShow_Paause_Time;?>'>
								<input type='text' style='display:none;' class='SliderLeftIconType' value='<?php echo $TotalSoft_FG_Slider_Icon_Left; ?>'>
								<input type='text' style='display:none;' class='SliderRightIconType' value='<?php echo $TotalSoft_FG_Slider_Icon_Right; ?>'>
								<input type='text' style='display:none;' class='DelIconType' value='<?php echo $TotalSoft_FG_Slider_Del_Icon_Type; ?>'>
								<input type='text' style='display:none;' class='DelIconSize' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Del_Icon_Size;?>'>
								<input type='text' style='display:none;' class='popImgWidth' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Img_Width;?>'>
								<input type='text' style='display:none;' class='CarSliderIconSize' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Car_Slider_Icon_Size;?>'>
								<input type='text' style='display:none;' class='SliderIconSize' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Slider_Icon_Size_Time;?>'>
								<input type='text' style='display:none;' class='SliderTitleImgFontSize' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Pop_Title_Font_Size;?>'>
								<input type='text' style='display:none;' class='CarSliderIconTypeLeft' value='<?php echo $TotalSoft_FG_Car_Slider_Icon_Left; ?>'>
								<input type='text' style='display:none;' class='CarSliderIconTypeRight' value='<?php echo $TotalSoft_FG_Car_Slider_Icon_Right; ?>'>
								<input type='text' style='display:none;' class='filtItemFSize' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_FG_Nav_FS;?>'>						
							</section>
							<!-- /grid-->
						</div>
						<!-- /view -->
						<script>
						jQuery(document).ready(function(){
							var popIcFS = jQuery('.popIcFS').val();
							var DelIconSize = jQuery('.DelIconSize').val();
							var popImgWidth = parseInt(jQuery('.popImgWidth').val());
							var CarSliderIconSize = parseInt(jQuery('.CarSliderIconSize').val());
							var SliderIconSize = parseInt(jQuery('.SliderIconSize').val());
							var SliderTitleImgFontSize =  parseInt(jQuery('.SliderTitleImgFontSize').val());
							var filtItemFSize =  parseInt(jQuery('.filtItemFSize').val());var IcArray = [];
							jQuery('.portIc').each(function(){
								IcArray.push(jQuery(this));
							})
							function resp(){
								for(i=1;i<=IcArray.length;i++){
									jQuery('.portIc'+i).css('font-size',Math.ceil(popIcFS*jQuery('.slider__item'+i).width()/1000));
									jQuery('.portIc'+i).css('padding',Math.ceil(30*jQuery('.slider__item'+i).width()/1000));
									jQuery('.portLink'+i).css('font-size',Math.ceil(popIcFS*jQuery('.slider__item'+i).width()/1000));
									jQuery('.portLink'+i).css('padding',Math.ceil(30*jQuery('.slider__item'+i).width()/1000));
								}
								jQuery('.filter__item').css('font-size',filtItemFSize*jQuery('.filtItemFSize').parent().parent().width()/(jQuery('.filtItemFSize').parent().parent().width()+200));
								if(jQuery(window).width()<=popImgWidth){
									jQuery('.portDelIcPop').css('font-size',Math.ceil(DelIconSize*jQuery(window).width()/popImgWidth));
									jQuery('.portDelIcPop').css('padding',Math.ceil(5*jQuery(window).width()/popImgWidth));
									jQuery('.carCl').css('font-size',Math.ceil(CarSliderIconSize*jQuery(window).width()/popImgWidth));
									jQuery('.totLeft').css('font-size',Math.ceil(SliderIconSize*jQuery(window).width()/popImgWidth));
									jQuery('.totRight').css('font-size',Math.ceil(SliderIconSize*jQuery(window).width()/popImgWidth));
									jQuery('#jdbpopup_container .jdbpopup_subcontainer .jdbpopup_caption.caption_on').css('font-size',Math.ceil(SliderTitleImgFontSize*jQuery(window).width()/popImgWidth));
								}
							}
							if (!jQuery('.filtItemFSize').parent().parent().width()) 
							{
								setTimeout(function(){
									resp();
								},100)
							}
							else
							{
								resp();
							}
							jQuery(window).resize(function(){
								resp();
							})
						})
							var carsliderImgBordWidth = parseInt(jQuery('.carsliderImgBordWidth').val());
							var carsliderImgBordColor = jQuery('.carsliderImgBordColor').val();
							var carsliderImgBordStyle = 'solid';
							var SShow = 'true';
							var SShowPauseTime = parseInt(jQuery('.SShowPauseTime').val());
							var CarSliderIconTypeLeft = jQuery('.CarSliderIconTypeLeft').val();
							var CarSliderIconTypeRight = jQuery('.CarSliderIconTypeRight').val();
							var clArray=[];
							var titArray=[];
							var clNumber=[];
							var width=0;
							var count = 0;
							var left_left=0;
							var win_width=jQuery(window).width();
							var z;
							function carPop(cl,number,srcc)
							{
								jQuery('body').append("<div class='carSliderPort' onmouseover='stop()' onmouseout='start()'><div class='carSliderPortRel'></div><i class='caruselLeftClick carCl "+CarSliderIconTypeLeft+"' onclick='carusClLeft()'></i><i class='caruselRightClick carCl "+CarSliderIconTypeRight+"' onclick='carusClRight()'></i></div>");
								jQuery('.carSliderPort').show(1000);
								jQuery('.forZoom').each(function(){
									if(jQuery(this).attr('name')==cl){
										clArray.push(jQuery(this).attr('src'));
									}									
								})
								jQuery('.meta__title').each(function(){
									if(jQuery(this).attr('name')==cl){
										titArray.push(jQuery(this).text());
									}
								})						
								var bigSrc = jQuery('#jdbpopup_container .jdbpopup_subcontainer img').attr('src');								
								for(i=0;i<=clArray.length-1;i++){
									jQuery('.carSliderPortRel').append("<img style='max-width:none;' src='"+clArray[i]+"' onclick=\"(sr('"+clArray[i]+"',"+i+"))\"  class='carImgs carImgs"+i+"' />");
									width += jQuery('.carImgs'+i).width()+carsliderImgBordWidth+5;		
									if(jQuery('.carImgs'+i).attr('src')==srcc){
										jQuery('.carImgs'+i).css('border',''+carsliderImgBordWidth+'px '+carsliderImgBordStyle+' '+carsliderImgBordColor+'');
										count = i;
									}
								}
								jQuery('.carSliderPortRel').css('width',width);
								if(jQuery(window).width()<=width){
									jQuery('.carCl').css('display','block');
								}
								if(jQuery('.carImgs'+count).offset().left+jQuery('.carImgs'+count).width()>win_width){
									jQuery('.carSliderPortRel').animate({'left':'-='+(jQuery('.carImgs'+count).offset().left-(win_width-jQuery('.carImgs'+count).width()))+'px'},500);
									left_left=left_left-(jQuery('.carImgs'+count).offset().left-(win_width-jQuery('.carImgs'+count).width()));
								}else if(jQuery('.carImgs'+count).offset().left<0){
									jQuery('.carSliderPortRel').animate({'left':'0',},500);
									left_left=0;
								}
								if(clArray.length>0 ){
									if(SShow == 'true'){
										z=setInterval(function(){
											y=false;
												changeImgs();
										},SShowPauseTime*1000)
									}
								}else{
									clearInterval(z);
								}
							}
							function stop(){
								clearInterval(z);
							}
							function start(){
								if(clArray.length>0){
									z=setInterval(function(){
										y=false;
										changeImgs();
									},SShowPauseTime*1000)
								}else{
									clearInterval(z);
								}
							}
							var y=false;
							function changeImgs(){
								if(y==true){
									return
								}
								count++;
								if(count==clArray.length){
									count=0;
								}
								jQuery('.jdbpopup_subcontainer').hide(500);
								jQuery('.carImgs').css('border','none')
								jQuery('.carImgs'+count).css('border',''+carsliderImgBordWidth+'px '+carsliderImgBordStyle+' '+carsliderImgBordColor+'');
								y=true;
								setTimeout(function(){
									jQuery('#jdbpopup_container .jdbpopup_subcontainer img').attr('src',clArray[count]);
									jQuery('.jdbpopup_caption').text(titArray[count]);
									jQuery('.jdbpopup_subcontainer').show(500);
								},500)
								setTimeout(function(){
									y=false;
								},1000)
								if(jQuery('.carImgs'+count).offset().left+jQuery('.carImgs'+count).width()>win_width){
									jQuery('.carSliderPortRel').animate({'left':'-='+(jQuery('.carImgs'+count).offset().left-(win_width-jQuery('.carImgs'+count).width()))+'px'},500);
									left_left=left_left-(jQuery('.carImgs'+count).offset().left-(win_width-jQuery('.carImgs'+count).width()));
								}else if(jQuery('.carImgs'+count).offset().left<0){
									jQuery('.carSliderPortRel').animate({'left':'-='+jQuery('.carImgs'+count).offset().left,},500);
									left_left=left_left-jQuery('.carImgs'+count).offset().left;
								}								
							}
							function rCl(){
								changeImgs();
							}
							function lCl(){
								count--;
								if(count==-1){
									count=clArray.length-1;
								}
								jQuery('.jdbpopup_subcontainer').hide(500);
								jQuery('.carImgs').css('border','none')
								jQuery('.carImgs'+count).css('border',''+carsliderImgBordWidth+'px '+carsliderImgBordStyle+' '+carsliderImgBordColor+'');
								setTimeout(function(){
									jQuery('#jdbpopup_container .jdbpopup_subcontainer img').attr('src',clArray[count]);
									jQuery('.jdbpopup_caption').text(titArray[count]);
									jQuery('.jdbpopup_subcontainer').show(500);
								},500)
								if(jQuery('.carImgs'+count).offset().left+jQuery('.carImgs'+count).width()>win_width){
									jQuery('.carSliderPortRel').animate({'left':'-='+(jQuery('.carImgs'+count).offset().left-(win_width-jQuery('.carImgs'+count).width()))+'px'},500);
									left_left=left_left-(jQuery('.carImgs'+count).offset().left-(win_width-jQuery('.carImgs'+count).width()));
								}else if(jQuery('.carImgs'+count).offset().left<0){
									jQuery('.carSliderPortRel').animate({'left':'-='+jQuery('.carImgs'+count).offset().left,},500);
									left_left=left_left-jQuery('.carImgs'+count).offset().left;
								}
							}
							function sr(src,j){
								if(y==true){
									return;
								}
								y=true;
								count=j;
								jQuery('.jdbpopup_subcontainer').hide(500);
								jQuery('.carImgs').css('border','none')
								jQuery('.carImgs'+count).css('border',''+carsliderImgBordWidth+'px '+carsliderImgBordStyle+' '+carsliderImgBordColor+'');
								setTimeout(function(){
									jQuery('#jdbpopup_container .jdbpopup_subcontainer img').attr('src',src);
									jQuery('.jdbpopup_caption').text(titArray[count]);
									jQuery('.jdbpopup_subcontainer').show(500);
								},500)
								setTimeout(function(){
									y=false;
								},1000)
							}
							function resp(){
								if(jQuery(window).width()<=width){
									jQuery('.carCl').css('display','block');
								}
							}
							resp();
							jQuery(window).resize(function(){
								resp();
							})
							function carRight(){
								if(win_width-jQuery('.carSliderPortRel').width()>=left_left){
									left_left=0;
									jQuery('.carSliderPortRel').animate({'left':'0px'},500);
								}else{
									left_left = left_left-60;
									jQuery('.carSliderPortRel').animate({'left':'-=60px'},500);
								}
							}
							function carLeft(){
								if(jQuery('.carSliderPortRel').offset().left>=0){
									left_left=win_width-jQuery('.carSliderPortRel').width();
									jQuery('.carSliderPortRel').animate({'left':win_width-jQuery('.carSliderPortRel').width()+'px'},500);
								}else{
									left_left=left_left+60;
									jQuery('.carSliderPortRel').animate({'left':'+=60px'},500);
								}
							}
							function carusClRight(){	
								carRight();
							}
							function carusClLeft(){
								carLeft();
							}
							function closeClick(){
								clearInterval(z);
								jQuery('.carSliderPort').hide(500);
								jQuery('.carImgs').remove();
								clArray=[];
								jQuery('.carCl').css('display','none');
								jQuery('.carSliderPortRel').css('left','0');
								left_left=0;
								width=0;
							}
						</script>
						<script src="<?php echo plugins_url('../JS/isotope.pkgd.min.js',__FILE__);?>"></script>
						<script src="<?php echo plugins_url('../JS/flickity.pkgd.min.js',__FILE__);?>"></script>
						<script src="<?php echo plugins_url('../JS/modernizr.custom.js',__FILE__);?>"></script>
						<script src="<?php echo plugins_url('../JS/main.js',__FILE__);?>"></script>
						<script src="<?php echo plugins_url('../JS/Filt_popup.min.js',__FILE__);?>"></script>
				<?php } else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Gallery Portfolio/Content Popup'){ ?>
					<script src="<?php echo plugins_url('../JS/jquery.quicksand.js',__FILE__);?>" type="text/javascript"></script>
				    <script src="<?php echo plugins_url('../JS/jquery.easing.js',__FILE__);?>" type="text/javascript"></script>
				    <script src="<?php echo plugins_url('../JS/script.js',__FILE__);?>" type="text/javascript"></script>
					
					<link href="<?php echo plugins_url('../CSS/prettyPhoto.css',__FILE__);?>" rel="stylesheet" type="text/css" />

				    <script type="text/javascript">
						function resp(){
							jQuery('.pp_description').css('font-size',<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_TFS;?>*jQuery('.pp_hoverContainer').width()/(jQuery('.pp_hoverContainer').width()+50));
							jQuery('.totalsoft-port-cpop-close').css('font-size',<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_CIS;?>*jQuery('.pp_hoverContainer').width()/(jQuery('.pp_hoverContainer').width()+50))
							jQuery('.totalsoft-port-cpop-pl-pa').css('font-size',<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_PIS;?>*jQuery('.pp_hoverContainer').width()/(jQuery('.pp_hoverContainer').width()+50))
							jQuery('.totalsoft-port-cpop-nepr').css('font-size',<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_ArrS;?>*jQuery('.pp_hoverContainer').width()/(jQuery('.pp_hoverContainer').width()+50))
							jQuery('.totalsoft-port-cpop-text').css('font-size',<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_NFS;?>*jQuery('.pp_hoverContainer').width()/(jQuery('.pp_hoverContainer').width()+50))
						}
				    	(function($){$.prettyPhoto={version:'3.0'};$.fn.prettyPhoto=function(pp_settings){pp_settings=jQuery.extend({animation_speed:'fast',slideshow:false,autoplay_slideshow:false,opacity:0.80,show_title:true,allow_resize:true,default_width:500,default_height:344,counter_separator_label:'/',theme:'facebook',hideflash:false,wmode:'opaque',autoplay:true,modal:false,overlay_gallery:true,keyboard_shortcuts:true,changepicturecallback:function(){},callback:function(){},markup:'<div class="pp_pic_holder"> \
					      <div class="pp_top"> \
					       <div class="pp_left"></div> \
					       <div class="pp_middle"></div> \
					       <div class="pp_right"></div> \
					      </div> \
					      <div class="pp_content_container"> \
					       <div class="pp_left"> \
					       <div class="pp_right"> \
					        <div class="pp_content"> \
					         <div class="pp_loaderIcon"></div> \
					         <div class="pp_fade"> \
					          <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
					          <div class="pp_hoverContainer"> \
					           <a class="pp_next" href="#"> </a> \
					           <a class="pp_previous" href="#"> </a> \
					          </div> \
					          <div id="pp_full_res"></div> \
					          <div class="pp_details clearfix"> \
					           <p class="pp_description"></p> \
					           <i class="totalsoft-port-cpop-close pp_close totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_CType;?>"><span><?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_CIT;?></span></i> \
					           <div class="pp_nav"> \
					            <i href="#" class="pp_arrow_previous totalsoft-port-cpop-nepr totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_AType;?>-left"></i> \
					            <p class="currentTextHolder totalsoft-port-cpop-text">0/0</p> \
					            <i href="#" class="pp_arrow_next totalsoft-port-cpop-nepr totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_AType;?>-right"></i> \
					           </div> \
					          </div> \
					         </div> \
					        </div> \
					       </div> \
					       </div> \
					      </div> \
					      <div class="pp_bottom"> \
					       <div class="pp_left"></div> \
					       <div class="pp_middle"></div> \
					       <div class="pp_right"></div> \
					      </div> \
					     </div> \
					     <div class="pp_overlay"></div>',gallery_markup:'<div class="pp_gallery"> \
					        <a href="#" class="pp_arrow_previous">Previous</a> \
					        <ul> \
					         {gallery} \
					        </ul> \
					        <a href="#" class="pp_arrow_next">Next</a> \
					       </div>',image_markup:'<img id="fullResImage" src="" />',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline clearfix">{content}</div>',custom_markup:''},pp_settings);var matchedObjects=this,percentBased=false,correctSizes,pp_open,pp_contentHeight,pp_contentWidth,pp_containerHeight,pp_containerWidth,windowHeight=$(window).height(),windowWidth=$(window).width(),pp_slideshow;doresize=true,scroll_pos=_get_scroll();$(window).unbind('resize').resize(function(){_center_overlay();_resize_overlay();});if(pp_settings.keyboard_shortcuts){$(document).unbind('keydown').keydown(function(e){setTimeout(function(){resp()},450);if(typeof $pp_pic_holder!='undefined'){if($pp_pic_holder.is(':visible')){switch(e.keyCode){case 37:$.prettyPhoto.changePage('previous');break;case 39:$.prettyPhoto.changePage('next');break;case 27:if(!settings.modal)
					$.prettyPhoto.close();break;};return false;};};});}
					$.prettyPhoto.initialize=function(){settings=pp_settings;if($.browser.msie&&parseInt($.browser.version)==6)settings.theme="light_square";_buildOverlay(this);if(settings.allow_resize)
					$(window).scroll(function(){_center_overlay();});_center_overlay();set_position=jQuery.inArray($(this).attr('href'),pp_images);$.prettyPhoto.open();return false;}
					$.prettyPhoto.open=function(event){if(typeof settings=="undefined"){settings=pp_settings;if($.browser.msie&&$.browser.version==6)settings.theme="light_square";_buildOverlay(event.target);pp_images=$.makeArray(arguments[0]);pp_titles=(arguments[1])?$.makeArray(arguments[1]):$.makeArray("");pp_descriptions=(arguments[2])?$.makeArray(arguments[2]):$.makeArray("");isSet=(pp_images.length>1)?true:false;set_position=0;}
					if($.browser.msie&&$.browser.version==6)$('select').css('visibility','hidden');if(settings.hideflash)$('object,embed').css('visibility','hidden');_checkPosition($(pp_images).size());$('.pp_loaderIcon').show();if($ppt.is(':hidden'))$ppt.css('opacity',0).show();$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity);$pp_pic_holder.find('.currentTextHolder').text((set_position+1)+settings.counter_separator_label+$(pp_images).size());$pp_pic_holder.find('.pp_description').show().html(unescape(pp_descriptions[set_position]));(settings.show_title&&pp_titles[set_position]!=""&&typeof pp_titles[set_position]!="undefined")?$ppt.html(unescape(pp_titles[set_position])):$ppt.html('&nbsp;');movie_width=(parseFloat(grab_param('width',pp_images[set_position])))?grab_param('width',pp_images[set_position]):settings.default_width.toString();movie_height=(parseFloat(grab_param('height',pp_images[set_position])))?grab_param('height',pp_images[set_position]):settings.default_height.toString();if(movie_width.indexOf('%')!=-1||movie_height.indexOf('%')!=-1){movie_height=parseFloat(($(window).height()*parseFloat(movie_height)/100)-150);movie_width=parseFloat(($(window).width()*parseFloat(movie_width)/100)-150);percentBased=true;}else{percentBased=false;}
					$pp_pic_holder.fadeIn(function(){resp();imgPreloader="";switch(_getFileType(pp_images[set_position])){case'image':imgPreloader=new Image();nextImage=new Image();if(isSet&&set_position>$(pp_images).size())nextImage.src=pp_images[set_position+1];prevImage=new Image();if(isSet&&pp_images[set_position-1])prevImage.src=pp_images[set_position-1];$pp_pic_holder.find('#pp_full_res')[0].innerHTML=settings.image_markup;$pp_pic_holder.find('#fullResImage').attr('src',pp_images[set_position]);imgPreloader.onload=function(){correctSizes=_fitToViewport(imgPreloader.width,imgPreloader.height);_showContent();};imgPreloader.onerror=function(){alert('Image cannot be loaded. Make sure the path is correct and image exist.');$.prettyPhoto.close();};imgPreloader.src=pp_images[set_position];break;case'youtube':correctSizes=_fitToViewport(movie_width,movie_height);movie='http://www.youtube.com/v/'+grab_param('v',pp_images[set_position]);if(settings.autoplay)movie+="&autoplay=1";toInject=settings.flash_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case'vimeo':correctSizes=_fitToViewport(movie_width,movie_height);movie_id=pp_images[set_position];var regExp=/http:\/\/(www\.)?vimeo.com\/(\d+)/;var match=movie_id.match(regExp);movie='http://player.vimeo.com/video/'+match[2]+'?title=0&amp;byline=0&amp;portrait=0';if(settings.autoplay)movie+="&autoplay=1;";vimeo_width=correctSizes['width']+'/embed/?moog_width='+correctSizes['width'];toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,correctSizes['height']).replace(/{path}/g,movie);break;case'quicktime':correctSizes=_fitToViewport(movie_width,movie_height);correctSizes['height']+=15;correctSizes['contentHeight']+=15;correctSizes['containerHeight']+=15;toInject=settings.quicktime_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);break;case'flash':correctSizes=_fitToViewport(movie_width,movie_height);flash_vars=pp_images[set_position];flash_vars=flash_vars.substring(pp_images[set_position].indexOf('flashvars')+10,pp_images[set_position].length);filename=pp_images[set_position];filename=filename.substring(0,filename.indexOf('?'));toInject=settings.flash_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+'?'+flash_vars);break;case'iframe':correctSizes=_fitToViewport(movie_width,movie_height);frame_url=pp_images[set_position];frame_url=frame_url.substr(0,frame_url.indexOf('iframe')-1);toInject=settings.iframe_markup.replace(/{width}/g,correctSizes['width']).replace(/{height}/g,correctSizes['height']).replace(/{path}/g,frame_url);break;case'custom':correctSizes=_fitToViewport(movie_width,movie_height);toInject=settings.custom_markup;break;case'inline':myClone=$(pp_images[set_position]).clone().css({'width':settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline clearfix"></div></div>').appendTo($('body'));correctSizes=_fitToViewport($(myClone).width(),$(myClone).height());$(myClone).remove();toInject=settings.inline_markup.replace(/{content}/g,$(pp_images[set_position]).html());break;};if(!imgPreloader){$pp_pic_holder.find('#pp_full_res')[0].innerHTML=toInject;_showContent();};});return false;};
					$.prettyPhoto.changePage=function(direction){currentGalleryPage=0;if(direction=='previous'){set_position--;if(set_position<0){set_position=0;return;}}else if(direction=='next'){set_position++;if(set_position>$(pp_images).size()-1){set_position=0;}}else{set_position=direction;};if(!doresize)doresize=true;$('.pp_contract').removeClass('pp_contract').addClass('pp_expand');_hideContent(function(){$.prettyPhoto.open();});};$.prettyPhoto.changeGalleryPage=function(direction){if(direction=='next'){currentGalleryPage++;if(currentGalleryPage>totalPage){currentGalleryPage=0};}else if(direction=='previous'){currentGalleryPage--;if(currentGalleryPage<0){currentGalleryPage=totalPage;}}else{currentGalleryPage=direction;};itemsToSlide=(currentGalleryPage==totalPage)?pp_images.length-((totalPage)*itemsPerPage):itemsPerPage;$pp_pic_holder.find('.pp_gallery li').each(function(i){$(this).animate({'left':(i*itemWidth)-((itemsToSlide*itemWidth)*currentGalleryPage)});});};$.prettyPhoto.startSlideshow=function(){setTimeout(function(){resp()},450);if(typeof pp_slideshow=='undefined'){$pp_pic_holder.find('.pp_play').unbind('click').removeClass('pp_play totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_PType;?>').addClass('pp_pause totalsoft totalsoft-<?php echo str_replace("play","pause", $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_PType); ?>').click(function(){$.prettyPhoto.stopSlideshow();return false;});pp_slideshow=setInterval($.prettyPhoto.startSlideshow,settings.slideshow);}else{$.prettyPhoto.changePage('next');};}
					$.prettyPhoto.stopSlideshow=function(){$pp_pic_holder.find('.pp_pause').unbind('click').removeClass('pp_pause totalsoft totalsoft-<?php echo str_replace("play","pause", $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_PType); ?>').addClass('pp_play totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_PType;?>').click(function(){$.prettyPhoto.startSlideshow();return false;});clearInterval(pp_slideshow);pp_slideshow=undefined;}
					$.prettyPhoto.close=function(){clearInterval(pp_slideshow);$pp_pic_holder.stop().find('object,embed').css('visibility','hidden');$('div.pp_pic_holder,div.ppt,.pp_fade').fadeOut(settings.animation_speed,function(){$(this).remove();});$pp_overlay.fadeOut(settings.animation_speed,function(){if($.browser.msie&&$.browser.version==6)$('select').css('visibility','visible');if(settings.hideflash)$('object,embed').css('visibility','visible');$(this).remove();$(window).unbind('scroll');settings.callback();doresize=true;pp_open=false;delete settings;});};_showContent=function(){$('.pp_loaderIcon').hide();$ppt.fadeTo(settings.animation_speed,1);projectedTop=scroll_pos['scrollTop']+((windowHeight/2)-(correctSizes['containerHeight']/2));if(projectedTop<0)projectedTop=0;$pp_pic_holder.find('.pp_content').animate({'height':correctSizes['contentHeight']},settings.animation_speed);$pp_pic_holder.animate({'top':projectedTop,'left':(windowWidth/2)-(correctSizes['containerWidth']/2),'width':correctSizes['containerWidth']},settings.animation_speed,function(){$pp_pic_holder.find('.pp_hoverContainer,#fullResImage').height(correctSizes['height']).width(correctSizes['width']);$pp_pic_holder.find('.pp_fade').fadeIn(settings.animation_speed);if(isSet&&_getFileType(pp_images[set_position])=="image"){$pp_pic_holder.find('.pp_hoverContainer').show()}else{$pp_pic_holder.find('.pp_hoverContainer').hide();}
					if(correctSizes['resized'])$('a.pp_expand,a.pp_contract').fadeIn(settings.animation_speed);if(settings.autoplay_slideshow&&!pp_slideshow&&!pp_open)$.prettyPhoto.startSlideshow();settings.changepicturecallback();pp_open=true;});_insert_gallery();};function _hideContent(callback){$pp_pic_holder.find('#pp_full_res object,#pp_full_res embed').css('visibility','hidden');$pp_pic_holder.find('.pp_fade').fadeOut(settings.animation_speed,function(){$('.pp_loaderIcon').show();callback();});};function _checkPosition(setCount){if(set_position==setCount-1){$pp_pic_holder.find('a.pp_next').css('visibility','hidden');$pp_pic_holder.find('a.pp_next').addClass('disabled').unbind('click');}else{$pp_pic_holder.find('a.pp_next').css('visibility','visible');$pp_pic_holder.find('a.pp_next.disabled').removeClass('disabled').bind('click',function(){$.prettyPhoto.changePage('next');return false;});};if(set_position==0){$pp_pic_holder.find('a.pp_previous').css('visibility','hidden').addClass('disabled').unbind('click');}else{$pp_pic_holder.find('a.pp_previous.disabled').css('visibility','visible').removeClass('disabled').bind('click',function(){$.prettyPhoto.changePage('previous');return false;});};(setCount>1)?$('.pp_nav').show():$('.pp_nav').hide();};function _fitToViewport(width,height){resized=false;_getDimensions(width,height);imageWidth=width,imageHeight=height;if(((pp_containerWidth+60>windowWidth)||(pp_containerHeight+60>windowHeight))&&doresize&&settings.allow_resize&&!percentBased){resized=true,fitting=false;while(!fitting){if((pp_containerWidth+60>windowWidth)){imageWidth=(windowWidth-200);imageHeight=(height/width)*imageWidth;}else if((pp_containerHeight+60>windowHeight)){imageHeight=(windowHeight-200);imageWidth=(width/height)*imageHeight;}else{fitting=true;};pp_containerHeight=imageHeight,pp_containerWidth=imageWidth;};_getDimensions(imageWidth,imageHeight);};return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(pp_containerHeight),containerWidth:Math.floor(pp_containerWidth)+40,contentHeight:Math.floor(pp_contentHeight),contentWidth:Math.floor(pp_contentWidth),resized:resized};};function _getDimensions(width,height){width=parseFloat(width);height=parseFloat(height);$pp_details=$pp_pic_holder.find('.pp_details');$pp_details.width(width);detailsHeight=parseFloat($pp_details.css('marginTop'))+parseFloat($pp_details.css('marginBottom'));$pp_details=$pp_details.clone().appendTo($('body')).css({'position':'absolute','top':-10000});detailsHeight+=$pp_details.height();detailsHeight=(detailsHeight<=34)?36:detailsHeight;if($.browser.msie&&$.browser.version==7)detailsHeight+=8;$pp_details.remove();pp_contentHeight=height+detailsHeight;pp_contentWidth=width;pp_containerHeight=pp_contentHeight+$ppt.height()+$pp_pic_holder.find('.pp_top').height()+$pp_pic_holder.find('.pp_bottom').height();pp_containerWidth=width;}
					function _getFileType(itemSrc){if(itemSrc.match(/youtube\.com\/watch/i)){return'youtube';}else if(itemSrc.match(/vimeo\.com/i)){return'vimeo';}else if(itemSrc.indexOf('.mov')!=-1){return'quicktime';}else if(itemSrc.indexOf('.swf')!=-1){return'flash';}else if(itemSrc.indexOf('iframe')!=-1){return'iframe';}else if(itemSrc.indexOf('custom')!=-1){return'custom';}else if(itemSrc.substr(0,1)=='#'){return'inline';}else{return'image';};};function _center_overlay(){if(doresize&&typeof $pp_pic_holder!='undefined'){scroll_pos=_get_scroll();titleHeight=$ppt.height(),contentHeight=$pp_pic_holder.height(),contentwidth=$pp_pic_holder.width();projectedTop=(windowHeight/2)+scroll_pos['scrollTop']-(contentHeight/2);$pp_pic_holder.css({'top':projectedTop,'left':(windowWidth/2)+scroll_pos['scrollLeft']-(contentwidth/2)});};};function _get_scroll(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};}else if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};}else if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};};};function _resize_overlay(){windowHeight=$(window).height(),windowWidth=$(window).width();if(typeof $pp_overlay!="undefined")$pp_overlay.height($(document).height());};function _insert_gallery(){if(isSet&&settings.overlay_gallery&&_getFileType(pp_images[set_position])=="image"){itemWidth=52+5;navWidth=(settings.theme=="facebook")?58:38;itemsPerPage=Math.floor((correctSizes['containerWidth']-100-navWidth)/itemWidth);itemsPerPage=(itemsPerPage<pp_images.length)?itemsPerPage:pp_images.length;totalPage=Math.ceil(pp_images.length/itemsPerPage)-1;if(totalPage==0){navWidth=0;$pp_pic_holder.find('.pp_gallery .pp_arrow_next,.pp_gallery .pp_arrow_previous').hide();}else{$pp_pic_holder.find('.pp_gallery .pp_arrow_next,.pp_gallery .pp_arrow_previous').show();};galleryWidth=itemsPerPage*itemWidth+navWidth;$pp_pic_holder.find('.pp_gallery').width(galleryWidth).css('margin-left',-(galleryWidth/2));$pp_pic_holder.find('.pp_gallery ul').width(itemsPerPage*itemWidth).find('li.selected').removeClass('selected');goToPage=(Math.floor(set_position/itemsPerPage)<=totalPage)?Math.floor(set_position/itemsPerPage):totalPage;if(itemsPerPage){$pp_pic_holder.find('.pp_gallery').hide().show().removeClass('disabled');}else{$pp_pic_holder.find('.pp_gallery').hide().addClass('disabled');}
					$.prettyPhoto.changeGalleryPage(goToPage);$pp_pic_holder.find('.pp_gallery ul li:eq('+set_position+')').addClass('selected');}else{$pp_pic_holder.find('.pp_content').unbind('mouseenter mouseleave');$pp_pic_holder.find('.pp_gallery').hide();}}
					function _buildOverlay(caller){theRel=$(caller).attr('rel');galleryRegExp=/\[(?:.*)\]/;isSet=(galleryRegExp.exec(theRel))?true:false;pp_images=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return $(n).attr('href');}):$.makeArray($(caller).attr('href'));pp_titles=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return($(n).find('img').attr('alt'))?$(n).find('img').attr('alt'):"";}):$.makeArray($(caller).find('img').attr('alt'));pp_descriptions=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr('rel').indexOf(theRel)!=-1)return($(n).attr('title'))?$(n).attr('title'):"";}):$.makeArray($(caller).attr('title'));$('body').append(settings.markup);$pp_pic_holder=$('.pp_pic_holder'),$ppt=$('.ppt'),$pp_overlay=$('div.pp_overlay');if(isSet&&settings.overlay_gallery){currentGalleryPage=0;toInject="";for(var i=0;i<pp_images.length;i++){var regex=new RegExp("(.*?)\.(jpg|jpeg|png|gif)$");var results=regex.exec(pp_images[i]);if(!results){classname='default';}else{classname='';}
					toInject+="<li class='"+classname+"'><a href='#'><img src='"+pp_images[i]+"' width='50' alt='' /></a></li>";};toInject=settings.gallery_markup.replace(/{gallery}/g,toInject);$pp_pic_holder.find('#pp_full_res').after(toInject);$pp_pic_holder.find('.pp_gallery .pp_arrow_next').click(function(){$.prettyPhoto.changeGalleryPage('next');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_gallery .pp_arrow_previous').click(function(){$.prettyPhoto.changeGalleryPage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_content').hover(function(){$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeIn();},function(){$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeOut();});itemWidth=52+5;$pp_pic_holder.find('.pp_gallery ul li').each(function(i){$(this).css({'position':'absolute','left':i*itemWidth});$(this).find('a').unbind('click').click(function(){$.prettyPhoto.changePage(i);$.prettyPhoto.stopSlideshow();return false;});});};if(settings.slideshow){$pp_pic_holder.find('.pp_nav').prepend('<i class="totalsoft-port-cpop-pl-pa pp_play totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_PType;?>"></i>')
					$pp_pic_holder.find('.pp_nav .pp_play').click(function(){$.prettyPhoto.startSlideshow();return false;});};setTimeout(function(){resp();},650);$pp_pic_holder.attr('class','pp_pic_holder '+settings.theme);$pp_overlay.css({'opacity':0,'height':$(document).height(),'width':$(document).width()}).bind('click',function(){if(!settings.modal)$.prettyPhoto.close();});$('i.pp_close').bind('click',function(){$.prettyPhoto.close();return false;});$('a.pp_expand').bind('click',function(e){if($(this).hasClass('pp_expand')){$(this).removeClass('pp_expand').addClass('pp_contract');doresize=false;}else{$(this).removeClass('pp_contract').addClass('pp_expand');doresize=true;};_hideContent(function(){$.prettyPhoto.open();});return false;});$pp_pic_holder.find('.pp_previous, .pp_nav .pp_arrow_previous').bind('click',function(){setTimeout(function(){resp()},450);$.prettyPhoto.changePage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_next, .pp_nav .pp_arrow_next').bind('click',function(){setTimeout(function(){resp()},450);$.prettyPhoto.changePage('next');$.prettyPhoto.stopSlideshow();return false;});_center_overlay();};return this.unbind('click').click($.prettyPhoto.initialize)};function grab_param(name,url){name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS="[\\?&]"+name+"=([^&#]*)";var regex=new RegExp(regexS);var results=regex.exec(url);return(results==null)?"":results[1];}})(jQuery);
				    </script>
				    <style type="text/css">
						
				    	div.pp_pic_holder
						{
							background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_BgC;?> !important;
							border: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_BW;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_BS;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_BC;?> !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_BR;?>px !important;
						}
						.pp_description
						{
							display: <?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_TShow=='false'){echo 'none';}?>;
							text-align: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_TTA;?> !important;
							font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_TFS;?>px;
							font-family: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_TFF;?> !important;
							color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_TC;?> !important;
						}
						.totalsoft-port-cpop-pl-pa
						{
							font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_PIS;?>px !important;
							color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_PIC;?> !important;							
						}
				    	.totalsoft-port-cpop-close
				    	{
				    		font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_CIS;?>px;
							color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_CIC;?> !important;							
						}
						.totalsoft-port-cpop-close span
						{
							font-family: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_CTF;?> !important;
							margin-left:3px !important;
						}
						.totalsoft-port-cpop-nepr
						{
							font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_ArrS;?>px;
							color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_ArrC;?> !important; 
						}
						.totalsoft-port-cpop-text
						{
							font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_NFS;?>px;
							color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_NC;?> !important; 
						}
				    	.totalsoft-portfolio-categ
				    	{
				    		background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_MBgC;?> !important;
				    		<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_SM!='true'){ ?>
				    			display: none;
				    		<?php }?>
				    		font-family: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_FF;?> !important;
				    		font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_FS;?>px;
				    	}
				    	.totalsoft-portfolio-categ li
				    	{
				    		font-family: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_FF;?> !important;
				    		background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_BgC;?> !important;
				    		color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_C;?> !important;
				    	}
				    	.totalsoft-portfolio-categ li a
				    	{
				    		color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_C;?> !important;
				    	}
				    	.totalsoft-portfolio-categ li.active
				    	{
				    		background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_CurBgC;?> !important;
				    		color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_CurC;?> !important;
				    	}
				    	.totalsoft-portfolio-categ li.active a
				    	{
				    		color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_CurC;?> !important;
				    	}
				    	.totalsoft-portfolio-categ li:hover
				    	{
				    		background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_HBgC;?> !important;
				    		color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_HC;?> !important;
				    	}
				    	.totalsoft-portfolio-categ li:hover a
				    	{
				    		color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_HC;?> !important;
				    	}
						.totalsoft-portfolio-area li
						{
							display:inline-block;
							overflow: hidden;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBW;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBS;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBC;?> !important; 
							width: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_W;?>px;
							height:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_W*3/4;?>px;
							position:relative;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px !important;
							margin:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_PB;?>px !important;
							box-shadow:0 0 <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_BoxSh;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_BoxShC;?> !important;
							-webkit-box-shadow:0 0 <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_BoxSh;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_BoxShC;?> !important;
							-moz-box-shadow:0 0 <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_BoxSh;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_BoxShC;?> !important;
							perspective:800px !important;
							padding: 0 !important;
						}
						.totalsoft-image-block{ 
							display:block;
							position: absolute;
							width:100%;
							height:100%;
						}
						.totalsoft-image-block img{
							margin: 0 !important;
							background:#FFFFFF;
							width:100%; 
							height: 100%;
							max-width:none !important;
						}
						.TotPortImgHov1{
							position:absolute;
							top:0px;
							left:0px;
							width:100%;
							height:100%;
							max-width:none !important;
							-ms-transform:rotate(0deg);
							-webkit-transform:rotate(0deg);
							transform:rotate(0deg);
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgHov1{
							width:200%;
							height:200%;
							left:-50%;
							top:-50%;
							-ms-transform:rotate(25deg);
							-webkit-transform:rotate(25deg);
							transform:rotate(25deg);
						}
						.TotPortImgHov2{
							position:absolute;
							top:0px;
							left:0px;
							width:100%;
							height:100%;
							max-width:none !important;
							-ms-transform:rotate(0deg);
							-webkit-transform:rotate(0deg);
							transform:rotate(0deg);
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgHov2{
							width:200%;
							height:200%;
							left:-50%;
							top:-50%;
							-ms-transform:rotate(-25deg);
							-webkit-transform:rotate(-25deg);
							transform:rotate(-25deg);
						}
						.TotPortImgHov3{
							position:absolute;
							top:0px;
							left:0px;
							width:100%;
							height:100%;
							max-width:none !important;
							-ms-transform:rotate(0deg);
							-webkit-transform:rotate(0deg);
							transform:rotate(0deg);
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgHov3{
							width:150%;
							height:150%;
						}
						.TotPortImgHov4{
							position:absolute;
							top:0px;
							left:0px;
							width:100%;
							height:100%;
							max-width:none !important;
							-ms-transform:rotate(0deg);
							-webkit-transform:rotate(0deg);
							transform:rotate(0deg);
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgHov4{
							width:150%;
							height:150%;
							left:-25%;
							top:-25%;
						}
						.TotPortImgHov5{
							position:absolute;
							top:0px;
							right:0px;
							width:100%;
							height:100%;
							max-width:none !important;
							-ms-transform:rotate(0deg);
							-webkit-transform:rotate(0deg);
							transform:rotate(0deg);
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgHov5{
							width:150%;
							height:150%;
						}
						.TotPortImgHov6{
							position:absolute;
							bottom:0px;
							right:0px;
							width:100%;
							height:100%;
							max-width:none !important;
							-ms-transform:rotate(0deg);
							-webkit-transform:rotate(0deg);
							transform:rotate(0deg);
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgHov6{
							width:150%;
							height:150%;
						}
						.TotPortImgHov7{
							position:absolute;
							bottom:0px;
							left:0px;
							width:100%;
							height:100%;
							max-width:none !important;
							-ms-transform:rotate(0deg);
							-webkit-transform:rotate(0deg);
							transform:rotate(0deg);
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgHov7{
							width:150%;
							height:150%;
						}
						
						.TotPortImgOv1{
							position:absolute;
							top:0px;
							left:0px;
							width:100%;
							height:100%;
							max-width:none !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?>;
							opacity:0;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv1{
							opacity:0.8;
						}
						.TotPortImgOv2{
							position:absolute !important;
							top:0% !important;
							left:100% !important;
							width:100% !important;
							height:100% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							transform:rotate(-90deg) !important;
							-ms-transform:rotate(-90deg) !important;
							-webkit-transform:rotate(-90deg) !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv2{
							left:0% !important;
							top:0% !important;
							transform:rotate(0deg) !important;
							-ms-transform:rotate(0deg) !important;
							-webkit-transform:rotate(0deg) !important;
						}
						.TotPortImgOv3{
							position:absolute !important;
							top:0% !important;
							left:100% !important;
							width:100% !important;
							height:100% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							transform:rotateY(-180deg) !important;
							-ms-transform:rotateY(-180deg) !important;
							-webkit-transform:rotateY(-180deg) !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv3{
							left:0% !important;
							top:0% !important;
							transform:rotateY(0deg) !important;
							-ms-transform:rotateY(0deg) !important;
							-webkit-transform:rotateY(0deg) !important;
						}					
						.TotPortImgOv4{
							position:absolute !important;
							top:50% !important;
							left:50% !important;
							width:0% !important;
							height:0% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
							-ms-transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv4{
							left:0% !important;
							top:0% !important;
							width:100% !important;
							height:100% !important;
							transform:rotate(0deg) !important;
							-ms-transform:rotate(0deg) !important;
							-webkit-transform:rotate(0deg) !important;
						}
						.TotPortImgOv5{
							position:absolute !important;
							top:50% !important;
							left:50% !important;
							width:0% !important;
							height:0% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
							-ms-transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv5{
							width:100% !important;
							height:100% !important;
							transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
							-ms-transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
						}
						.TotPortImgOv6{
							position:absolute !important;
							top:50% !important;
							left:50% !important;
							width:0% !important;
							height:0% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
							-ms-transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv6{
							width:100% !important;
							height:100% !important;
							transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
							-ms-transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
						}
						.TotPortImgOv7{
							position:absolute !important;
							top:50% !important;
							left:50% !important;
							width:0% !important;
							height:0% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv7{
							left:0% !important;
							top:0% !important;
							width:100% !important;
							height:100% !important;
						}
						.TotPortImgOv8{
							position:absolute !important;
							top:50% !important;
							left:0% !important;
							width:100% !important;
							height:0% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							visibility:hidden !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv8{
							top:0% !important;
							height:100% !important;
							visibility:visible !important;
						}
						.TotPortImgOv9{
							position:absolute !important;
							top:0% !important;
							left:50% !important;
							width:0% !important;
							height:100% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv9{
							left:0% !important;
							width:100% !important;
						}
						.TotPortImgOv10{
							position:absolute !important;
							top:-100% !important;
							left:0% !important;
							width:100% !important;
							height:100% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							opacity:0 !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv10{
							top:0% !important;
							opacity:0.8 !important;
						}
						.TotPortImgOv11{
							position:absolute !important;
							top:0% !important;
							left:0% !important;
							width:100% !important;
							height:100% !important;
							border:20px solid red !important;
							opacity:0 !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.totalsoft-portfolio-area li:hover .TotPortImgOv11{
							opacity:0.8 !important;
						}
						.TotPortImgOv12{
							position:absolute !important;
							top:0% !important;
							left:0% !important;
							width:100% !important;
							height:100% !important;
							border:20px solid red !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						.TotPortImgOv13{
							position:absolute !important;
							top:0% !important;
							left:0% !important;
							width:100% !important;
							height:100% !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color;?> !important;
							transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-webkit-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-ms-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-o-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							-moz-transition:all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time/10;?>s linear !important;
							border-radius: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_VBR;?>px;
						}
						
						.TotPortHovTit1{
							position:absolute !important;
							top:-100% !important;
							width:100% !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							padding:1px 0px !important;
							text-align:center !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Bg_Color;?> !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovTit1{
							top:5% !important;
						}
						.TotPortHovTit2{
							position:absolute !important;
							top:5% !important;
							left:100% !important;
							transform:rotate(-90deg) !important;
							-ms-transform:rotate(-90deg) !important;
							-webkit-transform:rotate(-90deg) !important;
							width:100% !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							padding:1px 0px !important;
							text-align:center !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Bg_Color;?> !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovTit2{
							left:0% !important;
							transform:rotate(0deg) !important;
							-ms-transform:rotate(0deg) !important;
							-webkit-transform:rotate(0deg) !important;
						}
						.TotPortHovTit3{
							position:absolute !important;
							top:10% !important;
							left:15% !important;
							width:70% !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							font-size:0px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							padding:0px 0px !important;
							text-align:center !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Bg_Color;?> !important;
							opacity:0 !important;
							transition: all 0s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovTit3{
							left:0% !important;
							top:5% !important;
							width:100% !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							padding:1px 0px !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							opacity:1 !important;
						}					
						.TotPortHovTit4{
							position:absolute !important;
							top:25% !important;
							left:0% !important;
							width:100% !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							padding:1px 0px !important;
							text-align:center !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Bg_Color;?> !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovTit4{
							top:5% !important;
						}
						.TotPortHovTit5{
							position:absolute !important;
							top:5% !important;
							width:100% !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							padding:1px 0px !important;
							text-align:center !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Bg_Color;?> !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.TotPortHovTit6{
							position:absolute !important;
							top:50% !important;
							left:0% !important;
							width:100% !important;
							display:inline !important;
							padding:0px !important;
							margin:0px !important;
							transform:translateY(-50%) !important;
							-ms-transform:translateY(-50%) !important;
							-webkit-transform:translateY(-50%) !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							text-align:center !important;
							opacity:1 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovTit6{
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size-5;?>px !important;
							opacity:0 !important;
						}
						.TotPortHovTit7{
							position:absolute !important;
							top:100% !important;
							left:0% !important;
							width:100% !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							background:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Bg_Color;?> !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							text-align:center !important;
							transform:translateY(0%);
							-ms-transform:translateY(0%);
							-webkit-transform:translateY(0%);
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovTit7{
							top:0% !important;
						}
						.TotPortHovTit8{
							position:absolute !important;
							top:50% !important;
							right:0% !important;
							width:85% !important;
							display:inline !important;
							padding:0px !important;
							margin:0px !important;
							transform:translateY(-50%) !important;
							-ms-transform:translateY(-50%) !important;
							-webkit-transform:translateY(-50%) !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							text-align:left !important;
							opacity:1 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.TotPortHovTit9{
							position:absolute !important;
							top:40% !important;
							left:0% !important;
							width:100% !important;
							display:inline !important;
							padding:0px !important;
							margin:0px !important;
							transform:translateY(-50%) !important;
							-ms-transform:translateY(-50%) !important;
							-webkit-transform:translateY(-50%) !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							text-align:center !important;
							opacity:1 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.TotPortHovTit10{
							position:absolute !important;
							top:20% !important;
							left:0% !important;
							width:0% !important;
							display:inline !important;
							padding:0px !important;
							margin:0px !important;
							left:50% !important;
							font-size:0px !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							text-align:center !important;
							opacity:1 !important;
							transition: all 0s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovTit10{
							width:100% !important;
							top:30% !important;
							left:0% !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
						}
						.TotPortHovTit11{
							position:absolute !important;
							top:20% !important;
							left:10% !important;
							width:40% !important;
							display:inline !important;
							transform:translateX(0%) !important;
							-ms-transform:translateX(0%) !important;
							-webkit-transform:translateX(0%) !important;
							padding:0px !important;
							margin:0px !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_FF;?> !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>px !important;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Color;?> !important;
							text-align:center !important;
							opacity:0 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Time/10;?>s linear !important;
							font-weight: 400 !important;
							margin: 0 !important;
							line-height: 1 !important;
							letter-spacing: 0 !important;
							text-transform: none !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovTit11{
							top:30% !important;
							left:50% !important;
							transform:translateX(-50%) !important;
							-ms-transform:translateX(-50%) !important;
							-webkit-transform:translateX(-50%) !important;
							opacity:1 !important;
						}
						
						.TotPortHovLine1{
							position:absolute !important;
							width:10% !important;
							height:10% !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Color;?> !important;
							top:50% !important;
							left:50% !important;
							opacity:0 !important;
							transform:translateY(-50%) translateX(-50%) !important;
							-ms-transform:translateY(-50%) translateX(-50%) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLine1{
							width:90% !important;
							height:90% !important;
							opacity:1 !important;
						}					
						.TotPortHovLine2{
							position:absolute !important;
							width:110% !important;
							height:110% !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Color;?> !important;
							top:50% !important;
							left:50% !important;
							opacity:0 !important;
							transform:translateY(-50%) translateX(-50%) !important;
							-ms-transform:translateY(-50%) translateX(-50%) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLine2{
							width:90% !important;
							height:90% !important;
							opacity:1 !important;
						}
						.TotPortHovLine3{
							position:absolute !important;
							width:90% !important;
							height:90% !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Color;?> !important;
							border-right:0px solid #fff !important;
							top:50% !important;
							left:40% !important;
							opacity:0 !important;
							transform:translateY(-50%) translateX(-50%) !important;
							-ms-transform:translateY(-50%) translateX(-50%) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLine3{
							left:50% !important;
							opacity:1 !important;
						}
						.TotPortHovLine4{
							position:absolute !important;
							width:0% !important;
							height:0% !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Color;?> !important;
							top:50% !important;
							left:10% !important;
							opacity:0 !important;
							transform:translateY(-50%) translateX(0%) !important;
							-ms-transform:translateY(-50%) translateX(0%) !important;
							-webkit-transform:translateY(-50%) translateX(0%) !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLine4{
							width:80% !important;
							opacity:1 !important;
						}
						.TotPortHovLine5{
							position:absolute !important;
							width:0% !important;
							height:90% !important;
							border-top:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Color;?> !important;
							border-bottom:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Color;?> !important;
							top:50% !important;
							left:50% !important;
							opacity:0 !important;
							transform:translateY(-50%) translateX(-50%) !important;
							-ms-transform:translateY(-50%) translateX(-50%) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLine5{
							width:80% !important;
							opacity:1 !important;
						}
						.TotPortHovLine6{
							position:absolute !important;
							width:120px !important;
							height:120px !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Color;?> !important;
							border-radius:50% !important;
							top:100% !important;
							left:100% !important;
							opacity:0 !important;
							transform:translateY(-50%) translateX(-50%) !important;
							-ms-transform:translateY(-50%) translateX(-50%) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLine6{
							top:50% !important;
							left:50% !important;
							opacity:1 !important;
						}
						.TotPortHovLine7{
							position:absolute !important;
							width:0px !important;
							height:0px !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Color;?> !important;
							top:50% !important;
							left:50% !important;
							opacity:0 !important;
							transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
							-ms-transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLine7{
							width:100px !important;
							height:100px !important;
							transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
							-ms-transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
							-webkit-transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
							opacity:1 !important;
						}
						
						.TotPortHovLink1{
							position:absolute !important;
							top:40% !important;
							left:50% !important;
							transform:translateX(-50%) !important;
							-ms-transform:translateX(-50%) !important;
							-webkit-transform:translateX(-50%) !important;
							font-size:0px;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:5px 0px !important;
							text-align:center !important;
							opacity:1 !important;
							transition: all 0s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink1{
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.TotPortHovLink2{
							position:absolute !important;
							top:40% !important;
							left:50% !important;
							transform:translateX(-50%) !important;
							-ms-transform:translateX(-50%) !important;
							-webkit-transform:translateX(-50%) !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:5px 0px !important;
							text-align:center !important;
							opacity:0 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink2{
							opacity:1 !important;
						}
						.TotPortHovLink3{
							position:absolute !important;
							top:70% !important;
							left:5% !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:5px 0px !important;
							text-align:center !important;
							opacity:0 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink3{
							left:15% !important;
							opacity:1 !important;
						}
						.TotPortHovLink4{
							position:absolute !important;
							top:50% !important;
							left:90% !important;
							transform:translateX(-50%) !important;
							-ms-transform:translateX(-50%) !important;
							-webkit-transform:translateX(-50%) !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:5px 0px !important;
							text-align:center !important;
							opacity:0 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink4{
							left:50% !important;
							opacity:1 !important;
						}
						.TotPortHovLink5{
							position:absolute !important;
							top:80% !important;
							left:50% !important;
							transform:translateX(-50%) !important;
							-ms-transform:translateX(-50%) !important;
							-webkit-transform:translateX(-50%) !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							font-size:0px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:5px 0px !important;
							text-align:center !important;
							opacity:0 !important;
							transition: all 0s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink5{
							top:50% !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							opacity:1 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.TotPortHovLink6{
							position:absolute !important;
							top:50% !important;
							left:40% !important;
							transform:translateX(-50%) !important;
							-ms-transform:translateX(-50%) !important;
							-webkit-transform:translateX(-50%) !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:5px 0px !important;
							text-align:center !important;
							opacity:0 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink6{
							left:50% !important;
							opacity:1 !important;
						}
						.TotPortHovLink7{
							position:relative !important;
							top:60% !important;
							
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:0px 7px !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Color;?> !important;
							text-align:center !important;
							opacity:0 !important;
							perspective:800px !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink7{
							opacity:1 !important;
						}
						.TotPortHovLink8{
							position:absolute !important;
							top:-100% !important;
							left:50% !important;
							transform:translateX(-50%) !important;
							-ms-transform:translateX(-50%) !important;
							-webkit-transform:translateX(-50%) !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:0px 7px !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Color;?> !important;
							text-align:center !important;
							opacity:1 !important;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink8{
							opacity:1 !important;
							top:60% !important;
						}
						.TotPortHovLink9{
							position:relative !important;
							top:60% !important;
							font-family:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_FF;?>;
							font-size:0px;
							color:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Color;?> !important;
							padding:0px 7px !important;
							border:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Width;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Style;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Border_Color;?> !important;
							text-align:center !important;
							opacity:0 !important;
							transition: all 0s linear !important;
						}
						.totalsoft-portfolio-area li:hover .TotPortHovLink9{
							opacity:1 !important;
							font-size:<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>px;
							transition: all <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Time/10;?>s linear !important;
						}
						.TotPortHovLink,.TotPortHovLink:hover{
							text-decoration:none;
						}
						.TotPortHovLink:focus{
							border:none;
							outline: none !important;
						}
				    </style>
		 			<div class="totalsoft-TS_Portfolio_GAA_>
					   	<div class="totalsoft-portfolio-content">	
					   		<ul class="totalsoft-portfolio-categ filter">
						      	<li class="all active"><a href="#"><?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_TSA;?></a></li>
						      	<?php for($i=0;$i<count($TotalSoftPortfolioAlbums);$i++){ ?> 
						        	<li class="portfolio-totalsoft-album-<?php echo $i;?>"><a href="#" title="<?php echo $TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle;?>"><?php echo $TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle;?></a></li>
						      	<?php }?>
					        </ul>
							<ul class="totalsoft-portfolio-area" style='padding:0px;margin:0px;text-align:center;'>	
								<?php for($i=0;$i<$TotalSoftPortfolioManager[0]->TotalSoftPortfolio_AlbumCount;$i++){
				            		$TSoftPort_ContPop_Images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftPortfolio_IA=%s", $TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle));
				            			for($j=0;$j<count($TSoftPort_ContPop_Images);$j++){ ?>
				            				<li class="totalsoft-portfolio-item2" data-id="id-<?php echo $i . $j;?>" data-type="portfolio-totalsoft-album-<?php echo $i;?>">
				            					 <div>
									                <span class="totalsoft-image-block">
														<a class="totalsoft-image-zoom" href="<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IURL;?>" rel="prettyPhoto[gallery]" title="<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_TShow=='true'){ echo html_entity_decode($TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IT);} ?>">
															<img class='TotPortImgOv <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Img_Zoom_Type;?>' src="<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IURL;?>" alt="<?php echo html_entity_decode($TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IT);?>" title="<?php echo html_entity_decode($TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IT);?>" />
															<div class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Type;?>'>
															
															</div>
															<h2 class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Effect_Type;?>' >
																<?php echo html_entity_decode($TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IT);?>
															</h2>
															<div class='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Line_Hov_Type;?>'>
																
															</div>
															<?php if($TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_ILink != ''){ ?>
															<a href='<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_ILink ?>'  class='TotPortHovLink <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Hov_Type;?>' <?php if($TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IONT=='true'){echo 'target="_blank"';}?>>
																<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Text;?>
															</a>
															<?php } ?>
														</a>
									                </span>
												</div>
								            </li>
								<?php }} ?>												
					            <div class="column-clear"></div>
							</ul>
						</div>
					</div>
					<input type='text' style='display:none;' class='NavMenuFS' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Nav_FS;?>'>
					<input type='text' style='display:none;' class='portImgWidth' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_W;?>'>
					<input type='text' style='display:none;' class='portImgHeight' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_W*3/4;?>'>
					<input type='text' style='display:none;' class='portTitFS' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Title_Font_Size;?>'>
					<input type='text' style='display:none;' class='portLinkFS' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Link_Font_Size;?>'>
					<input type='text' style='display:none;' class='portPoppTitleFS' value='<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_CP_Pop_TFS;?>'>
					<script>
						jQuery(document).ready(function(){
							var NavMenuFS=jQuery('.NavMenuFS').val();
							var portImgWidth=jQuery('.portImgWidth').val();
							var portImgHeight=jQuery('.portImgHeight').val();
							var portTitFS=jQuery('.portTitFS').val();
							var portLinkFS=jQuery('.portLinkFS').val();
							var portPoppTitleFS=jQuery('.portPoppTitleFS').val();
							jQuery('.totalsoft-portfolio-item2').click(function(){
								console.log('sadhfiouashfc');
							})
							function resp(){
								
								jQuery('.pp_description').animate('font-size',portPoppTitleFS*jQuery('#fullResImage').prop('naturalWidth')/(jQuery('#fullResImage').prop('naturalWidth')+150));
								jQuery('.totalsoft-portfolio-categ').css('font-size',NavMenuFS*jQuery('.totalsoft-portfolio-categ').width()/(jQuery('.totalsoft-portfolio-categ').width()+100));
							
								if(jQuery('.totalsoft-portfolio-area li').parent().width()<=500){
									jQuery('.totalsoft-portfolio-area li').css('width',portImgWidth*jQuery('.totalsoft-portfolio-area li').parent().width()/500);
									jQuery('.totalsoft-portfolio-area li').css('height',portImgHeight*jQuery('.totalsoft-portfolio-area li').parent().width()/500);
									for(i=1;i<=11;i++){
										if(i==3 || i==10){
											continue;
										}
										jQuery('.TotPortHovTit'+i).css('font-size',portTitFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+100));
									}
									jQuery('.totalsoft-portfolio-area li').hover(function(){
										jQuery('.TotPortHovTit3').css({'font-size':portTitFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+100)});
									},function(){
										jQuery('.TotPortHovTit3').css({'font-size':'0px'});
									})
									jQuery('.totalsoft-portfolio-area li').hover(function(){
										jQuery('.TotPortHovTit10').css({'font-size':portTitFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+100)});
									},function(){
										jQuery('.TotPortHovTit10').css({'font-size':'0px'});
									})
									for(i=1;i<=9;i++){
										if(i==1 || i==5 || i==9){
											continue;
										}
										jQuery('.TotPortHovLink'+i).css('font-size',portLinkFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+100));
									}
									jQuery('.totalsoft-portfolio-area li').hover(function(){
										jQuery('.TotPortHovLink5').css({'font-size':portLinkFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+100)});
									},function(){
										jQuery('.TotPortHovLink5').css({'font-size':'0px'});
									})
									jQuery('.totalsoft-portfolio-area li').hover(function(){
										jQuery('.TotPortHovLink9').css({'font-size':portLinkFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+100)});
									},function(){
										jQuery('.TotPortHovLink9').css({'font-size':'0px'});
									})
								}
								if(jQuery('.totalsoft-portfolio-area li').parent().width()<=300){
										jQuery('.totalsoft-portfolio-area li').css('width',jQuery('.totalsoft-portfolio-area li').parent().width()-10);
										jQuery('.totalsoft-portfolio-area li').css('height',jQuery('.totalsoft-portfolio-area li').width()*3/4+'px');
										for(i=1;i<=11;i++){
											if(i==3 || i==10){
												continue;
											}
											jQuery('.TotPortHovTit'+i).css('font-size',portTitFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+50));
										}
										jQuery('.totalsoft-portfolio-area li').hover(function(){
											jQuery('.TotPortHovTit3').css({'font-size':portTitFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+50)});
										},function(){
											jQuery('.TotPortHovTit3').css({'font-size':'0px'});
										})
										jQuery('.totalsoft-portfolio-area li').hover(function(){
											jQuery('.TotPortHovTit10').css({'font-size':portTitFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+50)});
										},function(){
											jQuery('.TotPortHovTit10').css({'font-size':'0px'});
										})
										for(i=1;i<=9;i++){
											if(i==1 || i==5 || i==9){
												continue;
											}
											jQuery('.TotPortHovLink'+i).css('font-size',portLinkFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+50));
										}
										jQuery('.totalsoft-portfolio-area li').hover(function(){
											jQuery('.TotPortHovLink5').css({'font-size':portLinkFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+50)});
										},function(){
											jQuery('.TotPortHovLink5').css({'font-size':'0px'});
										})
										jQuery('.totalsoft-portfolio-area li').hover(function(){
											jQuery('.TotPortHovLink9').css({'font-size':portLinkFS*jQuery('.totalsoft-portfolio-area li').width()/(jQuery('.totalsoft-portfolio-area li').width()+50)});
										},function(){
											jQuery('.TotPortHovLink9').css({'font-size':'0px'});
										})
									}
							}
							//jQuery(window).load(function(){
								resp();
							//})
							jQuery(window).resize(function(){
								resp();
							})
						})	
					</script>
				<?php } else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Slider Portfolio'){ ?>
				    <link rel="stylesheet" type="text/css" media="all" href="<?php echo plugins_url('../CSS/jgallery.css?v=1.5.0',__FILE__);?>" />
				    <style type="text/css">
				    	.TotalSoft_Slider_Port_<?php echo $Total_Soft_Portfolio;?>
				    	{
				    		position: relative;
				    		width: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_W;?>%;
				    		<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Pos=='left'){ ?>
				    			float: left;
				    		<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Pos=='right'){ ?>
				    			float: right;
				    		<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Pos=='center'){ ?>
				    			margin: 0 auto;
				    		<?php }?>
				    		border: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_BW;?>px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_BS;?> <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_BC;?>;
				    	}
						.jgallery[data-jgallery-id="1"] .zoom-container:not([data-size="fill"]) .jgallery-container,.jgallery .zoom .jgallery-container.pt-page-current:not(.pt-page-prev) {
							background: #f5f5f5 !important;
						}						
						.jgallery .jgallery-btn-small {
						  width: 40px;
						  height: 40px;
						  margin: 0;
						  line-height: 43px;
						  font-size: 18px;
						  text-align: center;
						  color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Full_C;?>;
						}						
						.jgallery-thumbnails{
							display:block !important;
							visibility: visible !important;
						}
						.nav-bottom{
							display:block !important;
						}
						.jgallery[data-jgallery-id="1"] .jgallery-thumbnails-horizontal{
							height:50px !important;
						}
						 <?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_Type=='image'){?>
						.jgallery[data-jgallery-id="1"] .jgallery-thumbnails a{
							height:100% !important;
							width:auto !important;
						}
						
						.jgallery[data-jgallery-id="1"] .jgallery-thumbnails a{
							width: auto !important;
							height: 100% !important;
						}
						<?php } ?>
						<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_Pos=='top'){?>
						.jgallery .zoom-container{
							margin-top:50px !important;
						}
						<?php } ?>
						<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_Pos=='left'){?>
						.jgallery .zoom-container{
							margin-left:40px !important;
							height: calc(100% - 40px) !important;
							max-height: calc(100% - 40px) !important;
						}
						.jgallery[data-jgallery-id="1"] .jgallery-thumbnails-vertical{
							width:40px !important;
						}
						<?php } ?>
						<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_Pos=='right'){?>
						.jgallery .zoom-container{
							margin-right:40px !important;
							height: calc(100% - 40px) !important;
							max-height: calc(100% - 40px) !important;
						}
						.jgallery[data-jgallery-id="1"] .jgallery-thumbnails-vertical{
							width:40px !important;
						}
						
						<?php } ?>
				    </style>
				   
				    <script type="text/javascript" src="<?php echo plugins_url('../JS/touchswipe.min.js',__FILE__);?>"></script>
				    <script type="text/javascript">
						jQuery(function(){
						    jQuery('#TotalSoft_Slider_PortGal_<?php echo $Total_Soft_Portfolio;?>').jGallery();
						});
					</script>
					<div class="TotalSoft_Slider_Port_<?php echo $Total_Soft_Portfolio;?>">
						<div style="width: 100%; height: auto;">
							<div id="TotalSoft_Slider_PortGal_<?php echo $Total_Soft_Portfolio;?>">
							    <?php for($i=0;$i<$TotalSoftPortfolioManager[0]->TotalSoftPortfolio_AlbumCount;$i++){
				            		$TSoftPort_ContPop_Images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftPortfolio_IA=%s", $TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle));
				            		?>
			            			<div class="album" data-jgallery-album-title="<?php echo $TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle;?>">
					            		<?php
				            			for($j=0;$j<count($TSoftPort_ContPop_Images);$j++){ ?>
										        <a href="<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IURL;?>"><img src="<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IURL;?>" alt="<?php echo html_entity_decode($TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IT);?>" /></a>							    
										<?php } ?>
									</div>
								<?php } ?>								
							</div>
						</div>
					</div>
					<script>
						jQuery(document).ready(function(){
							function resp(){
								jQuery('.jgallery-standard').css('height',<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_H;?>*jQuery('.jgallery-standard').width()/(jQuery('.jgallery-standard').width()+350));	
								jQuery('.pt-item').css('height',<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_H;?>*jQuery('.jgallery-standard').width()/(jQuery('.jgallery-standard').width()+350)-80);
							}
							function titResp(){
								if(jQuery('.jgallery-standard').width()<=400){
									jQuery('span.title').css('display','none');
								}else{
									jQuery('span.title').css('display','inline-block');
								}
							}
							jQuery(window).load(function(){
								resp()
							})
							jQuery(window).resize(function(){
								titResp();
							})
							var count=0;
							jQuery('.change-mode').click(function(){
								if(count==1){
									resp();
									jQuery('.pt-item').css('height',<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_H;?>*jQuery('.jgallery-standard').width()/(jQuery('.jgallery-standard').width()+350)-80);
								}else if(count==2){
									count=0;
								}
								console.log(count);
								count++;
							})
						})
					</script>
					 <script type="text/javascript">
				    	( function() {
						    "use strict";
						var defaults = {
						    autostart: true, 
						    autostartAtImage: 1, 
						    autostartAtAlbum: 1,
						    backgroundColor: '#ff0000',
						    browserHistory: true,
						    canChangeMode: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_TogT_Show;?>,
						    canClose: false,
						    canMinimalizeThumbnails: false,
						    canZoom: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Zoom_Show;?>,
						    disabledOnIE8AndOlder: true,
						    draggableZoom: true,
						    draggableZoomHideNavigationOnMobile: true,
						    height: '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_H;?>px',
						    hideThumbnailsOnInit: false,
						    maxMobileWidth: 767,
						    mode: 'standard',
						    preloadAll: false,
						    slideshow: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_PP_Show;?>,
						    slideshowAutostart: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_AP;?>,
						    slideshowCanRandom: false,
						    slideshowInterval: '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_PT;?>s',
						    slideshowRandom: false,
						    swipeEvents: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Seff;?>,
						    textColor: '#ff0000',
						    thumbnails: false,
						    thumbHeight: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_H;?>,
						    thumbHeightOnFullScreen: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_FH;?>,
						    thumbnailsFullScreen: true,
						    thumbnailsHideOnMobile: true,
						    thumbnailsPosition: '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_Pos;?>',
						    thumbType: '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_Type;?>',
						    thumbWidth: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_W;?>,
						    thumbWidthOnFullScreen: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_FW;?>, 
						    title: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_IT_Show;?>,
						    titleExpanded: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_IT_Pos;?>,
						    tooltipClose: 'Close',
						    tooltipFullScreen: 'Full screen',
						    tooltipRandom: 'Random',
						    tooltips: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_TT_Show;?>,
						    tooltipSeeAllPhotos: 'See all photos',
						    tooltipSeeOtherAlbums: 'See other albums',
						    tooltipSlideshow: 'Slideshow',
						    tooltipToggleThumbnails: 'Toggle thumbnails',
						    tooltipZoom: 'Zoom',
						    transition: '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Tr_Eff;?>',
						    transitionBackward: '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_TrB_Eff;?>',
						    transitionCols: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Tr_Cols;?>,
						    transitionDuration: '<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Tr_Dur;?>s',
						    transitionRows: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Tr_Rows;?>,
						    transitionTimingFunction: 'cubic-bezier(0,1,1,1)',
						    transitionWaveDirection: 'forward',
						    width: '100%',
						    zoomSize: 'fit',
						    afterLoadPhoto: function() {},
						    beforeLoadPhoto: function() {},
						    closeGallery: function() {},
						    initGallery: function() {},
						    showGallery: function() {},
						    showPhoto: function() {}
						};

						var defaultsFullScreenMode = {};
						var defaultsSliderMode = {
						    width: '940px',
						    height: '360px',
						    canZoom: false,
						    draggableZoom: false,
						    browserHistory: false,
						    thumbnailsFullScreen: false,
						    thumbType: 'square',
						    thumbWidth: 20, //px
						    thumbHeight: 20, //px
						    canMinimalizeThumbnails: false,
						    transition: 'rotateCubeRightOut_rotateCubeRightIn',
						    transitionBackward: 'rotateCubeRightOut_rotateCubeRightIn',
						    transitionCols: 6,
						    transitionRows: 1,
						    slideshow: true,
						    slideshowAutostart: true,
						    zoomSize: 'fill'
						};
						var requiredFullScreenMode = {};
						var requiredSliderMode = {
						    autostart: true,
						    canClose: false,
						    zoomSize: 'fill',
						    canChangeMode: false
						};
						var jGalleryTransitions = {
						    moveToLeft_moveFromRight: ["pt-page-moveToLeft","pt-page-moveFromRight"],
						    moveToRight_moveFromLeft: ["pt-page-moveToRight","pt-page-moveFromLeft"],
						    moveToTop_moveFromBottom: ["pt-page-moveToTop","pt-page-moveFromBottom"],
						    moveToBottom_moveFromTop: ["pt-page-moveToBottom","pt-page-moveFromTop"],
						    fade_moveFromRight: ["pt-page-fade","pt-page-moveFromRight pt-page-ontop"],
						    fade_moveFromLeft: ["pt-page-fade","pt-page-moveFromLeft pt-page-ontop"],
						    fade_moveFromBottom: ["pt-page-fade","pt-page-moveFromBottom pt-page-ontop"],
						    fade_moveFromTop: ["pt-page-fade","pt-page-moveFromTop pt-page-ontop"],
						    moveToLeftFade_moveFromRightFade: ["pt-page-moveToLeftFade","pt-page-moveFromRightFade"],
						    moveToRightFade_moveFromLeftFade: ["pt-page-moveToRightFade","pt-page-moveFromLeftFade"],
						    moveToTopFade_moveFromBottomFade: ["pt-page-moveToTopFade","pt-page-moveFromBottomFade"],
						    moveToBottomFade_moveFromTopFade: ["pt-page-moveToBottomFade","pt-page-moveFromTopFade"],
						    moveToLeftEasing_moveFromRight: ["pt-page-moveToLeftEasing pt-page-ontop","pt-page-moveFromRight"],
						    moveToRightEasing_moveFromLeft: ["pt-page-moveToRightEasing pt-page-ontop","pt-page-moveFromLeft"],
						    moveToTopEasing_moveFromBottom: ["pt-page-moveToTopEasing pt-page-ontop","pt-page-moveFromBottom"],
						    moveToBottomEasing_moveFromTop: ["pt-page-moveToBottomEasing pt-page-ontop","pt-page-moveFromTop"],
						    scaleDown_moveFromRight: ["pt-page-scaleDown","pt-page-moveFromRight pt-page-ontop"],
						    scaleDown_moveFromLeft: ["pt-page-scaleDown","pt-page-moveFromLeft pt-page-ontop"],
						    scaleDown_moveFromBottom: ["pt-page-scaleDown","pt-page-moveFromBottom pt-page-ontop"],
						    scaleDown_moveFromTop: ["pt-page-scaleDown","pt-page-moveFromTop pt-page-ontop"],
						    scaleDown_scaleUpDown: ["pt-page-scaleDown","pt-page-scaleUpDown pt-page-delay300"],
						    scaleDownUp_scaleUp: ["pt-page-scaleDownUp","pt-page-scaleUp pt-page-delay300"],
						    moveToLeft_scaleUp: ["pt-page-moveToLeft pt-page-ontop","pt-page-scaleUp"],
						    moveToRight_scaleUp: ["pt-page-moveToRight pt-page-ontop","pt-page-scaleUp"],
						    moveToTop_scaleUp: ["pt-page-moveToTop pt-page-ontop","pt-page-scaleUp"],
						    moveToBottom_scaleUp: ["pt-page-moveToBottom pt-page-ontop","pt-page-scaleUp"],
						    scaleDownCenter_scaleUpCenter: ["pt-page-scaleDownCenter","pt-page-scaleUpCenter pt-page-delay400"],
						    rotateRightSideFirst_moveFromRight: ["pt-page-rotateRightSideFirst","pt-page-moveFromRight pt-page-delay200 pt-page-ontop"],
						    rotateLeftSideFirst_moveFromLeft: ["pt-page-rotateLeftSideFirst","pt-page-moveFromLeft pt-page-delay200 pt-page-ontop"],
						    rotateTopSideFirst_moveFromTop: ["pt-page-rotateTopSideFirst","pt-page-moveFromTop pt-page-delay200 pt-page-ontop"],
						    rotateBottomSideFirst_moveFromBottom: ["pt-page-rotateBottomSideFirst","pt-page-moveFromBottom pt-page-delay200 pt-page-ontop"],
						    flipOutRight_flipInLeft: ["pt-page-flipOutRight","pt-page-flipInLeft pt-page-delay500"],
						    flipOutLeft_flipInRight: ["pt-page-flipOutLeft","pt-page-flipInRight pt-page-delay500"],
						    flipOutTop_flipInBottom: ["pt-page-flipOutTop","pt-page-flipInBottom pt-page-delay500"],
						    flipOutBottom_flipInTop: ["pt-page-flipOutBottom","pt-page-flipInTop pt-page-delay500"],
						    rotateFall_scaleUp: ["pt-page-rotateFall pt-page-ontop","pt-page-scaleUp"],
						    rotateOutNewspaper_rotateInNewspaper: ["pt-page-rotateOutNewspaper","pt-page-rotateInNewspaper pt-page-delay500"],
						    rotatePushLeft_moveFromRight: ["pt-page-rotatePushLeft","pt-page-moveFromRight"],
						    rotatePushRight_moveFromLeft: ["pt-page-rotatePushRight","pt-page-moveFromLeft"],
						    rotatePushTop_moveFromBottom: ["pt-page-rotatePushTop","pt-page-moveFromBottom"],
						    rotatePushBottom_moveFromTop: ["pt-page-rotatePushBottom","pt-page-moveFromTop"],
						    rotatePushLeft_rotatePullRight: ["pt-page-rotatePushLeft","pt-page-rotatePullRight pt-page-delay180"],
						    rotatePushRight_rotatePullLeft: ["pt-page-rotatePushRight","pt-page-rotatePullLeft pt-page-delay180"],
						    rotatePushTop_rotatePullBottom: ["pt-page-rotatePushTop","pt-page-rotatePullBottom pt-page-delay180"],
						    rotatePushBottom_page: ["pt-page-rotatePushBottom","pt-page-rotatePullTop pt-page-delay180"],
						    rotateFoldLeft_moveFromRightFade: ["pt-page-rotateFoldLeft","pt-page-moveFromRightFade"],
						    rotateFoldRight_moveFromLeftFade: ["pt-page-rotateFoldRight","pt-page-moveFromLeftFade"],
						    rotateFoldTop_moveFromBottomFade: ["pt-page-rotateFoldTop","pt-page-moveFromBottomFade"],
						    rotateFoldBottom_moveFromTopFade: ["pt-page-rotateFoldBottom","pt-page-moveFromTopFade"],
						    moveToRightFade_rotateUnfoldLeft: ["pt-page-moveToRightFade","pt-page-rotateUnfoldLeft"],
						    moveToLeftFade_rotateUnfoldRight: ["pt-page-moveToLeftFade","pt-page-rotateUnfoldRight"],
						    moveToBottomFade_rotateUnfoldTop: ["pt-page-moveToBottomFade","pt-page-rotateUnfoldTop"],
						    moveToTopFade_rotateUnfoldBottom: ["pt-page-moveToTopFade","pt-page-rotateUnfoldBottom"],
						    rotateRoomLeftOut_rotateRoomLeftIn: ["pt-page-rotateRoomLeftOut pt-page-ontop","pt-page-rotateRoomLeftIn"],
						    rotateRoomRightOut_rotateRoomRightIn: ["pt-page-rotateRoomRightOut pt-page-ontop","pt-page-rotateRoomRightIn"],
						    rotateRoomTopOut_rotateRoomTopIn: ["pt-page-rotateRoomTopOut pt-page-ontop","pt-page-rotateRoomTopIn"],
						    rotateRoomBottomOut_rotateRoomBottomIn: ["pt-page-rotateRoomBottomOut pt-page-ontop","pt-page-rotateRoomBottomIn"],
						    rotateCubeLeftOut_rotateCubeLeftIn: ["pt-page-rotateCubeLeftOut pt-page-ontop","pt-page-rotateCubeLeftIn"],
						    rotateCubeRightOut_rotateCubeRightIn: ["pt-page-rotateCubeRightOut pt-page-ontop","pt-page-rotateCubeRightIn"],
						    rotateCubeTopOut_rotateCubeTopIn: ["pt-page-rotateCubeTopOut pt-page-ontop","pt-page-rotateCubeTopIn"],
						    rotateCubeBottomOut_rotateCubeBottomIn: ["pt-page-rotateCubeBottomOut pt-page-ontop","pt-page-rotateCubeBottomIn"],
						    rotateCarouselLeftOut_rotateCarouselLeftIn: ["pt-page-rotateCarouselLeftOut pt-page-ontop","pt-page-rotateCarouselLeftIn"],
						    rotateCarouselRightOut_rotateCarouselRightIn: ["pt-page-rotateCarouselRightOut pt-page-ontop","pt-page-rotateCarouselRightIn"],
						    rotateCarouselTopOut_rotateCarouselTopIn: ["pt-page-rotateCarouselTopOut pt-page-ontop","pt-page-rotateCarouselTopIn"],
						    rotateCarouselBottomOut_rotateCarouselBottomIn: ["pt-page-rotateCarouselBottomOut pt-page-ontop","pt-page-rotateCarouselBottomIn"],
						    rotateSidesOut_rotateSidesInDelay: ["pt-page-rotateSidesOut","pt-page-rotateSidesIn pt-page-delay200"],
						    rotateSlideOut_rotateSlideIn: ["pt-page-rotateSlideOut","pt-page-rotateSlideIn"]
						};
						var jGalleryArrayTransitions = ( function( jGalleryTransitions ) {
						    var $ = jQuery;
						    var jGalleryArrayTransitions = [];
						    
						    $.each( jGalleryTransitions, function( index, value ) {
						        jGalleryArrayTransitions.push( value );
						    } );
						    
						    return jGalleryArrayTransitions;
						} )( jGalleryTransitions );
						var jGalleryBackwardTransitions = {
						    moveToLeft_moveFromRight: 'moveToRight_moveFromLeft',
						    moveToRight_moveFromLeft: 'moveToLeft_moveFromRight',
						    moveToTop_moveFromBottom: 'moveToBottom_moveFromTop',
						    moveToBottom_moveFromTop: 'moveToTop_moveFromBottom',
						    fade_moveFromRight: 'fade_moveFromLeft',
						    fade_moveFromLeft: 'fade_moveFromRight',
						    fade_moveFromBottom: 'fade_moveFromTop',
						    fade_moveFromTop: 'fade_moveFromBottom',
						    moveToLeftFade_moveFromRightFade: 'moveToRightFade_moveFromLeftFade',
						    moveToRightFade_moveFromLeftFade: 'moveToLeftFade_moveFromRightFade',
						    moveToTopFade_moveFromBottomFade: 'moveToBottomFade_moveFromTopFade',
						    moveToBottomFade_moveFromTopFade: 'moveToTopFade_moveFromBottomFade',
						    moveToLeftEasing_moveFromRight: 'moveToRightEasing_moveFromLeft',
						    moveToRightEasing_moveFromLeft: 'moveToLeftEasing_moveFromRight',
						    moveToTopEasing_moveFromBottom: 'moveToBottomEasing_moveFromTop',
						    moveToBottomEasing_moveFromTop: 'moveToTopEasing_moveFromBottom',
						    scaleDown_moveFromRight: 'scaleDown_moveFromLeft',
						    scaleDown_moveFromLeft: 'scaleDown_moveFromRight',
						    scaleDown_moveFromBottom: 'scaleDown_moveFromTop',
						    scaleDown_moveFromTop: 'scaleDown_moveFromBottom',
						    scaleDown_scaleUpDown: 'scaleDownUp_scaleUp',
						    scaleDownUp_scaleUp: 'scaleDown_scaleUpDown',
						    moveToLeft_scaleUp: 'moveToRight_scaleUp',
						    moveToRight_scaleUp: 'moveToLeft_scaleUp',
						    moveToTop_scaleUp: 'moveToBottom_scaleUp',
						    moveToBottom_scaleUp: 'moveToTop_scaleUp',
						    scaleDownCenter_scaleUpCenter: 'scaleDownCenter_scaleUpCenter',
						    rotateRightSideFirst_moveFromRight: 'rotateLeftSideFirst_moveFromLeft',
						    rotateLeftSideFirst_moveFromLeft: 'rotateRightSideFirst_moveFromRight',
						    rotateTopSideFirst_moveFromTop: 'rotateBottomSideFirst_moveFromBottom',
						    rotateBottomSideFirst_moveFromBottom: 'rotateTopSideFirst_moveFromTop',
						    flipOutRight_flipInLeft: 'flipOutLeft_flipInRight',
						    flipOutLeft_flipInRight: 'flipOutRight_flipInLeft',
						    flipOutTop_flipInBottom: 'flipOutBottom_flipInTop',
						    flipOutBottom_flipInTop: 'flipOutTop_flipInBottom',
						    rotateFall_scaleUp: 'rotateFall_scaleUp',
						    rotateOutNewspaper_rotateInNewspaper: 'rotateOutNewspaper_rotateInNewspaper',
						    rotatePushLeft_moveFromRight: 'rotatePushRight_moveFromLeft',
						    rotatePushRight_moveFromLeft: 'rotatePushLeft_moveFromRight',
						    rotatePushTop_moveFromBottom: 'rotatePushBottom_moveFromTop',
						    rotatePushBottom_moveFromTop: 'rotatePushTop_moveFromBottom',
						    rotatePushLeft_rotatePullRight: 'rotatePushRight_rotatePullLeft',
						    rotatePushRight_rotatePullLeft: 'rotatePushLeft_rotatePullRight',
						    rotatePushTop_rotatePullBottom: 'rotatePushTop_rotatePullBottom',
						    rotatePushBottom_page: 'rotatePushBottom_page',
						    rotateFoldLeft_moveFromRightFade: 'rotateFoldRight_moveFromLeftFade',
						    rotateFoldRight_moveFromLeftFade: 'rotateFoldLeft_moveFromRightFade',
						    rotateFoldTop_moveFromBottomFade: 'rotateFoldBottom_moveFromTopFade',
						    rotateFoldBottom_moveFromTopFade: 'rotateFoldTop_moveFromBottomFade',
						    moveToRightFade_rotateUnfoldLeft: 'moveToLeftFade_rotateUnfoldRight',
						    moveToLeftFade_rotateUnfoldRight: 'moveToRightFade_rotateUnfoldLeft',
						    moveToBottomFade_rotateUnfoldTop: 'moveToTopFade_rotateUnfoldBottom',
						    moveToTopFade_rotateUnfoldBottom: 'moveToBottomFade_rotateUnfoldTop',
						    rotateRoomLeftOut_rotateRoomLeftIn: 'rotateRoomRightOut_rotateRoomRightIn',
						    rotateRoomRightOut_rotateRoomRightIn: 'rotateRoomLeftOut_rotateRoomLeftIn',
						    rotateRoomTopOut_rotateRoomTopIn: 'rotateRoomBottomOut_rotateRoomBottomIn',
						    rotateRoomBottomOut_rotateRoomBottomIn: 'rotateRoomTopOut_rotateRoomTopIn',
						    rotateCubeLeftOut_rotateCubeLeftIn: 'rotateCubeRightOut_rotateCubeRightIn',
						    rotateCubeRightOut_rotateCubeRightIn: 'rotateCubeLeftOut_rotateCubeLeftIn',
						    rotateCubeTopOut_rotateCubeTopIn: 'rotateCubeBottomOut_rotateCubeBottomIn',
						    rotateCubeBottomOut_rotateCubeBottomIn: 'rotateCubeTopOut_rotateCubeTopIn',
						    rotateCarouselLeftOut_rotateCarouselLeftIn: 'rotateCarouselRightOut_rotateCarouselRightIn',
						    rotateCarouselRightOut_rotateCarouselRightIn: 'rotateCarouselLeftOut_rotateCarouselLeftIn',
						    rotateCarouselTopOut_rotateCarouselTopIn: 'rotateCarouselBottomOut_rotateCarouselBottomIn',
						    rotateCarouselBottomOut_rotateCarouselBottomIn: 'rotateCarouselTopOut_rotateCarouselTopIn',
						    rotateSidesOut_rotateSidesInDelay: 'rotateSidesOut_rotateSidesInDelay',
						    rotateSlideOut_rotateSlideIn: 'rotateSlideOut_rotateSlideIn'
						};
						var outerHtml = function(){
						    return (!this.length) ? this : (this[0].outerHTML || (
						      function(el){
						          var div = document.createElement('div');
						          div.appendChild(el.cloneNode(true));
						          var contents = div.innerHTML;
						          div = null;
						          return contents;
						    })(this[0]));
						};
						var overlay = ( function() {
						    var $ = jQuery;
						    
						    return function( options ) {
						        var defaults = {
						            'show': false,
						            'hide': false,
						            'showLoader': false,
						            'hideLoader': false,
						            'showProgress': false,
						            'hideProgress': false,
						            'resetProgress': false,
						            'fadeIn': true,
						            'fadeOut': true,
						            'fadeInLoader': true,
						            'fadeOutLoader': true,
						            'afterInit': function() {}
						        };
						        options = $.extend( {}, defaults, options );
						        this.each( function() {
						            var
						                $this = $( this ),
						                $overlay,
						                $imageLoader,
						                $progress,
						                $spinner,
						                boolInitialized = $this.is( '.overlayContainer:has(.overlay)' ),
						                showOverlay = function() {
						                    options.fadeIn ? $overlay.fadeIn( 500 ) : $overlay.show();
						                },
						                hideOverlay = function() {
						                    options.fadeOut ? $overlay.fadeOut( 500 ) : $overlay.hide();
						                },
						                showLoader = function() {
						                    options.fadeInLoader ? $imageLoader.not( ':visible' ).fadeIn( 500 ) : $imageLoader.not( ':visible' ).show();
						                },
						                hideLoader = function() {
						                    options.fadeOutLoader ? $imageLoader.filter( ':visible' ).fadeOut( 500 ) : $imageLoader.filter( ':visible' ).hide();
						                };

						            //init
						            if ( ! boolInitialized ) {
						                $this.addClass( 'overlayContainer' );
						                $this.append( '<span class="overlay" style="display: none;"><span class="imageLoaderPositionAbsolute" style="display: none;"><span class="totalsoft totalsoft-spin totalsoft-spinner"></span><span class="progress-value" style="display: none;">0</span></span></span>' );
						                options.afterInit();
						            }

						            $overlay = $this.children( '.overlay' );
						            $imageLoader = $this.find( '.imageLoaderPositionAbsolute' );
						            
						            $progress = $imageLoader.find( '.progress-value' );
						            $spinner = $imageLoader.find( '.totalsoft-spinner' );
						            if ( options.resetProgress ) {
						                $progress.html( '0' );
						            }
						            if ( options.showProgress ) {
						                $imageLoader.addClass( 'preloadAll' );
						                $progress.show();
						                $spinner.hide();
						            }
						            else if ( options.hideProgress ) {
						                $imageLoader.removeClass( 'preloadAll' );
						                $progress.hide(); 
						                $spinner.show();               
						            }

						            $overlay.stop( false, true );
						            $imageLoader.stop( false, true );
						            if ( options.show ) {
						                showOverlay();
						            }
						            else if ( options.hide ) {
						                hideOverlay();
						            }
						            if ( options.showLoader ) {
						                showLoader();
						            }
						            else if ( options.hideLoader ) {
						                hideLoader();
						            }
						            //endinit
						        } );
						    };
						} )();
						var jLoader = ( function( overlay ) {
						    var $ = jQuery;
						    
						    $.fn.overlay = overlay;
						    
						    return function( options ) {
						        options = $.extend( {
						             interval: 1000,
						             skip: ':not(*)',
						             start: function() {
						                 $( 'body' ).overlay( {
						                     'fadeIn': false,
						                     'fadeOut': false,
						                     'show': true,
						                     'showLoader': true
						                 } );
						                 $( 'body' ).show();
						             },
						             success: function() {
						                 $( 'body' ).overlay( {
						                     'hide': true
						                 } );
						             },
						             progress: function() {

						             }
						        }, options );

						        this.each( function() {
						            var $this = $( this );
						            var $tmp = $();
						            var $images = $();
						            var timeout;
						            var intCount = 0;

						            function check() {
						                var boolComplete = true;
						                var intComplete = 0;
						                var intPercent;

						                $images.each( function() {
						                     if ( $( this )[0].complete && $( this )[0].naturalWidth > 0 ) {
						                         intComplete++;
						                     }
						                     else {
						                         boolComplete = false;
						                     }
						                } );
						                intPercent = parseInt( intComplete * 100 / intCount );
						                options.progress( {
						                    percent: intPercent
						                } );
						                if ( boolComplete ) {
						                    clearTimeout( timeout );
						                    $tmp.remove();
						                    options.success();
						                }
						                else {
						                    timeout = setTimeout( check, options.interval );
						                }
						            }

						            $this.append( '<div class="jLoaderTmp" style="position: absolute; width: 0; height: 0; line-height: 0; font-size: 0; visibility: hidden; overflow: hidden; z-index: -1;"></div>' );
						            $tmp = $this.children( '.jLoaderTmp:last-child' );

						            $( $this ).add( $this.find( '*' ) ).not( options.skip ).each( function() {
						                var strBackgroundUrl;

						                if ( $( this ).css( 'background-image' ) !== 'none' ) {
						                     strBackgroundUrl = $( this ).css( 'background-image' );
						                     if ( /url/.exec( strBackgroundUrl ) ) {
						                          strBackgroundUrl = strBackgroundUrl.replace( '"', '' ).replace( "'", '' ).replace( ' ', '' ).replace( 'url(', '' ).replace( ')', '' );
						                          $tmp.append( '<img src="' + strBackgroundUrl + '">' );
						                     }
						                }
						            } );
						            $images = $this.find( 'img:not( ' + options.skip + ')' );
						            if ( $this.is( 'img' ) ) {
						                if ( ! $this.is( options.skip ) ) {
						                    $images = $images.add( $this );
						                }
						            }
						            intCount = parseInt( $images.length );
						            options.start();
						            check();
						        } );
						     };
						} )( overlay );
						var historyPushState = ( function() {
						    var $ = jQuery;
						    var $title = $( 'title' );
						    
						    return function( options ) {
						        options = $.extend( {}, {
						            stateObj: {},
						            title: $title.html(),
						            path: ''
						        }, options );
						        window.history.pushState( options.stateObj, options.title, document.location.href.split('#')[0] + '#' + options.path );
						    };
						} )();
						var isInternetExplorer = function() {
						    var rv = false;

						    if ( navigator.appName === 'Microsoft Internet Explorer' ) {
						        var ua = navigator.userAgent;
						        var re  = new RegExp( "MSIE ([0-9]{1,}[\.0-9]{0,})" );
						        if ( re.exec(ua) !== null ) {
						            rv = true;
						        }
						    }
						    return rv;
						};
						var isInternetExplorer8AndOlder = function() {
						    var rv = false;

						    if ( navigator.appName === 'Microsoft Internet Explorer' ) {
						        var ua = navigator.userAgent;
						        var re  = new RegExp( "MSIE ([0-9]{1,}[\.0-9]{0,})" );
						        if ( re.exec(ua) !== null ) {
						            rv = parseFloat( RegExp.$1 );
						            rv = rv < 9;
						        }
						    }
						    return rv;
						};
						var refreshHTMLClasses = function() {
						    var $ = jQuery;
						    var $html = $( 'html' );
						    
						    return function() {
						        $html.find( '.jgallery' ).length === 0 ? $html.removeClass( 'has-jgallery' ) : $html.addClass( 'has-jgallery' );
						        $html.find( '.jgallery.hidden' ).length === 0 ? $html.removeClass( 'has-hidden-jgallery' ) : $html.addClass( 'has-hidden-jgallery' );
						        $html.find( '.jgallery:not(.hidden)' ).length === 0 ? $html.removeClass( 'has-visible-jgallery' ) : $html.addClass( 'has-visible-jgallery' );
						    };
						};
						var AdvancedAnimation = ( function( isInternetExplorer8AndOlder ) {
						    var $ = jQuery;
						    var $head = $( 'head' );
						    var intAdvancedAnimationLastId = 0;

						    var AdvancedAnimation = function( $this ) {
						        if ( $this.is( '[data-advanced-animation-id]') ) {
						            return;
						        }
						        this.cols = 1;
						        this.rows = 1;
						        this.direction = 'forward';
						        this.animation = true;
						        this.$element = $this;
						        this.$element.filter( ':not( [data-advanced-animation-id] )' ).attr( 'data-advanced-animation-id', ++intAdvancedAnimationLastId );
						        this.$element.find( '.pt-item' ).wrap( '<div class="pt-page" />' );
						        this.$element.wrapInner( '<div class="pt-part" />' );
						        this.generateHtml();
						        this._showParts( this.$element.find( '.pt-part' ), 1 );
						    };

						    AdvancedAnimation.prototype = {
						        next: function() {
						            var $next = this.$element.find( '.pt-part' ).eq( this.direction === 'backward' ? -1 : 0 ).find( '.pt-page-current:not(.pt-page-prev)' ).next();

						            if ( $next.length ) {
						                this.show( $next );
						            }
						            else {
						                this.show( this.$element.find( '.pt-part' ).eq( this.direction === 'backward' ? -1 : 0 ).find( '.pt-page' ).eq( 0 ) );
						            }
						        },

						        show: function( $new, options ) {
						            var intPtPageNumber = $new.prevAll().length + 1;

						            if ( $new.is( '.pt-page-current:not(.pt-page-prev)' ) ) {
						                return;
						            }
						            options = $.extend( {}, {
						                animation: true
						            }, options );
						            this.animation = options.animation;
						            this._waveJumpToEnd();
						            if ( this.animation ) {
						                this._runWave( intPtPageNumber );
						            } else {
						                this._showParts( this.$element.find( '.pt-part' ), intPtPageNumber );
						            }
						            this.intPrevPtPageNumber = intPtPageNumber;
						        },

						        setQuantityParts: function( intCols, intRows ) {
						            this.cols = intCols;
						            this.rows = intRows;
						            this.generateHtml();
						        },

						        setAnimationProperties: function( options ) {
						            var intId = this.$element.attr( 'data-advanced-animation-id' );
						            var $stylesheet = $head.find( 'style[data-advanced-animation-id="' + intId + '"]' );

						            this.duration = options.duration;
						            if ( isInternetExplorer8AndOlder() ) {
						                return;
						            }
						            if ( $stylesheet.length === 0 ) {
						                $stylesheet = $head.append( '<style type="text/css" data-advanced-animation-id="' + intId + '" />' ).children( ':last-child' );
						            }
						            $stylesheet.html('\
						                [data-advanced-animation-id="' + intId + '"] .pt-page {\
						                    -webkit-animation-duration: ' + options.duration + ';\
						                    -moz-animation-duration: ' + options.duration + ';\
						                    animation-duration: ' + options.duration + ';\
						                    -webkit-animation-timing-function: ' + options.transitionTimingFunction + ';\
						                    -moz-animation-timing-function: ' + options.transitionTimingFunction + ';\
						                    animation-timing-function: ' + options.transitionTimingFunction + ';\
						                }\
						            ');
						        },

						        setHideEffect: function( hideEffect ) {
						            this.prevHideEffect = this.hideEffect;
						            this.hideEffect = hideEffect;
						            if ( /moveTo|rotateRoom|rotateCarousel|rotateSlideOut/.test( hideEffect ) ) {
						                this.$element.find( '.pt-part' ).addClass( 'hide-overflow' );
						            }
						            else {
						                this.$element.find( '.pt-part' ).removeClass( 'hide-overflow' );                
						            }
						        },

						        setShowEffect: function( showEffect ) {
						            this.prevShowEffect = this.showEffect;
						            this.showEffect = showEffect;
						        },

						        setDirection: function( direction ) {
						            this.direction = direction;
						        },

						        _runWave: function( intPtPageNumber ) {
						            this.$element.find( '.pt-part' ).addClass( 'in-queue' );
						            this._showNextPart( intPtPageNumber );
						        },

						        _waveJumpToEnd: function() {
						            clearTimeout( this.showPartsTimeout );
						            if ( typeof this.intPrevPtPageNumber !== 'undefined' ) {
						                this._showParts( this.$element.find( '.pt-part.in-queue' ).removeClass( 'in-queue' ), this.intPrevPtPageNumber );
						            }
						        },

						        _showNextPart: function( intPtPageNumber ) {
						            var self = this;
						            var $part = this.$element.find( '.pt-part.in-queue' ).eq( this.direction === 'backward' ? -1 : 0 );

						            if ( $part.length === 0 ) {
						                return;
						            }
						            this._showParts( $part.removeClass( 'in-queue' ), intPtPageNumber );
						            if ( $part.length === 0 ) {
						                return;
						            }
						            clearTimeout( this.showPartsTimeout );
						            this.showPartsTimeout = setTimeout( function() {
						                self._showNextPart( intPtPageNumber );
						            }, parseFloat( this.duration ) * 1000 * 0.25 / Math.max( 1, this.$element.find( '.pt-part' ).length - 1 ) );
						        },

						        _showParts: function( $this, intPtPageNumber ) {
						            $this.find( '.pt-page-current.pt-page-prev' ).removeClass( 'pt-page-prev' ).removeClass( 'pt-page-current' );
						            $this.find( '.pt-page-current' ).addClass( 'pt-page-prev' );
						            $this.find( '.pt-page:nth-child(' + intPtPageNumber + ')' ).addClass( 'pt-page-current' );
						            $this.find( '.pt-page' ).removeClass( this.hideEffect ).removeClass( this.showEffect );
						            if ( typeof this.prevHideEffect !== 'undefined' ) {
						                $this.find( '.pt-page' ).removeClass( this.prevHideEffect );
						            }
						            if ( typeof this.prevShowEffect !== 'undefined' ) {
						                $this.find( '.pt-page' ).removeClass( this.prevShowEffect );
						            }
						            if ( this.animation ) {
						                $this.find( '.pt-page-prev' ).addClass( this.hideEffect );
						                $this.find( '.pt-page-current:not(.pt-page-prev)' ).addClass( this.showEffect );
						            }
						        },

						        hideActive: function() {
						            this.$element.find( '.pt-page-current' ).addClass( 'pt-page-prev' ).addClass( this.hideEffect );
						        },

						        generateHtml: function() {
						            var intI;
						            var intJ;
						            var $content;

						            this.$element.html( this.$element.find( '.pt-part' ).eq( 0 ).html() );
						            $content = this.$element.html();
						            this.$element.children( '.pt-part' ).remove();
						            for ( intJ = 0; intJ < this.rows; intJ++ ) {
						                for ( intI = 0; intI < this.cols; intI++ ) {
						                    this.$element
						                        .append( '<div class="pt-part pt-perspective" data-col-no="' + intI + '" data-row-no="' + intJ + '" style="position: absolute;"></div>' )
						                        .children( ':last-child' )
						                        .html( $content )
						                        .find( '.pt-item' );
						                }
						            }
						            this.setPositionParts();
						            this.$element.children( ':not(.pt-part)' ).remove();
						        },

						        setPositionParts: function() {
						            var self = this;
						            var intWidth = this.$element.outerWidth();
						            var intHeight = this.$element.outerHeight();
						            var intPartWidth = intWidth / this.cols;
						            var intPartHeight = intHeight / this.rows;

						            this.$element.find( '.pt-part' ).each( function() {
						                var $this = $( this );
						                var intI = $this.attr( 'data-col-no' );
						                var intJ = $this.attr( 'data-row-no' );

						                $this
						                .css( {
						                    left: self.$element.outerWidth() * ( 100 / self.cols * intI ) / 100 + 'px',
						                    top: self.$element.outerHeight() * ( 100 / self.rows * intJ ) / 100 + 'px',
						                    width: self.$element.outerWidth() * ( 100 / self.cols ) / 100 + 1 + 'px',
						                    height: self.$element.outerHeight() * ( 100 / self.rows ) / 100 + 1 + 'px'                   
						                } )
						                .find( '.pt-item' )
						                .css( {
						                    width: intWidth,
						                    height:jQuery('.jgallery').height()-80,
						                    left: - intPartWidth * intI,
						                    top: - intPartHeight * intJ
						                } );
						            } );          
						        }
						    };
						    
						    return AdvancedAnimation;
						} )( isInternetExplorer8AndOlder );
						var IconChangeAlbum = ( function() {
						    var $ = jQuery;
						    var $html = $( 'html' );
						    
						    var IconChangeAlbum = function( $this, jGallery ) {        
						        this.$element = $this;
						        this.jGallery = jGallery;
						        this.$title = this.$element.find( '.title' );
						    };

						    IconChangeAlbum.prototype = {
						        bindEvents: function( jGallery ) {
						            var self = this;

						            this.getElement().on( {
						                click: function( event ) {
						                    self.menuToggle();
						                    event.stopPropagation();
						                }
						            } );
						            this.getItemsOfMenu().on( {
						                click: function() {
						                    var $this = $( this );

						                    if ( $this.is( '.active' ) ) {
						                        return;
						                    }
						                    jGallery.thumbnails.setActiveAlbum( jGallery.thumbnails.$albums.filter( '[data-jgallery-album-title="' + $this.attr( 'data-jgallery-album-title' ) + '"]' ) );
						                }
						            } );
						            $html.on( 'click', function(){ self.menuHide(); } );  
						        },

						        setTitle: function( strTitle ) {
						            this.$title.html( strTitle );
						        },

						        getTitle: function() {
						            return this.$title.html();
						        },

						        getListOfAlbums: function() {
						            return this.getElement().find( '.menu' );
						        },

						        getElement: function() {
						            return this.$element;
						        },

						        getItemsOfMenu: function() {
						            return this.getListOfAlbums().find( '.item' );
						        },

						        appendToMenu: function( strHtml ) {
						            this.getListOfAlbums().append( strHtml );
						        },

						        menuToggle: function() {
						            this.getElement().toggleClass( 'active' );
						        },

						        menuHide: function() {
						            this.getElement().removeClass( 'active' );
						        },

						        clearMenu: function() {
						            this.getListOfAlbums().html( '' );
						        },

						        refreshMenuHeight: function() {
						            this.getListOfAlbums().css( 'max-height', this.jGallery.zoom.$container.outerHeight() - 8 );
						        }
						    };
						    
						    return IconChangeAlbum;
						} )();
						var Progress = ( function() {
						    var Progress = function( $this, jGallery ) {
						        this.jGallery = jGallery;
						        this.$element = $this;
						    };

						    Progress.prototype = {
						        clear: function() {            
						            this.$element.stop( false, true ).css( {width: 0} );
						            return this;         
						        },

						        start: function( intWidth, success ) {            
						            var interval = parseInt( this.jGallery.options.slideshowInterval ) * 1000;
						            var $element = this.$element;

						            $element.animate( {
						                width: intWidth
						            }, interval - interval * ( $element.width() / $element.parent().width() ), 'linear', success );
						            return this;    
						        },

						        pause: function() {
						            this.$element.stop();
						            return this;
						        }        
						    };
						    
						    return Progress;
						} )();
						var Thumbnails = ( function( jLoader ) {
						    var $ = jQuery;
						    var $head = $( 'head' );
						    var $window = $( window );
						    
						    $.fn.jLoader = jLoader;
						    
						    var Thumbnails = function( jGallery ) {
						        this.$element = jGallery.$element.find( '.jgallery-thumbnails' );
						        this.$a = this.getElement().find( 'a' );
						        this.$img = this.getElement().find( 'img' );
						        this.$container = this.getElement().find( '.jgallery-container' );
						        this.$albums = this.getElement().find( '.album' ).length ? this.getElement().find( '.album' ) : this.getElement().find( '.jgallery-container-inner' ).addClass( 'active' );
						        this.$btnNext = this.getElement().children( '.next' );
						        this.$btnPrev = this.getElement().children( '.prev' );
						        this.intJgalleryId = jGallery.$element.attr( 'data-jgallery-id' );
						        this.isJgalleryInitialized = jGallery.$element.is( '[data-jgallery-id]' );
						        this.zoom = jGallery.zoom;
						        this.$iconToggleThumbsVisibility = this.zoom.$container.find( '.minimalize-thumbnails' );
						        this.jGallery = jGallery;
						        if ( this.jGallery.options.swipeEvents ) {
						            this.initSwipeEvents();
						        }
						    };

						    Thumbnails.prototype = {
						        getElement: function() {
						            return this.$element;
						        },

						        init: function() {
						            this.getElement().removeClass( 'square number images jgallery-thumbnails-left jgallery-thumbnails-right jgallery-thumbnails-top jgallery-thumbnails-bottom jgallery-thumbnails-horizontal jgallery-thumbnails-vertical' );
						            this.getElement().addClass( 'jgallery-thumbnails-' + this.jGallery.options.thumbnailsPosition );
						            if ( this.isVertical() ) {
						                this.getElement().addClass( 'jgallery-thumbnails-vertical' );                    
						            }
						            if ( this.isHorizontal() ) {
						                this.getElement().addClass( 'jgallery-thumbnails-horizontal' );                    
						            }   
						            if ( this.jGallery.options.thumbType === 'image' ) {
						                this._initImages();
						            }
						            if ( this.jGallery.options.thumbType === 'square' ) {
						                this._initSquare();
						            }
						            if ( this.jGallery.options.thumbType === 'number' ) {
						                this._initNumber();
						            }
						        },
						        
						        initSwipeEvents: function() {
						            if ( ! $.fn.swipe ) {
						                return;
						            }
						            
						            var $container = this.$container;
						            var self = this;
						            var canScrollToPrev;
						            var canScrollToNext;
						            var translate = function( distance ) {
						                if ( self.isVertical() || self.isFullScreen() ) {
						                    $container.css( {
						                        "-webkit-transform": 'translateY(' + distance +  'px)',
						                        "transform": 'translateY(' + distance +  'px)'
						                    } );  
						                }
						                else {    
						                    $container.css( {
						                        "-webkit-transform": 'translateX(' + distance +  'px)',
						                        "transform": 'translateX(' + distance +  'px)'
						                    } );              
						                }
						            };
						            
						            $container.swipe( {
						                swipeStatus: function ( event, phase, direction, distance ) {
						                    if ( phase === "start" ) {
						                        canScrollToPrev = self.canScrollToPrev();
						                        canScrollToNext = self.canScrollToNext();
						                    } 
						                    else if ( phase === "move" ) {
						                        if ( canScrollToNext && ( direction === "left" || direction === "down" ) ) {
						                            translate( - distance );
						                        } else if ( canScrollToPrev ) {
						                            translate( distance );
						                        }
						                    } else if ( phase === "end" ) {
						                        if ( canScrollToNext && ( direction === "left" || direction === "down" ) ) {
						                            self._scrollToNext();
						                            translate( 0 );
						                        } else if ( canScrollToPrev ) {
						                            self._scrollToPrev();
						                            translate( 0 );
						                        }
						                    } else {
						                        translate( 0 );
						                    }
						                }
						            } );
						        },

						        show: function() {
						            var self = this;

						            if ( ! this.getElement().is( '.hidden' ) ) {
						                return;
						            }
						            if ( ! ( this.jGallery.isMobile() && this.jGallery.options.thumbnailsHideOnMobile ) ) {
						                this.getElement().removeClass( 'hidden' );
						            }
						            if ( ! this.getElement().is( '.loaded' ) ) {
						                this.getElement().jLoader( {
						                    start: function() {},
						                    success: function(){
						                        self._showNextThumb();
						                        self.$a.parent( '.album:not(.active)' ).children( '.hidden' ).removeClass( 'hidden' );
						                        self.getElement().addClass( 'loaded' );
						                    }
						                } );
						            }
						            else {
						                this._showNextThumb();
						                this.$a.parent( '.album:not(.active)' ).children( '.hidden' ).removeClass( 'hidden' );
						            }
						            this.$iconToggleThumbsVisibility.removeClass( 'inactive' );
						        },

						        showThumbsForActiveAlbum: function() {
						            this.$a.addClass( 'hidden' );
						            this._showNextThumb();
						        },

						        hide: function( options ) {
						            options = $.extend( { hideEachThumb: true }, options );
						            this.getElement().addClass( 'hidden' );
						            if ( options.hideEachThumb ) {
						                this.$a.addClass( 'hidden' );
						            }
						            this.$iconToggleThumbsVisibility.addClass( 'inactive' );
						        },

						        toggle: function() {                    
						            this.getElement().is( '.hidden' ) ? this.show() : this.hide( { hideEachThumb: false } );
						        },

						        setActiveThumb: function( $a ) {
						            var $img = $a.find( 'img' );
						            var $album = this.$albums.filter( '.active' );
						            var $a = $album.find( 'img[src="' + $img.attr( 'src' ) + '"]' ).parent( 'a' ).eq( 0 );

						            this.getElement().find( 'a' ).removeClass( 'active' );
						            $a.addClass( 'active' );
						            if ( $album.find( 'a.active' ).length === 0 ) {
						                $album.find( 'a:first-child' ).eq( 0 ).addClass( 'active' );
						            }
						            this.center( $a );
						        },

						        isHorizontal: function() {
						            return this.jGallery.options.thumbnailsPosition === 'top' || this.jGallery.options.thumbnailsPosition === 'bottom';
						        },

						        isVertical: function() {
						            return this.jGallery.options.thumbnailsPosition === 'left' || this.jGallery.options.thumbnailsPosition === 'right';
						        },

						        isFullScreen: function() {
						            return this.getElement().is( '.full-screen' );
						        },

						        refreshNavigation: function() {
						            this.canScrollToPrev() ? this.$btnPrev.addClass( 'visible' ) : this.$btnPrev.removeClass( 'visible' );
						            this.canScrollToNext() ? this.$btnNext.addClass( 'visible' ) : this.$btnNext.removeClass( 'visible' );
						        },

						        center: function( $a ) {
						            if ( this.isHorizontal() ) {
						                this._horizontalCenter( $a );
						            }
						            if ( this.isVertical() ) {
						                this._verticalCenter( $a );
						            }
						        },

						        reload: function() {
						            this.$a = this.getElement().find( 'a' );
						            this.$img = this.getElement().find( 'img' );
						            this.$albums = this.getElement().find( '.album' ).length ? this.getElement().find( '.album' ) : this.getElement().find( '.jgallery-container-inner' );
						            this.zoom.showPhoto( this.$albums.find( 'a' ).eq( 0 ) );
						        },

						        bindEvents: function() {
						            var self = this;

						            this.$btnNext.on( 'click', function() { self._scrollToNext(); } );
						            this.$btnPrev.on( 'click', function() { self._scrollToPrev(); } );
						            this.zoom.$container.find( '.full-screen' ).on( {
						                click: function() {
						                    self.zoom.slideshowPause();
						                    self.changeViewToFullScreen();
						                }
						            } );
						            this.getElement().find( '.jgallery-close' ).on( {
						                click: function() {
						                    self.changeViewToBar();
						                    self.zoom.refreshSize();
						                }
						            } );
						        },

						        changeViewToBar: function() {
						            this.getElement().removeClass( 'full-screen' );
						            if ( this.isHorizontal() ) {
						                this.getElement().addClass( 'jgallery-thumbnails-horizontal' ).removeClass( 'jgallery-thumbnails-vertical' );                    
						            }
						            this.refreshNavigation();
						        },

						        changeViewToFullScreen: function() {
						            this.getElement().addClass( 'full-screen' );
						            if ( this.isHorizontal() ) {
						                this.getElement().addClass( 'jgallery-thumbnails-vertical' ).removeClass( 'jgallery-thumbnails-horizontal' );                    
						            }
						            this.refreshNavigation();
						        },

						        setActiveAlbum: function( $album ) {
						            if ( ! this.jGallery.booIsAlbums || $album.is( '.active' ) ) {
						                return;
						            }
						            this.$albums.not( $album.get( 0 ) ).removeClass( 'active' );
						            $album.addClass( 'active' );
						            this.jGallery.iconChangeAlbum.getListOfAlbums().find( '.item' ).removeClass( 'active' ).filter( '[data-jgallery-album-title="' + $album.attr( 'data-jgallery-album-title' ) + '"]' ).addClass( 'active' );
						            this.jGallery.iconChangeAlbum.setTitle( $album.attr( 'data-jgallery-album-title' ) );
						            this.refreshNavigation();
						            if ( ! this.getElement().is( '.full-screen' ) && this.jGallery.$element.is( ':visible' ) ) {
						                this.zoom.showPhoto( $album.find( 'a' ).eq( 0 ) );
						            }
						            this.showThumbsForActiveAlbum();
						        },

						        _initSquare: function() {
						            this.getElement().addClass( 'square' );
						        },

						        _initNumber: function() {
						            this.getElement().addClass( 'number' );
						            this._initSquare();
						        },

						        _initImages: function() {
						            var $css = $head.find( 'style.jgallery-thumbnails[data-jgallery-id="' + this.intJgalleryId + '"]' );
						            var strCss = '\
						                    .jgallery[data-jgallery-id="' + this.intJgalleryId + '"] .jgallery-thumbnails a {\n\
						                        width: ' + this.jGallery.options.thumbWidth + 'px;\n\
						                        height: ' + this.jGallery.options.thumbHeight + 'px;\n\
						                        font-size: ' + this.jGallery.options.thumbHeight + 'px;\n\
						                    }\n\
						                    .jgallery[data-jgallery-id="' + this.intJgalleryId + '"] .jgallery-thumbnails.full-screen a {\n\
						                        width: ' + this.jGallery.options.thumbWidthOnFullScreen + 'px;\n\
						                        height: ' + this.jGallery.options.thumbHeightOnFullScreen + 'px;\n\
						                        font-size: ' + this.jGallery.options.thumbHeightOnFullScreen + 'px;\n\
						                    }\n\
						                    .jgallery[data-jgallery-id="' + this.intJgalleryId + '"] .jgallery-thumbnails-horizontal {\n\
						                        height: ' + parseInt( this.jGallery.options.thumbHeight + 2 ) + 'px;\n\
						                    }\n\
						                    .jgallery[data-jgallery-id="' + this.intJgalleryId + '"] .jgallery-thumbnails-vertical {\n\
						                        width: ' + parseInt( this.jGallery.options.thumbWidth + 2 ) + 'px;\n\
						                    }\n\
						            ';

						            this.getElement().addClass( 'images' );
						            $css.length ? $css.html( strCss ) : $head.append( '\
						                <style type="text/css" class="jgallery-thumbnails" data-jgallery-id="' + this.intJgalleryId + '">\
						                    ' + strCss + '\
						                </style>\
						            ');
						            if ( this.isHorizontal() ) {
						                this.jGallery.zoom.$container.find( '.minimalize-thumbnails' ).addClass( 'totalsoft-ellipsis-h' ).removeClass( 'totalsoft-ellipsis-v' );
						            }
						            else {
						                this.jGallery.zoom.$container.find( '.minimalize-thumbnails' ).addClass( 'totalsoft-ellipsis-v' ).removeClass( 'totalsoft-ellipsis-h' );                
						            }
						            if ( this.isJgalleryInitialized ) {
						                return;
						            }
						            this.hide();
						        }, 

						        _showNextThumb: function() {
						            var self = this;
						            var $nextThumb = this.$a.parent( '.active' ).children( '.hidden' ).eq( 0 );

						            setTimeout( function() {
						                $nextThumb.removeClass( 'hidden' );
						                if ( $nextThumb.length ) {
						                    self._showNextThumb();
						                }
						            }, 70 );
						        },

						        _horizontalCenter: function( $a ) {
						            var self = this;

						            if ( $a.length !== 1 ) {
						                return;
						            }            
						            this.$container.stop( false, true ).animate( {
						                'scrollLeft': $a.position().left - this.$container.scrollLeft() * -1 - $a.outerWidth() / -2 - this.$container.outerWidth() / 2
						            }, function() {
						                self.refreshNavigation();
						            } );
						        },

						        _verticalCenter: function( $a ) {
						            var self = this;

						            if ( $a.length !== 1 ) {
						                return;
						            }
						            this.$container.stop( false, true ).animate( {
						                'scrollTop': $a.position().top - this.$container.scrollTop() * -1 - $a.outerHeight() / -2 - this.$container.outerHeight() / 2
						            }, function() {
						                self.refreshNavigation();
						            } );
						        },
						        
						        canScrollToPrev: function() {
						            if ( this.isVertical() || this.isFullScreen() ) {
						                return this.$container.scrollTop() > 0;
						            }
						            else {
						                return this.$container.scrollLeft() > 0;
						            }
						        },
						        
						        canScrollToNext: function() {
						            if ( this.isVertical() || this.isFullScreen() ) {
						                return this.$container.find( '.jgallery-container-inner' ).height() > this.$container.height() + this.$container.scrollTop();
						            }
						            else {
						                var $album = this.getElement().find( 'div.active' );
						                var intThumbsWidth = this.jGallery.options.thumbType === 'image' ? this.$a.outerWidth( true ) * $album.find( 'img' ).length : this.$a.outerWidth( true ) * $album.find( 'a' ).length;
						                
						                return intThumbsWidth > this.$container.width() + this.$container.scrollLeft();
						            }
						        },

						        _scrollToPrev: function() {
						            var self = this;

						            if ( this.isVertical() || this.isFullScreen() ) {
						                this.$container.stop( false, true ).animate( {
						                    'scrollTop': "-=" + $window.height() * 0.7
						                }, function() {
						                    self.refreshNavigation();
						                } );
						            } 
						            else if ( this.isHorizontal() ) {
						                this.$container.stop( false, true ).animate( {
						                    'scrollLeft': "-=" + $window.width() * 0.7
						                }, function() {
						                    self.refreshNavigation();
						                } );
						            }
						        },

						        _scrollToNext: function() {
						            var self = this;

						            if ( this.isVertical() || this.isFullScreen() ) {
						                this.$container.stop( false, true ).animate( {
						                    'scrollTop': "+=" + $window.height() * 0.7
						                }, function() {
						                    self.refreshNavigation();
						                } );                
						            }
						            else if ( this.isHorizontal() ) {
						                this.$container.stop( false, true ).animate( {
						                    'scrollLeft': "+=" + $window.width() * 0.7
						                }, function() {
						                    self.refreshNavigation();
						                } );
						            }
						        }
						    };
						    
						    return Thumbnails;
						} )( jLoader );
						var ThumbnailsGenerator = ( function( outerHtml, jLoader ) {
						    var $ = jQuery;
						    
						    $.fn.outerHtml = outerHtml;
						    $.fn.jLoader = jLoader;
						    
						    var ThumbnailsGenerator = function( jGallery, options ) {
						        this.options = $.extend( {}, {
						            thumbsHidden: true
						        }, options );
						        this.jGallery = jGallery;
						        this.isSlider = jGallery.isSlider();
						        this.$element = jGallery.$this;
						        this.booIsAlbums = jGallery.booIsAlbums;
						        this.$tmp;
						        this.intI = 1;
						        this.intJ = 1;
						        this.intNo;
						        this.$thumbnailsContainerInner = this.jGallery.$jgallery.find( '.jgallery-thumbnails .jgallery-container-inner' );
						        this.start();
						    };

						    ThumbnailsGenerator.prototype = {
						        start: function() {
						            var self = this;
						            var selector = this.jGallery.isSlider() ? '.album:has(img)' : '.album:has(a:has(img))';

						            $( 'body' ).append( '<div id="jGalleryTmp" style="position: absolute; top: 0; left: 0; width: 0; height: 0; z-index: -1; overflow: hidden;">' + this.$element.html() + '</div>' );
						            this.$tmp = $( '#jGalleryTmp' );
						            this.$thumbnailsContainerInner.html( '' );
						            if ( this.booIsAlbums ) {
						                this.$tmp.find( selector ).each( function() {
						                    self.insertAlbum( $( this ) );
						                } );
						            }
						            else {
						                this.insertImages( this.$tmp, this.$thumbnailsContainerInner );                    
						            }
						            this.$tmp.remove();
						            this.refreshThumbsSize();
						        },

						        insertAlbum: function( $this ) {
						            var strTitle = $this.is( '[data-jgallery-album-title]' ) ? $this.attr( 'data-jgallery-album-title' ) : 'Album ' + this.intJ;
						            var $album = this.$thumbnailsContainerInner.append( '<div class="album" data-jgallery-album-title="' + strTitle + '"></div>' ).children( ':last-child' );

						            if ( this.intJ === 1 ) {
						                $album.addClass( 'active' );
						            }
						            this.insertImages( $this, $album );
						            this.intJ++;
						        },

						        insertImages: function( $images, $container ) {
						            var self = this;
						            var selector = this.jGallery.isSlider() ? 'img' : 'a:has(img)';

						            this.intNo = 1;
						            $images.find( selector ).each( function() {
						                self.insertImage( $( this ), $container );
						            } );            
						        },

						        insertImage: function( $this, $container ) {
						            var $a = $();
						            var $parent;
						            
						            if ( $this.is( 'a' ) ) {
						                $a = $container.append( '<a href="' + $this.attr( 'href' ) + '">' + this.generateImgTag( $this.find( 'img' ).eq( 0 ) ).outerHtml() + '</a>' ).children( ':last-child' );
						            }
						            else if ( $this.is( 'img' ) ) {
						                $a = $container.append( $( '<a href="' + $this.attr( 'src' ) + '">' + this.generateImgTag( $this ).outerHtml() + '</a>' ) ).children( ':last-child' );
						                $parent = $this.parent();
						                if ( this.isSlider && $parent.is( 'a' ) ) {
						                    $a.attr( 'link', $parent.attr( 'href' ) );
						                    if ( $parent.is( '[target]' ) ) {
						                        $a.attr( 'target', $parent.attr( 'target' ) );
						                    }
						                }
						            }
						            $a.jLoader( {
						                start: function() {
						                    $a.overlay( {
						                        fadeIn: false,
						                        fadeOut: false,
						                        show: true,
						                        showLoader: true
						                    } );
						                },
						                success: function() {
						                    $a.overlay( {
						                        hide: true
						                    } );
						                }
						            } );
						            $container.children( ':last-child' ).attr( 'data-jgallery-photo-id', this.intI++ ).attr( 'data-jgallery-number', this.intNo++ );
						        },

						        generateImgTag: function( $img ) {
						            var $newImg = $( '<img src="' + $img.attr( 'src' ) + '" />' );

						            if ( $img.is( '[alt]' ) ) {
						                $newImg.attr( 'alt', $img.attr( 'alt' ) );
						            }
						            if ( $img.is( '[data-jgallery-bg-color]' ) ) {
						                $newImg.attr( 'data-jgallery-bg-color', $img.attr( 'data-jgallery-bg-color' ) );
						            }
						            if ( $img.is( '[data-jgallery-text-color]' ) ) {
						                $newImg.attr( 'data-jgallery-text-color', $img.attr( 'data-jgallery-text-color' ) );
						            }

						            return $newImg;
						        },

						        refreshThumbsSize: function() {
						            var options = this.jGallery.options;

						            this.$thumbnailsContainerInner.find( 'img' ).each( function() {
						                var $image = $( this );
						                var image = new Image();

						                image.src = $image.attr( 'src' );          
						                if ( ( image.width / image.height ) < ( options.thumbWidth / options.thumbHeight ) ) {
						                    $image.addClass( 'thumb-vertical' ).removeClass( 'thumb-horizontal' );
						                }
						                else {
						                    $image.addClass( 'thumb-horizontal' ).removeClass( 'thumb-vertical' );                
						                }
						                if ( ( image.width / image.height ) < ( options.thumbWidthOnFullScreen / options.thumbHeightOnFullScreen ) ) {
						                    $image.addClass( 'thumb-on-full-screen-vertical' ).removeClass( 'thumb-on-full-screen-horizontal' );
						                }
						                else {
						                    $image.addClass( 'thumb-on-full-screen-horizontal' ).removeClass( 'thumb-on-full-screen-vertical' );                
						                }
						            } );
						        }
						    };
						    
						    return ThumbnailsGenerator;
						} )( outerHtml, jLoader );
						var Zoom = ( function( jLoader, overlay, historyPushState, jGalleryTransitions, jGalleryArrayTransitions, jGalleryBackwardTransitions, AdvancedAnimation, IconChangeAlbum ) {
						    var $ = jQuery;
						    var $body = $( 'body' );
						    
						    $.fn.jLoader = jLoader;
						    $.fn.overlay = overlay;
						    
						    var Zoom = function( jGallery ) {
						        this.$container = jGallery.$element.children( '.zoom-container' );
						        this.$element = this.$container.children( '.zoom' );
						        this.$title = this.$container.find( '.nav-bottom > .title' );
						        this.$btnPrev = this.$container.children( '.prev' );
						        this.$btnNext = this.$container.children( '.next' );
						        this.thumbnails = jGallery.thumbnails;
						        this.$jGallery = jGallery.$element;
						        this.jGallery = jGallery;
						        this.$resize = this.$container.find( '.resize' );
						        this.$dragNav = this.$container.find( '.drag-nav' );
						        this.$dragNavCrop = $();
						        this.$dragNavCropImg = $();
						        this.$changeMode = this.$container.find( '.totalsoft.change-mode' );
						        this.$random = this.$container.find( '.random' );
						        this.$slideshow = this.$container.find( '.slideshow' );
						        this.intJGalleryId = this.$jGallery.attr( 'data-jgallery-id' );
						        this.booSlideshowPlayed = false;
						        this.booLoadingInProgress = false;
						        this.booLoadedAll = false;
						        this.$title.on( 'click', function() {
						            $( this ).toggleClass( 'expanded' );
						        } );
						        this.update();
						        this.enableDrag();
						    };

						    Zoom.prototype = {
						        update: function() {
						            var transition = jGalleryTransitions[ this.jGallery.options.transition ];

						            this.$container.attr( 'data-size', this.jGallery.options.zoomSize );
						            this.$element.find( '.pt-page' )
						                .removeClass( this.jGallery.options.hideEffect )
						                .removeClass( this.jGallery.options.showEffect );
						            if ( typeof transition !== 'undefined' ) {
						                this.jGallery.options.hideEffect = transition[ 0 ];
						                this.jGallery.options.showEffect = transition[ 1 ];
						            }
						            this.initAdvancedAnimation();  
						        },

						        initAdvancedAnimation: function() {
						            if ( typeof this.advancedAnimation === 'undefined' ) {
						                this.advancedAnimation = new AdvancedAnimation( this.$element );
						            }
						            this.advancedAnimation.setAnimationProperties( { 
						                duration: this.jGallery.options.transitionDuration,
						                transitionTimingFunction: this.jGallery.options.transitionTimingFunction
						            } );
						            this.advancedAnimation.setDirection( this.jGallery.options.transitionWaveDirection );
						            this.advancedAnimation.setQuantityParts( this.jGallery.options.transitionCols, this.jGallery.options.transitionRows );
						            this.advancedAnimation.setHideEffect( this.jGallery.options.hideEffect );
						            this.advancedAnimation.setShowEffect( this.jGallery.options.showEffect );
						        },

						        setThumbnails: function( thumbnails ) {
						            this.thumbnails = thumbnails;
						        },
						        
						        showDragNav: function() {
						            this.$dragNav.removeClass( 'hide' ).addClass( 'show' );  
						        },
						        
						        hideDragNav: function() {
						            this.$dragNav.removeClass( 'show' ).addClass( 'hide' );  
						        },
						        
						        refreshDragNavVisibility: function() {
						            var $img = this.$element.find( 'img.active' );
						            
						            if ( $img.width() <= this.$element.outerWidth() || $img.height() <= this.$element.outerHeight() ) {
						                this.hideDragNav();
						            }
						            else {
						                this.showDragNav();
						            }
						        },

						        enableDrag: function() {
						            var self = this;
						            var startMarginLeft;
						            var startMarginTop;
						            var startX;
						            var startY;
						            var point;
						            var $img;
						            
						            var calcDraggedX = function() {
						                return parseInt( startMarginLeft ) - parseInt( $img.css( 'margin-left' ) );
						            };

						            var startDrag = function( event ) {
						                startX = event.pageX;
						                startY = event.pageY;
						                point = event;
						                $img = self.$element.find( 'img.active' );
						                startMarginLeft = $img.css( 'margin-left' );
						                startMarginTop = $img.css( 'margin-top' );
						                self.$element.on( {
						                    mousemove: move,
						                    touchmove: move,
						                    mouseleave: stopDrag,
						                    touchend: stopDrag
						                } );
						                if ( self.jGallery.options.zoomSize === 'fill' ) {
						                    self.$dragNav.removeClass( 'hide' ).addClass( 'show' );
						                }
						                drag( 0, 0 );
						            };

						            var stopDrag = function() {
						                var draggedX = calcDraggedX();
						                var moveX = startX - point.pageX;
						                
						                self.$element.off( 'mousemove touchmove mouseleave touchend' );
						                if ( self.jGallery.options.zoomSize === 'fill' ) {
						                    self.$dragNav.removeClass( 'show' ).addClass( 'hide' );
						                }
						                if ( self.jGallery.options.swipeEvents && draggedX === 0 ) {
						                    if ( moveX > 0 ) {
						                        self.showNextPhoto();
						                    }
						                    else if ( moveX < 0 ) {
						                        self.showPrevPhoto();
						                    }
						                }
						            };
						            
						            var move = function( event ) {
						                point = event.type === 'touchmove' ? event.originalEvent.touches[0] : event;
						                var distance = {
						                    x: point.pageX - startX,
						                    y: point.pageY - startY
						                };
						                var dragged = {};

						                if ( self.jGallery.options.draggableZoom ) {
						                    dragged = drag( distance.x, distance.y );
						                }
						                if ( (Math.abs(distance.y) > Math.abs(distance.x)) && dragged.y ) {
						                    event.preventDefault();
						                }
						                else if ( (Math.abs(distance.x) >= Math.abs(distance.y)) && dragged.x ) {
						                    event.preventDefault();
						                }
						            };

						            /**
						             * 
						             * @param {number} x
						             * @param {number} y
						             * @returns {{ x: boolean, y: boolean }}
						             */
						            var drag = function( x, y ) {
						                var marginLeft = parseFloat( parseFloat( startMarginLeft ) + x );
						                var marginTop = parseFloat( parseFloat( startMarginTop ) + y );
						                var $img = self.$element.find( 'img.active' );
						                var $first = $img.eq( 0 );
						                var firstPosition = $first.position();
						                var firstPositionLeft = firstPosition.left;
						                var firstPositionTop = firstPosition.top;
						                var $last = $img.eq( -1 );
						                var lastPosition = $last.position();
						                var $lastParent = $last.parent();
						                var $dragNavCrop = self.$dragNavCrop;
						                var dragNavCropPosition = $dragNavCrop.position();
						                var canDrag = {
						                    x: firstPositionLeft + marginLeft < 0 && lastPosition.left + $last.width() + marginLeft > $lastParent.outerWidth(),
						                    y: firstPositionTop + marginTop < 0 && lastPosition.top + $last.height() + marginTop > $lastParent.outerHeight()
						                };

						                if ( canDrag.x ) {
						                    $img.css( {
						                        'margin-left': marginLeft
						                    } );
						                    $dragNavCrop.css( {
						                        left: - ( firstPositionLeft + marginLeft ) / $img.width() * 100 + '%'
						                    } );
						                }
						                if ( canDrag.y ) {
						                    $img.css( {
						                        'margin-top': marginTop
						                    } );
						                    $dragNavCrop.css( {
						                        top: - ( firstPositionTop + marginTop ) / $img.height() * 100 + '%'
						                    } );
						                }
						                if ( dragNavCropPosition ) {
						                    self.$dragNavCropImg.css( {
						                        'margin-left': - dragNavCropPosition.left,
						                        'margin-top': - dragNavCropPosition.top
						                    } );
						                }
						                
						                return canDrag;
						            };

						            this.refreshDragNavCropSize();
						            this.$element.css( 'cursor', 'move' ).on( {
						                mousedown: function( event ) {
						                    startDrag( event );
						                    self.slideshowPause();
						                },
						                touchstart: function( event ) {
						                    startDrag( event.originalEvent.touches[0] );
						                    self.slideshowPause();
						                },
						                mouseup: function() {
						                    stopDrag();
						                },
						                touchend: function() {
						                    stopDrag();
						                }
						            } );
						        },

						        refreshContainerSize: function () {
						            var intNavBottomHeight = this.jGallery.isSlider() ? 0 : this.$container.find( '.nav-bottom' ).outerHeight();
						            var isThumbnailsVisible = ! this.jGallery.isSlider() && ! this.thumbnails.getElement().is( '.hidden' );
						            var strThumbnailsPosition = isThumbnailsVisible ? this.jGallery.options.thumbnailsPosition : '';

						            this.$container.css( {
						                'width': isThumbnailsVisible && this.thumbnails.isVertical() ? this.$jGallery.width() - this.thumbnails.getElement().outerWidth( true ) : 'auto',
						                'height': isThumbnailsVisible && this.thumbnails.isHorizontal() ? this.$jGallery.height() - this.thumbnails.getElement().outerHeight( true ) - intNavBottomHeight : this.$jGallery.height() - intNavBottomHeight,
						                'margin-top': strThumbnailsPosition === 'top' ? this.thumbnails.getElement().outerHeight( true ) : 0,
						                'margin-left': strThumbnailsPosition === 'left' ? this.thumbnails.getElement().outerWidth( true ) : 0,
						                'margin-right': strThumbnailsPosition === 'right' ? this.thumbnails.getElement().outerWidth( true ) : 0
						            } );
						            if ( this.jGallery.options.draggableZoom ) {
						                this.refreshDragNavCropSize();
						            }
						        },

						        refreshSize: function() {
						            if ( this.thumbnails.isFullScreen() ) {
						                return;
						            }
						            this.refreshContainerSize();
						            if ( this.jGallery.options.zoomSize === 'original' ) {
						                this.original();
						            }
						            else if ( this.jGallery.options.zoomSize === 'fill' ) {
						                this.fill();
						            }
						            else {
						                this.fit();
						            }
						            if ( this.jGallery.options.draggableZoom ) {
						                this.refreshDragNavCropSize();
						                this.refreshDragNavVisibility();
						            }
						            this.$element.addClass( 'visible' );
						        },

						        refreshDragNavCropSize: function() { 
						            var $img = this.$element.find( 'img.active' );
						            var cropPositionLeft;
						            var cropPositionTop;

						            this.$dragNavCrop.css( {
						                width: this.$element.width() / $img.width() * 100 + '%',
						                height: this.$element.height() / $img.height() * 100 + '%'
						            } );
						            if ( $img.attr( 'data-width' ) < this.$container.outerWidth() ) {
						                cropPositionLeft = 0;
						            }
						            else {
						                cropPositionLeft = ( this.$dragNav.width() - this.$dragNavCrop.width() ) / 2;                
						            }
						            if ( $img.attr( 'data-height' ) < this.$container.outerHeight() ) {
						                cropPositionTop = 0;
						            }
						            else {
						                cropPositionTop = ( this.$dragNav.height() - this.$dragNavCrop.height() ) / 2;              
						            }
						            this.$dragNavCrop.css( {
						                left: cropPositionLeft,
						                top: cropPositionTop
						            } );
						            if ( this.$dragNavCropImg.length ) {
						                this.$dragNavCropImg.css( {
						                    'margin-left': - cropPositionLeft,
						                    'margin-top':  - cropPositionTop
						                } );
						            }
						        },

						        changeSize: function() {
						            if ( this.jGallery.options.zoomSize === 'fit' ) {
						                this.jGallery.options.zoomSize = 'fill';
						            }
						            else if ( this.jGallery.options.zoomSize === 'fill' ) {
						                var $img = this.$element.find( 'img.active' ).eq( 0 );

						                if ( this.$element.outerWidth().toString() === $img.attr( 'data-width' ) ) {
						                    this.jGallery.options.zoomSize = 'fit';
						                }
						                else {        
						                    this.jGallery.options.zoomSize = 'original';        
						                }
						            }
						            else if ( this.jGallery.options.zoomSize === 'original' ) {
						                this.jGallery.options.zoomSize = 'fit';
						            }
						            this.refreshSize();
						            this.$container.attr( 'data-size', this.jGallery.options.zoomSize );
						        },

						        original: function() {
						            var $img = this.$element.find( 'img.active' );

						            this.advancedAnimation.setPositionParts();
						            this.setImgSizeForOriginal( $img );
						            this.setImgSizeForOriginal( this.$element.find( '.pt-page.init img' ) );
						            if ( $img.attr( 'data-width' ) <= this.$element.outerWidth() && $img.attr( 'data-height' ) <= this.$element.outerHeight() ) {
						                this.$resize.addClass( 'totalsoft-search-plus' ).removeClass( 'totalsoft-search-minus' );  
						            }
						            else {
						                this.$resize.addClass( 'totalsoft-search-minus' ).removeClass( 'totalsoft-search-plus' );
						            }
						        },

						        fit: function() {
						            var $img = this.$element.find( 'img.active' ).add( this.$element.find( '.pt-page.init img' ) );

						            this.advancedAnimation.setPositionParts();
						            this.setImgSizeForFit( $img.filter( '.active' ) );
						            this.setImgSizeForFit( $img.filter( ':not( .active )' ) );
						            this.$resize.addClass( 'totalsoft-search-plus' ).removeClass( 'totalsoft-search-minus' );
						        },

						        fill: function() {
						            var $img = this.$element.find( 'img.active' );

						            this.setImgSizeForFill( $img );
						            this.setImgSizeForFill( this.$element.find( '.pt-page.init img' ) );
						            this.advancedAnimation.setPositionParts();
						            if ( $img.attr( 'data-width' ) > $img.width() && $img.attr( 'data-height' ) > $img.height() ) {
						                this.$resize.addClass( 'totalsoft-search-plus' ).removeClass( 'totalsoft-search-minus' );                
						            }
						            else {
						                this.$resize.addClass( 'totalsoft-search-minus' ).removeClass( 'totalsoft-search-plus' );
						            }
						        },

						        setImgSizeForOriginal: function( $img ) {
						            $img.css( {
						                'width': $img.attr( 'data-width' ),
						                'height': $img.attr( 'data-height' ),
						                'min-width': 0,
						                'min-height': 0,
						                'max-width': 'none',
						                'max-height': 'none'
						            } );       
						            $img.css( {
						                'margin-top': - $img.height() / 2,
						                'margin-left': - $img.width() / 2
						            } );            
						        },

						        setImgSizeForFit: function( $img ) {
						            var intNavBottomHeight = this.jGallery.isSlider() ? 0 : this.$container.find( '.nav-bottom' ).outerHeight();
						            var isThumbnailsVisible = ! this.jGallery.isSlider() && ! this.thumbnails.getElement().is( '.hidden' );

						            $img.css( {
						                'width': 'auto',
						                'height': 'auto',
						                'min-width': 0,
						                'min-height': 0,
						                'max-width': isThumbnailsVisible && this.thumbnails.isVertical() ? this.$jGallery.width() - this.thumbnails.getElement().outerWidth( true ) : this.$jGallery.width(),
						                'max-height': isThumbnailsVisible && this.thumbnails.isHorizontal() ? this.$jGallery.height() - this.thumbnails.getElement().outerHeight( true ) - intNavBottomHeight : this.$jGallery.height() - intNavBottomHeight
						            } );   
						            if ( $img.width() / $img.height() / this.jGallery.getCanvasRatioWidthToHeight() < 1 ) {
						                $img.css( {
						                    'width': 'auto',
						                    'height': <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_H;?>*jQuery('.jgallery').width()/(jQuery('.jgallery').width()+350)-80
						                } );  
																			
						            }
						            else {
						                $img.css( {
						                    'width': isThumbnailsVisible && this.thumbnails.isVertical() ? this.$jGallery.width() - this.thumbnails.getElement().outerWidth( true ) : this.$jGallery.width(),
						                    'height': 'auto'
						                } );
						            }             
						            $img.css( {
						                'margin-top': - $img.height() / 2,
						                'margin-left': - $img.width() / 2
						            } );
						        },

						        setImgSizeForFill: function( $img ) {
						            var intNavBottomHeight = this.jGallery.isSlider() ? 0 : this.$container.find( '.nav-bottom' ).outerHeight();
						            var isThumbnailsVisible = ! this.jGallery.isSlider() && ! this.thumbnails.getElement().is( '.hidden' );

						            $img.css( {
						                'width': 'auto',
						                'height': 'auto',
						                'max-width': 'none',
						                'max-height': 'none',                    
						                'min-width': 0,
						                'min-height': 0
						            } );
						            if ( $img.width() / $img.height() / this.jGallery.getCanvasRatioWidthToHeight() > 1 ) {
						                $img.css( {
						                    'width': 'auto',
						                    'height': <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_H;?>*jQuery('.jgallery-standard').width()/(jQuery('.jgallery-standard').width()+350)
						                } );                        
						            }
						            else {
						                $img.css( {
						                    'width': isThumbnailsVisible && this.thumbnails.isVertical() ? this.$jGallery.width() - this.thumbnails.getElement().outerWidth( true ) : this.$jGallery.width(),
						                    'height': 'auto'
						                } );
						            }
						            $img.css( {                   
						                'min-width': isThumbnailsVisible && this.thumbnails.isVertical() ? this.$jGallery.width() - this.thumbnails.getElement().outerWidth( true ) : this.$jGallery.width(),
						                'min-height': isThumbnailsVisible && this.thumbnails.isHorizontal() ? this.$jGallery.height() - this.thumbnails.getElement().outerHeight( true ) - intNavBottomHeight : this.$jGallery.height() - intNavBottomHeight
						            } );
						            $img.css( {
						                'margin-top': - $img.height() / 2,
						                'margin-left': - $img.width() / 2
						            } );
						        },

						        isAddedToLoad: function( $a ) {
						            return this.$element.find( 'img' ).filter( '[src="' + $a.attr( 'href' ) + '"]' ).length > 0;
						        },

						        isLoaded: function( $a ) {
						            var img = this.$element.find( 'img' ).filter( '[src="' + $a.attr( 'href' ) + '"]' ).get( 0 );
						            
						            if ( img ) {
						                return this.imgIsLoaded( img );               
						            }
						        },

						        imgIsLoaded: function( img ) {
						            return img.complete && img.naturalWidth > 0;         
						        },

						        refreshNav: function() {
						            var $thumbActive = this.thumbnails.getElement().find( 'div.active a.active' );

						            $thumbActive.prev( 'a' ).length === 1 ? this.$btnPrev.removeClass( 'hidden' ) : this.$btnPrev.addClass( 'hidden' );
						            $thumbActive.next( 'a' ).length === 1 ? this.$btnNext.removeClass( 'hidden' ) : this.$btnNext.addClass( 'hidden' );
						        },

						        slideshowStop: function () {
						            this.slideshowPause();
						            this.jGallery.progress.clear();
						        },

						        slideshowPause: function () {
						            this.jGallery.progress.pause();
						            this.$slideshow.removeClass( 'totalsoft-pause' ).addClass( 'totalsoft-play' );
						            this.booSlideshowPlayed = false;
						            if ( this.jGallery.options.slideshowCanRandom ) {
						                this.$random.hide();
						            }
						        },

						        slideshowPlay: function() {
						            if ( this.booLoadingInProgress || this.booSlideshowPlayed ) {
						                return;
						            }
						            this.booSlideshowPlayed = true;
						            this.$slideshow.removeClass( 'totalsoft-play' ).addClass( 'totalsoft-pause' );
						            this.slideshowSetTimeout();
						            if ( this.jGallery.options.slideshowCanRandom ) {
						                this.$random.show();
						            }
						        },

						        slideshowPlayPause: function() {
						            this.$slideshow.is( '.totalsoft-play' ) ? this.slideshowPlay() : this.slideshowPause();
						        },

						        slideshowSetTimeout: function() {
						            var self = this;

						            this.jGallery.progress.start( this.$container.width(), function() {
						                self.jGallery.progress.clear();
						                self.jGallery.options.slideshowRandom ? self.showRandomPhoto() : self.showNextPhotoLoop();
						            } );
						        },

						        slideshowRandomToggle: function() {
						            if ( this.jGallery.options.slideshowRandom ) {
						                this.$random.removeClass( 'active' );
						                this.jGallery.options.slideshowRandom = false;
						            }
						            else {
						                this.$random.addClass( 'active' );
						                this.jGallery.options.slideshowRandom = true;                    
						            }
						        },

						        showNextPhotoLoop: function() {
						            var $next = this.thumbnails.$a.filter( '.active' ).next( 'a' );

						            if ( $next.length === 0 ) {
						                $next = this.thumbnails.$albums.filter( '.active' ).find( 'a' ).eq( 0 );
						            }
						            this.showPhoto( $next );
						        },

						        showRandomPhoto: function() {
						            var $thumbnailsANotActive = this.thumbnails.$albums.filter( '.active' ).find( 'a:not(.active)' );

						            this.showPhoto( $thumbnailsANotActive.eq( Math.floor( Math.random() * $thumbnailsANotActive.length ) ) );
						        },

						        showPrevPhoto: function() {
						            var $prev = this.thumbnails.$a.filter( '.active' ).prev( 'a' );
						            if ( $prev.length === 1 ) {
						                this.showPhoto( $prev );
						            } 
						        },

						        showNextPhoto: function() {
						            var $next = this.thumbnails.$a.filter( '.active' ).next( 'a' );
						            if ( $next.length === 1 ) {
						                this.showPhoto( $next );
						            }
						        },

						        showPhotoInit: function() {
						            this.jGallery.init();
						        },


						        showPhoto: function( $a, options ) {
						            var self = this;
						            var $imgThumb = $a.children( 'img' );
						            var booIsLoaded;
						            var albumTitle;
						            var transition;
						            var transitionName;
						            
						            //preload images next prev
						            var $nexta=$a.next();
						            if ($nexta.length>0){
						                if ( ! self.isAddedToLoad( $nexta ) ) {
						                    this.appendPhoto( $nexta );
						                }
						            }
						            var $preva=$a.prev();
						            if ($preva.length>0){
						                if ( ! self.isAddedToLoad( $preva ) ) {
						                    this.appendPhoto( $preva );
						                }
						            }
						            //preload images next prev

						            if ( ! this.jGallery.initialized() ) {
						                this.showPhotoInit();
						            }
						            if ( this.booLoadingInProgress ) {
						                return;
						            }
						            this.booLoadingInProgress = true;
						            transitionName = this.jGallery.options[ $a.nextAll( '.active' ).length > 0 ? 'transitionBackward' : 'transition' ];
						            if ( transitionName === 'random' ) {
						                this.setRandomTransition();
						            }
						            else if ( transitionName === 'auto' ) {
						                transition = jGalleryTransitions[ jGalleryBackwardTransitions[ this.jGallery.options[ 'transition' ] ] ];
						                this.advancedAnimation.setHideEffect( transition[0] );
						                this.advancedAnimation.setShowEffect( transition[1] );
						            }
						            else {
						                transition = jGalleryTransitions[ transitionName ];
						                this.advancedAnimation.setHideEffect( transition[0] );
						                this.advancedAnimation.setShowEffect( transition[1] );
						            }
						            this.$element.find( '.pt-page.init' ).remove();
						            this.jGallery.options.showPhoto( $a, $imgThumb );
						            if ( this.jGallery.$element.is( ':not(:visible)' ) ) {
						                this.jGallery.show();
						            }
						            this.thumbnails.changeViewToBar();
						            if ( this.jGallery.booIsAlbums ) {
						                if ( this.jGallery.iconChangeAlbum.getTitle() === '' ) {
						                    albumTitle = $a.parents( '.album' ).eq( 0 ).attr( 'data-jgallery-album-title' );
						                    this.jGallery.iconChangeAlbum.setTitle( albumTitle );
						                    this.jGallery.iconChangeAlbum.$element.find( '[data-jgallery-album-title="' + albumTitle + '"]' ).addClass( 'active' );
						                    $a.parents( '.album' ).addClass( 'active' ).siblings( '.album' ).removeClass( 'active' );
						                }
						            }
						            this.thumbnails.setActiveAlbum( this.thumbnails.$albums.filter( '[data-jgallery-album-title="' + $a.parents( '[data-jgallery-album-title]' ).attr( 'data-jgallery-album-title' ) + '"]' ) );
						            this.thumbnails.setActiveThumb( $a );
						            if ( this.$element.find( 'img.active' ).attr( 'src' ) === $a.attr( 'href' ) ) {
						                this.booLoadingInProgress = false;
						                this.setJGalleryColoursForActiveThumb();
						                return;
						            }
						            if ( $a.is( '[link]' ) ) {
						                this.$element.addClass( 'is-link' );
						                if ( $a.is( '[target="_blank"]') ) {
						                    this.$element.attr( 'onclick', 'window.open("' + $a.attr( 'link' ) + '")' );
						                }
						                else {
						                    this.$element.attr( 'onclick', 'window.location="' + $a.attr( 'link' ) + '"' );                    
						                }
						            }
						            else {
						                this.$element.removeClass( 'is-link' );
						                this.$element.removeAttr( 'onclick' );                
						            }
						            this.refreshNav();
						            if ( this.jGallery.options.title ) {
						                this.$title.addClass( 'after fade' );
						            }
						            booIsLoaded = self.isLoaded( $a );
						            if ( ! booIsLoaded ) {
						                if ( self.jGallery.options.preloadAll && ! self.booLoadedAll ) {
						                    this.appendAllPhotos();
						                }
						                else if ( ! this.isAddedToLoad( $a ) ) {
						                    this.appendPhoto( $a );
						                }
						            }
						            this.$element.find( 'img.active' ).addClass( 'prev-img' );
						            self.$container.find( 'img.active' ).removeClass( 'active' );
						            self.$container.find( '[src="' + $a.attr( 'href' ) + '"]' ).addClass( 'active' );
						            if ( self.jGallery.options.title && $imgThumb.is( '[alt]' ) ) {
						                self.$title.removeClass( 'after' ).addClass( 'before' );
						            }
						            if ( ! booIsLoaded || ( self.jGallery.options.preloadAll && ! self.booLoadedAll ) ) {
						                self.booLoadedAll = true;
						                self.$container.overlay( {'show': true, 'showLoader': true, 'showProgress': self.jGallery.options.preloadAll, 'resetProgress': self.jGallery.options.preloadAll } );
						                self.jGallery.options.beforeLoadPhoto( $a, $imgThumb );
						                self.loadPhoto( self.$element, $a, options );
						            }
						            else {
						                self.showPhotoSuccess( $a, $imgThumb, options );
						            }
						        },

						        appendPhoto: function ( $a ) {
						            this.$element.find( '.pt-part' ).append( '\
						                <div class="jgallery-container pt-page">\
						                    <div class="pt-item"><img src="' + $a.attr( 'href' ) + '" /></div>\
						                </div>' );
						        },

						        appendAllPhotos: function() {       
						            var self = this;

						            if ( ! this.jGallery.options.preloadAll ) {
						                return;
						            }                
						            this.thumbnails.$a.each( function() {
						                var $a = $( this );
						                if ( ! self.isAddedToLoad( $a ) ) {
						                    self.$element.find( '.pt-part' ).append( '<div class="jgallery-container pt-page"><div class="pt-item"><img src="' + $a.attr( 'href' ) + '" /></div></div>' );
						                }
						            } );
						            this.appendInitPhoto( this.thumbnails.$a.eq( -1 ) );
						        },

						        appendInitPhoto: function( $a ) {
						            if ( $a.length !== 1 ) {
						                return;
						            }
						            this.$element.find( '.pt-part' ).append( '\
						                <div class="jgallery-container pt-page pt-page-current pt-page-ontop init" style="visibility: hidden;">\
						                    <div class="pt-item"><img src="' + $a.attr( 'href' ) + '" class="active loaded" /></div>\
						                </div>' );
						        },

						        loadPhoto: function( $zoom, $a, options ) {
						            var self = this;
						            var $imgThumb = $a.children( 'img' );
						            var intPercent = 0;
						            var $ptPart = $zoom.find( '.pt-part' ).eq( 0 );
						            var $toLoading = this.jGallery.options.preloadAll ? $ptPart : $ptPart.find( 'img.active' );

						            $toLoading.jLoader( {
						                interval: 500,
						                skip: '.loaded',
						                start: function() {
						                },
						                success: function() {
						                    $zoom.find( 'img' ).each( function() {
						                        var $this = $( this );
						                        
						                        if ( self.imgIsLoaded( $this.get( 0 ) ) ) {
						                            $this.addClass( 'loaded' );
						                        }
						                    } );
						                    self.$container.overlay( {'hide': true, 'hideLoader': true} );
						                    self.showPhotoSuccess( $a, $imgThumb, options );
						                },
						                progress: function( data ) {
						                    if ( ! self.jGallery.options.preloadAll ) {
						                        return;
						                    }
						                    intPercent = data.percent;
						                    self.$container.find( '.overlay .imageLoaderPositionAbsolute' ).find( '.progress-value' ).html( intPercent );
						                }
						            } );
						        },

						        showPhotoSuccess: function( $a, $imgThumb, options ) {
						            var image;
						            var $active = this.$element.find( 'img.active' );

						            options = $.extend( {}, {
						                historyPushState: true
						            }, options );            
						            if ( $active.is( ':not([data-width])' ) ) {
						                image = new Image();
						                image.src = $active.attr( 'src' );
						                $active.attr( 'data-width', image.width );
						                $active.attr( 'data-height', image.height );
						            }
						            if ( this.jGallery.options.title && $imgThumb.attr( 'alt' ) ) {
						                this.$title.html( $imgThumb.attr( 'alt' ) ).removeClass( 'before' ).removeClass( 'after' );
						                this.jGallery.$element.addClass( 'has-title' );
						            }
						            else {
						                this.jGallery.$element.removeClass( 'has-title' );
						            }
						            this.setJGalleryColoursForActiveThumb();
						            this.$element.find( '.pt-page.init' ).css( {
						                visibility: 'visible'
						            } );
						            this.$element.find( 'img.prev-img' ).removeClass( 'prev-img' );
						            this.advancedAnimation.show( $active.eq( 0 ).parent().parent(), {
						                animation: this.$element.find( '.pt-part' ).eq( 0 ).find( '.pt-page-current:not(.pt-page-prev)' ).length === 1
						            } );
						            this.refreshSize();
						            this.thumbnails.refreshNavigation();
						            if ( this.booSlideshowPlayed ) {
						                this.slideshowSetTimeout();
						            }
						            this.jGallery.options.afterLoadPhoto( $a, $imgThumb );
						            this.booLoadingInProgress = false;
						            if ( this.jGallery.options.autostart && this.jGallery.options.slideshowAutostart && this.jGallery.options.slideshow ) {
						                this.jGallery.options.slideshowAutostart = false;
						                this.slideshowPlay();
						            }
						            if ( this.jGallery.options.draggableZoom ) {
						                this.$dragNav.html( '<img src="' + $active.attr( 'src' ) + '" class="bg">\
						                    <div class="crop"><img src="' + $active.attr( 'src' ) + '"></div>' );
						                this.$dragNavCrop = this.$dragNav.find( '.crop' );
						                this.$dragNavCropImg = this.$dragNavCrop.find( 'img' );   
						                this.refreshDragNavCropSize();
						            }
						            if ( options.historyPushState && this.jGallery.options.browserHistory ) {
						                historyPushState( {
						                    path: $active.attr( 'src' )
						                } );
						            }
						        },

						        showPhotoByPath: function( path ) {
						            var $a = this.thumbnails.$albums.filter( '.active' ).find( 'a[href="' + path + '"]' );

						            if ( $a.length === 0 ) {
						                $a = this.thumbnails.$a.filter( 'a[href="' + path + '"]' ).eq( 0 );
						            }
						            if ( $a.length === 0 ) {
						                return;
						            }
						            this.showPhoto( $a, {
						                historyPushState: false
						            } );
						        },

						        setJGalleryColoursForActiveThumb: function() {
						            var $imgThumb = this.thumbnails.$a.filter( '.active' ).find( 'img' );

						            this.jGallery.setColours( {
						                strBg: $imgThumb.is( '[data-jgallery-bg-color]' ) ? $imgThumb.attr( 'data-jgallery-bg-color' ) : this.jGallery.options.backgroundColor,
						                strText: $imgThumb.is( '[data-jgallery-bg-color]' ) ? $imgThumb.attr( 'data-jgallery-text-color' ) : this.jGallery.options.textColor
						            } );
						        },

						        setTransition: function( transition ) {
						            this.jGallery.options.hideEffect = jGalleryTransitions[ transition ][ 0 ];
						            this.jGallery.options.showEffect = jGalleryTransitions[ transition ][ 1 ];
						            this.advancedAnimation.setHideEffect( this.jGallery.options.hideEffect );
						            this.advancedAnimation.setShowEffect( this.jGallery.options.showEffect );    
						        },

						        setRandomTransition: function() {
						            var rand;

						            this.$element.find( '.pt-page' )
						                .removeClass( this.jGallery.options.hideEffect )
						                .removeClass( this.jGallery.options.showEffect );
						            rand = Math.floor( ( Math.random() * jGalleryArrayTransitions.length ) );
						            this.jGallery.options.hideEffect = jGalleryArrayTransitions[ rand ][ 0 ];
						            this.jGallery.options.showEffect = jGalleryArrayTransitions[ rand ][ 1 ];
						            this.advancedAnimation.setHideEffect( this.jGallery.options.hideEffect );
						            this.advancedAnimation.setShowEffect( this.jGallery.options.showEffect ); 
						        },

						        unmarkActive: function() {
						            this.$element.find( 'img.active' ).removeClass( 'active' );
						        },

						        changeMode: function() {
						            var currentMode = this.jGallery.options.mode;

						            if ( currentMode === 'slider' ) {
						                return;
						            }
						            if ( currentMode === 'standard' ) {
						                this.goToFullScreenMode();
						            }
						            else if ( currentMode === 'full-screen' ) {
						                this.goToStandardMode();
						            }
						            if ( this.jGallery.iconChangeAlbum instanceof IconChangeAlbum ) {
						                this.jGallery.iconChangeAlbum.refreshMenuHeight();
						            }
						        },

						        goToFullScreenMode: function() {
						            $body.css( {
						                overflow: 'hidden'
						            } );
						            this.jGallery.$this.show();
						            this.jGallery.$element.removeClass( 'jgallery-standard' ).addClass( 'jgallery-full-screen' ).css( {
						                width: 'auto',
						                height: 'auto'
						            } );
						            this.$changeMode.removeClass( 'totalsoft-expand' ).addClass( 'totalsoft-compress' );
						            this.jGallery.options.mode = 'full-screen';
						            this.jGallery.refreshDimensions();
						        },

						        goToStandardMode: function() {
						            $body.css( {
						                overflow: 'visible'
						            } );
						            this.jGallery.$this.hide();
						            this.jGallery.$element.removeClass( 'jgallery-full-screen' ).addClass( 'jgallery-standard' ).css( {
						                width: this.jGallery.options.width,
						                height: this.jGallery.options.height
						            } );
						            this.$changeMode.removeClass( 'totalsoft-compress' ).addClass( 'totalsoft-expand' );
						            this.jGallery.options.mode = 'standard';
						            this.jGallery.refreshDimensions();
						        }
						    };
						    
						    return Zoom;
						} )( jLoader, overlay, historyPushState, jGalleryTransitions, jGalleryArrayTransitions, jGalleryBackwardTransitions, AdvancedAnimation, IconChangeAlbum );
						var JGallery = ( function( outerHtml, historyPushState, isInternetExplorer, isInternetExplorer8AndOlder, refreshHTMLClasses, defaults, defaultsFullScreenMode, defaultsSliderMode, requiredFullScreenMode, requiredSliderMode, IconChangeAlbum, Progress, Thumbnails, ThumbnailsGenerator, Zoom ) {
						    var $ = jQuery;
						    var $html = $( 'html' );
						    var $head = $( 'head' );
						    var $body = $( 'body' );
						    var $window = $( window );
						    
						    $.fn.outerHtml = outerHtml;
						    
						    var JGallery = function( $this, jGalleryId, options ) {
						        var self = this;
						        
						        if ( ! jGalleryId || $this.is( '[data-jgallery-id]' ) ) {
						            return;
						        }     
						        this.$this = $this;   
						        this.intId = jGalleryId;
						        this.$this.attr( 'data-jgallery-id', this.intId );
						        this.overrideOptions( options ); 
						        this.booIsAlbums = $this.find( '.album:has(a:has(img))' ).length > 1;
						        if ( this.options.disabledOnIE8AndOlder && isInternetExplorer8AndOlder() ) {
						            return;
						        }
						        this.init( {
						            success: function() {
						                if ( self.options.browserHistory ) {
						                    self.browserHistory();
						                }
						                if ( self.options.autostart ) {
						                    self.autostart();
						                }
						                refreshHTMLClasses();
						                $html.on( {
						                    keydown: function( event ) {
						                        if ( self.$element.is( ':visible' ) ) {
						                            if ( event.which === 27 ) {
						                                event.preventDefault();
						                                if ( self.thumbnails.getElement().is( '.full-screen' ) ) {
						                                    self.thumbnails.changeViewToBar();
						                                    self.zoom.refreshSize();
						                                    return;
						                                }
						                                self.hide();
						                            }
						                            if ( event.which === 37 ) {
						                                event.preventDefault();
						                                self.zoom.showPrevPhoto();
						                            }
						                            if ( event.which === 39 ) {
						                                event.preventDefault();
						                                self.zoom.showNextPhoto();
						                            }
						                        }
						                    }
						                } );
						            }
						        } );
						    };

						    JGallery.prototype = {
						        template: {
						            html: '<div class="jgallery" style="display: none;">\
						                        <div class="jgallery-thumbnails hidden">\
						                            <div class="jgallery-container"><div class="jgallery-container-inner"></div></div>\
						                            <span class="prev jgallery-btn"><span class="totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Arr_Type;?>-left ico"></span></span>\
						                            <span class="next jgallery-btn"><span class="totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Arr_Type;?>-right ico"></span></span>\
						                        </div>\
						                        <div class="zoom-container">\
						                            <div class="zoom before pt-perspective"></div>\
						                            <div class="drag-nav hide"></div>\
						                            <div class="left"></div>\
						                            <div class="right"></div>\
						                            <span class="totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Arr_Type;?>-left prev jgallery-btn jgallery-btn-large"></span>\
						                            <span class="totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Arr_Type;?>-right next jgallery-btn jgallery-btn-large"></span>\
						                            <span class="progress"></span>\
						                            <div class="nav">\
						                                <span class="totalsoft resize jgallery-btn jgallery-btn-small" tooltip-position="bottom right"></span>\
						                                <span class="totalsoft change-mode jgallery-btn jgallery-btn-small" tooltip-position="bottom right"></span>\
						                                <span class="totalsoft totalsoft-times jgallery-close jgallery-btn jgallery-btn-small" tooltip-position="bottom right"></span>\
						                            </div>\
						                            <div class="nav-bottom">\
						                                <div class="icons">\
						                                    <span class="totalsoft totalsoft-play slideshow jgallery-btn jgallery-btn-small"></span>\
						                                    <span class="totalsoft totalsoft-random random jgallery-btn jgallery-btn-small inactive"></span>\
						                                    <span class="totalsoft totalsoft-th full-screen jgallery-btn jgallery-btn-small"></span>\
						                                    <span class="totalsoft totalsoft-ellipsis-h minimalize-thumbnails jgallery-btn jgallery-btn-small"></span>\
						                                </div>\
						                                <div class="title before"></div>\
						                            </div>\
						                        </div>\
						                    </div>',
						            
						            done: function( fn ) {
						                fn( this.html );
						            }
						        },
						        
						        initialized: function() {
						            return this.$this.is( '[data-jgallery-id]' );
						        },

						        update: function( options ) {
						            var self = this;
						            
						            this.template.done( function() {
						                self.overrideOptions( options ); 
						                if ( self.options.disabledOnIE8AndOlder && isInternetExplorer8AndOlder() ) {
						                    return;
						                }
						                self.booIsAlbums = self.$this.find( '.album:has(a:has(img))' ).length > 1;
						                self.zoom.update();
						                self.thumbnails.init();
						                self.setUserOptions();
						                self.reloadThumbnails();
						                self.refreshDimensions();
						            } );
						        },
						        
						        overrideOptions: function( options ) {
						            var modeIsDefined = typeof options !== 'undefined' && typeof options.mode !== 'undefined';
						        
						            this.options = $.extend( {}, defaults, this.options );
						            if ( modeIsDefined && options.mode === 'full-screen' ) {
						                this.options = $.extend( {}, this.options, defaultsFullScreenMode, options, requiredFullScreenMode );
						            }
						            else if ( modeIsDefined && options.mode === 'slider' ) {
						                this.options = $.extend( {}, this.options, defaultsSliderMode, options, requiredSliderMode );
						            }
						            else {
						                this.options = $.extend( {}, this.options, options );
						            }
						        },

						        reloadThumbnails: function() {
						            new ThumbnailsGenerator( this, {
						                thumbsHidden: false
						            } );
						            this.generateAlbumsDropdown();
						            this.thumbnails.reload();
						        },

						        setVariables: function() {
						            this.$element = $( '.jgallery' ).filter( '[data-jgallery-id="' + this.intId + '"]' );
						            this.progress = new Progress( this.$element.find( '.zoom-container' ).children( '.progress' ), this );
						            this.zoom = new Zoom( this );
						            this.thumbnails = new Thumbnails( this );
						            this.zoom.setThumbnails( this.thumbnails );
						        },

						        show: function() {
						            this.$this.hide();
						            $window.on( 'resize', { jGallery: this }, this.windowOnResize );
						            if ( this.options.mode === 'full-screen' ) {
						                this.bodyOverflowBeforeShow = $body.css( 'overflow' );
						                $body.css( {
						                    'overflow': 'hidden'
						                } );
						            }
						            this.$element.not( ':visible' ).removeClass( 'hidden' ).stop( false, true ).fadeIn( 500 );
						            this.zoom.refreshContainerSize();
						            this.zoom.$title.removeClass( 'hidden' );  
						            this.options.showGallery();
						            if ( this.iconChangeAlbum instanceof IconChangeAlbum ) {
						                this.iconChangeAlbum.refreshMenuHeight();
						            }
						            refreshHTMLClasses();
						        },

						        hide: function( options ) {
						            var self = this;

						            if ( ! this.options.canClose ) {
						                return;
						            }
						            options = $.extend( {}, {
						                historyPushState: true
						            }, options );  
						            this.$element.filter( ':visible' ).stop( false, true ).addClass( 'hidden' ).fadeOut( 500, function() {
						                if ( self.options.mode === 'full-screen' ) {   
						                    $body.css( {
						                        'overflow': self.bodyOverflowBeforeShow
						                    } );
						                }
						                refreshHTMLClasses();
						            } );
						            this.zoom.booLoadingInProgress = false;
						            clearTimeout( this.zoom.showPhotoTimeout );
						            this.zoom.$title.addClass( 'hidden' );
						            this.zoom.$btnPrev.addClass( 'hidden' );
						            this.zoom.$btnNext.addClass( 'hidden' );
						            this.zoom.slideshowPause();
						            this.zoom.advancedAnimation.hideActive();
						            this.zoom.unmarkActive();
						            $window.off( 'resize', this.windowOnResize );
						            this.$this.show();
						            if ( options.historyPushState && this.options.browserHistory ) {
						                historyPushState();
						            }
						            this.options.closeGallery();
						        },

						        autostart: function() {
						            var $album;
						            var $thumb;

						            if ( this.$element.is( ':visible' ) ) {
						                return;
						            }
						            if ( this.booIsAlbums ) {
						                $album = this.thumbnails.getElement().find( '.album' ).eq( this.options.autostartAtAlbum - 1 );
						                if ( $album.length === 0 ) {
						                    $album = this.thumbnails.getElement().find( '.album' ).eq( 0 );
						                }
						            }
						            else {
						                $album = this.thumbnails.getElement();
						            }
						            $thumb = $album.find( 'a' ).eq( this.options.autostartAtImage - 1 );
						            if ( $thumb.length === 0 ) {
						                $thumb = $album.find( 'a' ).eq( 0 );
						            }
						            $thumb.trigger( 'click' );
						        },

						        browserHistory: function() {
						            var self = this;
						            var windowOnPopState = window.onpopstate;

						            function callActionByUrl() {
						                var hash;

						                if ( ! document.location.hash ) { 
						                    return;
						                }
						                hash = document.location.hash.replace( '#', '' );
						                switch ( hash ) {
						                    case '':
						                        self.hide( {
						                            historyPushState: false
						                        } );
						                        break;
						                    default:
						                        self.zoom.showPhotoByPath( hash );
						                }
						            }

						            window.onpopstate = function() {
						                if ( typeof windowOnPopState === 'function' ) {
						                    windowOnPopState();
						                }
						                callActionByUrl();
						            };
						            if ( this.options.autostart ) {
						                callActionByUrl();
						            }
						        },

						        generateAlbumsDropdown: function() {
						            var self = this;

						            this.$element.find( '.change-album' ).remove();
						            if ( ! this.booIsAlbums ) {
						                return;
						            }
						            this.zoom.$container.find( '.nav-bottom > .icons' ).append( '\
						                <span class="totalsoft totalsoft-list-ul change-album jgallery-btn jgallery-btn-small" tooltip="' + self.options.tooltipSeeOtherAlbums + '">\
						                    <span class="menu jgallery-btn"></span>\
						                    <span class="title"></span>\
						                </span>\
						            ' );
						            this.iconChangeAlbum = new IconChangeAlbum( self.zoom.$container.find( '.change-album' ), this );
						            this.iconChangeAlbum.clearMenu();
						            this.thumbnails.$albums.each( function() {
						                var strTitle = $( this ).attr( 'data-jgallery-album-title' );

						                self.iconChangeAlbum.appendToMenu( '<span class="item" data-jgallery-album-title="' + strTitle + '">' + strTitle + '</span>' );
						            } );
						            this.thumbnails.getElement().append( this.iconChangeAlbum.getElement().outerHtml() );
						            this.iconChangeAlbum = new IconChangeAlbum( this.iconChangeAlbum.getElement().add( this.thumbnails.getElement().children( ':last-child' ) ), this );
						            this.iconChangeAlbum.bindEvents( this );
						        },

						        init: function( options ) {
						            var self = this;
						            
						            options = $.extend( {
						                success: function(){}
						            }, options );
						            $head.append( '<style type="text/css" class="colours" data-jgallery-id="' + this.intId + '"></style>' );
						            this.options.initGallery();
						            this.generateHtml( {
						                success: function() { 
						                    new ThumbnailsGenerator( self );
						                    self.setVariables();
						                    self.thumbnails.init();
						                    self.thumbnails.getElement().append( '<span class="totalsoft totalsoft-times jgallery-btn jgallery-close jgallery-btn-small"></span>' );
						                    self.generateAlbumsDropdown();
						                    self.setUserOptions();
						                    if ( self.options.zoomSize === 'fit' || self.options.zoomSize === 'original' ) {
						                        self.zoom.$resize.addClass( 'totalsoft-search-plus' );
						                    }
						                    if ( self.options.zoomSize === 'fill' ) {
						                        self.zoom.$resize.addClass( 'totalsoft-search-minus' );
						                    }
						                    if ( ! isInternetExplorer() ) {
						                        self.$element.addClass( 'text-shadow' );
						                    }
						                    self.thumbnails.refreshNavigation();
						                    self.zoom.refreshNav();
						                    self.zoom.refreshSize();
						                    self.$this.on( 'click', 'a:has(img)', function( event ) {
						                        var $this = $( this );

						                        event.preventDefault();
						                        self.zoom.showPhoto( $this );
						                    } );

						                    self.thumbnails.$element.on( 'click', 'a', function( event ) {
						                        var $this = $( this );

						                        event.preventDefault();
						                        if ( $this.is( ':not(.active)' ) ) {
						                            self.zoom.slideshowStop();
						                            self.zoom.showPhoto( $this );
						                        }
						                        else if ( self.thumbnails.isFullScreen() ) {
						                            self.thumbnails.changeViewToBar();
						                            self.zoom.refreshSize();
						                        }
						                    } ); 

						                    self.zoom.$btnPrev.add( self.zoom.$container.find( '.left' ) ).on( {
						                        click: function() {
						                            self.zoom.slideshowStop();
						                            self.zoom.showPrevPhoto();
						                        }
						                    } );

						                    self.zoom.$btnNext.add( self.zoom.$container.find( '.right' ) ).on( {
						                        click: function() {
						                            self.zoom.slideshowStop();
						                            self.zoom.showNextPhoto();
						                        }
						                    } );

						                    self.zoom.$container.find( '.jgallery-close' ).on( {
						                        click: function() {
						                            self.hide();
						                        }
						                    } );

						                    self.zoom.$random.on( {
						                        click: function() {
						                            self.zoom.slideshowRandomToggle();
						                        }
						                    } );

						                    self.zoom.$resize.on( {
						                        click: function() {
						                            self.zoom.changeSize();
						                            self.zoom.slideshowPause();
						                        }
						                    } ); 

						                    self.zoom.$changeMode.on( {
						                        click: function() {
						                            self.zoom.changeMode();
						                        }
						                    } ); 

						                    self.zoom.$slideshow.on( {
						                        click: function() {
						                            self.zoom.slideshowPlayPause();
						                        }
						                    } );   

						                    self.zoom.$container.find( '.minimalize-thumbnails' ).on( {
						                        click: function() {
						                            self.thumbnails.toggle();
						                            self.zoom.refreshSize();
						                        }
						                    } );  

						                    self.thumbnails.bindEvents();      
						                    options.success();
						                    if ( self.options.hideThumbnailsOnInit ) {
						                        self.zoom.$container.find( '.minimalize-thumbnails' ).addClass( 'inactive' );
						                    }
						                }
						            } );
						            this.refreshCssClassJGalleryMobile();
						        },
						        isSlider: function() {
						            return this.options.mode === 'slider';
						        },
						        windowOnResize: function( event ) {
						            var jGallery = event.data.jGallery;
						            
						            jGallery.refreshThumbnailsVisibility();
						            jGallery.refreshCssClassJGalleryMobile();
						        },
						        refreshCssClassJGalleryMobile: function() {
						            this.isMobile() ? this.$jgallery.addClass( 'jgallery-mobile' ) : this.$jgallery.removeClass( 'jgallery-mobile' );
						        },
						        refreshDimensions: function() {
						            this.zoom.refreshSize();
						            if ( this.iconChangeAlbum instanceof IconChangeAlbum ) {
						                this.iconChangeAlbum.refreshMenuHeight();
						            }
						            this.thumbnails.refreshNavigation();
						        },
						        getCanvasRatioWidthToHeight: function() {
						            var intCanvasWidth;
						            var intCanvasHeight;

						            if ( this.thumbnails.isHorizontal() ) {
						                intCanvasWidth = this.$element.width();
						                intCanvasHeight = this.$element.height() - this.thumbnails.getElement().outerHeight( true );
						            }
						            else if ( this.thumbnails.isVertical() ) {
						                intCanvasWidth = this.$element.width() - this.thumbnails.getElement().outerWidth( true );
						                intCanvasHeight = this.$element.height();
						            }
						            else {
						                intCanvasWidth = this.$element.width();
						                intCanvasHeight = this.$element.height();                    
						            }
						            return intCanvasWidth / intCanvasHeight;
						        },
						        hideThumbnailsBar: function() {
						            this.thumbnails.getElement().addClass( 'hidden' );
						            this.zoom.$container.find( '.minimalize-thumbnails' ).hide();
						        },
						        showThumbnailsBar: function() {
						            this.thumbnails.getElement().removeClass( 'hidden' );
						            this.options.canMinimalizeThumbnails && this.options.thumbnails ? this.zoom.$container.find( '.minimalize-thumbnails' ).show() : this.zoom.$container.find( '.minimalize-thumbnails' ).hide();
						        },
						        refreshThumbnailsVisibility: function() {
						            if ( ! this.isMobile() ) {
						                if ( ! this.options.thumbnails ) {
						                    this.hideThumbnailsBar();
						                }
						                else {
						                    this.showThumbnailsBar();
						                } 
						            }
						            else {
						                if( this.options.thumbnailsHideOnMobile ) {
						                    this.hideThumbnailsBar();
						                }
						            } 
						            this.refreshDimensions();
						        },
						        isMobile: function() {
						            return $window.width() <= this.options.maxMobileWidth;
						        },
						        setUserOptions: function() {
						            var options = this.options;
						            var mode = options.mode;
						            var width = mode === 'full-screen' ? 'auto' : options.width;
						            var height = mode === 'full-screen' ? 'auto' : options.height;

						            this.refreshAttrClasses();
						            this.options.canZoom ? this.zoom.$resize.show() : this.zoom.$resize.hide();
						            this.options.canChangeMode ? this.zoom.$changeMode.show() : this.zoom.$changeMode.hide();
						            this.options.mode === 'standard' ? this.zoom.$changeMode.removeClass( 'totalsoft-compress' ).addClass( 'totalsoft-expand' ) : this.zoom.$changeMode.removeClass( 'totalsoft-expand' ).addClass( 'totalsoft-compress' );
						            this.options.canClose ? this.zoom.$container.find( '.jgallery-close' ).show() : this.zoom.$container.find( '.jgallery-close' ).hide();
						            this.refreshThumbnailsVisibility();
						            this.zoom.refreshSize();
						            this.options.slideshow ? this.zoom.$slideshow.show() : this.zoom.$slideshow.hide();
						            this.options.slideshow && this.options.slideshowCanRandom && this.options.slideshowAutostart ? this.zoom.$random.show(): this.zoom.$random.hide();
						            this.options.slideshow && this.options.slideshowCanRandom && this.options.slideshowRandom ? this.zoom.$random.addClass( 'active' ) : this.zoom.$random.removeClass( 'active' );

						            this.options.thumbnailsFullScreen && this.options.thumbnails ? this.zoom.$container.find( '.full-screen' ).show() : this.zoom.$container.find( '.full-screen' ).hide();
						            this.options.hideThumbnailsOnInit && this.options.thumbnails ? this.thumbnails.hide() : this.thumbnails.show();
						            this.options.titleExpanded ? this.zoom.$title.addClass( 'expanded' ) : this.zoom.$title.removeClass( 'expanded' );
						            this.setColours( {
						                strBg: this.options.backgroundColor,
						                strText: this.options.textColor
						            } );
						            this.options.tooltips ? this.$jgallery.addClass( 'jgallery-tooltips' ) : this.$jgallery.removeClass( 'jgallery-tooltips' );
						            this.$jgallery.css( {
						                width: width,
						                height: height
						            } );
						            this.options.draggableZoomHideNavigationOnMobile ? this.$jgallery.addClass( 'jgallery-hide-draggable-navigation-on-mobile' ) : this.$jgallery.removeClass( 'jgallery-hide-draggable-navigation-on-mobile' );
						        },

						        refreshAttrClasses: function() {
						            var self = this;
						            var modes = [ 'standard', 'full-screen', 'slider' ];

						            $.each( modes, function( key, value ) {
						                self.$jgallery.removeClass( 'jgallery-' + value );
						            } );
						            this.$jgallery.addClass( 'jgallery-' + this.options.mode );
						        },

						        setColours: function( options ) {
						            $head.find( 'style[data-jgallery-id="' + this.intId + '"].colours' ).html( this.getCssForColours( options ) );
						        },
						        generateHtml: function( options ) {
						            var self = this;
						            
						            options = $.extend( {}, {
						                success: function(){}
						            }, options );
						            this.template.done( function( html ) {   
						                ( function() {
						                    var options = self.options; 
						                    var mode = options.mode;     

						                    if ( mode === 'full-screen' ) {
						                        self.$jgallery = self.$this.after( html ).next();
						                    }
						                    else {
						                        if ( options.autostart ) {
						                            self.$this.hide();
						                        }
						                        self.$jgallery = self.$this.after( html ).next();
						                    }
						                    self.$jgallery.addClass( 'jgallery-' + mode ).attr( 'data-jgallery-id', self.intId );
						                    self.$jgallery.find( '.totalsoft.slideshow' ).attr( 'tooltip', options.tooltipSlideshow );
						                    self.$jgallery.find( '.totalsoft.resize' ).attr( 'tooltip', options.tooltipZoom );
						                    self.$jgallery.find( '.totalsoft.change-mode' ).attr( 'tooltip', options.tooltipFullScreen );
						                    self.$jgallery.find( '.totalsoft.jgallery-close' ).attr( 'tooltip', options.tooltipClose );
						                    self.$jgallery.find( '.totalsoft.random' ).attr( 'tooltip', options.tooltipRandom );
						                    self.$jgallery.find( '.totalsoft.full-screen' ).attr( 'tooltip', options.tooltipSeeAllPhotos );
						                    self.$jgallery.find( '.totalsoft.minimalize-thumbnails' ).attr( 'tooltip', options.tooltipToggleThumbnails );
						                } )();
						                options.success();
						            } );
						        },
						        getCssForColours: function( objOptions ) {
						            objOptions = $.extend( {
						                strBg: 'rgb( 0, 0, 0 )',
						                strText: 'rgb( 255, 255, 255 )'
						            }, objOptions );

						            var arrText;
						            var arrBg;
						            var arrBgAlt;

						            if ( typeof tinycolor === 'function' ) {
						                arrText = tinycolor( objOptions.strText ).toRgb();
						                arrBg = tinycolor( objOptions.strBg ).toRgb();
						                if ( arrBg.r + arrBg.g + arrBg.b > 375 ) {
						                    arrBg = tinycolor.darken( objOptions.strBg ).toRgb();
						                    arrBgAlt = tinycolor( objOptions.strBg ).toRgb();
						                }
						                else {
						                    arrBg = tinycolor( objOptions.strBg ).toRgb();
						                    arrBgAlt = tinycolor.lighten( objOptions.strBg ).toRgb();                
						                }
						            }
						            else {
						                arrBg = {
						                    r: 230,
						                    g: 230,
						                    b: 230
						                };
						                arrBgAlt = {
						                    r: 255,
						                    g: 255,
						                    b: 255
						                };
						                arrText = {
						                    r: 0,
						                    g: 0,
						                    b: 0
						                };
						            }
						            return '\
						                .jgallery[data-jgallery-id="' + this.intId + '"] {\
						                  background: transparent !important;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] [tooltip]:after {\
						                  background: rgba(' + arrText.r + ',' + arrText.g + ', ' + arrText.b + ', .9);\
						                  color: rgb(' + arrBg.r + ',' + arrBg.g + ', ' + arrBg.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-btn.totalsoft-search-plus{\
						                	color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Zoom_C;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-btn.totalsoft-expand{\
						                	color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Full_C;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-btn.totalsoft-play, .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-btn.totalsoft-pause{\
						                	color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_PP_C;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-btn.totalsoft-list-ul{\
						                	color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Album_C;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-btn.next, .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-btn.prev{\
						                	color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Arr_C;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-btn:hover {\
						                  opacity: 0.8;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .change-album .menu {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom .change-album > .title {\
						                  background:  <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_AT_BgC;?>;\
						                  color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_AT_C;?>;\
						                  font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_AT_FS;?>px;\
						                  font-family: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_AT_FF;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .full-screen .change-album .menu {\
						                  background: rgb(' + arrBg.r + ',' + arrBg.g + ', ' + arrBg.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .change-album .menu .item {\
						                  border-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_ASM_C;?>;\
						                  color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_ASM_C;?>;\
						                  background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_ASM_BgC;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .full-screen .change-album .menu .item {\
						                  border-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_ASM_C;?>;\
						                  color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_ASM_C;?>;\
						                  background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_ASM_BgC;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .change-album .menu .item.active,\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .change-album .menu .item:hover {\
						                  background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_ASM_HBgC;?>;\
						                  color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_ASM_HC;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container:not([data-size="fill"]) .jgallery-container {\
						                  background: transparent;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom {\
						                  background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_AT_BgC;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom .icons,\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom .icons .totalsoft{\
						                  background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_AT_BgC;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom > .title {\
						                  color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_IT_C;?>;\
						                  font-family: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_IT_FF;?>;\
						                  font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_IT_FS;?>px;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom > .title.expanded {\
						                  background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_IT_BgC;?>;\
						                  opacity:0.5;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container .drag-nav {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                  -webkit-box-shadow: 0 0 0 3px rgba(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', .5);\
						                  box-shadow: 0 0 0 3px rgba(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', .5);\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .zoom-container .drag-nav .crop {\
						                  -webkit-box-shadow: 0 0 0 3px rgba(' + arrText.r + ',' + arrText.g + ', ' + arrText.b + ', .5);\
						                  box-shadow: 0 0 0 3px rgba(' + arrText.r + ',' + arrText.g + ', ' + arrText.b + ', .5);\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails {\
						                  background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_ABgC;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails .ico {\
						                  color: rgb(' + arrText.r + ',' + arrText.g + ', ' + arrText.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails.full-screen .prev:before {\
						                  background-image: -webkit-gradient(linear,left 0%,left 100%,from(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 )),to(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0)));\
						                  background-image: -webkit-linear-gradient(top,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ),0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0),100%);\
						                  background-image: -moz-linear-gradient(top,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0) 100%);\
						                  background-image: linear-gradient(to bottom,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0) 100%);\
						                  background-repeat: repeat-x;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails.full-screen .next:before {\
						                  background-image: -webkit-gradient(linear,left 0%,left 100%,from(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0)),to(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1)));\
						                  background-image: -webkit-linear-gradient(top,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0),0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1),100%);\
						                  background-image: -moz-linear-gradient(top,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1) 100%);\
						                  background-image: linear-gradient(to bottom,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1) 100%);\
						                  background-repeat: repeat-x;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails.images a:after {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails.full-screen .prev,\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails.full-screen .next {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails.square:not(.full-screen) a {\
						                  background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_BgC;?>;\
						                  color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_SP_Th_C;?>;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .overlayContainer .overlay {\
						                  background: rgba(' + arrBg.r + ',' + arrBg.g + ', ' + arrBg.b + ',.8);\
						                  color: rgb(' + arrText.r + ',' + arrText.g + ', ' + arrText.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .overlayContainer .imageLoaderPositionAbsolute:after {\
						                  border-color: rgba(' + arrText.r + ',' + arrText.g + ', ' + arrText.b + ', .5 );\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails .overlayContainer .overlay {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails-horizontal .prev {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails-horizontal .prev:before {\
						                  background-image: -webkit-gradient(linear,0% top,100% top,from(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 )),to(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 )));\
						                  background-image: -webkit-linear-gradient(left,color-stop(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 0%),color-stop(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 100%));\
						                  background-image: -moz-linear-gradient(left,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 100%);\
						                  background-image: linear-gradient(to right,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 100%);\
						                  background-repeat: repeat-x;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails-horizontal .next {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails-horizontal .next:before {\
						                  background-image: -webkit-gradient(linear,0% top,100% top,from(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 )),to(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 )));\
						                  background-image: -webkit-linear-gradient(left,color-stop(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 0%),color-stop(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 100%));\
						                  background-image: -moz-linear-gradient(left,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 100%);\
						                  background-image: linear-gradient(to right,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 100%);\
						                  background-repeat: repeat-x;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails-vertical .prev {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails-vertical .prev:before {\
						                  background-image: -webkit-gradient(linear,left 0%,left 100%,from(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 )),to(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 )));\
						                  background-image: -webkit-linear-gradient(top,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ),0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ),100%);\
						                  background-image: -moz-linear-gradient(top,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 100%);\
						                  background-image: linear-gradient(to bottom,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 100%);\
						                  background-repeat: repeat-x;\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails-vertical .next {\
						                  background: rgb(' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ');\
						                }\
						                .jgallery[data-jgallery-id="' + this.intId + '"] .jgallery-thumbnails-vertical .next:before {\
						                  background-image: -webkit-gradient(linear,left 0%,left 100%,from(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 )),to(rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 )));\
						                  background-image: -webkit-linear-gradient(top,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ),0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ),100%);\
						                  background-image: -moz-linear-gradient(top,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 100%);\
						                  background-image: linear-gradient(to bottom,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 0 ) 0%,rgba( ' + arrBgAlt.r + ',' + arrBgAlt.g + ', ' + arrBgAlt.b + ', 1 ) 100%);\
						                  background-repeat: repeat-x;\
						                }\
						                .jgallery.jgallery-slider[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom,\
						                .jgallery.jgallery-slider[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom > .title.expanded {\
						                  background: none;\
						                }\
						                .jgallery.has-title.jgallery-slider[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom,\
						                .jgallery.has-title.jgallery-slider[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom > .title.expanded {\
						                  background: rgba(' + arrBg.r + ',' + arrBg.g + ', ' + arrBg.b + ',.7);\
						                  color: rgb(' + arrText.r + ',' + arrText.g + ', ' + arrText.b + ');\
						                }\
						                .jgallery.jgallery-slider[data-jgallery-id="' + this.intId + '"] .zoom-container .nav-bottom .jgallery-btn {\
						                  background: rgba(' + arrBg.r + ',' + arrBg.g + ', ' + arrBg.b + ',.8);\
						                  color: rgb(' + arrText.r + ',' + arrText.g + ', ' + arrText.b + ');\
						                }\
						            ';
						        }
						    };
						    return JGallery;
						} )( outerHtml, historyPushState, isInternetExplorer, isInternetExplorer8AndOlder, refreshHTMLClasses, defaults, defaultsFullScreenMode, defaultsSliderMode, requiredFullScreenMode, requiredSliderMode, IconChangeAlbum, Progress, Thumbnails, ThumbnailsGenerator, Zoom );
						( function( refreshHTMLClasses, defaults, jGalleryTransitions, JGallery ) {
						    var jGalleryCollection = [ '' ];
						    var $ = jQuery;
						    var $html = $( 'html' );
						    var jGalleryId = 0;
						    $.fn.jGallery = function( userOptions ) {
						        var self = this;
						        this.each( function() {
						            var $this = $( this );

						            if ( ! $this.is( '[data-jgallery-id]' ) ) {
						                jGalleryCollection[ ++jGalleryId ] = new JGallery( $this, jGalleryId, userOptions );
						            }
						            else if( $.isPlainObject( userOptions ) ) {
						                jGalleryCollection[ $this.attr( 'data-jgallery-id' ) ].update( userOptions );
						            }
						        } );   
						        $.extend( self, {
						            getDefaults: function() {
						                return defaults;
						            },
						            getTransitions: function() {
						                return jGalleryTransitions;
						            },
						            restoreDefaults: function() {
						                return self.each( function() {
						                    $( this ).jGallery( defaults );
						                } );
						            },
						            getOptions: function() {
						                return jGalleryCollection[$( self ).eq( 0 ).attr( 'data-jgallery-id' )].options;
						            },
						            destroy: function() {
						                return self.each( function() {
						                    var $this = $( this );
						                    var id = $this.attr( 'data-jgallery-id' );
						                    jGalleryCollection[ id ] = '';
						                    $this.removeAttr( 'data-jgallery-id' ).show();
						                    $html.find( '.jgallery[data-jgallery-id="' + id + '"]' ).remove();
						                    refreshHTMLClasses();
						                } );                    
						            }
						        } );
						        return this;
						    };
						} )( refreshHTMLClasses, defaults, jGalleryTransitions, JGallery );
						} )();
				    </script>
				<?php } else if($TotalSoftPortfolioOpt[0]->TotalSoftPortfolio_SetType=='Gallery Album Animation'){ ?>
					<style type="text/css">
						#TS_Portfolio_GAA { float: left; width: 100%; }
						#TS_Portfolio_GAA_inner { width: 100%; position: relative; margin-right: auto; margin-left: auto; }
						.TS_Portfolio_GAA_inner-content { float: left; width: 100%;	margin-bottom: 10px; position: relative; }
						.TS_Portfolio_GAA_inner-content-text {
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_02 == 'Position 1'){ ?>
								float: left;
								width: calc(99% - <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_05;?>px);
								max-width: 100%;
							<?php } else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_02 == 'Position 2'){ ?>
								margin: 0 auto !important;
								width: 100%;
							<?php }?>
						}
						.TS_Portfolio_GAA_inner-content-text p { margin: 0;	}
						.TS_Portfolio_GAA_inner-content_titlea
						{
							color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_10;?>;
							text-align: center;
							cursor: default;
							width: 99%;
							padding: 5px 10px;
							border: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_09;?>px solid <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_07;?>;
							margin: 10px auto;
							font-size: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_11;?>px;
							font-family: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_12;?>;
							line-height: 1;
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_08 == 'true'){ ?>
								border-radius: 15px;
							<?php }?>
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_16 == 'Type 1'){ ?>
								background: transparent !important;
							<?php } else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_16 == 'Type 2'){ ?>
								background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_17;?>;
							<?php } else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_16 == 'Type 3'){ ?>
								background: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_17;?>;
							    background: -webkit-linear-gradient(<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_17;?>, <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_18;?>);
							    background: -o-linear-gradient(<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_17;?>, <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_18;?>);
							    background: -moz-linear-gradient(<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_17;?>, <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_18;?>);
							    background: linear-gradient(<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_17;?>, <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_18;?>);
							<?php }?>
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_13 == 'true'){ ?>
								<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_14 == 'true'){ ?>
									-moz-box-shadow: 0px 0px 15px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_15;?>;
								    -webkit-box-shadow: 0px 0px 15px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_15;?>;
								    box-shadow: 0px 0px 15px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_15;?>;
								<?php } else { ?>
									-moz-box-shadow: 0px 7px 20px -10px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_15;?>;
								    -webkit-box-shadow: 0px 7px 20px -10px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_15;?>;
								    box-shadow: 0px 7px 20px -10px <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_15;?>;
								<?php }?>
							<?php }?>
						}
						.TS_Portfolio_GAA_IFOP:before
						{
							content: '\<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_19;?>' !important;
						}
						#TS_Portfolio_GAA_fullscreen { position: fixed; z-index: 1000000; left: 0px; top: 0px; height: 100%; width: 100%; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; display: none; }
						#TS_Portfolio_GAA_fullscreen-inner { position: relative; height: 100%; width: 100%;	float: left; background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_26;?>; }
						.TS_Portfolio_GAA_fullscreen-inner-button1 {
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_29 == 'Size 1'){ ?>
								height: 35px; width: 35px; font-size: 18px; line-height: 35px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_29 == 'Size 2'){ ?>
								height: 45px; width: 45px; font-size: 23px;	line-height: 45px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_29 == 'Size 3'){ ?>
								height: 60px; width: 60px; font-size: 30px;	line-height: 60px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_29 == 'Size 4'){ ?>
								height: 80px; width: 80px; font-size: 40px; line-height: 80px;
							<?php }?>
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_31 == 'true'){ ?>
								-webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%;
							<?php }?>	
							background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_30;?>; position: absolute; color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_28;?>; text-align: center; -webkit-transition: all 0.5s; -moz-transition: all 0.5s; -o-transition: all 0.5s; transition: all 0.5s; z-index: 20;	}
						.TS_Portfolio_GAA_fullscreen-inner-button1:hover { background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_32;?>; color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_33;?>; cursor: pointer; -webkit-border-radius: 35%; -moz-border-radius: 35%; border-radius: 35%;	}
						.TS_Portfolio_GAA_fullscreen-inner-button2 {
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_36 == 'Size 1'){ ?>
								height: 35px; width: 35px; font-size: 18px; line-height: 35px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_36 == 'Size 2'){ ?>
								height: 45px; width: 45px; font-size: 23px; line-height: 45px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_36 == 'Size 3'){ ?>
								height: 60px; width: 60px; font-size: 30px; line-height: 60px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_36 == 'Size 4'){ ?>
								height: 80px; width: 80px; font-size: 40px;	line-height: 80px;
							<?php }?>
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_38 == 'true'){ ?>
								-webkit-border-radius: 50%;	-moz-border-radius: 50%; border-radius: 50%;
							<?php }?>	
							background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_37;?>; position: absolute; color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_35;?>; text-align: center; -webkit-transition: all 0.5s; -moz-transition: all 0.5s; -o-transition: all 0.5s; transition: all 0.5s; z-index: 1000; 
						}
						.TS_Portfolio_GAA_fullscreen-inner-button2:hover { background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_39;?>; color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_40;?>; cursor: pointer; -webkit-border-radius: 35%; -moz-border-radius: 35%; border-radius: 35%; }
						#TS_Portfolio_GAA_fullscreen-inner-left { left: 20px; top: 50%; margin-top: -17.5px; }
						#TS_Portfolio_GAA_fullscreen-inner-right { top: 50%; right: 20px; margin-top: -17.5px; }
						#TS_Portfolio_GAA_fullscreen-inner-close { top: 0px; right: 0px; margin-top: 20px; margin-right: 20px; }
						#TS_Portfolio_GAA_fullscreen-inner-close span:before { content: '\<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_34;?>'; }
						#TS_Portfolio_GAA_fullscreen-image { height: 667px;	width: 1000px; margin-left: auto; margin-right: auto; margin-top: 50px; position: relative; }
						#TS_Portfolio_GAA_fullscreen-image img { position: absolute; left: 50%; top: 50%; -webkit-transition: all 0.5s; -moz-transition: all 0.5s; -o-transition: all 0.5s; transition: all 0.5s; -ms-transform: scale(1.5,1.5); -webkit-transform: scale(1.5,1.5); transform: scale(1.5,1.5); opacity: 0; }
						.TS_Portfolio_GAA_inner-content-image {
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_02 == 'Position 1'){ ?>
								float: left;
							<?php } else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_02 == 'Position 2'){ ?>
								margin: 0 auto;
							<?php }?>
							width: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_05;?>px;
							position: relative;
							height: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_06;?>px;
							-webkit-perspective: 800px; -moz-perspective: 800px; -o-perspective: 800px; -ms-perspective: 800px;	perspective: 800px;
						}
						.TS_Portfolio_GAA_inner-content-image img { width: 100%; height: 100%; position: absolute; left: 0px; top: 0px; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; -o-transition: all 0.3s; transition: all 0.3s; opacity: 0;	}
						.TS_Portfolio_GAA_inner-content-image-hover { height: 100%; width: 100%; position: absolute; left: 0px; top: 0px; background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_04;?>; cursor: pointer; opacity: 0; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; -o-transition: all 0.3s; transition: all 0.3s; z-index: 1;}
						.TS_Portfolio_GAA_inner-content-image-hover-cercle {
							position: absolute;	left: 50%; top: 50%;
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_21 == 'Size 1'){ ?>
								height: 30px; width: 30px; font-size: 15px; line-height: 30px; margin-top: -15px; margin-left: -15px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_21 == 'Size 2'){ ?>
								height: 50px; width: 50px; font-size: 25px; line-height: 50px; margin-top: -25px; margin-left: -25px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_21 == 'Size 3'){ ?>
								height: 66px; width: 66px; font-size: 33px;	line-height: 66px; margin-top: -33px; margin-left: -33px;
							<?php }else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_21 == 'Size 4'){ ?>
								height: 80px; width: 80px; font-size: 40px; line-height: 80px; margin-top: -40px; margin-left: -40px;
							<?php }?>
							<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_23 == 'true'){ ?>
								-webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; 
							<?php }?>	
							background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_22;?>; color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_20;?>; text-align: center; -webkit-transform-origin: center; transform-origin: center; -webkit-animation-duration: 1s; animation-duration: 1s; -webkit-animation-fill-mode: both; animation-fill-mode: both; }
						.TS_Portfolio_GAA_inner-content-image-hover-cercle:hover { background-color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_24;?>; color: <?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_25;?>; }
						.TS_Portfolio_GAA_inner-content-image:hover .TS_Portfolio_GAA_inner-content-image-hover-cercle { -webkit-animation-name: jello; animation-name: jello; }
						.TS_Portfolio_GAA_inner-content-image:hover { border: none !important; box-shadow: none !important; margin: 0 !important; padding: 0 !important; }
						.TS_Portfolio_GAA_inner-content-image:hover img{ border: none !important; box-shadow: none !important; margin: 0 !important; padding: 0 !important; }
						@-webkit-keyframes jello {
							from, 11.1%, to { -webkit-transform: none; transform: none; }
							22.2% { -webkit-transform: skewX(-12.5deg) skewY(-12.5deg); transform: skewX(-12.5deg) skewY(-12.5deg); }
							33.3% { -webkit-transform: skewX(6.25deg) skewY(6.25deg); transform: skewX(6.25deg) skewY(6.25deg); }
							44.4% { -webkit-transform: skewX(-3.125deg) skewY(-3.125deg); transform: skewX(-3.125deg) skewY(-3.125deg); }
							55.5% { -webkit-transform: skewX(1.5625deg) skewY(1.5625deg); transform: skewX(1.5625deg) skewY(1.5625deg); }
							66.6% { -webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg); transform: skewX(-0.78125deg) skewY(-0.78125deg); }
							77.7% { -webkit-transform: skewX(0.390625deg) skewY(0.390625deg); transform: skewX(0.390625deg) skewY(0.390625deg); }
							88.8% { -webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg); transform: skewX(-0.1953125deg) skewY(-0.1953125deg); }
						}
						@keyframes jello {
						  	from, 11.1%, to { -webkit-transform: none; transform: none; }
						  	22.2% { -webkit-transform: skewX(-12.5deg) skewY(-12.5deg); transform: skewX(-12.5deg) skewY(-12.5deg); }
						  	33.3% { -webkit-transform: skewX(6.25deg) skewY(6.25deg); transform: skewX(6.25deg) skewY(6.25deg); }
						  	44.4% { -webkit-transform: skewX(-3.125deg) skewY(-3.125deg); transform: skewX(-3.125deg) skewY(-3.125deg); }
						  	55.5% { -webkit-transform: skewX(1.5625deg) skewY(1.5625deg); transform: skewX(1.5625deg) skewY(1.5625deg); }
						  	66.6% { -webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg); transform: skewX(-0.78125deg) skewY(-0.78125deg); }
						  	77.7% { -webkit-transform: skewX(0.390625deg) skewY(0.390625deg); transform: skewX(0.390625deg) skewY(0.390625deg); }
						  	88.8% { -webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg); transform: skewX(-0.1953125deg) skewY(-0.1953125deg); }
						}
						@-webkit-keyframes fadeInDown {
						  	0% { opacity: 0; -webkit-transform: translate3d(0, -100%, 0); transform: translate3d(0, -100%, 0); }
						  	100% { opacity: 1; -webkit-transform: none; transform: none; }
						}
						@keyframes fadeInDown {
						  	0% { opacity: 0; -webkit-transform: translate3d(0, -100%, 0); transform: translate3d(0, -100%, 0); }
						  	100% { opacity: 1; -webkit-transform: none; transform: none; }
						}
						.fadeInDown { -webkit-animation-name: fadeInDown; animation-name: fadeInDown; -webkit-animation-delay: 0.3s; animation-delay: 0.3s; -webkit-animation-duration: 0.5s; animation-duration: 0.5s; -webkit-animation-fill-mode: both; animation-fill-mode: both; }
						@-webkit-keyframes fadeOutDown {
						  	0% { opacity: 1; }
						  	100% { opacity: 0; -webkit-transform: translate3d(0, 100%, 0); transform: translate3d(0, 100%, 0); }
						}
						@keyframes fadeOutDown {
						  	0% { opacity: 1; }
						  	100% { opacity: 0; -webkit-transform: translate3d(0, 100%, 0); transform: translate3d(0, 100%, 0); }
						}
						.fadeOutDown { -webkit-animation-name: fadeOutDown; animation-name: fadeOutDown; -webkit-animation-duration: 0.5s; animation-duration: 0.5s; -webkit-animation-fill-mode: both; animation-fill-mode: both; }
						@-webkit-keyframes fadeIn {
						  	0% { opacity: 0; }
						  	100% { opacity: 1; }
						}
						@keyframes fadeIn {
						  	0% { opacity: 0; }
						  	100% { opacity: 1; }
						}
						.fadeIn { -webkit-animation-name: fadeIn; animation-name: fadeIn; -webkit-animation-duration: 0.5s; animation-duration: 0.5s; -webkit-animation-fill-mode: both; animation-fill-mode: both; }
						@-webkit-keyframes fadeOut {
						  	0% { opacity: 1; }
						  	100% { opacity: 0; }
						}
						@keyframes fadeOut {
						  	0% { opacity: 1; }
						  	100% { opacity: 0; }
						}
						.fadeOut { -webkit-animation-name: fadeOut; animation-name: fadeOut; -webkit-animation-duration: 0.5s; animation-duration: 0.5s; -webkit-animation-fill-mode: both; animation-fill-mode: both; }												
						<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_01 == 'Effect 1'){ ?>
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(5) { -ms-transform: translate(0,-30%) scale(0.6,0.6); -webkit-transform: translate(0,-30%) scale(0.6,0.6); transform: translate(0,-30%) scale(0.6,0.6); z-index: 1; opacity: 0.2; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(4) { -ms-transform: translate(0,-20%) scale(0.7,0.7); -webkit-transform: translate(0,-20%) scale(0.7,0.7); transform: translate(0,-20%) scale(0.7,0.7); z-index: 1; opacity: 0.4; }			
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(3) { -ms-transform: translate(0,-10%) scale(0.8,0.8); -webkit-transform: translate(0,-10%) scale(0.8,0.8); transform: translate(0,-10%) scale(0.8,0.8); z-index: 2; opacity: 0.6; }		
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(2) { -ms-transform: scale(0.9,0.9) ; -webkit-transform: scale(0.9,0.9); transform: scale(0.9,0.9); z-index: 3;	opacity: 0.8; }		
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(1) { -ms-transform: translate(0,10%) scale(1,1); -webkit-transform: translate(0,10%) scale(1,1); transform: translate(0,10%) scale(1,1); z-index: 4; opacity: 1; }
							.TS_Portfolio_GAA_inner-content-image:hover .TS_Portfolio_GAA_inner-content-image-hover { opacity: 1; -ms-transform: translate(0,10%) scale(1,1); -webkit-transform: translate(0,10%) scale(1,1); transform: translate(0,10%) scale(1,1); z-index: 10; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(1) { opacity: 1; z-index: 9; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(2) { opacity: 1; z-index: 8; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(3) { opacity: 1; z-index: 7; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(4) { opacity: 1; z-index: 6; }			
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(4) { -ms-transform: translate(0,-20%) scale(0.7,0.7); -webkit-transform: translate(0,-20%) scale(0.7,0.7); transform: translate(0,-20%) scale(0.7,0.7); }			
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(3) { -ms-transform: translate(0,-10%) scale(0.8,0.8);	-webkit-transform: translate(0,-10%) scale(0.8,0.8); transform: translate(0,-10%) scale(0.8,0.8); }		
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(2) { -ms-transform: scale(0.9,0.9) ; -webkit-transform: scale(0.9,0.9); transform: scale(0.9,0.9); }		
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(1) { -ms-transform: translate(0,10%) scale(1,1); -webkit-transform: translate(0,10%) scale(1,1); transform: translate(0,10%) scale(1,1); }
						<?php } else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_01 == 'Effect 2'){ ?>
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(5) { -ms-transform: translate(-30%,0) scale(0.6,0.6); -webkit-transform: translate(-30%,0) scale(0.6,0.6); transform: translate(-30%,0) scale(0.6,0.6); z-index: 1; opacity: 0.2; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(4) { -ms-transform: translate(-20%,0) scale(0.7,0.7); -webkit-transform: translate(-20%,0) scale(0.7,0.7); transform: translate(-20%,0) scale(0.7,0.7); z-index: 1; opacity: 0.4; }			
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(3) { -ms-transform: translate(-10%,0) scale(0.8,0.8); -webkit-transform: translate(-10%,0) scale(0.8,0.8); transform: translate(-10%,0) scale(0.8,0.8); z-index: 2; opacity: 0.6; }		
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(2) { -ms-transform: scale(0.9,0.9) ; -webkit-transform: scale(0.9,0.9); transform: scale(0.9,0.9); z-index: 3; opacity: 0.8; }		
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(1) { -ms-transform: translate(10%,0) scale(1,1); -webkit-transform: translate(10%,0) scale(1,1); transform: translate(10%,0) scale(1,1); z-index: 4; opacity: 1; }
							.TS_Portfolio_GAA_inner-content-image:hover .TS_Portfolio_GAA_inner-content-image-hover { opacity: 1; -ms-transform: translate(10%,0) scale(1,1); -webkit-transform: translate(10%,0) scale(1,1); transform: translate(10%,0) scale(1,1); z-index: 10; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(1) { opacity: 1; z-index: 9; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(2) { opacity: 1; z-index: 8; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(3) { opacity: 1; z-index: 7; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(4) { opacity: 1; z-index: 6; }			
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(4) { -ms-transform: translate(-20%,0) scale(0.7,0.7); -webkit-transform: translate(-20%,0) scale(0.7,0.7); transform: translate(-20%,0) scale(0.7,0.7); }			
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(3) { -ms-transform: translate(-10%,0) scale(0.8,0.8);	-webkit-transform: translate(-10%,0) scale(0.8,0.8); transform: translate(-10%,0) scale(0.8,0.8); }		
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(2) { -ms-transform: scale(0.9,0.9); -webkit-transform: scale(0.9,0.9); transform: scale(0.9,0.9); }		
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(1) { -ms-transform: translate(10%,0) scale(1,1); -webkit-transform: translate(10%,0) scale(1,1); transform: translate(10%,0) scale(1,1); }						
						<?php } else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_01 == 'Effect 3'){ ?>
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(8) { -ms-transform: translate(-70%,-80%) rotate(-70deg) scale(0.2,0.2); -webkit-transform: translate(-70%,-80%) rotate(-70deg) scale(0.2,0.2); transform: translate(-70%,-80%) rotate(-70deg) scale(0.2,0.2); z-index: 1; opacity: 0.3; }		
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(7) { -ms-transform: translate(-60%,-70%) rotate(-60deg) scale(0.3,0.3); -webkit-transform: translate(-60%,-70%) rotate(-60deg) scale(0.3,0.3); transform: translate(-60%,-70%) rotate(-60deg) scale(0.3,0.3); z-index: 1; opacity: 0.4; }	
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(6) { -ms-transform: translate(-50%,-60%) rotate(-50deg) scale(0.4,0.4); -webkit-transform: translate(-50%,-60%) rotate(-50deg) scale(0.4,0.4); transform: translate(-50%,-60%) rotate(-50deg) scale(0.4,0.4); z-index: 1; opacity: 0.5; }			
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(5) { -ms-transform: translate(-40%,-50%) rotate(-40deg) scale(0.5,0.5); -webkit-transform: translate(-40%,-50%) rotate(-40deg) scale(0.5,0.5); transform: translate(-40%,-50%) rotate(-40deg) scale(0.5,0.5); z-index: 1; opacity: 0.6; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(4) { -ms-transform: translate(-30%,-40%) rotate(-30deg) scale(0.6,0.6); -webkit-transform: translate(-30%,-40%) rotate(-30deg) scale(0.6,0.6); transform: translate(-30%,-40%) rotate(-30deg) scale(0.6,0.6); z-index: 1; opacity: 0.7; }	
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(3) { -ms-transform: translate(-20%,-30%) rotate(-20deg) scale(0.7,0.7); -webkit-transform: translate(-20%,-30%) rotate(-20deg) scale(0.7,0.7); transform: translate(-20%,-30%) rotate(-20deg) scale(0.7,0.7); z-index: 2; opacity: 0.8; }		
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(2) { -ms-transform: translate(-10%,-20%) rotate(-10deg) scale(0.8,0.8); -webkit-transform: translate(-10%,-20%) rotate(-10deg) scale(0.8,0.8); transform: translate(-10%,-20%) rotate(-10deg) scale(0.8,0.8); z-index: 3; opacity: 0.9; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(1) { -ms-transform: scale(0.9,0.9); -webkit-transform: scale(0.9,0.9); transform: scale(0.9,0.9); z-index: 4; opacity: 1; }
							.TS_Portfolio_GAA_inner-content-image:hover .TS_Portfolio_GAA_inner-content-image-hover { opacity: 1; -ms-transform: scale(1.1,1.1); -webkit-transform: scale(1.1,1.1); transform: scale(1.1,1.1); z-index: 10; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(1) { opacity: 1; z-index: 9; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(2) { opacity: 1; z-index: 8; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(3) { opacity: 1; z-index: 7; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(4) { opacity: 1; z-index: 6; }			
							.TS_Portfolio_GAA_inner-content-image img:nth-child(5) { opacity: 1; z-index: 5; }									
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(5) { -ms-transform: translate(-40%,-50%) rotate(-40deg) scale(0.7,0.7); -webkit-transform: translate(-40%,-50%) rotate(-40deg) scale(0.7,0.7); transform: translate(-40%,-50%) rotate(-40deg) scale(0.7,0.7); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(4) { -ms-transform: translate(-30%,-40%) rotate(-30deg) scale(0.8,0.8); -webkit-transform: translate(-30%,-40%) rotate(-30deg) scale(0.8,0.8); transform: translate(-30%,-40%) rotate(-30deg) scale(0.8,0.8); }	
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(3) { -ms-transform: translate(-20%,-30%) rotate(-20deg) scale(0.9,0.9); -webkit-transform: translate(-20%,-30%) rotate(-20deg) scale(0.9,0.9); transform: translate(-20%,-30%) rotate(-20deg) scale(0.9,0.9); }		
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(2) { -ms-transform: translate(-10%,-20%) rotate(-10deg); -webkit-transform: translate(-10%,-20%) rotate(-10deg); transform: translate(-10%,-20%) rotate(-10deg); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(1) { -ms-transform: scale(1.1,1.1); -webkit-transform: scale(1.1,1.1); transform: scale(1.1,1.1); }						
						<?php } else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_01 == 'Effect 4'){ ?>
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(9) { -ms-transform: translate(20%,-80%) scale(0.2,0.2) rotate(-80deg); -webkit-transform: translate(20%,-80%) scale(0.4,0.2) rotate(-80deg); transform: translate(20%,-80%) scale(0.2,0.2) rotate(-80deg); z-index: 1; opacity: 0.6; }	
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(7) { -ms-transform: translate(30%,-60%) scale(0.4,0.4) rotate(-60deg); -webkit-transform: translate(30%,-60%) scale(0.4,0.4) rotate(-60deg); transform: translate(30%,-60%) scale(0.4,0.4) rotate(-60deg); z-index: 2;	opacity: 0.7; }	
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(5) { -ms-transform: translate(40%,-40%) scale(0.6,0.6) rotate(-40deg); -webkit-transform: translate(40%,-40%) scale(0.6,0.6) rotate(-40deg); transform: translate(40%,-40%) scale(0.6,0.6) rotate(-40deg); z-index: 3;	opacity: 0.8; }	
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(3) { -ms-transform: translate(50%,-20%) scale(0.8,0.8) rotate(-20deg); -webkit-transform: translate(50%,-20%) scale(0.8,0.8) rotate(-20deg); transform: translate(50%,-20%) scale(0.8,0.8) rotate(-20deg); z-index: 4; opacity: 0.9; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(1) { -ms-transform: translate(0,20%) scale(1.1,1.1); -webkit-transform: translate(0,20%) scale(1.1,1.1); transform: translate(0,20%) scale(1.1,1.1); z-index: 5; opacity: 1; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(2) { -ms-transform: translate(-50%,-20%) scale(0.8,0.8) rotate(20deg); -webkit-transform: translate(-50%,-20%) scale(0.8,0.8) rotate(20deg); transform: translate(-50%,-20%) scale(0.8,0.8) rotate(20deg); z-index: 4;	opacity: 0.9; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(4) { -ms-transform: translate(-40%,-40%) scale(0.6,0.6) rotate(40deg); -webkit-transform: translate(-40%,-40%) scale(0.6,0.6) rotate(40deg); transform: translate(-40%,-40%) scale(0.6,0.6) rotate(40deg); z-index: 3; opacity: 0.8; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(8) { -ms-transform: translate(-20%,-80%) scale(0.2,0.2) rotate(80deg); -webkit-transform: translate(-20%,-80%) scale(0.4,0.2) rotate(80deg); transform: translate(-20%,-80%) scale(0.2,0.2) rotate(80deg); z-index: 1; opacity: 0.6; }			
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(6) { -ms-transform: translate(-30%,-60%) scale(0.4,0.4) rotate(60deg); -webkit-transform: translate(-30%,-60%) scale(0.4,0.4) rotate(60deg); transform: translate(-30%,-60%) scale(0.4,0.4) rotate(60deg); z-index: 2; opacity: 0.7; }			
							.TS_Portfolio_GAA_inner-content-image:hover .TS_Portfolio_GAA_inner-content-image-hover { opacity: 1; -ms-transform: translate(0,20%) scale(1.1,1.1); -webkit-transform: translate(0,20%) scale(1.1,1.1); transform: translate(0,20%) scale(1.1,1.1); z-index: 10; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(1) { opacity: 1; z-index: 9; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(2) { opacity: 1; z-index: 8; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(3) { opacity: 1; z-index: 8; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(4) { opacity: 1; z-index: 7; }			
							.TS_Portfolio_GAA_inner-content-image img:nth-child(5) { opacity: 1; z-index: 7; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(6) { opacity: 1; z-index: 6; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(7) { opacity: 1; z-index: 6; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(8) { opacity: 1; z-index: 5; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(9) { opacity: 1; z-index: 5; }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(9) { -ms-transform: translate(20%,-80%) scale(0.2,0.2) rotate(-80deg); -webkit-transform: translate(20%,-80%) scale(0.4,0.2) rotate(-80deg); transform: translate(20%,-80%) scale(0.2,0.2) rotate(-80deg); }	
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(8) { -ms-transform: translate(-20%,-80%) scale(0.2,0.2) rotate(80deg); -webkit-transform: translate(-20%,-80%) scale(0.4,0.2) rotate(80deg); transform: translate(-20%,-80%) scale(0.2,0.2) rotate(80deg); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(7) { -ms-transform: translate(30%,-60%) scale(0.4,0.4) rotate(-60deg); -webkit-transform: translate(30%,-60%) scale(0.4,0.4) rotate(-60deg); transform: translate(30%,-60%) scale(0.4,0.4) rotate(-60deg); }			
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(6) { -ms-transform: translate(-30%,-60%) scale(0.4,0.4) rotate(60deg); -webkit-transform: translate(-30%,-60%) scale(0.4,0.4) rotate(60deg); transform: translate(-30%,-60%) scale(0.4,0.4) rotate(60deg); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(5) { -ms-transform: translate(40%,-40%) scale(0.6,0.6) rotate(-40deg); -webkit-transform: translate(40%,-40%) scale(0.6,0.6) rotate(-40deg); transform: translate(40%,-40%) scale(0.6,0.6) rotate(-40deg); }				
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(4) { -ms-transform: translate(-40%,-40%) scale(0.6,0.6) rotate(40deg); -webkit-transform: translate(-40%,-40%) scale(0.6,0.6) rotate(40deg); transform: translate(-40%,-40%) scale(0.6,0.6) rotate(40deg); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(3) { -ms-transform: translate(50%,-20%) scale(0.8,0.8) rotate(-20deg); -webkit-transform: translate(50%,-20%) scale(0.8,0.8) rotate(-20deg); transform: translate(50%,-20%) scale(0.8,0.8) rotate(-20deg); }	
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(2) { -ms-transform: translate(-50%,-20%) scale(0.8,0.8) rotate(20deg); -webkit-transform: translate(-50%,-20%) scale(0.8,0.8) rotate(20deg); transform: translate(-50%,-20%) scale(0.8,0.8) rotate(20deg); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(1) { -ms-transform: translate(0,20%) scale(1.1,1.1); -webkit-transform: translate(0,20%) scale(1.1,1.1); transform: translate(0,20%) scale(1.1,1.1); }							
						<?php } else if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_01 == 'Effect 5'){ ?>
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(8) { -ms-transform: translate(45%,60%) scale(0.1,0.1); -webkit-transform: translate(45%,60%) scale(0.1,0.1); transform: translate(45%,60%) scale(0.1,0.1); z-index: 1; opacity: 1; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(7) { -ms-transform: translate(30%,60%) scale(0.1,0.1); -webkit-transform: translate(30%,60%) scale(0.1,0.1); transform: translate(30%,60%) scale(0.1,0.1); z-index: 1; opacity: 1; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(6) { -ms-transform: translate(15%,60%) scale(0.1,0.1); -webkit-transform: translate(15%,60%) scale(0.1,0.1); transform: translate(15%,60%) scale(0.1,0.1); z-index: 1; opacity: 1; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(5) { -ms-transform: translate(0,60%) scale(0.1,0.1); -webkit-transform: translate(0,60%) scale(0.1,0.1); transform: translate(0,60%) scale(0.1,0.1); z-index: 1; opacity: 1; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(4) { -ms-transform: translate(-15%,60%) scale(0.1,0.1); -webkit-transform: translate(-15%,60%) scale(0.1,0.1); transform: translate(-15%,60%) scale(0.1,0.1); z-index: 1; opacity: 1; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(3) { -ms-transform: translate(-30%,60%) scale(0.1,0.1); -webkit-transform: translate(-30%,60%) scale(0.1,0.1); transform: translate(-30%,60%) scale(0.1,0.1); z-index: 1; opacity: 1; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(2) { -ms-transform: translate(-45%,60%) scale(0.1,0.1); -webkit-transform: translate(-45%,60%) scale(0.1,0.1); transform: translate(-45%,60%) scale(0.1,0.1); z-index: 1; opacity: 1; }
							#TS_Portfolio_GAA_fullscreen-image img:nth-child(1) { -ms-transform: translate(0,0) scale(1,1); -webkit-transform: translate(0,0) scale(1,1); transform: translate(0,0) scale(1,1); z-index: 1; opacity: 1; }
							.TS_Portfolio_GAA_inner-content-image:hover .TS_Portfolio_GAA_inner-content-image-hover { opacity: 1; -ms-transform: translate(0,0) scale(1,1); -webkit-transform: translate(0,0) scale(1,1); transform: translate(0,0) scale(1,1); z-index: 10; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(1) { opacity: 1; z-index: 9; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(2) { opacity: 1; z-index: 8; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(3) { opacity: 1; z-index: 8; }
							.TS_Portfolio_GAA_inner-content-image img:nth-child(4) { opacity: 1; z-index: 8; }			
							.TS_Portfolio_GAA_inner-content-image img:nth-child(5) { opacity: 1; z-index: 8; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(6) { opacity: 1; z-index: 8; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(7) { opacity: 1; z-index: 8; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(8) { opacity: 1; z-index: 8; }	
							.TS_Portfolio_GAA_inner-content-image img:nth-child(9) { opacity: 1; z-index: 8; }	
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(1) { -ms-transform: translate(45%,60%) scale(0.1,0.1); -webkit-transform: translate(45%,60%) scale(0.1,0.1); transform: translate(45%,60%) scale(0.1,0.1); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(2) { -ms-transform: translate(30%,60%) scale(0.1,0.1); -webkit-transform: translate(30%,60%) scale(0.1,0.1); transform: translate(30%,60%) scale(0.1,0.1); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(3) { -ms-transform: translate(15%,60%) scale(0.1,0.1); -webkit-transform: translate(15%,60%) scale(0.1,0.1); transform: translate(15%,60%) scale(0.1,0.1); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(4) { -ms-transform: translate(0,60%) scale(0.1,0.1); -webkit-transform: translate(0,60%) scale(0.1,0.1); transform: translate(0,60%) scale(0.1,0.1); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(5) { -ms-transform: translate(-15%,60%) scale(0.1,0.1); -webkit-transform: translate(-15%,60%) scale(0.1,0.1); transform: translate(-15%,60%) scale(0.1,0.1); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(6) { -ms-transform: translate(-30%,60%) scale(0.1,0.1); -webkit-transform: translate(-30%,60%) scale(0.1,0.1); transform: translate(-30%,60%) scale(0.1,0.1); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(7) { -ms-transform: translate(-45%,60%) scale(0.1,0.1); -webkit-transform: translate(-45%,60%) scale(0.1,0.1); transform: translate(-45%,60%) scale(0.1,0.1); }
							.TS_Portfolio_GAA_inner-content-image:hover img:nth-child(8) { -ms-transform: translate(0,0) scale(1,1); -webkit-transform: translate(0,0) scale(1,1); transform: translate(0,0) scale(1,1); }	
						<?php }?>
						@media screen and (max-width: 600px)
						{
							.TS_Portfolio_GAA_inner-content-text, .TS_Portfolio_GAA_inner-content-image { width: 100%; }
						}
					</style>							
					<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_01 == 'Effect 5'){ ?>
						<script src="<?php echo plugins_url('../JS/Gallery-Album-Animation-2.js',__FILE__);?>" type="text/javascript"></script>
					<?php } else { ?>
						<script src="<?php echo plugins_url('../JS/Gallery-Album-Animation-1.js',__FILE__);?>" type="text/javascript"></script>
					<?php }?>
					<div id="TS_Portfolio_GAA_fullscreen">
						<div id="TS_Portfolio_GAA_fullscreen-inner">
							<div id="TS_Portfolio_GAA_fullscreen-inner-left" class="TS_Portfolio_GAA_fullscreen-inner-button1">
								<span class="totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_27;?>-left"></span>
							</div>
							<div id="TS_Portfolio_GAA_fullscreen-inner-right" class="TS_Portfolio_GAA_fullscreen-inner-button1">
								<span class="totalsoft totalsoft-<?php echo $TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_27;?>-right"></span>
							</div>
							<div id="TS_Portfolio_GAA_fullscreen-inner-close" class="TS_Portfolio_GAA_fullscreen-inner-button2">
								<span class="totalsoft totalsoft-close"></span>
							</div>
							<div id="TS_Portfolio_GAA_fullscreen-image"></div>
						</div>
					</div>
					<div id="TS_Portfolio_GAA">
						<div id="TS_Portfolio_GAA_inner">
							<?php for($i=0;$i<$TotalSoftPortfolioManager[0]->TotalSoftPortfolio_AlbumCount;$i++){
			            		$TSoftPort_ContPop_Images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftPortfolio_IA=%s order by id", $TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle));
			            		?>
			            		<div class="TS_Portfolio_GAA_inner-content">
			            			<div class="TS_Portfolio_GAA_inner-content_titlea">
			            				<?php echo html_entity_decode($TotalSoftPortfolioAlbums[$i]->TotalSoftPortfolio_ATitle);?>
			            			</div>

				            		<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_02 == 'Position 1') { ?>
				            			<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_03 == 'true') { ?>
				            				<?php if($i % 2 != 0){ ?>
					            				<div class="TS_Portfolio_GAA_inner-content-text" style="margin-right:1%;">
												  	<?php echo html_entity_decode($TSoftPort_ContPop_Images[0]->TotalSoftPortfolio_IDesc);?>
												</div>
					            			<?php } ?>
											<div class="TS_Portfolio_GAA_inner-content-image">
												<?php for($j=0;$j<count($TSoftPort_ContPop_Images);$j++){ ?>
													<img src="<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IURL;?>"/>
												<?php } ?>
												<div class="TS_Portfolio_GAA_inner-content-image-hover">
													<div class="TS_Portfolio_GAA_inner-content-image-hover-cercle">
														<span class="TS_Portfolio_GAA_IFOP totalsoft totalsoft-search"></span>
													</div>
												</div>								
											</div>
											<?php if($i % 2 == 0){ ?>
					            				<div class="TS_Portfolio_GAA_inner-content-text" style="margin-left:1%;">
												  	<?php echo html_entity_decode($TSoftPort_ContPop_Images[0]->TotalSoftPortfolio_IDesc);?>
												</div>
					            			<?php } ?>
				            			<?php } else { ?>
				            				<?php if($i % 2 == 0){ ?>
					            				<div class="TS_Portfolio_GAA_inner-content-text" style="margin-right:1%;">
												  	<?php echo html_entity_decode($TSoftPort_ContPop_Images[0]->TotalSoftPortfolio_IDesc);?>
												</div>
					            			<?php } ?>
											<div class="TS_Portfolio_GAA_inner-content-image">
												<?php for($j=0;$j<count($TSoftPort_ContPop_Images);$j++){ ?>
													<img src="<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IURL;?>"/>
												<?php } ?>
												<div class="TS_Portfolio_GAA_inner-content-image-hover">
													<div class="TS_Portfolio_GAA_inner-content-image-hover-cercle">
														<span class="TS_Portfolio_GAA_IFOP totalsoft totalsoft-search"></span>
													</div>
												</div>								
											</div>
											<?php if($i % 2 != 0){ ?>
					            				<div class="TS_Portfolio_GAA_inner-content-text" style="margin-left:1%;">
												  	<?php echo html_entity_decode($TSoftPort_ContPop_Images[0]->TotalSoftPortfolio_IDesc);?>
												</div>
					            			<?php } ?>										
			            				<?php }?>
				            		<?php } else { ?>
				            			<?php if($TotalSoftPortfolioOption[0]->TotalSoft_Port_GAA_03 == 'true') { ?>
				            				<div class="TS_Portfolio_GAA_inner-content-text">
											  	<?php echo html_entity_decode($TSoftPort_ContPop_Images[0]->TotalSoftPortfolio_IDesc);?>
											</div>
											<div class="TS_Portfolio_GAA_inner-content-image">
												<?php for($j=0;$j<count($TSoftPort_ContPop_Images);$j++){ ?>
													<img src="<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IURL;?>"/>
												<?php } ?>
												<div class="TS_Portfolio_GAA_inner-content-image-hover">
													<div class="TS_Portfolio_GAA_inner-content-image-hover-cercle">
														<span class="TS_Portfolio_GAA_IFOP totalsoft totalsoft-search"></span>
													</div>
												</div>								
											</div>
				            			<?php } else { ?>
											<div class="TS_Portfolio_GAA_inner-content-image">
												<?php for($j=0;$j<count($TSoftPort_ContPop_Images);$j++){ ?>
													<img src="<?php echo $TSoftPort_ContPop_Images[$j]->TotalSoftPortfolio_IURL;?>"/>
												<?php } ?>
												<div class="TS_Portfolio_GAA_inner-content-image-hover">
													<div class="TS_Portfolio_GAA_inner-content-image-hover-cercle">
														<span class="TS_Portfolio_GAA_IFOP totalsoft totalsoft-search"></span>
													</div>
												</div>								
											</div>
				            				<div class="TS_Portfolio_GAA_inner-content-text">
											  	<?php echo html_entity_decode($TSoftPort_ContPop_Images[0]->TotalSoftPortfolio_IDesc);?>
											</div>
			            				<?php }?>
			            			<?php }?>
								</div>
							<?php } ?>							
						</div>
					</div>
	 			<?php }
 		 	echo $after_widget;
 		}
	}
?>