<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html,#allmap {width: 100%;height:100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
		.map{
			height:95%;width: 100%;
		}
		.smg{
			height:5%;width: 100%;color:#FFF;font-size:.80rem;padding-top:5px;
			background-color:#000000;text-align: center;
		}
	</style>
	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=k5lbbW0fDGl7WlhfGEhBo5Qm"></script>
	<title>同城拼车</title>
</head>
<body>
	<input type="hidden" id="star" value="<?php echo $star; ?>"/>
	<input type="hidden" id="end" value="<?php echo $end; ?>"/>
	<div class="smg"></div>
	<div class="map">
		<div id="allmap"></div>
	</div>
</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var start = $('#star').val();
	var end = $('#end').val();
	map.centerAndZoom(new BMap.Point(117.291509,31.867312), 11);
	map.enableScrollWheelZoom(); 
	var smg = "全程：";
	var searchComplete = function (results){
		var plan = results.getPlan(0);
		smg += plan.getDistance(true) + "；";
		smg += "驾车大约需要" ;
		smg += plan.getDuration(true);
	}
	var transit = new BMap.DrivingRoute(map, {renderOptions: {map: map},
		onSearchComplete: searchComplete,
		onPolylinesSet: function(){        
			setTimeout(function(){
				$('.smg').html(smg);
			},"1000");
	}});
	transit.search(start, end);

	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r){
		if(this.getStatus() == BMAP_STATUS_SUCCESS){
			var mk = new BMap.Marker(r.point);
			map.addOverlay(mk);
			map.panTo(r.point);
		}
		else {
			alert('failed'+this.getStatus());
		}        
	},{enableHighAccuracy: true})
</script>