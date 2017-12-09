<?php
class FrontBaseController extends Controller
{
    
    public $user_id;
    public function beforeAction($action)
    {
        parent::beforeAction($action);
        //判断是否登录
        if (Yii::app()->user->getState("memberInfo")) {
            $this->user_id=Yii::app()->user->getState("memberInfo")->id;
            return true;
        } else {
            $this->redirect(Yii::app()->createUrl("site/login"));
            die();
        }
    }
}
