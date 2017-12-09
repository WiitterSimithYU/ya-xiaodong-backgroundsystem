<?php

/**
 * 问题
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
class QuestionController extends AdminBaseController
{

    /**
     * 用户列表
     *
     * @return array
     */
    public function actionIndex()
    {
        $question = Question::model()->findAll();
        if ($question) {
            foreach ($question as $key=>$va) {
                $rel = array();
                $array[] = array("question"=>$va["id"],"name"=>$va["name"]);
                $info = new Answer();
                if (in_array($key,array(0,1,3))) {
                    $re = $info->answerList(array("question"=>$va["id"]));
                    //选项
                    $choise = explode(",", $va["choise"]);
                    //答案
                    foreach ($re[0] as $v) {
                        $answer[$v['answer']][] = $v['user_id'];
                    }
                    foreach ($choise as $v) {
                        //$rel[] = array("name"=>$v,"value"=>round(count($answer[$v])/count($re[0]),2)*100,"percent"=>round((count($answer[$v])/count($re[0])*100))."%");
                        $rel[] = array("name"=>$v,"value"=>round(count($answer[$v])),"percent"=>round((count($answer[$v])/count($re[0])*100))."%");
                    }
                    $tableData[] = $rel;
					//print_r($rel);
					//exit;
                } else {
                    $re = $info->answerList(array("question" => $va["id"],"limit" => 5));
                    $tableData[] = Common::objectToArray($re['0']);
                }

                $pages[] = $re['1'];
            }
        }
		//print_r($tableData);
		

        $this->render(
            'index', array(
                'tableData' => $tableData,
                'pages' => $pages,
                'array' => $array )
        );

    }

    /**
     * 信息导出
     *
     * @return array
     */
    public function actionExport()
    {
        $question = Question::model()->findAll();
        if ($question) {
            foreach ($question as $key=>$va) {
                $rel = array();
                $info = new Answer();
                $re = $info->answerList(array("question"=>$va["id"]));
                $q[$va["id"]] = $va["name"];
                $array[] = array("question"=>$va["id"],"name"=>$va["name"],"answer"=>count($re[0]));
                //$info = new Answer();
                if (in_array($key,array(0,1,3))) {
                    //$re = $info->answerList(array("question"=>$va["id"]));
                    //选项
                    $choise = explode(",", $va["choise"]);
                    //答案
                    foreach ($re[0] as $v) {
                        $answer[$v['answer']][] = $v['user_id'];
                    }
                    foreach ($choise as $v) {
                        $rel[] = array("name"=>$v,"value"=>round(count($answer[$v])/count($re[0]),2)*100,"percent"=>round((count($answer[$v])/count($re[0]))*100)."%");
                    }
                    $tableData[] = $rel;
                } else {
                    //$re = $info->answerList(array("question" => $va["id"]));
                    $tableData[] = Common::objectToArray($re['0']);
                }

                $pages[] = $re['1'];
            }
        }

        //汇总
        $user = FrontUser::model()->findAll();
        $user = Common::objectToArray($user);
        if ($user) {
            $answer = array();
            foreach ($user as $key=>$val) {
                $re = Answer::model()->findAll("user_id = {$val['id']}");
                if ($re) {
                    foreach ($re as $va) {
                        $answer["Q".$va['question']] = array("question"=>$q[$va['question']],"answer"=>$va['answer']);
                    }
                }
                $user[$key]['answer'] = $answer;
            }
        }

        $re = new BizDownLoad();
        $re->answer($tableData, $array, $user);

    }
	
	/**
     * 查看
     *
     * @param int $id 问题id
     *
     * @return int
     */
    public function actionView($id)
    {

        $array = array("question"=>$id);
        $info = new Answer();
        $re = $info->answerList($array);

        $tableData = $re['0'];
        $pages = $re['1'];
        $question = Question::model()->findByPk($id);
        $array['name'] = $question->name;
		
		$user = FrontUser::model()->findByPk($id);
        $user = Common::objectToArray($user);
        $re = Answer::model()->findAll("user_id = {$id}");
        if ($re) {
            foreach ($re as $va) {
                $answer["q".$va['question']] = $va['answer'];
            }
        }
        $user['answer'] = $answer;
		

		print_r($array);
		//exit;
        $this->render(
            'answer', array(
                'tableData' => $tableData,
                //'pages' => $pages,
				'model' => $user,
                'array' => $array )
        );

    }
	
	/**
     * 查看
     *
     * @param int $id 问题id
     *
     * @return int
     */
    public function actionAnswer($id)
    {
		$array = array("question"=>$id);
        $info = new Answer();
        $re = $info->answerList($array);

        $tableData = $re['0'];
        $pages = $re['1'];
        $question = Question::model()->findByPk($id);
        $array['name'] = $question->name;
		
		
        $this->render(
            'answer', array(
                'tableData' => $tableData,
                'pages' => $pages,
				'model' => $user,
                'array' => $array )
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
