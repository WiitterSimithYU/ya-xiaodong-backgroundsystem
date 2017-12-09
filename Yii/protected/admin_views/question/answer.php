<?php
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
    
</style>
<div class="search_body">
    <div class="search_row">
        <span class="name"><?php echo "Q".$array['question']."：".$array['name'] ?></span>
    </div>
    <div class="search_row">
        <span class="name"><?php echo $pages->itemCount."人已参与回答" ?></span>
    </div>
</div>
<div class="div_table">
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
        <?php if ($tableData) { $i=1;?>
            <?php foreach ($tableData as $key => $item) { ?>
                <tr >
                    <td><?php echo $i; ?></td>
<!--                    <td>--><?php //echo $item['user_id']; ?><!--</td>-->
                    <td><?php echo $item['answer']; ?></td>
					<td>
						<a title="问卷详情"
                           href="<?php echo Yii::app()->createUrl('frontUser/view', array('id' => $item->user_id, 'page' => $_REQUEST['page'])); ?>">
                            <i style="font-style: normal">问卷详情</i>
                        </a>
					</td>
                </tr>
            <?php $i++;}
        } ?>
        </tbody>

    </table>
    <?php paginate($pages, 'question'); ?>
</div>

<script type="text/javascript">

    $(function () {
		
       $('.delete').click(function(){
            var section_id = $(this).attr("data");
            var activity = $(this).attr("info");
            zuiConfirm("提示", "确认删除？", function () {
                $('#search_form'+section_id).submit();
            });
        });
    });

</script>

