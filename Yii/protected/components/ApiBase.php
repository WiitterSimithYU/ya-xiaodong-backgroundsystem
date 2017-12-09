<?php
/**
 * 接口api
 * * PHP version 5
 *
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * CApplication is the base class for all application classes.
 *
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

class ApiBase extends Controller
{
    // public static $allowCmds = array('login','logout');//允许的命令白名单
    // public static $verifyCmds = array('login','logout');//需要加密验证的命令
    // public static $security = 'security';//加密验证的密钥
    
    //允许的命令白名单
    private $allowCmds = array(
        'habitList','ownHabit','login','verificationCode','perfectInfo','bannerImg','productLibrary','CommodityDetails',
        'register','updatePassword','checkMobile','goodsDetail','PublishWish','PayMethod','SelfDefineWish',
        'userInfo','sectionDetail','habitTarget','habitSelect',
        'habitDetail','habitSign','updateUserInfo','newTypeList',
        'updateHeadImg','treeList','treeSelect','shineList','proposalPost',
        'messageList','messageDetail','signDetail','liveList',
        'addressList','addressDetail','payRecharge','bundling',
        'addressDetailUpdate','searchHistoryList','searchDelete','appSetting',
        'searchBetList','serviceQuestionList','serviceGuide','messageUnread',
        'orderDetail','goodsRecommend','location','serviceRegisterAgreement',
        'serviceQuestionDetail','addressArea','goodsShow','goodsShowList',
        'goodsShowDetail','goodsShowAdd','goodsShowAddPost','categoryList',
        'categoryGoods','addressDelete','joinLogin','addressSetDefault',
        'receiveConfirm','updatePwd','unBundling','betCode','payInfo','receive','setAttention','newsToken','orderStatus','appVersion','appDown','checkCode','updatePhone','appUpdate',
		
		'PersonalCenter','MyFriend','Qrcode','AddFriend','RecommendedFriend'
    );

    //需要加密验证的命令
    private $verifyCmds = array(

        'login','updatePassword','register','userInfo','updateUserInfo','PersonalCenter','MyFriend','Qrcode','AddFriend',
        'updateHeadImg','habitList','payList','ownHabit','habitTarget','RecommendedFriend',
        'habitSelect','habitDetail','habitSign','treeList',
        'treeSelect','addressList','addressDetail','shineList','checkCode','appUpdate',

//HEAD
        'login','updatePassword','register','userInfo','updateUserInfo','CommodityDetails','PublishWish',
        'updateHeadImg','habitList','payList','ownHabit','habitTarget','PayMethod','SelfDefineWish',
        'habitSelect','habitDetail','habitSign','treeList',
        'treeSelect','addressList','addressDetail','betCode','checkCode','appUpdate',
//=======
        'login','updatePassword','register','userInfo','updateUserInfo','perfectInfo','bannerImg',
        'updateHeadImg','habitList','payList','ownHabit','habitTarget','categoryGoods','productLibrary',
        'habitSelect','habitDetail','habitSign','signDetail',
        'infoDetail','addressList','addressDetail','betCode','checkCode','appUpdate',
//登陆注册接口
        'payRecharge','addressDetailUpdate','searchDelete','messageUnread','appSetting',
        'orderDetail','liveList','addressDelete','joinLogin','newTypeList',
        'addressSetDefault','receiveConfirm','updatePwd','unBundling','updatePhone',
        'payInfo','receive','setAttention','newsToken','orderStatus','appVersion','appDown'
    );

    private $security = 'showki';//加密验证的密钥

    //返回结果常量定义 
    const E_INVALID_ACCESS = 100;//密钥验证未通过
    const E_CMD_NOT_FOUND = 400;//接口命令未找到
    const E_SUCCESS = 200;//密钥验证通过 ，并处理成功
    const E_FAIL = 404;//密钥验证通过 ，但为获得需要数据

    public $cmd = '';//命令名称
    public $params = array();//接口参数

    /**
     * 构造函数
     *
     * @param string $cmd    命令名称
     * @param array  $params 接口参数
     *
     * @return void
     */
    function __constrcut($cmd,$params)
    {
        $this->cmd = $cmd;
        $this->params = $params;
    }

    /**
     * 根据cmd获取处理的子类
     * 
     * @param type $cmd [description]
     *
     * @return type     [description]
     */
    static function getCmdClass($cmd)
    {
        switch ($cmd) {

        case 'habitList':
            return "UserHabitApi";break;//习惯列表
        case 'ownHabit':
            return "UserHabitApi";break;//我的习惯
        case 'habitTarget':
            return "UserHabitApi";break;//习惯目标
        case 'habitSelect':
            return "UserHabitApi";break;//习惯选择
        case 'habitDetail':
            return "UserHabitApi";break;//习惯详情
        case 'habitSign':
            return "UserHabitApi";break;//习惯打卡
        case 'shineList':
            return "UserHabitApi";break;//阳光值记录

        case 'treeList':
            return "UserTreeApi";break;//树列表
        case 'treeSelect':
            return "UserTreeApi";break;//选择树
        case 'liveList':
            return "UserTreeApi";break;//选择树

        case 'addressList':
            return "AddressApi";break;//收货地址列表
        case 'addressDetail':
            return "AddressApi";break;//收货地址详情
        case 'addressSetDefault':
            return "AddressApi";break;//设置默认地址
        case 'addressDetailUpdate':
            return "AddressApi";break;//收货地址提交
        case 'location':
            return "AddressApi";break;//所在城市坐标
        case 'addressArea':
            return "AddressApi";break;//区域信息
        case 'addressDelete':
            return "AddressApi";break;//删除收货地址
        case 'receive':
        return "OrderApi";break;//设置收货地址
        case 'newsToken':
            return 'MessageApi';break;

        

        case 'categoryList':
            return "CategoryApi";break;//商品分类信息
        

        case 'login':
            return "FrontUserApi";break;//会员登录
        case 'verificationCode':
            return "FrontUserApi";break;//手机验证码
        case 'register':
            return "FrontUserApi";break;//会员注册
        case 'updatePassword':
            return "FrontUserApi";break;//忘记密码 找回密码
        case 'userInfo':
            return "FrontUserApi";break;//我的资料
        case 'checkMobile':
            return "FrontUserApi";break;//手机号码验证
        case 'betCode':
            return "FrontUserApi";break;//获取夺宝号码
        case 'joinLogin':
            return "FrontUserApi";break;//第三方登录
        case 'updateUserInfo':
            return "FrontUserApi";break;//会员中心_编辑会员信息
        case 'bundling':
            return "FrontUserApi";break;//会员中心_第三方绑定
        case 'unBundling':
            return "FrontUserApi";break;//会员中心_解除第三方绑定
        case 'updatePwd':
            return "FrontUserApi";break;//修改密码
        case 'updateHeadImg':
            return "FrontUserApi";break;//会员中心_修改头像
        case 'setAttention':
            return "FrontUserApi";break;//会员中心_修改消息
        case 'checkCode':
            return "FrontUserApi";break;//检查验证码
        case 'updatePhone':
            return "FrontUserApi";break;//检查验证码

        case 'messageList':
            return "MessageApi";break;//会员中心_消息列表
        case 'messageDetail':
            return "MessageApi";break;//消息详细
        case 'messageUnread':
            return "MessageApi";break;//未读消息数
        case 'newTypeList':
            return "MessageApi";break;//消息分类

        case 'orderDetail':
            return "OrderApi";break;//订单详情
        case 'orderStatus':
            return "OrderApi";break;//订单详情
        case 'receiveConfirm':
            return "OrderApi";break;//确认收货

        case 'payList':
            return "PayApi";break;//账单记录
        case 'payInfo':
            return "PayApi";break;//会员中心_支付信息
        case 'payRecharge':
            return "PayApi";break;//会员中心_充值
        case 'proposalPost':
            return "ProposalApi";break;//意见反馈
			
		case 'perfectInfo':
            return "FrontUserApi";break;//完善信息
		
		case 'bannerImg':
            return "BannerApi";break;//产品库——首页轮滚图
		case 'categoryGoods':
            return "CategoryApi";break;//分类下商品列表
		case 'productLibrary':
            return "productLibraryApi";break;//分类下商品列表
		case 'CommodityDetails':
            return "productLibraryApi";break;//商品详情
		case 'PublishWish':
            return "productLibraryApi";break;//发布心愿--编辑地址
			
		case 'PayMethod':
            return "productLibraryApi";break;//发布心愿--支付方式和心愿寄语
		case 'SelfDefineWish':
            return "productLibraryApi";break;//自定义心愿
		case 'PersonalCenter':
            return "PersonalCenterApi";break;//个人中心
		case 'MyFriend':
            return "PersonalCenterApi";break;//我的好友
		case 'Qrcode':
            return "PersonalCenterApi";break;//我的二维码
		case 'AddFriend':
            return "PersonalCenterApi";break;//搜索加好友
		case 'RecommendedFriend':
            return "PersonalCenterApi";break;//推荐好友


        case 'appVersion':
            return "ServiceApi";break;//app版本
        case 'appDown':
            return "ServiceApi";break;//app下载
        case 'appSetting':
            return "ServiceApi";break;//系统维护
        case 'appUpdate':
            return "ServiceApi";break;//app更新


        default:
            return null;break;
        }
    }
    /**
     * 密钥验证
     *
     * @return bool    是否验证成功
     */
    function verifyCmds()
    {
        $params=$this->params;
        $verify=$params['verify'];
        unset($params['verify']);
        foreach($params as $key=>$value){
            if(is_array($value))
                unset($params[$key]);
        }
        ksort($params);
        $md5key=md5(implode('', $params).$this->security);
        if ($verify != $md5key) {
            return false;
        } else {
            return true;
        }
    }
    /**
     * [_verfiyBase description]
     *
     * @param array $params 输入的参数，必须包含rand,cmd
     * @return type         [description]
     */
    private function _verfiyBase()
    {
        if (!in_array($this->cmd,$this->allowCmds)) {
            return self::E_CMD_NOT_FOUND;
        }
        if (in_array($this->cmd,$this->verifyCmds)) {
            if (!$this->params['verify'] || !$this->verifyCmds()) {
                return self::E_INVALID_ACCESS;//验证失败
            }
        }
        return self::E_SUCCESS;
    }

    function handleCmd()
    {
        $verifyBase = $this->_verfiyBase();
        //密钥验证未通过
        if ($verifyBase != self::E_SUCCESS) {
            return $this->echoResult($verifyBase,'message',array());
        }
        //方法不存在
        if (!method_exists($this,$this->cmd)) {
            return $this->echoResult(self::E_CMD_NOT_FOUND,'message',array());
        }
        $arr=array('cmd'=>$this->cmd,'params'=>$this->params);
        //return call_user_method_array($this->cmd,$this,array($arr));
        //
        return call_user_func_array(array($this,$this->cmd),array($arr));
    }
    /**
     * echoResult
     */
    protected function echoResult($verifyBase,$message,$body=array()){
            switch ($verifyBase){
                case self::E_INVALID_ACCESS:$message='密钥验证未通过';break;
                case self::E_CMD_NOT_FOUND:$message='接口命令未找到';break;
            }
            return json_encode(array(
                'cmd'=>$this->cmd,
                'resultCode'=>$verifyBase,
                'resultMessage'=>$message
            ));
    }


    /**
     * 获取图片路径
     *
     * @param string $pic 参数接收
     *
     * @return string
     */
    public static function getPic($pic)
    {
        if ($pic) {
            if (strpos($pic, "http://") === false) {
                return Yii::app()->params['picUrl'].'/'.$pic;
            } else {
                return $pic;
            }
        } else {
            return '';
        }

    }

}