<?php 
function baseUrl() 
{
	return Yii::app()->baseUrl;
}

function imgUrl($img) 
{
	return baseUrl()."/images/".$img;
}

/**
 * 判断用户是否拥有权限
 * @param  string $authitem 权限名
 */
function checkOperation($authitem) 
{
	$auth = Yii::app()->authManager;
	return $auth->checkAccess($authitem, Yii::app()->user->userid);
}

/**
 * 计算时间戳相差天数
 * @param  string $a 开始时间
 * @param  string $b 结束时间
 */
function count_days($a, $b) 
{
	$a_dt = getdate($a);
	$b_dt = getdate($b);
	$a_new = mktime(12, 0, 0, $a_dt['mon'], $a_dt['mday'], $a_dt['year']);
	$b_new = mktime(12, 0, 0, $b_dt['mon'], $b_dt['mday'], $b_dt['year']);
	return round(abs($a_new - $b_new) / 86400);
}

/**
 * 添加一个css文件
 * @param  [type] $file css文件
 * 文件必须在css文件下
 */
function include_css($file) 
{
	if (func_num_args() >= 1) {
		foreach (func_get_args() as $p) {
			$p .= substr($p, -4) != ".css" ? ".css" : "";
			echo '<link rel="stylesheet" type="text/css" href="'.baseUrl().'/css/'.$p.'" media="screen, projection" />';
		}
	}
}

/**
 * 添加一个js文件
 * @param  [type] $file js文件
 */
function include_js($file) 
{
	if (func_num_args() >= 1) {
		foreach (func_get_args() as $p) {
			$p .= substr($p, -3) != ".js" ? ".js" : "";
			echo '<script type="text/javascript" language="javascript" src="'.baseUrl().'/js/'.$p.'"></script>';
		}
	}
}

function currentUserId() 
{
	return Yii::app()->user->isGuest ? 0 : Yii::app()->user->userid;
}

function rand_str($len=10){
	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ";
	$ret = "";
	for($i=0;$i < $len; $i++){
		$ret .= $str{mt_rand(0,61)};
	}
	return $ret;
}

function ValidateCode($len=4){
  	$str = "0123456789";
  	$ret = "";
  	for($i=0;$i < $len; $i++){
  		$ret .= $str{mt_rand(0,9)};
  	}
  	return $ret;
}



//获取首字母
function getfirstchar($s0){
	$fchar = ord($s0{0});
	if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($s0{0});
	$s1 = iconv("UTF-8","gb2312", $s0);
	$s2 = iconv("gb2312","UTF-8", $s1);
	if($s2 == $s0){$s = $s1;}else{$s = $s0;}
	$asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
	if($asc >= -20319 and $asc <= -20284) return "A";
	if($asc >= -20283 and $asc <= -19776) return "B";
	if($asc >= -19775 and $asc <= -19219) return "C";
	if($asc >= -19218 and $asc <= -18711) return "D";
	if($asc >= -18710 and $asc <= -18527) return "E";
	if($asc >= -18526 and $asc <= -18240) return "F";
	if($asc >= -18239 and $asc <= -17923) return "G";
	if($asc >= -17922 and $asc <= -17418) return "I";
	if($asc >= -17417 and $asc <= -16475) return "J";
	if($asc >= -16474 and $asc <= -16213) return "K";
	if($asc >= -16212 and $asc <= -15641) return "L";
	if($asc >= -15640 and $asc <= -15166) return "M";
	if($asc >= -15165 and $asc <= -14923) return "N";
	if($asc >= -14922 and $asc <= -14915) return "O";
	if($asc >= -14914 and $asc <= -14631) return "P";
	if($asc >= -14630 and $asc <= -14150) return "Q";
	if($asc >= -14149 and $asc <= -14091) return "R";
	if($asc >= -14090 and $asc <= -13319) return "S";
	if($asc >= -13318 and $asc <= -12839) return "T";
	if($asc >= -12838 and $asc <= -12557) return "W";
	if($asc >= -12556 and $asc <= -11848) return "X";
	if($asc >= -11847 and $asc <= -11056) return "Y";
	if($asc >= -11055 and $asc <= -10247) return "Z";
	return null;
}

 function pinyin1($zh){
	$ret = "";
	$s1 = iconv("UTF-8","gb2312", $zh);
	$s2 = iconv("gb2312","UTF-8", $s1);
	if($s2 == $zh){$zh = $s1;}
	for($i = 0; $i < strlen($zh); $i++){
		$s1 = substr($zh,$i,1);
		$p = ord($s1);
		if($p > 160){
			$s2 = substr($zh,$i++,2);
			$ret .=getfirstchar($s2);
		}else{
			$ret .= $s1;
		}
	}
	return $ret;
}



/**
 * 增加编辑页引用其他列表自定义分页
 */
