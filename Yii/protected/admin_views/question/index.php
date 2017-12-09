<?php
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/echarts.simple.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/echarts.min.js');
$this->breadcrumbs = array(
    'menu' => (Object)array('name' => "问卷管理", 'url' => "#"),
    'sub_menu' => (Object)array('name' => "问卷详情", 'url' => "#"),
);
?>
<style type="text/css">

    td, th {
        text-align: center;
    }
    .search_row {
        font-weight: 700;
        color: #000000;
        width: 100%;
    }
    #container{
        position: relative;
    }

</style>

<div class="search_btn_row" style="position: absolute;top: 10px;right: 10px;z-index: 900;">
    <input type="button" onclick="window.location.href='/index.php/question/export'" class="btn btn-primary btn-warning" value="导出">
</div>

<?php if($tableData){
	
    foreach ($tableData as $key=>$value) {
		
        if (in_array($key,array(0,1,3))) {?>

            <div class="div_table">
                <div class="search_body">
                    <div class="search_row">
                        <span class="name"><?php echo "Q".$array[$key]['question']."：".$array[$key]['name'] ?></span>
                    </div>
                    <div class="search_row">
                        <span class="name"><?php echo $pages[$key]->itemCount."人已参与回答" ?></span>
                    </div>
                </div>
                <div id="show<?php echo $key?>" style="width: 100%;height:400px;float: left"></div>
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th style="width:10%" data-width="150" data-sort="false" class="flex-col">序号</th>
                        <th style="width:50%" data-width="110" data-sort="false" class="flex-col">选项</th>
                        <th style="width:20%" data-width="110" data-sort="false" class="flex-col">百分比</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php if ($value) { $i=1;?>
                        <?php foreach ($value as $item) {
                            if ($key == 0) {
                                $answer1[] = "{value:{$item['value']},name:'{$item['name']}'}";
								
                            }
                            if ($key == 1) {
                                $answer2[] = "{value:{$item['value']},name:'{$item['name']}'}";
                            }
                            if ($key == 3) {
                                $answer3[] = "{value:{$item['value']},name:'{$item['name']}'}";
                            }
                            ?>
                            <tr >
                                <td><?php echo $i; ?></td>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['percent']; ?></td>
                            </tr>
                            <?php $i++;}
                    } ?>

                    </tbody>

                </table>

            </div>
        <?php  }else { ?>

<div class="div_table">
    <div class="search_body">
        <div class="search_row">
            <span class="name"><?php echo "Q".$array[$key]['question']."：".$array[$key]['name'] ?></span>
        </div>
        <div class="search_row">
            <span class="name"><?php echo $pages[$key]->itemCount."人已参与回答" ?></span>
        </div>
    </div>

    <table class="table datatable">
        <thead>
        <tr>
            <th style="width:10%" data-width="150" data-sort="false" class="flex-col">序号</th>
            <!--            <th style="width:20%" data-width="110" data-sort="false" class="flex-col">姓名</th>-->
            <th style="width:50%" data-width="110" data-sort="false" class="flex-col">答案</th>
            <th style="width:20%" data-width="110" data-sort="false" class="flex-col">操作</th>
        </tr>
        </thead>

        <tbody>
        <?php if ($value) { $i=1;?>
            <?php foreach ($value as $item) { ?>
                <tr >
                    <td><?php echo $i; ?></td>
                    <!--                    <td>--><?php //echo $item['user_id']; ?><!--</td>-->
                    <td><?php echo $item['answer']; ?></td>
                    <td>
                        <a title="问卷详情"
                           href="<?php echo Yii::app()->createUrl('frontUser/view', array('id' =>$item['user_id'], 'page' => $_REQUEST['page'])); ?>">
                            <i style="font-style: normal">问卷详情</i>
                        </a>
                    </td>
                </tr>
                <?php $i++;}
        } ?>

        </tbody>
        <tfoot>
        <td colspan="3">
            <a href="<?php echo Yii::app()->createUrl('question/answer', array('id' => $array[$key]['question'])); ?>">
                <button class="btn btn-success"
                        style="float: right; width: 85px; height: 22px; margin-right: 15px; line-height: 10px;"
                        type="button">查看全部
                </button>
            </a>
        </td>
        </tfoot>

    </table>

</div>
<?php }}}?>

<script type="text/javascript">
var answer1 = "<?php echo "[".implode(',', $answer1)."]"?>";
var answer2 = "<?php echo "[".implode(",", $answer2)."]"?>";
var answer3 = "<?php echo "[".implode(",", $answer3)."]"?>";
 
var chart1 = eval(answer1); 
var length = chart1.length;
 
var arrays = new Array();
 
for(var i = 0 ;i < chart1.length; i++){
    arrays[i] = {
         value:chart1[i]['value'],
		name:chart1[i]['name']
    }
}
 
    $(function () {
        var myChart = echarts.init(document.getElementById('show0'));
		
        // 指定图表的配置项和数据
        var option = {
            title: {
                text: ''
            },
            tooltip : {
				trigger: 'item',
				//formatter: "{a} <br/>{b} : {c} ({d}%)"
			},
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['满意','一般','不满意']
            },
			
            series: [{
                name: '问卷调查',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data: arrays,
                
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);

		var chart2 = eval(answer2); 
		var length = chart2.length;
		 
		var array2 = new Array();
		 
		for(var i = 0 ;i < chart2.length; i++){
			array2[i] = {
				 value:chart2[i]['value'],
				name:chart2[i]['name']
			}
		}
		
        var myChart = echarts.init(document.getElementById('show1'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: ''
            },
            tooltip: {
				trigger: 'item',
			},
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['有','没有']
            },
            series: [{
                name: '问卷调查',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data: array2,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);

        var chart3 = eval(answer3);
        var length = chart3.length;

        var array3 = new Array();

        for(var i = 0 ;i < chart3.length; i++){
            array3[i] = {
                value:chart3[i]['value'],
                name:chart3[i]['name']
            }
        }

        var myChart = echarts.init(document.getElementById('show3'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: ''
            },
            tooltip: {
                trigger: 'item',
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['会','不会']
            },
            series: [{
                name: '问卷调查',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data: array3,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    });

</script>

