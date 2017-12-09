<?php
/**
 * 用于获得交易流水支付/消费中的转让人和受让人名称或公司名
 * */
class WidgetGetname extends CWidget {
	public $id; //转让人或受让人id
	public function init() {
	}
	public function run() {
			$name=$this->getName($this->id);
			echo $name;
	}
	public function getName($id){
		$model = AppUser::model()->findByPk($id);
		if($model->user_type==1){
			return $model->company;
		}elseif($model->user_type==2){
			return $model->true_name;
		}else{
			return $model->user_name;
		}
	}
	
}