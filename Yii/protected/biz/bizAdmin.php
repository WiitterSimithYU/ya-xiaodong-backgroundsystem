<?php
/**
 * 系统用户
 * * * PHP version 5
 *
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
*/

/**
 * CApplication is the base class for all application classes.
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
class bizAdmin
{
    public $adminUser;

    /**
     * 后台登录
     * @param  string $username 账号
     * @param  string $password 密码
     * @param  string $isAuto   自动登录
     * @return boolean 成功或失败
     */
    public static function login($username, $password, $isAuto = null) 
    {
        $username = trim($username);
        $password = trim($password);
        if ($username == '') return "请输入账号";
        if ($password == '') return "请输入密码";

        $adminUser = AdminUser::model()->findByAttributes(array('loginname' => $username));//, 'is_disabled' => 0
        if (!$adminUser) return "账号不存在";
        if ($adminUser->is_disabled) return "账号已被禁用";
        if (!$adminUser || $adminUser->password != md5($password)) 
            return "账号或密码不正确";

        $adminIdentity = new AdminIdentity($username, $password);
        $adminIdentity->setState('userid', $adminUser->id);
        $adminIdentity->setState('loginname', $adminUser->loginname);
        $adminIdentity->setState('nickname', $adminUser->nickname);
        $adminUser->last_login_at = time();
        $adminUser->last_login_ip = Yii::app()->request->userHostAddress;

        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (strpos($agent, 'iphone') || strpos($agent, 'ipad')) {
            $adminUser->last_login_source = "IOS";
        } elseif (strpos($agent, 'android')) {
            $adminUser->last_login_source = "Android";
        } else {
            $adminUser->last_login_source = "网页";
        }
        // $is_pc = (strpos($agent, 'windows nt')) ? true : false;
        // $is_mac = (strpos($agent, 'mac os')) ? true : false;

        $adminUser->update();

        $duration = 3600 * 24 * 30; // 30 days
        Yii::app()->user->login($adminIdentity, $duration);

        //自动登录
        if ($isAuto == 'on') {
            $effective_time = time() + 3600 * 24 * 30;
            setcookie('yl_isAuto', 'on');
            setcookie('loginname', $username, $effective_time);
            setcookie('password', $password, $effective_time);
        } else {
            setcookie('yl_isAuto');
            setcookie('loginname');
            setcookie('password');
        }

        return true;
    }

    /**
     * 后台退出
     * @return boolean 成功或失败
     */
    public static function logout() 
    {
        Yii::app()->user->logout();
    }

    /**
     * 添加系统用户
     * @param AdminUser $admin_model 系统用户信息model
     * @return AdminUser 用户
     */
    public static function addAdmin($admin_model) 
    {
        if (AdminUser::model()->count("loginname = :loginname and is_disabled = 0", array(':loginname' => $admin_model->loginname)) > 0) 
            return "改账号已被人注册,请重新输入";
        if ($admin_model->password != $admin_model->confirm_password) 
            return "两次密码输入不一致";

        $attributes = array();
        $attributes['loginname'] = $admin_model->loginname;
        $attributes['nickname'] = $admin_model->nickname;
        $attributes['password'] = md5($admin_model->password);
        $attributes['created_at'] = time();
        $attributes['is_disabled'] = 0;

        $model = new AdminUser();
        $model->attributes = $attributes;
        if (!$model->save()) 
            return "创建失败";

        $model->admin_number = generateNumber('AU', $model->id);
        if (!$model->update()) 
            return "生成用戶编号失败";
        
        return $model;
    }

    /**
     * 修改系统用户信息
     * @param  AdminUser $admin_model 系统用户信息model
     * @return boolean 成功或失败
     */
    public static function editAdmin($admin_model) 
    {
        if ($admin_model->password != $admin_model->confirm_password)
            return "两次密码输入不一致";
        if (!$admin_model->id) 
            return "该用户不存在";
        $model = bizAdmin::getAdminInfo($admin_model->id);
        if (!$model) 
            return "该用户不存在";
        if (md5($admin_model->pre_password) != $model->password)
            //return "原密码输入不正确";
        if (AdminUser::model()->count("loginname = :loginname and is_disabled = 0 and id <> :id", array(':loginname' => $admin_model->loginname, ':id' => $admin_model->id)) > 0) 
            return "改账号已被人注册,请重新输入";
        if ($admin_model->password) {
            $admin_model->password = md5($admin_model->password);
        } else {
            //unset($admin_model->password);
            $admin_model->password = $model->password;
        }
        $model->attributes = $admin_model->attributes;
        if (!$model->update()) 
            return "编辑失败";

        return true;
    }

    /**
     * 获取系统用户列表
     * @param  AdminUser $search_model 搜索条件
     * @return array 用户列表
     */
    public static function getAdminList($search_model) 
    {
        $model = new AdminUser();
        $criteria = new CDbCriteria();
        if ($search_model->nickname) {
            $criteria->addSearchCondition('nickname', $search_model->nickname);
        }
        if ($search_model->loginname) {
            $criteria->addSearchCondition('loginname', $search_model->loginname);
        }
        if ($search_model->role_name != 'all') {
            $authAssignments = Authassignment::model()->findAllByAttributes(array('itemname' => $search_model->role_name));
            $userids = array();
            foreach ($authAssignments as $authAssignment) {
                $userids[] = $authAssignment->userid;
            }
            $criteria->addInCondition('id', $userids);
        }
        if ($search_model->is_disabled > -1) {
            $criteria->addCondition("is_disabled = :is_disabled");
            $criteria->params[':is_disabled'] = $search_model->is_disabled;
        }

        $pages = new CPagination();
        $pages->itemCount = $model->count($criteria);
        $pages->pageSize = Yii::app()->params['postsPerPage'];
        $pages->applyLimit($criteria);

        $tableData = $model->findAll($criteria);
        return array($tableData, $pages);
    }

    /**
     * 获取系统用户信息
     * @param  integer $id 系统用户id
     * @return AdminUser 用户信息
     */
    public static function getAdminInfo($id) 
    {
        $model = AdminUser::model()->findByPk($id);
        if (!$model) 
            return "该用户不存在";
        return $model;
    }
}
