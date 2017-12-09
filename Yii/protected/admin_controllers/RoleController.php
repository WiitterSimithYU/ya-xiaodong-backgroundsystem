<?php
/**
 * 系统角色
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
 *
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
class RoleController extends AdminBaseController
{
    public $layout='admin';
    
    /**
     * 创建角色
     *
     * @return 返回角色信息
     */
    public function actionCreate()
    {
        $model = new AuthRoleForm();
        $model->priority = 100;

        if (isset($_POST['AuthRoleForm'])) {
            $model->attributes = $_POST['AuthRoleForm'];
            $right_names = $_POST['right_names'];

            $result = bizSystemRole::addRole($model->name, $model->description, $model->priority, $right_names);
            if ($result && !is_string($result)) {
                bizSystemLog::operationLog("角色管理", "新增");
            }
        }

        $operation = bizSystemOperation::getOperationArray();

        $this->render(
            'create', array(
            'model' => $model,
            'operation' => $operation,
            'backUrl' => $this->getBackUrl($_REQUEST['page']),
            'result' => $result)
        );
    }

    /**
     * 更新角色
     *
     * @param string $name 名称
     *
     * @return int
     */
    public function actionUpdate($name)
    {
        $model = bizSystemRole::getRoleByName($name);
        if (isset($_POST['AuthRoleForm'])) {
            $model->attributes = $_POST['AuthRoleForm'];
            $right_names = $_POST['right_names'];

            $result = bizSystemRole::editRole($model->name, $model->description, $model->priority, $right_names);
            if ($result && !is_string($result)) {
                bizSystemLog::operationLog("角色管理", "修改");
            }
        }

        $operation = bizSystemOperation::getOperationArray();
        $has_operation = bizSystemRole::getOperationByRole($name);

        $this->render(
            'update', array(
            'model' => $model,
            'operation' => $operation,
            'has_operation' => $has_operation,
            'backUrl' => $this->getBackUrl($_REQUEST['page']),
            'result' => $result)
        );
    }

    /**
     * 角色列表
     *
     * @return array
     */
    public function actionIndex()
    {
        $search_model = new Authitem();
        if (isset($_POST['Authitem'])) {
            $search_model->attributes = $_POST['Authitem'];
        }
        list($dataTable, $pages) = bizSystemRole::getRoleList($search_model);

        $this->render(
            'index', array(
            'search_model' => $search_model,
            'dataTable' => $dataTable,
            'pages' => $pages)
        );
    }

    /**
     * 返回主页面
     *
     * @param int $page 页数
     *
     * @return int $result成功1 失败0
     */
    private function getBackUrl($page = 1)
    {
        $page = $page ? intval($page) : 1;
        return Yii::app()->createUrl('role/index', array('page' => $page));
    }

    /**
     * 删除角色
     *
     * @return boolean 成功或失败
     */
    public function actionDeleteAuth()
    {
        $del_name = $_REQUEST['del_name'];
        $auth = Yii::app()->authManager;
        
        //先查找一下
        $authItem = AuthItem::model()->find("name = '{$del_name}'");
        if ($authItem->type == 0) {
            $title = "操作";
        } elseif ($authItem->type == 1) {
            $title = "任务";
        } elseif ($authItem->type == 2) {
            $title = "角色";
        }
        
        echo $auth->removeAuthItem($del_name);
    }
}
