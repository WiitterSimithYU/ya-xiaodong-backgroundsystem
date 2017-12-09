<?php
$this->breadcrumbs = array(
    'menu' => (Object)array('name' => "用户管理", 'url' => "#"),
    'sub_menu' => (Object)array('name' => "用户信息", 'url' => "#"),
);
?>
<style type="text/css">

    td, th {
        text-align: center;
    }
    .search_row {
        width:26%;
    }
    
</style>

<form id="search_form" action="" method="post">
    <div class="search_body">

        <div class="search_row" style="width: 20%;">
            <span class="name">姓名：</span>
            <input type="text" class="form-control" name="userInfo[nick_name]" value="<?php echo $array['nick_name'] ?>"/>
        </div>
		
		<div class="search_btn_row" style="margin-left: 30px">
            <input type="submit" class="btn btn-primary btn-warning" value="查询">
            <button type="button" class="btn_reset"></button>
        </div>

        <div class="search_btn_row" style="margin-left: 30px">
            <input type="button" onclick="window.location.href='/index.php/frontUser/export'" class="btn btn-primary btn-warning" value="导出">
        </div>
		
    </div>
</form>
<div class="div_table">
    <table class="table datatable">
        <thead>
        <tr>
            <th style="width:10%" data-width="150" data-sort="false" class="flex-col">序号</th>
            <th style="width:20%" data-width="110" data-sort="false" class="flex-col">姓名</th>
            <th style="width:50%" data-width="110" data-sort="false" class="flex-col">就职酒店</th>
            <th style="width:20%" data-width="110" data-sort="false" class="flex-col">操作</th>
        </tr>
        </thead>

        <tbody>
        <?php if ($tableData) { ?>
            <?php foreach ($tableData as $key => $item) { ?>
                <tr >
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['nick_name']; ?></td>
                    <td><?php echo $item['hotel']; ?></td>
					<td>
						<a title="问卷详情"
                           href="<?php echo Yii::app()->createUrl('frontUser/view', array('id' => $item->id, 'page' => $_REQUEST['page'])); ?>">
                            <i style="font-style: normal">问卷详情</i>
                        </a>
					</td>
                </tr>
            <?php }
        } ?>
        </tbody>

    </table>
    <?php paginate($pages, 'frontUser'); ?>
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

