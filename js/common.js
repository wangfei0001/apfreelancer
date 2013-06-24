// JavaScript Document
function initIndex()
{
	var pic_width=400; //图片宽度
	var pic_height=240; //图片高度
	var button_pos=4; //按扭位置 1左 2右 3上 4下
	var stop_time=3000; //图片停留时间(1000为1秒钟)
	var show_text=0; //是否显示文字标签 1显示 0不显示
	var txtcolor="000000"; //文字色
	var bgcolor="DDDDDD"; //背景色
	var imag=new Array();
	var link=new Array();
	var text=new Array();
	imag[1]=webroot+"adverts/01.jpg";
	link[1]=webroot + "/users/signup.php";
	text[1]="标题 1";
	imag[2]=webroot+"adverts/02.jpg";
	link[2]=webroot + "/users/signup.php";
	text[2]="标题 2";
	
	//可编辑内容结束
	var swf_height=show_text==1?pic_height+20:pic_height;
	var pics="", links="", texts="";
	for(var i=1; i<imag.length; i++){
		pics=pics+("|"+imag[i]);
		links=links+("|"+link[i]);
		texts=texts+("|"+text[i]);
	}
	pics=pics.substring(1);
	links=links.substring(1);
	texts=texts.substring(1);
	var param = 'pics='+pics+'&links='+links+'&texts='+texts+'&pic_width='+pic_width+'&pic_height='+pic_height+'&show_text='+show_text+'&txtcolor='+txtcolor+'&bgcolor='+bgcolor+'&button_pos='+button_pos+'&stop_time='+stop_time;
	

	var flashhtml = '';
	flashhtml += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="'+ pic_width +'" height="'+ swf_height +'">';
	flashhtml += '<param name="movie" value="adverts/flashadv.swf">';
	flashhtml += '<param name="quality" value="high"><param name="wmode" value="opaque">';
	flashhtml += '<param name="FlashVars" value="' + param + '">';
	flashhtml += '<embed src="adverts/flashadv.swf" FlashVars="' + param + '" quality="high" width="'+ pic_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
	flashhtml += '</object>';
	$('#idx_adv2').html(flashhtml);
	//绑定按钮事件
	$('.tabs').children('li').bind('mouseover',function(){
		$(this).siblings().each(function(){
			$(this).removeClass();	
			$(this).parents('div').children('.tab_container').children('#'+$(this).attr('id')+'_div').hide();
		});	
		$(this).addClass('selected');
		$(this).parents('div').children('.tab_container').children('#'+$(this).attr('id')+'_div').show();	
	});
	
	$('#btpro').bind('click',function(){ window.location="users/signup.php"; });
	$('#btbuy').bind('click',function(){ window.location="users/signup.php"; });
	//绑定公告栏部分
	$('#gg').children('#b').children().each(function(){
		$(this).bind('mouseover',function(){
			var oldClass = $(this).attr('class');
			if(oldClass != '')
				$(this).removeClass();
			else{
				$(this).siblings().each(function(){$(this).removeClass();});
				$(this).addClass('selected');
			}
										  
		}).bind('mouseout',function(){
			
			
		});												 
	})


     // counter
     var i = 0;
     // create object
     imageObj = new Image();
     // set image list
     images = new Array();
     images[0]="../images/gg_bc.gif"
     images[1]="../images/gg_bl_u.gif"
     images[2]="../images/gg_br_u.gif"
     images[3]="../images/gg_bl.gif"
	 images[4]="../images/gg_br.gif"
	 images[5]="../images/gg_bc_u.gif"
     // start preloading
     for(i=0; i<=images.length; i++){
          imageObj.src=images[i];
     }
}

function changeLang(lang)
{
	$.cookie('lang', lang, { expires: 365 ,path: '/'});
	window.location.reload();
}

function loadVerifyCode()
{
	thesrc = $('#vcframe').attr('src');
	thesrc = thesrc.substring(0,thesrc.lastIndexOf(".")+4);
	$('#vcframe').attr('src',thesrc+"?"+Math.round(Math.random()*100000));
}

