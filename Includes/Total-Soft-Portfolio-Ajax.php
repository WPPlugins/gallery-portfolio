<?php 
	//Admin menu
	add_action( 'wp_ajax_TotalSoftPortfolio_Del', 'TotalSoftPortfolio_Del_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Del', 'TotalSoftPortfolio_Del_Callback' );

	function TotalSoftPortfolio_Del_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE id=%d", $Portfolio_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name5 WHERE Portfolio_ID=%s", $Portfolio_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name6 WHERE Portfolio_ID=%s", $Portfolio_ID));
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolio_Edit', 'TotalSoftPortfolio_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Edit', 'TotalSoftPortfolio_Edit_Callback' );

	function TotalSoftPortfolio_Edit_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$Total_Soft_PortfolioManager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%s", $Portfolio_ID));

		print_r($Total_Soft_PortfolioManager);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolio_Edit_Album', 'TotalSoftPortfolio_Edit_Album_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Edit_Album', 'TotalSoftPortfolio_Edit_Album_Callback' );

	function TotalSoftPortfolio_Edit_Album_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$Total_Soft_PortfolioAlbums=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE Portfolio_ID=%s order by id", $Portfolio_ID));

		for($i = 0; $i < count($Total_Soft_PortfolioAlbums); $i++)
		{
			$Total_Soft_PortfolioAlbums[$i]->TotalSoftPortfolio_ATitle = html_entity_decode($Total_Soft_PortfolioAlbums[$i]->TotalSoftPortfolio_ATitle);
		}
		
		print_r($Total_Soft_PortfolioAlbums);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolio_Edit_Images', 'TotalSoftPortfolio_Edit_Images_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Edit_Images', 'TotalSoftPortfolio_Edit_Images_Callback' );

	function TotalSoftPortfolio_Edit_Images_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$Total_Soft_PortfolioImages=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Portfolio_ID=%s order by id", $Portfolio_ID));

		for($i = 0; $i < count($Total_Soft_PortfolioImages); $i++)
		{
			$Total_Soft_PortfolioImages[$i]->TotalSoftPortfolio_IT = html_entity_decode($Total_Soft_PortfolioImages[$i]->TotalSoftPortfolio_IT);
			$Total_Soft_PortfolioImages[$i]->TotalSoftPortfolio_IDesc = html_entity_decode($Total_Soft_PortfolioImages[$i]->TotalSoftPortfolio_IDesc);
		}
		print_r($Total_Soft_PortfolioImages);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolio_Clone', 'TotalSoftPortfolio_Clone_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Clone', 'TotalSoftPortfolio_Clone_Callback' );

	function TotalSoftPortfolio_Clone_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name3 = $wpdb->prefix . "totalsoft_portfolio_id";
		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$Total_Soft_PortfolioManager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%s", $Portfolio_ID));
		$Total_Soft_PortfolioAlbums = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE Portfolio_ID=%s order by id", $Portfolio_ID));
		$Total_Soft_PortfolioImages = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Portfolio_ID=%s order by id", $Portfolio_ID));

		$New_Portfolio_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d order by id desc limit 1",0));
		$New_Total_SoftPortID=$New_Portfolio_ID[0]->Portfolio_ID + 1;
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Portfolio_ID) VALUES (%d, %s)", '', $New_Total_SoftPortID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftPortfolio_Title, TotalSoftPortfolio_Option, TotalSoftPortfolio_AlbumCount) VALUES (%d, %s, %s, %s)", '', $Total_Soft_PortfolioManager[0]->TotalSoftPortfolio_Title, $Total_Soft_PortfolioManager[0]->TotalSoftPortfolio_Option, $Total_Soft_PortfolioManager[0]->TotalSoftPortfolio_AlbumCount));

		for($i = 0; $i < $Total_Soft_PortfolioManager[0]->TotalSoftPortfolio_AlbumCount; $i++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoftPortfolio_ATitle, Portfolio_ID) VALUES (%d, %s, %s)", '', $Total_Soft_PortfolioAlbums[$i]->TotalSoftPortfolio_ATitle, $New_Total_SoftPortID));
		}
		for($j = 0; $j < count($Total_Soft_PortfolioImages); $j++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, TotalSoftPortfolio_IT, TotalSoftPortfolio_IA, TotalSoftPortfolio_IURL, TotalSoftPortfolio_IDesc, TotalSoftPortfolio_ILink, TotalSoftPortfolio_IONT, Portfolio_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s)", '', $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IT, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IA, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IURL, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IDesc, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_ILink, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IONT, $New_Total_SoftPortID));
		}
		die();
	}
	//General Options
	add_action( 'wp_ajax_TotalSoftPortfolioOpt_Edit', 'TotalSoftPortfolioOpt_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolioOpt_Edit', 'TotalSoftPortfolioOpt_Edit_Callback' );

	function TotalSoftPortfolioOpt_Edit_Callback()
	{
		$Portfolio_OptID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1  = $wpdb->prefix . "totalsoft_portfolio_settings";
		$table_name2  = $wpdb->prefix . "totalsoft_portfolio_dbt";
		$table_name7  = $wpdb->prefix . "totalsoft_portfolio_Elgrid";
		$table_name8  = $wpdb->prefix . "totalsoft_portfolio_Filgrid";
		$table_name9  = $wpdb->prefix . "totalsoft_portfolio_CPopup";
		$table_name10 = $wpdb->prefix . "totalsoft_portfolio_SlPort";
		$table_name11 = $wpdb->prefix . "totalsoft_portfolio_GAAnim";

		$Total_Soft_PortfolioName=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Portfolio_OptID));
		if($Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetType=='Total Soft Portfolio')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
		}
		else if($Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetType=='Elastic Grid')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
		}
		else if($Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetType=='Filterable Grid')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
		}
		else if($Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetType=='Gallery Portfolio/Content Popup')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
		}
		else if($Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetType=='Slider Portfolio')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
		}
		else if($Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetType=='Gallery Album Animation')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
		}
		print_r($Total_Soft_PortfolioSet);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolioOpt_Clone', 'TotalSoftPortfolioOpt_Clone_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolioOpt_Clone', 'TotalSoftPortfolioOpt_Clone_Callback' );

	function TotalSoftPortfolioOpt_Clone_Callback()
	{
		$Portfolio_OptID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1  = $wpdb->prefix . "totalsoft_portfolio_settings";
		$table_name2  = $wpdb->prefix . "totalsoft_portfolio_dbt";
		$table_name7  = $wpdb->prefix . "totalsoft_portfolio_Elgrid";
		$table_name8  = $wpdb->prefix . "totalsoft_portfolio_Filgrid";
		$table_name9  = $wpdb->prefix . "totalsoft_portfolio_CPopup";
		$table_name10 = $wpdb->prefix . "totalsoft_portfolio_SlPort";
		$table_name11 = $wpdb->prefix . "totalsoft_portfolio_GAAnim";

		$Total_Soft_PortfolioName=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Portfolio_OptID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType) VALUES (%d, %s, %s)", '', $Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetType));

		$TotalSoftPortfolio_SetNameID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d order by id desc limit 1", 0));


		if($TotalSoftPortfolio_SetNameID[0]->TotalSoftPortfolio_SetType=='Total Soft Portfolio')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, TotalSoftPortfolio_SetID, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType, TotalSoftPortfolio_ContH, TotalSoftPortfolio_BgImage, TotalSoftPortfolio_IW, TotalSoftPortfolio_IH, TotalSoftPortfolio_IBW, TotalSoftPortfolio_IBS, TotalSoftPortfolio_IBC, TotalSoftPortfolio_IBR, TotalSoftPortfolio_NavS, TotalSoftPortfolio_NavRad, TotalSoftPortfolio_NavCol, TotalSoftPortfolio_NavCurCol, TotalSoftPortfolio_NavHovCol, TotalSoftPortfolio_ArrowType, TotalSoftPortfolio_ArrowCol, TotalSoftPortfolio_ArrowSize, TotalSoftPortfolio_ArrowUp, TotalSoftPortfolio_ArrowLeft, TotalSoftPortfolio_ArrowDown, TotalSoftPortfolio_ArrowRight) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_SetNameID[0]->id, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetType, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_ContH, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_BgImage, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_IW, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_IH, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_IBW, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_IBS, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_IBC, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_IBR, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_NavS, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_NavRad, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_NavCol, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_NavCurCol, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_NavHovCol, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_ArrowType, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_ArrowCol, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_ArrowSize, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_ArrowUp, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_ArrowLeft, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_ArrowDown, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_ArrowRight));
		}
		else if($TotalSoftPortfolio_SetNameID[0]->TotalSoftPortfolio_SetType=='Elastic Grid')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, TotalSoftPortfolio_SetID, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType, TotalSoft_ElG_TSA, TotalSoft_ElG_SM, TotalSoft_ElG_FE, TotalSoft_ElG_HE, TotalSoft_ElG_HD, TotalSoft_ElG_HI, TotalSoft_ElG_ES, TotalSoft_ElG_EH, TotalSoft_ElG_Nav_MBgC, TotalSoft_ElG_Nav_CurBgC, TotalSoft_ElG_Nav_CurC, TotalSoft_ElG_Nav_BgC, TotalSoft_ElG_Nav_C, TotalSoft_ElG_Nav_FS, TotalSoft_ElG_Nav_FF, TotalSoft_ElG_Nav_HBgC, TotalSoft_ElG_Nav_HC, TotalSoft_ElG_LAM_W, TotalSoft_ElG_LAM_S, TotalSoft_ElG_LAM_C, TotalSoft_ElG_Im_W, TotalSoft_ElG_Im_H, TotalSoft_ElG_Im_BR, TotalSoft_ElG_Im_BS, TotalSoft_ElG_Im_HBgC, TotalSoft_ElG_Im_HO, TotalSoft_ElG_Im_TC, TotalSoft_ElG_Im_TFS, TotalSoft_ElG_Im_TFF, TotalSoft_ElG_LAT_W, TotalSoft_ElG_LAT_S, TotalSoft_ElG_LAT_C, TotalSoft_ElG_Pop_BgC, TotalSoft_ElG_Pop_TC, TotalSoft_ElG_Pop_TFS, TotalSoft_ElG_Pop_TFF, TotalSoft_ElG_Pop_DC, TotalSoft_ElG_Pop_DFS, TotalSoft_ElG_Pop_DFF, TotalSoft_ElG_LIP_BgC, TotalSoft_ElG_LIP_C, TotalSoft_ElG_LIP_FS, TotalSoft_ElG_LIP_FF, TotalSoft_ElG_LIP_BW, TotalSoft_ElG_LIP_BS, TotalSoft_ElG_LIP_BC, TotalSoft_ElG_LIP_BR, TotalSoft_ElG_LIP_HBgC, TotalSoft_ElG_LIP_HC, TotalSoft_ElG_LBT_W, TotalSoft_ElG_LBT_S, TotalSoft_ElG_LBT_C, TotalSoft_ElG_T_BgC, TotalSoft_ElG_T_BSC, TotalSoft_ElG_T_IH, TotalSoft_ElG_T_BW, TotalSoft_ElG_T_BS, TotalSoft_ElG_T_BC, TotalSoft_ElG_T_BR, TotalSoft_ElG_T_CurBC, TotalSoft_ElG_I_Type, TotalSoft_ElG_I_Left, TotalSoft_ElG_I_Right, TotalSoft_ElG_I_S, TotalSoft_ElG_I_C, TotalSoft_ElG_I_HO, TotalSoft_ElG_CI_Type, TotalSoft_ElG_CI_Icon, TotalSoft_ElG_CI_S, TotalSoft_ElG_CI_C, TotalSoft_ElG_CI_HO) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_SetNameID[0]->id, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetType, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_TSA, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_SM, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_FE, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_HE, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_HD, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_HI, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_ES, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_EH, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_MBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_CurBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_CurC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_C, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_FS, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_FF, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_HBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Nav_HC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LAM_W, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LAM_S, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LAM_C, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_W, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_H, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_BR, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_BS, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_HBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_HO, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_TC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_TFS, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Im_TFF, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LAT_W, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LAT_S, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LAT_C, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Pop_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Pop_TC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Pop_TFS, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Pop_TFF, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Pop_DC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Pop_DFS, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_Pop_DFF, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_C, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_FS, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_FF, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_BW, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_BS, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_BC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_BR, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_HBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LIP_HC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LBT_W, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LBT_S, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_LBT_C, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_T_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_T_BSC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_T_IH, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_T_BW, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_T_BS, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_T_BC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_T_BR, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_T_CurBC, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_I_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_I_Left, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_I_Right, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_I_S, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_I_C, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_I_HO, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_CI_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_CI_Icon, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_CI_S, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_CI_C, $Total_Soft_PortfolioSet[0]->TotalSoft_ElG_CI_HO));
		}
		else if($TotalSoftPortfolio_SetNameID[0]->TotalSoftPortfolio_SetType=='Filterable Grid')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, TotalSoftPortfolio_SetID, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType, TotalSoft_FG_TSA, TotalSoft_FG_Im_BW, TotalSoft_FG_Im_BC, TotalSoft_FG_PBI, TotalSoft_FG_DSI, TotalSoft_FG_Nav_MBgC, TotalSoft_FG_Nav_CurBgC, TotalSoft_FG_Nav_CurC, TotalSoft_FG_Nav_BgC, TotalSoft_FG_Nav_C, TotalSoft_FG_Nav_FS, TotalSoft_FG_Nav_FF, TotalSoft_FG_Nav_HBgC, TotalSoft_FG_Nav_HC, TotalSoft_FG_TC, TotalSoft_FG_TFS, TotalSoft_FG_TFF, TotalSoft_FG_DShow, TotalSoft_FG_DC, TotalSoft_FG_DFS, TotalSoft_FG_DFF, TotalSoft_FG_TDBgC, TotalSoft_FG_TDBW, TotalSoft_FG_TDBC, TotalSoft_FG_LC, TotalSoft_FG_LHC, TotalSoft_FG_Hov_Ov_Bg_Color, TotalSoft_FG_Hov_Ov_Trans, TotalSoft_FG_Hov_Ov_Effect_Type, TotalSoft_FG_Hov_Ov_Transition, TotalSoft_FG_Hov_Line1_Color, TotalSoft_FG_Hov_Line1_Width, TotalSoft_FG_Hov_Line1_Style, TotalSoft_FG_Hov_Line1_Effect_Type, TotalSoft_FG_Hov_Line1_Transition, TotalSoft_FG_Hov_Line2_Color, TotalSoft_FG_Hov_Line2_Width, TotalSoft_FG_Hov_Line2_Style, TotalSoft_FG_Hov_Line2_Effect_Type, TotalSoft_FG_Hov_Line2_Transition, TotalSoft_FG_Hov_Raund_Bg_Color, TotalSoft_FG_Hov_Raund_Transparency, TotalSoft_FG_Hov_Raund_Effect_Type, TotalSoft_FG_Hov_Raund_TRansition, TotalSoft_FG_Pop_Icon_Color, TotalSoft_FG_Pop_Icon_Size, TotalSoft_FG_Pop_Icon_Bg_Color, TotalSoft_FG_Pop_Icon_Border_Color, TotalSoft_FG_Pop_Icon_Border_Size, TotalSoft_FG_Pop_Icon_Hov_Effect_Type, TotalSoft_FG_Pop_Icon_Hov_Transition, TotalSoft_FG_Link_Icon_Border_Color, TotalSoft_FG_Link_Icon_Effect_Type, TotalSoft_FG_Link_Icon_Transition, TotalSoft_FG_Popup_Ov_Bg_Color, TotalSoft_FG_Popup_Ov_Trans, TotalSoft_FG_Popup_Start_Time, TotalSoft_FG_Popup_Stop_Time, TotalSoft_FG_Popup_Time_Effect_Type, TotalSoft_FG_Popup_Effect_Type, TotalSoft_FG_Slider_Img_Width, TotalSoft_FG_Slider_Img_Border_Width, TotalSoft_FG_Car_Slider_Img_Height, TotalSoft_FG_Car_Slider_Img_Border_Width, TotalSoft_FG_Car_Slider_Img_Border_Color, TotalSoft_FG_Slider_SShow_Paause_Time, TotalSoft_FG_Slider_Icon_Color, TotalSoft_FG_Slider_Icon_Size_Time, TotalSoft_FG_Slider_Icon_Type, TotalSoft_FG_Slider_Del_Icon_Size, TotalSoft_FG_Slider_Del_Icon_Color, TotalSoft_FG_Slider_Del_Icon_Type, TotalSoft_FG_Slider_Del_Icon_Bg_Color, TotalSoft_FG_Car_Slider_Icon_Color, TotalSoft_FG_Car_Slider_Icon_Size, TotalSoft_FG_Car_Slider_Icon_Type, TotalSoft_FG_Pop_Title_Font_Size, TotalSoft_FG_Pop_Title_Font_Family, TotalSoft_FG_Pop_Title_Color, TotalSoft_FG_Pop_Title_Bg_Color) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_SetNameID[0]->id, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetType, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_TSA, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Im_BW, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Im_BC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_PBI, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_DSI, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_MBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_CurBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_CurC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_C, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_FS, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_FF, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_HBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Nav_HC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_TC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_TFS, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_TFF, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_DShow, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_DC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_DFS, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_DFF, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_TDBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_TDBW, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_TDBC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_LC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_LHC, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Ov_Bg_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Ov_Trans, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Ov_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Ov_Transition, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line1_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line1_Width, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line1_Style, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line1_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line1_Transition, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line2_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line2_Width, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line2_Style, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line2_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Line2_Transition, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Raund_Bg_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Raund_Transparency, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Raund_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Hov_Raund_TRansition, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Icon_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Icon_Size, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Icon_Bg_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Icon_Border_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Icon_Border_Size, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Icon_Hov_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Icon_Hov_Transition, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Link_Icon_Border_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Link_Icon_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Link_Icon_Transition, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Popup_Ov_Bg_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Popup_Ov_Trans, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Popup_Start_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Popup_Stop_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Popup_Time_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Popup_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Img_Width, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Img_Border_Width, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Car_Slider_Img_Height, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Car_Slider_Img_Border_Width, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Car_Slider_Img_Border_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_SShow_Paause_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Icon_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Icon_Size_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Icon_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Del_Icon_Size, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Del_Icon_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Del_Icon_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Slider_Del_Icon_Bg_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Car_Slider_Icon_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Car_Slider_Icon_Size, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Car_Slider_Icon_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Title_Font_Size, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Title_Font_Family, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Title_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_FG_Pop_Title_Bg_Color));
		}
		else if($TotalSoftPortfolio_SetNameID[0]->TotalSoftPortfolio_SetType=='Gallery Portfolio/Content Popup')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, TotalSoftPortfolio_SetID, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType, TotalSoft_Port_CP_W, TotalSoft_Port_CP_PB, TotalSoft_Port_CP_BoxSh, TotalSoft_Port_CP_BoxShC, TotalSoft_Port_CP_VBW, TotalSoft_Port_CP_VBS, TotalSoft_Port_CP_VBC, TotalSoft_Port_CP_VBR, TotalSoft_Port_CP_Img_Zoom_Type, TotalSoft_Port_CP_Img_Zoom_Effect_Time, TotalSoft_Port_CP_Hov_Ov_Bg_Color, TotalSoft_Port_CP_Hov_Ov_Transparency, TotalSoft_Port_CP_Hov_Ov_Effect_Type, TotalSoft_Port_CP_Hov_Ov_Effect_Time, TotalSoft_Port_CP_Title_Bg_Color, TotalSoft_Port_CP_Title_Transparency, TotalSoft_Port_CP_Title_Font_Size, TotalSoft_Port_CP_Title_Color, TotalSoft_Port_CP_Title_Effect_Type, TotalSoft_Port_CP_Title_Effect_Time, TotalSoft_Port_CP_Title_FF, TotalSoft_Port_CP_Line_Width, TotalSoft_Port_CP_Line_Style, TotalSoft_Port_CP_Line_Color, TotalSoft_Port_CP_Line_Hov_Type, TotalSoft_Port_CP_Line_Hov_Time, TotalSoft_Port_CP_Link_Font_Size, TotalSoft_Port_CP_Link_Color, TotalSoft_Port_CP_Link_Border_Color, TotalSoft_Port_CP_Link_Border_Width, TotalSoft_Port_CP_Link_Border_Style, TotalSoft_Port_CP_Link_Text, TotalSoft_Port_CP_Link_Hov_Type, TotalSoft_Port_CP_Link_Hov_Time, TotalSoft_Port_CP_Link_FF, TotalSoft_Port_CP_Pop_BgC, TotalSoft_Port_CP_Pop_BW, TotalSoft_Port_CP_Pop_BS, TotalSoft_Port_CP_Pop_BC, TotalSoft_Port_CP_Pop_BR, TotalSoft_Port_CP_Pop_TShow, TotalSoft_Port_CP_Pop_TTA, TotalSoft_Port_CP_Pop_TFS, TotalSoft_Port_CP_Pop_TFF, TotalSoft_Port_CP_Pop_TC, TotalSoft_Port_CP_Pop_PType, TotalSoft_Port_CP_Pop_PIS, TotalSoft_Port_CP_Pop_PIC, TotalSoft_Port_CP_Pop_CType, TotalSoft_Port_CP_Pop_CIS, TotalSoft_Port_CP_Pop_CIC, TotalSoft_Port_CP_Pop_CIT, TotalSoft_Port_CP_Pop_CTF, TotalSoft_Port_CP_Pop_AType, TotalSoft_Port_CP_Pop_ArrS, TotalSoft_Port_CP_Pop_ArrC, TotalSoft_Port_CP_Pop_NFS, TotalSoft_Port_CP_Pop_NC, TotalSoft_Port_CP_SM, TotalSoft_Port_CP_TSA, TotalSoft_Port_CP_Nav_MBgC, TotalSoft_Port_CP_Nav_CurBgC, TotalSoft_Port_CP_Nav_CurC, TotalSoft_Port_CP_Nav_BgC, TotalSoft_Port_CP_Nav_C, TotalSoft_Port_CP_Nav_FS, TotalSoft_Port_CP_Nav_FF, TotalSoft_Port_CP_Nav_HBgC, TotalSoft_Port_CP_Nav_HC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_SetNameID[0]->id, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetType, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_W, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_PB, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_BoxSh, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_BoxShC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_VBW, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_VBS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_VBC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_VBR, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Img_Zoom_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Img_Zoom_Effect_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Hov_Ov_Bg_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Hov_Ov_Transparency, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Hov_Ov_Effect_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Title_Bg_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Title_Transparency, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Title_Font_Size, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Title_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Title_Effect_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Title_Effect_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Title_FF, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Line_Width, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Line_Style, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Line_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Line_Hov_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Line_Hov_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_Font_Size, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_Border_Color, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_Border_Width, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_Border_Style, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_Text, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_Hov_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_Hov_Time, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Link_FF, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_BW, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_BS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_BC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_BR, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_TShow, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_TTA, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_TFS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_TFF, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_TC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_PType, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_PIS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_PIC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_CType, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_CIS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_CIC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_CIT, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_CTF, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_AType, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_ArrS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_ArrC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_NFS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Pop_NC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_SM, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_TSA, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_MBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_CurBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_CurC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_FS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_FF, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_HBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_CP_Nav_HC));
		}
		else if($TotalSoftPortfolio_SetNameID[0]->TotalSoftPortfolio_SetType=='Slider Portfolio')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name10 (id, TotalSoftPortfolio_SetID, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType, TotalSoft_Port_SP_AP, TotalSoft_Port_SP_PT, TotalSoft_Port_SP_W, TotalSoft_Port_SP_H, TotalSoft_Port_SP_Pos, TotalSoft_Port_SP_BW, TotalSoft_Port_SP_BS, TotalSoft_Port_SP_BC, TotalSoft_Port_SP_TT_Show, TotalSoft_Port_SP_Tr_Eff, TotalSoft_Port_SP_TrB_Eff, TotalSoft_Port_SP_Tr_Cols, TotalSoft_Port_SP_Tr_Rows, TotalSoft_Port_SP_Tr_Dur, TotalSoft_Port_SP_Seff, TotalSoft_Port_SP_AT_FS, TotalSoft_Port_SP_AT_FF, TotalSoft_Port_SP_AT_BgC, TotalSoft_Port_SP_AT_C, TotalSoft_Port_SP_ASM_C, TotalSoft_Port_SP_ASM_BgC, TotalSoft_Port_SP_ASM_HC, TotalSoft_Port_SP_ASM_HBgC, TotalSoft_Port_SP_IT_Show, TotalSoft_Port_SP_IT_Pos, TotalSoft_Port_SP_IT_C, TotalSoft_Port_SP_IT_BgC, TotalSoft_Port_SP_IT_FS, TotalSoft_Port_SP_IT_FF, TotalSoft_Port_SP_Th_W, TotalSoft_Port_SP_Th_H, TotalSoft_Port_SP_Th_FW, TotalSoft_Port_SP_Th_FH, TotalSoft_Port_SP_Th_Pos, TotalSoft_Port_SP_Th_Type, TotalSoft_Port_SP_Th_BgC, TotalSoft_Port_SP_Th_C, TotalSoft_Port_SP_Th_ABgC, TotalSoft_Port_SP_TogT_Show, TotalSoft_Port_SP_TogT_C, TotalSoft_Port_SP_Zoom_Show, TotalSoft_Port_SP_Zoom_C, TotalSoft_Port_SP_Full_C, TotalSoft_Port_SP_PP_C, TotalSoft_Port_SP_All_C, TotalSoft_Port_SP_Album_C, TotalSoft_Port_SP_Arr_Type, TotalSoft_Port_SP_Arr_C, TotalSoft_Port_SP_PP_Show) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_SetNameID[0]->id, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetType, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_AP, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_PT, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_W, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_H, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Pos, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_BW, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_BS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_BC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_TT_Show, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Tr_Eff, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_TrB_Eff, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Tr_Cols, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Tr_Rows, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Tr_Dur, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Seff, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_AT_FS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_AT_FF, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_AT_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_AT_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_ASM_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_ASM_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_ASM_HC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_ASM_HBgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_IT_Show, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_IT_Pos, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_IT_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_IT_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_IT_FS, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_IT_FF, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_W, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_H, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_FW, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_FH, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_Pos, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_BgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Th_ABgC, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_TogT_Show, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_TogT_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Zoom_Show, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Zoom_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Full_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_PP_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_All_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Album_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Arr_Type, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_Arr_C, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_SP_PP_Show));
		}
		else if($TotalSoftPortfolio_SetNameID[0]->TotalSoftPortfolio_SetType=='Gallery Album Animation')
		{
			$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name11 (id, TotalSoftPortfolio_SetID, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType, TotalSoft_Port_GAA_01, TotalSoft_Port_GAA_02, TotalSoft_Port_GAA_03, TotalSoft_Port_GAA_04, TotalSoft_Port_GAA_05, TotalSoft_Port_GAA_06, TotalSoft_Port_GAA_07, TotalSoft_Port_GAA_08, TotalSoft_Port_GAA_09, TotalSoft_Port_GAA_10, TotalSoft_Port_GAA_11, TotalSoft_Port_GAA_12, TotalSoft_Port_GAA_13, TotalSoft_Port_GAA_14, TotalSoft_Port_GAA_15, TotalSoft_Port_GAA_16, TotalSoft_Port_GAA_17, TotalSoft_Port_GAA_18, TotalSoft_Port_GAA_19, TotalSoft_Port_GAA_20, TotalSoft_Port_GAA_21, TotalSoft_Port_GAA_22, TotalSoft_Port_GAA_23, TotalSoft_Port_GAA_24, TotalSoft_Port_GAA_25, TotalSoft_Port_GAA_26, TotalSoft_Port_GAA_27, TotalSoft_Port_GAA_28, TotalSoft_Port_GAA_29, TotalSoft_Port_GAA_30, TotalSoft_Port_GAA_31, TotalSoft_Port_GAA_32, TotalSoft_Port_GAA_33, TotalSoft_Port_GAA_34, TotalSoft_Port_GAA_35, TotalSoft_Port_GAA_36, TotalSoft_Port_GAA_37, TotalSoft_Port_GAA_38, TotalSoft_Port_GAA_39, TotalSoft_Port_GAA_40) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_SetNameID[0]->id, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioSet[0]->TotalSoftPortfolio_SetType, $Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_01,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_02,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_03,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_04,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_05,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_06,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_07,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_08,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_09,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_10,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_11,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_12,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_13,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_14,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_15,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_16,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_17,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_18,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_19,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_20,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_21,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_22,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_23,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_24,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_25,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_26,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_27,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_28,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_29,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_30,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_31,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_32,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_33,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_34,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_35,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_36,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_37,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_38,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_39,	$Total_Soft_PortfolioSet[0]->TotalSoft_Port_GAA_40));
		}
		die();
	}
?>