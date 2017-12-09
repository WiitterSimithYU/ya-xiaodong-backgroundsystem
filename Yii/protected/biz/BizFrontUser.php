<?php
/**
 * 注册用户类
 * * PHP version 5
 *
 * @category SkFrontUser
 * @package  SkFrontUser
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
*/

/**
 * CApplication is the base class for all application classes.
 * @category SkFrontUser
 * @package  SkFrontUser
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
class BizFrontUser
{
	
	/**
     * 注册用户信息列表
     * @param  array $search_array 搜索
     * @return array 注册用户信息
     */
    public static function userList($search_array=array())
    {
        $info = new FrontUser();
        $re = $info->userList($search_array);
		return $re;

    }

}
