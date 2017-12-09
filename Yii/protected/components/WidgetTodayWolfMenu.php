<?php
class WidgetTodayWolfMenu extends CWidget{
	public $action;//当前控制器
	public $category=1;//当前资讯类别
	public function init(){}
	
	public function run(){
		$baseUrl=Yii::app()->baseUrl;
		switch ($this->action){
			case 'companyIntroduce':$companyIntroduce='tod-c';break;
			case 'teamIntroduce':$teamIntroduce='tod-c';break;
			case 'eliteRecruitment':$eliteRecruitment='tod-c';break;
			case 'newsDetail':
				switch ($this->category){
					case 1:$financialNews='tod-c';break;
					default:$wolfComments='tod-c';break;
				}break;
			case 'wolfComments':$wolfComments='tod-c';break;
			case 'financialNews':$financialNews='tod-c';break;
			case 'contactUs':$contactUs='tod-c';break;
		}
		$menu='<ul>
					<li class="tod-a"><span>今日野狼</span></li>
					<li class="tod-b '.$companyIntroduce.'"><span><a href="'.Yii::app()->createUrl('todayWolf/companyIntroduce').'"><img src="'.$baseUrl.'/images/tod_2.png" class="tod-imga"/><img src="'.$baseUrl.'/images/tod_1.png" class="tod-imgb"/>公司介绍</a></span></li>
					<li class="tod-b '.$teamIntroduce.'"><span><a href="'.Yii::app()->createUrl('todayWolf/teamIntroduce').'"><img src="'.$baseUrl.'/images/tod_2.png" class="tod-imga"/><img src="'.$baseUrl.'/images/tod_1.png" class="tod-imgb"/>团队介绍</a></span></li>
					<li class="tod-b '.$wolfComments.'"><span><a href="'.Yii::app()->createUrl('todayWolf/wolfComments').'"><img src="'.$baseUrl.'/images/tod_2.png" class="tod-imga"/><img src="'.$baseUrl.'/images/tod_1.png" class="tod-imgb"/>野狼评论</a></span></li>
					<li class="tod-b '.$financialNews.'"><span><a href="'.Yii::app()->createUrl('todayWolf/financialNews').'"><img src="'.$baseUrl.'/images/tod_2.png" class="tod-imga"/><img src="'.$baseUrl.'/images/tod_1.png" class="tod-imgb"/>财经快讯</a></span></li>
					<li class="tod-b '.$contactUs.'"><span><a href="'.Yii::app()->createUrl('todayWolf/contactUs').'"><img src="'.$baseUrl.'/images/tod_2.png" class="tod-imga"/><img src="'.$baseUrl.'/images/tod_1.png" class="tod-imgb"/>联系我们</a></span></li>
				</ul>';
		echo $menu;
	}
	
}