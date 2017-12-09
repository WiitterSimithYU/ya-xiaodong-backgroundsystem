<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>同城拼车</title>
<meta name="keywords" content="">
<meta name="description" content="开放时间早上九点至下午六点；欢迎来玩">
<link href="/css/main.css" rel="stylesheet">
</head>
<body>
<div class="head">
	 <div id="shop-details-banner">
	    <div class="bd">
	        <ul>
	            <li><img class="img-responsive aligncenter" src="/images/banner1.jpg" /></li>
	            <li><img class="img-responsive aligncenter" src="/images/banner2.png" /></li>
	            <li><img class="img-responsive aligncenter" src="/images/banner4.png" /></li>
	        </ul>
	    </div>
	    <div class="hd" style="display:none">
	        <ul></ul>
	    </div>
	</div>
	<table>
	  <tr>
	    <td data="1" onclick="print($(this))" style="color:blue">全部　</td>
	    <td data="2" onclick="print($(this))">车找人</td>
	    <td data="3" onclick="print($(this))">人找车</td>
	  </tr>
	</table>
</div>
<input type="hidden" id="key" value="<?php echo $key; ?>"/>
<input type="hidden" id="page" value="1"/>
<div class="one">
<?php if ($res) { ?>
    <?php foreach ($res as $key => $item) { ?>
	<div class="lists">
		<div class="lists_one">
			<div class="one_left">
				<div class="left_top">
					<span class="backcl">起</span><span class="star_ad"> <?php echo $item['star_ad']; ?></span>
				</div>
				<div class="left_bottom">
					<span class="backcl">终</span> <?php echo $item['en_ad']; ?>
				</div>
			</div>
			<a href="/index.php/home/line?star=<?php echo $item['star_ad'];?>&end=<?php echo $item['en_ad'];?>">
				<div class="one_right">查看路线</div>
			</a>
		</div>
		<div class="lists_two">
			<span class="chufa">联系人 : <?php echo $item['name']; ?></span>
			<span class="chufa_right">联系电话 : <?php echo $item['phone']; ?></span>
		</div>
		<div class="lists_two">
			<span class="chufa">
				<?php if ($item['cate'] == 1) { ?>
				<span class="cud">车找人</span>
				 : 可坐 <?php echo $item['kong']; ?> 人
				<?php } else{ ?>
				<span class="che">人找车</span>
				 : <?php echo $item['kong']; ?> 人
				<? } ?>
				
			</span>
			<span class="chufa_right">出发时间 : <?php echo $item['time']; ?></span>
		</div>
		<div class="lists_two">
			<span class="beizhu">说明：<?php if ($item['cate'] == 1) { echo $item['carded'];} ?> <?php  echo $item['free'] .' 元/人；';echo $item['remark']; ?></span>
		</div>
	</div>
<?php } } ?>
</div>
<div class='ajax_loading'>上拉加载更多...</div>

<footer>
	<a href="/index.php/games">游戏</a>
	<a href="/index.php/home/video">视频</a>
	<a href="/index.php/creat">发布</a>
	
	<!-- <a href="http://m.kankanews.com/">视频</a> -->
</footer>

<script src="/js/jquery.min.js"></script>
<script src="/js/TouchSlide.1.1.js"></script>
<script>
$(function(){
	TouchSlide({ 
		slideCell:"#shop-details-banner",
		titCell:".hd ul",
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPage:true,//自动分页
		autoPlay:true //自动播放
	});    
})
function print(obj){
	$('td').css('color','');
	$(obj).css('color','blue');
	$('#page').val(1);
	$('.none').hide();
	$('.ajax_loading').show();
	$('.ajax_loading').html('上拉加载更多');
	var dataed = $(obj).attr('data');
	$('#key').val(dataed);
	$.ajax({ 
      type: "post",
      url : "/index.php/home/isajax", 
      dataType:'json',
      data: 'data='+dataed,
      success: function(data){
   		var html = '';
       	$.each(data.res,function(index,value){
       		html = html + value;
		});
		$('.one').html(html);
      } 
    });
}

//拉加载更多
$(window).scroll(function () {
	if ($(window).scrollTop() == $(document).height() - $(window).height()) {
		$('.ajax_loading').show();
		var key = $('#key').val(); 
		var page = $('#page').val(); 
		$.ajax({ 
	      type: "post",
	      url : "/index.php/home/isajax", 
	      dataType:'json',
	      data: 'data='+key+'&page='+page,
	      success: function(data){
	      	if (data.cod == '100') {
		   		var html = '';
		       	$.each(data.res,function(index,value){
		       		html = html + value;
				});
				$('#page').val(data.page);
				$('.one').append(html);
			};
			if (data.cod == '200') {
				$('.ajax_loading').html('没有更多数据');
			};
	      } 
	    });
	}
});
window.onscroll=function(){
$("#bg").css("top",$(window).scrollTop());
}
</script>

</body>
</html>
