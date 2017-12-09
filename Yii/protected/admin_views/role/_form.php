<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
    'htmlOptions' => array(
        'id' => "edit_form",
        'enctype' => "multipart/form-data",
    ),
));
?>

<div class="edit_body">
	<div class="edit_row">
		<span class="name required">角色名：</span>
	<?php if (!$model->name) {?>
		<input id="AuthRoleForm_name" type="text" class="form-control" value="<?php echo $model->name;?>" name="AuthRoleForm[name]" placeholder="请输入角色名"></input>
	<?php } else {?>
		<?php echo $model->name;?>
		<input id="AuthRoleForm_name" type="hidden" class="form-control" value="<?php echo $model->name;?>" name="AuthRoleForm[name]" placeholder="请输入角色名"></input>
	<?php }?>
	</div>
	<div class="edit_row">
		<span class="name">描述：</span>
		<input id="AuthRoleForm_description" type="text" class="form-control" value="<?php echo $model->description;?>" name="AuthRoleForm[description]" placeholder="请输入描述"></input>
	</div>
	<div class="edit_row">
		<span class="name">优先级：</span>
		<input id="AuthRoleForm_priority" type="text" class="form-control" value="<?php echo $model->priority;?>" name="AuthRoleForm[priority]" placeholder="请输入优先级"></input>
	</div>

<?php if (is_array($operation)) {?>
	<div class="edit_row" style="width: 100%;">
		<span class="name">拥有操作：</span>
	</div>
<?php $has_operation = is_array($has_operation) ? $has_operation : array();
foreach ($operation as $key => $value) {?>
	<div class="edit_row">
		<div class="edit_checkbox">
			<label><?php echo $value;?></label>
		<?php if (in_array($value, $has_operation)) {?>
			<i class="icon icon-checked"></i>
			<input type="checkbox" checked="checked" value="<?php echo $key;?>" name="right_names[]"></input>
		<?php } else {?>
			<i class="icon icon-check-empty"></i>
			<input type="checkbox" value="<?php echo $key;?>" name="right_names[]"></input>
		<?php }?>
		</div>
	</div>
<?php     }
}?>
	<div class="edit_btn_row">
		<input type="submit" value="提&nbsp;&nbsp;交" class="btn btn-info">
		<input type="button" value="取&nbsp;&nbsp;消" class="btn" onclick="javascript:goBack()">
	</div>
</div>

<?php $this->endWidget();?>	

<script type="text/javascript">
<?php if (is_string($result)) {?>
	zuiAlert("提交失败", "<?php echo $result;?>")
<?php } elseif ($result == true) {?>
	zuiAlert("提交成功", "提交成功");
$('.modal-footer button').click(function(){
	goBack();
});
<?php }?>

function goBack() 
{
	window.location.href = "<?php echo $backUrl;?>";
}

$('#edit_form').submit(function(){
	var name = $.trim($('#AuthRoleForm_name').val());
	if (name == '') {
		zuiAlert("提交失败", "请输入角色名");
		return false;
	}
});
</script>
