<?php
/**
 * 文件上传
 * * PHP version 5
 *
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * CApplication is the base class for all application classes.
 * @category GoodsCategory
 * @package  GoodsCategory
 * @author   xunao <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
class FileUploaderHelper
{
    /**
     * 允许上传的文件类型
     * @var array
     */
    public $allowType = array(); 

    /**
     * 最大上传文件大小
     * @var float
     */
    public $maxSize = 4194304; //默认4M

    /**
     * 原文件名
     * @var string
     */
    public $originName; 

    /**
     * 临时文件名
     * @var string
     */
    public $tempName; 

    /**
     * 上传目录
     * @var string
     */
    public $upload_path; 

    /**
     * 上传后文件名称
     * @var string
     */
    public $file_name; 

    /**
     * 文件大小
     * @var float
     */
    public $file_size; 

    /**
     * 文件类型
     * @var string
     */
    public $file_type; 

    /**
     * 文件后缀名
     * @var string
     */
    public $file_extension;

    /**
     * 上传
     */
    // abstract function fileUpload();

    /**
     * 生成随机名称
     * @param  integer $len 长度
     * @return string 名称
     */
    public function getRandName($len) 
    {
        $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ";
        $ret = "";
        for ($i = 0; $i < $len; $i++) { 
            $ret .= $str{mt_rand(0, 61)};
        }
        return $ret;
    }

    /**
     * 检查上传目录
     * @return string 名称
     */
    public function checkFilePath() 
    {
        //后台目录
        $upload_path = realpath(dirname(__FILE__).'/../../').'/admin'.$this->upload_path;
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
            chmod($upload_path, 0777);
        }
        //前台目录
        $upload_path = realpath(dirname(__FILE__).'/../../').'/front'.$this->upload_path;
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
            chmod($upload_path, 0777);
        }
    }

    /**
     * 检查文件大小
     * @return string 名称
     */
    public function checkFileSize()    
    {
        if ($this->file_size > $this->maxSize) 
            return false;
        return true;
    }

    /**
     * 检查文件类型
     * @return string 名称
     */
    public function checkFileType()
    {
        if (in_array(strtolower($this->file_extension), $this->allowType)) 
            return true;
        else 
            return false;
    }

    /**
     * 方法 参数：单个$_FILE 输出：文件访问路径
     * @param  File $file 上传文件
     * @return 成功：返回分类数据；失败：返回错误信息
     */
    public function fileUpload($file)
    {
        $this->allowType = array('apk');
        $this->upload_path = '/uploads/apk/'.date('Y-m');
        // $this->upload_path = realpath(dirname(__FILE__).'/../../').'/admin'.$upload_catalog;
        //创建上传目录
        $this->checkFilePath();

        $this->originName = $file['name'];
        $this->tempName = $file['tmp_name'];
        $this->file_size = $file['size'];
        $this->file_type = $file['type'];

        $tmp_name = explode('.', $this->originName);
        $this->file_extension = end($tmp_name);


        //检查文件类型是否为图片
        if (!$this->checkFileType())
            return "文件必须为apk";

        $this->file_name = $this->getRandName(10).'.'.$this->file_extension;
        if (!$this->copyFileToPath())
            return "文件上传失败";

        return $this->upload_path.'/'.$this->file_name;
    }

    /**
     * 上传文件到上传目录
     * @return string 名称
     */
    public function copyFileToPath() 
    {
        //后台
        $destination1 = realpath(dirname(__FILE__).'/../../').'/admin'.$this->upload_path.'/'.$this->file_name;
        //$destination2 = realpath(dirname(__FILE__).'/../../').'/front'.$this->upload_path.'/'.$this->file_name;
        
        //复制到前台 copy($destination1, $destination2)
        if (!move_uploaded_file($this->tempName, $destination1))
            return false;

        return true;
    }
}