function paginate1($pages,$cookie_name){
	if (!$pages) {
		return;
	}
	$url = $_SERVER ['PHP_SELF'] . "?";
	$turl = $_SERVER ['PHP_SELF'];
	parse_str($_SERVER['QUERY_STRING'], $params);
	unset($params[$pages->pageVar]);

	foreach ($params as $k => $v) {
		$url .= "&" .$k . "=" . urlencode($v);
	}
	$pageindex = $pages->getCurrentPage()+1;
	$pagecount = $pages->getPageCount();
	$itemcount = $pages->getItemCount();
	$n_pageprve = $pageindex <= 1 ? 1 : $pageindex -1;
	$n_pagenext = $pageindex >= $pagecount ? $pagecount : $pageindex+1;

	?>
	<div class="div_table_foot">
		<div class="div_flexarea">
			<div class="wz">每页显示</div>
			<div class="col-md-4" style="width:65px;margin:8px 5px 0;padding-right:0">
				<select id="each_page" class="form-control chosen-select">
					<option value="10" <?php if($_COOKIE[$cookie_name]=="10") echo "selected=selected";?>>10</option>
					<option value="20" <?php if($_COOKIE[$cookie_name]=="20") echo "selected=selected";?>>20</option>
					<option value="50" <?php if($_COOKIE[$cookie_name]=="50") echo "selected=selected";?>>50</option>
				</select>
			</div>
			<div>条记录</div>
		</div>
		<div class="yema">
			<div style="margin-right:10px;float:left;">共<?php echo $itemcount?>条记录<?php echo $pagecount?>页</div>
			<ul class="pager pager-loose" style="float:left;">
			<!-- a标签背景颜色由css hover属性控制，如果增加背景色，鼠标移动变色效果将失效，暂未加，或者加了以后，用js控制变色也可，看要求 -->
			<li class="">
				<a class="firstpage sauger_page_a" href="javascript:void(0);" page="1">首页</a>
			</li>
			<li class="">
				<a class="sauger_page_a" href="javascript:void(0);" page="<?php echo $n_pageprve?>">«上一页</a>
			</li>
			<li class="">
			<div class="col-md-4" style="width:65px;margin:0px 0px 0 5px;padding-right:0;">
				<select name="page" class="form-control chosen-select paginate_sel" style="height:33px;">
					<?php
					for($i=1;$i<=$pagecount;$i++){
						//$link = $url ."&{$pages->pageVar}=" .$i;
						$selected = $i == $pageindex ? " selected='selected'" : "";
						$str = "<option value=\"$i\" $selected>$i</option>";
						echo $str;
					}
					?>
				</select>
			</div>
			</li>
			<li class="">
				<a class="sauger_page_a" href="javascript:void(0);" page="<?php echo $n_pagenext?>">下一页 »</a>
			</li>
			<li class="">
				<a class="sauger_page_a" href="javascript:void(0);" page="<?php echo $pagecount?>">尾页</a>
			</li>
			</ul>
		</div>
	</div>	
<?php 
}

function numChange($str)
{
	$str = str_replace(",",'',$str);
	$str = str_replace("，",'',$str);
	return $str;
}

//数组转大写
function ch_num($num, $mode = true) {
	$char = array("零","壹","贰","叁","肆","伍","陆","柒","捌","玖");
	$dw = array("","拾","佰","仟","","萬","億","兆");
	$dec = "點";
	$retval = "";
	if ($mode) preg_match_all("/^0*(\d*)\.?(\d*)/", $num, $ar);
	else preg_match_all("/(\d*)\.?(\d*)/", $num, $ar);
	if ($ar[2][0] != "") $retval = $dec . ch_num($ar[2][0], false); //如果有小数，则用递归处理小数
	if ($ar[1][0] != "") {
		$str = strrev($ar[1][0]);
		for ($i = 0; $i < strlen($str); $i++) {
			$out[$i] = $char[$str[$i]];
			if ($mode) {
				$out[$i] .= $str[$i] != "0" ? $dw[$i%4] : "";
				if ($str[$i] + $str[$i-1] == 0) $out[$i] = "";
				if ($i % 4 == 0) $out[$i] .= $dw[4+floor($i/4)];
			}
		}
		$retval = join("",array_reverse($out)) . $retval;
	}
	return $retval;
}

//金额 转大写
function cny($ns) {
	static $cnums = array("零","壹","贰","叁","肆","伍","陆","柒","捌","玖"),
	$cnyunits = array("圆","角","分"),
	$grees = array("拾","佰","仟","万","拾","佰","仟","亿");
	
	list($ns1,$ns2) = explode(".",$ns,2);
	$ns2 = array_filter(array($ns2[1], $ns2[0]));
	$ret = array_merge($ns2, array(implode("", _cny_map_unit(str_split($ns1), $grees)), ""));
	$ret = implode("", array_reverse(_cny_map_unit($ret,$cnyunits)));
	return str_replace(array_keys($cnums), $cnums, $ret);
}

