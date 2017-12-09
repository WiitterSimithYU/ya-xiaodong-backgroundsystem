<?php
/**
* 操作日志
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
class bizSystemLog
{
    /**
     * 获取操作日志列表
     * @param  Log $search_model 搜索条件
     * @return array 日志列表
     */
    public static function getLogList($search_model) 
    {
        //$model = new Log();
        //$criteria = new CDbCriteria();
        //$model->unsetAttributes();var_dump($search_model);
        $model = $search_model;
        $criteria = $model->search()->criteria;
        $criteria->order = "t.created_at desc";
        
        $pages = new CPagination();
        $pages->itemCount = $model->count($criteria);
        $pages->pageSize = Yii::app()->params['postsPerPage'];
        $pages->applyLimit($criteria);

        $tableData = $model->findAll($criteria);
        return array($tableData, $pages);
    }

    /**
     * 业务日志
     * @param string $busName   业务名
     * @param string $operation 操作名
     * @param string $comment   描述
     * @param int    $user_id   会员ID
     * @return boolean 成功或失败
     */
    public static function operationLog($busName, $operation, $comment = "", $user_id=0)
    {
        $log = new Log();
        $log->business_name = $busName;
        $log->operation_type = $operation;
        if ($user_id) {
            $log->created_by = $user_id;
        } else {
            $log->created_by = Yii::app()->user->userid;
        }
        $log->created_at = time();
        $log->comment = $comment;
        $log->insert();
    }

    /**
     * 明细日志
     * @param array $dataArray 内容数组,包括tableName,oldValue,newValue,owner
     * @return boolean 成功或失败
     */
    public static function dataLog($dataArray)
    {
        $logDetail = new LogDetail();
        $logDetail->attributes = $dataArray;
        $logDetail->created_at = time();
        if (!$dataArray['created_by']) {
            $logDetail->created_by = Yii::app()->user->userid ? Yii::app()->user->userid : '';
        }
        $logDetail->insert();
    }

    /**
     * 获取model参数json
     * @param  Class $model 数据model
     * @return string        返回json
     */
    public static function dataJson($model) 
    {
        return json_encode($model->attributes);
    }

    /**
     * 创建
     * @param  Class  $model      数据model
     * @param  Class  $new        新数据model
     * @param  string $name       模块
     * @param  string $op         操作
     * @param  string $table_name 表名
     * @param  int    $user_id    会员ID
     * @return string  返回json
     */
    public static function createLog($model,$new,$name,$op,$table_name,$user_id=0)
    {
        if (is_object($model)) {
            $model = self::dataJson($model);
        }
        if (is_object($new)) {
            $new = self::dataJson($new);
        }
        if (is_array($new)) {
            $new = json_encode($new);
        }
        self::operationLog($name, $op, 0, $user_id);
        self::dataLog(
            array(
                'table_name' => $table_name,
                'oldValue' => "url:".$_SERVER['REMOTE_ADDR'].$_SERVER['PHP_SELF'].$_SERVER["QUERY_STRING"]." ".$model,
                'newValue' => $new,
                'created_by' => $user_id)
        );
    }
}
