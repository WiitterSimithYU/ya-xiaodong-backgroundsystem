<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
    'htmlOptions' => array(
        'id' => "edit_form",
        'method' => "post"
    ),
));
?>

<div class="edit_body">
	<div class="edit_row">
		<span class="name required">账号：</span>
		<input id="AdminUser_loginname" type="text" class="form-control" value="<?php echo $model->loginname;?>" name="AdminUser[loginname]" placeholder="请输入账号"></input>
	</div>

	<div class="edit_row">
		<span class="name required">用户名：</span>
		<input id="AdminUser_nickname" type="text" class="form-control" value="<?php echo $model->nickname;?>" name="AdminUser[nickname]" placeholder="请输入用户名"></input>
	</div>

	<div class="edit_row">
		<span class="name required">状态：</span>
		<select class="form-control chosen-select" name="AdminUser[is_disabled]">
			<option value="0"<?php echo $model->is_disabled == '0' ? ' selected="selected"' : '';?> >开启</option>
			<option value="1"<?php echo $model->is_disabled == '1' ? ' selected="selected"' : '';?> >禁用</option>
		</select>
	</div>
<?php //if (!$model->id) {?>
<!--	<div class="edit_row">-->
<!--		<span class="name required">原密码：</span>-->
<!--		<input id="AdminUser_password" type="password" class="form-control" value="" name="AdminUser[pre_password]" placeholder="请输入原密码"></input>-->
<!--	</div>-->

	<div class="edit_row">
		<span class="name required">密码：</span>
		<input id="AdminUser_password" type="password" class="form-control" value="" name="AdminUser[password]" placeholder="请输入密码"></input>
	</div>

	<div class="edit_row">
		<span class="name required">确认密码：</span>
		<input id="confirm_password" type="password" class="form-control" value="" name="AdminUser[confirm_password]" placeholder="请再次输入密码"></input>
	</div>
<?php //}?>
	<div class="hr"></div>
	<div class="edit_row" style="width: 100%;">
		<span class="name">系统角色</span>
	</div>

<?php foreach ($auths as $key => $value) {?>
	<div class="edit_row">
		<div class="edit_checkbox edit_checkbox1">
			<label><?php echo $value;?></label>
		<?php if (is_array($has_auths) && in_array($value, $has_auths)) {?>
			<i class="icon icon-checked"></i>
			<input type="checkbox" checked="checked" value="<?php echo $key;?>" name="right_names[]"></input>
		<?php } else {?>
			<i class="icon icon-check-empty"></i>
			<input type="checkbox" value="<?php echo $key;?>" name="right_names[]"></input>
		<?php }?>
		</div>
	</div>
<?php }
if (is_array($has_auths)) {
?>
<div class="edit_row" style="width: 100%;display: none">
    <span class="name">拥有操作：</span>
</div>

<?php foreach ($operation as $key => $value) {?>
	<div class="edit_row" style="display: none">
		<div class="edit_checkbox edit_checkbox2">
			<label><?php echo $value;?></label>
		<?php if (in_array($value, $has_auths)) {?>
			<i class="icon icon-checked"></i>
			<input type="checkbox" checked="checked" value="<?php echo $key;?>" name="right_names[]"></input>
		<?php } else {?>
			<i class="icon icon-check-empty"></i>
			<input type="checkbox" value="<?php echo $key;?>" name="right_names[]"></input>
		<?php }?>
		</div>
	</div>
<?php }
}
?>

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

$("#edit_form").submit(function(){
	var loginname = $.trim($('#AdminUser_loginname').val());
	var nickname = $.trim($('#AdminUser_nickname').val());
	var password = $.trim($('#AdminUser_password').val());
	var confirm_password = $.trim($('#confirm_password').val());

	if (loginname == '') {
		zuiAlert("提交失败", "请输入账号");
		return false;
	}
	if (nickname == '') {
		zuiAlert("提交失败", "请输入用户名");
		return false;
	}
<?php if (!$model->id) {?>
	if (password == '') {
		zuiAlert("提交失败", "请输入密码");
		return false;
	} 
	else if (confirm_password == '') {
		zuiAlert("提交失败", "请确认密码");
		return false;
	} 
	else if (confirm_password != password) {
		zuiAlert("提交失败", "两次密码输入不一致");
		$('#AdminUser_password, #confirm_password').val('');
		return false;
	}
<?php }?>
});
</script>
