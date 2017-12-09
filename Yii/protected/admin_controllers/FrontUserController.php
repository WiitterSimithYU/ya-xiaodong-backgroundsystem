<?php

/**
 * 注册用户
 * * PHP version 5
 *
 * @category FrontUser
 * @package  FrontUser
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * CApplication is the base class for all application classes.
 *
 * @category FrontUser
 * @package  FrontUser
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
class FrontUserController extends AdminBaseController
{

    /**
     * 用户列表
     *
     * @return array
     */
    public function actionIndex()
    {

        $array = $_POST['userInfo'];
        $list = BizFrontUser::userList($array);
        $tableData = $list['0'];
        $pages = $list['1'];

        $this->render(
            'index', array(
            'tableData' => $tableData,
            'pages' => $pages,
            'array' => $array )
        );

    }

    /**
     * 用户导出
     *
     * @return array
     */
    public function actionExport()
    {

        $array = $_POST['userInfo'];
        $array['export'] = 1;
        $list = BizFrontUser::userList($array);
        $tableData = Common::objectToArray($list['0']);

        $re = new BizDownLoad();
        $re->setHeader(array("序号","姓名","就职酒店","时间"));
        $re->downLoad($tableData,'','');

    }
	
	/**
     * 查看
     *
     * @param int $id 用户id
     *
     * @return int
     */
    public function actionView($id)
    {
        $user = FrontUser::model()->findByPk($id);
        $user = Common::objectToArray($user);
        $re = Answer::model()->findAll("user_id = {$id}");
        if ($re) {
            foreach ($re as $va) {
                $answer["q".$va['question']] = $va['answer'];
            }
        }
        $user['answer'] = $answer;
        $this->render(
            'view', array(
                'model' => $user,
                'backUrl' => $this->getBackUrl($_REQUEST['page']))
        );
    }

    /**
     * 返回主页面
     *
     * @param int $page 当前页数
     *
     * @return int $result成功1 失败0
     */
    private function getBackUrl($page)
    {
        return Yii::app()->createUrl('frontUser/index', array('page' => $page));
    }


}
