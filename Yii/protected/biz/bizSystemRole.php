<?php
/**
* 系统角色
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
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
class bizSystemRole
{

    /**
     * 添加角色
     * @param string  $name        角色名
     * @param string  $description 描述
     * @param integer $priority    优先级
     * @param array   $right_names 拥有操作
     * @return array 角色
     */
    public static function addRole($name, $description, $priority = 100, $right_names = array()) 
    {
        if (Authitem::model()->count('name = :name and type = 2', array(':name' => $name)) > 0) 
            return "该角色已存在";

        if (!Yii::app()->authManager->createRole($name, $description)) {
            return "创建失败";
        }

        $authItem = Authitem::model()->findByPk($name);
        $authItem->priority = $priority ? intval($priority) : 100;
        if (!$authItem->save()) {
            return "优先级保存失败";
        }
        //给角色赋予权限
        bizSystemOperation::bindingRole($right_names, $name);
        
        return $authItem;
    }

    /**
     * 修改系统角色
     * @param  string  $name        角色名
     * @param  string  $description 描述
     * @param  integer $priority    优先级
     * @param  array   $right_names 拥有操作
     * @return boolean 成功或失败
     */
    public static function editRole($name, $description, $priority = 100, $right_names = array()) 
    {
        $model = bizSystemRole::getRoleByName($name);
        if (is_string($model)) {
            return $model;
        } else if ($model) {
            $model->description = $description;
            $model->priority = $priority ? intval($priority) : 100;
            if (!$model->update()) 
                return "保存失败";

            //给角色赋予权限
            bizSystemOperation::bindingRole($right_names, $name);

            return true;
        }
    }

    /**
     * 获取系统角色列表
     * @param  AdminUser $search_model 搜索条件
     * @return array
     */
    public static function getRoleList($search_model)
    {
        $model = new Authitem();
        $criteria = new CDbCriteria();
        $criteria->compare('type', 2);
        $criteria->order = 'priority, name';

        if ($search_model->name) {
            $criteria->addSearchCondition('name', $search_model->name);
        }

        $pages = new CPagination();
        $pages->itemCount = $model->count($criteria);
        $pages->pageSize = Yii::app()->params['postsPerPage'];
        $pages->applyLimit($criteria);

        $tableData = $model->findAll($criteria);
        return array($tableData, $pages);
    }

    /**
     * 获取系统角色列表
     * @param  string $type 类型
     * @return array
     */
    public static function getRoleArray($type = 'array')
    {
        $_result = array();
        $items = Authitem::model()->findAll(array('condition' => "type = 2", 'order' => "priority, name"));
        
        if ($type = 'array') {
            foreach ($items as $item) {
                $_result[$item->name] = $item->name;
            }
        } elseif ($type = 'json') {
            foreach ($items as $item) {
                $temp = array();
                $temp['name'] = "$item";
                $_result[] = $temp;
            }
            $_result = json_encode($_result);
        }
        return $_result;
    }

    /**
     * 根据角色名获取角色信息
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public static function getRoleByName($name) 
    {
        $authItem = Authitem::model()->findByPk($name);
        if (!$authItem) 
            return "该角色不存在";

        return $authItem;
    }

    /**
     * 获取角色下拥有的权限
     * @param  string $role_name 角色名
     * @return array            [description]
     */
    public static function getOperationByRole($role_name)
    {
        $auth = Yii::app()->authManager;
        $itemChilds = $auth->getItemChildren($role_name);
        $result = array();
        foreach ($itemChilds as $name => $authItem) {
            $result[] = $name;
        }
        return $result;
    }

    /**
     * 获取用户所有角色
     * @param  integer $user_id 用户id
     * @return array
     */
    public static function getRoleOfUserList($user_id)
    {
        $authAssignment = Authassignment::model()->findAll("userid = :userid", array(':userid' => $user_id));
        $result = array();
        foreach ($authAssignment as $item) {
            $result[] = $item->itemname;
        }
        return $result;
    }

    /**
     * 绑定系统用户
     * @param  array   $right_names   绑定角色
     * @param  integer $admin_user_id 系统用户id
     * @return boolean 成功或失败
     */
    public static function bindingRole($right_names, $admin_user_id) 
    {
        $auth = Yii::app()->authManager;
        //初始化权限
        foreach ($auth->getAuthAssignments($admin_user_id) as $name) {
            $auth->revoke($name->itemname, $admin_user_id);
        }
        //需要添加的子权限
        $add_name = is_array($right_names) ? $right_names : array();
        foreach ($add_name as $add) { //添加
            // $auth->addItemChild($model->name, $add);
            $auth->assign($add, $admin_user_id);
        }
        return true;
    }
}
