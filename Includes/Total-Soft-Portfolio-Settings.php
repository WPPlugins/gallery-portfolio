<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;

	$table_name   = $wpdb->prefix . "totalsoft_fonts";
	$table_name1  = $wpdb->prefix . "totalsoft_portfolio_settings";
	$table_name2  = $wpdb->prefix . "totalsoft_portfolio_dbt";
	$table_name7  = $wpdb->prefix . "totalsoft_portfolio_Elgrid";
	$table_name8  = $wpdb->prefix . "totalsoft_portfolio_Filgrid";
	$table_name9  = $wpdb->prefix . "totalsoft_portfolio_CPopup";
	$table_name10 = $wpdb->prefix . "totalsoft_portfolio_SlPort";
	$table_name11 = $wpdb->prefix . "totalsoft_portfolio_GAAnim";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'TS_Portfolio_Nonce' ))
		{
			$TotalSoftPortfolio_SetName=sanitize_text_field($_POST['TotalSoftPortfolio_SetName']); $TotalSoftPortfolio_SetType=sanitize_text_field($_POST['TotalSoftPortfolio_SetType']);
			//Total Soft Portfolio
			$TotalSoftPortfolio_ContH=sanitize_text_field($_POST['TotalSoftPortfolio_ContH']); $TotalSoftPortfolio_IW=sanitize_text_field($_POST['TotalSoftPortfolio_IW']); $TotalSoftPortfolio_IH=sanitize_text_field($_POST['TotalSoftPortfolio_IH']); $TotalSoftPortfolio_IBW=sanitize_text_field($_POST['TotalSoftPortfolio_IBW']); $TotalSoftPortfolio_IBS=sanitize_text_field($_POST['TotalSoftPortfolio_IBS']); $TotalSoftPortfolio_IBC=sanitize_text_field($_POST['TotalSoftPortfolio_IBC']); $TotalSoftPortfolio_IBR=sanitize_text_field($_POST['TotalSoftPortfolio_IBR']);		
			//Elastic Grid
			$TotalSoft_ElG_TSA=sanitize_text_field($_POST['TotalSoft_ElG_TSA']); $TotalSoft_ElG_SM=sanitize_text_field($_POST['TotalSoft_ElG_SM']); $TotalSoft_ElG_HE=sanitize_text_field($_POST['TotalSoft_ElG_HE']); $TotalSoft_ElG_Nav_FF=sanitize_text_field($_POST['TotalSoft_ElG_Nav_FF']); $TotalSoft_ElG_Im_W=sanitize_text_field($_POST['TotalSoft_ElG_Im_W']); $TotalSoft_ElG_Im_H=sanitize_text_field($_POST['TotalSoft_ElG_Im_H']); $TotalSoft_ElG_Im_TFF=sanitize_text_field($_POST['TotalSoft_ElG_Im_TFF']); $TotalSoft_ElG_Pop_TFF=sanitize_text_field($_POST['TotalSoft_ElG_Pop_TFF']); $TotalSoft_ElG_LIP_FF=sanitize_text_field($_POST['TotalSoft_ElG_LIP_FF']); $TotalSoft_ElG_LAM_W=sanitize_text_field($_POST['TotalSoft_ElG_LAM_W']); $TotalSoft_ElG_LAM_S=sanitize_text_field($_POST['TotalSoft_ElG_LAM_S']); $TotalSoft_ElG_LAM_C=sanitize_text_field($_POST['TotalSoft_ElG_LAM_C']); $TotalSoft_ElG_Im_TFS=sanitize_text_field($_POST['TotalSoft_ElG_Im_TFS']); $TotalSoft_ElG_Pop_TFS=sanitize_text_field($_POST['TotalSoft_ElG_Pop_TFS']); $TotalSoft_ElG_LIP_FS=sanitize_text_field($_POST['TotalSoft_ElG_LIP_FS']); $TotalSoft_ElG_I_S=sanitize_text_field($_POST['TotalSoft_ElG_I_S']); $TotalSoft_ElG_CI_S=sanitize_text_field($_POST['TotalSoft_ElG_CI_S']);
			if($TotalSoft_ElG_SM=='on'){ $TotalSoft_ElG_SM='true'; }else{ $TotalSoft_ElG_SM='false'; }
			if($TotalSoft_ElG_HE=='on'){ $TotalSoft_ElG_HE='true'; }else{ $TotalSoft_ElG_HE='false'; }
			//Filterable Grid
			$TotalSoft_FG_TSA=sanitize_text_field($_POST['TotalSoft_FG_TSA']); $TotalSoft_FG_PBI=sanitize_text_field($_POST['TotalSoft_FG_PBI']); $TotalSoft_FG_DSI=sanitize_text_field($_POST['TotalSoft_FG_DSI']); $TotalSoft_FG_Nav_FF=sanitize_text_field($_POST['TotalSoft_FG_Nav_FF']); $TotalSoft_FG_TFF=sanitize_text_field($_POST['TotalSoft_FG_TFF']); $TotalSoft_FG_Slider_Img_Width=sanitize_text_field($_POST['TotalSoft_FG_Slider_Img_Width']); $TotalSoft_FG_Car_Slider_Img_Height=sanitize_text_field($_POST['TotalSoft_FG_Car_Slider_Img_Height']); $TotalSoft_FG_Pop_Title_Font_Family=sanitize_text_field($_POST['TotalSoft_FG_Pop_Title_Font_Family']); $TotalSoft_FG_Im_BW=sanitize_text_field($_POST['TotalSoft_FG_Im_BW']); $TotalSoft_FG_Im_BC=sanitize_text_field($_POST['TotalSoft_FG_Im_BC']); $TotalSoft_FG_Nav_FS=sanitize_text_field($_POST['TotalSoft_FG_Nav_FS']); $TotalSoft_FG_TFS=sanitize_text_field($_POST['TotalSoft_FG_TFS']); $TotalSoft_FG_TDBgC=sanitize_text_field($_POST['TotalSoft_FG_TDBgC']); $TotalSoft_FG_TDBW=sanitize_text_field($_POST['TotalSoft_FG_TDBW']); $TotalSoft_FG_TDBC=sanitize_text_field($_POST['TotalSoft_FG_TDBC']); $TotalSoft_FG_Pop_Icon_Size=sanitize_text_field($_POST['TotalSoft_FG_Pop_Icon_Size']); $TotalSoft_FG_Slider_Icon_Size_Time=sanitize_text_field($_POST['TotalSoft_FG_Slider_Icon_Size_Time']); $TotalSoft_FG_Slider_Del_Icon_Size=sanitize_text_field($_POST['TotalSoft_FG_Slider_Del_Icon_Size']); $TotalSoft_FG_Pop_Title_Font_Size=sanitize_text_field($_POST['TotalSoft_FG_Pop_Title_Font_Size']);
			if($TotalSoft_FG_DSI=='on'){ $TotalSoft_FG_DSI='true'; }else{ $TotalSoft_FG_DSI='false'; }
			//Content Popup
			$TotalSoft_Port_CP_W=sanitize_text_field($_POST['TotalSoft_Port_CP_W']); $TotalSoft_Port_CP_PB=sanitize_text_field($_POST['TotalSoft_Port_CP_PB']); $TotalSoft_Port_CP_Title_FF=sanitize_text_field($_POST['TotalSoft_Port_CP_Title_FF']); $TotalSoft_Port_CP_Line_Width=sanitize_text_field($_POST['TotalSoft_Port_CP_Line_Width']); $TotalSoft_Port_CP_Line_Style=sanitize_text_field($_POST['TotalSoft_Port_CP_Line_Style']); $TotalSoft_Port_CP_Line_Color=sanitize_text_field($_POST['TotalSoft_Port_CP_Line_Color']); $TotalSoft_Port_CP_Line_Hov_Type=sanitize_text_field($_POST['TotalSoft_Port_CP_Line_Hov_Type']); $TotalSoft_Port_CP_Line_Hov_Time=sanitize_text_field($_POST['TotalSoft_Port_CP_Line_Hov_Time']); $TotalSoft_Port_CP_Link_Text=sanitize_text_field($_POST['TotalSoft_Port_CP_Link_Text']); $TotalSoft_Port_CP_Link_FF=sanitize_text_field($_POST['TotalSoft_Port_CP_Link_FF']); $TotalSoft_Port_CP_Pop_BR=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_BR']); $TotalSoft_Port_CP_Pop_TFF=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_TFF']); $TotalSoft_Port_CP_Pop_CTF=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_CTF']); $TotalSoft_Port_CP_SM=sanitize_text_field($_POST['TotalSoft_Port_CP_SM']); $TotalSoft_Port_CP_TSA=sanitize_text_field($_POST['TotalSoft_Port_CP_TSA']); $TotalSoft_Port_CP_Nav_FF=sanitize_text_field($_POST['TotalSoft_Port_CP_Nav_FF']); $TotalSoft_Port_CP_Pop_CIT=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_CIT']); $TotalSoft_Port_CP_BoxSh=sanitize_text_field($_POST['TotalSoft_Port_CP_BoxSh']); $TotalSoft_Port_CP_BoxShC=sanitize_text_field($_POST['TotalSoft_Port_CP_BoxShC']); $TotalSoft_Port_CP_VBW=sanitize_text_field($_POST['TotalSoft_Port_CP_VBW']); $TotalSoft_Port_CP_Title_Font_Size=sanitize_text_field($_POST['TotalSoft_Port_CP_Title_Font_Size']); $TotalSoft_Port_CP_Link_Font_Size=sanitize_text_field($_POST['TotalSoft_Port_CP_Link_Font_Size']); $TotalSoft_Port_CP_Link_Border_Color=sanitize_text_field($_POST['TotalSoft_Port_CP_Link_Border_Color']); $TotalSoft_Port_CP_Link_Border_Width=sanitize_text_field($_POST['TotalSoft_Port_CP_Link_Border_Width']); $TotalSoft_Port_CP_Link_Border_Style=sanitize_text_field($_POST['TotalSoft_Port_CP_Link_Border_Style']); $TotalSoft_Port_CP_Pop_TFS=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_TFS']); $TotalSoft_Port_CP_Pop_PIS=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_PIS']); $TotalSoft_Port_CP_Pop_CIS=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_CIS']); $TotalSoft_Port_CP_Pop_ArrS=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_ArrS']); $TotalSoft_Port_CP_Pop_NFS=sanitize_text_field($_POST['TotalSoft_Port_CP_Pop_NFS']); $TotalSoft_Port_CP_Nav_FS=sanitize_text_field($_POST['TotalSoft_Port_CP_Nav_FS']);
			if($TotalSoft_Port_CP_SM=='on'){ $TotalSoft_Port_CP_SM='true'; }else{ $TotalSoft_Port_CP_SM='false'; }
			//Slider Portfolio
			$TotalSoft_Port_SP_W=sanitize_text_field($_POST['TotalSoft_Port_SP_W']); $TotalSoft_Port_SP_H=sanitize_text_field($_POST['TotalSoft_Port_SP_H']); $TotalSoft_Port_SP_Pos=sanitize_text_field($_POST['TotalSoft_Port_SP_Pos']); $TotalSoft_Port_SP_AT_FF=sanitize_text_field($_POST['TotalSoft_Port_SP_AT_FF']); $TotalSoft_Port_SP_IT_Show=sanitize_text_field($_POST['TotalSoft_Port_SP_IT_Show']); $TotalSoft_Port_SP_IT_Pos=sanitize_text_field($_POST['TotalSoft_Port_SP_IT_Pos']); $TotalSoft_Port_SP_IT_FF=sanitize_text_field($_POST['TotalSoft_Port_SP_IT_FF']); $TotalSoft_Port_SP_Th_FW=sanitize_text_field($_POST['TotalSoft_Port_SP_Th_FW']); $TotalSoft_Port_SP_Th_FH=sanitize_text_field($_POST['TotalSoft_Port_SP_Th_FH']); $TotalSoft_Port_SP_Th_Pos=sanitize_text_field($_POST['TotalSoft_Port_SP_Th_Pos']); $TotalSoft_Port_SP_BW=sanitize_text_field($_POST['TotalSoft_Port_SP_BW']); $TotalSoft_Port_SP_BS=sanitize_text_field($_POST['TotalSoft_Port_SP_BS']); $TotalSoft_Port_SP_BC=sanitize_text_field($_POST['TotalSoft_Port_SP_BC']); $TotalSoft_Port_SP_AT_FS=sanitize_text_field($_POST['TotalSoft_Port_SP_AT_FS']); $TotalSoft_Port_SP_IT_FS=sanitize_text_field($_POST['TotalSoft_Port_SP_IT_FS']);
			if($TotalSoft_Port_SP_IT_Show=='on'){ $TotalSoft_Port_SP_IT_Show='true'; }else{ $TotalSoft_Port_SP_IT_Show='false'; }
			// Gallery Album Animation
			$TotalSoft_Port_GAA_03 = sanitize_text_field($_POST['TotalSoft_Port_GAA_03']); $TotalSoft_Port_GAA_05 = sanitize_text_field($_POST['TotalSoft_Port_GAA_05']); $TotalSoft_Port_GAA_06 = sanitize_text_field($_POST['TotalSoft_Port_GAA_06']); $TotalSoft_Port_GAA_07 = sanitize_text_field($_POST['TotalSoft_Port_GAA_07']); $TotalSoft_Port_GAA_08 = sanitize_text_field($_POST['TotalSoft_Port_GAA_08']); $TotalSoft_Port_GAA_09 = sanitize_text_field($_POST['TotalSoft_Port_GAA_09']); $TotalSoft_Port_GAA_11 = sanitize_text_field($_POST['TotalSoft_Port_GAA_11']); $TotalSoft_Port_GAA_13 = sanitize_text_field($_POST['TotalSoft_Port_GAA_13']); $TotalSoft_Port_GAA_15 = sanitize_text_field($_POST['TotalSoft_Port_GAA_15']); $TotalSoft_Port_GAA_21 = sanitize_text_field($_POST['TotalSoft_Port_GAA_21']); $TotalSoft_Port_GAA_29 = sanitize_text_field($_POST['TotalSoft_Port_GAA_29']); $TotalSoft_Port_GAA_36 = sanitize_text_field($_POST['TotalSoft_Port_GAA_36']);
			if($TotalSoft_Port_GAA_03=='on'){ $TotalSoft_Port_GAA_03='true'; }else{ $TotalSoft_Port_GAA_03='false'; }
			if($TotalSoft_Port_GAA_08=='on'){ $TotalSoft_Port_GAA_08='true'; }else{ $TotalSoft_Port_GAA_08='false'; }
			if($TotalSoft_Port_GAA_13=='on'){ $TotalSoft_Port_GAA_13='true'; }else{ $TotalSoft_Port_GAA_13='false'; }

			if(isset($_POST['Total_Soft_Portfolio_Update_Option']))
			{
				$Total_SoftPortfolio_Update=sanitize_text_field($_POST['Total_SoftPortfolio_Update']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name2 set TotalSoftPortfolio_SetName=%s, TotalSoftPortfolio_SetType=%s WHERE id=%d", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $Total_SoftPortfolio_Update));

				if($TotalSoftPortfolio_SetType=='Total Soft Portfolio')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name1 set TotalSoftPortfolio_SetName=%s, TotalSoftPortfolio_SetType=%s, TotalSoftPortfolio_ContH=%s, TotalSoftPortfolio_IW=%s, TotalSoftPortfolio_IH=%s, TotalSoftPortfolio_IBW = %s, TotalSoftPortfolio_IBS = %s, TotalSoftPortfolio_IBC = %s, TotalSoftPortfolio_IBR = %s WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoftPortfolio_ContH, $TotalSoftPortfolio_IW, $TotalSoftPortfolio_IH, $TotalSoftPortfolio_IBW, $TotalSoftPortfolio_IBS, $TotalSoftPortfolio_IBC, $TotalSoftPortfolio_IBR, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Elastic Grid')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name7 set TotalSoftPortfolio_SetName=%s, TotalSoftPortfolio_SetType=%s, TotalSoft_ElG_TSA=%s, TotalSoft_ElG_SM=%s, TotalSoft_ElG_HE=%s, TotalSoft_ElG_Nav_FF=%s, TotalSoft_ElG_Im_W=%s, TotalSoft_ElG_Im_H=%s, TotalSoft_ElG_Im_TFF=%s, TotalSoft_ElG_Pop_TFF=%s, TotalSoft_ElG_LIP_FF=%s, TotalSoft_ElG_LAM_W = %s, TotalSoft_ElG_LAM_S = %s, TotalSoft_ElG_LAM_C = %s, TotalSoft_ElG_Im_TFS = %s, TotalSoft_ElG_Pop_TFS = %s, TotalSoft_ElG_LIP_FS = %s, TotalSoft_ElG_I_S = %s, TotalSoft_ElG_CI_S = %s WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_ElG_TSA, $TotalSoft_ElG_SM, $TotalSoft_ElG_HE, $TotalSoft_ElG_Nav_FF, $TotalSoft_ElG_Im_W, $TotalSoft_ElG_Im_H, $TotalSoft_ElG_Im_TFF, $TotalSoft_ElG_Pop_TFF, $TotalSoft_ElG_LIP_FF, $TotalSoft_ElG_LAM_W, $TotalSoft_ElG_LAM_S, $TotalSoft_ElG_LAM_C, $TotalSoft_ElG_Im_TFS, $TotalSoft_ElG_Pop_TFS, $TotalSoft_ElG_LIP_FS, $TotalSoft_ElG_I_S, $TotalSoft_ElG_CI_S, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Filterable Grid')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name8 set TotalSoftPortfolio_SetName=%s, TotalSoftPortfolio_SetType=%s, TotalSoft_FG_TSA=%s, TotalSoft_FG_PBI=%s, TotalSoft_FG_DSI=%s, TotalSoft_FG_Nav_FF=%s, TotalSoft_FG_TFF=%s, TotalSoft_FG_Slider_Img_Width=%s, TotalSoft_FG_Car_Slider_Img_Height=%s, TotalSoft_FG_Pop_Title_Font_Family=%s, TotalSoft_FG_Im_BW = %s, TotalSoft_FG_Im_BC = %s, TotalSoft_FG_Nav_FS = %s, TotalSoft_FG_TFS = %s, TotalSoft_FG_TDBgC = %s, TotalSoft_FG_TDBW = %s, TotalSoft_FG_TDBC = %s, TotalSoft_FG_Pop_Icon_Size = %s, TotalSoft_FG_Slider_Icon_Size_Time = %s, TotalSoft_FG_Slider_Del_Icon_Size = %s, TotalSoft_FG_Pop_Title_Font_Size = %s WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_FG_TSA, $TotalSoft_FG_PBI, $TotalSoft_FG_DSI, $TotalSoft_FG_Nav_FF, $TotalSoft_FG_TFF, $TotalSoft_FG_Slider_Img_Width, $TotalSoft_FG_Car_Slider_Img_Height, $TotalSoft_FG_Pop_Title_Font_Family, $TotalSoft_FG_Im_BW, $TotalSoft_FG_Im_BC, $TotalSoft_FG_Nav_FS, $TotalSoft_FG_TFS, $TotalSoft_FG_TDBgC, $TotalSoft_FG_TDBW, $TotalSoft_FG_TDBC, $TotalSoft_FG_Pop_Icon_Size, $TotalSoft_FG_Slider_Icon_Size_Time, $TotalSoft_FG_Slider_Del_Icon_Size, $TotalSoft_FG_Pop_Title_Font_Size, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Gallery Portfolio/Content Popup')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name9 set TotalSoftPortfolio_SetName=%s, TotalSoftPortfolio_SetType=%s, TotalSoft_Port_CP_W=%s, TotalSoft_Port_CP_PB=%s, TotalSoft_Port_CP_Title_FF=%s, TotalSoft_Port_CP_Line_Width=%s, TotalSoft_Port_CP_Line_Style=%s, TotalSoft_Port_CP_Line_Color=%s, TotalSoft_Port_CP_Line_Hov_Type=%s, TotalSoft_Port_CP_Line_Hov_Time=%s, TotalSoft_Port_CP_Link_Text=%s, TotalSoft_Port_CP_Link_FF=%s, TotalSoft_Port_CP_Pop_BR=%s, TotalSoft_Port_CP_Pop_TFF=%s, TotalSoft_Port_CP_Pop_CTF=%s, TotalSoft_Port_CP_SM=%s, TotalSoft_Port_CP_TSA=%s, TotalSoft_Port_CP_Nav_FF=%s, TotalSoft_Port_CP_Pop_CIT=%s, TotalSoft_Port_CP_BoxSh = %s, TotalSoft_Port_CP_BoxShC = %s, TotalSoft_Port_CP_VBW = %s, TotalSoft_Port_CP_Title_Font_Size = %s, TotalSoft_Port_CP_Link_Font_Size = %s, TotalSoft_Port_CP_Link_Border_Color = %s, TotalSoft_Port_CP_Link_Border_Width = %s, TotalSoft_Port_CP_Link_Border_Style = %s, TotalSoft_Port_CP_Pop_TFS = %s, TotalSoft_Port_CP_Pop_PIS = %s, TotalSoft_Port_CP_Pop_CIS = %s, TotalSoft_Port_CP_Pop_ArrS = %s, TotalSoft_Port_CP_Pop_NFS = %s, TotalSoft_Port_CP_Nav_FS = %s WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_Port_CP_W, $TotalSoft_Port_CP_PB, $TotalSoft_Port_CP_Title_FF, $TotalSoft_Port_CP_Line_Width, $TotalSoft_Port_CP_Line_Style, $TotalSoft_Port_CP_Line_Color, $TotalSoft_Port_CP_Line_Hov_Type, $TotalSoft_Port_CP_Line_Hov_Time, $TotalSoft_Port_CP_Link_Text, $TotalSoft_Port_CP_Link_FF, $TotalSoft_Port_CP_Pop_BR, $TotalSoft_Port_CP_Pop_TFF, $TotalSoft_Port_CP_Pop_CTF, $TotalSoft_Port_CP_SM, $TotalSoft_Port_CP_TSA, $TotalSoft_Port_CP_Nav_FF, $TotalSoft_Port_CP_Pop_CIT, $TotalSoft_Port_CP_BoxSh, $TotalSoft_Port_CP_BoxShC, $TotalSoft_Port_CP_VBW, $TotalSoft_Port_CP_Title_Font_Size, $TotalSoft_Port_CP_Link_Font_Size, $TotalSoft_Port_CP_Link_Border_Color, $TotalSoft_Port_CP_Link_Border_Width, $TotalSoft_Port_CP_Link_Border_Style, $TotalSoft_Port_CP_Pop_TFS, $TotalSoft_Port_CP_Pop_PIS, $TotalSoft_Port_CP_Pop_CIS, $TotalSoft_Port_CP_Pop_ArrS, $TotalSoft_Port_CP_Pop_NFS, $TotalSoft_Port_CP_Nav_FS, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Slider Portfolio')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name10 set TotalSoftPortfolio_SetName=%s, TotalSoftPortfolio_SetType=%s, TotalSoft_Port_SP_W=%s, TotalSoft_Port_SP_H=%s, TotalSoft_Port_SP_Pos=%s, TotalSoft_Port_SP_AT_FF=%s, TotalSoft_Port_SP_IT_Show=%s, TotalSoft_Port_SP_IT_Pos=%s, TotalSoft_Port_SP_IT_FF=%s, TotalSoft_Port_SP_Th_FW=%s, TotalSoft_Port_SP_Th_FH=%s, TotalSoft_Port_SP_Th_Pos=%s, TotalSoft_Port_SP_BW = %s, TotalSoft_Port_SP_BS = %s, TotalSoft_Port_SP_BC = %s, TotalSoft_Port_SP_AT_FS = %s, TotalSoft_Port_SP_IT_FS = %s WHERE TotalSoftPortfolio_SetID=%s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_Port_SP_W, $TotalSoft_Port_SP_H, $TotalSoft_Port_SP_Pos, $TotalSoft_Port_SP_AT_FF, $TotalSoft_Port_SP_IT_Show, $TotalSoft_Port_SP_IT_Pos, $TotalSoft_Port_SP_IT_FF, $TotalSoft_Port_SP_Th_FW, $TotalSoft_Port_SP_Th_FH, $TotalSoft_Port_SP_Th_Pos, $TotalSoft_Port_SP_BW, $TotalSoft_Port_SP_BS, $TotalSoft_Port_SP_BC, $TotalSoft_Port_SP_AT_FS, $TotalSoft_Port_SP_IT_FS, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Gallery Album Animation')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name11 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_Port_GAA_03 = %s,	TotalSoft_Port_GAA_05 = %s,	TotalSoft_Port_GAA_06 = %s,	TotalSoft_Port_GAA_07 = %s,	TotalSoft_Port_GAA_08 = %s,	TotalSoft_Port_GAA_09 = %s,	TotalSoft_Port_GAA_11 = %s,	TotalSoft_Port_GAA_13 = %s,	TotalSoft_Port_GAA_15 = %s,	TotalSoft_Port_GAA_21 = %s,	TotalSoft_Port_GAA_29 = %s,	TotalSoft_Port_GAA_36 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_Port_GAA_03, $TotalSoft_Port_GAA_05,	$TotalSoft_Port_GAA_06,	$TotalSoft_Port_GAA_07,	$TotalSoft_Port_GAA_08,	$TotalSoft_Port_GAA_09,	$TotalSoft_Port_GAA_11,	$TotalSoft_Port_GAA_13,	$TotalSoft_Port_GAA_15,	$TotalSoft_Port_GAA_21,	$TotalSoft_Port_GAA_29,	$TotalSoft_Port_GAA_36, $Total_SoftPortfolio_Update));
				}
			}
		}
	    else
	    {
	        wp_die('Security check fail'); 
	    }
	}
		
	$TotalSoftPortfolioOptions=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d", 0));
	$TotalSoftFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d", 0));
	require_once('Total-Soft-Portfolio-Check.php');
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST" oninput="TotalSoft_Portfolio_Out()">
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'TS_Portfolio_Nonce' );?>
	<div class="Total_Soft_Portfolio_AMD">
		<a href="http://total-soft.pe.hu/gallery-portfolio/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i>Get The Full Version</div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>
		<div class="Support_Span">
			<a href="https://wordpress.org/support/plugin/gallery-portfolio/" target="_blank" title="Click Here to Ask">
				<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
			</a>
		</div>
		<div class="Total_Soft_Portfolio_AMD1"></div>
		<div class="Total_Soft_Portfolio_AMD2">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Creating New Portfolio Setting"></i>
			<input type="button" name="" value="New Option (Pro)" class="Total_Soft_Portfolio_AMD2_But" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
		</div>
		<div class="Total_Soft_Portfolio_AMD3">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Canceling"></i>
			<input type="button" value="Cancel" class="Total_Soft_Portfolio_AMD2_But" onclick='TotalSoft_Reload()'>
			<i class="Total_Soft_Portfolio_Update_Option Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Updating Settings"></i>
			<input type="submit" name="Total_Soft_Portfolio_Update_Option" value="Update" class="Total_Soft_Portfolio_Update_Option Total_Soft_Portfolio_AMD2_But">
			<input type="text" style="display:none" name="Total_SoftPortfolio_Update" id="Total_SoftPortfolio_Update">
		</div>
	</div>
	<table class="Total_Soft_PortfolioTMMTable">
		<tr class="Total_Soft_PortfolioTMMTableFR">
			<td>No</td>
			<td>Setting Title</td>
			<td>Portfolio Type</td>
			<td>Actions</td>
		</tr>
	</table>

	<table class="Total_Soft_PortfolioTMOTable">
	 	<?php for($i=0;$i<count($TotalSoftPortfolioOptions);$i++){ ?> 
	 		<tr id="Total_Soft_PortfolioTMOTable_tr_<?php echo $TotalSoftPortfolioOptions[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftPortfolioOptions[$i]->TotalSoftPortfolio_SetName;?></td>
				<td><?php echo $TotalSoftPortfolioOptions[$i]->TotalSoftPortfolio_SetType;?></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftPortfolio_Clone_Option(<?php echo $TotalSoftPortfolioOptions[$i]->id;?>)"></i></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftPortfolio_Edit_Option(<?php echo $TotalSoftPortfolioOptions[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftPortfolio_Del_Option(<?php echo $TotalSoftPortfolioOptions[$i]->id;?>)"></i>
					<span class="Total_Soft_Portfolio_Del_Span">
						<i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></i>
						<i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftPortfolio_Del_Opt_No(<?php echo $TotalSoftPortfolioOptions[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
	 	<?php }?>
	</table>
	<table class="Total_Soft_AMSet_Table">
		<tr>
			<td>Setting Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write your Portfolio’s name."></i></td>
			<td><input type="text" name="TotalSoftPortfolio_SetName" id="TotalSoftPortfolio_SetName" class="Total_Soft_Select" required placeholder=" * Required"></td>
			<td>Portfolio Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the one from this 6 options."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftPortfolio_SetType" id="TotalSoftPortfolio_SetType">
					<option value="Total Soft Portfolio">            Total Soft Portfolio            </option>
					<option value="Elastic Grid">                    Elastic Grid                    </option>
					<option value="Filterable Grid">                 Filterable Grid                 </option>
					<option value="Gallery Portfolio/Content Popup"> Gallery Portfolio/Content Popup </option>
					<option value="Slider Portfolio">                Slider Portfolio                </option>
					<option value="Gallery Album Animation">         Gallery Album Animation         </option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_1">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Container Height<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the size of the main Portfolio Gallery, where placed your all photos."></i></td>
			<td>			
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoftPortfolio_ContH" id="TotalSoftPortfolio_ContH" min="400" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftPortfolio_ContH_Output" for="TotalSoftPortfolio_ContH"></output>
			</td>
			<td>Background Image (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background image for the gallery, also your portfolio can be without a background image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftPortfolio_BgImage" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="">          No Background </option>
					<option value="bg_1.png">  Background 1  </option>
					<option value="bg_2.png">  Background 2  </option>
					<option value="bg_3.png">  Background 3  </option>
					<option value="bg_4.png">  Background 4  </option>
					<option value="bg_5.png">  Background 5  </option>
					<option value="bg_6.png">  Background 6  </option>
					<option value="bg_7.png">  Background 7  </option>
					<option value="bg_8.png">  Background 8  </option>
					<option value="bg_9.png">  Background 9  </option>
					<option value="bg_10.png"> Background 10 </option>
					<option value="bg_11.png"> Background 11 </option>
					<option value="bg_12.png"> Background 12 </option>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Image Options</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image and it is all responsive in portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoftPortfolio_IW" id="TotalSoftPortfolio_IW" min="400" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftPortfolio_IW_Output" for="TotalSoftPortfolio_IW"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preffered height of the image and it is all responsive in portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoftPortfolio_IH" id="TotalSoftPortfolio_IH" min="400" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftPortfolio_IH_Output" for="TotalSoftPortfolio_IH"></output>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the borders of individual images."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoftPortfolio_IBW" id="TotalSoftPortfolio_IBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="TotalSoftPortfolio_IBW_Output" id="TotalSoftPortfolio_IBW_Output" for="TotalSoftPortfolio_IBW"></output>
			</td>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the frame style for image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftPortfolio_IBS" id="TotalSoftPortfolio_IBS">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border color."></i></td>
			<td><input type="text" name="TotalSoftPortfolio_IBC" id="TotalSoftPortfolio_IBC" class="Total_Soft_Port_Color" value=""></td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border radius of the image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangeper" name="TotalSoftPortfolio_IBR" id="TotalSoftPortfolio_IBR" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="TotalSoftPortfolio_IBR_Output" id="TotalSoftPortfolio_IBR_Output" for="TotalSoftPortfolio_IBR"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Options</td>			
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of navigation in the gallery of the portfolio."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoftPortfolio_NavS" min="5" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftPortfolio_NavS_Output" for="TotalSoftPortfolio_NavS"></output>
			</td>
			<td>Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the radius borders for navigation."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoftPortfolio_NavRad" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftPortfolio_NavRad_Output" for="TotalSoftPortfolio_NavRad"></output>
			</td>			
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the general navigation."></i></td>
			<td><input type="text" name="" id="TotalSoftPortfolio_NavCol" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for current navigation at the main gallery."></i></td>
			<td><input type="text" name="" id="TotalSoftPortfolio_NavCurCol" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a moving navigation color."></i></td>
			<td><input type="text" name="" id="TotalSoftPortfolio_NavHovCol" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Options</td>			
		</tr>
		<tr>
			<td>Choose Icon (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose the right and left icons, which will change the photos in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftPortfolio_ArrowType" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color, which are designed to change the images."></i></td>
			<td><input type="text" name="" id="TotalSoftPortfolio_ArrowCol" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that size, which would be more relevant for portfolio. It is responsive too."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoftPortfolio_ArrowSize" min="8" max="70" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftPortfolio_ArrowSize_Output" for="TotalSoftPortfolio_ArrowSize"></output>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_2">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Text to Show All <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write name that will be appear in the line of menu bar. Here will be included all albums."></i></td>
			<td><input type="text" name="TotalSoft_ElG_TSA" id="TotalSoft_ElG_TSA" class="Total_Soft_Select" placeholder=" * Required" value=""></td>
			<td>Show Menu <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu should appear or not by Yes or No via buttons."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_ElG_SM" name="TotalSoft_ElG_SM">
		            <label for="TotalSoft_ElG_SM" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Filter Effect (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the Effect , which should be applied by images to changing albums or by clicking on the images to see the description."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_ElG_FE" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="popup">           Popup           </option>
					<option value="moveup">          Moveup          </option>
					<option value="scaleup">         Scaleup         </option>
					<option value="fallperspective"> Fallperspective </option>
					<option value="fly">             Fly             </option>
					<option value="flip">            Flip            </option>
					<option value="helix">           Helix           </option>
				</select>
			</td>
			<td>Hover Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select there is a need to Hover Effect or not."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_ElG_HE" name="TotalSoft_ElG_HE">
		            <label for="TotalSoft_ElG_HE" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Hover Delay (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="The next step is to create a delay function when you hold the mouse on the picture."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_ElG_HD" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_HD_Output" for="TotalSoft_ElG_HD"></output>
			</td>
			<td>Hover Inverse (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Mark gallery hover effect appear on the reverse side or not."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_ElG_HI" name="">
		            <label for="TotalSoft_ElG_HI" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Expanding Speed (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the speed when clicking on the picture will open the lightbox."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_ElG_ES" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_ES_Output" for="TotalSoft_ElG_ES"></output>
			</td>
			<td>Expanding Height (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the height of Lightbox."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_EH" min="200" max="900" step="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_EH_Output" for="TotalSoft_ElG_EH"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Menu Options</td>			
		</tr>
		<tr>
			<td>Main Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Identify gallery portfolio’s main menu background color."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Nav_MBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu background color for gallery navigation, which all the categories displayed in the main menu."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Nav_CurBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu text color for gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Nav_CurC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color for navigation menu."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Nav_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the menu font color. When Portfolio separated with options."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Nav_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Font Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine your preferred font size for menu."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_Nav_FS" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_Nav_FS_Output" for="TotalSoft_ElG_Nav_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="For the menu text choose the font family."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_ElG_Nav_FF" id="TotalSoft_ElG_Nav_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Nav_HBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu font color when the portfolio is separated by categories."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Nav_HC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Menu</td>			
		</tr>
		<tr>
			<td>Width<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Show dividing line. Select the width which divides the menu title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_ElG_LAM_W" id="TotalSoft_ElG_LAM_W" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="TotalSoft_ElG_LAM_W_Output" id="TotalSoft_ElG_LAM_W_Output" for="TotalSoft_ElG_LAM_W"></output>
			</td>
			<td>Style<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select dividing line style between the menu and the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_ElG_LAM_S" id="TotalSoft_ElG_LAM_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select dividing line color between the menu and the title."></i></td>
			<td><input type="text" name="TotalSoft_ElG_LAM_C" id="TotalSoft_ElG_LAM_C" class="Total_Soft_Port_Color" value=""></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Image Options</td>			
		</tr>
		<tr>
			<td>Width<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_ElG_Im_W" id="TotalSoft_ElG_Im_W" min="100" max="900" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_Im_W_Output" for="TotalSoft_ElG_Im_W"></output>
			</td>
			<td>Height<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify your preferred height of the image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_ElG_Im_H" id="TotalSoft_ElG_Im_H" min="100" max="900" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_Im_H_Output" for="TotalSoft_ElG_Im_H"></output>
			</td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the radius border for image."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_Im_BR" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_Im_BR_Output" for="TotalSoft_ElG_Im_BR"></output>
			</td>
			<td>Box Shadow Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the box shadow color for image."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Im_BS" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the image in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Im_HBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Title Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the name of the color image for the gallery portfolio."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Im_TC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Title Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_ElG_Im_TFS" id="TotalSoft_ElG_Im_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_ElG_Im_TFS_Output" id="TotalSoft_ElG_Im_TFS_Output" for="TotalSoft_ElG_Im_TFS"></output>
			</td>
			<td>Title Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_ElG_Im_TFF" id="TotalSoft_ElG_Im_TFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>				
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Title</td>			
		</tr>
		<tr>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width for line after title."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_LAT_W" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_LAT_W_Output" for="TotalSoft_ElG_LAT_W"></output>
			</td>
			<td>Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for line after title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_ElG_LAT_S" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for line after title."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_LAT_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup, select your preferable background color for popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Pop_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Title Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup, select your preferable title color for popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_Pop_TC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Title Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup, choose your preferable font size for popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_ElG_Pop_TFS" id="TotalSoft_ElG_Pop_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_ElG_Pop_TFS_Output" id="TotalSoft_ElG_Pop_TFS_Output" for="TotalSoft_ElG_Pop_TFS"></output>
			</td>
			<td>Title Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable Font Family for popup title, Gallery Portfolio has a font base."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_ElG_Pop_TFF" id="TotalSoft_ElG_Pop_TFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link In Popup</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color, which is designed for Link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_LIP_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button, which you will see in Popup, under the description."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_LIP_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for Gallery Popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_ElG_LIP_FS" id="TotalSoft_ElG_LIP_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_ElG_LIP_FS_Output" id="TotalSoft_ElG_LIP_FS_Output" for="TotalSoft_ElG_LIP_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family, which will make your portfolio more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_ElG_LIP_FF" id="TotalSoft_ElG_LIP_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_LIP_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_LIP_BW_Output" for="TotalSoft_ElG_LIP_BW"></output>
			</td>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border style."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_ElG_LIP_BS" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color, which is in the Lightbox portfolio."></i></td>
			<td><input type="text" name="TotalSoft_ElG_LIP_BC" id="TotalSoft_ElG_LIP_BC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for Gallery link."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_LIP_BR" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_LIP_BR_Output" for="TotalSoft_ElG_LIP_BR"></output>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for link in the Gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_LIP_HBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Select hover color for link in the Gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_LIP_HC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line Before Thumbnails</td>			
		</tr>
		<tr>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width of the line in Lightbox, between the title and pictures."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_LBT_W" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_LBT_W_Output" for="TotalSoft_ElG_LBT_W"></output>
			</td>
			<td>Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a line style in Lightbox, between the title and pictures."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_ElG_LBT_S" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line color."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_LBT_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Thumbnail Options</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred background color of the thumbnails in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_T_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Box Shadow Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the box shadow color for Thumbnails."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_T_BSC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Image Height (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred image height for thambnail in gallery."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_T_IH" min="50" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_T_IH_Output" for="TotalSoft_ElG_T_IH"></output>
			</td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred border width for thumbnail."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_T_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_T_BW_Output" for="TotalSoft_ElG_T_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a style to apply to the thumbnail border in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_ElG_T_BS" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the preferred color for the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_T_BC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border radius in your gallery miniature."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_ElG_T_BR" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_ElG_T_BR_Output" for="TotalSoft_ElG_T_BR"></output>
			</td>
			<td>Current Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the border."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_T_CurBC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Options </td>			
		</tr>
		<tr>
			<td>Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_ElG_I_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of the arrow icon. "></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_ElG_I_S" id="TotalSoft_ElG_I_S" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_ElG_I_S_Output" id="TotalSoft_ElG_I_S_Output" for="TotalSoft_ElG_I_S"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change Thumbnail's pictures."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_I_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Options </td>			
		</tr>
		<tr>
			<td>Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets in lightbox to close the portfolio."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_ElG_CI_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose in the gallery for the close box which size is approriate."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_ElG_CI_S" id="TotalSoft_ElG_CI_S" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_ElG_CI_S_Output" id="TotalSoft_ElG_CI_S_Output" for="TotalSoft_ElG_CI_S"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for closing the Thumbnail images in gallery portfolio."></i></td>
			<td><input type="text" name="" id="TotalSoft_ElG_CI_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_3">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Text to Show All <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter here the text, in which should be included all Images of Portfolio."></i></td>
			<td><input type="text" name="TotalSoft_FG_TSA" id="TotalSoft_FG_TSA" class="Total_Soft_Select" placeholder=" * Required" value=""></td>
			<td>Images Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the pictures border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_Im_BW" id="TotalSoft_FG_Im_BW" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="TotalSoft_FG_Im_BW_Output" id="TotalSoft_FG_Im_BW_Output" for="TotalSoft_FG_Im_BW"></output>
			</td>
		</tr>
		<tr>			
			<td>Images Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border color."></i></td>
			<td><input type="text" name="TotalSoft_FG_Im_BC" id="TotalSoft_FG_Im_BC" class="Total_Soft_Port_Color" value=""></td>
			<td>Place Between Images <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery, set the space between the images."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_PBI" id="TotalSoft_FG_PBI" min="0" max="15" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_PBI_Output" for="TotalSoft_FG_PBI"></output>
			</td>
		</tr>
		<tr>				
			<td>Different Size Images <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select, the images in gallery should be the different sizes or not, Each picture will be appropriate to the size by portfolio, or all in one size."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_FG_DSI" name="TotalSoft_FG_DSI">
		            <label for="TotalSoft_FG_DSI" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Menu Options</td>			
		</tr>
		<tr>
			<td>Main Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu main background color for gallery navigation, which includes the names of all categories portfolio."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Nav_MBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu background color for gallery navigation, which all the categories displayed in the main menu."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Nav_CurBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu text color for gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Nav_CurC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color for navigation menu."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Nav_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the menu font color. When Portfolio separated with options."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Nav_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size of navigation in the gallery of the portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_Nav_FS" id="TotalSoft_FG_Nav_FS" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="TotalSoft_FG_Nav_FS_Output" id="TotalSoft_FG_Nav_FS_Output" for="TotalSoft_FG_Nav_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="For the menu text choose the font family."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_FG_Nav_FF" id="TotalSoft_FG_Nav_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Nav_HBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a moving navigation color."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Nav_HC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>			
		</tr>
		<tr>			
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color of image title in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_TC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>	
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_TFS" id="TotalSoft_FG_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_FG_TFS_Output" id="TotalSoft_FG_TFS_Output" for="TotalSoft_FG_TFS"></output>
			</td>		
		</tr>
		<tr>			
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the image title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_FG_TFF" id="TotalSoft_FG_TFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Description Options</td>			
		</tr>
		<tr>
			<td>Show Description (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the description in gallery or not."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_FG_DShow" name="">
		            <label for="TotalSoft_FG_DShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title & Description Area</td>			
		</tr>
		<tr>
			<td>Background Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color for the text container for portfolio."></i></td>
			<td><input type="text" name="TotalSoft_FG_TDBgC" id="TotalSoft_FG_TDBgC" class="Total_Soft_Port_Color" value=""></td>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border width for the text container in the gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_TDBW" id="TotalSoft_FG_TDBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="TotalSoft_FG_TDBW_Output" id="TotalSoft_FG_TDBW_Output" for="TotalSoft_FG_TDBW"></output>
			</td>
		</tr>
		<tr>			
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable color for border."></i></td>
			<td><input type="text" name="TotalSoft_FG_TDBC" id="TotalSoft_FG_TDBC" class="Total_Soft_Port_Color" value=""></td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Overlay Option</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a color for the overlay on the image as you hold the mouse arrow on it."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Hov_Ov_Bg_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of hover effect."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Hov_Ov_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="hoverDivPort1">  Effect 1  </option>
					<option value="hoverDivPort2">  Effect 2  </option>
					<option value="hoverDivPort3">  Effect 3  </option>
					<option value="hoverDivPort4">  Effect 4  </option>
					<option value="hoverDivPort5">  Effect 5  </option>
					<option value="hoverDivPort6">  Effect 6  </option>
					<option value="hoverDivPort7">  Effect 7  </option>
					<option value="hoverDivPort8">  Effect 8  </option>
					<option value="hoverDivPort9">  Effect 9  </option>
					<option value="hoverDivPort10"> Effect 10 </option>
					<option value="hoverDivPort11"> Effect 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery portfolio."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Hov_Ov_Transition" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Hov_Ov_Transition_Output" for="TotalSoft_FG_Hov_Ov_Transition"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Line 1 Option</td>			
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the lines in image."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Hov_Line1_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width for the lines in image."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_FG_Hov_Line1_Width" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Hov_Line1_Width_Output" for="TotalSoft_FG_Hov_Line1_Width"></output>
			</td>
		</tr>
		<tr>
			
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define time of line effect for gallery portfolio."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Hov_Line1_Transition" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Hov_Line1_Transition_Output" for="TotalSoft_FG_Hov_Line1_Transition"></output>
			</td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of line effect for gallery portfolio."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Hov_Line1_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="HovLine1_4">  Effect 1 </option>
					<option value="HovLine1_5">  Effect 2 </option>
					<option value="HovLine1_6">  Effect 3 </option>
					<option value="HovLine1_7">  Effect 4 </option>
					<option value="HovLine1_8">  Effect 5 </option>
					<option value="HovLine1_9">  Effect 6 </option>
					<option value="HovLine1_10"> Effect 7 </option>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Line 2 Option</td>			
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the lines in image."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Hov_Line2_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width for the lines in image."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_FG_Hov_Line2_Width" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Hov_Line2_Width_Output" for="TotalSoft_FG_Hov_Line2_Width"></output>
			</td>
		</tr>
		<tr>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define time of line effect for gallery."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Hov_Line2_Transition" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Hov_Line2_Transition_Output" for="TotalSoft_FG_Hov_Line2_Transition"></output>
			</td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of line effect for gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Hov_Line2_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="HovLine2_4">  Effect 1 </option>
					<option value="HovLine2_5">  Effect 2 </option>
					<option value="HovLine2_6">  Effect 3 </option>
					<option value="HovLine2_7">  Effect 4 </option>
					<option value="HovLine2_8">  Effect 5 </option>
					<option value="HovLine2_9">  Effect 6 </option>
					<option value="HovLine2_10"> Effect 7 </option>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Raund Option</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the overlay on the image, as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Hov_Raund_Bg_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of hover effect."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Hov_Raund_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="hovRound1"> Effect 1 </option>
					<option value="hovRound2"> Effect 2 </option>
					<option value="hovRound3"> Effect 3 </option>
					<option value="hovRound4"> Effect 4 </option>
					<option value="hovRound5"> Effect 5 </option>
					<option value="hovRound6"> Effect 6 </option>
					<option value="hovRound7"> Effect 7 </option>
					<option value="hovRound8"> Effect 8 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define time of hover effect for gallery."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Hov_Raund_TRansition" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Hov_Raund_TRansition_Output" for="TotalSoft_FG_Hov_Raund_TRansition"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Icon Option</td>			
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Alter the size of the icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_Pop_Icon_Size" id="TotalSoft_FG_Pop_Icon_Size" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="TotalSoft_FG_Pop_Icon_Size_Output" id="TotalSoft_FG_Pop_Icon_Size_Output" for="TotalSoft_FG_Pop_Icon_Size"></output>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferable background color of the icons."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Pop_Icon_Bg_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border color for icon in the gallery popup container."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Pop_Icon_Border_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for popup icon."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_FG_Pop_Icon_Border_Size" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Pop_Icon_Border_Size_Output" for="TotalSoft_FG_Pop_Icon_Border_Size"></output>
			</td>
		</tr>
		<tr>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the effect type of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Pop_Icon_Hov_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="IconForPopup1"> Effect 1 </option>
					<option value="IconForPopup2"> Effect 2 </option>
					<option value="IconForPopup3"> Effect 3 </option>
					<option value="IconForPopup4"> Effect 4 </option>
					<option value="IconForPopup5"> Effect 5 </option>
					<option value="IconForPopup6"> Effect 6 </option>
					<option value="IconForPopup7"> Effect 7 </option>
					<option value="IconForPopup8"> Effect 8 </option>
					<option value="IconForPopup9"> Effect 9 </option>
				</select>
			</td>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time to increase the icon effect on the gallery. When you hover the mouse over the image you can see the icons effect."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Pop_Icon_Hov_Transition" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Pop_Icon_Hov_Transition_Output" for="TotalSoft_FG_Pop_Icon_Hov_Transition"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color of the icon."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Pop_Icon_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icons for image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Hov_Line2_Style" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
					<option value="4"> Type 4 </option>
					<option value="5"> Type 5 </option>
					<option value="6"> Type 6 </option>
					<option value="7"> Type 7 </option>
					<option value="8"> Type 8 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Icon Option</td>			
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link color which is in the image"></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_LC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_LHC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the image container."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Link_Icon_Border_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the effect type of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Link_Icon_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="IconForLink1"> Effect 1 </option>
					<option value="IconForLink2"> Effect 2 </option>
					<option value="IconForLink3"> Effect 3 </option>
					<option value="IconForLink4"> Effect 4 </option>
					<option value="IconForLink5"> Effect 5 </option>
					<option value="IconForLink6"> Effect 6 </option>
					<option value="IconForLink7"> Effect 7 </option>
					<option value="IconForLink8"> Effect 8 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time to increase the icon effect on the gallery. When you hover the mouse over the image you can see the icons effect."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Link_Icon_Transition" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Link_Icon_Transition_Output" for="TotalSoft_FG_Link_Icon_Transition"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Option</td>			
		</tr>
		<tr>
			<td>OverLay Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a color for the overlay."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Popup_Ov_Bg_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Start Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time interval for the opening of the gallery in milliseconds in the lightbox."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Popup_Start_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Popup_Start_Time_Output" for="TotalSoft_FG_Popup_Start_Time"></output>
			</td>
		</tr>
		<tr>
			<td>Stop Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set stop time for change of image."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Popup_Stop_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Popup_Stop_Time_Output" for="TotalSoft_FG_Popup_Stop_Time"></output>
			</td>
			<td>Time Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the time for effect which should be applied by images to changing albums or by clicking on the images to see the description."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Popup_Time_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="linear">         linear         </option>
					<option value="ease">           ease           </option>
					<option value="in">             in             </option>
					<option value="out">            out            </option>
					<option value="in-out">         in-out         </option>
					<option value="snap">           snap           </option>
					<option value="easeOutCubic">   easeOutCubic   </option>
					<option value="easeInOutCubic"> easeInOutCubic </option>
					<option value="easeInCirc">     easeInCirc     </option>
					<option value="easeOutCirc">    easeOutCirc    </option>
					<option value="easeInOutCirc">  easeInOutCirc  </option>
					<option value="easeInExpo">     easeInExpo     </option>
					<option value="easeOutExpo">    easeOutExpo    </option>
					<option value="easeInOutExpo">  easeInOutExpo  </option>
					<option value="easeInQuad">     easeInQuad     </option>
					<option value="easeOutQuad">    easeOutQuad    </option>
					<option value="easeInOutQuad">  easeInOutQuad  </option>
					<option value="easeInQuart">    easeInQuart    </option>
					<option value="easeOutQuart">   easeOutQuart   </option>
					<option value="easeInOutQuart"> easeInOutQuart </option>
					<option value="easeInQuint">    easeInQuint    </option>
					<option value="easeOutQuint">   easeOutQuint   </option>
					<option value="easeInOutQuint"> easeInOutQuint </option>
					<option value="easeInSine">     easeInSine     </option>
					<option value="easeOutSine">    easeOutSine    </option>
					<option value="easeInOutSine">  easeInOutSine  </option>
					<option value="easeInBack">     easeInBack     </option>
					<option value="easeOutBack">    easeOutBack    </option>
					<option value="easeInOutBack">  easeInOutBack  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the effect which will be applied to the images in the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Popup_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="fade">                 fade                 </option>
					<option value="scaleIn">              scaleIn              </option>
					<option value="scaleOut">             scaleOut             </option>
					<option value="flipX">                flipX                </option>
					<option value="flipY">                flipY                </option>
					<option value="slide">                slide                </option>
					<option value="translateLeft">        translateLeft        </option>
					<option value="translateRight">       translateRight       </option>
					<option value="translateTop">         translateTop         </option>
					<option value="translateBottom">      translateBottom      </option>
					<option value="translateTopLeft">     translateTopLeft     </option>
					<option value="translateTopRight">    translateTopRight    </option>
					<option value="translateBottomLeft">  translateBottomLeft  </option>
					<option value="translateBottomRight"> translateBottomRight </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Image Option</td>			
		</tr>
		<tr>
			<td>Width<i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image for lightbox and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_Slider_Img_Width" id="TotalSoft_FG_Slider_Img_Width" min="100" max="1000" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Slider_Img_Width_Output" for="TotalSoft_FG_Slider_Img_Width"></output>
			</td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the borders of images."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_FG_Slider_Img_Border_Width" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Slider_Img_Border_Width_Output" for="TotalSoft_FG_Slider_Img_Border_Width"></output>
			</td>
		</tr>
		<tr>
			
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the image border color which is in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Car_Slider_Img_Border_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Carousel Image Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preffered height of the carousel image and it is all responsive in portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_Car_Slider_Img_Height" id="TotalSoft_FG_Car_Slider_Img_Height" min="30" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Car_Slider_Img_Height_Output" for="TotalSoft_FG_Car_Slider_Img_Height"></output>
			</td>
		</tr>
		<tr>			
			<td>Carousel Image Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the borders of carousel images."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_FG_Car_Slider_Img_Border_Width" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Car_Slider_Img_Border_Width_Output" for="TotalSoft_FG_Car_Slider_Img_Border_Width"></output>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Carousel Option</td>			
		</tr>
		<tr>			
			<td>Pause Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set time interval for change of photos."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_FG_Slider_SShow_Paause_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Slider_SShow_Paause_Time_Output" for="TotalSoft_FG_Slider_SShow_Paause_Time"></output>
			</td>
			<td>Icon Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for slideshow in the carousel images."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Slider_Icon_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size, regardless of the container. The plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_Slider_Icon_Size_Time" id="TotalSoft_FG_Slider_Icon_Size_Time" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="TotalSoft_FG_Slider_Icon_Size_Time_Output" id="TotalSoft_FG_Slider_Icon_Size_Time_Output" for="TotalSoft_FG_Slider_Icon_Size_Time"></output>
			</td>
			<td>Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the gallery. In which the image should be placed for slide."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Slider_Icon_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
		</tr>
		<tr>			
			<td>Close Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose in the gallery for the close box which size is approriate."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_Slider_Del_Icon_Size" id="TotalSoft_FG_Slider_Del_Icon_Size" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="TotalSoft_FG_Slider_Del_Icon_Size_Output" id="TotalSoft_FG_Slider_Del_Icon_Size_Output" for="TotalSoft_FG_Slider_Del_Icon_Size"></output>
			</td>
			<td>Close Icon Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for close the images in gallery portfolio."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Slider_Del_Icon_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Close Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets in portfolio to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Slider_Del_Icon_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="1"> Type 1 </option>
					<option value="2"> Type 2 </option>
					<option value="3"> Type 3 </option>
				</select>
			</td>
			<td>Close Icon Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the close icon background color."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Slider_Del_Icon_Bg_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>			
			<td>Carousel Icon Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change images."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Car_Slider_Icon_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Carousel Icon Size (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of the arrow icon."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_FG_Car_Slider_Icon_Size" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_FG_Car_Slider_Icon_Size_Output" for="TotalSoft_FG_Car_Slider_Icon_Size"></output>
			</td>
		</tr>
		<tr>			
			<td>Carousel Icon Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_FG_Car_Slider_Icon_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="1">  Type 1  </option>
					<option value="2">  Type 2  </option>
					<option value="3">  Type 3  </option>
					<option value="4">  Type 4  </option>
					<option value="5">  Type 5  </option>
					<option value="6">  Type 6  </option>
					<option value="7">  Type 7  </option>
					<option value="8">  Type 8  </option>
					<option value="9">  Type 9  </option>
					<option value="10"> Type 10 </option>
					<option value="11"> Type 11 </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Image Title Option</td>			
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the popup window. You can select font size for title. For each screen or mobile version will be its size for responsiveness."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_FG_Pop_Title_Font_Size" id="TotalSoft_FG_Pop_Title_Font_Size" min="12" max="36" value="">
				<output class="TotalSoft_Out" name="TotalSoft_FG_Pop_Title_Font_Size_Output" id="TotalSoft_FG_Pop_Title_Font_Size_Output" for="TotalSoft_FG_Pop_Title_Font_Size"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title, used with image in a popup window."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_FG_Pop_Title_Font_Family" id="TotalSoft_FG_Pop_Title_Font_Family">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In gallery it is necessary to choose the color for image titles which is in the popup window."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Pop_Title_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for lightbox title."></i></td>
			<td><input type="text" name="" id="TotalSoft_FG_Pop_Title_Bg_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>		
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_4">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_W" id="TotalSoft_Port_CP_W" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_W_Output" for="TotalSoft_Port_CP_W"></output>
			</td>
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between each image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_PB" id="TotalSoft_Port_CP_PB" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_PB_Output" for="TotalSoft_Port_CP_PB"></output>
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value for the image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_BoxSh" id="TotalSoft_Port_CP_BoxSh" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_BoxSh_Output" id="TotalSoft_Port_CP_BoxSh_Output" for="TotalSoft_Port_CP_BoxSh"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select shadow color which allows to show the shadow color of the image."></i></td>
			<td><input type="text" name="TotalSoft_Port_CP_BoxShC" id="TotalSoft_Port_CP_BoxShC" class="Total_Soft_Port_Color" value=""></td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred width of the border for image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_VBW" id="TotalSoft_Port_CP_VBW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_VBW_Output" id="TotalSoft_Port_CP_VBW_Output" for="TotalSoft_Port_CP_VBW"></output>
			</td>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the image border and you can change it at any time. Select 4 different types of borders: Solid, Dotted, Dashed, Double."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_VBS" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the image border color which is in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_VBC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border radius in your gallery image."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_Port_CP_VBR" min="0" max="200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_VBR_Output" for="TotalSoft_Port_CP_VBR"></output>
			</td>
		</tr>
		<tr>
			<td>Zoom Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the type of scaling of different and beautifully designed sets from the image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Img_Zoom_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="TotPortImgHov1"> Effect 1 </option>
					<option value="TotPortImgHov2"> Effect 2 </option>
					<option value="TotPortImgHov3"> Effect 3 </option>
					<option value="TotPortImgHov4"> Effect 4 </option>
					<option value="TotPortImgHov5"> Effect 5 </option>
					<option value="TotPortImgHov6"> Effect 6 </option>
					<option value="TotPortImgHov7"> Effect 7 </option>
				</select>
			</td>
			<td>Zoom Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time to increase the effect on the gallery. When you hover the mouse over the image you can see the zoom effect."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_Port_CP_Img_Zoom_Effect_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_Img_Zoom_Effect_Time_Output" for="TotalSoft_Port_CP_Img_Zoom_Effect_Time"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Overlay Option</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color for the overlay on the image as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable in the gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Hov_Ov_Bg_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Effect Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the Hover Effect type. There are 13 effects type in lightbox gallery. They are all differenet from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Hov_Ov_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="TotPortImgOv1">  Effect 1  </option>
					<option value="TotPortImgOv2">  Effect 2  </option>
					<option value="TotPortImgOv3">  Effect 3  </option>
					<option value="TotPortImgOv4">  Effect 4  </option>
					<option value="TotPortImgOv5">  Effect 5  </option>
					<option value="TotPortImgOv6">  Effect 6  </option>
					<option value="TotPortImgOv7">  Effect 7  </option>
					<option value="TotPortImgOv8">  Effect 8  </option>
					<option value="TotPortImgOv9">  Effect 9  </option>
					<option value="TotPortImgOv10"> Effect 10 </option>
					<option value="TotPortImgOv11"> Effect 11 </option>
					<option value="TotPortImgOv12"> Effect 12 </option>
					<option value="TotPortImgOv13"> Effect 13 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_Port_CP_Hov_Ov_Effect_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_Hov_Ov_Effect_Time_Output" for="TotalSoft_Port_CP_Hov_Ov_Effect_Time"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Option</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the text container."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Title_Bg_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font size for the image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Title_Font_Size" id="TotalSoft_Port_CP_Title_Font_Size" min="10" max="36" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Title_Font_Size_Output" id="TotalSoft_Port_CP_Title_Font_Size_Output" for="TotalSoft_Port_CP_Title_Font_Size"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for your title which will be seen in gallery."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Title_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Hover Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Title_Effect_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="TotPortHovTit1">  Effect 1  </option>
					<option value="TotPortHovTit2">  Effect 2  </option>
					<option value="TotPortHovTit3">  Effect 3  </option>
					<option value="TotPortHovTit4">  Effect 4  </option>
					<option value="TotPortHovTit5">  Effect 5  </option>
					<option value="TotPortHovTit6">  Effect 6  </option>
					<option value="TotPortHovTit7">  Effect 7  </option>
					<option value="TotPortHovTit8">  Effect 8  </option>
					<option value="TotPortHovTit9">  Effect 9  </option>
					<option value="TotPortHovTit10"> Effect 10 </option>
					<option value="TotPortHovTit11"> Effect 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_Port_CP_Title_Effect_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_Title_Effect_Time_Output" for="TotalSoft_Port_CP_Title_Effect_Time"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the title. Gallery has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_CP_Title_FF" id="TotalSoft_Port_CP_Title_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Line Option</td>			
		</tr>
		<tr>
			<td>Line Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Line_Width" id="TotalSoft_Port_CP_Line_Width" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_Line_Width_Output" for="TotalSoft_Port_CP_Line_Width"></output>
			</td>
			<td>Line Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the style to be applied to the line."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_CP_Line_Style" id="TotalSoft_Port_CP_Line_Style">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Line Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation."></i></td>
			<td><input type="text" name="TotalSoft_Port_CP_Line_Color" id="TotalSoft_Port_CP_Line_Color" class="Total_Soft_Port_Color" value=""></td>
			<td>Effect Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="There are 7 different line effect types in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_CP_Line_Hov_Type" id="TotalSoft_Port_CP_Line_Hov_Type">
					<option value="TotPortHovLine1"> Effect 1 </option>
					<option value="TotPortHovLine2"> Effect 2 </option>
					<option value="TotPortHovLine3"> Effect 3 </option>
					<option value="TotPortHovLine4"> Effect 4 </option>
					<option value="TotPortHovLine5"> Effect 5 </option>
					<option value="TotPortHovLine6"> Effect 6 </option>
					<option value="TotPortHovLine7"> Effect 7 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover line effect for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="TotalSoft_Port_CP_Line_Hov_Time" id="TotalSoft_Port_CP_Line_Hov_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_Line_Hov_Time_Output" for="TotalSoft_Port_CP_Line_Hov_Time"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Option</td>			
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the link button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Link_Font_Size" id="TotalSoft_Port_CP_Link_Font_Size" min="10" max="36" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Link_Font_Size_Output" id="TotalSoft_Port_CP_Link_Font_Size_Output" for="TotalSoft_Port_CP_Link_Font_Size"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button which you will see in image."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Link_Color" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the image container."></i></td>
			<td><input type="text" name="TotalSoft_Port_CP_Link_Border_Color" id="TotalSoft_Port_CP_Link_Border_Color" class="Total_Soft_Port_Color" value=""></td>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width which is in the image container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Link_Border_Width" id="TotalSoft_Port_CP_Link_Border_Width" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Link_Border_Width_Output" id="TotalSoft_Port_CP_Link_Border_Width_Output" for="TotalSoft_Port_CP_Link_Border_Width"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border style."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_CP_Link_Border_Style" id="TotalSoft_Port_CP_Link_Border_Style">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Link Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL."></i></td>
			<td><input type="text" name="TotalSoft_Port_CP_Link_Text" id="TotalSoft_Port_CP_Link_Text"  value=""></td>
		</tr>
		<tr>
			<td>Hover Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable link type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Link_Hov_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="TotPortHovLink1"> Effect 1 </option>
					<option value="TotPortHovLink2"> Effect 2 </option>
					<option value="TotPortHovLink3"> Effect 3 </option>
					<option value="TotPortHovLink4"> Effect 4 </option>
					<option value="TotPortHovLink5"> Effect 5 </option>
					<option value="TotPortHovLink6"> Effect 6 </option>
					<option value="TotPortHovLink7"> Effect 7 </option>
					<option value="TotPortHovLink8"> Effect 8 </option>
					<option value="TotPortHovLink9"> Effect 9 </option>
				</select>
			</td>
			<td>Hover Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_Port_CP_Link_Hov_Time" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_Link_Hov_Time_Output" for="TotalSoft_Port_CP_Link_Hov_Time"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the link button. Gallery has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_CP_Link_FF" id="TotalSoft_Port_CP_Link_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Option</td>			
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose your preferable background color for popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Pop_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Border Width (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a popup window."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_Port_CP_Pop_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_Pop_BW_Output" for="TotalSoft_Port_CP_Pop_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Pop_BS" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Pop_BC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the popup window it is possible to give a border radius. You can specify the radius of the pixels. In gallery it is all responsive."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Pop_BR" id="TotalSoft_Port_CP_Pop_BR" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_CP_Pop_BR_Output" for="TotalSoft_Port_CP_Pop_BR"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title in Popup Option</td>			
		</tr>
		<tr>
			<td>Show (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title or not in popup."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_CP_Pop_TShow" name="">
		            <label for="TotalSoft_Port_CP_Pop_TShow" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Text Align (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text to align for title (left, center and right)."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Pop_TTA" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Pop_TFS" id="TotalSoft_Port_CP_Pop_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Pop_TFS_Output" id="TotalSoft_Port_CP_Pop_TFS_Output" for="TotalSoft_Port_CP_Pop_TFS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the image title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_CP_Pop_TFF" id="TotalSoft_Port_CP_Pop_TFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery set the color for the image title."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Pop_TC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Play Icon Option</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Pop_PType" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="play-circle">   Type 1 </option>
					<option value="play-circle-o"> Type 2 </option>
					<option value="play">          Type 3 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of the play icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Pop_PIS" id="TotalSoft_Port_CP_Pop_PIS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Pop_PIS_Output" id="TotalSoft_Port_CP_Pop_PIS_Output" for="TotalSoft_Port_CP_Pop_PIS"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change images."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Pop_PIC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Option</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets in portfolio to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Pop_CType" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="times">          Type 1 </option>
					<option value="times-circle-o"> Type 2 </option>
					<option value="times-circle">   Type 3 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose in the gallery for the close box which size is approriate."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Pop_CIS" id="TotalSoft_Port_CP_Pop_CIS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Pop_CIS_Output" id="TotalSoft_Port_CP_Pop_CIS_Output" for="TotalSoft_Port_CP_Pop_CIS"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for close the popup."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Pop_CIC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in close button."></i></td>
			<td><input type="text" name="TotalSoft_Port_CP_Pop_CIT" id="TotalSoft_Port_CP_Pop_CIT" maxlength="10" class="Total_Soft_Select" value=""></td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for close button."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_CP_Pop_CTF" id="TotalSoft_Port_CP_Pop_CTF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Option</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for popup which are for change the images by sequence."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_CP_Pop_AType" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="angle-double">   Type 1  </option>
					<option value="angle">          Type 2  </option>
					<option value="arrow-circle">   Type 3  </option>
					<option value="arrow-circle-o"> Type 4  </option>
					<option value="arrow">          Type 5  </option>
					<option value="caret">          Type 6  </option>
					<option value="caret-square-o"> Type 7  </option>
					<option value="chevron-circle"> Type 8  </option>
					<option value="chevron">        Type 9  </option>
					<option value="hand-o">         Type 10 </option>
					<option value="long-arrow">     Type 11 </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The gallery portfolio plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Pop_ArrS" id="TotalSoft_Port_CP_Pop_ArrS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Pop_ArrS_Output" id="TotalSoft_Port_CP_Pop_ArrS_Output" for="TotalSoft_Port_CP_Pop_ArrS"></output>
			</td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change the image."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Pop_ArrC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Numbers Option</td>			
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Note the size of the numbers. It is fully responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Pop_NFS" id="TotalSoft_Port_CP_Pop_NFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Pop_NFS_Output" id="TotalSoft_Port_CP_Pop_NFS_Output" for="TotalSoft_Port_CP_Pop_NFS"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the numbers."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Pop_NC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Menu Options</td>			
		</tr>
		<tr>
			<td>Show Menu <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu should appear or not by Yes or No via buttons."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_CP_SM" name="TotalSoft_Port_CP_SM">
		            <label for="TotalSoft_Port_CP_SM" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Text to Show All <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write name that will be appear in the line of menu bar. Here will be included all albums."></i></td>
			<td><input type="text" name="TotalSoft_Port_CP_TSA" id="TotalSoft_Port_CP_TSA" class="Total_Soft_Select" placeholder=" * Required" value=""></td>			
		</tr>
		<tr>
			<td>Main Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu main background color for gallery navigation which includes the names of all categories portfolio."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Nav_MBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Current Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu background color for gallery navigation which all the categories displayed in the main menu."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Nav_CurBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Current Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu current color for gallery navigation which all the categories displayed in the main menu."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Nav_CurC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color for navigation menu."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Nav_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the menu font color. When portfolio separated with options."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Nav_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size of navigation in the gallery of the portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_CP_Nav_FS" id="TotalSoft_Port_CP_Nav_FS" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_CP_Nav_FS_Output" id="TotalSoft_Port_CP_Nav_FS_Output" for="TotalSoft_Port_CP_Nav_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="For the menu text choose the font family."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_CP_Nav_FF" id="TotalSoft_Port_CP_Nav_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for hover."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Nav_HBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu font color when the portfolio is separated by categories."></i></td>
			<td><input type="text" name="" id="TotalSoft_Port_CP_Nav_HC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_5">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>SlideShow Button (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the slideshow button in gallery or no."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_SP_PP_Show" name="">
		            <label for="TotalSoft_Port_SP_PP_Show" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>AutoPlay (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified autoplay for slideshow will be disabled."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_SP_AP" name="">
		            <label for="TotalSoft_Port_SP_AP" data-on="Yes" data-off="No"></label>
		        </div>
			</td>			
		</tr>
		<tr>
			<td>Pause Time (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set time interval for change of photos."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_Port_SP_PT" min="1" max="20" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_SP_PT_Output" for="TotalSoft_Port_SP_PT"></output>
			</td>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the slider and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangeper" name="TotalSoft_Port_SP_W" id="TotalSoft_Port_SP_W" min="40" max="100" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_SP_W_Output" for="TotalSoft_Port_SP_W"></output>
			</td>			
		</tr>
		<tr>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the slider and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_SP_H" id="TotalSoft_Port_SP_H" min="150" max="1000" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_SP_H_Output" for="TotalSoft_Port_SP_H"></output>
			</td>
			<td>Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the slider: center, right, left."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_SP_Pos" id="TotalSoft_Port_SP_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>			
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_SP_BW" id="TotalSoft_Port_SP_BW" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_SP_BW_Output" id="TotalSoft_Port_SP_BW_Output" for="TotalSoft_Port_SP_BW"></output>
			</td>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the frame style for slider."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_SP_BS" id="TotalSoft_Port_SP_BS">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>			
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border color for slider."></i></td>
			<td>
				<input type="text" name="TotalSoft_Port_SP_BC" id="TotalSoft_Port_SP_BC" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Tooltips (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the tooltips in slider or no."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_SP_TT_Show" name="">
		            <label for="TotalSoft_Port_SP_TT_Show" data-on="Yes" data-off="No"></label>
		        </div>
			</td>			
		</tr>
		<tr>
			<td>Transition Effect (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the desired transition effect from the list."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_SP_Tr_Eff" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="random"> Random </option>
					<option value="rotateSlideOut_rotateSlideIn"> Rotate Slide Out Rotate Slide In </option>
					<option value="rotateSidesOut_rotateSidesInDelay"> Rotate Sides Out Rotate Sides In Delay </option>
					<option value="rotateCarouselBottomOut_rotateCarouselBottomIn"> Rotate Carousel Bottom Out Rotate Carousel Bottom In </option>
					<option value="rotateCarouselTopOut_rotateCarouselTopIn"> Rotate Carousel Top Out Rotate Carousel Top In </option>
					<option value="rotateCarouselRightOut_rotateCarouselRightIn"> Rotate Carousel Right Out Rotate Carousel Right In </option>
					<option value="rotateCarouselLeftOut_rotateCarouselLeftIn"> Rotate Carousel Left Out Rotate Carousel Left In </option>
					<option value="rotateCubeBottomOut_rotateCubeBottomIn"> Rotate Cube Bottom Out Rotate Cube Bottom In </option>
					<option value="rotateCubeTopOut_rotateCubeTopIn"> Rotate Cube Top Out Rotate Cube Top In </option>
					<option value="rotateCubeRightOut_rotateCubeRightIn"> Rotate Cube Right Out Rotate Cube Right In </option>
					<option value="rotateCubeLeftOut_rotateCubeLeftIn"> Rotate Cube Left Out Rotate Cube Left In </option>
					<option value="rotateRoomBottomOut_rotateRoomBottomIn"> Rotate Room Bottom Out Rotate Room Bottom In </option>
					<option value="rotateRoomTopOut_rotateRoomTopIn"> Rotate Room Top Out Rotate Room Top In </option>
					<option value="rotateRoomRightOut_rotateRoomRightIn"> Rotate Room Right Out Rotate Room Right In </option>
					<option value="rotateRoomLeftOut_rotateRoomLeftIn"> Rotate Room Left Out Rotate Room Left In </option>
					<option value="moveToTopFade_rotateUnfoldBottom"> Move To Top Fade Rotate Unfold Bottom </option>
					<option value="moveToBottomFade_rotateUnfoldTop"> Move To Bottom Fade Rotate Unfold Top </option>
					<option value="moveToLeftFade_rotateUnfoldRight"> Move To Left Fade Rotate Unfold Right </option>
					<option value="moveToRightFade_rotateUnfoldLeft"> Move To Right Fade Rotate Unfold Left </option>
					<option value="rotateFoldBottom_moveFromTopFade"> Rotate Fold Bottom Move From Top Fade </option>
					<option value="rotateFoldTop_moveFromBottomFade"> Rotate Fold Top Move From Bottom Fade </option>
					<option value="rotateFoldRight_moveFromLeftFade"> Rotate Fold Right Move From Left Fade </option>
					<option value="rotateFoldLeft_moveFromRightFade"> Rotate Fold Left Move From Right Fade </option>
					<option value="rotatePushBottom_page"> Rotate Push Bottom Page </option>
					<option value="rotatePushTop_rotatePullBottom"> Rotate Push Top Rotate Pull Bottom </option>
					<option value="rotatePushRight_rotatePullLeft"> Rotate Push Right Rotate Pull Left </option>
					<option value="rotatePushLeft_rotatePullRight"> Rotate Push Left Rotate Pull Right </option>
					<option value="rotatePushBottom_moveFromTop"> Rotate Push Bottom Move From Top </option>
					<option value="rotatePushTop_moveFromBottom"> Rotate Push Top Move From Bottom </option>
					<option value="rotatePushRight_moveFromLeft"> Rotate Push Right Move From Left </option>
					<option value="rotatePushLeft_moveFromRight"> Rotate Push Left Move From Right </option>
					<option value="rotateOutNewspaper_rotateInNewspaper"> Rotate Out Newspaper Rotate In Newspaper </option>
					<option value="rotateFall_scaleUp"> Rotate Fall Scale Up </option>
					<option value="flipOutBottom_flipInTop"> Flip Out Bottom Flip In Top </option>
					<option value="flipOutTop_flipInBottom"> Flip Out Top Flip In Bottom </option>
					<option value="flipOutLeft_flipInRight"> Flip Out Left Flip In Right </option>
					<option value="flipOutRight_flipInLeft"> Flip Out Right Flip In Left </option>
					<option value="rotateBottomSideFirst_moveFromBottom"> Rotate Bottom Side First Move From Bottom </option>
					<option value="rotateTopSideFirst_moveFromTop"> Rotate Top Side First Move From Top </option>
					<option value="rotateLeftSideFirst_moveFromLeft"> Rotate Left Side First Move From Left </option>
					<option value="rotateRightSideFirst_moveFromRight"> Rotate Right Side First Move From Right </option>
					<option value="scaleDownCenter_scaleUpCenter"> Scale Down Center Scale Up Center </option>
					<option value="moveToBottom_scaleUp"> Move To Bottom Scale Up </option>
					<option value="moveToTop_scaleUp"> Move To Top Scale Up </option>
					<option value="moveToRight_scaleUp"> Move To Right Scale Up </option>
					<option value="moveToLeft_scaleUp"> Move To Left Scale Up </option>
					<option value="scaleDownUp_scaleUp"> Scale Down Up Scale Up </option>
					<option value="scaleDown_scaleUpDown"> Scale Down Scale Up Down </option>
					<option value="scaleDown_moveFromTop"> Scale Down Move From Top </option>
					<option value="scaleDown_moveFromBottom"> Scale Down Move From Bottom </option>
					<option value="scaleDown_moveFromLeft"> Scale Down Move From Left </option>
					<option value="scaleDown_moveFromRight"> Scale Down Move From Right </option>
					<option value="moveToBottomEasing_moveFromTop"> Move To Bottom Easing Move From Top </option>
					<option value="moveToTopEasing_moveFromBottom"> Move To Top Easing Move From Bottom </option>
					<option value="moveToRightEasing_moveFromLeft"> Move To Right Easing Move From Left </option>
					<option value="moveToLeftEasing_moveFromRight"> Move To Left Easing Move From Right </option>
					<option value="moveToBottomFade_moveFromTopFade"> Move To Bottom Fade Move From Top Fade </option>
					<option value="moveToTopFade_moveFromBottomFade"> Move To Top Fade Move From Bottom Fade </option>
					<option value="moveToRightFade_moveFromLeftFade"> Move To Right Fade Move From Left Fade </option>
					<option value="moveToLeftFade_moveFromRightFade"> Move To Left Fade Move From Right Fade </option>
					<option value="fade_moveFromTop"> Fade Move From Top </option>
					<option value="fade_moveFromBottom"> Fade Move From Bottom </option>
					<option value="fade_moveFromLeft"> Fade Move From Left </option>
					<option value="fade_moveFromRight"> Fade Move From Right </option>
					<option value="moveToBottom_moveFromTop"> Move To Bottom From Top </option>
					<option value="moveToTop_moveFromBottom"> Move To Top From Bottom </option>
					<option value="moveToRight_moveFromLeft"> Move To Right From Left </option>
					<option value="moveToLeft_moveFromRight"> Move To Left From Right </option>
				</select>
			</td>
			<td>Backward Effect (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the desired backward effect from the list."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_SP_TrB_Eff" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="random"> Random </option>
					<option value="rotateSlideOut_rotateSlideIn"> Rotate Slide Out Rotate Slide In </option>
					<option value="rotateSidesOut_rotateSidesInDelay"> Rotate Sides Out Rotate Sides In Delay </option>
					<option value="rotateCarouselBottomOut_rotateCarouselBottomIn"> Rotate Carousel Bottom Out Rotate Carousel Bottom In </option>
					<option value="rotateCarouselTopOut_rotateCarouselTopIn"> Rotate Carousel Top Out Rotate Carousel Top In </option>
					<option value="rotateCarouselRightOut_rotateCarouselRightIn"> Rotate Carousel Right Out Rotate Carousel Right In </option>
					<option value="rotateCarouselLeftOut_rotateCarouselLeftIn"> Rotate Carousel Left Out Rotate Carousel Left In </option>
					<option value="rotateCubeBottomOut_rotateCubeBottomIn"> Rotate Cube Bottom Out Rotate Cube Bottom In </option>
					<option value="rotateCubeTopOut_rotateCubeTopIn"> Rotate Cube Top Out Rotate Cube Top In </option>
					<option value="rotateCubeRightOut_rotateCubeRightIn"> Rotate Cube Right Out Rotate Cube Right In </option>
					<option value="rotateCubeLeftOut_rotateCubeLeftIn"> Rotate Cube Left Out Rotate Cube Left In </option>
					<option value="rotateRoomBottomOut_rotateRoomBottomIn"> Rotate Room Bottom Out Rotate Room Bottom In </option>
					<option value="rotateRoomTopOut_rotateRoomTopIn"> Rotate Room Top Out Rotate Room Top In </option>
					<option value="rotateRoomRightOut_rotateRoomRightIn"> Rotate Room Right Out Rotate Room Right In </option>
					<option value="rotateRoomLeftOut_rotateRoomLeftIn"> Rotate Room Left Out Rotate Room Left In </option>
					<option value="moveToTopFade_rotateUnfoldBottom"> Move To Top Fade Rotate Unfold Bottom </option>
					<option value="moveToBottomFade_rotateUnfoldTop"> Move To Bottom Fade Rotate Unfold Top </option>
					<option value="moveToLeftFade_rotateUnfoldRight"> Move To Left Fade Rotate Unfold Right </option>
					<option value="moveToRightFade_rotateUnfoldLeft"> Move To Right Fade Rotate Unfold Left </option>
					<option value="rotateFoldBottom_moveFromTopFade"> Rotate Fold Bottom Move From Top Fade </option>
					<option value="rotateFoldTop_moveFromBottomFade"> Rotate Fold Top Move From Bottom Fade </option>
					<option value="rotateFoldRight_moveFromLeftFade"> Rotate Fold Right Move From Left Fade </option>
					<option value="rotateFoldLeft_moveFromRightFade"> Rotate Fold Left Move From Right Fade </option>
					<option value="rotatePushBottom_page"> Rotate Push Bottom Page </option>
					<option value="rotatePushTop_rotatePullBottom"> Rotate Push Top Rotate Pull Bottom </option>
					<option value="rotatePushRight_rotatePullLeft"> Rotate Push Right Rotate Pull Left </option>
					<option value="rotatePushLeft_rotatePullRight"> Rotate Push Left Rotate Pull Right </option>
					<option value="rotatePushBottom_moveFromTop"> Rotate Push Bottom Move From Top </option>
					<option value="rotatePushTop_moveFromBottom"> Rotate Push Top Move From Bottom </option>
					<option value="rotatePushRight_moveFromLeft"> Rotate Push Right Move From Left </option>
					<option value="rotatePushLeft_moveFromRight"> Rotate Push Left Move From Right </option>
					<option value="rotateOutNewspaper_rotateInNewspaper"> Rotate Out Newspaper Rotate In Newspaper </option>
					<option value="rotateFall_scaleUp"> Rotate Fall Scale Up </option>
					<option value="flipOutBottom_flipInTop"> Flip Out Bottom Flip In Top </option>
					<option value="flipOutTop_flipInBottom"> Flip Out Top Flip In Bottom </option>
					<option value="flipOutLeft_flipInRight"> Flip Out Left Flip In Right </option>
					<option value="flipOutRight_flipInLeft"> Flip Out Right Flip In Left </option>
					<option value="rotateBottomSideFirst_moveFromBottom"> Rotate Bottom Side First Move From Bottom </option>
					<option value="rotateTopSideFirst_moveFromTop"> Rotate Top Side First Move From Top </option>
					<option value="rotateLeftSideFirst_moveFromLeft"> Rotate Left Side First Move From Left </option>
					<option value="rotateRightSideFirst_moveFromRight"> Rotate Right Side First Move From Right </option>
					<option value="scaleDownCenter_scaleUpCenter"> Scale Down Center Scale Up Center </option>
					<option value="moveToBottom_scaleUp"> Move To Bottom Scale Up </option>
					<option value="moveToTop_scaleUp"> Move To Top Scale Up </option>
					<option value="moveToRight_scaleUp"> Move To Right Scale Up </option>
					<option value="moveToLeft_scaleUp"> Move To Left Scale Up </option>
					<option value="scaleDownUp_scaleUp"> Scale Down Up Scale Up </option>
					<option value="scaleDown_scaleUpDown"> Scale Down Scale Up Down </option>
					<option value="scaleDown_moveFromTop"> Scale Down Move From Top </option>
					<option value="scaleDown_moveFromBottom"> Scale Down Move From Bottom </option>
					<option value="scaleDown_moveFromLeft"> Scale Down Move From Left </option>
					<option value="scaleDown_moveFromRight"> Scale Down Move From Right </option>
					<option value="moveToBottomEasing_moveFromTop"> Move To Bottom Easing Move From Top </option>
					<option value="moveToTopEasing_moveFromBottom"> Move To Top Easing Move From Bottom </option>
					<option value="moveToRightEasing_moveFromLeft"> Move To Right Easing Move From Left </option>
					<option value="moveToLeftEasing_moveFromRight"> Move To Left Easing Move From Right </option>
					<option value="moveToBottomFade_moveFromTopFade"> Move To Bottom Fade Move From Top Fade </option>
					<option value="moveToTopFade_moveFromBottomFade"> Move To Top Fade Move From Bottom Fade </option>
					<option value="moveToRightFade_moveFromLeftFade"> Move To Right Fade Move From Left Fade </option>
					<option value="moveToLeftFade_moveFromRightFade"> Move To Left Fade Move From Right Fade </option>
					<option value="fade_moveFromTop"> Fade Move From Top </option>
					<option value="fade_moveFromBottom"> Fade Move From Bottom </option>
					<option value="fade_moveFromLeft"> Fade Move From Left </option>
					<option value="fade_moveFromRight"> Fade Move From Right </option>
					<option value="moveToBottom_moveFromTop"> Move To Bottom From Top </option>
					<option value="moveToTop_moveFromBottom"> Move To Top From Bottom </option>
					<option value="moveToRight_moveFromLeft"> Move To Right From Left </option>
					<option value="moveToLeft_moveFromRight"> Move To Left From Right </option>
				</select>
			</td>			
		</tr>
		<tr>
			<td>Transition Cols (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the number of transition cols which will be shown."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range" name="" id="TotalSoft_Port_SP_Tr_Cols" min="1" max="20" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_SP_Tr_Cols_Output" for="TotalSoft_Port_SP_Tr_Cols"></output>
			</td>
			<td>Transition Rows (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the number of transition rows which will be shown."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range" name="" id="TotalSoft_Port_SP_Tr_Rows" min="1" max="20" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_SP_Tr_Rows_Output" for="TotalSoft_Port_SP_Tr_Rows"></output>
			</td>			
		</tr>	
		<tr>
			<td>Transition Duration (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Duration of transition between slides."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_Port_SP_Tr_Dur" min="1" max="50" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_SP_Tr_Dur_Output" for="TotalSoft_Port_SP_Tr_Dur"></output>
			</td>
			<td>Swipe Effect (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the swipe effect in slider or no."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_SP_Seff" name="">
		            <label for="TotalSoft_Port_SP_Seff" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>	
		<tr class="Total_Soft_Titles">
			<td colspan="4">Album Title</td>			
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the album title. It is also designed for menu."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_SP_AT_FS" id="TotalSoft_Port_SP_AT_FS" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_SP_AT_FS_Output" id="TotalSoft_Port_SP_AT_FS_Output" for="TotalSoft_Port_SP_AT_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font family for the album title. It is also designed for menu."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_SP_AT_FF" id="TotalSoft_Port_SP_AT_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for the album title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_AT_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_AT_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Albums Select Menu</td>			
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose your preferable color for select menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_ASM_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose your preferable background color for select menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_ASM_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu font color when the portfolio is separated by categories."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_ASM_HC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Select the menu background color when the portfolio is separated by categories."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_ASM_HBgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Image Title</td>			
		</tr>
		<tr>
			<td>Show Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title in slider or no for image."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_SP_IT_Show" name="TotalSoft_Port_SP_IT_Show">
		            <label for="TotalSoft_Port_SP_IT_Show" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the slider: center, right, left."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_SP_IT_Pos" id="TotalSoft_Port_SP_IT_Pos">
					<option value="false"> Standard </option>
					<option value="true">  On Image </option>
				</select>
			</td>			
		</tr>
		<tr>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_IT_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_IT_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>	
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine your preferred font size for image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_SP_IT_FS" id="TotalSoft_Port_SP_IT_FS" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_SP_IT_FS_Output" id="TotalSoft_Port_SP_IT_FS_Output" for="TotalSoft_Port_SP_IT_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_SP_IT_FF" id="TotalSoft_Port_SP_IT_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Thumbnails</td>			
		</tr>
		<tr>
			<td>Width in Full Screen <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width of the full screen view in lightbox."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_SP_Th_FW" id="TotalSoft_Port_SP_Th_FW" min="100" max="200" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_SP_Th_FW_Output" for="TotalSoft_Port_SP_Th_FW"></output>
			</td>
			<td>Height in Full Screen <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the height of the full screen view in lightbox."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_SP_Th_FH" id="TotalSoft_Port_SP_Th_FH" min="100" max="200" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_SP_Th_FH_Output" for="TotalSoft_Port_SP_Th_FH"></output>
			</td>
		</tr>
		<tr>
			<td>Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose position for the thumbnail."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_SP_Th_Pos" id="TotalSoft_Port_SP_Th_Pos">
					<option value="top">    Top    </option>
					<option value="bottom"> Bottom </option>
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
				</select>
			</td>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select one of this three options for thumbnails view."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_SP_Th_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="image">  Image  </option>
					<option value="square"> Square </option>
					<option value="number"> Number </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the thumbnails."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_Th_BgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the thumbnails."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_Th_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Area Background (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose area background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_Th_ABgC" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">				
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Icons Settings</td>			
		</tr>		
		<tr>
			<td>Zoom Show (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the zoom icon in slider or no."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_SP_Zoom_Show" name="">
		            <label for="TotalSoft_Port_SP_Zoom_Show" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Zoom Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the zoom icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_Zoom_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Full Screen Show (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the full screen icon in slider or no."></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_SP_TogT_Show" name="">
		            <label for="TotalSoft_Port_SP_TogT_Show" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Full Screen Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the full screen icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_Full_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>			
		</tr>
		<tr>			
			<td>Play/Pause Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the play/pause icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_PP_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td>Album Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for the album icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_Album_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrow Settings</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the slider."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_SP_Arr_Type" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="angle-double">   Type 1  </option>
					<option value="angle">          Type 2  </option>
					<option value="arrow-circle">   Type 3  </option>
					<option value="arrow-circle-o"> Type 4  </option>
					<option value="arrow">          Type 5  </option>
					<option value="caret">          Type 6  </option>
					<option value="caret-square-o"> Type 7  </option>
					<option value="chevron-circle"> Type 8  </option>
					<option value="chevron">        Type 9  </option>
					<option value="hand-o">         Type 10 </option>
					<option value="long-arrow">     Type 11 </option>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change pictures slider."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_SP_Arr_C" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_6">
		<tr class="Total_Soft_Titles">
			<td colspan="4">Album Options</td>			
		</tr>
		<tr>
			<td>Hover Effect (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_GAA_01" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="Effect 1"> Effect 1 </option>
					<option value="Effect 2"> Effect 2 </option>
					<option value="Effect 3"> Effect 3 </option>
					<option value="Effect 4"> Effect 4 </option>
					<option value="Effect 5"> Effect 5 </option>
				</select>
			</td>
			<td>Album/Description Position (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_GAA_02" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="Position 1"> Left/Right </option>
					<option value="Position 2"> Top/Bottom </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Position Reverse <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_GAA_03" name="TotalSoft_Port_GAA_03">
		            <label for="TotalSoft_Port_GAA_03" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Hover Overlay Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_04" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_GAA_05" id="TotalSoft_Port_GAA_05" min="0" max="1200" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_GAA_05_Output" for="TotalSoft_Port_GAA_05"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_GAA_06" id="TotalSoft_Port_GAA_06" min="0" max="800" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_Port_GAA_06_Output" for="TotalSoft_Port_GAA_06"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Album Title Options</td>			
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="TotalSoft_Port_GAA_07" id="TotalSoft_Port_GAA_07" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_GAA_08" name="TotalSoft_Port_GAA_08">
		            <label for="TotalSoft_Port_GAA_08" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_GAA_09" id="TotalSoft_Port_GAA_09" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_GAA_09_Output" id="TotalSoft_Port_GAA_09_Output" for="TotalSoft_Port_GAA_09"></output>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_10" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_Port_GAA_11" id="TotalSoft_Port_GAA_11" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="TotalSoft_Port_GAA_11_Output" id="TotalSoft_Port_GAA_11_Output" for="TotalSoft_Port_GAA_11"></output>
			</td>
			<td>Font Family (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_GAA_12" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>						
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_GAA_13" name="TotalSoft_Port_GAA_13">
		            <label for="TotalSoft_Port_GAA_13" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Shadow Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_GAA_14" name="">
		            <label for="TotalSoft_Port_GAA_14" data-on="1" data-off="2"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="TotalSoft_Port_GAA_15" id="TotalSoft_Port_GAA_15" class="Total_Soft_Port_Color" value="">				
			</td>
			<td>Background Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_GAA_16" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="Type 1"> Transparent </option>
					<option value="Type 2"> Color       </option>
					<option value="Type 3"> Gradient    </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color 1 (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_17" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td>Background Color 2 (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_18" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Icon For Opening Popup</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_GAA_19" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="">     None         </option>
					<option value="f030"> Camera       </option>
					<option value="f083"> Camera Retro </option>
					<option value="f06e"> Eye          </option>
					<option value="f08a"> Heart O      </option>
					<option value="f03e"> Picture O    </option>
					<option value="f002"> Search       </option>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_20" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_GAA_21" id="TotalSoft_Port_GAA_21">
					<option value="Size 1"> Small    </option>
					<option value="Size 2"> Medium 1 </option>
					<option value="Size 3"> Medium 2 </option>
					<option value="Size 4"> Big      </option>
				</select>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_22" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_GAA_23" name="">
		            <label for="TotalSoft_Port_GAA_23" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_24" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_25" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>			
		</tr>
		<tr>
			<td>Overlay Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_26" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Options</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_GAA_27" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="angle-double">   Type 1  </option>
					<option value="angle">          Type 2  </option>
					<option value="arrow-circle">   Type 3  </option>
					<option value="arrow-circle-o"> Type 4  </option>
					<option value="arrow">          Type 5  </option>
					<option value="caret">          Type 6  </option>
					<option value="caret-square-o"> Type 7  </option>
					<option value="chevron-circle"> Type 8  </option>
					<option value="chevron">        Type 9  </option>
					<option value="hand-o">         Type 10 </option>
					<option value="long-arrow">     Type 11 </option>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_28" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_GAA_29" id="TotalSoft_Port_GAA_29">
					<option value="Size 1"> Small    </option>
					<option value="Size 2"> Medium 1 </option>
					<option value="Size 3"> Medium 2 </option>
					<option value="Size 4"> Big      </option>
				</select>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_30" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_GAA_31" name="">
		            <label for="TotalSoft_Port_GAA_31" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_32" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_33" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Icon For Closing Popup</td>			
		</tr>
		<tr>
			<td>Type (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_Port_GAA_34" onchange="Total_Soft_Portfolio_Opt_AMD2_But1()">
					<option value="">     None    </option>
					<option value="f00d"> Times   </option>
					<option value="f015"> Home    </option>
					<option value="f112"> Reply   </option>
					<option value="f021"> Refresh </option>
				</select>
			</td>
			<td>Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_35" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_Port_GAA_36" id="TotalSoft_Port_GAA_36">
					<option value="Size 1"> Small    </option>
					<option value="Size 2"> Medium 1 </option>
					<option value="Size 3"> Medium 2 </option>
					<option value="Size 4"> Big      </option>
				</select>
			</td>
			<td>Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_37" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Border Radius (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Port_GAA_38" name="">
		            <label for="TotalSoft_Port_GAA_38" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Hover Background Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_39" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
		</tr>
		<tr>
			<td>Hover Color (Pro) <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=""></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Port_GAA_40" class="Total_Soft_Port_Color" value="" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
</form>