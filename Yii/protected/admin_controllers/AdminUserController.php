<?php
/**
 * 系统用户管理
 * * * PHP version 5
 *
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
class AdminUserController extends AdminBaseController
{
    public $layout = 'admin';

    /**
     * 创建用户
     *
     * @return array 返回用户信息
     */
    public function actionCreate()
    {
        $model = new AdminUser();
        if (isset($_POST['AdminUser'])) {
            $model->attributes = $_POST['AdminUser'];
            $model->confirm_password = $_POST['AdminUser']['confirm_password'];

            $result = bizAdmin::addAdmin($model);
            if ($result && !is_string($result)) {
                //日志
                bizSystemLog::operationLog("系统用户管理", "新增");
                //保存权限
                $right_names = $_POST['right_names'];
                bizSystemRole::bindingRole($right_names, $result->id);
            }
        }

        $auths = bizSystemRole::getRoleArray();
        $operation = bizSystemOperation::getOperationArray();

        $this->render(
            'create', array(
            'model' => $model,
            'auths' => $auths,
            'operation' => $operation,
            'backUrl' => $this->getBackUrl(),
            'result' => $result)
        );
    }

    /**
     * 更新用户
     *
     * @param int $id 用户ID
     *
     * @return array 返回用户信息
     */
    public function actionUpdate($id)
    {
        $model = bizAdmin::getAdminInfo($id);
        if (isset($_POST['AdminUser'])) {
            $model->attributes = $_POST['AdminUser'];
            $model->pre_password = $_POST['AdminUser']['pre_password'];
            $model->confirm_password = $_POST['AdminUser']['confirm_password'];
            $result = bizAdmin::editAdmin($model);
            if ($result && !is_string($result)) {
                //日志
                bizSystemLog::operationLog("系统用户管理", "编辑");
                //保存权限
                $right_names = $_POST['right_names'];
                bizSystemRole::bindingRole($right_names, $model->id);
            }
        }

        $auths = bizSystemRole::getRoleArray();
        $has_auths = bizSystemRole::getRoleOfUserList($model->id);
        $operation = bizSystemOperation::getOperationArray();

        $this->render(
            'update', array(
            'model' => $model,
            'auths' => $auths,
            'has_auths' => $has_auths,
            'operation' => $operation,
            'backUrl' => $this->getBackUrl(),
            'result' => $result)
        );
    }

    /**
     * 用户列表
     *
     * @return array 返回列表信息
     */
    public function actionIndex()
    {
        $search_model = new AdminUser();
        $search_model->is_disabled = -1;
        $search_model->role_name = 'all';

        if (isset($_POST['AdminUser'])) {
            $search_model->attributes = $_POST['AdminUser'];
            $search_model->role_name = $_POST['AdminUser']['role_name'];
        }

        list($tableData, $pages) = bizAdmin::getAdminList($search_model);

        $role_array = bizSystemRole::getRoleArray();
        $is_disabled_array = AdminUser::$isDisabledSet;

        $this->render(
            'index', array(
            'search_model' => $search_model,
            'role_array' => $role_array,
            'is_disabled_array' => $is_disabled_array,
            'tableData' => $tableData,
            'pages' => $pages)
        );
    }

    /**
     * 返回路径
     *
     * @return array 返回列表信息
     */
    private function getBackUrl()
    {
        return Yii::app()->createUrl('adminUser/index', array('page' => $_REQUEST['page']));
    }
}

