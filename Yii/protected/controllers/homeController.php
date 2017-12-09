<?php
class HomeController extends Controller
{
    public $layout = false;
    
    /**
     * Displays the login page
     */
    public function actionIndex()
    {
        header("Content-type: text/html; charset=utf-8");
        $date = date('Y-m-d', strtotime("-1 day"));
        $res = PublicationRecord::model()->findAll(array(
          'select' =>array('*'),
          'condition' => "date > '$date'",
          'order' => 'time ASC',
          'limit' => '4',
        ));

        $this->render("index", array('res' => $res,'key' => '1'));
    }
    public function actionIsajax()
    {
        if ($_POST['data'] == 1) {
            $cate = '';
        }elseif ($_POST['data'] == 2) {
            $cate = 'AND cate= 1';
        }
        elseif ($_POST['data'] == 3) {
            $cate = 'AND cate=2';
        }
        
        if ($_POST['page']) {
            $page = $_POST['page'];
        }else{
            $page = 0;
        }
        
        $date = date('Y-m-d', strtotime("-1 day"));
        $res = PublicationRecord::model()->findAll(array(
          'select' =>array('*'),
          'condition' => "date > '$date' $cate",
          'order' => 'time ASC',
          'offset' => $page*4,
          'limit' => '4',
        ));
        
        foreach($res as $model){
            $dataed[]=$model->attributes;
        } 
        if (!$dataed) {
            $dataed = array();
        }
        $html = $this->ajaxList($dataed);
        if ($res) {
            $cord['cod'] = '100';
            $cord['res'] = $html;
            $cord['page'] = $page + 1;
        }else{
            $cord['cod'] = '200';
        }
        echo json_encode($cord);die;
    }
    public function ajaxList($dataed){
        foreach ($dataed as $key => $data) {
            if($data['cate'] == 1){
                $css = "cud";
                $smg = ' : 可坐 '.$data["kong"].' 人';
                $carded = $data["carded"];
            }else{
                $css = "che";
                $smg = ' : '.$data["kong"].' 人';
            }
            $html[$key]='<div class="lists">'.
                '<div class="lists_one">'.
                    '<div class="one_left">'.
                        '<div class="left_top">'.
                            '<span class="backcl">起</span> '.$data['star_ad'].
                        '</div>'.
                        '<div class="left_bottom">'.
                            '<span class="backcl">终</span> '.$data['en_ad'].
                        '</div>'.
                    '</div>'.
                    '<a href="/index.php/home/line?star='."$data[star_ad]".'&end='."$data[en_ad]".'">'.
                        '<div class="one_right">查看路线</div>'.
                    '</a>'.
                '</div>'.
                '<div class="lists_two">'.
                    '<span class="chufa">联系人 : '.$data['name'].'</span>'.
                    '<span class="chufa_right">联系电话 : '.$data['phone'].'</span>'.
                '</div>'.
                '<div class="lists_two">'.
                    '<span class="chufa">'.
                        '<span class="'.$css.'">'.$data['car_man'].'</span>'.$smg.
                    '</span>'.
                    '<span class="chufa_right">出发时间 : '.$data['time'].'</span>'.
               '</div>'.
                '<div class="lists_two">'.
                    '<span class="beizhu">说明：'.$carded.' '.$data["free"].'元/人；'.' '.$data['remark'].'</span>'.
                '</div>'.
            '</div>';
        }
        return $html;
    }
    
    //路线
    public function actionLine()
    {
        header("Content-type: text/html; charset=utf-8");
        $star = $_GET['star'];
        $end = $_GET['end'];
        $this->render("line",array('star' => $star,'end' => $end));
    }

    //视频
    public function actionVideo()
    {
        $this->render("video");
    }

    //游戏
    public function actionGames()
    {
        $this->render("index");
    }

}
