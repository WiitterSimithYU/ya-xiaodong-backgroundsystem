<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
<?php 
	header("Cache-control: private;Content-type:text/html;charset=utf-8");

	//CSS
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/css/zui.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/css/zui.lite.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/lib/datetimepicker/datetimepicker.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/lib/datetimepicker/datetimepicker.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/lib/datatable/zui.datatable.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/lib/chosen/chosen.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/admin.css');

	//JS
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/js/zui.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/js/zui.lite.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/lib/datetimepicker/datetimepicker.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/lib/datatable/zui.datatable.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/zui-1.4.0-dist/dist/lib/chosen/chosen.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/admin.js');

	$all_menus = MenuItem::getValideMenus();
	$all_menus = is_array($all_menus) ? $all_menus : array();
?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<meta name="keywords" content="S" />
		<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl;?>/images/favicon.ico">
		<title><?php echo CHtml::encode($this->pageTitle);?></title>
	</head>

	<body>
		<div id="ibody">
			<div class="left_bar">
				<div class="logo">
					<img src="<?php //echo imgUrl('logo.png');?>">
				</div>

				<nav class="menu left_menu" data-toggle="menu">
					<ul class="nav nav-primary">
					<?php $k = 0;
                    foreach ($all_menus as $menu) {
                        switch ($menu->name) {
                            case '问卷管理':
                                $src = imgUrl('icon_tags.png');
                                break;
                            case '商品管理':
                                $src = imgUrl('icon_piggy.png');
                                break;
							case '分享管理':
								$src = imgUrl('icon_piggy.png');
								break;
                            case '商家管理':
                                $src = imgUrl('icon_tools.png');
                                break;
                            case '用户管理':
                                $src = imgUrl('icon_user.png');
                                break;
                            case '交易流水':
                                $src = imgUrl('icon_documents.png');
                                break;
                            case '统计分析':
                                $src = imgUrl('icon_creditcard.png');
                                break;
                            case '系统管理':
                                $src = imgUrl('icon_gear.png');
                                break;
                            case '其他管理':
                                $src = imgUrl('icon_alarm.png');
                                break;
							case '习惯管理':
								$src = imgUrl('icon_alarm.png');
								break;
							case '心愿管理':
								$src = imgUrl('icon_tags.png');
								break;
							case '客户管理':
								$src = imgUrl('icon_user.png');
								break;
                            default:
                                $src = "";
                                break;
                        }
                    ?>
						<li class="menu_item">
							<a href="#">
								<img src="<?php echo $src;?>">
								<?php echo $menu->name;?>
							</a>
						<?php if (is_array($menu->sub_menus) && count($menu->sub_menus) > 0) {?>
							<ul class="nav">
							<?php foreach ($menu->sub_menus as $sub_menu) {?>
								<li>
									<a href="<?php echo $sub_menu->url;?>">
										<?php echo $sub_menu->name;?>
									</a>
								</li>
							<?php }?>
							</ul>
						<?php }?>
					    </li>
					<?php $k++;
                    }?>
					</ul>
				</nav>
			</div>
<?php
$user = FrontUser::model()->findAll("id>0 order by create_time desc");
$nu = count($user);
$new = date("Y-m-d H:i:s", $user[0]['create_time']);
?>
			<div class="right_container">
				<div class="right_header">
					<a style="width: 600px" href="<?php echo Yii::app()->createUrl('site/statistics');?>">
						<img src="<?php echo imgUrl('icon_chart.png');?>">
						<span>联合利华问卷调查</span>
                        <span style="float:right;">当前已收集<?php echo $nu;?>份  最后更新于<?php echo $new;?></span>
					</a>

					<a class="user_quit" href="<?php echo Yii::app()->createUrl('site/logout');?>">
						<img src="<?php echo imgUrl('icon_switch.png');?>">
						<span>退出</span>
					</a>
					<div class="line right"></div>
					<div class="user_hello">
						<div class="portrait"></div>您好，<?php echo Yii::app()->user->nickname;?>
					</div>
					<div class="line right"></div>
				</div>
				<div class="top_guidepost">
					<div class="spot"></div>
					<ul>
						<li class="first">
						<?php if (!$this->breadcrumbs) {?>
							联合利华问卷调查
						<?php } else {?>
							<a href="<?php echo Yii::app()->createUrl('site/index');?>">
								联合利华问卷调查
							</a>
						<?php }?>
						</li>
					<?php $i = 0; 
					foreach ($this->breadcrumbs as $sub_menu) {?>
						<li>&gt;</li>
						<li class="<?php echo $i == count($this->breadcrumbs) - 1 ? ' last' : '';?>">
						<?php if ($sub_menu->url == '#') {
                            echo $sub_menu->name;
                        } else {?>
							<a href="<?php echo $sub_menu->url;?>">
								<?php echo $sub_menu->name;?>
							</a>
						<?php }?>
						</li>
					<?php $i++; }?>
					</ul>
				</div>
				
				<div id="container">
					<?php echo $content;?>
				</div>
			</div>
		</div>

		<script type="text/javascript">
		function showMenu() 
		{
			$(".left_menu .menu_item").each(function(){
				if ($.trim($(this).children('a').text()) == "<?php echo $this->breadcrumbs['menu']->name;?>") {
					$(this).addClass('show');
					$(this).children('a').find('i').addClass('icon-rotate-90');
					
					$(this).children('ul.nav').find('li').each(function(){
						if ($.trim($(this).text()) == "<?php echo $this->breadcrumbs['sub_menu']->name;?>") {
							$(this).find('a').addClass('click');
							return;
						}
					});
					return;
				}
			});
		}

		$(function(){
			showMenu();
		});
		</script>
	</body>
</html>
