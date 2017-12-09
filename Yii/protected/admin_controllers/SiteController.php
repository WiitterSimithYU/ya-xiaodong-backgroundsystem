<?php
/**
 * 登陆
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
 *
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
class SiteController extends AdminBaseController
{
    public $layout='admin';

    /**
     * 测试
     *
     * @return int
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * 测试
     *
     * @return int
     */
    public function actionError()
    {
        if ($error=Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    /**
     * 测试
     *
     * @return int
     */
    public function actionContact()
    {
        $model=new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes=$_POST['ContactForm'];
            if ($model->validate()) {
                $headers="From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model'=>$model));
    }

    /**
     * 登陆
     *
     * @return int
     */
    public function actionLogin()
    {
        $model = new AdminUser();

        if ($_COOKIE['yl_isAuto'] == 'on') {
            $_POST['AdminUser'] = array(
                'loginname' => $_COOKIE['loginname'],
                'password' => $_COOKIE['password'],
            );
        }

        if (isset($_POST['AdminUser'])) {
            $model->attributes = $_POST['AdminUser'];
            $isAuto = $_POST['isAuto'];

            $result = bizAdmin::login($model->loginname, $model->password, $isAuto);
            if ($result && !is_string($result)) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->renderPartial(
            'login', array(
            'model' => $model,
            'result' => $result)
        );
    }

    /**
     * 测试
     *
     * @return int
     */
    public function actionLogout()
    {
        bizAdmin::logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * 测试
     *
     * @return int
     */
    public function actionIndex()
    {
        $this->redirect(Yii::app()->createUrl('site/statistics'));
    }

    /**
     * 测试
     *
     * @return int
     */
    public function actionStatistics() 
    {
        $this->render('statistics');
    }

}
