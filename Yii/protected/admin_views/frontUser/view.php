<?php
$this->breadcrumbs = array(
    'menu' => (Object)array('name' => "用户管理", 'url' => "#"),
    'sub_menu' => (Object)array('name' => "用户信息", 'url' => $backUrl),
    'last_menu' => (Object)array('name' => "查看用户", 'url' => "#"),
);

$this->renderPartial(
    '_view', array(
        'model' => $model,
        'backUrl' => $backUrl)
);
?>

<div class="detail_btn_row">
    <input type="button" value="返&nbsp;&nbsp;回" class="btn" onclick="javascript:history.go(-1)">
</div>

<script type="text/javascript">
    function goBack() {
        //window.location.href = javascript:history(-1);
        window.location.href = "<?php echo $backUrl;?>";
    }
</script>
