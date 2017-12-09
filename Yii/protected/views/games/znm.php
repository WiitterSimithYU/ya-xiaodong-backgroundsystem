<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>转你妹</title>
		<meta charset="UTF-8">
		<meta name="viewport"
			content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<link rel="icon" href="icon.png">
		<link rel="stylesheet" href="/games/css/style.css">
		<link rel="stylesheet" href="/games/css/font-awesome.min.css">
		<script type='text/javascript' src="/games/js/jquery-2.0.3.min.js"></script>
		<script type='text/javascript' src="/games/js/c200814.js"></script>
	</head>
	<body>
	<div id="moregame2" style="position:fixed;z-index:99; bottom:20px; left:0px; font-size:20px; width:100%; text-align:center;">
		
	</div>
		<input id="bt-game-id" type="hidden" value="6-zhuannimei">
		<canvas id="canvas"></canvas>
		<div id='devtools'
			style='z-index: 3; display: none; position: absolute; left: 50%; width: 400px; height: 400px; top: 50%; margin-top: -200px; margin-left: -200px;'>
			<h2 id='clickToExit' style='background-color: #fff; color: #000'>
				Click to exit
			</h2>
			<textarea id='devtoolsText' style='height: 300px; width: 400px;'></textarea>
		</div>
		<div id="overlay" class="faded"></div>
		<div id='startBtn'
			style='position: absolute; left: 40%; top: 38%; height: 25%; width: 25%; z-index: 99999999; cursor: pointer;'></div>
		<div id="helpScreen" class='unselectable'>
			<h1 class='instructions_body'>
				规则介绍
			</h1>
			<p class='instructions_body' id='inst_main_body'>
				<br>
				点击屏幕左右侧，向左向右旋转六边形。
				<br>
				相同颜色的即可消除掉下来的方块
				<br>
				尽力支撑更多的时间...
				<br>
			</p>
		</div>

		<div id="overlayMask" style="display:none;"></div>
		
		<script language=javascript>
		var mebtnopenurl = 'http://game.3gjj.cn/index.html';
var thegameurl ="http://game.3gjj.cn/games/znm/"; 
var guanzhuurl ="http://mp.weixin.qq.com/s?__biz=MzI4MjA2MjE0MQ==&mid=246005295&idx=1&sn=490f8141976d607ba079d48f52a3fcd7#rd";
		window.shareData = {
		        "imgUrl": "http://mmbiz.qpic.cn/mmbiz/2zpp2iaH4HWGfZsia600gXXlFuZt8TiaEznCicB12RiaoIyn6Pvdufqh3hibUDAxGsAlaricVgWxtY0UbVqU7ibjEL3ZJQ/640",
		        "timeLineLink":thegameurl,
		        "tTitle": "转你妹",
		        "tContent": "轻松休闲的消除类游戏，小伙伴们快来体验一下！"
		};
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			if((window.location+"").indexOf("f=zf",1)>0){
				window.location = mebtnopenurl;
			 }
			 else{
				goHome();
			 }
		}
		function dp_share(){
			document.getElementById("share").style.display="";
			
		}
		function dp_Ranking(){
			window.location=mebtnopenurl;
		}

		function showAd(){
		}
		function hideAd(){
		}
		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		    
		    WeixinJSBridge.on('menu:share:appmessage', function(argv) {
		        WeixinJSBridge.invoke('sendAppMessage', {
		            "img_url": window.shareData.imgUrl,
		            "link": window.shareData.timeLineLink,
		            "desc": window.shareData.tContent,
		            "title": window.shareData.tTitle
		        }, onShareComplete);
		    });

		    WeixinJSBridge.on('menu:share:timeline', function(argv) {
		        WeixinJSBridge.invoke('shareTimeline', {
		            "img_url": window.shareData.imgUrl,
		            "img_width": "640",
		            "img_height": "640",
		            "link": window.shareData.timeLineLink,
		            "desc": window.shareData.tContent,
		            "title": window.shareData.tTitle
		        }, onShareComplete);
		    });
		}, false);
		</script>
		<div id=share style="display: none">
			<img width="100%" src="share.png"
				style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
				ontouchstart="document.getElementById('share').style.display='none';" />
		</div>
		<script type="text/javascript">
            var myData = { gameid: "dsdy" };
			 var domain = ["oixm.cn", "hiemma.cn", "peagame.net"][parseInt(Math.random() * 3)];
			window.shareData.timeLineLink = thegameurl ;
			function dp_submitScore(score){
						myData.score = parseInt(score);
						myData.scoreName ="获得"+score+"分";		
						document.title = window.shareData.tTitle = "我在【转你妹】完成了" +score+ "分,转晕了都，有本事来挑战一下，嘻嘻！";
			}
			function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function(){
                        if (confirm("？")) {
                            window.location = mebtnopenurl;
                        }
                        else {
                            document.location.href = mebtnopenurl;
                        }
                    }, 500);
                }
				else {
		        	document.location.href = guanzhuurl ;
				}
	        }
			</script>
		<div style="display: none;">
			<script type="text/javascript" src="http://tajs.qq.com/stats?sId=36313548" charset="UTF-8"></script>
		</div>
	</body>
</html>