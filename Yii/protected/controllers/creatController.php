<?php
class CreatController extends Controller
{
    public $layout = false;

    public function actionIndex()
    {
        $this->render("index");
    }

    public function actionInsert()
    {
    	$data = $_POST['darr'];
        $Record = new PublicationRecord();
        $Record -> name = strip_tags($data[0]);
        $Record -> sex = $data[1];
        $Record -> phone = $data[3];
        $Record -> cate = $data[5];
        $Record -> star_ad = strip_tags($data[6]);
        $Record -> en_ad = strip_tags($data[7]);
        $Record -> luguo = $data[8];
        $Record -> date = $data[9];
        $Record -> time = $data[9].' '.$data[10];
        $Record -> num = $data[11];
        $Record -> free = $data[12];
        $Record -> wwe = $data[13];
        $Record -> kong = $_POST['kong'];
        $Record -> carded = $_POST['carded'];
        $Record -> remark = strip_tags($_POST['remark']);
        $Record -> add_time = time();
        $Record -> car_man = $data[5] == 1 ? "车找人":"人找车";
        $res = $Record->insert();
        if($res){
            $cord['code'] = 1;
            $cord['smg'] = '消息发布成功';
        }
		echo json_encode($cord);die;      
    }
   

}
