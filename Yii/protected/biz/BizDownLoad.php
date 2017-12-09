<?php
/**
 * 导出
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
Yii::$enableIncludePath = false;
class BizDownLoad
{
    public $header;

    public function setHeader($header)
    {
		
        $this->header = $header;
    }

    public function downLoad($data, $sum, $arrPecent)
    {
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('汇总');
		
        $ascii = 65;
        foreach ($this->header as $item) {
            $key = chr($ascii);
            $objPHPExcel->getActiveSheet()->setCellValue("{$key}1", $item);
            $ascii++;	  
        }
		
        foreach ($data as $key => $item) {
            $id = $item['id'];
            $name = $item['name'];
            $phone = $item['phone'];
			$city = $item['city'];
			$corporate = $item['corporate'];
			$job = $item['job'];
			$answer1 = $item['answer1'];
			$answer2 = $item['answer2'];
			$answer3 = $item['answer3'];
			$answer4 = $item['answer4'];
			$answer5 = $item['answer5'];
			$answer6 = $item['answer6'];
			$answer8 = $item['answer8'];
			$answer9 = $item['answer9'];
			$answer7 = $item['answer7'];
			$answer10 = $item['answer10'];
            $time = date('Y-m-d H:i:s', $item['time']);

            $j = $key + 2;
            $k = 0;
            $ascii = 65;
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $id); //编号
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $name);
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $phone);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $city);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $corporate);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $job);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer1);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer2);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer3);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer4);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer5);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer6);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer8);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer9);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer7);
			$objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer10);
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $time);
        }

		$objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->setTitle('百分比');
		

		$objPHPExcel->getActiveSheet()->setCellValue("A2", "（1）您平时通过哪些渠道来了解烘焙行业的信息？");
		$objPHPExcel->getActiveSheet()->setCellValue("A3", "总计：".$sum."人");
		$objPHPExcel->getActiveSheet()->setCellValue("A4", "序号");
		$objPHPExcel->getActiveSheet()->setCellValue("B4", "选项");
		$objPHPExcel->getActiveSheet()->setCellValue("D4", "百分比");
		$objPHPExcel->getActiveSheet()->setCellValue("D5", $arrPecent[1][1]?$arrPecent[1][1]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D6", $arrPecent[1][2]?$arrPecent[1][2]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D7", $arrPecent[1][3]?$arrPecent[1][3]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D8", $arrPecent[1][4]?$arrPecent[1][4]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D9", $arrPecent[1][5]?$arrPecent[1][5]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D10", $arrPecent[1][6]?$arrPecent[1][6]:"0%");
		for ($x=1; $x<=6; $x++) {
			$j = $x+4;
		  $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii) . "$j", $x);
		}
		
        $objPHPExcel->getActiveSheet()->setCellValue("B5", "搜索引擎");
		$objPHPExcel->getActiveSheet()->setCellValue("B6", "视频");
		$objPHPExcel->getActiveSheet()->setCellValue("B7", "网站");
		$objPHPExcel->getActiveSheet()->setCellValue("B8", "社交渠道");
		$objPHPExcel->getActiveSheet()->setCellValue("B9", "烘焙相关培训");
		$objPHPExcel->getActiveSheet()->setCellValue("B10", "其他活动");
	
/**----------------------------------------------------------------------------------------------**/			
		
		$objPHPExcel->getActiveSheet()->setCellValue("A12", "（2）您是否知道联合利华饮食策划的好乐门品牌？");
		$objPHPExcel->getActiveSheet()->setCellValue("A13", "总计：".$sum."人");
		$objPHPExcel->getActiveSheet()->setCellValue("A15", "序号");
		$objPHPExcel->getActiveSheet()->setCellValue("B15", "选项");
		$objPHPExcel->getActiveSheet()->setCellValue("D15", "百分比");
		$objPHPExcel->getActiveSheet()->setCellValue("D16", $arrPecent[2][1]?$arrPecent[2][1]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D17", $arrPecent[2][2]?$arrPecent[2][2]:"0%");

		for ($x=1; $x<=3; $x++) {
			$j = $x+14;
		  $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii) . "$j", $x);
		}
		
        $objPHPExcel->getActiveSheet()->setCellValue("B15", "很了解");
		$objPHPExcel->getActiveSheet()->setCellValue("B16", "一般");
		$objPHPExcel->getActiveSheet()->setCellValue("B17", "不太了解");
		