/*
*	功能：获取系统事件
*	参数：usersArr, 设置用户条件
*		 count, 获取事件数量
*		 showtype, 事件显示类型，list,thumb
*/
function browseEvents(usersArr, count, showtype)
{
	var ctrl = $('#event_list');	
	if(ctrl.length > 0){
		$.ajax({
			url:webroot + "ajax/get_events.php",
			type: "POST",
			data: (usersArr!=null?"cond="+usersArr+'&':'') +"count="+count+(showtype===undefined?'':'&showtype='+showtype),
			success: function(data){ ctrl.html(data); }
		});		
	}
}

function browseRelatedGroups(groupid, count)
{
	$.ajax({
		url:webroot + "ajax/get_relatedgroups.php",
		type: "POST",
		data: 'id=' + groupid +"&count="+count,
		success: function(data){ $('#group_list').html(data); }
	});		
}

function browsevisitors(type,id)
{
	var ctrl = $('#visit_list');	
	if(ctrl.length > 0){
		$.ajax({
			url:webroot + "ajax/get_visitors.php",
			type: "POST",
			data: "type="+type+'&id='+id,
			success: function(data){ ctrl.html(data); }
		});		
	}	
}

function delPortfolio(obj,id)
{
	$.ajax({
		url:"../ajax/del_portfoliobyid.php",
		type: "POST",
		data:'id=' + id,
		dataType:'json',
		beforeSend : function(XMLHttpRequest){ showLoading(); },
		success: function(data){
			if(data.result){
				$(obj).parents('tr').remove();
			}
		},
		complete:function(){
			$('#floatbox').remove();
		}
	});		
}


//function editPortfolio(id)
//{
//	$.ajax({
//		url:"../ajax/get_portfoliobyid.php",
//		type: "POST",
//		data:'id=' + id,
//		dataType:'json',
//		beforeSend : function(XMLHttpRequest){ showLoading(); },
//		success: function(data){
//			if(data.result){
//				$('#id').val(data.data.id);
//				$('#projectname').val(data.data.projectname);
//				$('#description').val(data.data.description);
//				$('#link').val(data.data.link);
//				for(i=0;i<data.data.category.length;i++){
//					//alert($('#category').);	
//					$("#category option[value=" + data.data.category[i] + "]").attr('selected','selected');
//				}
//				$('#completeddate').val(data.data.completeddate);				
//				$('#id').val(data.data.id);
//
//			}
//		},
//		complete:function(){
//			$('#floatbox').remove();
//			$("#dialog").dialog("open");
//		}
//	});	
//	
//}

//function show_preference(rootPath)
//{
//	var div_preference = e("top_preference");	
//	if(div_preference){
//		if(div_preference.style.display=="none"){
//			div_preference.style.display = "block";
//			div_preference.innerHTML='<img src="' + rootPath + 'images/wait.gif">';
//			XMLHttp.sendReq('GET', rootPath + "ajax/get_preference.php", '', show_preferenceCallback);			
//		}else{
//			div_preference.style.display = "none";
//		}
//	}
//}



//function show_preferenceCallback(obj)
//{
//	var div_preference = e("top_preference");	
//	if(div_preference){
//		div_preference.innerHTML = obj.responseText;
//	}
//}

function e(x) {
	return (document.all && !document.getElementById) ? document.all[x] : document.getElementById(x);
}


function flush_left(target, anchor, offset_left, offset_top) {
	anchor = e(anchor);
	target = e(target);
	var left = anchor.offsetLeft;
	var top = anchor.offsetTop;
	var currentElement = anchor;
	while(currentElement.offsetParent != null) {
		currentElement = currentElement.offsetParent;
		left += currentElement.offsetLeft;
		top += currentElement.offsetTop;
	}

	target.style.left = left + offset_left + 'px';
	target.style.top = top + offset_top + 'px';
	return left;
}


function checkLogin(frm)
{
	var hashpwd = hex_md5($("#username").val()+':'+$("#password").val());
	var encode_code = hex_md5($("#sid").val()+'|'+hashpwd);
	$("#encode_code").val(encode_code);
	$("#password").val("");
	$('#butsubmit').attr("disabled",true);
	return true;
}

function checkSignup(frm)
{
	$('#butsubmit').attr("disabled",true);
	return true;
}

