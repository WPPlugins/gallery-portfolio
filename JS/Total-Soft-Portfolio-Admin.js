// Admin menu
function Total_Soft_Portfolio_AMD2_But1(Portfolio_ID)
{
	jQuery('.Total_Soft_Portfolio_AMD2').hide(500);
	jQuery('.Total_Soft_PortfolioAMMTable').hide(500);
	jQuery('.Total_Soft_PortfolioAMOTable').hide(500);
	jQuery('.Total_Soft_Portfolio_Save').show(500);
	jQuery('.Total_Soft_Portfolio_Update').hide(500);
	jQuery('.Total_Soft_Portfolio_ID').html('[Total_Soft_Portfolio id="'+Portfolio_ID+'"]');	
	jQuery('.Total_Soft_Portfolio_TID').html('&lt;?php echo do_shortcode(&#039;[Total_Soft_Portfolio id="'+Portfolio_ID+'"]&#039;);?&gt');
	Total_Soft_Portfolio_Editor();
	setTimeout(function(){
		jQuery('.Total_Soft_Portfolio_AMD3').show(500);
		jQuery('.Total_Soft_PortfolioAMTable').show(500);
		jQuery('.Total_Soft_AMImageTable').show(500);
		jQuery('.Total_Soft_AMImageTable1').show(500);
		jQuery('.Total_Soft_AMShortTable').show(500);
	},500)
}
function TotalSoft_Reload()
{
	location.reload();
}
function Total_Soft_Portfolio_Editor()
{
	tinymce.init({
		selector: '#TotalSoftPortfolio_ImDesc',
		menubar: false,
		statusbar: false,
		height: 250,
		plugins: [
		    'advlist autolink lists link image charmap print preview hr',
		    'searchreplace wordcount code media ',
		    'insertdatetime save table contextmenu directionality',
		    'paste textcolor colorpicker textpattern imagetools codesample'
		],
		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink code | insertdatetime preview | forecolor backcolor",
		toolbar3: "table | hr | subscript superscript | charmap | print | codesample ",
		fontsize_formats: '8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px',
		font_formats: 'Abadi MT Condensed Light = abadi mt condensed light; Aharoni = aharoni; Aldhabi = aldhabi; Andalus = andalus; Angsana New = angsana new; AngsanaUPC = angsanaupc; Aparajita = aparajita; Arabic Typesetting = arabic typesetting; Arial = arial; Arial Black = arial black; Batang = batang; BatangChe = batangche; Browallia New = browallia new; BrowalliaUPC = browalliaupc; Calibri = calibri; Calibri Light = calibri light; Calisto MT = calisto mt; Cambria = cambria; Candara = candara; Century Gothic = century gothic; Comic Sans MS = comic sans ms; Consolas = consolas; Constantia = constantia; Copperplate Gothic = copperplate gothic; Copperplate Gothic Light = copperplate gothic light; Corbel = corbel; Cordia New = cordia new; CordiaUPC = cordiaupc; Courier New = courier new; DaunPenh = daunpenh; David = david; DFKai-SB = dfkai-sb; DilleniaUPC = dilleniaupc; DokChampa = dokchampa; Dotum = dotum; DotumChe = dotumche; Ebrima = ebrima; Estrangelo Edessa = estrangelo edessa; EucrosiaUPC = eucrosiaupc; Euphemia = euphemia; FangSong = fangsong; Franklin Gothic Medium = franklin gothic medium; FrankRuehl = frankruehl; FreesiaUPC = freesiaupc; Gabriola = gabriola; Gadugi = gadugi; Gautami = gautami; Georgia = georgia; Gisha = gisha; Gulim  = gulim; GulimChe = gulimche; Gungsuh = gungsuh; GungsuhChe = gungsuhche; Impact = impact; IrisUPC = irisupc; Iskoola Pota = iskoola pota; JasmineUPC = jasmineupc; KaiTi = kaiti; Kalinga = kalinga; Kartika = kartika; Khmer UI = khmer ui; KodchiangUPC = kodchiangupc; Kokila = kokila; Lao UI = lao ui; Latha = latha; Leelawadee = leelawadee; Levenim MT = levenim mt; LilyUPC = lilyupc; Lucida Console = lucida console; Lucida Handwriting Italic = lucida handwriting italic; Lucida Sans Unicode = lucida sans unicode; Malgun Gothic = malgun gothic; Mangal = mangal; Manny ITC = manny itc; Marlett = marlett; Meiryo = meiryo; Meiryo UI = meiryo ui; Microsoft Himalaya = microsoft himalaya; Microsoft JhengHei = microsoft jhenghei; Microsoft JhengHei UI = microsoft jhenghei ui; Microsoft New Tai Lue = microsoft new tai lue; Microsoft PhagsPa = microsoft phagspa; Microsoft Sans Serif = microsoft sans serif; Microsoft Tai Le = microsoft tai le; Microsoft Uighur = microsoft uighur; Microsoft YaHei = microsoft yahei; Microsoft YaHei UI = microsoft yahei ui; Microsoft Yi Baiti = microsoft yi baiti; MingLiU_HKSCS = mingliu_hkscs; MingLiU_HKSCS-ExtB = mingliu_hkscs-extb; Miriam = miriam; Mongolian Baiti = mongolian baiti; MoolBoran = moolboran; MS UI Gothic = ms ui gothic; MV Boli = mv boli; Myanmar Text = myanmar text; Narkisim = narkisim; Nirmala UI = nirmala ui; News Gothic MT = news gothic mt; NSimSun = nsimsun; Nyala = nyala; Palatino Linotype = palatino linotype; Plantagenet Cherokee = plantagenet cherokee; Raavi = raavi; Rod = rod; Sakkal Majalla = sakkal majalla; Segoe Print = segoe print; Segoe Script = segoe script; Segoe UI Symbol = segoe ui symbol; Shonar Bangla = shonar bangla; Shruti = shruti; SimHei = simhei; SimKai = simkai; Simplified Arabic = simplified arabic; SimSun = simsun; SimSun-ExtB = simsun-extb; Sylfaen = sylfaen; Tahoma = tahoma; Times New Roman = times new roman; Traditional Arabic = traditional arabic; Trebuchet MS = trebuchet ms; Tunga = tunga; Utsaah = utsaah; Vani = vani; Vijaya = vijaya'
	});
}
function TotalSoftPortfolio_Edit(Portfolio_ID)
{
	jQuery('.Total_Soft_Portfolio_AMD2').hide(500);
	jQuery('.Total_Soft_PortfolioAMMTable').hide(500);
	jQuery('.Total_Soft_PortfolioAMOTable').hide(500);
	jQuery('.Total_Soft_Portfolio_Save').hide(500);
	jQuery('.Total_Soft_Portfolio_Update').show(500);
	jQuery('.Total_Soft_Portfolio_ID').html('[Total_Soft_Portfolio id="'+Portfolio_ID+'"]');
	jQuery('.Total_Soft_Portfolio_TID').html('&lt;?php echo do_shortcode(&#039;[Total_Soft_Portfolio id="'+Portfolio_ID+'"]&#039;);?&gt');
	
	jQuery('#Total_SoftPortfolio_Update').val(Portfolio_ID);
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPortfolio_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Portfolio_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();

		jQuery('#TotalSoftPortfolio_Title').val(b[0]); jQuery('#TotalSoftPortfolio_Option').val(b[1]); jQuery('#TotalSoftPortfolio_AlbumCount').val(b[2]); jQuery('#TotalSoftPortfolio_AlbumCountHid').val(b[2]);

		for(var i=2;i<=b[2];i++)
		{
			jQuery('#TotalSoftHiddenRows_'+i).show();
			jQuery('#TotalSoftPortfolio_ImAlbum_'+i).show();
		}
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPortfolio_Edit_Album', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Portfolio_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('stdClass Object');
		for(i=1;i<a.length;i++)
		{
			var c=a[i].split('=>');
			b[b.length]=c[2].split('[')[0].trim();
		}
		for(i=1;i<=b.length;i++)
		{
			jQuery('#TotalSoftPortfolio_ATitle'+i).val(b[i-1]);
		}
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPortfolio_Edit_Images', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Portfolio_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var TSImages=Array();
		var TSAlbums=Array();
		var TSURLs=Array();
		var TSDescs=Array();
		var TSLinks=Array();
		var TSONTs=Array();
		var a=response.split('stdClass Object');
		for(i=1;i<a.length;i++)
		{
			var c=a[i].split('=>');
			TSImages[TSImages.length]=c[2].split('[')[0].trim();
			TSAlbums[TSAlbums.length]=c[3].split('[')[0].trim();
			TSURLs[TSURLs.length]=c[4].split('[')[0].trim();
			TSDescs[TSDescs.length]=c[5].split('[')[0].trim();
			TSLinks[TSLinks.length]=c[6].split('[')[0].trim();
			TSONTs[TSONTs.length]=c[7].split('[')[0].trim();
		}
		for(i=1;i<=TSImages.length;i++)
		{			
			if(i==1)
			{

				jQuery('#TotalSoftPortfolioUl').html('<li id="TotalSoftPortfolioLi_1"><table class="Total_Soft_AMImageTable1 Total_Soft_AMImageTable2"><tr><td>1</td><td><input type="text" readonly value="'+TSImages[0]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IT_1" name="TotalSoftPortfolio_IT_1"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImDesc" id="TotalSoftPortfolio_IDesc_1" name="TotalSoftPortfolio_IDesc_1" value=\''+TSDescs[0]+'\'><input type="text" style="display:none;" class="TotalSoftPortfolio_ImLink" id="TotalSoftPortfolio_ILink_1" name="TotalSoftPortfolio_ILink_1" value="'+TSLinks[0]+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImONT" id="TotalSoftPortfolio_IONT_1" name="TotalSoftPortfolio_IONT_1" value="'+TSONTs[0]+'"></td><td><input type="text" readonly value="'+TSAlbums[0]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IA_1" name="TotalSoftPortfolio_IA_1"></td><td><img class="TotalSoftPortfolioImage" src="'+TSURLs[0]+'"><input type="text" readonly value="'+TSURLs[0]+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftPortfolio_IURL_1" name="TotalSoftPortfolio_IURL_1"></td><td onclick="TotalSoftImage_Edit(1)"><i class="Total_Soft_icon totalsoft totalsoft-pencil"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftImage_Del(1)"></i><span class="Total_Soft_Portfolio_Del_Span"><i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Portfolio_Del_Im_Yes(1)"></i><i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Portfolio_Del_Im_No(1)"></i></span></td></tr></table></li>');
			}
			else
			{

				if(i%2==0)
				{
					jQuery('<li id="TotalSoftPortfolioLi_'+i+'"><table class="Total_Soft_AMImageTable1 Total_Soft_AMImageTable3"><tr><td>'+i+'</td><td><input type="text" readonly value="'+TSImages[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IT_'+i+'" name="TotalSoftPortfolio_IT_'+i+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImDesc" id="TotalSoftPortfolio_IDesc_'+i+'" name="TotalSoftPortfolio_IDesc_'+i+'" value=\''+TSDescs[i-1]+'\'><input type="text" style="display:none;" class="TotalSoftPortfolio_ImLink" id="TotalSoftPortfolio_ILink_'+i+'" name="TotalSoftPortfolio_ILink_'+i+'" value="'+TSLinks[i-1]+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImONT" id="TotalSoftPortfolio_IONT_'+i+'" name="TotalSoftPortfolio_IONT_'+i+'" value="'+TSONTs[i-1]+'"></td><td><input type="text" readonly value="'+TSAlbums[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IA_'+i+'" name="TotalSoftPortfolio_IA_'+i+'"></td><td><img class="TotalSoftPortfolioImage" src="'+TSURLs[i-1]+'"><input type="text" readonly value="'+TSURLs[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftPortfolio_IURL_'+i+'" name="TotalSoftPortfolio_IURL_'+i+'"></td><td onclick="TotalSoftImage_Edit('+i+')"><i class="Total_Soft_icon totalsoft totalsoft-pencil"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftImage_Del('+i+')"></i><span class="Total_Soft_Portfolio_Del_Span"><i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Portfolio_Del_Im_Yes('+i+')"></i><i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Portfolio_Del_Im_No('+i+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftPortfolioUl li:nth-child('+parseInt(parseInt(i)-1)+')');
				}
				else
				{
					jQuery('<li id="TotalSoftPortfolioLi_'+i+'"><table class="Total_Soft_AMImageTable1 Total_Soft_AMImageTable2"><tr><td>'+i+'</td><td><input type="text" readonly value="'+TSImages[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IT_'+i+'" name="TotalSoftPortfolio_IT_'+i+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImDesc" id="TotalSoftPortfolio_IDesc_'+i+'" name="TotalSoftPortfolio_IDesc_'+i+'" value=\''+TSDescs[i-1]+'\'><input type="text" style="display:none;" class="TotalSoftPortfolio_ImLink" id="TotalSoftPortfolio_ILink_'+i+'" name="TotalSoftPortfolio_ILink_'+i+'" value="'+TSLinks[i-1]+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImONT" id="TotalSoftPortfolio_IONT_'+i+'" name="TotalSoftPortfolio_IONT_'+i+'" value="'+TSONTs[i-1]+'"></td><td><input type="text" readonly value="'+TSAlbums[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IA_'+i+'" name="TotalSoftPortfolio_IA_'+i+'"></td><td><img class="TotalSoftPortfolioImage" src="'+TSURLs[i-1]+'"><input type="text" readonly value="'+TSURLs[i-1]+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftPortfolio_IURL_'+i+'" name="TotalSoftPortfolio_IURL_'+i+'"></td><td onclick="TotalSoftImage_Edit('+i+')"><i class="Total_Soft_icon totalsoft totalsoft-pencil"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftImage_Del('+i+')"></i><span class="Total_Soft_Portfolio_Del_Span"><i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Portfolio_Del_Im_Yes('+i+')"></i><i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Portfolio_Del_Im_No('+i+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftPortfolioUl li:nth-child('+parseInt(parseInt(i)-1)+')');
				}
			}
		}
		jQuery('#TotalSoftHidNum').val(TSImages.length);
		Total_Soft_Portfolio_Editor();
	})
	setTimeout(function(){
		jQuery('.Total_Soft_Portfolio_AMD3').show(500);
		jQuery('.Total_Soft_PortfolioAMTable').show(500);
		jQuery('.Total_Soft_AMImageTable').show(500);
		jQuery('.Total_Soft_AMImageTable1').show(500);
		jQuery('.Total_Soft_AMShortTable').show(500);
	},500)
}
function TotalSoftPortfolio_Del(Portfolio_ID)
{
	jQuery('#Total_Soft_PortfolioAMOTable_tr_'+Portfolio_ID).find('.Total_Soft_Portfolio_Del_Span').addClass('Total_Soft_Portfolio_Del_Span1');
}
function TotalSoftPortfolio_Del_No(Portfolio_ID)
{
	jQuery('#Total_Soft_PortfolioAMOTable_tr_'+Portfolio_ID).find('.Total_Soft_Portfolio_Del_Span').removeClass('Total_Soft_Portfolio_Del_Span1');
}
function TotalSoftPortfolio_Del_Yes(Portfolio_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPortfolio_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Portfolio_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	}) 
}
function TotalSoftPortfolio_Clone(Portfolio_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPortfolio_Clone', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Portfolio_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function TotalSoftPortfolio_ACount()
{
	var TotalSoftPortfolio_AlbumCount=jQuery('#TotalSoftPortfolio_AlbumCount').val();
	var TotalSoftPortfolio_AlbumCountHid=parseInt(jQuery('#TotalSoftPortfolio_AlbumCountHid').val());
	if(TotalSoftPortfolio_AlbumCount>TotalSoftPortfolio_AlbumCountHid)
	{
		for(var i=TotalSoftPortfolio_AlbumCountHid+1;i<=TotalSoftPortfolio_AlbumCount;i++)
		{
			jQuery('#TotalSoftHiddenRows_'+i).show(500);
			jQuery('#TotalSoftPortfolio_ImAlbum_'+i).show(500);
		}
	}
	else if(TotalSoftPortfolio_AlbumCount<TotalSoftPortfolio_AlbumCountHid)
	{
		for(var i=TotalSoftPortfolio_AlbumCountHid;i>TotalSoftPortfolio_AlbumCount;i--)
		{
			jQuery('#TotalSoftHiddenRows_'+i).hide(500);
			jQuery('#TotalSoftPortfolio_ImAlbum_'+i).hide(500);
		}
	}
	jQuery('#TotalSoftPortfolio_AlbumCountHid').val(TotalSoftPortfolio_AlbumCount);
}
function TotalSoftPortfolio_ImURL_Clicked()
{
	var nIntervId = setInterval(function(){
		var code = jQuery('#TotalSoftPortfolio_ImURL_1').val();			
		if(code.indexOf('img')>0){
			var s=code.split('src="'); 
			var src=s[1].split('"');				
			jQuery('#TotalSoftPortfolio_ImURL_2').val(src[0]);
			if(jQuery('#TotalSoftPortfolio_ImURL_2').val().length>0){
				jQuery('#TotalSoftPortfolio_ImURL_1').val('');	
				clearInterval(nIntervId);
			}				
		}
	},100)
}
function Total_Soft_Portfolio_Img_Res()
{
	jQuery('#TotalSoftPortfolio_ImTitle').val('');
	jQuery('#TotalSoftPortfolio_ImAlbum').val('1');
	jQuery('#TotalSoftPortfolio_ImURL_1').val('');
	jQuery('#TotalSoftPortfolio_ImURL_2').val('');

	tinyMCE.get('TotalSoftPortfolio_ImDesc').setContent('');

	jQuery('#TotalSoftPortfolio_ImLink').val('');
	jQuery('#TotalSoftPortfolio_ImONT').attr('checked',true);
	jQuery('#Total_Soft_Portfolio_UpdIm').hide(500);
	jQuery('#Total_Soft_Portfolio_SavIm').show(500);
}
function Total_Soft_Portfolio_Img_Sav()
{
	var TotalSoftHidNum=jQuery('#TotalSoftHidNum').val();
	var TotalSoftPortfolio_ImTitle=jQuery('#TotalSoftPortfolio_ImTitle').val();
	
	var TotalSoftPortfolio_ImAlbumNum=jQuery('#TotalSoftPortfolio_ImAlbum').val();
	var TotalSoftPortfolio_ImAlbum=jQuery('#TotalSoftPortfolio_ATitle'+TotalSoftPortfolio_ImAlbumNum).val();
	var TotalSoftPortfolio_ImURL_2=jQuery('#TotalSoftPortfolio_ImURL_2').val();

	var TotalSoftPortfolio_ImDesc=tinyMCE.get('TotalSoftPortfolio_ImDesc').getContent();
	var TotalSoftPortfolio_ImLink=jQuery('#TotalSoftPortfolio_ImLink').val();
	var TotalSoftPortfolio_ImONT=jQuery('#TotalSoftPortfolio_ImONT').attr('checked');
	if(TotalSoftPortfolio_ImONT=='checked')
	{ TotalSoftPortfolio_ImONT='true'; }
	else
	{ TotalSoftPortfolio_ImONT='false'; }

	if(TotalSoftHidNum=='0')
	{
		jQuery('#TotalSoftPortfolioUl').html('<li id="TotalSoftPortfolioLi_1"><table class="Total_Soft_AMImageTable1 Total_Soft_AMImageTable2"><tr><td>1</td><td><input type="text" readonly value="'+TotalSoftPortfolio_ImTitle+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IT_1" name="TotalSoftPortfolio_IT_1"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImDesc" id="TotalSoftPortfolio_IDesc_1" name="TotalSoftPortfolio_IDesc_1" value=\''+TotalSoftPortfolio_ImDesc+'\'><input type="text" style="display:none;" class="TotalSoftPortfolio_ImLink" id="TotalSoftPortfolio_ILink_1" name="TotalSoftPortfolio_ILink_1" value="'+TotalSoftPortfolio_ImLink+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImONT" id="TotalSoftPortfolio_IONT_1" name="TotalSoftPortfolio_IONT_1" value="'+TotalSoftPortfolio_ImONT+'"></td><td><input type="text" readonly value="'+TotalSoftPortfolio_ImAlbum+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IA_1" name="TotalSoftPortfolio_IA_1"></td><td><img class="TotalSoftPortfolioImage" src="'+TotalSoftPortfolio_ImURL_2+'"><input type="text" readonly value="'+TotalSoftPortfolio_ImURL_2+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftPortfolio_IURL_1" name="TotalSoftPortfolio_IURL_1"></td><td onclick="TotalSoftImage_Edit(1)"><i class="Total_Soft_icon totalsoft totalsoft-pencil"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftImage_Del(1)"></i><span class="Total_Soft_Portfolio_Del_Span"><i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Portfolio_Del_Im_Yes(1)"></i><i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Portfolio_Del_Im_No(1)"></i></span></td></tr></table></li>');
	}
	else
	{
		if(TotalSoftHidNum%2==1)
		{
			jQuery('<li id="TotalSoftPortfolioLi_'+parseInt(parseInt(TotalSoftHidNum)+1)+'"><table class="Total_Soft_AMImageTable1 Total_Soft_AMImageTable3"><tr><td>'+parseInt(parseInt(TotalSoftHidNum)+1)+'</td><td><input type="text" readonly value="'+TotalSoftPortfolio_ImTitle+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IT_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IT_'+parseInt(parseInt(TotalSoftHidNum)+1)+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImDesc" id="TotalSoftPortfolio_IDesc_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IDesc_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" value=\''+TotalSoftPortfolio_ImDesc+'\'><input type="text" style="display:none;" class="TotalSoftPortfolio_ImLink" id="TotalSoftPortfolio_ILink_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_ILink_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" value="'+TotalSoftPortfolio_ImLink+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImONT" id="TotalSoftPortfolio_IONT_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IONT_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" value="'+TotalSoftPortfolio_ImONT+'"></td><td><input type="text" readonly value="'+TotalSoftPortfolio_ImAlbum+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IA_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IA_'+parseInt(parseInt(TotalSoftHidNum)+1)+'"></td><td><img class="TotalSoftPortfolioImage" src="'+TotalSoftPortfolio_ImURL_2+'"><input type="text" readonly value="'+TotalSoftPortfolio_ImURL_2+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftPortfolio_IURL_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IURL_'+parseInt(parseInt(TotalSoftHidNum)+1)+'"></td><td onclick="TotalSoftImage_Edit('+parseInt(parseInt(TotalSoftHidNum)+1)+')"><i class="Total_Soft_icon totalsoft totalsoft-pencil"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftImage_Del('+parseInt(parseInt(TotalSoftHidNum)+1)+')"></i><span class="Total_Soft_Portfolio_Del_Span"><i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Portfolio_Del_Im_Yes('+parseInt(parseInt(TotalSoftHidNum)+1)+')"></i><i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Portfolio_Del_Im_No('+parseInt(parseInt(TotalSoftHidNum)+1)+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftPortfolioUl li:nth-child('+TotalSoftHidNum+')');
		}
		else
		{
			jQuery('<li id="TotalSoftPortfolioLi_'+parseInt(parseInt(TotalSoftHidNum)+1)+'"><table class="Total_Soft_AMImageTable1 Total_Soft_AMImageTable2"><tr><td>'+parseInt(parseInt(TotalSoftHidNum)+1)+'</td><td><input type="text" readonly value="'+TotalSoftPortfolio_ImTitle+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IT_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IT_'+parseInt(parseInt(TotalSoftHidNum)+1)+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImDesc" id="TotalSoftPortfolio_IDesc_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IDesc_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" value=\''+TotalSoftPortfolio_ImDesc+'\'><input type="text" style="display:none;" class="TotalSoftPortfolio_ImLink" id="TotalSoftPortfolio_ILink_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_ILink_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" value="'+TotalSoftPortfolio_ImLink+'"><input type="text" style="display:none;" class="TotalSoftPortfolio_ImONT" id="TotalSoftPortfolio_IONT_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IONT_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" value="'+TotalSoftPortfolio_ImONT+'"></td><td><input type="text" readonly value="'+TotalSoftPortfolio_ImAlbum+'" class="Total_Soft_Select Total_Soft_Select1" id="TotalSoftPortfolio_IA_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IA_'+parseInt(parseInt(TotalSoftHidNum)+1)+'"></td><td><img class="TotalSoftPortfolioImage" src="'+TotalSoftPortfolio_ImURL_2+'"><input type="text" readonly value="'+TotalSoftPortfolio_ImURL_2+'" class="Total_Soft_Select Total_Soft_Select1" style="display:none;" id="TotalSoftPortfolio_IURL_'+parseInt(parseInt(TotalSoftHidNum)+1)+'" name="TotalSoftPortfolio_IURL_'+parseInt(parseInt(TotalSoftHidNum)+1)+'"></td><td onclick="TotalSoftImage_Edit('+parseInt(parseInt(TotalSoftHidNum)+1)+')"><i class="Total_Soft_icon totalsoft totalsoft-pencil"></i></td><td><i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftImage_Del('+parseInt(parseInt(TotalSoftHidNum)+1)+')"></i><span class="Total_Soft_Portfolio_Del_Span"><i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Portfolio_Del_Im_Yes('+parseInt(parseInt(TotalSoftHidNum)+1)+')"></i><i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Portfolio_Del_Im_No('+parseInt(parseInt(TotalSoftHidNum)+1)+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftPortfolioUl li:nth-child('+TotalSoftHidNum+')');
		}
	}
	jQuery('#TotalSoftHidNum').val(parseInt(parseInt(TotalSoftHidNum)+1));
	
	Total_Soft_Portfolio_Img_Res();
}
function TotalSoftImage_Edit(TotalSoftImage_ID)
{
	var TotalSoftPortfolio_IT=jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.Total_Soft_Select').val();
	var TotalSoftPortfolio_IA=jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(3)').find('.Total_Soft_Select').val();
	var TotalSoftPortfolio_IURL=jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(4)').find('.Total_Soft_Select').val();
	var TotalSoftPortfolio_IDesc=jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImDesc').val();
	var TotalSoftPortfolio_ILink=jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImLink').val();
	var TotalSoftPortfolio_IONT=jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImONT').val();

	jQuery('#TotalSoftHidUpdate').val(TotalSoftImage_ID);
	jQuery('#Total_Soft_Portfolio_SavIm').hide(500);
	jQuery('#Total_Soft_Portfolio_UpdIm').show(500);
	jQuery('#TotalSoftPortfolio_ImTitle').val(TotalSoftPortfolio_IT);

	for(var i=1;i<20;i++)
	{
		if(jQuery('#TotalSoftPortfolio_ATitle'+i).val()==TotalSoftPortfolio_IA)
		{
			jQuery('#TotalSoftPortfolio_ImAlbum').val(i);
		}
	}
	jQuery('#TotalSoftPortfolio_ImURL_2').val(TotalSoftPortfolio_IURL);
	tinyMCE.get('TotalSoftPortfolio_ImDesc').setContent(TotalSoftPortfolio_IDesc);
	jQuery('#TotalSoftPortfolio_ImLink').val(TotalSoftPortfolio_ILink);
	
	var TotalSoftPortfolio_ImONT=jQuery('#TotalSoftPortfolio_ImONT').attr('checked');
	
	if(TotalSoftPortfolio_IONT=='true')
	{ jQuery('#TotalSoftPortfolio_ImONT').attr('checked', true); }
	else
	{ jQuery('#TotalSoftPortfolio_ImONT').attr('checked', false); }
}
function TotalSoftImage_Del(TotalSoftImage_ID)
{
	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_Portfolio_Del_Span').addClass('Total_Soft_Portfolio_Del_Span1');
}
function Total_Soft_Portfolio_Del_Im_No(TotalSoftImage_ID)
{
	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_Portfolio_Del_Span').removeClass('Total_Soft_Portfolio_Del_Span1');
}
function Total_Soft_Portfolio_Del_Im_Yes(TotalSoftImage_ID)
{
	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).remove();

	jQuery('#TotalSoftHidNum').val(jQuery('#TotalSoftHidNum').val()-1);

	jQuery("#TotalSoftPortfolioUl > li").each(function(){
		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('id','TotalSoftPortfolio_IT_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('name','TotalSoftPortfolio_IT_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('id','TotalSoftPortfolio_IA_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('name','TotalSoftPortfolio_IA_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('id','TotalSoftPortfolio_IURL_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('name','TotalSoftPortfolio_IURL_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImDesc').attr('id','TotalSoftPortfolio_IDesc_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImDesc').attr('name','TotalSoftPortfolio_IDesc_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImLink').attr('id','TotalSoftPortfolio_ILink_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImLink').attr('name','TotalSoftPortfolio_ILink_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImONT').attr('id','TotalSoftPortfolio_IONT_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImONT').attr('name','TotalSoftPortfolio_IONT_'+parseInt(parseInt(jQuery(this).index())+1));

		if(jQuery(this).find('.Total_Soft_AMImageTable1').hasClass('Total_Soft_AMImageTable2'))
		{
			jQuery(this).find('.Total_Soft_AMImageTable1').removeClass("Total_Soft_AMImageTable2");
			jQuery(this).find('.Total_Soft_AMImageTable1').addClass("Total_Soft_AMImageTable3");
		}
		else if(jQuery(this).find('.Total_Soft_AMImageTable1').hasClass('Total_Soft_AMImageTable3'))
		{
			jQuery(this).find('.Total_Soft_AMImageTable1').removeClass("Total_Soft_AMImageTable3");
			jQuery(this).find('.Total_Soft_AMImageTable1').addClass("Total_Soft_AMImageTable2");
		}
	});  
}
function TotalSoftPortfolioUlSort()
{
	jQuery('#TotalSoftPortfolioUl').sortable({
      	update: function() {
        	jQuery("#TotalSoftPortfolioUl > li").each(function(){
        		jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('id','TotalSoftPortfolio_IT_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.Total_Soft_Select').attr('name','TotalSoftPortfolio_IT_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('id','TotalSoftPortfolio_IA_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(3)').find('.Total_Soft_Select').attr('name','TotalSoftPortfolio_IA_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('id','TotalSoftPortfolio_IURL_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(4)').find('.Total_Soft_Select').attr('name','TotalSoftPortfolio_IURL_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImDesc').attr('id','TotalSoftPortfolio_IDesc_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImDesc').attr('name','TotalSoftPortfolio_IDesc_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImLink').attr('id','TotalSoftPortfolio_ILink_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImLink').attr('name','TotalSoftPortfolio_ILink_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImONT').attr('id','TotalSoftPortfolio_IONT_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImONT').attr('name','TotalSoftPortfolio_IONT_'+parseInt(parseInt(jQuery(this).index())+1));
			});         
       	}
    });	
}
function Total_Soft_Portfolio_Img_Update()
{
	var TotalSoftImage_ID=jQuery('#TotalSoftHidUpdate').val();

	var TotalSoftPortfolio_IT=jQuery('#TotalSoftPortfolio_ImTitle').val();
	var TotalSoftPortfolio_ImAlbumNum=jQuery('#TotalSoftPortfolio_ImAlbum').val();
	var TotalSoftPortfolio_IA=jQuery('#TotalSoftPortfolio_ATitle'+TotalSoftPortfolio_ImAlbumNum).val();
	var TotalSoftPortfolio_IURL=jQuery('#TotalSoftPortfolio_ImURL_2').val();

	var TotalSoftPortfolio_ImDesc=tinyMCE.get('TotalSoftPortfolio_ImDesc').getContent();
	var TotalSoftPortfolio_ImLink=jQuery('#TotalSoftPortfolio_ImLink').val();
	var TotalSoftPortfolio_ImONT=jQuery('#TotalSoftPortfolio_ImONT').attr('checked');
	if(TotalSoftPortfolio_ImONT=='checked')
	{ TotalSoftPortfolio_ImONT='true'; }
	else
	{ TotalSoftPortfolio_ImONT='false'; }

	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.Total_Soft_Select').val(TotalSoftPortfolio_IT);
	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(3)').find('.Total_Soft_Select').val(TotalSoftPortfolio_IA);
	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(4)').find('.Total_Soft_Select').val(TotalSoftPortfolio_IURL);
	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(4)').find('.TotalSoftPortfolioImage').attr('src',TotalSoftPortfolio_IURL);

	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImDesc').val(TotalSoftPortfolio_ImDesc);
	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImLink').val(TotalSoftPortfolio_ImLink);
	jQuery('#TotalSoftPortfolioLi_'+TotalSoftImage_ID).find('.Total_Soft_AMImageTable1 td:nth-child(2)').find('.TotalSoftPortfolio_ImONT').val(TotalSoftPortfolio_ImONT);

	jQuery('#Total_Soft_Portfolio_UpdIm').hide(500);
	jQuery('#Total_Soft_Portfolio_SavIm').show(500);

	Total_Soft_Portfolio_Img_Res();
}
// General Options
function Total_Soft_Portfolio_Opt_AMD2_But1()
{
	alert('This is Our Free Version. For more adventures Click to buy Personal version.');
}
function TotalSoftPortfolio_Edit_Option(Portfolio_OptID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPortfolioOpt_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Portfolio_OptID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();
		jQuery('.Total_Soft_Portfolio_AMD2').hide(500);
		jQuery('.Total_Soft_PortfolioTMMTable').hide(500);
		jQuery('.Total_Soft_PortfolioTMOTable').hide(500);
		jQuery('.Total_Soft_Portfolio_Save_Option').hide(500);
		jQuery('.Total_Soft_Portfolio_Update_Option').show(500);
		jQuery('#TotalSoftPortfolio_SetType').hide(500);
		setTimeout(function(){
			jQuery('#Total_SoftPortfolio_Update').val(Portfolio_OptID);
			jQuery('#TotalSoftPortfolio_SetName').val(b[1]); jQuery('#TotalSoftPortfolio_SetType').val(b[2]);
			if(b[2]=='Total Soft Portfolio')
			{
				jQuery('#TotalSoftPortfolio_ContH').val(b[3]); jQuery('#TotalSoftPortfolio_BgImage').val(b[4]); jQuery('#TotalSoftPortfolio_IW').val(b[5]); jQuery('#TotalSoftPortfolio_IH').val(b[6]); jQuery('#TotalSoftPortfolio_IBW').val(b[7]); jQuery('#TotalSoftPortfolio_IBS').val(b[8]); jQuery('#TotalSoftPortfolio_IBC').val(b[9]); jQuery('#TotalSoftPortfolio_IBR').val(b[10]); jQuery('#TotalSoftPortfolio_NavS').val(b[11]); jQuery('#TotalSoftPortfolio_NavRad').val(b[12]); jQuery('#TotalSoftPortfolio_NavCol').val(b[13]);	jQuery('#TotalSoftPortfolio_NavCurCol').val(b[14]);	jQuery('#TotalSoftPortfolio_NavHovCol').val(b[15]);	jQuery('#TotalSoftPortfolio_ArrowType').val(b[16]);	jQuery('#TotalSoftPortfolio_ArrowCol').val(b[17]); jQuery('#TotalSoftPortfolio_ArrowSize').val(b[18]);
				jQuery('#Total_Soft_AMSetTable_1').show(500);
			}
			else if(b[2]=='Elastic Grid')
			{
				if(b[4]=='true'){ b[4]=true; }else{ b[4]=false; }
				if(b[6]=='true'){ b[6]=true; }else{ b[6]=false; }
				if(b[8]=='true'){ b[8]=true; }else{ b[8]=false; }
				// jQuery('#TotalSoft_ElG_Pop_DC').val(b[39]); jQuery('#TotalSoft_ElG_Pop_DFS').val(b[40]); jQuery('#TotalSoft_ElG_Pop_DFF').val(b[41]);
				jQuery('#TotalSoft_ElG_TSA').val(b[3]);	jQuery('#TotalSoft_ElG_SM').attr('checked',b[4]); jQuery('#TotalSoft_ElG_FE').val(b[5]); jQuery('#TotalSoft_ElG_HE').attr('checked',b[6]); jQuery('#TotalSoft_ElG_HD').val(b[7]/500); jQuery('#TotalSoft_ElG_HI').attr('checked',b[8]); jQuery('#TotalSoft_ElG_ES').val(b[9]/500); jQuery('#TotalSoft_ElG_EH').val(b[10]); jQuery('#TotalSoft_ElG_Nav_MBgC').val(b[11]); jQuery('#TotalSoft_ElG_Nav_CurBgC').val(b[12]); jQuery('#TotalSoft_ElG_Nav_CurC').val(b[13]); jQuery('#TotalSoft_ElG_Nav_BgC').val(b[14]); jQuery('#TotalSoft_ElG_Nav_C').val(b[15]); jQuery('#TotalSoft_ElG_Nav_FS').val(b[16]); jQuery('#TotalSoft_ElG_Nav_FF').val(b[17]); jQuery('#TotalSoft_ElG_Nav_HBgC').val(b[18]); jQuery('#TotalSoft_ElG_Nav_HC').val(b[19]); jQuery('#TotalSoft_ElG_LAM_W').val(b[20]); jQuery('#TotalSoft_ElG_LAM_S').val(b[21]); jQuery('#TotalSoft_ElG_LAM_C').val(b[22]); jQuery('#TotalSoft_ElG_Im_W').val(b[23]); jQuery('#TotalSoft_ElG_Im_H').val(b[24]); jQuery('#TotalSoft_ElG_Im_BR').val(b[25]); jQuery('#TotalSoft_ElG_Im_BS').val(b[26]); jQuery('#TotalSoft_ElG_Im_HBgC').val(b[27]); jQuery('#TotalSoft_ElG_Im_TC').val(b[29]); jQuery('#TotalSoft_ElG_Im_TFS').val(b[30]); jQuery('#TotalSoft_ElG_Im_TFF').val(b[31]); jQuery('#TotalSoft_ElG_LAT_W').val(b[32]); jQuery('#TotalSoft_ElG_LAT_S').val(b[33]); jQuery('#TotalSoft_ElG_LAT_C').val(b[34]); jQuery('#TotalSoft_ElG_Pop_BgC').val(b[35]); jQuery('#TotalSoft_ElG_Pop_TC').val(b[36]); jQuery('#TotalSoft_ElG_Pop_TFS').val(b[37]); jQuery('#TotalSoft_ElG_Pop_TFF').val(b[38]); jQuery('#TotalSoft_ElG_LIP_BgC').val(b[42]); jQuery('#TotalSoft_ElG_LIP_C').val(b[43]); jQuery('#TotalSoft_ElG_LIP_FS').val(b[44]); jQuery('#TotalSoft_ElG_LIP_FF').val(b[45]); jQuery('#TotalSoft_ElG_LIP_BW').val(b[46]); jQuery('#TotalSoft_ElG_LIP_BS').val(b[47]); jQuery('#TotalSoft_ElG_LIP_BC').val(b[48]); jQuery('#TotalSoft_ElG_LIP_BR').val(b[49]); jQuery('#TotalSoft_ElG_LIP_HBgC').val(b[50]); jQuery('#TotalSoft_ElG_LIP_HC').val(b[51]); jQuery('#TotalSoft_ElG_LBT_W').val(b[52]); jQuery('#TotalSoft_ElG_LBT_S').val(b[53]); jQuery('#TotalSoft_ElG_LBT_C').val(b[54]); jQuery('#TotalSoft_ElG_T_BgC').val(b[55]); jQuery('#TotalSoft_ElG_T_BSC').val(b[56]); jQuery('#TotalSoft_ElG_T_IH').val(b[57]); jQuery('#TotalSoft_ElG_T_BW').val(b[58]); jQuery('#TotalSoft_ElG_T_BS').val(b[59]); jQuery('#TotalSoft_ElG_T_BC').val(b[60]); jQuery('#TotalSoft_ElG_T_BR').val(b[61]); jQuery('#TotalSoft_ElG_T_CurBC').val(b[62]); jQuery('#TotalSoft_ElG_I_Type').val(b[63]); jQuery('#TotalSoft_ElG_I_S').val(b[66]); jQuery('#TotalSoft_ElG_I_C').val(b[67]); jQuery('#TotalSoft_ElG_CI_Type').val(b[69]); jQuery('#TotalSoft_ElG_CI_S').val(b[71]); jQuery('#TotalSoft_ElG_CI_C').val(b[72]);
				jQuery('#Total_Soft_AMSetTable_2').show(500);
			}
			else if(b[2]=='Filterable Grid')
			{
				if(b[7]=='true'){ b[7]=true; }else{ b[7]=false; }
				if(b[20]=='true'){ b[20]=true; }else{ b[20]=false; }
				if(b[82].length!=7){ b[82] = b[82]+')'; }
 				// jQuery('#TotalSoft_FG_DC').val(b[21]); jQuery('#TotalSoft_FG_DFS').val(b[22]); jQuery('#TotalSoft_FG_DFF').val(b[23]);
				jQuery('#TotalSoft_FG_TSA').val(b[3]); jQuery('#TotalSoft_FG_Im_BW').val(b[4]); jQuery('#TotalSoft_FG_Im_BC').val(b[5]); jQuery('#TotalSoft_FG_PBI').val(b[6]); jQuery('#TotalSoft_FG_DSI').attr('checked',b[7]); jQuery('#TotalSoft_FG_Nav_MBgC').val(b[8]); jQuery('#TotalSoft_FG_Nav_CurBgC').val(b[9]); jQuery('#TotalSoft_FG_Nav_CurC').val(b[10]); jQuery('#TotalSoft_FG_Nav_BgC').val(b[11]); jQuery('#TotalSoft_FG_Nav_C').val(b[12]); jQuery('#TotalSoft_FG_Nav_FS').val(b[13]); jQuery('#TotalSoft_FG_Nav_FF').val(b[14]); jQuery('#TotalSoft_FG_Nav_HBgC').val(b[15]); jQuery('#TotalSoft_FG_Nav_HC').val(b[16]); jQuery('#TotalSoft_FG_TC').val(b[17]); jQuery('#TotalSoft_FG_TFS').val(b[18]); jQuery('#TotalSoft_FG_TFF').val(b[19]); jQuery('#TotalSoft_FG_DShow').attr('checked',b[20]); jQuery('#TotalSoft_FG_TDBgC').val(b[24]); jQuery('#TotalSoft_FG_TDBW').val(b[25]); jQuery('#TotalSoft_FG_TDBC').val(b[26]); jQuery('#TotalSoft_FG_LC').val(b[27]); jQuery('#TotalSoft_FG_LHC').val(b[28]); jQuery('#TotalSoft_FG_Hov_Ov_Bg_Color').val(b[29]); jQuery('#TotalSoft_FG_Hov_Ov_Effect_Type').val(b[31]); jQuery('#TotalSoft_FG_Hov_Ov_Transition').val(b[32]); jQuery('#TotalSoft_FG_Hov_Line1_Color').val(b[33]); jQuery('#TotalSoft_FG_Hov_Line1_Width').val(b[34]); jQuery('#TotalSoft_FG_Hov_Line1_Style').val(b[35]); jQuery('#TotalSoft_FG_Hov_Line1_Effect_Type').val(b[36]); jQuery('#TotalSoft_FG_Hov_Line1_Transition').val(b[37]); jQuery('#TotalSoft_FG_Hov_Line2_Color').val(b[38]); jQuery('#TotalSoft_FG_Hov_Line2_Width').val(b[39]); jQuery('#TotalSoft_FG_Hov_Line2_Style').val(b[40]); jQuery('#TotalSoft_FG_Hov_Line2_Effect_Type').val(b[41]); jQuery('#TotalSoft_FG_Hov_Line2_Transition').val(b[42]); jQuery('#TotalSoft_FG_Hov_Raund_Bg_Color').val(b[43]); jQuery('#TotalSoft_FG_Hov_Raund_Effect_Type').val(b[45]); jQuery('#TotalSoft_FG_Hov_Raund_TRansition').val(b[46]); jQuery('#TotalSoft_FG_Pop_Icon_Color').val(b[47]); jQuery('#TotalSoft_FG_Pop_Icon_Size').val(b[48]); jQuery('#TotalSoft_FG_Pop_Icon_Bg_Color').val(b[49]); jQuery('#TotalSoft_FG_Pop_Icon_Border_Color').val(b[50]); jQuery('#TotalSoft_FG_Pop_Icon_Border_Size').val(b[51]); jQuery('#TotalSoft_FG_Pop_Icon_Hov_Effect_Type').val(b[52]); jQuery('#TotalSoft_FG_Pop_Icon_Hov_Transition').val(b[53]); jQuery('#TotalSoft_FG_Link_Icon_Border_Color').val(b[54]); jQuery('#TotalSoft_FG_Link_Icon_Effect_Type').val(b[55]); jQuery('#TotalSoft_FG_Link_Icon_Transition').val(b[56]); jQuery('#TotalSoft_FG_Popup_Ov_Bg_Color').val(b[57]); jQuery('#TotalSoft_FG_Popup_Start_Time').val(b[59]); jQuery('#TotalSoft_FG_Popup_Stop_Time').val(b[60]); jQuery('#TotalSoft_FG_Popup_Time_Effect_Type').val(b[61]); jQuery('#TotalSoft_FG_Popup_Effect_Type').val(b[62]); jQuery('#TotalSoft_FG_Slider_Img_Width').val(b[63]); jQuery('#TotalSoft_FG_Slider_Img_Border_Width').val(b[64]); jQuery('#TotalSoft_FG_Car_Slider_Img_Height').val(b[65]); jQuery('#TotalSoft_FG_Car_Slider_Img_Border_Width').val(b[66]); jQuery('#TotalSoft_FG_Car_Slider_Img_Border_Color').val(b[67]); jQuery('#TotalSoft_FG_Slider_SShow_Paause_Time').val(b[68]); jQuery('#TotalSoft_FG_Slider_Icon_Color').val(b[69]); jQuery('#TotalSoft_FG_Slider_Icon_Size_Time').val(b[70]); jQuery('#TotalSoft_FG_Slider_Icon_Type').val(b[71]); jQuery('#TotalSoft_FG_Slider_Del_Icon_Size').val(b[72]); jQuery('#TotalSoft_FG_Slider_Del_Icon_Color').val(b[73]); jQuery('#TotalSoft_FG_Slider_Del_Icon_Type').val(b[74]); jQuery('#TotalSoft_FG_Slider_Del_Icon_Bg_Color').val(b[75]); jQuery('#TotalSoft_FG_Car_Slider_Icon_Color').val(b[76]); jQuery('#TotalSoft_FG_Car_Slider_Icon_Size').val(b[77]); jQuery('#TotalSoft_FG_Car_Slider_Icon_Type').val(b[78]); jQuery('#TotalSoft_FG_Pop_Title_Font_Size').val(b[79]); jQuery('#TotalSoft_FG_Pop_Title_Font_Family').val(b[80]); jQuery('#TotalSoft_FG_Pop_Title_Color').val(b[81]); jQuery('#TotalSoft_FG_Pop_Title_Bg_Color').val(b[82]);
				jQuery('#Total_Soft_AMSetTable_3').show(500);
			}
			else if(b[2]=='Gallery Portfolio/Content Popup')
			{
				if(b[43]=='true'){ b[43]=true; }else{ b[43]=false; }
				if(b[61]=='true'){ b[61]=true; }else{ b[61]=false; }
				if(b[71].length!=7){ b[71] = b[71]+')'; }
				jQuery('#TotalSoft_Port_CP_W').val(b[3]); jQuery('#TotalSoft_Port_CP_PB').val(b[4]); jQuery('#TotalSoft_Port_CP_BoxSh').val(b[5]); jQuery('#TotalSoft_Port_CP_BoxShC').val(b[6]); jQuery('#TotalSoft_Port_CP_VBW').val(b[7]); jQuery('#TotalSoft_Port_CP_VBS').val(b[8]); jQuery('#TotalSoft_Port_CP_VBC').val(b[9]); jQuery('#TotalSoft_Port_CP_VBR').val(b[10]); jQuery('#TotalSoft_Port_CP_Img_Zoom_Type').val(b[11]); jQuery('#TotalSoft_Port_CP_Img_Zoom_Effect_Time').val(b[12]); jQuery('#TotalSoft_Port_CP_Hov_Ov_Bg_Color').val(b[13]); jQuery('#TotalSoft_Port_CP_Hov_Ov_Effect_Type').val(b[15]); jQuery('#TotalSoft_Port_CP_Hov_Ov_Effect_Time').val(b[16]); jQuery('#TotalSoft_Port_CP_Title_Bg_Color').val(b[17]); jQuery('#TotalSoft_Port_CP_Title_Font_Size').val(b[19]); jQuery('#TotalSoft_Port_CP_Title_Color').val(b[20]); jQuery('#TotalSoft_Port_CP_Title_Effect_Type').val(b[21]); jQuery('#TotalSoft_Port_CP_Title_Effect_Time').val(b[22]); jQuery('#TotalSoft_Port_CP_Title_FF').val(b[23]); jQuery('#TotalSoft_Port_CP_Line_Width').val(b[24]); jQuery('#TotalSoft_Port_CP_Line_Style').val(b[25]); jQuery('#TotalSoft_Port_CP_Line_Color').val(b[26]); jQuery('#TotalSoft_Port_CP_Line_Hov_Type').val(b[27]); jQuery('#TotalSoft_Port_CP_Line_Hov_Time').val(b[28]); jQuery('#TotalSoft_Port_CP_Link_Font_Size').val(b[29]); jQuery('#TotalSoft_Port_CP_Link_Color').val(b[30]); jQuery('#TotalSoft_Port_CP_Link_Border_Color').val(b[31]); jQuery('#TotalSoft_Port_CP_Link_Border_Width').val(b[32]); jQuery('#TotalSoft_Port_CP_Link_Border_Style').val(b[33]); jQuery('#TotalSoft_Port_CP_Link_Text').val(b[34]); jQuery('#TotalSoft_Port_CP_Link_Hov_Type').val(b[35]); jQuery('#TotalSoft_Port_CP_Link_Hov_Time').val(b[36]); jQuery('#TotalSoft_Port_CP_Link_FF').val(b[37]); jQuery('#TotalSoft_Port_CP_Pop_BgC').val(b[38]); jQuery('#TotalSoft_Port_CP_Pop_BW').val(b[39]); jQuery('#TotalSoft_Port_CP_Pop_BS').val(b[40]); jQuery('#TotalSoft_Port_CP_Pop_BC').val(b[41]); jQuery('#TotalSoft_Port_CP_Pop_BR').val(b[42]); jQuery('#TotalSoft_Port_CP_Pop_TShow').attr('checked',b[43]); jQuery('#TotalSoft_Port_CP_Pop_TTA').val(b[44]); jQuery('#TotalSoft_Port_CP_Pop_TFS').val(b[45]); jQuery('#TotalSoft_Port_CP_Pop_TFF').val(b[46]); jQuery('#TotalSoft_Port_CP_Pop_TC').val(b[47]); jQuery('#TotalSoft_Port_CP_Pop_PType').val(b[48]); jQuery('#TotalSoft_Port_CP_Pop_PIS').val(b[49]); jQuery('#TotalSoft_Port_CP_Pop_PIC').val(b[50]); jQuery('#TotalSoft_Port_CP_Pop_CType').val(b[51]); jQuery('#TotalSoft_Port_CP_Pop_CIS').val(b[52]); jQuery('#TotalSoft_Port_CP_Pop_CIC').val(b[53]); jQuery('#TotalSoft_Port_CP_Pop_CIT').val(b[54]); jQuery('#TotalSoft_Port_CP_Pop_CTF').val(b[55]); jQuery('#TotalSoft_Port_CP_Pop_AType').val(b[56]); jQuery('#TotalSoft_Port_CP_Pop_ArrS').val(b[57]); jQuery('#TotalSoft_Port_CP_Pop_ArrC').val(b[58]); jQuery('#TotalSoft_Port_CP_Pop_NFS').val(b[59]); jQuery('#TotalSoft_Port_CP_Pop_NC').val(b[60]); jQuery('#TotalSoft_Port_CP_SM').attr('checked',b[61]); jQuery('#TotalSoft_Port_CP_TSA').val(b[62]); jQuery('#TotalSoft_Port_CP_Nav_MBgC').val(b[63]); jQuery('#TotalSoft_Port_CP_Nav_CurBgC').val(b[64]); jQuery('#TotalSoft_Port_CP_Nav_CurC').val(b[65]); jQuery('#TotalSoft_Port_CP_Nav_BgC').val(b[66]); jQuery('#TotalSoft_Port_CP_Nav_C').val(b[67]); jQuery('#TotalSoft_Port_CP_Nav_FS').val(b[68]); jQuery('#TotalSoft_Port_CP_Nav_FF').val(b[69]); jQuery('#TotalSoft_Port_CP_Nav_HBgC').val(b[70]); jQuery('#TotalSoft_Port_CP_Nav_HC').val(b[71]); 
				jQuery('#Total_Soft_AMSetTable_4').show(500);
			}
			else if(b[2]=='Slider Portfolio')
			{
				if(b[3]=='true'){ b[3]=true; }else{ b[3]=false; }
				if(b[11]=='true'){ b[11]=true; }else{ b[11]=false; }
				if(b[17]=='true'){ b[17]=true; }else{ b[17]=false; }
				if(b[26]=='true'){ b[26]=true; }else{ b[26]=false; }
				if(b[41]=='true'){ b[41]=true; }else{ b[41]=false; }
				if(b[43]=='true'){ b[43]=true; }else{ b[43]=false; }
				if(b[51]=='true'){ b[51]=true; }else{ b[51]=false; }

				// jQuery('#TotalSoft_Port_SP_All_C').val(b[47]);				 
				// jQuery('#TotalSoft_Port_SP_TogT_C').val(b[42]); 
				jQuery('#TotalSoft_Port_SP_TogT_Show').attr('checked',b[41]); jQuery('#TotalSoft_Port_SP_AP').attr('checked',b[3]); jQuery('#TotalSoft_Port_SP_PT').val(b[4]); jQuery('#TotalSoft_Port_SP_W').val(b[5]); jQuery('#TotalSoft_Port_SP_H').val(b[6]); jQuery('#TotalSoft_Port_SP_Pos').val(b[7]); jQuery('#TotalSoft_Port_SP_BW').val(b[8]); jQuery('#TotalSoft_Port_SP_BS').val(b[9]); jQuery('#TotalSoft_Port_SP_BC').val(b[10]); jQuery('#TotalSoft_Port_SP_TT_Show').attr('checked',b[11]); jQuery('#TotalSoft_Port_SP_Tr_Eff').val(b[12]); jQuery('#TotalSoft_Port_SP_TrB_Eff').val(b[13]); jQuery('#TotalSoft_Port_SP_Tr_Cols').val(b[14]); jQuery('#TotalSoft_Port_SP_Tr_Rows').val(b[15]); jQuery('#TotalSoft_Port_SP_Tr_Dur').val(parseInt(parseInt(b[16])*10)); jQuery('#TotalSoft_Port_SP_Seff').attr('checked',b[17]); jQuery('#TotalSoft_Port_SP_AT_FS').val(b[18]); jQuery('#TotalSoft_Port_SP_AT_FF').val(b[19]); jQuery('#TotalSoft_Port_SP_AT_BgC').val(b[20]); jQuery('#TotalSoft_Port_SP_AT_C').val(b[21]); jQuery('#TotalSoft_Port_SP_ASM_C').val(b[22]); jQuery('#TotalSoft_Port_SP_ASM_BgC').val(b[23]); jQuery('#TotalSoft_Port_SP_ASM_HC').val(b[24]); jQuery('#TotalSoft_Port_SP_ASM_HBgC').val(b[25]); jQuery('#TotalSoft_Port_SP_IT_Show').attr('checked',b[26]); jQuery('#TotalSoft_Port_SP_IT_Pos').val(b[27]); jQuery('#TotalSoft_Port_SP_IT_C').val(b[28]); jQuery('#TotalSoft_Port_SP_IT_BgC').val(b[29]); jQuery('#TotalSoft_Port_SP_IT_FS').val(b[30]); jQuery('#TotalSoft_Port_SP_IT_FF').val(b[31]);  jQuery('#TotalSoft_Port_SP_Th_FW').val(b[34]); jQuery('#TotalSoft_Port_SP_Th_FH').val(b[35]); jQuery('#TotalSoft_Port_SP_Th_Pos').val(b[36]); jQuery('#TotalSoft_Port_SP_Th_Type').val(b[37]); jQuery('#TotalSoft_Port_SP_Th_BgC').val(b[38]); jQuery('#TotalSoft_Port_SP_Th_C').val(b[39]); jQuery('#TotalSoft_Port_SP_Th_ABgC').val(b[40]); jQuery('#TotalSoft_Port_SP_Zoom_Show').attr('checked',b[43]); jQuery('#TotalSoft_Port_SP_Zoom_C').val(b[44]); jQuery('#TotalSoft_Port_SP_Full_C').val(b[45]); jQuery('#TotalSoft_Port_SP_PP_C').val(b[46]); jQuery('#TotalSoft_Port_SP_Album_C').val(b[48]); jQuery('#TotalSoft_Port_SP_Arr_Type').val(b[49]); jQuery('#TotalSoft_Port_SP_Arr_C').val(b[50]); jQuery('#TotalSoft_Port_SP_PP_Show').attr('checked',b[51]);
				jQuery('#Total_Soft_AMSetTable_5').show(500);
			}
			else if(b[2]=='Gallery Album Animation')
			{
				if(b[5]=='true'){ b[5]=true; }else{ b[5]=false; }
				if(b[10]=='true'){ b[10]=true; }else{ b[10]=false; }
				if(b[15]=='true'){ b[15]=true; }else{ b[15]=false; }
				if(b[16]=='true'){ b[16]=true; }else{ b[16]=false; }
				if(b[25]=='true'){ b[25]=true; }else{ b[25]=false; }
				if(b[33]=='true'){ b[33]=true; }else{ b[33]=false; }
				if(b[40]=='true'){ b[40]=true; }else{ b[40]=false; }
				if(b[42].length!=7){ b[42] = b[42]+')'; }

				jQuery('#TotalSoft_Port_GAA_01').val(b[3]); jQuery('#TotalSoft_Port_GAA_02').val(b[4]); jQuery('#TotalSoft_Port_GAA_03').attr('checked',b[5]); jQuery('#TotalSoft_Port_GAA_04').val(b[6]); jQuery('#TotalSoft_Port_GAA_05').val(b[7]); jQuery('#TotalSoft_Port_GAA_06').val(b[8]); jQuery('#TotalSoft_Port_GAA_07').val(b[9]); jQuery('#TotalSoft_Port_GAA_08').attr('checked',b[10]); jQuery('#TotalSoft_Port_GAA_09').val(b[11]); jQuery('#TotalSoft_Port_GAA_10').val(b[12]); jQuery('#TotalSoft_Port_GAA_11').val(b[13]); jQuery('#TotalSoft_Port_GAA_12').val(b[14]); jQuery('#TotalSoft_Port_GAA_13').attr('checked',b[15]); jQuery('#TotalSoft_Port_GAA_14').attr('checked',b[16]); jQuery('#TotalSoft_Port_GAA_15').val(b[17]); jQuery('#TotalSoft_Port_GAA_16').val(b[18]); jQuery('#TotalSoft_Port_GAA_17').val(b[19]); jQuery('#TotalSoft_Port_GAA_18').val(b[20]); jQuery('#TotalSoft_Port_GAA_19').val(b[21]); jQuery('#TotalSoft_Port_GAA_20').val(b[22]); jQuery('#TotalSoft_Port_GAA_21').val(b[23]); jQuery('#TotalSoft_Port_GAA_22').val(b[24]); jQuery('#TotalSoft_Port_GAA_23').attr('checked',b[25]); jQuery('#TotalSoft_Port_GAA_24').val(b[26]); jQuery('#TotalSoft_Port_GAA_25').val(b[27]); jQuery('#TotalSoft_Port_GAA_26').val(b[28]); jQuery('#TotalSoft_Port_GAA_27').val(b[29]); jQuery('#TotalSoft_Port_GAA_28').val(b[30]); jQuery('#TotalSoft_Port_GAA_29').val(b[31]); jQuery('#TotalSoft_Port_GAA_30').val(b[32]); jQuery('#TotalSoft_Port_GAA_31').attr('checked',b[33]); jQuery('#TotalSoft_Port_GAA_32').val(b[34]); jQuery('#TotalSoft_Port_GAA_33').val(b[35]); jQuery('#TotalSoft_Port_GAA_34').val(b[36]); jQuery('#TotalSoft_Port_GAA_35').val(b[37]); jQuery('#TotalSoft_Port_GAA_36').val(b[38]); jQuery('#TotalSoft_Port_GAA_37').val(b[39]); jQuery('#TotalSoft_Port_GAA_38').attr('checked',b[40]); jQuery('#TotalSoft_Port_GAA_39').val(b[41]); jQuery('#TotalSoft_Port_GAA_40').val(b[42]);
				jQuery('#Total_Soft_AMSetTable_6').show(500);
			}
			jQuery('.Total_Soft_Portfolio_AMD3').show(500);
			jQuery('.Total_Soft_AMSet_Table').show(500);
			jQuery('.Total_Soft_Port_Color').alphaColorPicker();
			jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
			TotalSoft_Portfolio_Out();
		},500)
	})
}
function TotalSoftPortfolio_Del_Option(Portfolio_OptID)
{
	jQuery('#Total_Soft_PortfolioTMOTable_tr_'+Portfolio_OptID).find('.Total_Soft_Portfolio_Del_Span').addClass('Total_Soft_Portfolio_Del_Span1');
}
function TotalSoftPortfolio_Del_Opt_No(Portfolio_OptID)
{
	jQuery('#Total_Soft_PortfolioTMOTable_tr_'+Portfolio_OptID).find('.Total_Soft_Portfolio_Del_Span').removeClass('Total_Soft_Portfolio_Del_Span1');
}
function TotalSoftPortfolio_Clone_Option(Portfolio_OptID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftPortfolioOpt_Clone', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Portfolio_OptID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function TotalSoftPortfolio_Type()
{
	var TotalSoftPortfolio_SetType=jQuery('#TotalSoftPortfolio_SetType').val();
	jQuery('.Total_Soft_AMSetTable').hide(500);
	setTimeout(function(){
		if(TotalSoftPortfolio_SetType=='Total Soft Portfolio')
		{
			jQuery('#Total_Soft_AMSetTable_1').show(500);
		}
		else if(TotalSoftPortfolio_SetType=='Elastic Grid')
		{
			jQuery('#Total_Soft_AMSetTable_2').show(500);
		}
		else if(TotalSoftPortfolio_SetType=='Filterable Grid')
		{
			jQuery('#Total_Soft_AMSetTable_3').show(500);
		}
		else if(TotalSoftPortfolio_SetType=='Gallery Portfolio/Content Popup')
		{
			jQuery('#Total_Soft_AMSetTable_4').show(500);
		}
		else if(TotalSoftPortfolio_SetType=='Slider Portfolio')
		{
			jQuery('#Total_Soft_AMSetTable_5').show(500);
		}
		else if(TotalSoftPortfolio_SetType=='Gallery Album Animation')
		{
			jQuery('#Total_Soft_AMSetTable_6').show(500);
		}
	},500)
}
function TotalSoft_Portfolio_Out()
{
	jQuery('.TotalSoft_Port_Range').each(function(){
		if(jQuery(this).hasClass('TotalSoft_Port_Rangeper'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'%');
		}
		else if(jQuery(this).hasClass('TotalSoft_Port_Rangepx'))
		{
			
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'px');
		}
		else if(jQuery(this).hasClass('TotalSoft_Port_Rangesec'))
		{
			if(jQuery(this).attr('id') == 'TotalSoft_ElG_HD' || jQuery(this).attr('id') == 'TotalSoft_ElG_ES')
			{
				jQuery('#'+jQuery(this).attr('id')+'_Output').html(parseInt(parseInt(jQuery(this).val())/2)+'s');
			}
			else if(jQuery(this).attr('id') == 'TotalSoft_Port_SP_Tr_Dur')
			{
				jQuery('#'+jQuery(this).attr('id')+'_Output').html(parseInt(parseInt(jQuery(this).val())/10)+'s');
			}
			else
			{
				jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'s');
			}
		}
		else
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val());
		}
	})
}