/**----------------------------------------------------------------------------------------------**/

		$objPHPExcel->getActiveSheet()->setCellValue("A19", "（3）对于现场品尝的面包是否满意？");
		$objPHPExcel->getActiveSheet()->setCellValue("A20", "总计：".$sum."人");
		$objPHPExcel->getActiveSheet()->setCellValue("A22", "序号");
		$objPHPExcel->getActiveSheet()->setCellValue("B22", "选项");
		$objPHPExcel->getActiveSheet()->setCellValue("D22", "百分比");
		$objPHPExcel->getActiveSheet()->setCellValue("D23", $arrPecent[3][1]?$arrPecent[3][1]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D24", $arrPecent[3][2]?$arrPecent[3][2]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D25", $arrPecent[3][3]?$arrPecent[3][3]:"0%");
		
		for ($x=1; $x<=3; $x++) {
			$j = $x+22;
		  $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii) . "$j", $x);
		}
		
        $objPHPExcel->getActiveSheet()->setCellValue("B23", "满意");
		$objPHPExcel->getActiveSheet()->setCellValue("B24", "一般");
		$objPHPExcel->getActiveSheet()->setCellValue("B25", "不太满意");
		
/**----------------------------------------------------------------------------------------------**/

		$objPHPExcel->getActiveSheet()->setCellValue("A27", "（4）对于品尝的三款面包，觉得哪款最满意？");
		$objPHPExcel->getActiveSheet()->setCellValue("A28", "总计：".$sum."人");
		$objPHPExcel->getActiveSheet()->setCellValue("A30", "序号");
		$objPHPExcel->getActiveSheet()->setCellValue("B30", "选项");
		$objPHPExcel->getActiveSheet()->setCellValue("D30", "百分比");
		$objPHPExcel->getActiveSheet()->setCellValue("D31", $arrPecent[4][1]?$arrPecent[4][1]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D32", $arrPecent[4][2]?$arrPecent[4][2]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D33", $arrPecent[4][3]?$arrPecent[4][3]:"0%");
		
		for ($x=1; $x<=3; $x++) {
			$j = $x+30;
		  $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii) . "$j", $x);
		}
		
        $objPHPExcel->getActiveSheet()->setCellValue("B31", "罗勒火腿棍");
		$objPHPExcel->getActiveSheet()->setCellValue("B32", "黑椒葱香薄饼");
		$objPHPExcel->getActiveSheet()->setCellValue("B33", "培根三明治");
		
/**----------------------------------------------------------------------------------------------**/

		$objPHPExcel->getActiveSheet()->setCellValue("A35", "（5）您是否愿意购买／代理好乐门纯正蛋黄酱？");
		$objPHPExcel->getActiveSheet()->setCellValue("A36", "总计："."23人");
		$objPHPExcel->getActiveSheet()->setCellValue("A38", "序号");
		$objPHPExcel->getActiveSheet()->setCellValue("B38", "选项");
		$objPHPExcel->getActiveSheet()->setCellValue("D38", "百分比");
		$objPHPExcel->getActiveSheet()->setCellValue("D39", $arrPecent[5][1]?$arrPecent[5][1]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D40", $arrPecent[5][2]?$arrPecent[5][2]:"0%");
		
		for ($x=1; $x<=2; $x++) {
			$j = $x+38;
		  $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii) . "$j", $x);
		}
		
        $objPHPExcel->getActiveSheet()->setCellValue("B39", "愿意");
		$objPHPExcel->getActiveSheet()->setCellValue("B40", "不愿意");
		