function checkExist(obj)
{
	var ctrl = $(obj).parents('form').find('#username');

	$.ajax({		  
		url: webroot + "ajax/checkuser.php",
		type: "POST",
		dataType:'json',
		data: "username=" + ctrl.val(),
		beforeSend : function(XMLHttpRequest){
			showLoading();
			$(obj).attr("disabled",true);
		},
		success: function(data){
			if(!data.result){
				ShowAlert(data.reason);
				ctrl.val('');
			}
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus);
		},
		complete:function(){
			hideLoading();
			$(obj).attr("disabled",false);
		}
	});	

}

function ShowAlert(msg)
{
	$('#alertbox').find('#message').html(msg);
	$("#alertbox").modal({
		closeHTML:"",
		containerCss:{
			height:120,
			width:360,
			padding:0,
			textAlign:'left'
		},
	});	
}


function checkContact(frm)
{
	$('#butsubmit').attr("disabled",true);
	return true;
}


function tab_select(obj)
{
	for(i=0;i<$('.tab_content').length;i++){
		var submenu = $('#tabs'+i);
		if(submenu){
			if(submenu.attr('id') != $(obj).attr('id')){
				submenu.removeClass();;
				$("#tab_top_content"+i).hide();
			}else{
				submenu.addClass('li_select');
				$("#tab_top_content"+i).show();
			}
		}
	}

}


function SelectCountry(obj, rootPath, countryPrefix)
{
	$.ajax({		  
		url: rootPath + "ajax/get_state.php",
		type: "POST",
		dataType:'json',
		data: "countryid=" + obj.value + "&countrycode=" + countryPrefix,
		beforeSend : function(XMLHttpRequest){
			$('#labelstate').html('<img src="' + rootPath + 'images/wait.gif">');
			$("#state option:gt(0)").remove();
		},
		success: function(data){
			if(data.result){
				for(i=0;i<data.data.length;i++){ 	
					 var option = document.createElement("option");;    
					 option.text = data.data[i].state;    
					 option.value = data.data[i].stateid; 
					 $("#state")[0].options.add(option);  					
				}
			}
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus);
		},
		complete:function(){
			$('#labelstate').html('');
		}
	});		
}

//function ClearCombox(ctrl)
//{
//	if(!ctrl) return;
//	if(document.all){
//		for(i = ctrl.options.length - 1; i >= 1; i--){
//			ctrl.options.remove(i);
//		}
//	}else{	
//		for(i = ctrl.options.length - 1; i >= 1; i--){
//			ctrl.remove(i);
//		}		
//	}
//}

/*function deletefileCallback(obj)
{
	var selfiles = e("project_files");
	for(i = 0; i<selfiles.options.length;i++){
		if(selfiles.options[i].value == obj.responseText){
			selfiles.remove(i);
			break;
		}
	}
}*/

function DeleteFile(pid)
{
	$.ajax({		  
		url:"../relevantfiles/remove.php",
		type: "POST",
		data: {'id':pid, 'file[]':$('#project_files').val()},
		dataType:'json',
		beforeSend : function(XMLHttpRequest){},
		success: function(data){
			if(data.result){
				$("#project_files").find("option:selected").remove();
			}
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus);
		},
		complete:function(){
		}
	});	
	
}

//function selectBidAction(obj,bidid)
//{
//	var selectedVal = obj.options[obj.selectedIndex].value;
//	if(selectedVal != -1){
//		//window.open('report.php?tp=bid&id=' + bidid + ','',width=480, height=540, resizable=yes, left=100,top=100,menu=no, toolbar=no,resizable=yes,scrollbars=yes');
//		window.open('../report.php?tp=bid&id=' + bidid + '&bidaction=' + selectedVal,'','width=480, height=540, resizable=yes, left=100,top=100,menu=no, toolbar=no,resizable=yes,scrollbars=yes');
//	}
//}

