<?php
$this->breadcrumbs = array(
    'menu' => (Object)array('name' => "系统管理", 'url' => "#"),
    'sub_menu' => (Object)array('name' => "系统用户管理", 'url' => "#"),
);
?>
<form id="search_form" action="" method="post">
	<div class="search_body">
		<div class="search_row">
			<span class="name">用户名：</span>
			<input type="text" class="form-control chosen-select" value="<?php echo $search_model->nickname;?>" name="AdminUser[nickname]" placeholder="请输入用户名"></input>
		</div>
		<div class="search_row">
			<span class="name">账号：</span>
			<input type="text" class="form-control chosen-select" value="<?php echo $search_model->loginname;?>" name="AdminUser[loginname]" placeholder="请输入账号"></input>
		</div>
		<div class="search_row">
			<span class="name">角色：</span>
			<select class="form-control chosen-select" name="AdminUser[role_name]">
				<option value="all" selected="selected">-全部-</option>
			<?php foreach ($role_array as $k => $v) {?>
				<option value="<?php echo $k;?>"<?php echo $search_model->role_name == $k ? ' selected="selected"' : '';?>><?php echo $v;?></option>
			<?php }?>
			</select>
		</div>
		<div class="search_row">
			<span class="name">状态：</span>
			<select class="form-control chosen-select" name="AdminUser[is_disabled]">
				<option value="-1" selected="selected">-全部-</option>
			<?php foreach ($is_disabled_array as $k => $v) {?>
				<option value="<?php echo $k;?>"<?php echo $search_model->is_disabled == $k ? ' selected="selected"' : '';?>><?php echo $v;?></option>
			<?php }?>
			</select>
		</div>

		<div class="search_btn_row">
			<input type="submit" class="btn btn-primary btn-warning" value="查询">
			<button type="button" class="btn_reset"></button>
		</div>

		<div class="search_btn_row" style="float: right;">
			<a href="<?php echo Yii::app()->createUrl('adminUser/create', array('page' => $_REQUEST['page'])); ?>">
				<button class="btn btn-success "
						style="float: right; width: 85px; height: 28px; margin-right: 15px; line-height: 10px;"
						type="button">新增
				</button>
			</a>
		</div>
	</div>
</form>

<div class="div_table">
	<table class="table">
		<thead>
			<tr>
				<th>编号</th>
				<th>账号</th>
				<th>用户名</th>
				<th>角色</th>
				<th>创建时间</th>
				<th>最近登录时间</th>
				<th>登录IP</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($tableData as $item) {?>
			<tr>
				<td><?php echo $item->id;?></td>
				<td><?php echo $item->loginname;?></td>
				<td><?php echo $item->nickname;?></td>
				<td>
					<?php $role_name = "";
                    foreach ($item->authAssignment as $authAssignment) {
                        if ($authAssignment->itemname0->type != 2) {
                            continue;
                        }
                        $role_name .= ','.$authAssignment->itemname;
                    }
                    echo substr($role_name, 1);
                    ?>
				</td>
				<td><?php echo $item->created_at > 0 ? date('m-d H:i', $item->created_at) : '';?></td>
				<td><?php echo $item->last_login_at > 0 ? date('m-d H:i', $item->last_login_at) : '';?></td>
				<td><?php echo $item->last_login_ip;?></td>
				<td><?php echo $is_disabled_array[$item->is_disabled];?></td>
				<td>
					<a href="<?php echo Yii::app()->createUrl('adminUser/update', array('id' => $item->id, 'page' => $_REQUEST['page']));?>">
						<i class="icon icon-edit"></i>
					</a>
				</td>
			</tr>
		<?php }?>
		</tbody>
		<tfoot>
		<tr style="display: none">
			<td colspan="8">
			</td>
			<td colspan="1" style="display: none">
				<a href="<?php echo Yii::app()->createUrl('adminUser/create')?>">
					<button type="button" class="btn btn-success btn_create">新增</button>
				</a>
			</td>
		</tr>
		</tfoot>
	</table>
	<?php paginate($pages, 'admin_user');?>
</div>



