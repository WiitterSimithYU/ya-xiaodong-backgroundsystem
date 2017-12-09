<?php
$this->breadcrumbs = array(
    'menu' => (Object)array('name' => "系统管理", 'url' => "#"),
    'sub_menu' => (Object)array('name' => "角色管理", 'url' => "#"),
);
?>
<form id="search_form" action="" method="post">
	<div class="search_body">
		<div class="search_row">
			<span class="name">角色名：</span>
			<input type="text" class="form-control" value="<?php echo $search_model->name;?>" name="Authitem[name]" placeholder="请输入角色名"></input>
		</div>

		<div class="search_btn_row">
			<input type="submit" class="btn btn-primary btn-warning" value="查询">
			<button type="button" class="btn_reset"></button>
		</div>

		<div class="search_btn_row" style="float: right;">
			<a href="<?php echo Yii::app()->createUrl('role/create', array('page' => $_REQUEST['page'])); ?>">
				<button class="btn btn-success "
						style="float: right; width: 85px; height: 28px; margin-right: 15px; line-height: 10px;"
						type="button">新增
				</button>
			</a>
		</div>
	</div>
</form>
	
<div class="div_table">
	<table  cellspacing="1" align="center" class="table">
		<thead>
			<tr>
				<th width="100">角色名</th>
				<th width="150" >描述</th>
				<th width="50">优先级</th>
				<th width="100">操作</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($dataTable as $item) {?>
			<tr id="<?php echo $item->name;?>">
				<td><?php echo $item->name;?></td>
				<td><?php echo $item->description;?></td>
				<td><?php echo $item->priority?>
					<!--<input  type="text" class="form-control priority" name="<?php //echo $item->name;?>" value="<?php //echo $item->priority?>">-->
				</td>
				<td class="operation">
					<a href="<?php echo Yii::app()->createUrl('role/update', array('name' => $item->name, 'page' => $_REQUEST['page']));?>">
						<i class="icon icon-edit"></i>
					</a>
				</td>
			</tr>
		<?php }?>
		</tbody>

		<tfoot>
			<tr style="display: none">
	 			<!--<td colspan="3">
	 				<button id="edit_priority" type="button" class="btn btn-info">保存优先级</button>
	 				<button id="clear_priority" type="button" class="btn btn-info">清空优先级</button>
	 			</td>-->
	 			<td colspan="4	">
	 				<a href="<?php echo Yii::app()->createUrl('role/create', array('page' => $_REQUEST['page']));?>">
						<button type="button" class="btn btn-success btn_create">新增</button>
					</a>
	 			</td>
			</tr>
		</tfoot>
	</table>
</div>
<?php paginate($pages, 'role');?>