/*
For New escrow page
*/
//function getwinnerCallback(obj)
//{
//	if(document.all){
//		var xmlDoc= new ActiveXObject('Microsoft.XMLDOM');
//		xmlDoc.async = false;
//		xmlDoc.loadXML(obj.responseText);
//	}else{
//		var parser = new DOMParser();
//        var xmlDoc = parser.parseFromString(obj.responseText, "text/xml");
//	}
//	
//	//insert a node to list control
//	var usernameCtrl = document.getElementById("select_username");
//	usernameCtrl.options.length=0;
//	var newNode = document.createElement("OPTION");
//	
//	var table_no=xmlDoc.getElementsByTagName("username"); 
//	newNode.text = getText(table_no[0]);
//	table_no=xmlDoc.getElementsByTagName("id");
//	newNode.value =  getText(table_no[0]);
//
//	usernameCtrl.options.add(newNode);
//			
//	table_no=xmlDoc.getElementsByTagName("price"); 
//	document.getElementById("amount").value=getText(table_no[0]); 
//	
//	//select currency
//	table_no=xmlDoc.getElementsByTagName("currency");
//	var currencyCtrl = e("currency");
//	if(currencyCtrl){
//		for(i=0;i<currencyCtrl.options.length;i++){
//			if(currencyCtrl.options[i].value==getText(table_no[0])){
//				currencyCtrl.selectedIndex = i;
//				break;
//			}
//		}		
//	}
//}

function updateReason(obj)
{
	var usernameCtrl = document.getElementById("usernameChooseDiv");
	var userEntryCtrl = document.getElementById("usernameEnterDiv");
	var projectsCtrl = document.getElementById("projects");
	var other_reasonCtrl = document.getElementById("other_reason");
	
	if(projectsCtrl && projectsCtrl.value == "0"){
		projectsCtrl.selectedIndex = 0;
	}
	
	if(obj.value == "other"){
		if(projectsCtrl == null || projectsCtrl.value == "-1" || projectsCtrl.value == "0"){
			usernameCtrl.style.display = "none";
			userEntryCtrl.style.display = "block";
		}
		other_reasonCtrl.disabled = false;
	}else{
		usernameCtrl.style.display = "block";
		userEntryCtrl.style.display = "none";
		other_reasonCtrl.disabled = true;
	}
	reason = obj.value;
}

function updateProject(obj)
{
	var usernameCtrl = e("usernameChooseDiv");
	var userEntryCtrl = e("usernameEnterDiv");
	var radios=document.getElementsByName("reason");
	var relatedprojects = e("relatedprojects");

	for(i=0;i<radios.length;i++){
		if(radios[i].checked) reason = radios[i].value;	
	}
	if((obj.value == "-1" || obj.value == "0") && reason == "other"){	
		$('#usernameChooseDiv').hide();
		$('#usernameEnterDiv').show();
	}else{
		$('#usernameChooseDiv').show();
		$('#usernameEnterDiv').hide();		
	}
	if(!reason && obj.value=="0") radios[2].checked=true;
	if(obj.value=="0") $('#relatedprojects').html('');
	else{
		if(obj.value!="-1"){
			$('#relatedprojects').html(obj[obj.selectedIndex].text);
		}else{
			$('#relatedprojects').html('');
		}
	}
	//send request
	if(obj.value != "-1" && obj.value != "0"){
		$.ajax({		  
			url:"../ajax/get_winner.php",
			type: "POST",
			dataType:'json',
			data:'id='+obj.value,
			success: function(data){
				//insert a node to list control
				var usernameCtrl = document.getElementById("select_username");
				usernameCtrl.options.length=0;
				
				var newNode = document.createElement("OPTION");
				newNode.text = data.username;
				newNode.value =  data.id;

				usernameCtrl.options.add(newNode);
						
				$("#amount").val(data.price); 
				
				//select currency
				var currencyCtrl = e("currency");
				if(currencyCtrl){
					for(i=0;i<currencyCtrl.options.length;i++){
						if(currencyCtrl.options[i].value==data.currency){
							currencyCtrl.selectedIndex = i;
							break;
						}
					}		
				}				
			},
			complete:function(){
			}
		});	
	}else{
		var usernameCtrl = e("select_username");
		usernameCtrl.options.length=0;	
		e("amount").value="";
		var currencyCtrl = e("currency");
		if(currencyCtrl){
			currencyCtrl.selectedIndex = 0;
		}
	}
}


//textCtrl->textbox or textarea			<control>
//ShowID->show how many bytes left		<span id>
//maxlength->max length
function ShowBytesLeft(obj, ShowID, maxLength)
{
	if ($(obj).val().length > maxLength){
		$(obj).val() = $(obj).val().substring(0, maxLength);
	}
	$('#' + ShowID).html(maxLength - $(obj).val().length);
}

function CheckContentLength(obj, length)
{
	if($(obj).val().length >= length){
		window.event.keyCode = 0;	
	}
}