function _cny_map_unit($list, $units) {
	$ul = count($units);
	$xs = array();
	foreach (array_reverse($list) as $x) {
		$l = count($xs);
		if ($x != "0" || !($l % 4)) $n = ($x == '0' ? '' : $x).($units[($l - 1) % $ul]);
		else $n = is_numeric($xs[0][0]) ? $x : '';
		array_unshift($xs, $n);
	}
	return $xs;
}

function sortRank($arr)
{
	$return=array();
	if(is_array($arr)&&!empty($arr))
	{
		foreach($arr as $k=>$v)
		{
			$aa[$k]=mb_substr($v, 1,100,'utf-8');
		}
		asort($aa);
		foreach($aa as $k=>$v)
		{
			$return[$k]='Φ'.$v;
		}
	}
	return $return;
}

function requestByCurl($remote_server,$post_string,$use_post=true){
	if(function_exists('curl_init')){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$remote_server);
		if($use_post){
			curl_setopt($ch,CURLOPT_POST, 1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$post_string);
		}
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}else{
		return '请先安装curl';
	}
}


/**
 * 检查权限
 * @param  string $authitem 权限名
 * @param  string $userid   用户id
 * @return boolean           是否有权限
 */
function getAuth($authitem, $userid = '') 
{
	$userid = $userid ? $userid : Yii::app()->user->userid;
	$auth = Yii::app()->authManager;
	return $auth->checkAccess($authitem, $userid);
}


/**
 * 自定义分页
 * @param  [type] $pages       [description]
 * @param  [type] $cookie_name [description]
 * @return [type]              [description]
 */
