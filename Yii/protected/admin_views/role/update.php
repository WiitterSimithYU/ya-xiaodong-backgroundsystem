<?php
$this->breadcrumbs = array(
    'menu' => (Object)array('name' => "系统管理", 'url' => "#"),
    'sub_menu' => (Object)array('name' => "角色管理", 'url' => $backUrl),
    'last_menu' => (Object)array('name' => "修改角色", 'url' => "#"),
);

$this->renderPartial('_form', array(
    'model' => $model,
    'operation' => $operation,
    'has_operation' => $has_operation,
    'backUrl' => $backUrl,
    'result' => $result,
));