//function SelectCheckbox(name,checked){
//	var opt = document.getElementsByName(name);
//	for (var i=0;i<opt.length;i++){ 
//		if(opt[i].disabled == false){
//		 opt[i].checked = checked; 
//		}
//	} 
//}

//function CheckSelect(name)
//{
//	var opt = document.getElementsByName(name);
//	if(opt.length > 0){
//		for (var i=0;i<opt.length;i++){ 
//			if(opt[i].checked == true)	return true;
//		}	
//	}
//	return false;
//}	

function setOrderParam(sortBy, sortOrder)
{
	//window.location='http://127.0.0.1/freelancer/featured.php#sortBy=name';	
	var urlstr = window.location.toString();
//	var regExp=/(.*)(([#a-zA-Z0-9=]*)?)/;
//	regExp.exec(strXml);
//	alert(RegExp.$1 + '    ' + RegExp.$2);
	//var sharpIdx = urlstr.indexOf('#');
//	alert(sharpIdx);

	var urlArr = urlstr.split('#');
	if(urlArr.length==1){
		url = urlstr;
		paramStr = 'sortBy=starttimeSort&sortOrder=0';
	}else{
		url = urlArr[0];
		paramStr = urlArr[1];
	}
	
	var paramArr = paramStr.split('&');
	if(paramArr.length==1) paramArr[0] = paramStr;
	var newparamStr = '';
	var hasOrder = false;
	for(i=0;i<paramArr.length;i++){
		var reCat = /[a-zA-Z0-9_-]=[a-zA-Z0-9_-]/i;
		if(reCat.test(paramArr[i])){
			var params = paramArr[i].split('=');
			if(params.constructor==Array){
				if(params[0] == 'sortBy') params[1] = sortBy;
				if(params[0] == 'sortOrder'){
					params[1] = sortOrder;
					hasOrder = true;
				}
				newparamStr += params[0] + '=' + params[1];
				newparamStr += '&';
			}
		}
	}
	if(newparamStr.length>1){
		newparamStr = newparamStr.substr(0,newparamStr.length-1);
		if(!hasOrder) newparamStr += '&sortOrder=0';
	}
	window.location = url + '#' + newparamStr;
	//parse url
	docHref = url.replace(webroot,'');
	urlArr = docHref.split('/');
	if(urlArr.constructor == Array){
		//alert(urlArr);
		if(urlArr[0] == 'byjob'){		//category
			var regExp=/(.*).html/;
			regExp.exec(urlArr[1]);
			newparamStr = 'cat=' + RegExp.$1 + (urlArr[2]?'&pageid=' + urlArr[2]:'') + '&' + newparamStr;
			$.ajax({		  
				url:webroot + "ajax/get_category.php",
				type: "POST",
				data: newparamStr,
				success: function(data){ $('.projects').html(data);	}
			});				
		}else if(urlArr[0] == 'bytag'){		//keywords
			var regExp=/(.*).html/;
			regExp.exec(urlArr[1]);
			newparamStr = 'tag=' + RegExp.$1 + (urlArr[2]?'&pageid=' + urlArr[2]:'') + '&' + newparamStr;	
			$.ajax({		  
				url:webroot + "ajax/get_tag.php",
				type: "POST",
				data: newparamStr,
				success: function(data){ $('.projects').html(data);	}
			});				
		}else{
			var regExp=/(.*).php([\?]pageid=([0-9]+))*/;
			regExp.exec(urlArr[0]);
			page = RegExp.$1;
			pageid = RegExp.$3;		//pageid
			newparamStr = (pageid?'pageid=' + pageid:'') + '&' + newparamStr;
			if(page=="featured"){
				$.ajax({		  
					url:webroot + "ajax/get_featured.php",
					type: "POST",
					data: newparamStr,
					success: function(data){ $('.projects').html(data);	}
				});					
			}else if(page=="viewall"){
				$.ajax({		  
					url:webroot + "ajax/get_newest.php",
					type: "POST",
					data: newparamStr,
					success: function(data){ $('.projects').html(data);	}
				});					
			}else{	//default page
				//alert(docHref);
			}
		}
	}
}


