<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout="admin";
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();
    
    public $pageTitle = "联合利华问卷调查";
    // public $setHome = "";//是否可以设为首页，默认不可，在action里赋值为1以允许设置
    
    public $user_id;
    public $risk_assessment;//风险评估结果
    public function beforeAction($action)
    {
        //判断是否登录
        if (Yii::app()->user->getState("memberInfo")) {
            $this->user_id=Yii::app()->user->getState("memberInfo")->id;
            $user=AppUserData::model()->findByPk($this->user_id);
            $this->risk_assessment=$user->risk_assessment;
        }
        //是否自动登录
        if (!empty(Yii::app()->request->cookies['userInfo'])) {
            $userInfo=Yii::app()->request->cookies['userInfo'];
            $userInfo=explode('|', base64_decode($userInfo));
            $username=$userInfo[0];
            $password=base64_decode(substr($userInfo[1], 32));
            $user = bizUserAccount::userLogin($username, $password);
            if ($user) {
                $identity = new UserIdentity($username, $password);
                $identity->setState('memberInfo', $user);
                $duration = 3600 * 24; // 1天
                Yii::app()->user->login($identity, $duration);
            }
        }
        return true;
    }
    /**
     * 生成页面title
     */
    public function createTitle(){
    	$controller=Yii::app()->controller->id;
    	$action = $this->getAction()->getId();
    	switch ($controller) {
    		case 'site':
    			switch ($action) {
    				case 'login':$title='登录 - 野狼资产';break;
    				case 'register':$title='个人注册 - 野狼资产';break;
    				case 'companyRegister':$title='企业注册 - 野狼资产';break;
    				case 'userAgreement':$title='野狼用户协议 - 野狼资产';break;
    				case 'companyRegisterSuccess':$title='信息提交成功 - 企业注册 - 野狼资产';break;
    			}
    			break;
    		case 'invest':
    			switch ($action) {
    				case 'confirm':$title='确认产品信息 - 野狼资产';break;
    				case 'contract':$title='确认产品合同 - 野狼资产';break;
    				case 'riskAssessment':$title='风险评估 - 野狼资产';break;
    				case 'complete':$title='购买成功 - 野狼资产';break;
    				case 'electronicPay':$title='电子汇款 - 野狼资产';break;
    			}
    			break;
    		case 'home':
    			switch ($action){
    				case 'help':$title='帮助中心 - 野狼资产';break;
    				case 'legal':$title='法律安全 - 野狼资产';break;
    				case 'index':$title='野狼资产';break;
    				case 'onlineMessage':$title='在线留言 - 野狼资产';break;
    			}
    			break;
    		case 'help':
    			switch ($action){
    				case 'index':$title='帮助中心 - 野狼资产';break;
    				case 'forgetPassword':$title='忘记密码 - 野狼资产';break;
    				case 'commonProblem':
    					switch ($_GET['problem']){
    						case 'investmentOperation':$title='投资操作演示 - 常见问题 - 帮助中心 - 野狼资产';break;
    						case 'investmentGuidelines':$title='投资指引 - 常见问题 - 帮助中心 - 野狼资产';break;
    						case 'becomeUser':$title='成为野狼用户操作演示 - 常见问题 - 帮助中心 - 野狼资产';break;
    						default:$title='常见问题 - 帮助中心 - 野狼资产';
    					}
    					break;
    			}
    			break;
    		case 'product':$title='投资 - 野狼资产';break;
    		case 'business':$title='商家 - 野狼资产';break;
    		case 'todayWolf':
    			switch ($action){
    				case 'companyIntroduce':$title='公司介绍 - 今日野狼 - 野狼资产';break;
    				case 'teamIntroduce':$title='团队介绍 - 今日野狼 - 野狼资产';break;
    				case 'eliteRecruitment':$title='精英招募 - 今日野狼 - 野狼资产';break;
    				case 'wolfComments':$title='野狼评论 - 今日野狼 - 野狼资产';break;
    				case 'financialNews':$title='财经快讯 - 今日野狼 - 野狼资产';break;
    				case 'contactUs':$title='联系我们 - 今日野狼 - 野狼资产';break;
    				case 'newsDetail':
    					$news_title=NewsInfoData::model()->findByPk(intval($_GET['id']))->news_title;
    					switch (intval($_GET['category'])){
    						case 1:$title="$news_title - 财经快讯 - 今日野狼 - 野狼资产";break;
    						default:$title="$news_title - 野狼评论 - 今日野狼 - 野狼资产";break;
    					}
    			}
    			break;
    		case 'financing':$title='我要融资 - 野狼资产';break;
    		default:$title='野狼资产';
    	}
    	return $title;
    }
}
