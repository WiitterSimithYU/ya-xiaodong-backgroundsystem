<?php
class AdminBaseController extends Controller
{
    
// 	protected function beforeAction($action) {
// 		if (Yii::app ()->user->isGuest && !in_array($action->id, array('login','test','error','captcha'))) {
// 			$this->redirect(Yii::app()->createUrl('site/login'));
// 			return false;
// 		} else {
// 			return true;
// 		}
// 	}
    
    public function filters()
    {
        return array(
                'accessControl',
        );
    }
    
    public function accessRules()
    {
        return array(
                array('allow',
                        'actions'=>array('login', 'logout', 'login_api', 'autoHistory', 'shareEqually', 'messages','print','push','test','runToGetHer',"RandSales","RandSend","RandOutput","RandInvoice","RandSalesInvoice"),
                        'users'=>array('*'),
                ),
                array('allow',
                        'users'=>array('@'),
                ),
                array('deny',
                        'users'=>array('*'),
                ),
        );
    }
    
    public function actions()
    {
        return array (
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha'=>array(
                    'class'=>'CCaptchaAction',
                    'height'=>38,
                    'width'=>83,
                    'minLength'=>4,
                    'maxLength'=>4,
                    'backColor'=>0xFFFFFF,
                    'transparent'=>false,
                    'testLimit'=>999,
                ),
                // page action renders "static" pages stored under 'protected/views/site/pages'
                // They can be accessed via: index.php?r=site/page&view=FileName
                'page' => array (
                        'class' => 'CViewAction'
                )
        );
    }
    
    /**
     *
     * 获取某表最后更新时间
     * @param string $table 表名
     * @param int $id 修改记录id
     * @return int 最后更新时间
     */
    public function getUpdateTime($table, $id)
    {
        $cri = new CDbCriteria();
        $cri->params[':table'] =$table;
        $cri->addCondition("table_name=:table");
        $cri->params[':idstr'] ="%".'"id":"'.$id.'"'."%";
        $cri->addCondition("oldValue like :idstr or newValue like :idstr");
        $cri->order = "created_at desc";
        $log = LogDetail::model()->find($cri);
        return $log->created_at?$log->created_at:"0";
    }
    
    /**
     *
     * 核对最后更新前是否有改动
     * @param string $table 表名
     * @param int $time 上次修改时间
     * @param int $id 修改记录id
     * @return bool false表示该表被人更改过,不允许修改。true表示正常可更改
     */
    public function checkUpdateTime($table, $time, $id)
    {
        $last_update = $this->getUpdateTime($table, $id);
        return $time>=$last_update;
        
    }

    /**
     * 字符串截取
     * @param string $str    字符串
     * @param int    $length 长度
     * @return string 字符串
     */
    public function getStr($str, $length = 0, $append = true)
    {
        $str = trim($str);
        $strlength = strlen($str);

        if ($length == 0 || $length >= $strlength) {
            return $str;  //截取长度等于0或大于等于本字符串的长度，返回字符串本身
        } elseif ($length < 0) {//如果截取长度为负数
            $length = $strlength + $length;//那么截取长度就等于字符串长度减去截取长度
            if ($length < 0) {
                $length = $strlength;//如果截取长度的绝对值大于字符串本身长度，则截取长度取字符串本身的长度
            }
        }

        if (function_exists('mb_substr')) {
            $newstr = mb_substr($str, 0, $length, "utf-8");
        } elseif (function_exists('iconv_substr')) {
            $newstr = iconv_substr($str, 0, $length, "utf-8");
        } else {
            //$newstr = trim_right(substr($str, 0, $length));
            $newstr = substr($str, 0, $length);
        }

        if ($append && $str != $newstr) {
            $newstr .= '...';
        }

        return $newstr;
    }
}
