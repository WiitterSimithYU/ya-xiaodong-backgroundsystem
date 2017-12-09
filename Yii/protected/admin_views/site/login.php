<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>联合利华管理平台</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/css/login.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/zui-1.4.0-dist/dist/css/zui.min.css">
	</head>

	<body style="height:600px">
		<div id="container">
			<div class="logo">
				<img src="<?php echo imgUrl('login_logo.png');?>">
			</div>

			<?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => "login_form",
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
            ?>
			<div class="register">
				<div class="input_row">
					<input id="AdminUser_loginname" type="text" class="form-control username" name="AdminUser[loginname]" placeholder="账号" />
					<input id="AdminUser_password" type="password" class="form-control password" name="AdminUser[password]" placeholder="密码" />
					<button type="submit" class="btn_login">登录</button>
				</div>
				<div class="register_bottom">
					<div class="checkbox auto_login">
						<label><input type="checkbox" name="isAuto" value="on" />自动登录</label>
					</div>

					<div class="forget_password">
						<a href="#">忘记密码？</a>
					</div>
				</div>
			</div>
			<?php
                $this->endWidget();
            ?>
		</div>

		<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/zui-1.4.0-dist/dist/js/zui.min.js"></script>
		<script type="text/javascript">
			var window_width = $(window).width();
			var window_height = $(window).height();
			$('body').css('width', window_width + 'px');
			$('body').css('height', window_height + 'px');

			$('.logo').css('margin-top', (window_height * 0.256) + 'px');

		<?php if (is_string($result)) {?>
			var msg = new $.zui.Messager("<?php echo $result;?>", 
			{
				type: 'danger',
				placement: 'top'
			});
			msg.show();
		<?php }?>

			$("#login_form").submit(function(){
				var loginname = $.trim($('#AdminUser_loginname').val());
				var password = $.trim($('#AdminUser_password').val());
				if (loginname == '') {
					var msg = new $.zui.Messager("请输入账号", 
					{
						type: 'danger', 
						placement: 'top'
					});
					msg.show();
					return false;
				}
				if (password == '') {
					var msg = new $.zui.Messager("请输入密码", 
					{
						type: 'danger', 
						placement: 'top'
					});
					msg.show();
					return false;
				}
			});
		</script>
	</body>
</html>	


