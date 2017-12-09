<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>信息发布</title>
<link href="/css/main.css" rel="stylesheet">
<script src="/js/jquery.1.9.1.js"></script>
<script src="/time/js/mobiscroll_002.js" type="text/javascript"></script>
<script src="/time/js/mobiscroll_004.js" type="text/javascript"></script>
<script src="/time/js/mobiscroll.js" type="text/javascript"></script>
<script src="/time/js/mobiscroll_003.js" type="text/javascript"></script>
<script src="/time/js/mobiscroll_005.js" type="text/javascript"></script>
<link href="/time/css/mobiscroll_003.css" rel="stylesheet" type="text/css">
<link href="/time/css/mobiscroll_002.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="conten">
	<div class="conten_list">
		<span class="conten_left">联系人</span>
		<span class="conten_right">
			<input type="text" id="name" name="name" placeholder="姓名" />
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">性别</span>
		<span class="conten_radio">
			<input class="radio" name="sex" type="radio" value="1" checked="checked" />男　
			<input class="radio" name="sex" type="radio" value="2" />女　
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">手机号</span>
		<span class="conten_right">
			<input type="tel" id="phone" name="phone" placeholder="请输入11位手机号" />
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">类别</span>
		<span class="conten_radio">
			<input id="card" class="radio" name="cate" type="radio" value="1" />车找人　
			<input id="renche" class="radio" name="cate" type="radio" value="2" checked="checked" />人找车　
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">出发地</span>
		<span class="conten_right">
			<input type="text" id="star_ad" name="star_ad" placeholder="从那儿出发" />
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">目的地</span>
		<span class="conten_right">
			<input type="text" id="en_ad" name="en_ad" placeholder="要到那儿去" />
		</span>
	</div>
	<div id="tujin" class="conten_list" style="display:none">
		<span class="conten_left">途径地</span>
		<span class="conten_right">
			<input type="text" name="luguo" placeholder="多个途径地请用逗号分开" />
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">出发日期</span>
		<span class="conten_right">
			<input value="" placeholder="请选择" name="date" id="appDate" type="text" />
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">出发时间</span>
		<span class="conten_right">
			<input value="" class="" placeholder="请选择" name="time" id="appTime" type="text" />
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">人数</span>
		<span class="conten_right">
			<span class="parent">
			  <select id="kong">
			      <option>2</option>
			      <option>1</option>
			      <option>3</option>
			      <option>4</option>
			      <option>5</option>
			      <option>6</option>
			      <option>7</option>
			      <option>8</option>
			      <option>9</option>
			      <option>10</option>
			  </select>
			</span>
		</span>
	</div>
	<div class="conten_list" style="display:none">
		<span class="conten_left">乘车人数</span>
		<span class="conten_right">
			<input type="text" id="numsd" name="num" placeholder="请输入" />
		</span>
	</div>
	<div id="xing" class="conten_list" style="display:none">
		<span class="conten_left">车型</span>
		<span class="conten_right">
			<span class="parent">
			  <select id="carded">
			      <option>小轿车</option>
			      <option>SUV</option>
			      <option>MPV</option>
			      <option>商务车</option>
			      <option>面包车</option>
			      <option>大巴车</option>
			  </select>
			</span>
		</span>
	</div>
	<div class="conten_list">
		<span class="conten_left">车费 / 人</span>
		<span class="conten_right">
			<input type="tel" id="free" name="free" placeholder="请输入" />
		</span>
	</div>
	
	<div class="buchong">
		<span class="buchong_left">补充说明</span>
		<span class="buchong_right">
			<textarea id="remark" name="remark" placeholder="填写你想说的话，非必填"></textarea>
		</span>
	</div>
</div>
<div class="sheng">
	<input id="checkbox-id" class="check" name="wwe" type="checkbox" value="1"/> 我已阅读并同意<a href="/index.php/creat">《免责声明》</a>中的内容
</div>

<div class="fabu">
	<div class="submit">发布信息</div>
</div>
<div class="subout" style="display:none">
	<div class="submit">已发布</div>
</div>


<script>
$('#card').click(function(){
	$("#tujin").show();
	//$("#wei").show();
	$("#xing").show();
	//$('#num').hide();
});
$('#renche').click(function(){
	$("#tujin").hide();
	//$("#wei").hide();
	$("#xing").hide();
	//$('#num').hide();
});
$('#phone').change(function(){
	var data = $(this).val();
	var pattern = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/; 
 	if(!pattern.test(data)){
       var message = "请输入有效的手机号码！";
       alert(message);
       $('#phone').focus();
    }
});

$('.fabu').click(function(){
	if($('#checkbox-id').is(':checked')) {
		var name = $('#name').val();
		var phone = $('#phone').val();
		var star_ad = $('#star_ad').val();
		var en_ad = $('#en_ad').val();
		var appDate = $('#appDate').val();
		var appTime = $('#appTime').val();
		//var numsd = $('#numsd').val();
		var free = $('#free').val();
		if(name == ''){alert('请输入联系人');return false;}
		if(phone == ''){alert('请输入手机号');return false;}
		var pattern = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	 	if(!pattern.test(phone)){
	       alert('请输入有效的手机号码！'); $('#phone').focus();return false;
	    }
		if(star_ad == ''){alert('请输入出发地');return false;}
		if(en_ad == ''){alert('请输入目的地');return false;}
		if(appDate == ''){alert('请选择出发日期');return false;}
		if(appTime == ''){alert('请选择出发时间');return false;}
		//if(numsd == ''){alert('请输入乘车人数');return false;}
		if(free == ''){alert('请输入单人费用');return false;}
		$(".fabu").hide();
	    $(".subout").show();
		var darr = new Array();
		$("input").each(function(){
		    var value = $(this).val(); 
		    var key = $(this).attr('name');
		    if (key == 'sex') {
		    	value = $("input[name='sex']:checked").val();
		    };
		    if (key == 'cate') {
		    	value = $("input[name='cate']:checked").val();
		    };
		    darr.push(value);
		});
		var kong = $('#kong').val();
		var carded = $('#carded').val();
		var remark = $('#remark').val();
		
    	$.post('creat/insert',{darr:darr,kong:kong,carded:carded,remark:remark,},function(data){
            if(data.code == 1){
            	alert(data.smg);
            	window.location.href = "/index.php";
            }else{
            	alert('发布失败');
            	window.location.reload();
            }
 			
          },'json');
	}
});

</script>
<script type="text/javascript">
        $(function () {
			var currYear = (new Date()).getFullYear();	
			var opt={};
			opt.date = {preset : 'date'};
			opt.datetime = {preset : 'datetime'};
			opt.time = {preset : 'time'};
			opt.default = {
				theme: 'android-ics light', //皮肤样式
		        display: 'modal', //显示方式 
		        mode: 'scroller', //日期选择模式
				dateFormat: 'yyyy-mm-dd',
				lang: 'zh',
				showNow: true,
				nowText: "今天",
		        startYear: currYear - 0, //开始年份
		        endYear: currYear + 20 //结束年份
			};
		  	$("#appDate").mobiscroll($.extend(opt['date'], opt['default']));
		  	var optDateTime = $.extend(opt['datetime'], opt['default']);
		  	var optTime = $.extend(opt['time'], opt['default']);
		    $("#appTime").mobiscroll(optTime).time(optTime);
        });
    </script>
</body>
</html>
