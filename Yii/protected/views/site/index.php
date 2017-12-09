<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>问卷调查</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<!--封面-->
<div class="cover">
    <img class="mainImg" src="images/main.png" alt="">
    <img class="messageImg" src="images/message1.png" alt="">
    <p class="next"></p>
</div>
    <!--个人信息-->
    <div class="person" style="">
        <h1><img src="images/logo.png" alt=""></h1>
        <h2>个人信息</h2>
        <div class="formGroup">
            <label for="">1.姓名</label><input name="userInfo[name]" type="text" placeholder="请输入您的姓名" id="js-name"/>
        </div>
        <div class="formGroup">
            <label for="">2.手机号码</label><input id="js-phone" type="text" placeholder="请输入您的手机号"/>
        </div>
        <div class="formGroup">
            <label for="">3.所在城市</label><input id="js-city"  type="text" placeholder="您所在的城市"/>
        </div>
        <div class="formGroup">
            <label for="">4.公司名称</label><input id="js-corporate" type="text" placeholder="请输入公司名"/>
        </div>
        <div class="formGroup">
            <label for="" style="float: none;">5.您的职业</label>
            <ul class="checkList" id="user-position">
                <li><p></p><span>行政总厨</span></li>
                <li><p></p><span>普通厨师</span></li>
                <li><p></p><span>面包店老板</span></li>
                <li><p></p><span>连锁店老板</span></li>
                <li><p></p><span>连锁店采购</span></li>
                <li><p></p><span>调味品经销商／批发商</span></li>
                <li><p></p><span>其他</span></li>
            </ul>
            <input id="js-job" type="hidden" placeholder=""/>
        </div>
        <button type="button" id="next-btn" class="next">下一步</button>
    </div>
    <!--问卷调查-->
    <div class="question" style="">
        <h1><img src="images/logo.png" alt=""></h1>
        <h2>问卷调查</h2>
        <div class="formGroup one">
            <p>1.您平时是通过哪些渠道来了解烘焙行业的信息？</p>
            <ul class="checkList checkList1" data='1'>
                <li class="n1" style="margin-bottom: 2px;"><p></p><span>搜索引擎</span><input type="text" class="inp_seach"/><span class="tips">（例如：百度、搜狗、360等）</span></li>
                <li><p></p><span>视频</span></li>
                <li><p></p><span>网站</span></li>
                <li><p></p><span>社交渠道</span></li>
                <li class="n2" style="margin-bottom: 2px;"><p></p><span>其他活动</span><input type="text" class="inp_other"/><span class="tips" style="width:74%;">（例如：销售上门、批发市场的宣传单、朋友／同行告知、   供应商不定期举报的活动、其他）</span></li>
                <li><p></p><span>烘焙相关培训</span></li>
            </ul>
            <input type="hidden" placeholder=""/>
        </div>
        <div class="formGroup three">
            <p>2.您是否知道联合利华饮食策划的好乐门品牌？</p>
            <ul class="checkList checkList1" data='2'>
                <li class=""><p></p><span>很了解</span></li>
                <li><p></p><span>一般</span></li>
                <li><p></p><span>不太了解</span></li>
            </ul>
            <input type="hidden" placeholder=""/>
        </div>
        <div class="formGroup three">
            <p>3.对于现场品尝的面包是否满意？</p>
            <ul class="checkList checkList1" data='3'>
                <li class=""><p></p><span>满意</span></li>
                <li><p></p><span>一般</span></li>
                <li><p></p><span>不太满意</span></li>
            </ul>
            <input type="hidden" placeholder=""/>
        </div>
        <div class="formGroup one">
            <p>4.对于品尝的三款面包，觉得哪一款最满意？</p>
            <ul class="checkList checkList1" data='4'>
                <li><p></p><span>罗勒火腿短棍</span></li>
                <li><p></p><span>黑椒葱香薄饼</span></li>
                <li><p></p><span>烟熏培根芝士三明治</span></li>
            </ul>
            <input type="hidden" placeholder=""/>
        </div>
        <div class="formGroup two">
            <p>5.您是否愿意购买／代理好乐门纯正蛋黄酱？</p>
            <ul class="checkList checkList1" data='5'>
                <li><p></p><span>愿意</span></li>
                <li><p></p><span>不愿意</span></li>
            </ul>
            <input type="hidden" placeholder=""/>
        </div>
        <div class="formGroup two">
            <p>6.您是否愿意购买／代理好乐门香甜沙拉酱？</p>
            <ul class="checkList checkList1" data='6'>
                <li><p></p><span>愿意</span></li>
                <li><p></p><span>不愿意</span></li>
            </ul>
            <input type="hidden" placeholder=""/>
        </div>
        <div class="formGroup">
            <p>7.您是否还有其他建议<span>（例如：产品或服务等）</span></p>
            <textarea name="" class="other_advice"></textarea>
        </div>
        <div class="formGroup one">
            <p>8.今天推荐的两款茶饮，您最喜欢哪款？</p>
            <ul class="checkList checkList1" data='8'>
                <li><p></p><span>爱在提拉米苏</span></li>
                <li><p></p><span>满满白果香茶</span></li>
            </ul>
            <input type="hidden" placeholder=""/>
        </div>
        <div class="formGroup one">
            <p>9.您最喜欢下面哪个系列的立顿产品？</p>
            <ul class="checkList checkList1" data='9'>
                <li><p></p><span>立顿三角茶包</span></li>
                <li><p></p><span>立顿冰茶粉</span></li>
                <li><p></p><span>立顿小皇罐</span></li>
            </ul>
            <input type="hidden" placeholder=""/>
        </div>
        <div class="formGroup">
            <p>10.您对饮品有什么需求<span>（例如：口味或操作便捷等）</span></p>
            <textarea name="" class="other_need"></textarea>
        </div>
        <button type="button" class="next" id="js-submit">提交</button>
    </div>

