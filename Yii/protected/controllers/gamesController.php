<?php
class GamesController extends Controller
{
    public $layout = false;

    
    public function actionIndex()
    {
        $this->render("index");
    }

    public function actionMomoda()
    {
        $this->render("momoda");
    }

    public function actionZnm()
    {
        $this->render("znm");
    }

    public function actionYh()
    {
        $this->render("yh/index");
    }

    public function actionSemo()
    {
        $this->render("semo/index");
    }

}
