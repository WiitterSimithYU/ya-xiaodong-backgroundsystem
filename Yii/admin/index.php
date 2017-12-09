<?php

// change the following paths if necessary
$yii = dirname(__FILE__) . '/../framework/yii.php';
$config = dirname(__FILE__) . '/../protected/config/admin.php';

ini_set("display_errors", "On");
error_reporting(E_ALL & ~ E_NOTICE);

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once $yii;
include_once dirname(__FILE__).'/pubfun.php';
Yii::createWebApplication($config)->run();