<!--感谢-->
<div class="thank">
    <img class="thankImg" src="images/thank.png" alt="">
    <div class="thankTextWrap">
        <p class="thankTitle">非常感谢您</p>
        <p class="thankText">感谢您抽出宝贵时间，对本次好乐门<br/>展位提出宝贵建议。</p>
    </div>
</div>
<script src="js/jquery.1.9.1.js"></script>






<script type="text/javascript">
    $(function () {
			var postdata = {};
			$("#user-position li").click(function () {
				$(this).addClass("active").siblings("li").removeClass("active");
				postdata.job=$(this).find('span').text();
        	});
			$(".checkList1 li").click(function () {
				$(this).addClass("active").siblings("li").removeClass("active");
				var curr_question=parseInt($(this).parent('ul').attr('data'));
				var curr_answer = $(this).find('span').eq(0).text();
			//	if($(this).hasClass('n1')||$(this).hasClass('n2')){
			//		curr_answer=$(this).find('input').val();
					
			//	}
				switch (curr_question)
				{
					case 1:					
						postdata.question1 = curr_answer;
						break;
					case 2:					
						postdata.question2 = curr_answer;
						break;
					case 3:					
						postdata.question3 = curr_answer;
						break;
					case 4:					
						postdata.question4 = curr_answer;
						break;
					case 5:					
						postdata.question5 = curr_answer;
						break;
					case 6:					
						postdata.question6 = curr_answer;
						break;
					case 8:					
						postdata.question8 = curr_answer;
						//alert(postdata.question8);
						break;
					case 9:					
						postdata.question9 = curr_answer;
						break;
						}
        	});
			$('.next').click(function(){
				if($(this).parent().attr("class")=="question"){
				   
			   }else if($(this).parent().attr("class")=="cover"){
				   $(this).parent().css("display","none");
				   $('.person').show();
				//   $(this).parent().next().children(".person").css("display","block");
			   }else{
					postdata.name = $('#js-name').val();
					postdata.phone = $('#js-phone').val();
					postdata.city = $('#js-city').val();
					postdata.corporate = $('#js-corporate').val();
			   		if(postdata.name==""){
					alert('请输入您的姓名');
					return false;
					}else if(postdata.phone==""){
						alert('请输入您的手机号码');
						return false;
					}else if(!(/^1[34578]\d{9}$/.test(postdata.phone))){ 
						alert("手机号码格式不正确");  
						return false; 
					} else if(postdata.city==""){
						alert('请输入您的所在城市');
						return false; 
					}else if(postdata.corporate==""){
						alert('请输入您公司名称');
						return false; 
					}else if(postdata.job==""||postdata.job==undefined){
						alert('请输入您的职业');
						return false; 
					}
				   $(this).parent().css("display","none");
				   $(this).parent().next().css("display","block");
           		}
		});
		
		
		$('#js-submit').click(function(){
			postdata.advice=$('.other_advice').val();
			postdata.need=$('.other_need').val();
			if(postdata.question1=="搜索引擎"){
				postdata.question1=$('.inp_seach').val();
				}
			if(postdata.question1=="其他活动"){
				postdata.question1=$('.inp_other').val();
			}
			//console.info(postdata);return false;
			//alert(postdata.need);
			if(postdata.question1==''||postdata.question2==''||postdata.question3==''||postdata.question4==''||postdata.question5==""||postdata.question6==""||postdata.question8==''||postdata.question9==''||postdata.question1==undefined||postdata.question2==undefined||postdata.question3==undefined||postdata.question4==undefined||postdata.question5==undefined||postdata.question6==undefined||postdata.question8==undefined||postdata.question9==undefined){
			alert('请将选择题填写完整');
			return false;
			}
			
			$.post('/index.php/site/insert',postdata,function(data){
				console.info(data);
					if(data.code=='200'){
						//alert('感谢您的反馈');
						$('.question').hide();
						$('.cover').hide();
						$('.person').hide();				
						$('.thank').show();
					}else{
						alert(data.msg);	 
					}
				},'JSON');
			
		});
        /*点击做题--封面消失*/
        /*选择*/
       /* $(".checkList li").click(function () {
            $(this).addClass("active").siblings("li").removeClass("active");
        });
		

		
		 $.post('/index.php/site/insert',postdata,function(data){
				console.info(data);
                    if(data.code=='00'){
                        alert('感谢您的反馈');
                    }else{
                        alert(123123);	 
                    }
                },'JSON');
		*/
    });
</script>
</body>
</html>