function setOrderParam2(sortBy, sortOrder, conditionObj)
{
	var urlstr = window.location.toString();

	var urlArr = urlstr.split('#');
	if(urlArr.length==1){
		url = urlstr;
		paramStr = 'sortBy=bidtimeSort&sortOrder=0';
	}else{
		url = urlArr[0];
		paramStr = urlArr[1];
	}

	var paramArr = paramStr.split('&');
	if(paramArr.length==1) paramArr[0] = paramStr;
	var newparamStr = '';
	var hasOrder = false;
	for(i=0;i<paramArr.length;i++){
		var reCat = /[a-zA-Z0-9_-]=[a-zA-Z0-9_-]/i;
		if(reCat.test(paramArr[i])){
			var params = paramArr[i].split('=');
			if(params.constructor==Array){
				if(params[0] == 'sortBy') params[1] = sortBy;
				if(params[0] == 'sortOrder'){
					params[1] = sortOrder;
					hasOrder = true;
				}
				newparamStr += params[0] + '=' + params[1];
				newparamStr += '&';
			}
		}
	}
	if(newparamStr.length>1){
		newparamStr = newparamStr.substr(0,newparamStr.length-1);
		if(!hasOrder) newparamStr += '&sortOrder=0';
	}
	window.location = url + '#' + newparamStr;
	//parse url
	docHref = url.replace(webroot,'');
	urlArr = docHref.split('/');
	if(urlArr.constructor == Array){
		if(urlArr[0] == 'member'){		//category
			switch(urlArr[1]){
				case 'buyer':				
				case 'allprojects':
					newparamStr = 'status=' + conditionObj[0] + '&projectid=' + conditionObj[1] + '&winner=' + conditionObj[2] + '&limit=' + conditionObj[3] + '&' + newparamStr;
					$.ajax({		  
						url:webroot + "ajax/get_buyer_allprojects.php",
						type: "POST",
						data: newparamStr,
						success: function(data){ $('.projects').html(data);	}
					});						
					break;
				case 'provider':
				case 'myprojects':
					newparamStr = 'status=' + conditionObj[0] + '&projectid=' + conditionObj[1] + '&owner=' + conditionObj[2] + '&limit=' + conditionObj[3] + '&' + newparamStr;
					$.ajax({		  
						url:webroot + "ajax/get_seller_allprojects.php",
						type: "POST",
						data: newparamStr,
						success: function(data){ $('.projects').html(data);	}
					});						
					break;
				default:	
					alert("");
					break;
			}
		}
	}
}



function CustomBudget(obj)
{	
	$(obj).val() == "0"?$("#customBudget").show():$("#customBudget").hide();
}
			
//function tab_refresh_content(obj)
//{
//	var menuId = obj.id.toString();
//	menuId=menuId.substr(3,menuId.length-3);
//	var idxArr = menuId.split('_');
//	switch(idxArr[0]){
//		case "0":		//users
//			idxmax=2;
//			XMLHttp.sendReq('POST', webroot + "ajax/get_top_10.php", "type=users&subclass="+idxArr[1], tab_refresh_contentCallback0);
//			break;
//		case "1":		//projects
//			idxmax=4;
//			XMLHttp.sendReq('POST', webroot + "ajax/get_top_10.php", "type=projects&subclass="+idxArr[1], tab_refresh_contentCallback1);
//			break;
//	}
//	//focus on&off
//	for(i=0;i<idxmax;i++){
//		var ctrl = e("tab"+idxArr[0]+"_"+i);
//		if(ctrl){
//			ctrl.className='';	
//		}
//	}
//	obj.className="head_selected";
//}

//function tab_refresh_contentCallback0(obj)
//{
//	var div_projects = e("tab_content_0");	
//	if(div_projects){
//		div_projects.innerHTML = obj.responseText;
//	}	
//}
//
//function tab_refresh_contentCallback1(obj)
//{
//	var div_projects = e("tab_content_1");	
//	if(div_projects){
//		div_projects.innerHTML = obj.responseText;
//	}	
//}

