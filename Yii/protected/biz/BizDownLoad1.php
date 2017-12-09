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

    public function downLoad($data)
    {
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        //$objPHPExcel->getActiveSheet()->setTitle('用户信息');
        $ascii = 65;
        foreach ($this->header as $item) {
            $key = chr($ascii);
            $objPHPExcel->getActiveSheet()->setCellValue("{$key}1", $item);
            $ascii++;
        }

        foreach ($data as $key => $item) {
            $id = $item['id'];
            $nick_name = $item['nick_name'];
            $hotel = $item['hotel'];
            $create_time = date('Y-m-d H:i:s', $item['create_time']);

            $j = $key + 2;
            $k = 0;
            $ascii = 65;
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $id); //编号
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $nick_name);
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $hotel);
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $create_time);
        }

        ob_end_clean();
        ob_start();
        header('Content-Type: application/vnd.ms-excel;charset=utf-8');
        header('Content-Disposition:attachment;filename=' . urlencode('用户信息-' . date("YmjHis") .'.xls') . '');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来

        $objWriter->save('php://output');

//        $file = './download/rechargeInfo-' . date('Y-m-d') . '.xls';
//
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//
//        $objWriter->save($file);
//        //文件输出
//        getFile($file);
    }

    public function answer($re,$question,$user)
    {
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        foreach ($re as $k=>$data) {
            // Create a first sheet
            if ($k == 0) {
                $objPHPExcel->setActiveSheetIndex(0);
            } else {
                $objPHPExcel->createSheet();
                $objPHPExcel->setActiveSheetIndex($k);
            }
            $objPHPExcel->getActiveSheet()->setTitle('问题'.($k+1));
            $objPHPExcel->getActiveSheet()->setCellValue("A2", "Q".$question[$k]['question']."：".$question[$k]['name']);

            if (in_array($k, array(0,1,3))) {
                $objPHPExcel->getActiveSheet()->setCellValue("A3", "总计：".$question[$k]['answer']."人");
                $this->header = array("序号","选项","百分比");
                $ascii = 65;
                foreach ($this->header as $item) {
                    $key = chr($ascii);
                    $objPHPExcel->getActiveSheet()->setCellValue("{$key}5", $item);
                    $ascii++;
                }
                $i=1;
                foreach ($data as $key => $item) {
                    $id = $i;
                    $name = $item['name'];
                    $percent = $item['percent'];
                    $i++;
                    $j = $key + 6;
                    $k = 0;
                    $ascii = 65;
                    $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $id); //编号
                    $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $name);
                    $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $percent);
                }
            } else {
                $objPHPExcel->getActiveSheet()->setCellValue("A3", "总计：".count($data)."人");
                $this->header = array("序号","答案");
                $ascii = 65;
                foreach ($this->header as $item) {
                    $key = chr($ascii);
                    $objPHPExcel->getActiveSheet()->setCellValue("{$key}5", $item);
                    $ascii++;
                }

                $i=1;
                foreach ($data as $key => $item) {
                    $id = $i;
                    $answer = $item['answer'];
                    $i++;
                    $j = $key + 6;
                    $k = 0;
                    $ascii = 65;
                    $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $id); //编号
                    $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k++) . "$j", $answer);
                    $objPHPExcel->getActiveSheet()->getColumnDimension(chr($ascii + $k))->setWidth(20);
                }
            }

        }

        //汇总
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(count($re));
        $objPHPExcel->getActiveSheet()->setTitle('汇总');
        $objPHPExcel->getActiveSheet()->setCellValue("A2", "总计：".count($user)."人");
        $i=1;
        $j = 6;
        foreach ($user as $key => $item) {
            $answer = $item['answer'];
            $i++;
            if ($answer) {
                $j += $key?1:1;
            }

            $k = 1;
            $ascii = 65;
            $id = $j;
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k) . "$j", "姓名："); //编号
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k+1) . "$j", $item['nick_name']);

            $j++;
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k) . "$j", "就职酒店："); //编号
            $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k+1) . "$j", $item['hotel']);
            $a = $j;
            $j += 2;
            foreach ($answer as $k1=>$va) {
                $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k) . "$j", $k1."：".$va['question']); //编号
                $j++;
                $objPHPExcel->getActiveSheet()->setCellValue(chr($ascii + $k) . "$j", "答案：".$va['answer']); //编号
                $a = $j;
                $j += 2;
            }
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$id, $key+1);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$id)->applyFromArray(
                array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                    )
                )
            );
            $objPHPExcel->getActiveSheet()->mergeCells('A'.$id.':A'.$a);

        }

        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();
        ob_start();
        header('Content-Type: application/vnd.ms-excel;charset=utf-8');
        header('Content-Disposition:attachment;filename=' . urlencode('问卷详情-' . date("YmjHis") .'.xls') . '');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来

        $objWriter->save('php://output');
    }

}
