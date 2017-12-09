<?php
$this->breadcrumbs = array(
    'menu' => (Object)array('name' => "系统管理", 'url' => "#"),
    'sub_menu' => (Object)array('name' => "系统用户管理", 'url' => $backUrl),
    'last_menu' => (Object)array('name' => "编辑系统用户", 'url' => "#"),
);

echo $this->renderPartial('_form', array(
    'model' => $model,
    'auths' => $auths,
    'has_auths' => $has_auths,
    'operation' => $operation,
    'backUrl' => $backUrl,
    'result' => $result
));
