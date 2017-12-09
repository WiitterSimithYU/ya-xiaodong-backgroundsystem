<?php
/**
* 系统操作
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
class bizSystemOperation
{
    public $operation;

    /**
     * 添加操作
     * @param string  $name        操作名
     * @param string  $description 描述
     * @param integer $priority    优先级
     * @return boolean 成功或失败
     */
    public static function addOperation($name, $description, $priority = 100) 
    {
        if (Authitem::model()->count('name = :name and type = 0', array(':name' => $name)) > 0) 
            return "该操作已存在";

        if (!Yii::app()->authManager->createOperation($name, $description)) {
            return "创建失败";
        }
            
        $auth = Authitem::model()->findByPk($name);
        $auth->priority = $priority ? intval($priority) : 100;
        if (!$auth->save()) {
            return "优先级保存失败";
        }

        return $auth;
    }

    /**
     * 获取系统操作列表
     * @param  Authitem $search_model 搜索条件
     * @return array 操作列表
     */
    public static function getOperationList($search_model) 
    {
        $model = new Authitem();
        $criteria = new CDbCriteria();
        $criteria->compare('type', 0);
        $criteria->order = 'priority, name';

        if ($search_model->name) {
            $criteria->addSearchCondition('name', $search_model->name, 'OR');
            // $criteria->addSearchCondition('description', $search_model->name, 'OR');
        }

        $pages = new CPagination();
        $pages->itemCount = $model->count($criteria);
        $pages->pageSize = Yii::app()->params['postsPerPage'];
        $pages->applyLimit($criteria);

        $dataTable = $model->findAll($criteria);
        return array($dataTable, $pages);
    }

    /**
     * 获取所有操作
     * @param  string $type [description]
     * @return [type]       [description]
     */
    public static function getOperationArray($type = 'array')
    {
        $items = Authitem::model()->findAll(array('condition' => "type = 0", 'order' => "priority, name"));
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
     * 绑定角色
     * @param  string $right_names 操作名
     * @param  string $role_name   角色名
     * @return boolean 成功或失败
     */
    public static function bindingRole($right_names, $role_name) 
    {
        $auth = Yii::app()->authManager;
        $itemChilds = $auth->getItemChildren($role_name);
        //初始化
        foreach ($itemChilds as $name => $authItem) {
            $auth->removeItemChild($role_name, $name);
            $auth->revoke($role_name, $name);
        }
        //给角色赋予操作权限
        if ($right_names) {
            foreach ($right_names as $right_name) {
                $auth->addItemChild($role_name, $right_name);
            }
        }
    }
}
