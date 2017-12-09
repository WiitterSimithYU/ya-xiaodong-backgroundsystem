<?php
/**
 * 图片上传
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
class ImageUploaderHelper extends FileUploaderHelper
{
    public $isCompress = true; //是否压缩
    
    public $isThumbnail = true; //是否生成缩略图

    public $thumbRate = 0.1; //压缩比例

    /**
     * 重写父类方法 参数：单个$_FILE 输出：文件访问路径
     * @param  File $file 上传文件
     * @return 成功：返回分类数据；失败：返回错误信息
     */
    public function fileUpload($file , $type=0)
    {
        $this->allowType = array('gif', 'jpg', 'jpeg', 'bmp', 'png');
        $this->upload_path = '/uploads/images/'.date('Y-m');
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
            return "文件必须为图片";
        
        //检查图片大小
        if (!$this->checkFileSize()) 
            return "图片大小不能大于4MB";
        
        $this->file_name = $this->getRandName(10).'.'.$this->file_extension;
        if (!$this->copyFileToPath()) 
            return "图片上传失败";
        if ($type == 'good') {
//            $info = getimagesize($this->tempName);
//            if ($info[0] > 750) {
//
//            }
            $this->imageThumbnail(750, 750, 1);
            $this->imageThumbnail(360, 360);
        }
        if ($type == 'ner') {
            $this->imageThumbnail(750, 312, 1);
            $this->imageThumbnail(360, 360);
        }

        if (!$type) {
            $this->imageThumbnail(360, 360);
        }
        return $this->upload_path.'/'.$this->file_name;
    }

    /**
     * 图片生成缩略图
     * @param int $w 宽度
     * @param int $h 长度
     * @return 成功：返回分类数据；失败：返回错误信息
     */
    public function imageThumbnail($w,$h,$type=0)
    {
        $upload_path = $this->upload_path;
        $file_name = $this->file_name;
        $file = $upload_path.'/'.$file_name;
        if (file_exists($upload_path.'/small_'.$file_name)) {
            return $upload_path.'/small_'.$file_name;
        }
        $thumb = new Image($file, $file_name ,$type);
        $thumb->thumb($w, $h);
        $thumb->out();
    }

}