function paginate($pages, $cookie_name) 
{
	if (!$pages) return;
	$url = $_SERVER['PHP_SELF']."?";
	$turl = $_SERVER ['PHP_SELF'];
	parse_str($_SERVER['QUERY_STRING'], $params);
	unset($params[$pages->pageVar]);
	
	foreach ($params as $k => $v) {
		$url .= "&" .$k . "=" . urlencode($v);
	}

	$pageindex = $pages->getCurrentPage() + 1;
	$pagecount = $pages->getPageCount();
	$itemcount = $pages->getItemCount();
	$n_pageprve = $pageindex <= 1 ? 1 : $pageindex - 1;
	$n_pagenext = $pageindex >= $pagecount ? $pagecount : $pageindex + 1;
	
	$pagefirst = $url . "&{$pages->pageVar}=1";
	$pagenext = $url ."&{$pages->pageVar}=" .$n_pagenext;
	$pageprev = $url ."&{$pages->pageVar}=" .$n_pageprve;
	$pagelast = $url ."&{$pages->pageVar}=" .($pagecount);
?>

<div class="div_table_foot">
	<div class="div_flexarea">
		<div class="wz">每页显示</div>
		<div class="wz">
			<?php echo Yii::app()->params['postsPerPage'];?>
		</div>
		
		<!-- <select id="each_page" class="form-control chosen-select">
			<option value="10"<?php echo $_COOKIE[$cookie_name] == "10" ? ' selected="selected"' : '';?>>10</option>
			<option value="20"<?php echo $_COOKIE[$cookie_name] == "20" ? ' selected="selected"' : '';?>>20</option>
			<option value="50"<?php echo $_COOKIE[$cookie_name] == "50" ? ' selected="selected"' : '';?>>50</option>
		<?php if ($cookie_name == 'kc') {?>
			<option value="100"<?php echo $_COOKIE[$cookie_name] == "100" ? ' selected="selected"' : '';?>>100</option>
		<?php }?> -->
		</select>
		<div class="wz">条记录</div>
		<div class="yema">
			共<?php echo $itemcount;?>条记录
			<?php echo $pagecount;?>页
		</div>
	</div>
	
	<ul class="pager pager-loose">
		<li>
			<a class="firstpage sauger_page_a" href="<?php echo $pagefirst;?>" page="1">首页</a>
		</li>
		<li>
			<a class="sauger_page_a" href="<?php echo $pageprev;?>" page="<?php echo $n_pageprve;?>">«上一页</a>
		</li>
		<li>
			<select name="page" class="form-control paginate_sel">
			<?php for ($i = 1; $i <= $pagecount; $i++) {?>
				<option value="<?php echo $url ."&{$pages->pageVar}=" .$i;?>"<?php echo $i == $pageindex ? ' selected="selected"' : '';?>>
						<?php echo $i;?>
				</option>
			<?php }?>
			</select>
		</li>
		<li>
			<a class="sauger_page_a" href="<?php echo $pagenext?>" page="<?php echo $n_pagenext?>">下一页 »</a>
		</li>
		<li>
			<a class="sauger_page_a" href="<?php echo $pagelast?>" page="<?php echo $pagecount?>">尾页</a>
		</li>
	</ul>
</div>

<?php 
	if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
		//如果是post，则需要获取post值，并添加一个form表单
		$hidden_input = "";
		foreach ($_POST as $k => $v){
			if (is_array($v)) {
				foreach ($v as $name => $value){
					$hidden_input .= "<input type='hidden' name='{$k}[$name]' value='$value' />";
				}
			} else {
				$hidden_input .= "<input type='hidden' name='$k' value='$v' />";
			}
		}
		$hidden_input .= "<input type='hidden' name='{$pages->pageVar}' id='sauger_paginate_page_{$pages->pageVar}' />";
		$form_str = "<form id='sauger_paginate_form_{$pages->pageVar}' method='post' action='$url'>";
		$form_str .= $hidden_input;
		$form_str .= "</form>";
?>

<script type="text/javascript">
function go2page(page,url){
	$('#<?php echo "sauger_paginate_page_{$pages->pageVar}"?>').val(page);
	$('#<?php echo "sauger_paginate_form_{$pages->pageVar}"?>').attr('action', url);
	$('#<?php echo "sauger_paginate_form_{$pages->pageVar}"?>').submit();
}

var limit = 10;
$('body').append("<?php echo $form_str?>");
	
$(function(){
	$('.sauger_page_a').click(function(e){
		e.preventDefault();
		var page = $(this).attr('page');
		var url = $(this).attr('href'); 
		go2page(page,url);
	});
		
	$('.paginate_sel').change(function(){
		$('#<?php echo "sauger_paginate_page_{$pages->pageVar}"?>').val($(this).val());
		$('#<?php echo "sauger_paginate_form_{$pages->pageVar}"?>').attr('action', $(this).val());
		$('#<?php echo "sauger_paginate_form_{$pages->pageVar}"?>').submit();
	});
		
	$("#each_page").change(function(){
		limit = $(this).val();
		var url = $(this).attr('href');
			
		$.post("/index.php/site/writeCookie", 
		{
			'name': "<?php echo $cookie_name?>",
			'limit':limit
		}, 
		function(data) {
			if(data){
				go2page("1",$("firstpage a").attr('href'));
			}
		});
	});
});
</script>
	
<?php
	} else {
		//get 方式，只有注册下拉框事件即可
?>

<script type="text/javascript">
$(function(){
	$('.paginate_sel').change(function(){
		var url = $(this).val();
		window.location.href = url;
	});
		
	$("#each_page").change(function(){
		limit=$(this).val();
		$.post("/index.php/site/writeCookie", 
		{
			'name' : "<?php echo $cookie_name?>", 
			'limit':limit
		}, 
		function(data) {
			if (data) {
				window.location.href=$('.firstpage').attr('href');
			}
		});			
	});
});
</script>
	
<?php 
	}
}

/**
 * 生成单号
 * @return string 单号
 * 类型缩写＋日期＋6位自增序号
 */
function generateNumber($type_abbreviations, $id) 
{
	return strtoupper($type_abbreviations).date('Ymd').str_pad($id, 6, 0, STR_PAD_LEFT);
}

function mobile_format($mobile) 
{
	$mobile1 = substr($mobile, 0, 3);
	$mobile2 = substr($mobile, 9, 2);
	return $mobile1.'******'.$mobile2;
}


/**
 * 反编译data/base64数据流并创建图片文件
 * @param  string $baseData data/base64数据流
 * @param  string $Dir      存放图片文件目录
 * @param  string $fileName 图片文件名称(不含文件后缀)
 */
function base64DecImg($baseData, $Dir, $fileName) 
{
	try {
		$expData = explode(';', $baseData);
		$postfix = explode('/', $expData[0]);

		if (strstr($postfix[0], 'image')) {
			$postfix = $postfix[1] == 'jpeg' ? 'jpg' : $postfix[1];
			$storageDir = $Dir.DIRECTORY_SEPARATOR.$fileName.'.'.$postfix;
			$export = base64_decode(str_replace("{$expData[0]};base64,", '', $baseData));
			try {
				if (!file_put_contents($storageDir, $export)) 
					return false;
				
				return $fileName.'.'.$postfix;
			} catch (Exception $e) {
				return false;
			}
		}
	} catch (Exception $e) {
		return false;
	}
}

function getAdminInfoById($id){
	return bizUserInfo::getAdminInfoById($id);
}
/**
 * 通过新闻id找到其新闻分类id
 * */
function getCateidByNewsid($id){
	$item=NewsToCate::model()->findByAttributes(array('news_info_id'=>$id));
	return $item->new_category_id;
}











