<?php
class WidgetHelpCommonProblemMenu extends CWidget{
	public $problem;//当前问题
	public function init(){}
	
	public function run(){
		$baseUrl=Yii::app()->baseUrl;
		$invest_img=$credit_img=$integral_img=$account_img=$hot_img='/images/hc_6.jpg';
		$invest_display=$credit_display=$integral_display=$account_display=$hot_display='style="display: none;"';
		switch ($this->problem){
			case 'investmentOperation':
				$invest_img='/images/hc_1.jpg';$invest_display='';$select1='class="hpc-d"';break;
			case 'investmentGuidelines':
				$invest_img='/images/hc_1.jpg';$invest_display='';$select2='class="hpc-d"';break;
			case 'becomeUser':
				$account_img='/images/hc_1.jpg';$account_display='';$select11='class="hpc-d"';break;
			case 'hotIssues':
				$hot_img='/images/hc_1.jpg';$hot_display='';$select14='class="hpc-d"';break;
		}
		$menu= '<div class="pro-deta-cont" style="padding-bottom: 27px; background: #f9f9f9;">
			<div class="pro-deta">
				<ul class="pd-title">
					<li><a href="'.Yii::app()->request->hostInfo.Yii::app()->homeUrl.'">首页</a></li>
					<li style="padding: 0 4px;">></li>
					<li><a href="'.Yii::app()->createUrl('help').'">帮助中心</a></li>
					<li style="padding: 0 4px;">></li>
					<li><a href="javascript:void(0);">常见问题</a></li>
				</ul>
            <div class="helpc-a">
							<div class="helpc-fl fl">
            		<h3>常见问题</h3>
            		<ul>
            			<li class="hpc-e"><span><img src="'.$baseUrl.$invest_img.'"/>我的投资</span></li>
            			<li '.$invest_display.' '.$select1.'><a href="'.Yii::app()->createUrl('help/commonProblem',array('problem'=>'investmentOperation')).'"><span>投资操作演示</span></a></li>
            			<li '.$invest_display.' '.$select2.'><a href="'.Yii::app()->createUrl('help/commonProblem',array('problem'=>'investmentGuidelines')).'"><span>投资指引</span></a></li>
            			<li '.$invest_display.' '.$select3.'><a href="javascript:;"><span>产品提现</span></a></li>
            			<li class="hpc-e"><span><img src="'.$baseUrl.$credit_img.'"/>融资授信</span></li>
            			<li '.$credit_display.' '.$select4.'><a href="javascript:;"><span>融资指引</span></a></li>
            			<li '.$credit_display.' '.$select5.'><a href="javascript:;"><span>使用授信</span></a></li>
            			<li '.$credit_display.' '.$select6.'><a href="javascript:;"><span>还款</span></a></li>
            			<li class="hpc-e"><span><img src="'.$baseUrl.$integral_img.'"/>积分管理</span></li>
            			<li '.$integral_display.' '.$select7.'><a href="javascript:;"><span>野狼积分</span></a></li>
            			<li '.$integral_display.' '.$select8.'><a href="javascript:;"><span>野狼积分提现</span></a></li>
            			<li '.$integral_display.' '.$select9.'><a href="javascript:;"><span>支付积分</span></a></li>
            			<li '.$integral_display.' '.$select10.'><a href="javascript:;"><span>消费积分</span></a></li>
            			<li class="hpc-e"><span><img src="'.$baseUrl.$account_img.'"/>账户管理</span></li>
            			<li '.$account_display.' '.$select11.'><a href="'.Yii::app()->createUrl('help/commonProblem',array('problem'=>'becomeUser')).'"><span>成为野狼客户操作演示</span></a></li>
            			<li '.$account_display.' '.$select12.'><a href="javascript:;"><span>登录指引</span></a></li>
            			<li '.$account_display.' '.$select13.'><a href="javascript:;"><span style="border:0;">成为野狼客户</span></a></li>
            			<li class="hpc-e"><span><img src="'.$baseUrl.$hot_img.'"/>热门问题</span></li>
            			<li '.$hot_display.' '.$select14.'><a href="'.Yii::app()->createUrl('help/commonProblem',array('problem'=>'hotIssues')).'"><span>热门问题</span></a></li>
            		</ul>
            	</div>';
		echo $menu;
	}
	
}