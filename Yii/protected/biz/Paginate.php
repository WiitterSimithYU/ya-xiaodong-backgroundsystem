<?php

class Paginate
{
/*
 * 使用Cpagination的类实现自定义翻页
 */

    public static function paginate_front($pages)
    {
        if (!$pages) {
            return;
        }
        parse_str($_SERVER['QUERY_STRING'], $params);
        $controller_id = Yii::app()->controller->id;
        $action_id =  Yii::app()->controller->getAction()->getId();
    //     var_dump($u);
        $url = Yii::app()->createUrl("$controller_id/$action_id")."?";
   
    //     $url = $_SERVER ['PHP_SELF'] . "?";
    //     $turl = $_SERVER ['PHP_SELF'];


    
    
        foreach ($params as $k => $v) {
            if ($k=="page") {
                continue;
            }
            $url .= "&" .$k . "=" . urlencode($v);
        }
        $pageindex = $pages->getCurrentPage()+1;
        $pagecount = $pages->getPageCount();
        $itemcount = $pages->getItemCount();
        $n_pageprve = $pageindex <= 1 ? 1 : $pageindex -1;
        $n_pagenext = $pageindex >= $pagecount ? $pagecount : $pageindex+1;
   
        $pagefirst = $url . "&{$pages->pageVar}=1";
        $pagenext = $url ."&{$pages->pageVar}=" .$n_pagenext;
        $pageprev = $url ."&{$pages->pageVar}=" .$n_pageprve;
        $pagelast = $url ."&{$pages->pageVar}=" .($pagecount);
        // 	if (strtolower($_SERVER['REQUEST_METHOD'])) {
        //get 方式
        $pst =  $pages->getCurrentPage()*$pages->pageSize+1;
        if ($itemcount<$pages->pageSize) {
            if ($itemcount==0) {
                $pend = 0;
                $pst = 0;
            } else {
                $pend = $pst+$itemcount-1;
            }
        } elseif ($pagecount==$pageindex) {
            $pend = $itemcount;
        } else {
            $pend = ($pages->getCurrentPage()+1)*$pages->pageSize;
        }
    
    
        ?>
        <style>.pageright *{float:right}</style>
        <div class="pageright">
        <?php if ($pageindex!=$pagecount&&$pagecount>1) {?>
	              <li class="end_page" style="*width:55px;"><a class="sauger_page_a" href="<?php echo $pagelast?>" page="<?php echo $pagecount?>">尾页>></a></li>
				<li class="next_page" style="*width:50px;"><a class="sauger_page_a" href="<?php echo $pagenext?>" page="<?php echo $n_pagenext?>">下一页</a></li>
	<?php }?>	
				<li class="accout" style="*width:120px;"><?php echo $pst."-".$pend;?>，共<?php echo $itemcount?>条记录</li>
	<?php if ($pageindex!=1) {?>
				<li class="last_page" style="*width:50px;"><a class="sauger_page_a" href="<?php echo $pageprev;?>" page="<?php echo $n_pageprve?>">上一页</a></li>
				<li class="first_page" style="*width:55px;"><a class="sauger_page_a" href="<?php echo $pagefirst?>" page="1"><<首页</a></li>
	<?php }?>	
				
			</div>
			<?php
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                //如果是post，则需要获取post值，并添加一个form表单
                $hidden_input = "";
                foreach ($_POST as $k => $v) {
                    if (is_array($v)) {
                        foreach ($v as $name => $value) {
                            $hidden_input .= "<input type='hidden' name='{$k}[$name]' value='$value' />";
                        }
                    } else {
                        $hidden_input .= "<input type='hidden' name='$k' value='$v' />";
                    }
                        
                }
                $hidden_input.="<input type='hidden' name='{$pages->pageVar}' id='sauger_paginate_page_{$pages->pageVar}' />";
                $form_str = "<form id='sauger_paginate_form_{$pages->pageVar}' method='post' action='$url'>";
                $form_str.=$hidden_input;
                $form_str .= "</form>"; ?>
				<script type="text/javascript">
					$('body').append("<?php echo $form_str?>");
					$(function(){
						$('.sauger_page_a').click(function(e){
							e.preventDefault();
							var page = $(this).attr('page');
							$('#<?php echo "sauger_paginate_page_{$pages->pageVar}"?>').val(page);
							$('#<?php echo "sauger_paginate_form_{$pages->pageVar}"?>').attr('action',$(this).attr('href'));
							$('#<?php echo "sauger_paginate_form_{$pages->pageVar}"?>').submit();
						});
						$('.paginate_sel').change(function(){
							$('#<?php echo "sauger_paginate_page_{$pages->pageVar}"?>').val($(this).val());
							$('#<?php echo "sauger_paginate_form_{$pages->pageVar}"?>').attr('action',$(this).val());
							$('#<?php echo "sauger_paginate_form_{$pages->pageVar}"?>').submit();
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
                    window.location.href=url;
                });
            });
			</script>
			
	<?php
            }
    }
}