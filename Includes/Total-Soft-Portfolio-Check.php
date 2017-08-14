<?php
	global $wpdb;

	$table_name   = $wpdb->prefix . "totalsoft_fonts";
	$table_name1  = $wpdb->prefix . "totalsoft_portfolio_settings";
	$table_name2  = $wpdb->prefix . "totalsoft_portfolio_dbt";
	$table_name3  = $wpdb->prefix . "totalsoft_portfolio_id";
	$table_name4  = $wpdb->prefix . "totalsoft_portfolio_manager";
	$table_name5  = $wpdb->prefix . "totalsoft_portfolio_albums";
	$table_name6  = $wpdb->prefix . "totalsoft_portfolio_images";
	$table_name7  = $wpdb->prefix . "totalsoft_portfolio_Elgrid";
	$table_name8  = $wpdb->prefix . "totalsoft_portfolio_Filgrid";
	$table_name9  = $wpdb->prefix . "totalsoft_portfolio_CPopup";
	$table_name10 = $wpdb->prefix . "totalsoft_portfolio_SlPort";

	$Total_Soft_Portfolio_Desc=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id>%d", 0));

	for($i=0; $i<count($Total_Soft_Portfolio_Desc); $i++)
	{
		if(strlen($Total_Soft_Portfolio_Desc[$i]->TotalSoftPortfolio_IDesc)>0 && strpos($Total_Soft_Portfolio_Desc[$i]->TotalSoftPortfolio_IDesc, "&lt;/p&gt;")<=0)
		{
			$Portfolio_Params = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id = %d", $Total_Soft_Portfolio_Desc[$i]->Portfolio_ID));
			$Portfolio_Param1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE TotalSoftPortfolio_SetName = %s", $Portfolio_Params[0]->TotalSoftPortfolio_Option));


			if($Portfolio_Param1[0]->TotalSoftPortfolio_SetType=='Total Soft Portfolio' || $Portfolio_Param1[0]->TotalSoftPortfolio_SetType=='Gallery Portfolio/Content Popup' || $Portfolio_Param1[0]->TotalSoftPortfolio_SetType=='Slider Portfolio')
			{
				$New_Portfolio_Desc = str_replace("\&","&", esc_html('<p>' . $Total_Soft_Portfolio_Desc[$i]->TotalSoftPortfolio_IDesc . '</p>'));
			}
			else if($Portfolio_Param1[0]->TotalSoftPortfolio_SetType=='Elastic Grid')
			{
				$TotalSoft_Portfolio_Opt=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE TotalSoftPortfolio_SetID = %s", $Portfolio_Param1[0]->id));
				$New_Portfolio_Desc = str_replace("\&","&", esc_html('<p><span style="color: ' . $TotalSoft_Portfolio_Opt[0]->TotalSoft_ElG_Pop_DC . '; font-size: ' . $TotalSoft_Portfolio_Opt[0]->TotalSoft_ElG_Pop_DFS . 'px; font-family: ' . $TotalSoft_Portfolio_Opt[0]->TotalSoft_ElG_Pop_DFF . ';">' . $Total_Soft_Portfolio_Desc[$i]->TotalSoftPortfolio_IDesc . '</span></p>'));
			}
			else if($Portfolio_Param1[0]->TotalSoftPortfolio_SetType=='Filterable Grid')
			{
				$TotalSoft_Portfolio_Opt=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoftPortfolio_SetID = %s", $Portfolio_Param1[0]->id));
				$New_Portfolio_Desc = str_replace("\&","&", esc_html('<p><span style="color: ' . $TotalSoft_Portfolio_Opt[0]->TotalSoft_FG_DC . '; font-size: ' . $TotalSoft_Portfolio_Opt[0]->TotalSoft_FG_DFS . 'px; font-family: ' . $TotalSoft_Portfolio_Opt[0]->TotalSoft_FG_DFF . ';">' . $Total_Soft_Portfolio_Desc[$i]->TotalSoftPortfolio_IDesc . '</span></p>'));
			}

			$wpdb->query($wpdb->prepare("UPDATE $table_name6 set TotalSoftPortfolio_IDesc=%s WHERE id=%d", $New_Portfolio_Desc, $Total_Soft_Portfolio_Desc[$i]->id));
		}
	}
?>