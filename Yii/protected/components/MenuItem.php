<?php
/**
* 菜单
*/
class MenuItem
{
    /**
     * 菜单名称
     * @var string
     */
    public $name;

    /**
     * 权限名
     * @var string
     */
    public $right_name;

    /**
     * 链接
     * @var string
     */
    public $url;

    /**
     * 子菜单
     * @var array
     */
    public $sub_menus = array();

    /**
     * 获取当前登录用户拥有权限的菜单
     * @return array
     */
    public static function getValideMenus()
    {
        $allMenus = MenuItem::getGlobalMenu();
        $_result = array();
        //一级菜单循环
        foreach ($allMenus as $_menu) {
            if ($_menu->right_name != '' && !getAuth($_menu->right_name)) {
                continue;
            }
            $_menu->getValideSubMenus();
            $_result[] = $_menu;
        }
        return $_result;
    }

    /**
     * 获取菜单下用户拥有权限的子菜单
     * @return array
     */
    private function getValideSubMenus()
    {
        $_result = array();
        //二级菜单循环
        foreach ($this->sub_menus as $sub_menu) {
            if ($sub_menu->right_name != '' && !getAuth($sub_menu->right_name)) {
                continue;
            }
            $_result[] = $sub_menu;
        }
        $this->sub_menus = $_result;
    }

    /**
     * 基本菜单
     * @return array
     */
    public static function getGlobalMenu()
    {
        global $g_menus;
        if ($g_menus) {
            return $g_menus;
        }
			
		//问卷管理
		$habitManager = new MenuItem;
		$habitManager->name = "问卷管理";
		$habitManager->right_name = "";
		$habitManager->url="#";
		$g_menus[] = $habitManager;
		
			//问卷详情
			$erHabitManager = new MenuItem;
            $erHabitManager->name = "问卷详情";
            $erHabitManager->right_name = "问卷详情";
            $erHabitManager->url = Yii::app()->createUrl('question/index');
            $habitManager->sub_menus[] = $erHabitManager;
			
		//客户管理
		$fontUserManager = new MenuItem;
		$fontUserManager->name = "用户管理";
		$fontUserManager->right_name = "";
		$fontUserManager->url="#";
		$g_menus[] = $fontUserManager;
		
			//注册用户
			$frontUser = new MenuItem;
            $frontUser->name = "用户信息";
            $frontUser->right_name = "用户信息";
            $frontUser->url = Yii::app()->createUrl('frontUser/index');
            $fontUserManager->sub_menus[] = $frontUser;

        

        return $g_menus;
    }
}
