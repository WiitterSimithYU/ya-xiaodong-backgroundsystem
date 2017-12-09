<?php
/**
* 系统用户
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
class bizSystemUser
{
    public $adminUser;

    /**
     * 获取系统用户列表
     * @param  AdminUser $search_model 搜索条件
     * @return array
     */
    public static function getUserList($search_model)
    {
        $model = new AdminUser();
        $criteria = new CDbCriteria();
        $criteria->select = "t.*, aa.itemname as role_name";
        $criteria->join = "left join authassignment aa on t.id = aa.userid left join authitem ai on aa.itemname = ai.name";
        $criteria->addCondition("ai.type = 2");

        if ($search_model->id) {
            $criteria->addCondition("t.id = :id");
            $criteria->params[':id'] = $search_model->id;
            // $criteria->addCondition("t.nickname like :nickname");
            // $criteria->params[':nickname'] = "%".$search_model->nickname."%";
        }

        if ($search_model->role_name) {
            $userids = bizSystemRole::getOwnsRoleOfUserIDList($search_model->role_name);
            $criteria->addInCondition('t.id', $userids);
        }

        if ($search_model->is_disabled > -1) {
            $criteria->addCondition("t.is_disabled = :is_disabled");
            $criteria->params[':is_disabled'] = $search_model->is_disabled;
        }
        $criteria->order = "created_at desc";

        $pages = new CPagination();
        $pages->itemCount = $model->count($criteria);
        $pages->pageSize = Yii::app()->params['postsPerPage'];
        $pages->applyLimit($criteria);

        $tableData = $model->findAll($criteria);
        return array($tableData, $pages);
    }

    /**
     * 获取所有用户
     * @return array
     */
    public static function getUserArray()
    {
        return AdminUser::model()->findAll();
    }
}
