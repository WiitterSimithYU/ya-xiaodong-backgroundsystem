<?php
class SiteController extends Controller
{
    public $layout = false;
    
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array (
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha' => array (
                        'class' => 'CCaptchaAction',
                        'backColor' => 0xFFFFFF,
                        'padding' => 0,
                        'height' => 40,
                        'width' => 90,
                        'maxLength' => 4,
                        'minLength' => 4,
                        'testLimit' => 999
                ),
                // page action renders "static" pages stored under 'protected/views/site/pages'
                // They can be accessed via: index.php?r=site/page&view=FileName
                'page' => array (
                        'class' => 'CViewAction'
                )
        );
    }
    
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error ['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }
    
    /**
     * Displays the login page
     */
    public function actionIndex()
    {
    	var_dump(1);die;
        $this->render("index");
    }

    public function actionInsert()
    {
	
        if (Yii::app()->request->isAjaxRequest) {
	//	echo json_encode(array("code"=>"201","msg"=>json_encode($_POST)));die;
		    $name = addslashes($_POST["name"]);
			$phone = addslashes($_POST["phone"]);
			$city = addslashes($_POST["city"]);
			$corporate = addslashes($_POST["corporate"]);
			$job = addslashes($_POST["job"]);
			$time = time();
			//echo json_encode(array("code"=>"201","msg"=>$name));die;
			
			$answers[1]=$question1=addslashes($_POST["question1"]);
			$answers[2]=$question2=addslashes($_POST["question2"]);
			$answers[3]=$question3=addslashes($_POST["question3"]);
			$answers[4]=$question4=addslashes($_POST["question4"]);
			$answers[5]=$question5=addslashes($_POST["question5"]);
			$answers[6]=$question6=addslashes($_POST["question6"]);
			$answers[8]=$question8=addslashes($_POST["question8"]);
			$answers[9]=$question9=addslashes($_POST["question9"]);
			
			$answers[7]=$question7=addslashes($_POST["advice"]);
			$answers[10]=$question10=addslashes($_POST["need"]);
			
			if(empty($name)||empty($phone)||empty($city)||empty($corporate)||empty($job)||empty($question1)||empty($question2)||empty($question3)||empty($question4)||empty($question5)||empty($question6)||empty($question8)||empty($question9)){
			 echo json_encode(array("code"=>"201","msg"=>"选择题不能为空"));die;
			}
			
            $user = new User();
			$user->name=$name;
			$user->phone=$phone;
			$user->city=$city;
			$user->corporate=$corporate;
			$user->job=$job;
			$user->time=$time;	
           	$re1 = $user->insert();
			
			$answerM = new Answer();
			$answerM -> answer=json_encode($answers);
			$answerM -> user_id=$user->id;
			$answerM -> create_time=$time;
           $re2 = $answerM->insert();
			if($re1&&$re2)
            echo json_encode(array("code"=>200));
			else
			echo json_encode(array("code"=>202,"msg"=>"网络异常，提交失败"));
			die;
            
        }
    }
   /**
     * 导出用户提交的信息
     *
     * @return array
     */
    public function actionExport()
    {
		$arr1 = array('搜索引擎'=>'1','视频'=>'2','网站'=>'3','社交渠道'=>'4','其他活动'=>'5','烘焙相关培训'=>'6');
		$arr2 = array('很了解'=>'1','一般'=>'2','不太了解'=>'3');
		$arr3 = array('满意'=>'1','一般'=>'2','不太满意'=>'3');
		$arr4 = array('罗勒火腿短棍'=>'1','黑椒葱香薄饼'=>'2','烟熏培根芝士三明治'=>'3');
		$arr5 = array('愿意'=>'1','不愿意'=>'2');
		$arr6 = array('愿意'=>'1','不愿意'=>'2');
		$arr8 = array('爱在提拉米苏'=>'1','满满百果茶'=>'2');
		$arr9 = array('立顿三角茶包'=>'1','立顿冰茶粉'=>'2','立顿小黄罐'=>'3');
		
		$model = new User();
		$cri = new CDbCriteria();
		$cri->with = 'answer'; //调用relations 
        $re = $model->findAll($cri);
		$result = Common::objectToArray($re);
		$arrTmp = array();
		$arr1Sum = '';
		if ($re) {
			foreach ($re as $key=>$val) {
				$answer= $val->answer->answer;
				$anArry = json_decode($answer, true);
				if (is_array($anArry)) {
					foreach ($anArry as $k=>$v) {
						$result[$key]['answer'.$k]= $v;
						switch ($k){
						case 1:
						  $arrTmp[] = $v;
							if(in_array($arr1[$v],$arr1)){
								$arr1Sum[$arr1[$v]] += 1; 
							}else{
								$key1 = array_rand(array('1'=>'1','5'=>'5'),1);
								$arr1Sum[$key1] +=1;
							}
						  break;  
						case 2:
						  $arr2Sum[$arr2[$v]] += 1;
						  break;
						case 3:
						  $arr3Sum[$arr3[$v]] += 1;
						  break;
						case 4:
						  $arr4Sum[$arr4[$v]] += 1;
						  break;
						case 5:
						  $arr5Sum[$arr5[$v]] += 1;
						  break;
						case 6:
						  $arr6Sum[$arr6[$v]] += 1;
						  break;
						case 8:
						  $arr8Sum[$arr8[$v]] += 1;
						  break;
						case 9:
						  $arr9Sum[$arr9[$v]] += 1;
						  break;
						}
						/* if($k == 1){
							$arrTmp[] = $v;
							if(in_array($arr1[$v],$arr1)){
								$arr1Sum[$arr1[$v]] += 1; 
							}else{
								$key1 = array_rand(array('1'=>'1','5'=>'5'),1);
								$arr1Sum[$key1] +=1;
							}
						} */
					}
				}
				$result[$key]['answer_time']= $val->answer->create_time;
			}
			$sum = count($arrTmp);
			//var_dump($arr8Sum);
			foreach($arr1Sum as $k1=>$v1){
				$arrPecent[1][$k1] = round(($v1/$sum)*100)."%";
			}
			foreach($arr2Sum as $k2=>$v2){
				$arrPecent[2][$k2] = round(($v2/$sum)*100)."%";
			}
 
			foreach($arr3Sum as $k3=>$v3){
				$arrPecent[3][$k3] = round(($v3/$sum)*100)."%";
			}

			foreach($arr4Sum as $k4=>$v4){
				$arrPecent[4][$k4] = round(($v4/$sum)*100)."%";
			}

			foreach($arr5Sum as $k5=>$v5){
				$arrPecent[5][$k5] = round(($v5/$sum)*100)."%";
			}

			foreach($arr6Sum as $k6=>$v6){
				$arrPecent[6][$k6] = round(($v6/$sum)*100)."%";
			}

			foreach($arr8Sum as $k8=>$v8){
				$arrPecent[8][$k8] = round(($v8/$sum)*100)."%";
			}

			foreach($arr9Sum as $k9=>$v9){
				$arrPecent[9][$k9] = round(($v9/$sum)*100)."%";
			}
			//var_dump($arrPecent);die;
		}

        $re = new BizDownLoad();
        $re->setHeader(array("序号","姓名","手机号","所在城市","公司名称","职业","了解渠道","是否知道好门","对面包是否满意","最满意哪一款面包",
		"是否购买蛋黄酱","是否购买沙拉酱","喜欢哪款茶","喜欢的立顿产品","其他建议","对饮品的需求","时间"));
        $re->downLoad($result, $sum,$arrPecent);
		echo "导出成功！";die();
    }
	
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        unset(Yii::app()->request->cookies ['userInfo']);
        // $this->redirect ( Yii::app ()->homeUrl );
        $this->redirect(Yii::app()->createUrl('site/login'));
    }

}