/**----------------------------------------------------------------------------------------------**/

		$objPHPExcel->getActiveSheet()->setCellValue("A42", "（6）您是否愿意购买／代理好乐门香甜沙拉酱？");
		$objPHPExcel->getActiveSheet()->setCellValue("A43", "总计："."23人");
		$objPHPExcel->getActiveSheet()->setCellValue("A44", "序号");
		$objPHPExcel->getActiveSheet()->setCellValue("B44", "选项");
		$objPHPExcel->getActiveSheet()->setCellValue("D44", "百分比");
		$objPHPExcel->getActiveSheet()->setCellValue("D45", $arrPecent[6][1]?$arrPecent[6][1]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D46", $arrPecent[6][2]?$arrPecent[6][2]:"0%");
		
		for ($x=1; $x<=2; $x++) {
			$j = $x+44;
		  $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii) . "$j", $x);
		}
		
        $objPHPExcel->getActiveSheet()->setCellValue("B45", "愿意");
		$objPHPExcel->getActiveSheet()->setCellValue("B46", "不愿意");
		
/**----------------------------------------------------------------------------------------------**/

		$objPHPExcel->getActiveSheet()->setCellValue("A49", "（7）今天推荐的两款茶饮，你最喜欢哪款？");
		$objPHPExcel->getActiveSheet()->setCellValue("A50", "总计："."23人");
		$objPHPExcel->getActiveSheet()->setCellValue("A51", "序号");
		$objPHPExcel->getActiveSheet()->setCellValue("B51", "选项");
		$objPHPExcel->getActiveSheet()->setCellValue("D51", "百分比");
		$objPHPExcel->getActiveSheet()->setCellValue("D52", $arrPecent[8][1]?$arrPecent[8][1]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D53", $arrPecent[8][2]?$arrPecent[8][2]:"0%");
		
		for ($x=1; $x<=2; $x++) {
			$j = $x+51;
		  $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii) . "$j", $x);
		}
		
        $objPHPExcel->getActiveSheet()->setCellValue("B52", "爱在提拉米苏");
		$objPHPExcel->getActiveSheet()->setCellValue("B53", "满满百果茶");
		
/**----------------------------------------------------------------------------------------------**/
		
		$objPHPExcel->getActiveSheet()->setCellValue("A56", "（8）你喜欢下面哪个系列的立顿产品？");
		$objPHPExcel->getActiveSheet()->setCellValue("A57", "总计："."23人");
		$objPHPExcel->getActiveSheet()->setCellValue("A58", "序号");
		$objPHPExcel->getActiveSheet()->setCellValue("B58", "选项");
		$objPHPExcel->getActiveSheet()->setCellValue("D58", "百分比");
		$objPHPExcel->getActiveSheet()->setCellValue("D59", $arrPecent[9][1]?$arrPecent[9][1]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D60", $arrPecent[9][2]?$arrPecent[9][2]:"0%");
		$objPHPExcel->getActiveSheet()->setCellValue("D61", $arrPecent[9][3]?$arrPecent[9][3]:"0%");
		
		for ($x=1; $x<=3; $x++) {
			$j = $x+58;
		  $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii) . "$j", $x);
		}
		
        $objPHPExcel->getActiveSheet()->setCellValue("B59", "立顿三角茶包");
		$objPHPExcel->getActiveSheet()->setCellValue("B60", "立顿冰茶粉");
		$objPHPExcel->getActiveSheet()->setCellValue("B61", "立顿小黄罐");
		
/**----------------------------------------------------------------------------------------------**/
		
		
        ob_end_clean();
        ob_start();
        header('Content-Type: application/vnd.ms-excel;charset=utf-8');
        header('Content-Disposition:attachment;filename= 问卷调查-' . date("YmjHis") .'.xls') . '';
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来

        $objWriter->save('php://output');

    }


}