function changeCurrency(curbudget)
{
	var currency = $('#currency').val();
	$.ajax({		  
		url:"../ajax/get_budgetrange.php",
		type: "POST",
		data: 'currency='+currency+'&budget='+curbudget,
		//contentType: "application/json;utf-8",
		dataType:'json',
		beforeSend : function(XMLHttpRequest){ 
			$('#budgetframe').html('<img src="../images/loader.gif">'); 
			$("#budget").children().remove();
		},
		success: function(data){
			for(i=0;i<data.data.length;i++){ 	
				 var option = document.createElement("option");;    
				 option.text = data.data[i].text;    
				 option.value = data.data[i].value; 
				 $("#budget")[0].options.add(option);  					
			}	
			$("#budget option[value=" + curbudget + "]").attr('selected','selected');
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
		},
		complete:function(){ $('#budgetframe').html(''); }
	});	
}


function SetAction(act){
	var actionCtrl = document.form1.action;
	if(actionCtrl){
		actionCtrl.value=act;
		document.form1.submit();
	}
}

//cancel mail change request
function cancelmc(obj)
{
	$.ajax({		  
		url:"../ajax/cancel_mc_request.php",
		type: "GET",
		dataType:'json',
		beforeSend : function(XMLHttpRequest){ showLoading(); },
		success: function(data){
			if(data.result){
				$(obj).parent('li').remove();
			}
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus);
		},
		complete:function(){ hideLoading(); }
	});		
}

function getbalance()
{
	$.ajax({		  
		url:"../ajax/get_balance.php",
		type: "GET",
		beforeSend : function(XMLHttpRequest){$('#balanceBoard').html('<img src="../images/wait.gif" />')},
		success: function(data){ $('#balanceBoard').html(data); }
	});	
}

function getbidders(projectid)
{
	$.ajax({		  
		url:"../ajax/get_bidders.php",
		type: "POST",
		data: "id=" + projectid,
		beforeSend : function(XMLHttpRequest){$('#project_bidder').html('<img src="../images/wait.gif" />')},
		success: function(data){
			$('#project_bidder').html(data);
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus);
		},
		complete:function(){
		}
	});	
}



function showDialog(htmlcode,width,height)
{
	$('#floatbox').remove();
	if(width == undefined) width = 320;
	if(height == undefined) height = 150;
	var left = ($(document).width()-parseInt(width))/2;
	var top = ($(window).height()-parseInt(height))/2 + $(document).scrollTop();
	
	var flhtml = '';
		flhtml += '<div id="floatbox"><div class="ui-overlay">';
		//flhtml += '<div class="ui-widget-overlay" style="display:none"></div>';
		flhtml += '<div class="ui-widget-shadow ui-corner-all" style="width: ' + (width + 22) + 'px; height: ' + (height + 22) + 'px; position: absolute; left: ' + left + 'px; top: ' + top + 'px;"></div></div>';
		flhtml += '<div style="position: absolute; width: ' + width + 'px; height: ' + height + 'px;left: ' + left + 'px; top: ' + top + 'px; padding: 10px;" class="ui-widget ui-widget-content ui-corner-all">';
		flhtml += '<div class="ui-dialog-content ui-widget-content" style="background: none; border: 0;" id="floatbox_content">';
		flhtml += htmlcode;
		flhtml += '</div>';
		flhtml += '</div></div>';
	$('body').append(flhtml);
     $('#floatbox').find('.ui-widget-overlay').css({ 
         display:'block'
     }); 	
}

function hideDialog()
{
	$('#floatbox').remove();
}

function showLoading()
{
	showDialog('<img src="' + webroot + 'images/wait.gif" />&nbsp;'+msg[0],320,36);
}
//formSerialize
function hideLoading()
{
	$('#floatbox').remove();
}

function getFriendsFromMSN(){
	$.ajax({
		url:"../ajax/get_msn_contacts.php",
		type: "POST",
		data:'username=' + $('#username').val()+'&password=' + $('#password').val(),
		dataType:'json',
		beforeSend : function(XMLHttpRequest){ showLoading(); },
		success: function(data){
			if(data.result){
				window.location.href="invite_step2";	
			}else{
				alert(data.reason);
			}
		},
		complete:function(){
			$('#floatbox').animate({opacity:0,left:0,top:0}, 2000,'swing',function(){$('#floatbox').remove();});
		}
	});	
}

