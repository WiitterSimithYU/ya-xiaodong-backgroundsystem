<?php
class WidgetPreprofit extends CWidget {
	public $profit_schema;  //利率方案
	public $num;    //投资数额
	public $term;  //投资时间，单位：月数
	
	public function init() {
	}
	public function run() {
			$preprofit=$this->countPreprofit($this->num, $this->profit_schema, $this->term);
			echo number_format($preprofit,2);
	}
	
	public function countPreprofit($num,$profit_schema,$term){
		$time_length_d=floor($term*365)/12;
		$time_length_m=$term;
		 
	    	if ($profit_schema) {
    		$profit_schema=json_decode($profit_schema,true);
    		$arr=array();
    		if(is_array($profit_schema)){
    			foreach ($profit_schema as $key => $val){
    				if($key<=$time_length_m){
    					$arr[$key]=$val['grad_profit'];
    				}
    			}

    			if($arr){
    				$arr_keys=array_keys($arr);  //天数时间点按从小到大存在数组中$arr_keys
    				$arr_profit=array_values($arr); //年利率按从小到大存在存在数组中$arr_profit
    				$arr_length=count($arr_profit);  //统计需计算的利率个数
    				$max_arr_date=max($arr_keys); //当前对应最大的计息时间点
    				//遍历出累加收益
    				foreach ($arr_profit as $k=>$curr_profit){
    					if($k==$arr_length-1){
    						$dayProfit=$curr_profit/(365*100);   //当前时间区间的日化利率
    						$curr_benefit+=round($num*$dayProfit*($time_length_d-($max_arr_date/12)*365), 2);
    					}else{                                                                                                 
    						$dayProfit=$arr_profit[$k+1]/(365*100);   //当前时间区间的日化利率
    						$curr_benefit+=round($num*$dayProfit*(($arr_keys[$k+1]-$arr_keys[$k])/12)*365, 2);   
    					}
    				}
    			}else{
    				$curr_benefit=0;
    			}
    		}

    		if ($curr_benefit) {
    			return $curr_benefit;
    		} else {
    			return 0;
    		}
    	} else {
    		return 0;
    	}
		
	}
	
}