function addFriend(friendid,accept)
{
	var rediretlogin = false;
	$.ajax({
		url:"../ajax/add_friend.php",
		type: "POST",
		data:'id=' + friendid+'&accept=' + accept,
		dataType:'json',
		beforeSend : function(XMLHttpRequest){ showLoading(); },
		success: function(data){
			$('#floatbox').find('#floatbox_content').html(data.message);
			if(data.code == 1){	//mean users must login to perform the action.
				rediretlogin = true;
			}
		},
		complete:function(){
			$('#floatbox').animate({opacity:0,left:0,top:0}, 2000,'swing',function(){$('#floatbox').remove();});
		}
	});			
}

function delFriend(obj,friendid)
{
	$.ajax({
		url:"../ajax/del_friend.php",
		type: "POST",
		data:'id=' + friendid,
		dataType:'json',
		beforeSend : function(XMLHttpRequest){ showLoading(); },
		success: function(data){
			$('#floatbox').find('#floatbox_content').html(data.message);
			if(data.code == 1){	//mean users must login to perform the action.
				rediretlogin = true;
			}
		},
		complete:function(){
			$('#floatbox').animate({opacity:0,left:0,top:0}, 2000,'swing',function(){$('#floatbox').remove(); $(obj).parents('li').remove(); });
		}
	});	
}

function addtoFav(ftype,id)
{
	var rediretlogin = false;
	$.ajax({
		url:"../ajax/add_favourite.php",
		type: "POST",
		data:'ftype=' + ftype + '&id=' + id,
		dataType:'json',
		beforeSend : function(XMLHttpRequest){ showLoading(); },
		success: function(data){
			$('#floatbox').find('#floatbox_content').html(data.message);
			if(data.code == 1){	//mean users must login to perform the action.
				rediretlogin = true;
			}
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus);
		},
		complete:function(){
			$('#floatbox').animate({opacity:0,left:0,top:0}, 2500,'swing',function(){$('#floatbox').remove();});
		}
	});	
}


function browseUcomments(pageid)
{
	$.ajax({		  
		url:webroot+"ajax/get_ucomments.php",
		type: "POST",
		data:'ctype='+$('#ctype').val()+'&cid='+$('#cid').val()+'&pageid='+pageid,
		success: function(data){
			$('#u_comments_list').html(data);
		},
		complete:function(){
		}
	});		
}

function submitUcomments(obj)
{
	var form = $(obj).parents('form');
	$.ajax({		  
		url: form.attr('action'),
		type: "POST",
		data: form.serialize(),
		dataType:'json',
		beforeSend : function(XMLHttpRequest){ showLoading(); },
		success: function(data){
			//alert(data);
			if(data.result){
				form.find("#comment").val("");
				browseUcomments(1);
			}
			form.find("#information").html(data.message[0]);
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus);
		},
		complete:function(){ hideLoading(); }
	});		
}


function upload_switcher()
{	
	$(this).siblings('[class!=closed]').each(function(){
		$(this).removeClass();	
		$(this).parents('div').children('.'+$(this).attr('id')+'_div').hide();
	});
	$(this).addClass('selected');
	$(this).parents('div').children('.'+$(this).attr('id')+'_div').show();

}

//overlay sample plugin ( to become part of positionTo )
$.fn.overlay = function(){
//		var that = this;
//		//overlay widget markup
//		var overlay = '<div class="ui-overlay">'+
//'<div class="ui-widget-shadow ui-corner-all" style=" position: absolute; "></div>'+
//'<div style="position: absolute;" class="ui-widget ui-widget-content ui-corner-all">'+$(that).html() +'</div></div>'
//		//ui-widget-shadow gets set to exact widget dims and offset (TL). Shadow appearance/thickness is handled in ui.theme.css through margins and padding
//
//		$(that).replaceWith(overlay);
//		
//		$('.ui-widget-shadow')
//				.width( $(that)[0].offsetWidth )
//				.height( $(that)[0].offsetHeight )
//				.css({ 
//						position: 'absolute',
//						left: $(that)[0].offsetLeft,
//						top: $(that)[0].offsetTop
//				});
//		$(that).before(overlay);
//		return this;
};

function selectAll(ctrlid, val)
{
	$('#'+ctrlid).find('input[type=checkbox]').each(function(){
		$(this).attr('checked',val);														 
	});
}

function selectReverse(ctrlid)
{
	$('#'+ctrlid).find('input[type=checkbox]').each(function(){
		$(this).attr('checked',!$(this).attr('checked'));														 
	});	
}
